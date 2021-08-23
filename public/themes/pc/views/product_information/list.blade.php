<div class="report-list clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="container w1400">
        @if(count($products))
        @foreach($products as $key => $product)
        <div class="report-item">
            <div class="report-item-type">{{ $product->title }}</div>
            <ul class="report-item-box clearfix">
                @if($product->vid)
                <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                    <div class="report-bg transition500 video" vid = "{{ $product->vid }}" des="{{ $product->description }}">
                        <div class="test fb-overflow-2">{{ $product->title }}</div>
                        @if($product->created_at)<div class="date">{{  $product->created_at->format('Y-m-d') }}</div>@endif
                    </div>

                </li>
                @endif
                @if($product->instruction)
                <li class=" col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <a href="{{ '/image/original/'.$product->instruction }}" target="_blank">
                        <div class="report-bg transition500">
                            <div class="test fb-overflow-2">{{ $product->instruction_title }}</div>
                            @if($product->created_at)<div class="date">{{ $product->created_at->format('Y-m-d') }}</div>@endif
                        </div>
                    </a>
                </li>
                @endif
            </ul>
        </div>
        @endforeach
        @else
            <div class="nodata">
                <div class="img "><img class="transition500" src="{{ '/image/original'.setting('logo') }}" alt=" "></div>
                <div class="test">该分类没有产品，如有任何问题请联系我们</div>
            </div>
        @endif
    </div>
</div>
{!! $products->links('common.ajax_pagination') !!}