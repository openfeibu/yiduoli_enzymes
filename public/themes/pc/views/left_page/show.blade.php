
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab',['type' => 'show'])->render() !!}
        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    @foreach($pages as $key =>$page_item)
                    <li class="@if($page->id == $page_item->id) active @endif transition500"><a href="{{ route('pc.'.$route_slug.'.show',$page_item->id)  }}">{{ $page_item->title }}</a></li>
                    @endforeach
                </ul>
            </div>
            @if($page->slug == 'recruitment_information')
                <div class="news-detail-content pull-right nopadding">
                    <div class="news-detail-article">
                        <div class="join">
                            <div class="join-form clearfix">
                                {!! $page->content !!}
                            </div>
                            <div class="company-info-con clearfix">
                                <div class="company-info-t">
                                    联系我们:
                                </div>
                                <div class="company-info-table">
                                    <div class="company-contact-item col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding">
                                        <p>
                                            联系方式
                                        </p><span>{{ setting('hr_tel') }}</span>
                                    </div>
                                    <div class="company-contact-item col-lg-3 col-md-3 col-sm-12 col-xs-12 nopadding">
                                        <p>
                                            电子邮箱
                                        </p><span>{{ setting('hr_email') }}</span>
                                    </div>
                                    <div class="company-contact-item  col-lg-6 col-md-3 col-sm-12 col-xs-12 nopadding">
                                        <p>
                                            公司地址
                                        </p><span>{{ setting('address') }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="news-detail-content pull-right nopadding">
                    <div class="news-detail-article">
                        {!! $page->content !!}
                    </div>
                </div>
            @endif

        </div>

    </div>
</div>