<style>
.pcImg {
	display: block;
}

.h5Img {
	display: none;
}

.w1200 {
	max-width: 1200px !important;
}

.about, .product, .innovate, .new {
	margin-top: 100px;
}

.about {
	margin-bottom: 0
}

.about-left {
	margin-top: 0;
	position: relative;
	z-index: 999;
	cursor: pointer;
}

.about-right {
	padding: 0 0 0 50px;
}

.about {
}

.about-con {
	font-size: 16px;
	margin-top: 0;
	margin-bottom: 0
}

.about-con p {
	text-indent: 2em;
	line-height: 32px;
	text-align: justify
}

.about-con .mhidden {
	height: 32px;
	overflow: hidden;
	;
}

.about-right .more {

	cursor: pointer;
	line-height: 42px;
    width: 120px;
    height: 42px;
    background: url(/themes/pc/assets/images/btn.png) no-repeat center / 100% 100%;
    color: #fff;
    font-size: 14px;
    margin: 10px 0;
    text-indent: 1.5em;
    text-align: left;
    cursor: pointer;
    display: block;
}
//.about-right .more {
	// line-height: 50px;
	// width: 158px;
	// height: 50px;
	// background: url("{!! theme_asset('images/btn.png') !!}") no-repeat center / 100% 100%;
	// color: #fff;
	// font-size: 16px;
	// text-indent: 2em;
	// cursor: pointer;
	//
}

.con-title h1 {
	font-size: 50px;
	color: #3e3f3f;
}

.tip-title:before {
	content: "";
	width: 100px;
	height: 5px;
	background: #4083ff;
	border-radius: 5px 0 0 5px;
	position: absolute;
	bottom: 0;
	left: 50%;
	margin-left: -100px;
}

.tip-title:after {
	content: "";
	width: 100px;
	height: 5px;
	background: #00e0e0;
	border-radius: 0 5px 5px 0;
	position: absolute;
	bottom: 0;
	left: 50%;
}

.mt10 {
	margin-top: 10px
}
.wkNew{position:relative;z-index:99}
.wkNew .product-item {
	padding: 0;
	height: 420px;
}

.wkNew .product-item-b {
	padding: 25px;
	position: relative;
	border: 1px solid #eee;
	height: 210px;
}
.wkNew .product-item-b a{display:block;}
.wkNew .product-item-b:hover .t1{text-decoration:underline}
.wkNew .product-item-b .title {
	color: #004cd9;
	font-size: 38px;
}

.wkNew .product-item-b .des {
	color: #3372e7;
	font-size: 25px;
}

.wkNew .product-item-1 {
	padding-top: 20px;
}

.wkNew .product-item:nth-of-type(2n) .product-item-2 {
	background: #f7f7f7
}

.wkNew .product-item:nth-of-type(odd) .product-item-1 {
	background: #f7f7f7
}

.wkNew .product-item:nth-of-type(odd) .product-item-1 .t2:after,.wkNew .product-item:nth-of-type(2n) .product-item-2 .t2:after {
	content: "";
	position: absolute;
	width: 26px;
	height: 13px;
	background: #f7f7f7 url("{!! theme_asset('images/wk/m.png') !!}") no-repeat center/100% 100%;
	right: 0;
	bottom: 3px;
}

.wkNew .product-item:nth-of-type(odd) .product-item-2 .t2:after,.wkNew .product-item:nth-of-type(2n) .product-item-1 .t2:after {
	content: "";
	position: absolute;
	width: 26px;
	height: 13px;
	background: #fff url("{!! theme_asset('images/wk/m.png') !!}") no-repeat center/100% 100%;
	right: 0;
	bottom: 3px;
}

.wkNew .product-item .product-item-b:hover .t2 {
	height: auto;
	background: #fff;
	padding: 10px
}

.wkNew .product-item .product-item-b:hover .t2:after {
	display: none;
}

