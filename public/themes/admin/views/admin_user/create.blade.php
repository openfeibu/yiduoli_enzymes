<div class="main">
    {!! Theme::widget('breadcrumb')->render() !!}
    <div class="main_full">
        {!! Theme::partial('message') !!}
        <div class="layui-col-md12">
            <div class="fb-main-table">
                <form class="layui-form" action="{{guard_url('admin_user')}}" method="post" lay-filter="fb-form">
                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans("admin_user.label.username") }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="username" value="{{ $admin_user->username }}" lay-verify="required|username" autocomplete="off" placeholder="请输入{{ trans("admin_user.label.username") }}" class="layui-input">
                        </div>
                        <div class="layui-form-mid layui-word-aux">用户名不能有特殊字符</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">{{ trans("admin_user.label.email") }}</label>
                        <div class="layui-input-inline">
                            <input type="text" name="email" value="{{ $admin_user->email }}" autocomplete="off" placeholder="请输入{{ trans("admin_user.label.email") }}" class="layui-input" >
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans("admin_user.label.password") }}</label>
                        <div class="layui-input-inline">
                            <input type="password" name="password" placeholder="请输入{{ trans("admin_user.label.password") }}" autocomplete="off" class="layui-input" lay-verify="pass">
                        </div>
                        <div class="layui-form-mid layui-word-aux">密码必须6到15位，且不能出现空格</div>
                    </div>

                    <div class="layui-form-item">
                        <label class="layui-form-label">* {{ trans("admin_user.label.roles") }}</label>
                        <div class="layui-input-block">
                            <?php $i=1 ?>
                            @foreach($roles as $key => $role)
                            <input type="radio" name="roles[]" value="{{ $role->id }}" title="{{ $role->name }}" @if($i == 1) checked @endif >
                             <?php $i++ ?>
                            @endforeach
                        </div>
                    </div>

                    <div class="layui-form-item button-group"><div class="layui-input-block"><button class="layui-btn layui-btn-normal layui-btn-lg" lay-submit="" lay-filter="demo1">{{ trans('app.submit_now') }}</button></div></div>
                    {!!Form::token()!!}
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    layui.use(['jquery','element','table','laytpl'], function(){
        var table = layui.table;
        var form = layui.form;
        var laytpl = layui.laytpl;
        var $ = layui.$;
        var element = layui.element;
        form.render();
        form.verify({
            username: function(value, item){ //value：表单的值、item：表单的DOM对象
//                if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
//                    return '用户名不能有特殊字符';
//                }
                /*
                if(/(^\_)|(\__)|(\_+$)/.test(value)){
                    return '用户名首尾不能出现下划线\'_\'';
                }
                */
                var ajax_data = {};
                ajax_data['_token'] = "{!! csrf_token() !!}";
                ajax_data['username'] = value;
                var load = layer.load();
                var message = '';
                $.ajax({
                    url : "{{ guard_url('admin_user/validate') }}",
                    data : ajax_data,
                    type : 'post',
                    async:false,
                    success : function (data) {
                        layer.close(load);
                        if(data.code !=0 || data.code !=200)
                        {
                            message = data.message;
                            return false;
                        }
                        return true;
                    },
                    error : function (jqXHR, textStatus, errorThrown) {
                        layer.close(load);
                        $.ajax_error(jqXHR, textStatus, errorThrown);
                        return false;
                    }
                });
               if(message)
               {
                   return message;
               }
            }
            //我们既支持上述函数式的方式，也支持下述数组的形式
            //数组的两个值分别代表：[正则匹配、匹配不符时的提示文字]
            ,pass: [
                /^[\S]{6,15}$/
                ,'密码必须6到15位，且不能出现空格'
            ]
        });
    });
</script>

