<!-- 内容 -->
<div class="main">
    <div class="container w1400">
        <?php echo Theme::widget('WebBreadcrumb')->render(); ?>

        <?php echo Theme::widget('NavTab',['nav_id' => $nav_tab_id])->render(); ?>

        <div class="article-detail clearfix  wow fadeInUp animated" data-wow-duration=".6s" data-wow-delay=".5s">
            <div class="news-detail-tab pull-left ">
                <ul>
                    <?php $__currentLoopData = app('nav_repository')->children($nav->parent_id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $nav_item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="<?php if(Route::currentRouteName() == $nav_item->slug): ?> active <?php endif; ?> transition500" ><a href="<?php echo e($nav_item->url); ?>"><?php echo e($nav_item->name); ?></a></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </ul>
            </div>
            <div class="news-detail-content pull-right nopadding">
                <div class="news-detail-article">
                    <?php echo $page->content; ?>

                </div>
            </div>

        </div>

    </div>
</div>