.wkNew .product-item-1:before {
	content: "";
	bottom: -1px;
	width: 110%;
	height: 2px;
	background: #0046c8;
	position: absolute;
	left: -5%;
}

.wkNew .product-item-1:after {
	content: "";
	position: absolute;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: url("{!! theme_asset('images/wk/yuan.png') !!}") center / 100% 100%;
	left: 70px;
	bottom: -11px;
	z-index: 99
}

.wkNew .product-item-1:before {
	content: "";
	width: 2px;
	height: 22px;
	background: #0046c8;
	position: absolute;
	left: 79px;
	bottom: 2px;
}

.wkNew .product-item-2:before {
	content: "";
	width: 2px;
	height: 22px;
	background: #0046c8;
	position: absolute;
	right: 79px;
	top: 2px;
}

.wkNew .product-item-2 {
	border-top: 2px solid #0046c8
}

.product-item-2:after {
	content: "";
	position: absolute;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: url("{!! theme_asset('images/wk/yuan.png') !!}") center / 100% 100%;
	right: 70px;
	top: -10px;
	z-index: 99
}

.wkNew .product-item-2 {
	padding-top: 20px;
	color: #7a7b78;
	font-size: 14px;
}

.wkNew .product-item-2 p {
	text-indent: 2em;
}

.wkNew .product-item-3 {
	padding-top: 20px;
}

.wkNew .product-item-3 .time,.wkNew .product-item-1 .time {
	width: 72px;
	height: 72px;
	background: #3372e7;
	line-height: 72px;
	text-align: center;
	color: #fff;
	font-size: 28px;
	position: relative;
	border-radius: 50%;
	margin: 0 auto;
	text-indent: 0;
	font-weight: bold;
}

.wkNew .product-item-3 .time span,.wkNew .product-item-1 .time span,.wkNew .product-item-2 .time span {
	position: absolute;
	bottom: 0;
	color: #fff;
	font-size: 12px;
	left: 0;
	line-height: 24px;
	width: 100%;
	text-align: center;
}

.wkNew .product-item-3 .t1,.wkNew .product-item-1 .t1,.wkNew .product-item-2 .t1 {
	color: #3372e7;
	font-size: 25px;
	text-align: center;
	text-indent: 0;
	font-weight: bold;
}

.wkNew .product-item-1 .t2,.wkNew .product-item-2 .t2,.wkNew .product-item-3 .t2,.wkNew .product-item-4 .t2 {
	color: #7a7b78;
	font-size: 14px;
	text-align: left;
	text-indent: 0;
	position: relative;
	z-index: 9999;
	line-height: 20px;
	height: 40px;
	overflow: hidden;
	text-align: justify
}

.wkNew .product-item-3:before {
	content: "";
	bottom: -1px;
	width: 110%;
	height: 2px;
	background: #0046c8;
	position: absolute;
	left: -5%;
}

.wkNew .product-item-3:after {
	content: "";
	position: absolute;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: url("{!! theme_asset('images/wk/yuan.png') !!}") center / 100% 100%;
	left: -12px;
	bottom: -12px;
	z-index: 99
}

.product-item-4:after {
	content: "";
	position: absolute;
	width: 20px;
	height: 20px;
	border-radius: 50%;
	background: url("{!! theme_asset('images/wk/yuan.png') !!}") center / 100% 100%;
	right: -10px;
	top: -10px;
	z-index: 99
}

.wkNew .product-item-4 {
	padding-top: 20px;
	background: #f7f7f7;
}

.wkNew .product-item-4 .time,.wkNew .product-item-2 .time {
	width: 72px;
	height: 72px;
	background: #3372e7;
	line-height: 72px;
	text-align: center;
	color: #fff;
	font-size: 28px;
	position: relative;
	border-radius: 50%;
	margin: 0 auto;
	margin-top: 10px;
	text-indent: 0;
	font-weight: bold;
}

