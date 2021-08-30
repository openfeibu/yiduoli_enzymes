

<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}

    </div>
    <div class="product-main">

        <div class="container w1400">

            {!! Theme::widget('NavTab')->render() !!}
            <div class="newList-con clearfix">
                @foreach($news as $key => $news_item)
                <div class="newList-item transition500 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".1s">
                    <a href="{{ route('pc.news.show',$news_item->id) }}"  target="_black" class="clearfix">
                        <div class="img "><img class="transition500" src="{{ $news_item->image_url }}" alt=""></div>
                        <div class="test">
                            <div class="title transition500 fb-overflow-2"> {{ $news_item->title }}</div>
                            <div class="des transition500 fb-overflow-2">{{ $news_item->description }}</div>
                            <div class="date transition500">{{ $news_item->created_at->format('Y-m-d') }}</div>
                        </div>

                    </a>
                </div>
                @endforeach
            </div>

            {!! $news->appends(['search_key' => $search_key])->links('common.pagination') !!}
        </div>
    </div>
</div>