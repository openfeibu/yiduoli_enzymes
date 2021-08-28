<header class=" navbar-fixed-top animated" data-wow-duration=".6s" data-wow-delay=".3s">
    <div class="headerBg transition500">
        <div class="container w1400">
            <div class="logo newLogo pull-left fadeInUp animated transition500">
                <a href="{{ route('pc.home') }}">
                    <h1 hidden="">{{ setting('station_name') }}</h1>
                    <img class="logo1" src="{{ '/image/original'.setting('logo') }}" alt="{{ setting('station_name') }}">

                </a>
                <div class="companycode"><a target="_blank" href="/href?url={!! urlencode('http://irm.cninfo.com.cn/ircs/company/companyDetail?stockcode=300381&orgId=9900019308')!!}">股票代码：300381</a></div>
            </div>
            <div class="headerRight pull-right">

                <div class="nav pull-right fadeInUp animated" data-wow-duration="0.6s" data-wow-delay="0s">
                    <ul>
                        @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

                        {!! $navListPresenter->navs('web_top') !!}
                    </ul>
                </div>

            </div>
            <div class="menu"></div>

        </div>
    </div>
</header>