<div id="wap-nav">
    <div class="nav-box transition500">
        <div class="wap-header">
            <span class="wapNav-close icon_close"></span>
            <a href="http://www.yiduoli.com/"><img src="{{ '/image/original'.setting('logo') }}" alt="Logo" class="wow fadeIn animated" data-wow-delay="0.2s" /></a>
        </div>

        <ul>
            @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

            {!! $navListPresenter->mobile_navs('web_top') !!}
        </ul>
    </div>
</div>