<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="/favicon.ico">
    <link rel="Shortcut Icon" href="/favicon.ico" />
    <!--[if lt IE 9]>
<script type="text/javascript" src="/admin/lib/html5shiv.js"></script>
<script type="text/javascript" src="/admin/lib/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/admin/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/skin/default/skin.css" id="skin" />
    <link rel="stylesheet" type="text/css" href="/admin/static/h-ui.admin/css/style.css" />
    <!-- 引入webuploader插件的css样式 -->
    <link rel="stylesheet" type="text/css" href="/admin/webuploader-0.1.5/webuploader.css" />
    <style>
    .col-sm-3 {
        width: 18%;
    }
    </style>
    <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <!--/meta 作为公共模版分离出去-->
    <title>添加用户 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
<article class="page-container">
    <form action="" method="post" class="form form-horizontal" id="form-member-add">
        {{csrf_field()}}
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>用户名：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="用户名" id="username" name="username">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>密码：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="password" class="input-text" value="" placeholder="密码" id="password" name="password">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>性别：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="gender" type="radio" value="1" id="gender-1" checked>
                    <label for="gender-1">男</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-2" value="2" name="gender">
                    <label for="gender-2">女</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="gender-3" value="3" name="gender">
                    <label for="gender-3">保密</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>手机：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" value="" placeholder="手机号" id="mobile" name="mobile">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>邮箱：</label>
            <div class="formControls col-xs-8 col-sm-9">
                <input type="text" class="input-text" placeholder="@" name="email" id="email">
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">头像：</label>
            <div class="formControls col-xs-8 col-sm-9"> 
                <div id="uploader-demo">
                    <!--用来存放item-->
                    <div id="fileList" class="uploader-list"></div>
                    <div id="filePicker">选择图片</div>
                    <!-- 隐藏域，用于存放异步上传成功后的 头像地址 -->
                    <input type="hidden" name="avatar" id="avatar" value="" />
                </div> 
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3">所在城市：</label>
            <div class="formControls col-xs-8 col-sm-9"> 
                <span class="select-box" style="width: 150px;">                        
                    <select class="select" size="1" name="country_id">
                        <option value="" selected>--国家--</option>
                        @foreach($countrys as $country)
                        <option value="{{$country->id}}">{{$country -> area}}</option>
                        @endforeach							
                    </select>                        
                </span>
                <span class="select-box" style="width: 150px;">
                    <select class="select" size="1" name="province_id">
                        <option value="" selected>--省份--</option>
                        <!-- 数据追加的位置 -->
                    </select>
                </span> 
                <span class="select-box" style="width: 150px;">
                    <select class="select" size="1" name="city_id">
                        <option value="" selected>--城市--</option>
                        
                    </select>
                </span>  
                <span class="select-box" style="width: 150px;">
                    <select class="select" size="1" name="county_id">
                        <option value="" selected>--区县--</option>				
                    </select>
                </span> 
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>类型：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="type" type="radio" value="1" id="type-1" checked>
                    <label for="type-1">学生</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="type-2" value="2" name="type">
                    <label for="type-2">老师</label>
                </div>
            </div>
        </div>
        <div class="row cl">
            <label class="form-label col-xs-4 col-sm-3"><span class="c-red">*</span>状态：</label>
            <div class="formControls col-xs-8 col-sm-9 skin-minimal">
                <div class="radio-box">
                    <input name="status" type="radio" value="1" id="status-1" checked>
                    <label for="status-1">禁用</label>
                </div>
                <div class="radio-box">
                    <input type="radio" id="status-2" value="2" name="status">
                    <label for="status-2">启用</label>
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
<script type="text/javascript" src="/admin/static/h-ui.admin/js/H-ui.admin.js"></script>
<!--/_footer 作为公共模版分离出去-->
<!--请在下方写此页面业务相关的脚本-->
<script type="text/javascript" src="/admin/lib/My97DatePicker/4.8/WdatePicker.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/jquery.validate.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/validate-methods.js"></script>
<script type="text/javascript" src="/admin/lib/jquery.validation/1.14.0/messages_zh.js"></script>
<!-- 载入webuploader.js -->
<script type="text/javascript" src="/admin/webuploader-0.1.5/webuploader.js"></script>
<script type="text/javascript">
$(function() {
    // 图示上传
    var $ = jQuery,
    $list = $('#fileList'),
    // 优化retina, 在retina下这个值是2
    ratio = window.devicePixelRatio || 1,
    // 缩略图大小
    thumbnailWidth = 100 * ratio,
    thumbnailHeight = 100 * ratio,
    // Web Uploader实例
    uploader;
    // 初始化Web Uploader
    uploader = WebUploader.create({
        // 自定义参数
        formData: {_token: "{{csrf_token()}}"},
        // 自动上传。
        auto: true,
        // swf文件路径
        swf: '/admin/webuploader-0.1.5/Uploader.swf',
        // 文件接收服务端。
        // server: "{{route('webuploader')}}", // 上传文件到项目服务器
        server: "{{route('qiniu')}}", // 上传文件到七牛云服务器
        // 选择文件的按钮。可选。
        // 内部根据当前运行是创建，可能是input元素，也可能是flash.
        pick: '#filePicker',
        // 只允许选择文件，可选。
        accept: {
            title: 'Images',
            extensions: 'gif,jpg,jpeg,bmp,png',
            mimeTypes: 'image/*'
        }
    });

    // 当有文件添加进来的时候
    uploader.on( 'fileQueued', function( file ) {
        var $li = $(
                '<div id="' + file.id + '" class="file-item thumbnail">' +
                    '<img>' +
                    '<div class="info">' + file.name + '</div>' +
                '</div>'
                ),
            $img = $li.find('img');        
        $('.thumbnail').remove(); // 删除之前上传的图片预览
        $list.append( $li );
        // 创建缩略图
        uploader.makeThumb( file, function( error, src ) {
            if ( error ) {
                $img.replaceWith('<span>不能预览</span>');
                return;
            }
            $img.attr( 'src', src );
        }, thumbnailWidth, thumbnailHeight );
    });

    // 文件上传过程中创建进度条实时显示。
    uploader.on( 'uploadProgress', function( file, percentage ) {
        var $li = $( '#'+file.id ),
            $percent = $li.find('.progress span');
        // 避免重复创建
        if ( !$percent.length ) {
            $percent = $('<p class="progress"><span></span></p>')
                    .appendTo( $li )
                    .find('span');
        }
        $percent.css( 'width', percentage * 100 + '%' );
    });

    // 文件上传成功，给item添加成功class, 用样式标记上传成功。第二个参数才是ajax返回值
    uploader.on( 'uploadSuccess', function( file, res ) {
        $( '#'+file.id ).addClass('upload-state-done');
        // 把上传成功后的图片地址，存入隐藏域中
        if(res.code == '0') {
            layer.msg(res.msg, {icon:1,time:1500});
            $('#avatar').val(res.filepath);
        } else {
            layer.msg(res.msg, {icon:2,time:2500});
        }
    });

    // 文件上传失败，现实上传出错。
    uploader.on( 'uploadError', function( file ) {
        var $li = $( '#'+file.id ),
            $error = $li.find('div.error');
        // 避免重复创建
        if ( !$error.length ) {
            $error = $('<div class="error"></div>').appendTo( $li );
        }
        $error.text('上传失败');
    });

    // 完成上传完了，成功或者失败，先删除进度条。
    uploader.on( 'uploadComplete', function( file ) {
        $( '#'+file.id ).find('.progress').remove();
    });

    // 一二级别联动
    $('select[name=country_id]').change(function(){
        var _id = $(this).val();
        $.get("{{route('member_getAreaById')}}",{id: _id},function(data){
            // 循环遍历得到的数据，并拼接字符串
            var _options = '';
            $.each(data,function(index,el){
                _options += "<option value='"+ el.id +"'>"+ el.area +"</option>";
            });
            // 添加到select中
            $('select[name=province_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=city_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=county_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=province_id]').append(_options);
        },'json');
    });
    // 二三级别联动
    $('select[name=province_id]').change(function(){
        var _id = $(this).val();
        $.get("{{route('member_getAreaById')}}",{id: _id},function(data){
            // 循环遍历得到的数据，并拼接字符串
            var _options = '';
            $.each(data,function(index,el){
                _options += "<option value='"+ el.id +"'>"+ el.area +"</option>";
            });
            // 添加到select中
            $('select[name=city_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=county_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=city_id]').append(_options);
        },'json');
    });
    // 三四级别联动
    $('select[name=city_id]').change(function(){
        var _id = $(this).val();
        $.get("{{route('member_getAreaById')}}",{id: _id},function(data){
            // 循环遍历得到的数据，并拼接字符串
            var _options = '';
            $.each(data,function(index,el){
                _options += "<option value='"+ el.id +"'>"+ el.area +"</option>";
            });
            // 添加到select中
            $('select[name=county_id]').find('option:gt(0)').remove();// 找到索引大于0的option清掉
            $('select[name=county_id]').append(_options);
        },'json');
    });

    $('.skin-minimal input').iCheck({
        checkboxClass: 'icheckbox-blue',
        radioClass: 'iradio-blue',
        increaseArea: '20%'
    });

    $("#form-member-add").validate({
        rules: {
            username: {
                required: true,
                minlength: 2,
                maxlength: 20
            },
            password: {
                required: true,
                minlength: 6,
            },
            gender: {
                required: true,
            },
            mobile: {
                required: true,
                isMobile: true,
            },
            email: {
                required: true,
                email: true,
            },
            avatar: {
                required: true,
            },

        },
        onkeyup: false,
        focusCleanup: true,
        success: "valid",
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type: 'post',
                url: "" ,	//提交给当前地址
                success: function(data){
                    //判断返回值code
                    if(data.code == '0'){
                        //成功
                        layer.msg(data.msg,{icon:1,time:2000},function(){
                            var index = parent.layer.getFrameIndex(window.name);
                            // parent.$('.btn-refresh').click();
                            parent.location.href = parent.location.href;
                            parent.layer.close(index);
                        });
                    }else{
                        //失败
                        layer.msg(data.msg,{icon:5,time:2000});
                    }
                },
                error: function(XmlHttpRequest, textStatus, errorThrown){
                    layer.msg('error!',{icon:5,time:2000});
                }
            });
        }
    });
});
</script>
<!--/请在上方写此页面业务相关的脚本-->
</body>

</html>