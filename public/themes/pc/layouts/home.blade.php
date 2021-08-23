<!DOCTYPE HTML>
<html class=" fb-web oxh">

<head>
    <meta charset="utf-8">
    @if(Theme::has('referrer'))
        <meta name="referrer" content="{{ Theme::getReferrer() }}">
    @endif
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,minimum-scale=1.0,user-scalable=0">
    <meta name="format-detection" content="telephone=no">
    <title>{{ setting('station_name') }}_生物酶制剂_功能性饲料_功能性饲用产品</title>
    <meta name="description" content="广东溢多利生物科技股份有限公司成立于1991年，总部位于广东省珠海市。公司专注于生物工程领域，围绕生物医药和生物农牧两大产业，研发并形成了生物酶制剂、甾体激素原料药、功能性饲料添加剂三大系列产品线，同时为行业客户持续提供整体生物技术解决方案，是我国生物酶制剂行业首家上市企业，全球极具竞争力的甾体激素医药企业。">
    <meta name="keywords" content="广东溢多利生物科技股份有限公司,溢多利,生物酶制剂,甾体激素原料药,功能性饲料,博溢康,溢倍康,威特能,杜力锭,溢多利博落回散,功能性饲用产品,">
	<link rel="canonical" href="{!! url()->full() !!}">
    {!! Theme::asset()->styles() !!}
    {!! Theme::asset()->scripts() !!}
    <!--[if lte IE 9]>
    {!! Theme::asset()->container('ie9')->scripts() !!}
    <![endif]-->
    <script>
        csrf_token = "{!! csrf_token() !!}";
    </script>


</head>
<!--[if lte IE 9]>
<div class="text-xs-center marginBottom0 bg-blue-grey-100 alert">
    <button type="button" class="close" aria-label="Close" data-dismiss="alert">
        <span>×</span>
    </button>
    你正在使用一个 <strong>过时</strong> 的浏览器。请 <a href=https://browsehappy.com/ target=_blank>升级您的浏览器</a>，以提高您的体验。</div>
<![endif]-->
<body>
{!! Theme::partial('header') !!}

{!! Theme::content() !!}

<!-- 尾部 -->
{!! Theme::partial('footer') !!}
<!-- 移动端导航 -->
{!! Theme::partial('mobile_header') !!}

{!! Theme::partial('fixed_nav') !!}
</body>


</html>