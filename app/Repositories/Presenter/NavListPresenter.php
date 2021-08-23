<?php

namespace App\Repositories\Presenter;

use App\Models\Nav;
use App\Models\NavCategory;
use App\Repositories\Eloquent\NavRepository;
use App\Repositories\Eloquent\ProductCategoryRepository;
use App\Repositories\Eloquent\ProductRepository;
use App\Repositories\Presenter\FractalPresenter;
use Route;

class NavListPresenter extends FractalPresenter
{

    public $navRepository;

    public function __construct(NavRepository $navRepository)
    {
        parent::__construct();
        $this->navRepository = $navRepository;

    }
    /**
     * Prepare data to present
     *
     * @return \App\Repositories\Eloquent\NavListTransformer
     */
    public function getTransformer()
    {
        return new NavListTransformer();
    }

    /**
     * 用户根据权限可见的菜单
     * @return string
     */
    public function navs($slug)
    {

        $category_id = NavCategory::where('slug',$slug)->value('id');
        $navs = $this->navRepository->navs($category_id);

        $html = $this->getNavHtml($navs);

        return $html;
    }
    public function mobile_navs($slug)
    {
        $category_id = NavCategory::where('slug',$slug)->value('id');
        $navs = $this->navRepository->navs($category_id);

        $html = '';
        if($navs) {

        foreach ($navs as $nav) {

            if(!$nav->is_menu)
            {
                continue;
            }
            if(($nav->slug !== '#') && !Route::has($nav->slug)) {
                continue;
            }

            $class = '';

            if($nav->active) {
                $class .= 'active';
            }

            $html .= '<li class="'.$class.'">';
            $href = ($nav->slug == '#') || (!Route::has($nav->slug)) ? 'javascript:;' : $nav->url;
            $html .= sprintf('<a href="%s">%s %s</a>', $href, $nav->icon_html, $nav->name);

            $i = 0;
            if($nav->slug == 'pc.product.index')
            {
                $product_categories = app(ProductCategoryRepository::class)->getListCategories(0);
                foreach ($product_categories as $key => $category)
                {
                    if($i == 0)
                    {
                        $html .= '<span class="caret "></span><dl>';
                    }

                    $html .= sprintf('<dd class=""><a href="%s">%s %s</a></dd>', route('pc.product.index',['product_category_id' => $category->id]), '', $category->name);
                    $i++;
                }
                if($i)
                {
                    $html .= '</dl>';
                }


                $html .= '</li>';
                continue;
            }

            if(!isset($nav->sub)) {
                $html .= '</li>';
                continue;
            }

            foreach ($nav->sub as $sub) {
                if(!$sub->is_menu)
                {
                    continue;
                }

                if(($sub->slug !== '#') && !Route::has($sub->slug)) {
                    continue;
                }
                if($i == 0)
                {
                    $html .= '<span class="caret "></span><dl>';
                }
                $href = ($sub->slug == '#') || ($sub->slug == '')? 'javascript:;' : $sub->url;
                $icon = $sub->icon_html ? $sub->icon_html : '';

                $class = $sub->active ? 'layui-this' : '' ;

                $html .= sprintf('<dd class="'.$class.'"><a href="%s">%s %s</a></dd>', $href, $icon, $sub->name);
                $i++;
            }
            if($i)
            {
                $html .= '</dl>';
            }


            $html .= '</li>';
        }
    }

        return $html;
    }
    public function footer_navs($slug)
    {
        $category_id = NavCategory::where('slug',$slug)->value('id');
        $navs = $this->navRepository->navs($category_id);

        $html = '';
        if($navs) {

            foreach ($navs as $nav) {

                if(!$nav->is_menu || $nav->slug == 'pc.home' )
                {
                    continue;
                }
                if(($nav->slug !== '#') && !Route::has($nav->slug)) {
                    continue;
                }

                $class = '';

                if($nav->active) {
                    $class .= 'active';
                }

                $html .= ' <div class="footer-link">';
                $href = ($nav->slug == '#') || (!Route::has($nav->slug)) ? 'javascript:;' : $nav->url;
                $html .= sprintf('<div class="footer-link-t"><a href="%s">%s %s</a></div>', $href, $nav->icon_html, $nav->name);
                $i = 0;
                if($nav->slug == 'pc.product.index')
                {
                    $product_categories = app(ProductCategoryRepository::class)->getListCategories(0);
                    foreach ($product_categories as $key => $category)
                    {
                        if($i == 0)
                        {
                            $html .= '<ul>';
                        }

                        $html .= sprintf('<li class=""><a href="%s">%s %s</a></li>', route('pc.product.index',['product_category_id' => $category->id]), '', $category->name);
                        $i++;
                    }
                    if($i)
                    {
                        $html .= '</ul>';
                    }


                    $html .= '</div>';
                    continue;
                }

                if(!isset($nav->sub)) {
                    $html .= '</div>';
                    continue;
                }

                foreach ($nav->sub as $sub) {
                    if(!$sub->is_menu)
                    {
                        continue;
                    }

                    if(($sub->slug !== '#') && !Route::has($sub->slug)) {
                        continue;
                    }
                    if($i == 0)
                    {
                        $html .= '<ul>';
                    }
                    $href = ($sub->slug == '#') || ($sub->slug == '')? 'javascript:;' : $sub->url;
                    $icon = $sub->icon_html ? $sub->icon_html : '';

                    $class = $sub->active ? 'layui-this' : '' ;

                    $html .= sprintf('<li class="'.$class.'"><a href="%s">%s %s</a></li>', $href, $icon, $sub->name);
                    $i++;
                }
                if($i)
                {
                    $html .= '</ul>';
                }


                $html .= '</div>';
            }
        }

        return $html;
    }
    public function getNavHtml($navs,$caret='')
    {
        $html = '';
        if(!$navs) {
            return $html;
        }
        foreach ($navs as $nav) {

            if(!$nav->is_menu)
            {
                continue;
            }
            if(($nav->slug !== '#') && !Route::has($nav->slug)) {
                continue;
            }

            $class = '';

            if($nav->active) {
                $class .= 'active';
            }

            $html .= '<li class="'.$class.'">';
            $href = ($nav->slug == '#') || (!Route::has($nav->slug)) ? 'javascript:;' : $nav->url;
            $html .= sprintf('<a href="%s">%s %s</a><div class="line transition "></div>', $href, $nav->icon_html, $nav->name);

            $i = 0;
            if($nav->slug == 'pc.product.index')
            {
                $product_categories = app(ProductCategoryRepository::class)->getListCategories(0);
                foreach ($product_categories as $key => $category)
                {
                    if($i == 0)
                    {
                        $html .= '<dl>';
                    }

                    $html .= sprintf('<dd class=""><a href="%s">%s %s</a></dd>', route('pc.product.index',['product_category_id' => $category->id]), '', $category->name);
                    $i++;
                }
                if($i)
                {
                    $html .= '</dl>';
                }


                $html .= '</li>';
                continue;
            }
            if(!isset($nav->sub)) {
                $html .= '</li>';
                continue;
            }

            foreach ($nav->sub as $sub) {
                if(!$sub->is_menu)
                {
                    continue;
                }

                if(($sub->slug !== '#') && !Route::has($sub->slug)) {
                    continue;
                }
                if($i == 0)
                {
                    $html .= $caret.'<dl>';
                }

                $href = ($sub->slug == '#') || ($sub->slug == '')? 'javascript:;' : $sub->url;
                $icon = $sub->icon_html ? $sub->icon_html : '';

                $class = $sub->active ? 'layui-this' : '' ;

                $html .= sprintf('<dd class="'.$class.'"><a href="%s">%s %s</a></dd>', $href, $icon, $sub->name);
                $i++;
            }
            if($i)
            {
                $html .= '</dl>';
            }


            $html .= '</li>';
        }
        return $html;
    }
}