.wkNew .product-item-4 .time span {
	position: absolute;
	bottom: 0;
	color: #fff;
	font-size: 12px;
	left: 0;
	line-height: 24px;
	width: 100%;
	text-align: center;
}

.wkNew .product-item-4 .t1 {
	color: #3372e7;
	font-size: 25px;
	text-align: center;
	font-weight: bold;
}

.wkNew .product-item-4 .t2 {
	color: #7a7b78;
	font-size: 14px;
	text-align: center;
}

.wkProduct .product-item {
	padding: 0 10px
}

.wkProduct .product-item-box2 {
	background: #f5f7f9;
	overflow: hidden;
	height: 300px
}
.wkProduct .product-item-box2 a{display:block;}
.wkProduct .product-item-box2 .img {
	margin: 0;
}

.wkProduct .product-item-box2 .img img {
	width: 100%
}

.wkProduct .product-item-box2 p {
	color: #7a7b78;
	font-size: 14px;
	text-align: left;
	;line-height: 24px;
	position: relative;
	padding-left: 20px
}

.wkProduct .product-item-box2 p:before {
	content: "";
	position: absolute;
	width: 8px;
	height: 8px;
	background: #7a7b7c;
	border-radius: 50%;
	left: 5px;
	top: 7px
}

.wkProduct .product-item-box2 .test {
	padding: 10px 10px 0 10px;
}

.wkMt .new-item2 {
	background: #f2f8ff;
	padding: 0;
	margin: 0;
	border: 1px solid #eee;
}
.wkMt .new-item2 a{display:block;}
.wkMt .img {
	padding: 0;
	border: 1px solid #eee;
}

.wkMt .img img {
	width: 100%;
}

.wkMt .test {
	padding: 30px 30px 0 30px;
}

.wkMt .test .t1 {
	color: #3372e7;
	font-size: 24px;
	text-align: center;
	margin-top: 25px;
	line-height: 42px;
}

.wkMt .test .t2 {
	color: #7a7b78;
	font-size: 14px;
	text-align: center;
}

.branch {
	margin-bottom: 60px
}

.gg-img {
	width: 100%;
	background: #f7f7f7;
	padding-bottom: 80px
}

.gg-img img {
	max-width: 1200px;
	display: block;
	margin: 0 auto;
	width: 100%;
}

.product-item:hover p {
	color: #7a7b78;
}

.new {
	background: #fff;
	padding: 0;
}

.new-con {
	padding: 88px 0 0 0
}

@media (max-width: 1200px) {
	.con-title {
		height: 60px;
	}

	.con-title h1 {
		font-size: 40px
	}

	.wkNew .product-item {
		height: 480px
	}

	.wkNew .product-item-b {
		height: 240px
	}
}

