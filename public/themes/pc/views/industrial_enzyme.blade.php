<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
    </div>
	<div class="bgf9 ">
    <div class="container w1400">
        {!! Theme::widget('NavTab')->render() !!}
        <div class="text-detail clearfix  wow fadeInUp animated animated" data-wow-duration=".6s" data-wow-delay=".5s">
            {!! $page['content'] !!}
        </div>
    </div>
	</div>
</div>
</div>

