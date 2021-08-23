<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab',['nav_id' => $nav_tab_id])->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach(app('nav_repository')->children($nav->parent_id) as $key => $nav_item)
                    <li class="@if(Route::currentRouteName() == $nav_item->slug) active @endif transition500" ><a href="{{ $nav_item->url }}">{{ $nav_item->name }}</a></li>
                    @endforeach

                </ul>
            </div>
            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                    {!! $page->content !!}
                </div>
            </div>

        </div>

    </div>
</div>