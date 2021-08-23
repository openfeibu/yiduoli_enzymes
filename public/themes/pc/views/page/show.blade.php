
<!-- 内容 -->
<div class="main">
    <div class="container w1400">

        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}


        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            {!! $page->content !!}
            @if($page->slug == 'company_information')
            <div class="company-info-con clearfix">
                <div class="company-info-t">
                    联系我们:
                </div>
                <div class="company-info-table">
                    <div class="company-contact-item col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding">
                        <p>
                            联系方式
                        </p><span>{{ setting('bond_tel') }}</span>
                    </div>
                    <div class="company-contact-item col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding">
                        <p>
                            电子邮箱
                        </p><span>{{ setting('bond_email') }}</span>
                    </div>
                    <div class="company-contact-item  col-lg-6 col-md-3 col-sm-12 col-xs-12 nopadding">
                        <p>
                            公司地址
                        </p><span>{{ setting('address') }}</span>
                    </div>
                </div>
            </div>
            @endif
        </div>

    </div>
</div>