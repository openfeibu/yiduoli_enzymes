<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>

    </div>
    <div class="screen wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s" id="category_html">
        <?php echo $__env->make('product.category_html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>

    <div class="main product-list">
        <?php echo $__env->make('product_information.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </div>
</div>
<?php echo Theme::asset()->container('player')->scripts(); ?>

<div class="video-detail">
    <div class="video-detail-close"></div>
    <div id="video-detail-con">
        <div class="video-close"></div>
        <div id="playerBox">
            <div id='player'></div>
            <div class="des">这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍这是介绍</div>
        </div>

    </div>

</div>

<script>
    var url = "<?php echo e(route('pc.product_information')); ?>"
    var category_id;
</script>

<?php echo $__env->make('common.product_ajax', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<script>
    $(function() {

        $("body").on("click", ".page a", function () {
            var ajax_href= $(this).attr('ajax_href');
            if(!ajax_href || ajax_href == 'javascript' || ajax_href == '#')
            {
                return ;
            }
            showLoading();
            $.ajax({
                url : ajax_href,
                data : {'product_category_id' : category_id,'_token':"<?php echo csrf_token(); ?>"},
                type : 'get',
                dataType : "json",
                success : function (data) {
                    hideLoading();
                    var html = data.data.content;
                    console.log(html);
                    if(html)
                    {
                        $(".product-list").html(html);
                    }

                },
                error : function (jqXHR, textStatus, errorThrown) {
                    responseText = $.parseJSON(jqXHR.responseText);
                    var message =  responseText.msg;
                    if(!message)
                    {
                        message = '服务器错误';
                    }
                }
            });
        })
    })

</script>
<script>
    $(function() {
        $(".video-detail .video-detail-close,#video-detail-con .video-close").on("click",function(){
            $(".video-detail").fadeOut(200);
            $("#player").html("")
        })
        $("body").on("click",'.video',function(){
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