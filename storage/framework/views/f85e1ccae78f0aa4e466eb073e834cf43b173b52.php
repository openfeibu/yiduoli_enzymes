
<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab')->render(); ?>

        <div class="text-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="course">
                <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="course-item">
                    <div class="time"><?php echo e($course['year']); ?>年<?php echo e($course['month'] ? $course['month'].'月' : ''); ?></div>
                    <div class="con"><?php echo $course['description']; ?></div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>