@media (max-width: 992px) {
	/* 手机端 */
	.pcImg {
		display: none;
	}

	.h5Img {
		display: block;
	}

	.about-left {
		margin-top: 0
	}

	.about-con {
		font-size: 0.28rem;
	}

	.about-con p {
		text-indent: 2em;
		line-height: 0.42rem;
	}

	.about-right {
		padding: 0;
		font-size: 0.32rem;
		line-height: 0.42rem;
	}

	.about-con .mhidden {
		height: 0.42rem;
		overflow: hidden;
	}

	.about-right .more {
		line-height: 0.8rem;
		width: 2.528rem;
		height: 0.8rem;
		background: url("{!! theme_asset('images/btn.png') !!}") no-repeat center / 100% 100%;
		color: #fff;
		font-size: 0.28rem;
		margin: 0.1rem auto;
		text-indent: 2em;
		text-align: left;
		cursor: pointer;
		display: block;
	}

	.con-title {
		height: 1rem
	}

	.con-title h1 {
		font-size: 0.5rem
	}

	.tip-title:before {
		content: "";
		width: 1rem;
		height: 3px;
		background: #4083ff;
		border-radius: 3px 0 0 3px;
		position: absolute;
		bottom: 0;
		left: 50%;
		margin-left: -1rem;
	}

	.tip-title:after {
		content: "";
		width: 1rem;
		height: 3px;
		background: #00e0e0;
		border-radius: 0 3px 3px 0;
		position: absolute;
		bottom: 0;
		left: 50%;
	}

	.about, .product, .branch, .innovate {
		margin: 0.5rem 0;
	}

	.wkNew .product-item {
		height: auto;
	}

	.wkNew .product-item:nth-of-type(1) .product-item-2 .time {
		font-size: 0.28rem !important;
		line-height: 0.2rem !important;
	}

	.wkNew .product-item-b {
		padding: 0.1rem;
		min-height: 3.5rem;
		height: auto
	}

	.wkNew .product-item-b .title {
		font-size: 0.5rem;
		margin-top: 0.5rem;
		font-weight: bold;
	}

	.wkNew .product-item-b .des {
		font-size: 0.32rem;
	}

	.wkNew .product-item-1 {
		padding-top: 0.25rem;
	}

	.wkNew .product-item-1 .time {
		width: 1.2rem;
		height: 1.2rem;
		line-height: 1.2rem;
		font-size: 0.34rem;
	}

	.wkNew .product-item-1 .t1 {
		color: #3372e7;
		font-size: 0.3rem;
		margin-top: 0.1rem;
	}

	.wkNew .product-item-1 .t2 {
		color: #7a7b78;
		font-size: 0.24rem;
		text-align: left;
		height: auto;
		padding-bottom: 0.35rem
	}

	.wkNew .product-item-1:after {
		content: "";
		position: absolute;
		width: 0.4rem;
		height: 0.4rem;
		border-radius: 50%;
		background: url("/themes/pc/assets/images/wk/yuan.png") center / 100% 100%;
		left: 0.7rem;
		bottom: -0.2rem;
		z-index: 99
	}

	.wkNew .product-item-1:before {
		content: "";
		width: 0.05rem;
		height: 0.25rem;
		background: #0046c8;
		position: absolute;
		left: 0.87rem;
		bottom: 0.2rem;
	}

	.product-item-2:after {
		content: "";
		position: absolute;
		width: 0.4rem;
		height: 0.4rem;
		border-radius: 50%;
		background: url("/themes/pc/assets/images/wk/yuan.png") center / 100% 100%;
		right: 0.7rem;
		top: -0.2rem;
		z-index: 99
	}

	.wkNew .product-item-2:before {
		content: "";
		width: 0.05rem;
		height: 0.25rem;
		background: #0046c8;
		position: absolute;
		right: 0.87rem;
		top: 0.2rem;
	}

	.wkNew .product-item-2 {
		padding-top: 0.15rem;
		color: #7a7b78;
		font-size: 0.22rem;
		text-indent: 2em;
	}

	.wkNew .product-item-2 .t1 {
		color: #3372e7;
		font-size: 0.3rem;
		margin-top: 0.25rem
	}

	.wkNew .product-item-2 .t2 {
		color: #7a7b78;
		font-size: 0.24rem;
		text-align: center;
	}

	.wkNew .product-item-2 .time {
		width: 1rem;
		height: 1rem;
		line-height: 0.95rem;
		font-size: 0.32rem;
	}

	.wkNew .product-item .product-item-1 .t2:after, .wkNew .product-item .product-item-2 .t2:after {
		display: none
	}

	.wkProduct .product-item {
		padding: 0.05rem
	}

	.wkProduct .product-item-box2 p {
		font-size: 0.24rem;
		line-height: 0.42rem;
		padding-left: 0.2rem;
	}

	.wkProduct .product-item-box2 p:before {
		content: "";
		position: absolute;
		width: 0.08rem;
		height: 0.08rem;
		background: #7a7b7c;
		border-radius: 50%;
		left: 0.03rem;
		top: 0.15rem;
	}

	.new-con {
		padding: 0.5rem 0 0 0
	}

	.wkProduct .product-item-box2 {
		height: 5rem;
	}

	.wkProduct .product-item:nth-of-type(3) .product-item-box2,.wkProduct .product-item:nth-of-type(4) .product-item-box2 {
		height: 4.5rem
	}

	.about, .product, .innovate, .new {
		margin-top: 0.8rem
	}

	.wkMt .test {
		padding: 0.1rem
	}

	.wkMt .test .t1 {
		font-size: 0.32rem;
		text-align: center;
		margin-top: 0.1rem;
		line-height: 0.6rem;
	}

	.wkMt .test .t2 {
		color: #7a7b78;
		font-size: 0.26rem;
		text-align: center;
	}

	.wkMt .new-item2:nth-of-type(2) .img,.wkMt .new-item2:nth-of-type(6) .img {
		float: right
	}

	.wkMt .new-item2:nth-of-type(3) .test {
		float: right
	}
}


