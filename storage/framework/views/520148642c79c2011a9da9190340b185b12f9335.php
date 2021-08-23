<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="<?php echo e(guard_url('product')); ?>" method="POST" lay-filter="fb-form">
                    <div class="layui-form-item fb-form-item">
                        <label class="layui-form-label">* 选择分类</label>
                        <div class="layui-input-inline">
                            <input type="hidden" name="product_category_id" >
                            <div id="product_category" class="demo-tree demo-tree-box" style="min-width: 200px;"></div>
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* <?php echo trans('app.title'); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="title" lay-verify="required" autocomplete="off" placeholder="请输入<?php echo trans('app.title'); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo trans('product.label.vid'); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="vid" placeholder="请输入<?php echo trans('product.label.vid'); ?>" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('product.label.images')); ?></label>
                        <?php echo $product->files('images')
                        ->url($product->getUploadURL('images'))
                        ->uploaders(); ?>

                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo trans('product.label.parameters'); ?></label>
                        <div class="layui-input-block parameters" >
                            <?php for($i=0;$i<10;$i++): ?>
                            <div class="parameters_group">
                            <input type="text" name="parameters_name[]" autocomplete="off" placeholder="参数名" class="layui-input" >:
                            <input type="text" name="parameters_value[]" autocomplete="off" placeholder="参数值" class="layui-input" >
                            </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo trans('product.label.instruction_title'); ?></label>
                        <div class="layui-input-inline">
                            <input type="text" name="instruction_title" autocomplete="off" placeholder="请输入<?php echo trans('product.label.instruction_title'); ?>" class="layui-input" >
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label"><?php echo e(trans('product.label.instruction')); ?></label>
                        <?php echo $product->files('instruction')
                        ->url($product->getFileURL('instruction'))
                        ->exts('pdf')
                        ->uploaderFile(); ?>

                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.description')); ?></label>
                        <div class="layui-input-block">
                            <textarea name="description" placeholder="请输入<?php echo e(trans('app.description')); ?>" class="layui-textarea"><?php echo e($product->description); ?></textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"><?php echo e(trans('app.content')); ?></label>
                        <div class="layui-input-block">
                            <script type="text/plain" id="content" name="content" style="height:240px;">

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">排序</label>
                        <div class="layui-input-inline">
                            <input type="text" name="order" autocomplete="off" placeholder="" class="layui-input" lay-verify="number"  value="0">
                        </div>
                    </div>
                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1"><?php echo e(trans('app.submit_now')); ?></button></div></div>
                    <?php echo Form::token(); ?>

                </form>
            </div>

        </div>
    </div>
</div>
<?php echo Theme::asset()->container('ueditor')->scripts(); ?>

<script>
    var ue = getUe();

    layui.use(['form','jquery'], function(){
        var form = layui.form;
        form.render();
        var $ = layui.$;
    });

</script>
<script>
    var sizes = {};
    layui.use(['treeSelect', 'form', 'layer','tree'], function () {
        var treeSelect= layui.treeSelect,
                tree = layui.tree
                form = layui.form,
                $ = layui.jquery,
                layer = layui.layer;
        var data = <?php echo $product_categories; ?>;
        tree.render({
            elem: '#product_category'
            ,id: 'product_category' //定义索引
            ,data: data
            ,showCheckbox: true

        });
        //监听提交
        form.on('submit(demo1)', function(data) {
            //获得选中的节点

            var checkData = tree.getChecked('product_category');

            var list = new Array();

            list = getChecked_list(checkData);

            console.log(checkData)

            console.log(list);

            $('input[name="product_category_id"]').val(list);


        });


        // 获取选中节点的id
        function getChecked_list(data) {
            var id = "";
            $.each(data, function (index, item) {
                if (id != "") {
                    id = id + "," + item.id;
                }
                else {
                    id = item.id;
                }
                var i = getChecked_list(item.children);
                if (i != "") {
                    id = id + "," + i;
                }
            });
            return id;
        }
    });
</script>
