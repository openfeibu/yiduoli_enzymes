
<div class="x-body">
    <div class="layui-row">

    </div>
    <xblock>
        <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量{{ trans('app.delete') }}</button>
        <button class="layui-btn" onclick="x_admin_show('{{ trans('app.add') }}用户','./order-add.html')"><i class="layui-icon"></i>{{ trans('app.add') }}</button>
        <span class="x-right" style="line-height:40px">共有数据：88 条</span>
    </xblock>
    <table class="layui-table">
        <thead>
        <tr>
            <th>
                <div class="layui-unselect header layui-form-checkbox" lay-skin="primary"><i class="layui-icon">&#xe605;</i></div>
            </th>
            <th>{!! trans('page.label.name')!!}</th>
            <th>{!! trans('page.label.title')!!}</th>
            <th>{!! trans('page.label.url')!!}</th>
            <th>{!! trans('page.label.heading')!!}</th>
            <th>{!! trans('page.label.order')!!}</th>
            <th>{!! trans('page.label.updated_at')!!}</th>
            <th>{!! trans('app.actions') !!}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data['data'] as $key => $val)
            <tr>
                <td>
                    <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id='2'><i class="layui-icon">&#xe605;</i></div>
                </td>
                <td>{{ $val['name'] }}</td>
                <td>{{ $val['title'] }}</td>
                <td>{{ $val['url'] }}</td>
                <td>{{ $val['heading'] }}</td>
                <td>{{ $val['order'] }}</td>
                <td>{{ $val['updated_at'] }}</td>
                <td class="td-manage">
                    <a title="查看"  onclick="x_admin_show('{{ trans('app.edit') }}','{!!guard_url('page/page')!!}/{{ $val['id'] }}')" href="javascript:;">
                        <i class="layui-icon">&#xe63c;</i>
                    </a>
                    <a title="{{ trans('app.delete') }}" onclick="member_del(this,'要{{ trans('app.delete') }}的id')" href="javascript:;">
                        <i class="layui-icon">&#xe640;</i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div class="page">
        <div>
            <a class="prev" href="">&lt;&lt;</a>
            <a class="num" href="">1</a>
            <span class="current">2</span>
            <a class="num" href="">3</a>
            <a class="num" href="">489</a>
            <a class="next" href="">&gt;&gt;</a>
        </div>
    </div>

</div>
<script>
    layui.use('laydate', function(){
        var laydate = layui.laydate;

        //执行一个laydate实例
        laydate.render({
            elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
            elem: '#end' //指定元素
        });
    });

    /*用户-{{ trans('app.delete') }}*/
    function member_del(obj,id){
        layer.confirm('确认要{{ trans('app.delete') }}吗？',function(index){
            //发异步{{ trans('app.delete') }}数据
            $(obj).parents("tr").remove();
            layer.msg('已{{ trans('app.delete') }}!',{icon:1,time:1000});
        });
    }



    function delAll (argument) {

        var data = tableCheck.getData();

        layer.confirm('确认要{{ trans('app.delete') }}吗？'+data,function(index){
            //捉到所有被选中的，发异步进行{{ trans('app.delete') }}
            layer.msg('{{ trans('app.delete') }}成功', {icon: 1});
            $(".layui-form-checked").not('.header').parents('tr').remove();
        });
    }
</script>
