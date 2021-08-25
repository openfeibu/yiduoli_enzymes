
<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        <div class="layui-col-md12">
            <div class="tabel-message">
                <div class="layui-inline tabel-btn">
                    <button class="layui-btn layui-btn-warm "><a href="{{ route('product_category.create') }}">{{ trans('app.add') }}</a></button>
                </div>

            </div>

            <table id="fb-table" class="layui-table"  lay-filter="fb-table">

            </table>

            <div id="product_category" class="demo-tree demo-tree-box" style="min-width: 200px;"></div>
        </div>
    </div>
</div>

<script>
    layui.use(['tree', 'util','jquery'], function() {
        var tree = layui.tree
                , layer = layui.layer
                , util = layui.util
                , $ = layui.$;
        var data = {!! $product_categories !!};
        tree.render({
            elem: '#product_category'
            ,data: data
            ,edit: ['update', 'del'] //操作节点的图标
            ,click: function(obj){
                //layer.msg(JSON.stringify(obj.data));
                var data = obj.data;
                window.location.href = "{{ guard_url('product_category') }}/"+data.id;
                return false;
            }
            ,operate: function(obj){
                var type = obj.type; //得到操作类型：add、edit、del
                var data = obj.data; //得到当前节点的数据
                var elem = obj.elem; //得到当前节点元素

                //Ajax 操作
                var id = data.id; //得到节点索引
                var ajax_data = {};
                ajax_data['_token'] = "{!! csrf_token() !!}";

                if(type === 'add'){ //增加节点
                    //返回 key 值
                    window.location.href = "{{ guard_url('product_category/create') }}?parent_id="+id;
                    return false;
                } else if(type === 'update'){ //修改节点
                    var load = layer.load();
                    var new_name = elem.find('.layui-tree-txt').html();
                    console.log(new_name);
                    ajax_data['name'] = new_name;
                    $.ajax({
                        url : "{{ guard_url('product_category') }}"+'/'+data.id,
                        data : ajax_data,
                        type : 'PUT',
                        success : function (data) {
                            layer.close(load);
                        },
                        error : function (jqXHR, textStatus, errorThrown) {
                            layer.close(load);
                            layer.msg('服务器出错');
                        }
                    });

                } else if(type === 'del'){ //删除节点
                    var res = true;
                    layer.confirm('将删除该分类（包括子分类）及该分类下（包括子分类下）的产品，确定删除？', function(index){
                        layer.close(index);
                        var load = layer.load();
                        $.ajax({
                            url : "{{ guard_url('product_category') }}"+'/'+data.id,
                            data : ajax_data,
                            type : 'delete',
                            async:false,
                            success : function (data) {
                                layer.close(load);
                                if(data.code == 0)
                                {

                                }else{
                                    layer.msg(data.message);
                                    res = false;
                                }
                            },
                            error : function (jqXHR, textStatus, errorThrown) {
                                res = false;
                                layer.close(load);
                                $.ajax_error(jqXHR, textStatus, errorThrown);
                            }
                        });
                    })
                    return res;
                };
            }
        });

    });
</script>