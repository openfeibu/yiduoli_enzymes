<div class="page-title-c pull-left">
    <span>{{ $top_product_category['name'] }}</span>
</div>
<div class="page-title-e pull-left">
    <span>/</span>{{ $top_product_category['en_name'] }}
</div>

<div class="product-min-tab pull-right">
    <ul>
        <li class="category_id @if($top_product_category['id'] == $product_category_id) active @endif"  category_id="{{ $top_product_category['id'] }}"><a href="javascript:;">全部</a></li>
        @foreach($secondary as $key => $category)
            <li class="category_id  @if($category['id'] == $product_category_id) active @endif" category_id="{{ $category['id'] }}"><a href="javascript:;" >{{ $category['name'] }}</a></li>
        @endforeach
    </ul>
</div>