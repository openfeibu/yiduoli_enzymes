<div class="page-title clearfix wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".4s">

    <?php if(isset($nav)): ?>
        <div class="page-title-c pull-left">
            <span><?php echo e($nav->name); ?></span>
        </div>
        <div class="page-title-e pull-left">
            <span>/</span><?php echo e($nav->en_name); ?>

        </div>
    <?php endif; ?>
    <div class="tab pull-right">
        <?php $__currentLoopData = $nav_tabs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="tab-item pull-left <?php if($nav_item->id == $nav->id): ?>active <?php endif; ?>"><a href="<?php echo e($nav_item->url); ?>"><?php echo e($nav_item->name); ?></a></div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>