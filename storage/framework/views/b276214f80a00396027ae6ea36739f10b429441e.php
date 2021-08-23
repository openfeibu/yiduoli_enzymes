<div class="container w1400">
<?php $__currentLoopData = $lists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list_key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <ul class="<?php echo num_to_eng_tab($list_key); ?> clearfix category-tab" style="display: block">
        <?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li category_id="<?php echo e($category['id']); ?>" type="child" <?php if($category['active']): ?> class="active" <?php endif; ?>><?php echo e($category['name']); ?></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>