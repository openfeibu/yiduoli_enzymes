$(function() {
    $(".allPro-btn").hover(function() {
        $(this).find(".proNav-list").stop().slideDown(200)
    }, function() {
        $(this).find(".proNav-list").stop().slideUp(200)
    })
    $(".proNav-list-item").hover(function() {
        $(this).find(".proNav-last-box").stop().show()
    }, function() {
        $(this).find(".proNav-last-box").stop().hide()
    })

    $(".product-tab li").click(function() {
        var i = $(this).index(".product-tab li");
        $(".product-tab-des").hide().eq(i).fadeIn(200);
        $(this).addClass("active").siblings("li").removeClass("active")
    })

})