</style>
<div class="banner">
    <img class="pcImg" src="{!! theme_asset('images/wk/wk-banner.jpg') !!}" width="100%" alt="" />
	<img class="h5Img" src="{!! theme_asset('images/wk/h5banner.jpeg') !!}" width="100%" alt="" />
</div>
<!--<div class="banner">
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
            <div class="swiper-slide"><a href="#"><img src="{!! theme_asset('images/wk/wk-banner.jpg') !!}" width="100%" alt=""></a></div>
        </div>
        <div class="swiper-pagination swiper-pagination-banner"></div>
    </div>
</div>
<div class="h5banner">
    <div class="swiper-container swiper-container-banner">
        <div class="swiper-wrapper">
			<div class="swiper-slide"><a href="#"><img src="{!! theme_asset('images/wk/h5banner.jpeg') !!}" width="100%" alt=""></a></div>
        </div>
        <div class="swiper-pagination swiper-pagination-banner"></div>
    </div>
</div> -->
<!-- 关于我们 -->
<div class="about">
    <div class="container w1200">
        <div class="page-news-video about-left col-lg-5 col-md-5 col-sm-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s"  vid="ad514bee27b33a2c5572c56f97e62c5b_a" des="纵观全球养殖业，饲料中添加抗生素曾风靡一时。随着细菌耐药性、食品安全及环境污染等问题愈发突出，世界各国已相继采取饲料“禁抗”措施。2019年7月，中国农业农村部发布第194号公告，宣布除中药外的促生长类药物饲料添加剂在2020年全部退出市场。作为国内率先探索并布局饲料“无抗”领域的企业之一，溢多利积极响应国家号召，推动中国饲料“无抗”政策施行落地，为世界提供来自中国的“无抗”方案。">
           
                <img class="transition" src="{!! theme_asset('images/wk/wk-video.jpg') !!}" alt="" />
     
        </div>
        <div class="about-right col-lg-7 col-md-7 col-sm-12" style="padding-right:0;">
           
            <div class="about-con  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <p>纵观全球养殖业，饲料中添加抗生素曾风靡一时。随着细菌耐药性、食品安全及环境污染等问题愈发突出，世界各国已相继采取饲料“禁抗”措施。2019年7月，中国农业农村部发布第194号公告，宣布除中药外的促生长类药物饲料添加剂在2020年全部退出市场。作为国内率先探索并布局饲料“无抗”领域的企业之一，溢多利积极响应国家号召，推动中国饲料“无抗”政策施行落地，为世界提供来自中国的“无抗”方案。
</p>
<p class="mhidden" style="margin-top:20px">溢多利分子公司长沙世唯生物科技有限公司是国内最早的药用植物提取物生产厂家之一，公司研发的“博落回散”（商品名：美佑壮）是我国首个获得国家二类新中兽药证书的产品，具有极强的抗炎活性。溢多利充分发挥原本在酶制剂方面的优势，与药用植物提取物领域的成果完美结合，诞生了“博落回+酶制剂”组合方案，可产生1+1＞2的“抗炎、整肠、促生长”效果，极大推动了我国饲料“无抗”的进程，并在海外多个国家作为饲用抗生素替代方案稳定使用。溢多利，助力养殖业在饲料“无抗”背景下实现转型升级与绿色发展，助力人类实现更加健康、美好的生活。</p>
<!-- <p class="hiddle">......</p>-->
            </div>
			<div class="more  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".6s">了解详情</div>
        </div>
    </div>
