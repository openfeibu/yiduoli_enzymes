<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
    </div>
    <div class="w1400 page-title clearfix wow fadeInLeft animated" data-wow-duration=".6s" data-wow-delay=".4s">
        {!! Theme::widget('NavTab')->render() !!}
    </div>
    <div class="container w1400">
        <div class="text-detail clearfix  wow fadeInUp animated animated" data-wow-duration=".6s" data-wow-delay=".5s">
            {!! $page['content'] !!}
        </div>
    </div>
</div>
</div>

