<div class="pageBanner newsBanner" style=" background:#eee url({!!  '/image/original/'.$top_nav->image  !!}) no-repeat center / cover;">
    @if(Route::currentRouteName() == 'pc.industrial_enzyme' || Route::currentRouteName() == 'pc.industrial_enzyme_image')
    @else
    <div class="pageBanner-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s"><div class="pageBanner-title-c"><span>{{ $top_nav->name }}</span></div></div>
    <div class="pageBanner-en wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s"><span>{{ $top_nav->en_name }}</span></div>
    @endif
</div>