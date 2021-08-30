<div class="page-product-con product-tab-list-common clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s" id="product-list">
    @if(count($products))
        @foreach($products as $key => $product)
            <div class="product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
                <a href="{{ route('pc.product.show',$product->id) }}" target="_blank">
                    <div class="img"><img class="transition500" src="{{ '/image/original'.$product->image }}" alt="{{ $product->title }}"></div>
                    <div class="test transition">

                        <div class="title fb-overflow-1">
                            {{ $product->title }}
                        </div>

                    </div>
                    <div class="labelBox">
                        @foreach($product['tags_arr'] as $tag_key => $tag)
                            <span>{{ $tag }}</span>
                        @endforeach
                    </div>
                </a>
            </div>
        @endforeach
    @else
        <div class="nodata">
            <div class="img "><img class="transition500" src="{{ '/image/original'.setting('logo') }}" alt=" "></div>
            <div class="test">该分类没有产品，如有任何问题请联系我们</div>
        </div>
    @endif


</div>
{!! $products->links('common.ajax_pagination') !!}
