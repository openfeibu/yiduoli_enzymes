<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
    </div>
    <div class="product-main">

        <div class="container w1400">
            <div class="page-title clearfix wow fadeInLeft animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="page-title-c pull-left">
                    <span>联系我们</span>
                </div>
                <div class="page-title-e pull-left">
                    <span>/</span>Contact Us
                </div>

            </div>
            <div class="clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="contact">
                    <div class="contact-t clearfix">
                        <div class="contact-t-left col-lg-6 col-md-6 col-sm-12 col-xs-12 ">

                            <div class="contact-t-map col-lg-12 col-md-12 col-sm-12 col-xs-12 nopadding">
                                <p>公司地址</p>
                                <span>{{ setting('address') }}</span>
                            </div>
                            <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                <p>电话总机</p>
                                <span>{{ setting('tel') }}</span>
                            </div>
                            <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                <p>电子邮箱</p>
                                <span>{{ setting('email') }}</span>
                            </div>
                            <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                <p>邮政编码</p>
                                <span>{{ setting('zip_code') }}</span>
                            </div>
                            <div class="contact-t-info col-lg-6 col-md-6 col-sm-6 col-xs-6 nopadding">
                                <p>传真</p>
                                <span>{{ setting('fax') }}</span>
                            </div>

                        </div>
                        <div class="contact-t-right col-lg-6 col-md-6 col-sm-12 col-xs-12  pull-right">
                            <div id="allmap"></div>
                        </div>
                    </div>

                </div>
            </div>
          <!--  <div class="page-title clearfix wow fadeInLeft animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="page-title-c pull-left">
                    <span>常见问题</span>
                </div>
                <div class="page-title-e pull-left">
                    <span>/</span>Common Problem
                </div>

            </div>
            <div class="question clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                @foreach($questions as $key => $question)
                <div class="blocl col-lg-6 col-md-6 col-sm-12 col-xs-12 ">
                    <div class="question-item ">
                        <div class="question-item-q">
                            {{ $question->question }}
                        </div>
                        <div class="question-item-a">
                            {{ $question->answer }}
                        </div>
                        <div class="question-item-date">
                            {{ $question->created_at->format('Y/m/d') }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
			
			-->
        </div>
    </div>

</div>


<script src="http://api.map.baidu.com/api?v=2.0&amp;ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f"></script>
<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=2.0&amp;ak=5jCnjnCesElvVDufg6yjGMrlYimVXk5f&amp;services=&amp;t=20200327103013"></script>

<script>
    let sContent = `<h4 style='margin:0 0 5px 0;padding:0.2em 0;font-size:18px'>广东溢多利生物科技股份有限公司</h4><p style='margin:0;line-height:1.5;font-size:13px;text-indent:2em;color:#bbb'>广东省珠海市南屏科技工业园屏北一路8号</p>`
    let map = new BMap.Map("allmap");
    let point2 = new BMap.Point("{{ setting('longitude') }}","{{ setting('latitude') }}");
    let marker2 = new BMap.Marker(point2);
    map.addControl(new BMap.OverviewMapControl()); //添加缩略地图控件
    map.enableScrollWheelZoom(); //启用滚轮放大缩小
    let infoWindow = new BMap.InfoWindow(sContent); // 创建信息窗口对象
    map.addOverlay(marker2);
    map.disable3DBuilding();
    map.centerAndZoom(point2, 18);

    marker2.openInfoWindow(infoWindow);
    // map.addEventListener("click",function(e){
    // 	console.log(e.point.lng + "," + e.point.lat);
    // });
</script>

</html>