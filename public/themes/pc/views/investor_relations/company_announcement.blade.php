<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}

        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="company-announcement">
                @foreach($pages as $key=> $page)
                <div class="company-announcement-item clearfix">
                    <a class="clearfix" target="_blank" href="{{ '/image/original'.$page->file }}">
                        <p>{{ $page->title }}</p>
                        <span>[{{ $page->created_at->format('Y-m-d') }}]</span>
                    </a>
                </div>
                @endforeach
            </div>

        </div>
        {!! $pages->links('common.pagination') !!}
    </div>
</div>