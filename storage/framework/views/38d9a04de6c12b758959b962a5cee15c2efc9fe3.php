<?php if($paginator->hasPages()): ?>
    <div class="page">
        
        <?php if($paginator->onFirstPage()): ?>
            <!--<div class="page-item transition500"><a ajax_href="javascript:;">第一页</a></div>-->
        <?php else: ?>
            <div class="page-item page-prev transition500"><a ajax_href="<?php echo e($paginator->previousPageUrl()); ?>"><</a></div>
        <?php endif; ?>
        
        <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
            <?php if(is_string($element)): ?>
                <div class="page-item transition500"><a ajax_href="javascript:;"><?php echo e($element); ?></a></div>
            <?php endif; ?>
            
            <?php if(is_array($element)): ?>
                <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($page == $paginator->currentPage()): ?>
                        <div class="page-item transition500 active"><a ajax_href="javascript:;"><?php echo e($page); ?></a></div>
                    <?php else: ?>
                        <div class="page-item transition500 "><a ajax_href="<?php echo e($url); ?>"><?php echo e($page); ?></a></div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        
        <?php if($paginator->hasMorePages()): ?>
            <div class="page-item page-next  transition500"><a ajax_href="<?php echo e($paginator->nextPageUrl()); ?>">></a></div>
        <?php else: ?>
            <!--<div class="page-item  transition500"><a ajax_href="javascript:;">最后一页</a></div>-->
        <?php endif; ?>
    </div>
<?php endif; ?>