</div>
<!-- 溢多利推进“无抗”养殖大事记 -->
<div class="product wkNew">
    <div class="container w1200">
        <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
    
            <h1>溢多利推进饲料“无抗”大事记</h1>
        </div>
        <div class="product-con clearfix">
			<div class="product-item col-lg-3 col-md-3 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                 <div class="product-item-b product-item-1">
				 <a target="_black" href="http://www.micolta.cn/intro/2.html">
					  <p class="time ">2011</span></p>
					  <p class="t1 mt10">悉心研发</p>
					  <p class="t2 ">曾建国教授作为国家中药材生产（湖南）技术中心主任，是享誉国内外的中草药博落回研究领域专家，其团队历经20年时间研制的“博落回散”（商品名：美佑壮）取得国家首个二类新中兽药证书。</p>
				  </a>
                </div>
				<div class="product-item-b product-item-2">
					<a target="_black" href="http://www.micolta.cn/intro/1.html">
					  <p class="time "style="font-size:18px;line-height:14px"></br>2012<br>-</br>2014</span></p>
					  <p class="t1 mt10">首度获批</p>
					  <p class="t2 ">“博落回散”被批准为我国首个中兽药类药物饲料添加剂，为国家禁用抗生素战略的早日施行提供了技术支持和产品储备。国家发改委批准设立兽用中药资源与中兽药创制国家地方联合工程中心，由湖南农业大学牵头，联合湖南美可达和湖南省中药提取工程研究中心有限公司等单位联合组建。</p>
					 </a>
                </div>
				
            </div>
			<div class="product-item col-lg-3 col-md-3 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-b product-item-1">
				<a target="_black" href="http://www.yiduoli.com/news_center/news/372">
                  <p class="time ">2016</span></p>
				  <p class="t1 mt10">加大科研投入</p>
				  <p class="t2 ">溢多利加大对“替抗”产品的科研投入，发布葡萄糖氧化酶等多款产品，其通过剂型处理，显著提高了耐温性，综合性能远超同类产品，对于替代抗生素的使用具有重要意义。</p>
				</a>
                </div>
				<div class="product-item-b product-item-2">
					<a target="_black" href="http://www.yiduoli.com/news_center/news/396">
					  <p class="time ">2017</span></p>
					  <p class="t1 mt10">举办新品发布会</p>
					  <p class="t2 ">溢多利举办“替抗”新品发布会，发布创新型酶制剂及高效植物提取系列明星产品“美佑壮”、“威特能”。</p>
					 </a>
                </div>
            </div>
			<div class="product-item col-lg-3 col-md-3 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-b product-item-1">
				<a  target="_black" href="http://www.yiduoli.com/about/profile/170">
                  <p class="time ">2018</span></p>
				  <p class="t1 mt10">战略布局</p>
				  <p class="t2 ">溢多利并购重组长沙世唯科技有限公司，进一步丰富了饲用抗生素替代产品线。</p>
				</a>
                </div>
				<div class="product-item-b product-item-2">
					<a target="_black" href="http://www.yiduoli.com/news_center/news/440">
					  <p class="time ">2019</span></p>
					  <p class="t1 mt10">再度获批</p>
					  <p class="t2 ">2019年7月，农业农村部发布第194号公告，停止生产含有促生长类药物饲料添加剂的商品饲料。同月，溢多利召开2019“无抗”组合产品发布会，生物酶制剂与植物提取物双擎并发。9月，溢多利植物提取物板块产品“博普总碱”及“博普总碱散”获批第2个国家二类新中兽药。</p>
					 </a> 
                </div>
            </div>
			<div class="product-item col-lg-3 col-md-3 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
                 <div class="product-item-b product-item-1">
                  <a target="_black" href="https://mp.weixin.qq.com/s/ULMMuoLrtm8s0klYUU6lqw">
                  <p class="time ">2020</span></p>
				  <p class="t1 mt10">“无抗”正当时</p>
				  <p class="t2 ">6月，农业农村部发布第307号公告：养殖场自配料不得违规添加禁用的抗生素。7月1日，溢多利在“无抗”日开展“无抗”宣言；9月，溢多利携“替抗”明星产品及方案亮相颐和论坛、2020中国畜牧业博览会、2020太阳鸟·养与创新大会，引起行业高度关注。</p>
				</a>
                </div>
				<div class="product-item-b product-item-2">
					<a >
					  <p class="time ">2021<span>......</span></p>
					  <p class="t1 mt10">未完待续</p>
					  <p class="t2 ">我们的脚步坚定且有力，未来将持续助力生态文明建设，共享绿色健康中国。</p>
					 </a> 
                </div>
		
            </div>
           
        </div>
    </div>
