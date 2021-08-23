<div class="pageBanner newsBanner">
    <div class="pageBanner-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s"><div class="pageBanner-title-c"><span>走进溢多利</span></div></div>
    <div class="pageBanner-en wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s"><span>About VTR</span></div>
</div>
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab',['type' => 'show'])->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach($pages as $key =>$page_item)
                    <li class="@if($page->id == $page_item->id) active @endif transition500"><a href="{{ route('pc.culture.show',$page_item->id)  }}">{{ $page_item->title }}</a></li>
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