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
                    <div class="content_2">
                        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <table style="line-height:30px;font-size:14px;padding-left:20px" class="ke-zeroborder" width="780" border="0" cellpadding="0" cellspacing="0">
                            <tbody><tr>
                                <td valign="top" width="180" align="left"><img src="<?php echo e('/image/original/'.$page->image); ?>" alt="" style="display:block;" border="0"></td>
                                <td style="line-height:30px;font-size:14px;padding-left:20px" valign="top" align="left">
                                    <span style="color:#008d43;"><?php echo e($page->title); ?></span>
                                    <?php if($page->description): ?>
                                    <br><?php echo e($page->description); ?>

                                    <?php endif; ?>
                               </td>
                            </tr>
                            </tbody>
                        </table>
                        <div style="padding:10px 0;"><hr style="padding:0;margin:0;height:0;line-height:0;overflow:hidden;width:100%;border:none;border-bottom:solid 1px #ccc;">
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>