<div class="proNav">
    <div class="w1400">
        <div class="allPro-btn">
            <div class="proNav-all">全部产品</div>
            <div class="proNav-list product-tab-list-common">
                @foreach($last_categories_products as $key => $categories)
                <div class="proNav-list-item">
                    <a href="{{ route('pc.product.index',['product_category_id' => $categories['id']]) }}" target="_blank">{{ $categories['name'] }}</a>
                    <div class="proNav-last-box ">
                        @if(count($categories['products']))
                            @foreach($categories['products'] as $product_key => $product)
                                <div class="product-item clearfix col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                    <a href="{{ route('pc.product.show',$product['id']) }}" target="_black">
                                        <div class="img"><img class="transition500" src="{{ url('image/original'.$product['image']) }}" alt=" {{ $product['title'] }}"></div>
                                        <div class="test transition">

                                            <div class="title fb-overflow-1">
                                                {{ $product['title'] }}
                                            </div>

                                        </div>
                                        <div class="labelBox">
                                            @foreach($product['tags_arr'] as $tag_key => $tag)
                                                <span>{{ $tag }}</span>
                                            @endforeach
                                        </div>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            <div class="nodata">
                                <div class="img "><img class="transition500" src="{{ '/image/original'.setting('logo') }}" alt=" "></div>
                                <div class="test">该分类没有产品，如有任何问题请联系我们</div>
                            </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <ul class="fadeInRight animated" data-wow-duration="0.6s" data-wow-delay="0s">
            @foreach($top_categories as $key => $category)
            <li>
                <a href="{{ route('pc.product.index',['product_category_id' => $category->id]) }}" target="_black">{{ $category['name'] }}</a>
            </li>
            @endforeach

        </ul>

    </div>
</div>
<div class="banner">
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
            @foreach($banners as $key => $banner_item)
                <div class="swiper-slide"><a href="@if($banner_item['url']){{ $banner_item['url'] }}@else javascript:;@endif"><img src="{{ url('image/original/'.$banner_item['image']) }}" width="100%" alt=""></a></div>
            @endforeach

        </div>
        <div class="swiper-pagination swiper-pagination-banner"></div>
    </div>
</div>
<!-- 关于我们 -->
<div class="about">
    <div class="container w1400">
        <div class="about-right col-lg-5 col-md-5 col-sm-12">
            {!! page('home_about') !!}
        </div>

        <div class="page-news-video about-left col-lg-7 col-md-7 col-sm-12 col-xs-12  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s">
            <!-- <div class="about-pic col-lg-2 col-md-2 col-sm-2 col-xs-2">

            </div> -->
			<div class="about-img ">
			 <div class="swiper-container swiper-container-about">
				<div class="swiper-wrapper">

                    @inject('bannerVidRepository','App\Repositories\Eloquent\BannerVidRepository')
                    @foreach($bannerVidRepository->orderBy('order','asc')->orderBy('id','asc')->get() as $key=> $banner_vid)
						<div class="swiper-slide">
							  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 video-play" vid="{{ $banner_vid->vid }}" des="{{ $banner_vid->name }}">
								<img class="transition" src="{{ url('image/original'.$banner_vid->image) }}" alt="" />
								<div class="vr-text">
									<div class="img animated fb-bounceIn" style='animation-iteration-count: infinite;'><img src="{{ theme_asset('images/play.png') }}" alt=""></div>
								</div>
							</div>
						</div>
                    @endforeach
				</div>
				<div class="swiper-pagination swiper-pagination-about"></div>
			</div></div>
          
        </div>

    </div>
