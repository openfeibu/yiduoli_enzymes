<div class="page-product-con clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
    <?php if(count($products)): ?>
    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="page-product-item clearfix col-lg-3 col-md-3 col-sm-6 col-xs-6">
            <a href="<?php echo e(route('pc.product.show',$product->id)); ?>" target="_blank">
                <div class="img "><img class="transition500" src="<?php echo e('/image/original'.$product->image); ?>" alt=" <?php echo e($product->title); ?>"></div>
                <div class="test transition">

                    <div class="title fb-overflow-1">
                        <?php echo e($product->title); ?>

                    </div>

                </div>
            </a>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php else: ?>
        <div class="nodata">
            <div class="img "><img class="transition500" src="<?php echo e('/image/original'.setting('logo')); ?>" alt=" "></div>
            <div class="test">该分类没有产品，如有任何问题请联系我们</div>
        </div>
    <?php endif; ?>
</div>
<?php echo $products->links('common.ajax_pagination'); ?>