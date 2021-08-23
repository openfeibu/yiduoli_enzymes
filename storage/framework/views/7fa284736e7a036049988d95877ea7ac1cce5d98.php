<!-- 内容 -->
<div class="main">

    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb',['top_product_category_id' => $top_product_category_id])->render(); ?>


        <?php if(!$search_key): ?>
        <div class="screen wow fadeInUp animated " style="box-shadow: none;" data-wow-duration=".6s" data-wow-delay=".5s" id="category_html">
            <?php echo $__env->make('product.category_html', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="product-main">
        <div class="container w1400 product-list">
            <?php echo $__env->make('product.list', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
</div>
<script>
    var url = "<?php echo e(route('pc.product.index')); ?>"
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
                data : {'product_category_id' : category_id,'search_key':"<?php echo e($search_key); ?>",'_token':"<?php echo csrf_token(); ?>"},
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