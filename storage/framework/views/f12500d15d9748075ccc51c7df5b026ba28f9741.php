<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('product_category/'.$product_category->id)); ?>" method="post" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">上级</label>

                        <div class="layui-input-block">
                            <p class="input-p"><?php echo e($product_category->parent_names ?? '顶级'); ?></p>
                        </div>

                    </div>

                    <div class="layui-form-item fb-form-item2">
                        <label class="layui-form-label">* <?php echo e(trans('product_category.label.name')); ?></label>

                        <div class="layui-input-block">
                            <input type="text" name="name" lay-verify="required" autocomplete="off" class="layui-input" value="<?php echo e($product_category->name); ?>">
                        </div>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number"  value="<?php echo e($product_category->order); ?>">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-input-block">
                            <button class="layui-btn layui-btn-submit" lay-submit="" lay-filter="demo1"><?php echo e(trans('app.submit_now')); ?></button>
                        </div>
                    </div>
                    <?php echo Form::token(); ?>

                    <input type="hidden" name="_method" value="PUT">
                </form>
            </div>

        </div>
    </div>
</div>
<script>

</script>