</div>
<div class="product wkProduct">
    <div class="container w1200">
        <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <h1>溢多利“替抗”明星产品</h1>
        </div>
        <div class="product-con clearfix"> 
			<div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-box2">
					<a target="_black" href="http://www.yiduoli.com/product/27">
                        <div class="img"><img  class="transition500" src="{!! theme_asset('images/wk/product1.jpg') !!}" alt=""></div>
                        <div class="transition500 test">
							<p>我国首个二类中兽药制剂产品</p>
							<p>第一个中兽药类药物饲料添加剂产品</p>
							<p>100%纯植物提取，无休药期</p>
						</div>
					</a>
                </div>
            </div>
			<div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-box2">
				<a target="_black" href="http://www.yiduoli.com/product/64">
                        <div class="img"><img  class="transition500" src="{!! theme_asset('images/wk/product3.jpg') !!}" alt=""></div>
                         <div class="transition500 test">
							<p>抑制有害菌生长繁殖</p>
							<p>替抗促生长</p>
							<p>调节畜禽肠道环境,改善肠道微生态平衡</p>
						</div>
                  </a>
                </div>
            </div>
			<div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-box2">
				<a target="_black" href="http://www.yiduoli.com/product/65">
                        <div class="img"><img  class="transition500" src="{!! theme_asset('images/wk/product2.jpg') !!}" alt=""></div>
                         <div class="transition500 test">
							<p>提升饲料利用率</p>
							<p>维持动物肠道微生态平衡</p>
							<p>增强动物免疫力</p>
						</div>
                  </a>
                </div>
            </div>
			
			<div class="product-item col-lg-3 col-md-3 col-sm-6 col-xs-6 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="product-item-box2">
				<a target="_black" href="http://www.yiduoli.com/product/32">
                        <div class="img"><img  class="transition500" src="{!! theme_asset('images/wk/product4.jpg') !!}" alt=""></div>
                        <div class="transition500 test">
							<p>修复受损肠道</p>
							<p>加强肠道免疫功能</p>
							<p>提高动物生长性能</p>
						</div>
                  </a>
                </div>
            </div>
          
        </div>
    </div>
</div>

<div class="new wkMt">
    <div class="container w1200">
        <div class="con-title tip-title  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <a href="#"><h1>媒体报道</h1></a>
        </div>
		<div class="new-con clearfix">
			
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <a target="_black" href="http://szb.farmer.com.cn/2020/20200829/20200829_008/20200829_008_4.htm?from=groupmessage">
				<div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n1.jpg') !!}"/></div>
				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					
					<div class="t1">农民日报</div>
					<div class="t2">博落回：种植效益高　产品能“替抗”</div>
				 </div>
				 </a>
            </div>
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
				<a target="_black" href="https://mp.weixin.qq.com/s/0ET3uixRxtpmJZSkm9lEVA">
                <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n2.jpg') !!}"/></div>
				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="t1">饲料行业信息网</div>
					<div class="t2">揭开博落回散的神秘面纱！探访溢多利“
