<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{ url('/admin/subsidiary/create') }}">{{ trans('app.add') }}</a></button>
                    {{--<button class="layui-btn layui-btn-primary " data-type="del" data-events="del">{{ trans('app.delete') }}</button>--}}
                </div>
            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>
        </div>
    </div>
</div>
<script type="text/html" id="barDemo">
    <a class="layui-btn layui-btn-sm" lay-event="edit">{{ trans('app.edit') }}</a>
    <a class="layui-btn layui-btn-danger layui-btn-sm" lay-event="del">{{ trans('app.delete') }}</a>
</script>
<script type="text/html" id="imageTEM">
    <img src="/image/original@{{d.image}}" alt="" height="28">
</script>
<script>
    var main_url = "{{guard_url('subsidiary')}}";
    var delete_all_url = "{{guard_url('subsidiary/destroyAll')}}";
    layui.use(['jquery','element','table'], function(){
        var $ = layui.$;
        var table = layui.table;
        var form = layui.form;
        table.render({
            elem: '#fb-table'
            ,url: '{{guard_url('subsidiary')}}'
            ,cols: [[
                {checkbox: true, fixed: true}
                ,{field:'id',title:'ID', width:80, sort: true}
                ,{field:'name',title:'{{ trans('subsidiary.label.name') }}', edit:'text'}
                ,{field:'image',title:'{{ trans('app.image') }}', width:200,toolbar:'#imageTEM',}
                ,{field:'url',title:'{{ trans('app.url') }}',templet:'<div><a href="@{{ d.url }}" target="_blank">@{{ d.url }}</a></div>'}
                ,{field:'order',title:'{{ trans('app.order') }}',edit: 'text'}
                ,{field:'score',title:'{{ trans('app.actions') }}', width:200, align: 'right',toolbar:'#barDemo'}
            ]]
            ,id: 'fb-table'
            ,height: 'full-200'
            ,page:false
        });
        //监听工具条
        table.on('tool(fb-table)', function(obj){
            var data = obj.data;
            data['_token'] = "{!! csrf_token() !!}";
            if(obj.event === 'detail'){
                layer.msg('ID：'+ data.id + ' 的查看{{ trans('app.actions') }}');
            } else if(obj.event === 'del'){
                layer.confirm('真的{{ trans('app.delete') }}行么', function(index){
                    layer.close(index);
                    var load = layer.load();
                    $.ajax({
                        url : main_url+'/'+data.id,
                        data : data,
                        type : 'delete',
                        success : function (data) {
                            var nPage = $(".layui-laypage-curr em").eq(1).text();
                            //执行重载
                            table.reload('fb-table', {
                                page: {
                                    curr: nPage //重新从第 1 页开始
                                }
                            });
                            layer.close(load);
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            $.ajax_error(jqXHR, textStatus, errorThrown);
                        }
                    });
                });
            } else if(obj.event === 'edit'){
                window.location.href=main_url+'/'+data.id
            }
        });
        table.on('edit(fb-table)', function(obj){
            var data = obj.data;
            var value = obj.value //得到修改后的值
                    ,data = obj.data //得到所在行所有键值
                    ,field = obj.field; //得到字段
            var ajax_data = {};
            ajax_data['_token'] = "{!! csrf_token() !!}";
            ajax_data[field] = value;
            // 加载样式
            var load = layer.load();
            $.ajax({
                url : main_url+'/'+data.id,
                data : ajax_data,
                type : 'PUT',
                success : function (data) {
                    layer.close(load);
                },
                error : function (jqXHR, textStatus, errorThrown) {
                    layer.close(load);
                    $.ajax_error(jqXHR, textStatus, errorThrown);
                }
            });
        });
        var $ = layui.$, active = {
            reload: function(){
                var demoReload = $('#demoReload');

                //执行重载
                table.reload('fb-table', {
                    page: {
                        curr: 1 //重新从第 1 页开始
                    }
                    ,where: {
                        name: demoReload.val()
                    }
                });
            },
            del:function(){
                var checkStatus = table.checkStatus('fb-table')
                        ,data = checkStatus.data;
                var data_id_obj = {};
                var i = 0;
                data.forEach(function(v){ data_id_obj[i] = v.id; i++});
                data.length == 0 ?
                        layer.msg('请选择要{{ trans('app.delete') }}的数据', {
                            time: 2000 //2秒关闭（如果不配置，默认是3秒）
                        })
                        :
                        layer.confirm('是否{{ trans('app.delete') }}已选择的数据',{title:'提示'},function(index){
                            layer.close(index);
                            var load = layer.load();
                            $.ajax({
                                url : delete_all_url,
                                data :  {'ids':data_id_obj,'_token' : "{!! csrf_token() !!}"},
                                type : 'POST',
                                success : function (data) {
                                    var nPage = $(".layui-laypage-curr em").eq(1).text();
                                    //执行重载
                                    table.reload('fb-table', {

                                    });
                                    layer.close(load);
                                },
                                error : function (jqXHR, textStatus, errorThrown) {
                                    layer.close(load);
                                    $.ajax_error(jqXHR, textStatus, errorThrown);
                                }
                            });
                        })  ;

            }
        };
        $('.tabel-message .layui-btn').on('click', function(){
            var type = $(this).data('type');
            active[type] ? active[type].call(this) : '';
        });
    });
</script>
