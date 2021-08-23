<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        {!! Theme::widget('WebBreadcrumb')->render() !!}
        {!! Theme::widget('NavTab')->render() !!}
        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="feedback">
                <div class="feedback-des">为了给您提供更好的网上服务，您可以把建议反馈给我们。您的建议对我们很重要，我们将致力于倾听、
                    挖掘和满足您的需求，提供更安全，更人性化的用户体验。</div>
                <form action="#" class="clearfix" onsubmit="return postFeedback()">
                    <div class="clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 feedback-input">
                            <input type="text" placeholder="姓名：" class="feedback-name" name="">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 feedback-input">
                            <input type="text" placeholder="联系方式：" class="feedback-phone">
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 feedback-input">
                            <input type="text" placeholder="邮箱：" class="feedback-email">
                        </div>
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 feedback-textarea">
                            <textarea name="" id="" cols="30" rows="10" placeholder="留言：" class="feedback-content"></textarea>
                        </div>
                    </div>
                    <div class="error-des">dad</div>
                    <div class="feedback-btn">
                        <input type="submit" value="提交信息" />
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
<script>

    function postFeedback(){
        var name = $(".feedback-name").val();
        var phone = $(".feedback-phone").val();
        var email = $(".feedback-email").val();
        var content = $(".feedback-content").val();
        var myreg=/^[1][2,3,4,5,6,7,8,9][0-9]{9}$/;
        var myreg2 = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        $(".error-des").hide().text("")
        if(name.length == 0){
            $(".error-des").fadeIn().text("姓名不可为空")
            return false
        }
        if (!myreg.test(phone)) {
            $(".error-des").fadeIn().text("手机号码格式错误")
            return false;
        }
        if (!myreg2.test(email)) {
            $(".error-des").fadeIn().text("邮箱格式错误")
            return false;
        }
        if(content.length <= 10){
            $(".error-des").fadeIn().text("反馈内容不可小于10个字")
            return false
        }

    }
</script>