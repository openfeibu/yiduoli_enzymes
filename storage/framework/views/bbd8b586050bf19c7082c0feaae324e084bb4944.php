<div class="main">
    <div class="main_full" style="margin-top: 15px;">
        <div class="layui-col-md12">
            
            <div class="layui-card-box layui-col-space15  fb-clearfix">

                <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('product.index')): ?>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>产品总数</b>
                           <label>(个)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($product_count); ?></p>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('news.index')): ?>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>新闻总数</b>
							<label>(条)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($news_count); ?></p>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('video.index')): ?>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>视频总量</b>
                            <label>(个)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($video_count); ?></p>

                        </div>
                    </div>
                </div>
                <?php endif; ?>
                <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('page.company_announcement.index')): ?>
                <div class="layui-col-sm6 layui-col-md3">
                    <div class="layui-card">
                        <div class="layui-card-header">
                            <b>公告总数</b>
                            <label>(条)</label>
                            <span class="layui-badge layui-bg-blue layuiadmin-badge">总</span>
                        </div>
                        <div class="layui-card-body layuiadmin-card-list">
                            <p class="layuiadmin-big-font"><?php echo e($company_announcement_count); ?></p>
                        </div>
                    </div>
                </div>
                <?php endif; ?>


            </div>
			<div class="layui-card-box fb-clearfix layui-col-space15">
				
                <div class="layui-col-sm6 layui-col-md6">
				    <div class="power-box fb-clearfix">
                        <p>常用功能</p>
                        <div class="power-box-con">
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('news.index')): ?>
                            <div class="power-box-item layui-col-md6">
                                <a href="<?php echo e(guard_url('news')); ?>">
                                    <?php echo e(trans('news.name')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('video.index')): ?>
                            <div class="power-box-item layui-col-md6">
                                <a href="<?php echo e(guard_url('video')); ?>">
                                    <?php echo e(trans('video.name')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('product.index')): ?>
                            <div class="power-box-item layui-col-md6">
                                <a href="<?php echo e(guard_url('product')); ?>">
                                    <?php echo e(trans('product.name')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('page.company_announcement.index')): ?>
                            <div class="power-box-item layui-col-md6">
                                <a href="<?php echo e(guard_url('page/company_announcement')); ?>">
                                    <?php echo e(trans('company_announcement.name')); ?>

                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('page.chairman.index')): ?>
                                <div class="power-box-item layui-col-md6">
                                    <a href="<?php echo e(guard_url('page/chairman')); ?>">
                                        <?php echo e(trans('chairman.name')); ?>

                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('page.profile.index')): ?>
                                <div class="power-box-item layui-col-md6">
                                    <a href="<?php echo e(guard_url('page/profile')); ?>">
                                        <?php echo e(trans('profile.name')); ?>

                                    </a>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>

			    </div>
                <?php if(Auth::user()->isSuperuser() || Auth::user()->hasPermission('feedback.index')): ?>
				<div class="layui-col-sm6 layui-col-md6">
                    <div class="message">
                        <div class="message-t"><a href="<?php echo e(guard_url('feedback')); ?>">最新留言</a></div>
                        <div class="message-con">
                            <?php $__currentLoopData = $feedbacks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feedback): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                             <div class="message-item fb-clearfix">
                                <div class="message-item-l layui-col-sm6 layui-col-md6"><?php echo e($feedback->created_at); ?></div>
                                <div class="message-item-l layui-col-sm6 layui-col-md6"><?php echo e($feedback->content); ?></div>
                             </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         </div>
                    </div>
				</div>
                <?php endif; ?>
			</div>
          
        </div>
    </div>
</div>