</div>
<!-- 产品中心 -->
<div class="product">
    <div class="container w1400">
        <div class=" tip-title wow fadeInUp" data-wow-duration=".6s" data-wow-delay="0s">
            <span class="transition500">COMPANY'S PRODUCT</span>
            <div class="tip-title-l"></div>
            <h1>溢多利产品</h1>
            <div class="tip-title-r"></div>
        </div>
        <div class="product-con">
            <div class="product-tab wow fadeInUp" data-wow-duration=".6s" data-wow-delay=".2s">
                <ul>
                    @foreach($top_categories as $key => $top_category)
                        <li @if($key == 0) class="active" @endif>
                            {{ $top_category['name'] }}
                        </li>
                    @endforeach
                </ul>
            </div>
			<div class="wow  fadeInUp" data-wow-duration=".6s" data-wow-delay=".3s">
            @foreach($top_categories as $key => $top_category)
            <div class="product-tab-des  animated fadeInUp" @if($key == 0)style="display: block;" @else style="display: none;" @endif>
                <div class="product-introduce col-lg-3 col-md-3 col-sm-12 col-xs-12 no-padding">
                    <div class="img col-lg-12 col-md-12 col-sm-6 col-xs-6 no-padding"><img src="{{ url('image/original'.$top_category['image']) }}" alt=""></div>
                    <div class="test col-lg-12 col-md-12 col-sm-6 col-xs-6 no-padding">
                        <div class="test-t">
                            <p>{{ $top_category['name'] }}</p>
                            <span>{{ $top_category['en_name'] }}</span>
                        </div>
                        <div class="test-des">
                            {{ $top_category['description'] }}
                        </div>
                    </div>
                </div>
                <div class="product-tab-right col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    @inject('productCategoryRepository','App\Repositories\Eloquent\ProductCategoryRepository')
                    <div class="product-min-tab">
                        <ul>
                            <li class="active"><a href="{{ route('pc.product.index',['product_category_id' => $top_category['id']]) }}">全部</a></li>
                            @foreach($productCategoryRepository->getChildListCategories($top_category['id']) as $key => $category)
                            <li><a href="{{ route('pc.product.index',['product_category_id' => $category['id']]) }}">{{ $category['name'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="product-tab-list product-tab-list-common">
                        @inject('productRepository','App\Repositories\Eloquent\ProductRepository')
                        @foreach($productRepository->getProductByCategoryId($top_category['id']) as $product_key => $product)
                        <div class="product-item clearfix col-lg-4 col-md-4 col-sm-6 col-xs-6">
                            <a href="{{ route('pc.product.show',$product['id']) }}"  target="_black">
                                <div class="img"><img class="transition500" src="{{ url('image/original'.$product['image']) }}" alt=" {{ $product['title'] }}"></div>
                                <div class="test transition">

                                    <div class="title fb-overflow-1">
                                        {{ $product['title'] }}
                                    </div>

                                </div>
                                <div class="labelBox">
                                    @foreach($product['tags_arr'] as $tag_key => $tag)
                                        <span>{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
			</div>
        </div>
    </div>
</div>

<!-- 新闻中心
<div class="new">
    <div class="container w1400">
        <div class=" tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span class="transition500">CORPORATE NEWS</span>
            <div class="tip-title-l"></div>
            <h1>最新资讯</h1>
            <div class="tip-title-r"></div>
        </div>
        <div class="new-con clearfix">
            @foreach(app('page_repository')->where('category_id',1)->where('home_recommend',1)->orderBy('created_at','desc')->limit(4)->get() as $key => $news)
            <div class="new-item transition500 col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s">
                <a href="{{ route('pc.news.show',$news->id) }}"  target="_black">
                    <div class="img"><img class="transition500" src="{!! $news->image_url !!}" alt=""></div>
                    <div class="title transition500 fb-overflow-2">{{ $news->title }}</div>
                    <div class="des transition500 fb-overflow-2">{{ cut_html_str($news->description,45) }}</div>
                    <div class="date transition500">{{ $news->created_at->format('Y-m-d') }}</div>
                </a>
            </div>
            @endforeach
        </div>

    </div>
</div>
留言 -->

<div class="feedback">
    <div id="feedback"></div>
    <div class="w1400">
        <div class=" tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <span class="transition500">ONLINE MESSAGE</span>
            <div class="tip-title-l"></div>
            <h1>在线留言</h1>
            <div class="tip-title-r"></div>
        </div>

        <form class="feedbackBox wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s" action="#" class="clearfix" onsubmit="return postFeedback()">
            <div class="clearfix">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 feedback-input">
                    <input type="text" placeholder="姓名：" class="feedback-name" name="name">
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 feedback-input">
                    <input type="text" placeholder="联系方式：" class="feedback-phone" name="phone">
                </div>
                <!-- <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 feedback-input">
                    <input type="text" placeholder="邮箱：" class="feedback-email" name="email">
                </div> -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 feedback-textarea">
                    <textarea name="content" id="" cols="30" rows="10" placeholder="留言：" class="feedback-content"></textarea>
                </div>
            </div>
            <div class="error-des"></div>
            <div class="feedback-btn">
                <input type="submit" value="提交">
            </div>
        </form>
    </div>
</div>
<!-- 留言 -->
<!-- 尾部 -->


<!-- 视频 -->
<div class="video-detail">
    <div class="video-detail-close"></div>
    <div id="video-detail-con">
        <div class="video-close"></div>
        <div id="playerBox">
            <div id='player'></div>
            <div class="des"></div>
        </div>

    </div>

</div>

<script>
    $(function() {
        var mySwiper = new Swiper('.swiper-container-banner', {
            loop: true,
            autoplay: 6000,
            autoHeight: true,
            pagination: '.swiper-pagination-banner',
            paginationClickable: true
        })
		var mySwiper2 = new Swiper('.swiper-container-about', {
            loop: true,
            autoplay: 4000,
            autoHeight: true,
            pagination: '.swiper-pagination-about',
            paginationClickable: true
        })
        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click", function() {
            $(".video-detail").hide();
            $("#player").html("")
        })
        $(".video-play").on("click", function() {
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width * 0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#player',
                autoplay: false,
                'width': width,
                'height': height,
                'vid': vid
            });
            $("#playerBox .des").text(des)
        })
    })
    function postFeedback() {
        var name = $(".feedback-name").val();
        var phone = $(".feedback-phone").val();
        // var email = $(".feedback-email").val();
        var content = $(".feedback-content").val();
        var myreg = /^[1][2,3,4,5,6,7,8,9][0-9]{9}$/;
        var myreg2 = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        $(".error-des").hide().text("")
        if (name.length == 0) {
            $(".error-des").fadeIn().text("姓名不可为空")
            return false
        }
        if (!myreg.test(phone)) {
            $(".error-des").fadeIn().text("手机号码格式错误")
            return false;
        }
        // if (!myreg2.test(email)) {
        //     $(".error-des").fadeIn().text("邮箱格式错误")
        //     return false;
        // }
        if (content.length <= 10) {
            $(".error-des").fadeIn().text("留言内容不可小于10个字")
            return false
        }
        $.ajax({
            url: "{{ route('pc.feedback.store') }}",
            data: {
                'name': name,
                'phone': phone,
                // 'email': email,
                'content': content,
                '_token': "{!! csrf_token() !!}"
            },
            type: 'post',
            dataType: "json",
            success: function(data) {
                if (data.code != 0) {
                    fbAlert(data.message);
                } else {
                    fbAlert("提交成功");
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                responseText = $.parseJSON(jqXHR.responseText);
                var message = responseText.msg;
                if (!message) {
                    message = '服务器错误';
                }
                fbAlert(message);
            }
        });
        return false;
    }
</script>

