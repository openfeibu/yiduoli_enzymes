<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('product/create')); ?>"><?php echo e(trans('app.add')); ?></a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                </div>
                <div class="layui-inline">
                    <input type="text" name="product_category_id" id="category_tree"lay-verify="tree" autocomplete="off" placeholder="请选择分类(加载中)" class="layui-input search_key">
                </div>

                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="<?php echo e(trans('app.title')); ?>" autocomplete="off">
                </div>
                <div class="layui-inline">
                    <button class="layui-btn" data-type="reload"><?php echo e(trans('app.search')); ?></button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>

<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm layui-btn-normal" href="<?php echo e(guard_url('academic_report')); ?>?product_id={{ d.id }}"><?php echo e(trans('academic_report.name')); ?></a>
    <a class="layui-btn layui-btn-sm" lay-event="edit"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>
<script>
    var sizes = {};
    layui.use(['treeSelect', 'form', 'layer'], function () {
        var treeSelect= layui.treeSelect,
                form = layui.form,
                $ = layui.jquery,
                layer = layui.layer;

        treeSelect.render({
            elem: '#category_tree',
            data: '/product_categories_tree',
            headers: {},
            type: 'get',
            // 占位符
            placeholder: '请选择分类',
            //多选
            showCheckbox: false,
            //连线
            showLine: true,
            //选中节点(依赖于 showCheckbox 以及 key 参数)。
            //checked: [11, 12],
            //展开节点(依赖于 key 参数)
            spread: [1],
            // 点击回调
            click: function(obj){

            },
            // 加载完成后的回调函数
            success: function (d) {
                console.log(d);
            }
        });
    });
</script>

<script>
    var main_url = "<?php echo e(guard_url('product')); ?>";
    var delete_all_url = "<?php echo e(guard_url('product/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: '<?php echo e(guard_url('product')); ?>'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'<?php echo trans('app.title'); ?>',edit:'text'}
                ,{field:'vid',title:'<?php echo trans('product.label.vid'); ?>',edit:'text'}
                ,{field:'order',title:'<?php echo trans('app.order'); ?>',edit:'text'}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:280, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
        });


    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>