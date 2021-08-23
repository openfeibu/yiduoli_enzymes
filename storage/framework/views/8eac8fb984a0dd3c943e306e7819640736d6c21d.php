<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb',['product_category_id' => $product->product_category_id])->render(); ?>

        <div class="pro-detail-con">
            <div class="pro-detail-con-t clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">
                <div class="pro-detail-img pull-left ">
                    <div class="swiper-container swiper-container-pro">
                        <div class="swiper-wrapper">
                            <?php $__currentLoopData = $product->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="swiper-slide">
                                <a href="<?php echo e('/image/original'.$image); ?>"><img src="<?php echo e('/image/original'.$image); ?>" width="100%"></a>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="swiper-pagination swiper-pagination-pro"></div>
                    </div>
                </div>
                <div class="pro-detail-test">
                    <div class="pro-title"><?php echo e($product->title); ?></div>
                    <div class="pro-des"><?php echo e($product->description); ?></div>
                    <div class="pro-btn clearfix">
                        <?php if($product->vid): ?>
                        <div class="btn-video transition page-news-video" vid = "<?php echo e($product->vid); ?>" des="<?php echo e($product->description); ?>">产品视频</div>
                        <?php endif; ?>
                        <?php if($product->instruction): ?>
                        <div class="btn-dz transition"><a href="<?php echo e('/image/original'.$product->instruction); ?>" target="_blank">电子说明书</a></div>
                        <?php endif; ?>
                        <?php if(count($academic_reports)): ?>
                        <div class="btn-bg transition"><a href="<?php echo e(route('pc.academic_report')); ?>?product_id=<?php echo e($product->id); ?>" target="_blank">学术报告</a></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="pro-detail-con-c clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
                <div class="pro-detail-con-c-left pull-left">
                    <div class="parameter clearfix">
                        <?php if($product->parameters): ?>
                        <div class="parameter-t">产品参数：</div>
                        <ul>
                            <?php $__currentLoopData = $product->parameters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $name => $parameter): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="col-lg-4 col-md-4 col-sm-6 col-xs-6 "><?php echo e($name); ?>：<?php echo e($parameter); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                        <?php endif; ?>
                    </div>
                    <div class="pro-detail-detail">
                        <?php echo $product->content; ?>

                    </div>
                </div>
                <div class="news-detail-right pull-right">
                    <div class="news-detail-right-t">相关产品</div>
                    <div class="news-detail-right-c">
                        <?php $__currentLoopData = $related_products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="news-detail-right-c-item clearfix">
                            <a class="clearfix" href="<?php echo e(route('pc.product.show',$product->id)); ?>">
                                <div class="img"><img class="transition500" src="<?php echo e('/image/original'.$product->image); ?>" alt=""></div>
                                <div class="test">
                                    <p class="fb-overflow-2"><?php echo e($product->title); ?></p>
                                    <span><?php echo e($product->created_at->format('Y-m-d')); ?></span>
                                </div>
                            </a>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

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
    $(function() {
        var mySwiper = new Swiper('.swiper-container-pro', {
            loop: true,
            autoplay: 6000,
            autoHeight: true,
            pagination: '.swiper-pagination-pro',
            paginationClickable :true
        });

       
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
