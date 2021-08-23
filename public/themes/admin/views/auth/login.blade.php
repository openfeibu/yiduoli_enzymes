
<div class="login layui-anim layui-anim-up">
	
	<div class="login-con">
		<div class="login-left">
			<p>To Be One of Word-leading Biotech Enterprises</p>
			<span>成为世界领先的生物技术企业</span>
		</div>
		<div class="login-right">
        {!! Theme::partial('message') !!}
		<div class="login-con-title">
			
			
		</div>
		{!!Form::vertical_open()->id('login')->method('POST')->class('layui-form')->action(guard_url('login')) !!}

		<input name="username" placeholder="{{ trans('admin_user.label.username') }}"  type="text" lay-verify="required|username" class="layui-input" >
		<input name="password" placeholder="密码"  type="password" lay-verify="pass" class="layui-input">
		<div class="login_btn-box">
			<input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit" class="login_btn">
		</div>
		
		<input id="rememberme" type="hidden" name="rememberme" value="1">
		{!!Form::Close()!!}
		</div>
	</div>
</div>
<script>
	var main_url = "{{guard_url('news')}}";
	var delete_all_url = "{{guard_url('news/destroyAll')}}";
	layui.use(['jquery','element'], function(){
		var table = layui.table;
		var form = layui.form;
		form.verify({
			username: function(value, item){ //value：表单的值、item：表单的DOM对象
				if(!new RegExp("^[a-zA-Z0-9_\u4e00-\u9fa5\\s·]+$").test(value)){
					return '用户名不能有特殊字符';
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