替抗组合”背后的技术力量（二）</div>
				 </div>
				</a>
            </div>
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
				<a target="_black" href="https://mp.weixin.qq.com/s/aNkTTF96G7bg_nWECrZhCQ">

				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="t1">中国饲料工业信息网</div>
					<div class="t2">溢多利替抗方案助力猪业发展</div>
				 </div>
				  <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n3.jpg') !!}"/></div>
				  </a>
            </div>
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <a target="_black" href="https://mp.weixin.qq.com/s/remowap9FaZIEOD7D-sNFg">
                
				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="t1">新饲料newfeed</div>
					<div class="t2">呕心沥血三十年，“溢”马当先谱新篇<br>
——记深入广东溢多利参观交流学习</div>
				 </div>
				 <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n4.jpg') !!}"/></div>
				 </a>
            </div>
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <a target="_black" href="https://mp.weixin.qq.com/s/Nx1r6Flq3IXHEVwuzJw86Q">
                <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n5.jpg') !!}"/></div>
				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="t1">国外畜牧学猪与禽</div>
					<div class="t2">科研为本，品质为先，一劳永“溢”</div>
				 </div	>
				 </a>
            </div>
			<div class="new-item2 col-lg-6 col-md-6 col-sm-12 col-xs-12 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <a target="_black" href="https://mp.weixin.qq.com/s/Jccs1Drd3Z6gN_HUp81MbQ">
                <div class="img col-lg-6 col-md-6 col-sm-6 col-xs-6 "><img class="transition500" src="{!! theme_asset('images/wk/wk-n6.jpg') !!}"/></div>
				 <div class="test col-lg-6 col-md-6 col-sm-6 col-xs-6">
					<div class="t1">农牧舆情</div>
					<div class="t2">为什么说溢多利是替抗企业的优秀样本？</div>
				 </div>
				 </a>
				 
            </div>
		</div>
    </div>
</div>

<div class="branch wk-gg">
    <div class="container w1200">
        <div class="con-title tip-title wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <h1>中国农业农村部禁抗公告</h1>
        </div>
        
    </div>
</div>
<div class="gg-img wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
			<img src="{!! theme_asset('images/wk/wk-gg.jpg') !!}"/>
		   </div>

<script>
    $(function() {
		$("title").text('“无抗”时代 "溢"马当先 - 溢多利')
        var mySwiper = new Swiper('.swiper-container-banner', {
            // loop: true,
            // autoplay: 6000,
            pagination: '.swiper-pagination-banner',
            paginationClickable :true
        })
		var hiddenHeight = '';
		$(".about-right .more").on("click",function(){
			if($(this).hasClass("active")){
			
			$(".about-con .mhidden").css("height",hiddenHeight);
			$(this).removeClass("active").text("了解详情");
			}else{
			hiddenHeight = $(".about-con .mhidden").css("height");
			$(".about-con .mhidden").css("height","auto");
			$(this).addClass("active").text("收起详情");
			}
		})
    })
</script>
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
        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click",function(){
            $(".video-detail").hide();
			$("#player").html("")
        })
        $(".page-news-video").on("click",function(){
            var vid = $(this).attr("vid");
            var des = $(this).attr("des");
            $("#player").html("")
            $(".video-detail").fadeIn(200)
            var width = document.getElementById("playerBox").scrollWidth;
            var height = width*0.5625; // 16/9 = 0.5625;
            var player = polyvPlayer({
                wrap: '#player',
                autoplay:false,
                'width':width,
                'height':height,
                'vid' : vid
            });
            $("#playerBox .des").text(des)
        })

    })
</script>

