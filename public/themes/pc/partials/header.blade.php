<header class="navbar-fixed-top  fadeInUp animated transition500" data-wow-duration=".6s" data-wow-delay=".3s">
	<div class="headerBg transition500">
        <div class="container w1400">
            <div class="logo newLogo pull-left fadeInUp animated transition500">
                <a href="{{ route('pc.home',['lang' => 'cn']) }}">
                    <h1 hidden="">{{ setting('station_name') }}</h1>
                    <img class="logo1 " src="{{ '/image/original'.setting('logo') }}" alt="{{ setting('station_name') }}" class="block">
                    <img class="logo2 " src="{{ '/image/original'.setting('logo') }}" alt="{{ setting('station_name') }}" class="block">
                </a>
				<div class="companycode"><a target="_blank" href="/href?url={!! urlencode('http://irm.cninfo.com.cn/ircs/company/companyDetail?stockcode=300381&orgId=9900019308')!!}">股票代码：300381</a></div> 
            </div>
            <div class="headerRight pull-right transition500">
                <div class="lang pull-right">
                    <div class="lang-con">
                        Language<span class="caret"></span>
                    </div>
                    <dl>
                        <dd><a href="http://intl.yiduoli.com/">English</a></dd>
						<dd style="text-align:left;font-size:18px;"><a href="http://intl.yiduoli.com/fa">فارسی</a></dd>
						<dd ><a href="http://intl.yiduoli.com/pt">Português</a></dd>		
						<dd ><a href="http://intl.yiduoli.com/ru">Русский</a></dd>
						<dd ><a href="http://intl.yiduoli.com/es">Español</a></dd>	
                    </dl>

                </div>
                <div class="nav pull-right">
                    <ul>
                        @inject('navListPresenter','App\Repositories\Presenter\NavListPresenter')

                        {!! $navListPresenter->navs('web_top') !!}
                    </ul>
                </div>

            </div>
			<div class="m-lang pull-right">
                    <div class="m-lang-con">
                        Lang<span class="caret"></span>
                    </div>
                    <dl>
                        <dd><a href="http://intl.yiduoli.com/">English</a></dd>
						<dd style="text-align:left;"><a href="http://intl.yiduoli.com/fa">فارسی</a></dd>
						<dd ><a href="http://intl.yiduoli.com/pt">Português</a></dd>		
						<dd ><a href="http://intl.yiduoli.com/ru">Русский</a></dd>
						<dd ><a href="http://intl.yiduoli.com/es">Español</a></dd>	
                    </dl>	
	<script>
	$(function(){
		$(".m-lang-con").on("click",function(){
			$(".m-lang dl").slideToggle(200)
			
		})
	})
	</script>
			</div>
			<div class="m_en"><a href="http://intl.yiduoli.com/">EN</a></div>
            <div class="menu"></div>

        </div>
    </div>
</header>