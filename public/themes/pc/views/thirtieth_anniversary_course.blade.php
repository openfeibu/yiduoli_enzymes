<style>
body,p{font-family:"Microsoft YaHei" !important}
    .pcImg {
        display: block;
    }

    .h5Img {
        display: none;
    }

    .w1200 {
        max-width: 1200px !important;
    }

    .product, .innovate, .new {
        margin-top: 100px;
    }
	
    .about {
		  margin-top: 120px;
		  padding-bottom:100px;
        margin-bottom: 0;
		
    }

    .about-left {
        margin-top: 0;
        position: relative;
        z-index: 999;
        cursor: pointer;
		padding-left:40px;
		float:right;
    }

    .about-right {
        padding: 30px 15px 0 25px;
    }

 
    .about-con {
        font-size: 20px;
        margin-top: 0;
        margin-bottom: 0
    }

    .about-con p {
        text-indent: 2em;
        line-height: 35px;
        text-align: justify
    }

    .about-con .mhidden {
        height: 32px;
        overflow: hidden;
    ;
    }

    .about-right .more {

        cursor: pointer;
        line-height: 33px;
        width: 138px;
        height: 33px;
        background: #e60012;
        color: #fff;
        font-size: 16px;
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
	  .about-right{position:relative}
	.about-bg{position:absolute;width:765px;height:375px;background: url("{!! theme_asset('images/30/videoBg.png') !!}") no-repeat center / 100% 100%;left:-57px;top:70px}
	.con-title{height:80px}
    .con-title h1 {
		height:80px;
		line-height:80px;
        font-size: 50px;
        color: #3e3f3f;
    }
	.tip-title2{text-align:center; vertical-align: top;line-height:50px}
	.tip-title2 h1{
		display:inline-block;
		*display:inline-block;
		*zoom:1;
		vertical-align: middle;
		color:#3e3a39;font-szie:50px;font-weight:bold;
	}
    .tip-title2:before {
        content: "";
        width: 10px;
        height: 10px;
        background: #3e3a39;
		margin-right:10px;
		vertical-align: middle;
        border-radius: 50%;
		display:inline-block;
		*display:inline-block;
		*zoom:1;
    }

    .tip-title2:after {
       content: "";
        width: 10px;
        height: 10px;
margin-left:10px;
		vertical-align: middle;
        background: #3e3a39;
        border-radius: 50%;
		display:inline-block;
		*display:inline-block;
		*zoom:1;
    }
	.tip-title2-des{color:#dcdddd;font-size:28px;text-align:center;font-weight:bold;}
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
			height:2.5rem
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
           
			 cursor: pointer;
			line-height: 0.6rem;
			width: 2.5rem;
			height: 0.6rem;
			background: #e60012;
			color: #fff;
			font-size: 0.28rem;
			margin: 0.3rem 0;
			text-indent: 1.5em;
			text-align: left;
			cursor: pointer;
			display: block;
        }

        .con-title {
            height: 1rem
        }

        .con-title h1 {
			height:1rem;line-height:1rem;
            font-size: 0.5rem
        }
		.tip-title2:before {
        content: "";
        width: 10px;
        height: 10px;
        background: #3e3a39;
		margin-right:10px;
		vertical-align: middle;
        border-radius: 50%;
		display:inline-block;
		*display:inline-block;
		*zoom:1;
    }

    .tip-title2:after {
       content: "";
        width: 10px;
        height: 10px;
margin-left:10px;
		vertical-align: middle;
        background: #3e3a39;
        border-radius: 50%;
		display:inline-block;
		*display:inline-block;
		*zoom:1;
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

        .about, .product, .innovate, .new,.vision {
            margin: 1.2rem 0 ;
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

<style>
.developmentCourse-con{
 background: url("{!! theme_asset('images/30/bg.jpg') !!}") no-repeat top center / 100% auto;
 padding:75px 0;
 margin:75px 0 0 0;
 position:relative;
 transition:height 0.5s;
}

.developmentCourse-item{height:185px;position:relative;z-index:100;display:none;}

.developmentCourse-item .time{color:#e60012;font-size:30px}
.developmentCourse-item .des{color:#595757;font-size:20px;line-height:34px;}
.developmentCourse-item .img{height:150px;margin:15px 0 0  0}
.developmentCourse-item .img img{height:150px;}
.developmentCourse-item .des{text-align:justify}
.developmentCourse-item .developmentCourse-item-left{ position:relative;padding-right:65px;}
.developmentCourse-item .developmentCourse-item-left:before{content:"";position:absolute;width:28px;height:28px; background: url("{!! theme_asset('images/30/dian.png') !!}") no-repeat center / 100% 100%;right:-14px;top:5px;}
.developmentCourse-item .developmentCourse-item-right{float:right;padding-left:65px;}
.developmentCourse-item .developmentCourse-item-right:before{content:"";position:absolute;width:28px;height:28px; background: url("{!! theme_asset('images/30/dian.png') !!}") no-repeat center / 100% 100%;left:-14px;top:10px;z-index:100}
.developmentCourse-more{
	position:absolute;
    line-height: 33px;
    width: 138px;
    height: 33px;
    background: #e60012;
    color: #fff;
    font-size: 16px;
    margin: 10px 0;
    text-indent: 1.5em;
    text-align: left;
    cursor: pointer;
    display: block;
	left:50%;
	margin-left:150px;
	bottom:100px
}
.developmentCourse-more a{color:#fff;font-size:16px;}
.car{position:absolute;width:60px;left:0;right:0;margin:0 auto;height:200px;background:#fff url("{!! theme_asset('images/30/carBg.png') !!}") repeat-y center / 100% auto;z-index:99;top:-35px; transition:all 0.5s;}


.carLogo{background:#fff url("{!! theme_asset('images/loadingLogo.png') !!}") no-repeat center / 40px auto; width:50px;height:50px;border-radius:50%;box-shadow: 0 5px 20px #eee;position:absolute;top:0;z-index:101;left:50%;margin-left:-25px; }
 @media (max-width: 1200px) {
		
    }	

@media (max-width: 992px) {
		.car{position:absolute;width:0.8rem;left:0.1rem;margin:0;height:2rem;background:#fff url("{!! theme_asset('images/30/carBg.png') !!}") repeat-y center / 100% auto;z-index:99;top:-0.35rem; transition:all 0.5s;}


		.carLogo{background:#fff url("{!! theme_asset('images/loadingLogo.png') !!}") no-repeat center / 0.5rem auto; width:0.6rem;height:0.6rem;border-radius:50%;box-shadow: 0 0.05rem 0.2rem #eee;position:absolute;top:0;z-index:101;left:0.2rem;margin-left:0; }
		
		.developmentCourse-con{
			 padding:20px 0;
			 margin:0.8rem 0 0 0;
		}
		.tip-title2-des{font-size:0.35rem}
	
		.developmentCourse-item{height:auto;position:relative;}
		.developmentCourse-item .time{color:#e60012;font-size:0.4rem}
		.developmentCourse-item .des{color:#595757;font-size:0.26rem;line-height:0.42rem;}
		.developmentCourse-item .img{height:1.8rem;margin:0.15rem 0 0  0}
		.developmentCourse-item .img img{height:1.8rem;}
		.developmentCourse-item .developmentCourse-item-left{padding-right:0;padding-left:0.8rem;margin-bottom:0.5rem;}
		.developmentCourse-item .developmentCourse-item-left:before{content:"";position:absolute;width:0.4rem;height:0.4rem; background: url("{!! theme_asset('images/30/dian.png') !!}") no-repeat center / 100% 100%;left:-0.05rem;top:5px;}
		.developmentCourse-item .developmentCourse-item-right{float:left;padding-left:0.8rem;margin-bottom:0.5rem;}
		.developmentCourse-item .developmentCourse-item-right:before{content:"";position:absolute;width:0.4rem;height:0.4rem; background: url("{!! theme_asset('images/30/dian.png') !!}") no-repeat center / 100% 100%;left:-0.05rem;top:5px;}
		.developmentCourse-more{
			position:relative;
			    cursor: pointer;
				line-height: 0.6rem;
				width: 2.5rem;
				height: 0.6rem;
				background: #e60012;
				color: #fff;
				font-size: 0.28rem;
				margin: 0.3rem 0;
				text-indent: 1.5em;
				text-align: left;
				cursor: pointer;
				display: block;
				top:0;
				left:1rem;
				float:left

		}
		.developmentCourse-more a{color:#fff;font-size:0.28rem;}


	}
</style>

<div class="product developmentCourse">

        <div class="con-title tip-title2 wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".3s">
            <h1>发展历程</h1>
        </div>
		<div class="tip-title2-des wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">DEVELOPMENT HISTORY</div> 
		
		<div class="developmentCourse-con clearfix">
			<div class="car">
				
			</div>
			<div class="carLogo"></div>
			<div class="container w1200">
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">1991年</div>
					   <div class="des">珠海经济特区溢多利酶制剂有限公司成立，标志中国饲用酶制剂工业的起步，从此打破国外企业垄断的市场格局。</div>
					   <div class="img">
						<img  class="" src="{!! theme_asset('images/30/1991.png') !!}" alt="" />
					   </div>
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">1997年</div>
					   <div class="des">溢多利位于珠海南屏科技工业园的生产基地一期工程竣工。</div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">1998年</div>
					   <div class="des">溢多利被认定为广东省高新技术企业。</div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">1999年</div>
					   <div class="des">溢多利在中国农业大学、南京农业大学等十几所高等院校捐资设立溢多利教育基金。</div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2001年</div>
					   <div class="des">珠海经济特区溢多利有限公司完成股份改制，整体变更设立为广东溢多利生物科技股份有限公司，为公司迈向资本市场奠定基础</div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2003年</div>
					   <div class="des">广东省饲料添加剂生物工程技术研究开发中心依托溢多利组建成立；溢多利负责起草的《饲料用酶制剂通则》由农业部颁布施行；“溢多酶”被认定为“广东省名牌产品”</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2003.png') !!}" alt="" />
					   </div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2005年</div>
					   <div class="des">溢多利被评为“全国三十强饲料企业”。</div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2008年</div>
					   <div class="des">溢多利被认定为行业首批国家级高新技术企业。</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2008.png') !!}" alt="" />
					   </div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2014年</div>
					   <div class="des">溢多利在深交所挂牌上市，成为中国首家酶制剂上市企业；溢多利成功并购重组湖南鸿鹰生物科技有限公司，酶制剂产品从饲用延伸至食品、能源、洗涤、纺织等其他工业用酶制剂领域。</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2014.png') !!}" alt="" />
					   </div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2015年</div>
					   <div class="des">溢多利国家级博士后科研工作站获批成立；溢多利成功并购重组湖南新合新生物医药有限公司、河南利华制药有限公司，正式进入生物医药产业，步入跨越式发展快车道。</div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2016年</div>
					   <div class="des">溢多利总部研发与办公大楼落成；新产学研示范基地建成并投入使用。</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2016.png') !!}" alt="" />
					   </div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2017年</div>
					   <div class="des">溢多利在湖南全面启动“溢多利生物医药产业园”投资建设，打造全球一流的产业基地；溢多利荣登福布斯2017年中国上市公司潜力百强企业榜。</div>
					   
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2018年</div>
					   <div class="des">溢多利荣获“国家认定企业技术中心”；并购重组长沙世唯科技有限公司，提前布局饲用替抗产品。</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2018.png') !!}" alt="" />
					   </div>
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2019年</div>
					   <div class="des">溢多利饲用替抗产品发布会备受行业及媒体广泛关注，迎接饲料无抗新时代。</div>
					   <div class="img">
							<img  class="" src="{!! theme_asset('images/30/2019.png') !!}" alt="" />
					   </div>
					</div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class=" developmentCourse-item-left col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2020年</div>
					   <div class="des">新年伊始，应对新冠疫情，溢多利第一时间复工复产，全力保障客户产品需求。7月1日中国饲料禁抗政策正式施行，溢多利率先推出多种饲用替抗产品和解决方案，深受客户好评和认可。</div>
					   
					  
				   </div>
				</div>
				<div class="developmentCourse-item  col-lg-12 col-md-12 col-sm-12 col-xs-12 wow bounceIn animated" data-wow-duration=".6s" data-wow-delay=".5s">
					<div class="developmentCourse-item-right col-lg-6 col-md-6 col-sm-12 col-xs-12">
					   <div class="time">2021年</div>
					   <div class="des">溢多利成立30周年</div>
					   
					</div>
				</div>
			
			</div>
		</div>
</div>



<script>
    $(function() {
        $("title").text('30th而溢 扬帆奋进 - 溢多利');
		setTimeout(function(){$(window).scrollTop(0)},100)
		
		 var screen_width = window.screen.width;
		 var screen_height = window.screen.height;    

		 //根据屏幕分辨率判断是否是手机
		 if(screen_width < 750 ){
			
	
			var index = 0;
			var timr=null;
			var runing =  false;
			var over = false;
			var carLogoHeight = 15;
			function getScrollTop() {  
				var scrollPos;  
				if (window.pageYOffset) {  
				scrollPos = window.pageYOffset; }  
				else if (document.compatMode && document.compatMode != 'BackCompat')  
				{ scrollPos = document.documentElement.scrollTop; }  
				else if (document.body) { scrollPos = document.body.scrollTop; }   
				return scrollPos;   
			}
			
			function run(){
				console.log(index)
				$(".developmentCourse-item").eq(index).show();
				
				if(index != 0){
					carLogoHeight += parseFloat($(".developmentCourse-item").eq(index-1).height());
				}
				console.log(carLogoHeight)

				
				$(".carLogo").animate({"top":carLogoHeight+'px'},1000,function(){		
					runing = false;
					if(index == 15){
						over = true;
					}
				})
				$(".car").css({'height':carLogoHeight+150+'px'})
				timr = setTimeout(function(){
					
					if(ifGo()){
						if(!runing && !over){
							runing = true;
							index++;
							run();
							}
						}
					
				},1200)
				
			}
				function ifGo(){
					var footerHeight = parseFloat($(".footer").height());
					var scrollTop = parseFloat(getScrollTop());
					var windowHeight = parseFloat($(window).height());
					var bodyHeight = parseFloat($(document.body).outerHeight(true));
				
					if(bodyHeight - footerHeight -scrollTop <= windowHeight+10){
						return true;
					}
					return false;
				}
				$(window).scroll(function(){
					if(ifGo()){
						if(!runing && !over){
							clearTimeout(timr);
							runing = true;
							index++;
							run();
						}
					}
					
				})
				run();
		 }else{
		
		
			var index = 0;
			var timr=null;
			var runing =  false;
			var over = false;
			function getScrollTop() {  
				var scrollPos;  
				if (window.pageYOffset) {  
				scrollPos = window.pageYOffset; }  
				else if (document.compatMode && document.compatMode != 'BackCompat')  
				{ scrollPos = document.documentElement.scrollTop; }  
				else if (document.body) { scrollPos = document.body.scrollTop; }   
				return scrollPos;   
			}
			
			function run(){
				console.log(index)
				var carLogoHeight = index*185+80;

				$(".developmentCourse-item").eq(index).show();
				$(".carLogo").animate({"top":carLogoHeight+'px'},1000,function(){		
					runing = false;
					if(index == 15){
						over = true;
					}
				})
				$(".car").css({'height':(index+1)*185+80+'px'})
				timr = setTimeout(function(){
					
					if(ifGo()){
						if(!runing && !over){
							runing = true;
							index++;
							run();
							}
						}
					
				},1200)
				
			}
				function ifGo(){
					var footerHeight = parseFloat($(".footer").height());
					var scrollTop = parseFloat(getScrollTop());
					var windowHeight = parseFloat($(window).height());
					var bodyHeight = parseFloat($(document.body).outerHeight(true));
					console.log(footerHeight,scrollTop,windowHeight,bodyHeight)
					if(bodyHeight - footerHeight -scrollTop <= windowHeight+50){
						return true;
					}
					return false;
				}
				$(window).scroll(function(){
					if(ifGo()){
						if(!runing && !over){
							clearTimeout(timr);
							runing = true;
							index++;
							run();
						}
					}
					
				})
				run();
		 }
    })
</script>


