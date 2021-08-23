<div class="main">
    <?php echo Theme::widget('breadcrumb')->render(); ?>

    <div class="main_full">
        <?php echo Theme::partial('message'); ?>

        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="<?php echo e(guard_url('news/create')); ?>"><?php echo e(trans('app.add')); ?></a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del"><?php echo e(trans('app.delete')); ?></button>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="<?php echo e(trans('app.search')); ?><?php echo e(trans('page.label.title')); ?>" autocomplete="off">
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
<script type="text/html" id="checkboxHomeRecommendTEM">
    <input type="checkbox" name="home_recommend" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="home_recommend" {{ d.home_recommend ? 'checked' : '' }}>
</script>
<script type="text/html" id="checkboxHotRecommendTEM">
    <input type="checkbox" name="hot_recommend" value="{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="hot_recommend" {{ d.hot_recommend ? 'checked' : '' }}>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" href="<?php echo e(guard_url('news')); ?>/{{ d.id }}"><?php echo e(trans('app.edit')); ?></a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del"><?php echo e(trans('app.delete')); ?></a>
</script>
<script type="text/html" id="imageTEM">
    <a href="{{d.image_url}}" target="_blank"><img src="{{d.image_url}}" alt="" height="28"></a>
</script>

<script>
    var main_url = "<?php echo e(guard_url('news')); ?>";
    var delete_all_url = "<?php echo e(guard_url('news/destroyAll')); ?>";
    layui.use(['jquery','element','table'], function(){
        var table = layui.table;
        var form = layui.form;
        var $ = layui.$;
        table.render({
            elem: '#fb-table'
            ,url: main_url
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'title',title:'<?php echo e(trans('page.label.title')); ?>',edit:'text' , width:280}
                ,{field:'description',title:'<?php echo e(trans('page.label.description')); ?>',edit:'text' , width:280}
                ,{field:'image',title:'<?php echo e(trans('page.label.image')); ?>', toolbar:'#imageTEM', width:120}
                ,{field:'home_recommend',title:'<?php echo e(trans('app.home_recommend')); ?>', width:120,toolbar:'#checkboxHomeRecommendTEM' }
                ,{field:'hot_recommend',title:'<?php echo e(trans('app.hot_recommend')); ?>', width:120,toolbar:'#checkboxHotRecommendTEM' }
                ,{field:'order',title:'排序', width:80,edit:'text'}
                ,{field:'views_count',title:'<?php echo e(trans('app.views_count')); ?>', width:120}
                ,{field:'updated_at',title:'<?php echo e(trans('app.updated_at')); ?>', width:250}
                ,{field:'score',title:'<?php echo e(trans('app.actions')); ?>', width:200, align: 'right',fixed: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,page: true
            ,limit: 20
            ,height: 'full-200'
            ,cellMinWidth:200
            ,error: function(e,t){
                console.log(e);
                $.ajax_table_error(e);
            }
        });

        //监听锁定
        form.on('switch(home_recommend)', function(obj){
            var  value = obj.elem.checked ? 1 : 0;
            var load = layer.load();
            $.post("<?php echo e(guard_url('news/updateRecommend')); ?>",{"id":this.value,"home_recommend":value,'_token':"<?php echo csrf_token(); ?>" },function(){
                layer.close(load);
                if(data.code != 0)
                {
                    layer.msg(data.message);
                }
            })
        });
        //监听锁定
        form.on('switch(hot_recommend)', function(obj){
            var  value = obj.elem.checked ? 1 : 0;
            var load = layer.load();
            $.post("<?php echo e(guard_url('news/updateRecommend')); ?>",{"id":this.value,"hot_recommend":value,'_token':"<?php echo csrf_token(); ?>" },function(){
                layer.close(load);
                if(data.code != 0)
                {
                    layer.msg(data.message);
                }
            })
        });
    });
</script>
<?php echo Theme::partial('common_handle_js'); ?>