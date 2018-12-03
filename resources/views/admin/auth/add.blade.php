<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
<link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
<link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
<!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>添加管理员 - 管理员管理 - H-ui.admin v3.1</title>
<meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
<meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>
<body>
<article class="page-container">
	<form class="form form-horizontal" id="form-admin-add">
	{{csrf_field()}}
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">父级权限：</label>
		<div class="formControls col-xs-8 col-sm-9"> <span class="select-box" style="width:150px;">
			<select class="select" name="pid" size="1">
				<option value="0">顶级权限</option>
				@foreach($data as $val)
					<option value="{{$val->id}}">{{$val -> auth_name}}</option>
				@endforeach			
			</select>
			</span> </div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>权限名称：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="auth_name" name="auth_name">
		</div>
	</div>	
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">控制器名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" value="" placeholder="" id="controller" name="controller">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3">方法名：</label>
		<div class="formControls col-xs-8 col-sm-9">
			<input type="text" class="input-text" placeholder="" name="action" id="action">
		</div>
	</div>
	<div class="row cl">
		<label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>作为导航：</label>
		<div class="formControls col-xs-8 col-sm-9 skin-minimal">
			<div class="radio-box">
				<input name="is_nav" type="radio" value="1" id="is_nav-1" checked>
				<label for="is_nav-1">是</label>
			</div>
			<div class="radio-box">
				<input type="radio" id="is_nav-2" value="2" name="is_nav">
				<label for="is_nav-2">否</label>
			</div>
		</div>
	</div>
	<div class="row cl">
		<div class="col-xs-8 col-sm-9 col-xs-offset-4 col-sm-offset-3">
			<input class="btn btn-primary radius" type="submit" value="&nbsp;&nbsp;提交&nbsp;&nbsp;">
		</div>
	</div>
	</form>
</article>

<!--_footer 作为公共模版分离出去--> 
<script type="text/javascript" src="/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/admin/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/admin/static/h-ui/js/H-ui.min.js"></script> 
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script> <!--/_footer 作为公共模版分离出去-->

<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script> 
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script> 
<script type="text/javascript">
$(function(){
	// 动态禁用控制器和方法的输入框
	$('#controller,#action').attr("disabled",true); // 默认禁用
	$('select').change(function(event){		
		var _val = $(this).val(); // 获得select的值
		if(_val>0) { // 二级权限，需要控制器和方法，不该禁用
			$('#controller,#action').attr("disabled",false);
			$(this).attr("hook",_val); // 保存select的到hook属性中
		} else { // 顶级权限，不需要控制器和方法，该禁用
			var that = this;
			if($('#controller').val()||$('#action').val()) { // 若有值，需确认
				layer.confirm('<center>切换到顶级权限，将清空表单内容，<br/>确定切换吗？</center>', {
						btn: ['确定','取消'] // 确认按钮
					}, function(index){ // 确定要切换到顶级权限
						$('#controller,#action').val(''); // 清空值
						$('#controller,#action').attr("disabled",true); // 再切换
						layer.close(index);
					}, function(){
						$(that).val($(that).attr("hook")); // 不切换，保持原来的选项，重置到原先的选项
				});		
			} else { // 若无值，不确认，直接禁用
				$('#controller,#action').attr("disabled",true);
			}
		}			
	});

	$('.skin-minimal input').iCheck({
		checkboxClass: 'icheckbox-blue',
		radioClass: 'iradio-blue',
		increaseArea: '20%'
	});
	
	$("#form-admin-add").validate({
		rules:{
			auth_name:{
				required:true,
				minlength:4,
				maxlength:20
			},
			is_nav:{				
				required:true,
			},
			pid:{
				required:true,
			},
		},
		onkeyup:false,
		focusCleanup:true,
		success:"valid",
		submitHandler:function(form){
			$(form).ajaxSubmit({
				type: 'post',
				url: "{{route('auth_add')}}" ,
				success: function(data){
					layer.msg('添加成功!',{icon:1,time:1000},function(){						
						var index = parent.layer.getFrameIndex(window.name); // 获取当前弹窗的索引
						parent.location.href = parent.location.href; // 刷新父级页面(即权限列表页面)
						parent.layer.close(index); // 关闭弹窗
					});
				},
				error: function(XmlHttpRequest, textStatus, errorThrown){
					var err = '';
					var errors = JSON.parse(XmlHttpRequest.responseText);
					for(var key in errors) {
						for(var i in errors[key]){
							err += errors[key][i] + "<br/>";
						}
					}					
					layer.alert(err,{title:'错误提示'});
				}
			});			
		}
	});
});
</script> 
<!--/请在上方写此页面业务相关的脚本-->
</body>
</html>