<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Eloquent\ProductCategoryRepositoryInterface;
use App\Repositories\Eloquent\BaseRepository;
use Cache;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryRepository extends BaseRepository implements ProductCategoryRepositoryInterface
{

    public function boot()
    {
        $this->fieldSearchable = config('model.product.product_category.search');
    }
    public function model()
    {
        return config('model.product.product_category.model');
    }
    public function getAllCategoriesCache()
    {
        if (Cache::has('all_categories')) {
            return Cache::get('all_categories');
        }
        $data = $this->getAllCategories();
        Cache::forever('all_categories', $data);
        return $data;
    }
    public function getAllCategories()
    {
        $categories = $this->where('hide',0)->orderBy('order','asc')->orderBy('id','asc')->get()->toArray();
        return $categories;
    }
    public function getCategoriesCache($parent_id=0)
    {
        if (Cache::has('categories')) {
            return Cache::get('categories');
        }
        $data = $this->getCategories($parent_id);
        Cache::forever('categories', $data);
        return $data;
    }

    public function getChildListCategories($id)
    {
        return $this->where('hide',0)->where('parent_id',$id)->orderBy('order','asc')->orderBy('id','asc')->get();
    }

    public function getCategories($parent_id=0)
    {
        $data = [];
        $categories = $this->where('hide',0)->where('parent_id',$parent_id)->orderBy('order','asc')->orderBy('id','asc')->get();
        foreach ($categories as $key => $category)
        {
            $data[$key] = [
                'title' => $category->name,
                'name' => $category->name,
                'id' => $category->id,
                'parent_id' => $category->parent_id,
                'order' => $category->order,
                'attribute_id' => $category->attribute_id,
                'spread' => true
            ];
            $data[$key]['children'] = $this->getCategories($category->id);
        }
        return $data;
    }
    public function getCategoriesSelectTreeCache($parent_id=0)
    {
        if (Cache::has('categories_select_tree')) {
            return Cache::get('categories_select_tree');
        }
        $data = $this->getCategoriesSelectTree($parent_id);
        Cache::forever('categories_select_tree', $data);
        return $data;
    }
    public function getCategoriesSelectTree($parent_id=0,$check_ids=[])
    {

        $data = [];
        $categories = $this->where('hide',0)->where('parent_id',$parent_id)->orderBy('order','asc')->orderBy('id','asc')->get();
        foreach ($categories as $key => $category)
        {
            $data[$key] = [
                'title' => $category->name,
                'name' => $category->name,
                'label' => $category->name,
                'id' => $category->id,
                'parent_id' => $category->parent_id,
                'order' => $category->order,
                'spread' => true,
                'checked' => false,
            ];
            if(!$this->where('parent_id',$category->id)->first(['id']))
            {
                $data[$key]['checked'] = in_array($category->id,$check_ids) ? true : false;
            }
            $data[$key]['children'] = $this->getCategoriesSelectTree($category->id,$check_ids);
        }
        return $data;
    }

    public function forgetCategoriesSelectTree()
    {
        Cache::forget('categories');
        Cache::forget('all_categories');
        Cache::forget('categories_select_tree');
    }
    public function getTopParentId($parent_id=0)
    {
        if($parent_id == 0)
        {
            return 0;
        }
        $parent = $this->where('hide',0)->where('id',$parent_id)->first(['id','parent_id']);
        if($parent->parent_id)
        {
            return $this->getTopParentId($parent->parent_id);
        }
        return $parent->id;
    }
    public function getCategoryIds($id,$ids=[])
    {
        if(!$id)
        {
            return '';
        }
        $category = $this->where('hide',0)->where('id',$id)->first(['id','parent_id']);
        $ids[] = $category->id;
        if($category->parent_id)
        {
            return $this->getCategoryIds($category->parent_id,$ids);
        }
        return $ids;

    }
    public function getFieldValue($category_id,$field)
    {
        $category = $this->where('hide',0)->where('id',$category_id)->first(['id','parent_id',$field]);
        if(!$category[$field])
        {
            if(!$category->parent_id)
            {
                return 0;
            }
            return $this->getFieldValue($category->parent_id,$field);
        }
        return $category[$field];
    }



    public function getSubIds($category_id=0,$sub_ids=[]){
        $ids = ProductCategory::where('parent_id',$category_id)->where('hide',0)->pluck('id')->toArray();
        $sub_ids = array_merge($sub_ids,$ids);
        foreach ($ids as $key=> $id)
        {
            $sub_ids = $this->getSubIds($id,$sub_ids);
        }
        return $sub_ids;
    }
    //根据id获取该类的子类第一个id，递归最终得到最后子类级第一个子类的id
    public function getLastFirstCategoryId($parent_id=0)
    {
        $category = ProductCategory::where('parent_id',$parent_id)->where('hide',0)->orderBy('order','asc')->orderBy('id','asc')->first();
        if(!$category)
        {
            return $parent_id;
        }
        return $this->getLastFirstCategoryId($category->id);
    }
    //根据上面获取的id 反向推出各父类列表
    public function getLastFirstCategoryLists($id,$list=[])
    {
        $category = ProductCategory::where('id',$id)->first();

        if(!$category)
        {
            return $list;
        }
        $siblings = $this->getChildListCategories($category->parent_id)->toArray();

        foreach ($siblings as $key => $sibling)
        {
            $siblings[$key]['active'] = $sibling['id'] == $id ? true : false;
        }
        if(!$siblings)
        {
            return $list;
        }
        array_unshift($list,$siblings);

        return $this->getLastFirstCategoryLists($category->parent_id,$list);

    }


    public function removeParentId($ids)
    {
        foreach ($ids as $key => $id)
        {
            if($this->where('parent_id',$id)->first(['id']))
            {
                unset($ids[$key]);
            }
        }
        return $ids;
    }
    public function getBreadCrumbs($breadcrumbs = [],$product_category_id)
    {
        if($product_category_id ) {
            $product_category = app(ProductCategory::class)->where('id', $product_category_id)->where('hide',0)->first();
            $arr[] = [
                'is_menu' => 1,
                'name' => $product_category->name ,
                'url' => '/product?product_category_id='.$product_category->id,
                'class' => 'top_product_category_name'
            ];
            $breadcrumbs = array_merge($arr,$breadcrumbs);
            return $this->getBreadCrumbs($breadcrumbs,$product_category->parent_id);
        }
        return $breadcrumbs;
    }

    //获取没有子级的类
    public function getLastCategories($id=0, $list=[])
    {
        $categories = ProductCategory::where('parent_id',$id)->where('hide',0)->orderBy('order','asc')->orderBy('id','asc')->get()->toArray();
        foreach ($categories as $key => $category){
            $child = ProductCategory::where('parent_id',$category['id'])->value('id');
            if(!$child)
            {
                $list[] =$category;
            }
            else{
                $list = $this->getLastCategories($category['id'],$list);
            }
        }
        return $list;
    }
    //获取没有子级的类的产品
    public function getLastCategoriesProducts($limit=4)
    {
        $categories = $this->getLastCategories();
        $orders = array_column($categories,'total_order');
        array_multisort($orders,SORT_ASC,$categories);
        foreach ($categories as $key => $category)
        {
            $ids = $this->getSubIds($category['id']);
            array_unshift($ids,$category['id']);
            $categories[$key]['products'] = Product::join('product_product_category','product_product_category.product_id','=','products.id')
                ->whereIn('product_product_category.product_category_id',$ids)
                ->groupBy('products.id')
                ->orderBy('products.order','desc')
                ->orderBy('products.created_at','desc')
                ->orderBy('products.id','desc')
                ->limit($limit)
                ->get(['products.*'])
                ->toArray();

        }
        return $categories;
    }
}