<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{guard_url('page/joint_research_institute/create')}}">{{ trans('app.add') }}</a></button>
                    <button class="layui-btn layui-btn-primary " data-type="del" data-events="del">{{ trans('app.delete') }}</button>
                </div>
                <div class="layui-inline">
                    <input class="layui-input search_key" name="title" id="demoReload" placeholder="{{ trans('app.search') }}{{ trans('page.label.title') }}" autocomplete="off">
                </div>
                <div class="layui-inline">
                    <button class="layui-btn" data-type="reload">{{ trans('app.search') }}</button>
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="checkboxHomeRecommendTEM">
    <input type="checkbox" name="home_recommend" value="@{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="home_recommend" @{{ d.home_recommend ? 'checked' : '' }}>
</script>
<script type="text/html" id="checkboxHotRecommendTEM">
    <input type="checkbox" name="hot_recommend" value="@{{d.id}}" lay-skin="switch" lay-text="是|否" lay-filter="hot_recommend" @{{ d.hot_recommend ? 'checked' : '' }}>
</script>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">{{ trans('app.edit') }}</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">{{ trans('app.delete') }}</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="@{{d.image}}" alt="" height="28">
</script>

<script>
    var main_url = "{{guard_url('page/joint_research_institute')}}";
    var delete_all_url = "{{guard_url('page/joint_research_institute/destroyAll')}}";
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
                ,{field:'title',title:'{{ trans('page.label.title') }}',edit:'text' , width:280}
                ,{field:'description',title:'{{ trans('page.label.description') }}',edit:'text' , width:280}
                ,{field:'image',title:'{{ trans('page.label.image') }}', toolbar:'#imageTEM', width:120}
                ,{field:'updated_at',title:'{{ trans('app.updated_at') }}', width:250}
                ,{field:'score',title:'{{ trans('app.actions') }}', width:200, align: 'right',fixed: 'right',toolbar:'#barDemo'}
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
            $.post("{{guard_url('joint_research_institutes/updateRecommend')}}",{"id":this.value,"home_recommend":value,'_token':"{!! csrf_token() !!}" },function(){
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
            $.post("{{guard_url('joint_research_institutes/updateRecommend')}}",{"id":this.value,"hot_recommend":value,'_token':"{!! csrf_token() !!}" },function(){
                layer.close(load);
                if(data.code != 0)
                {
                    layer.msg(data.message);
                }
            })
        });
    });
</script>
{!! Theme::partial('common_handle_js') !!}