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
    <!-- 引入webuploader.css文件 -->
    <link rel="stylesheet" type="text/css" href="/admin/webuploader-0.1.5/webuploader.css">
    <!--[if IE 6]>
<script type="text/javascript" src="/admin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
    <!--/meta 作为公共模版分离出去-->
    <title>导入试题 - H-ui.admin v3.1</title>
    <meta name="keywords" content="H-ui.admin v3.1,H-ui网站后台模版,后台模版下载,后台管理系统模版,HTML后台模版下载">
    <meta name="description" content="H-ui.admin v3.1，是一款由国人开发的轻量级扁平化网站后台模板，完全免费开源的网站后台管理系统模版，适合中小型CMS后台系统。">
</head>

<body>
    <article class="page-container">
        <form action="" method="post" class="form form-horizontal" id="form-member-add">
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span style="color: red;">*</span>文件：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
                    <!-- 替换成webuploader的html示例代码 -->
                    <div id="uploader" class="wu-example">
                        <!--用来存放文件信息-->
                        <div id="thelist" class="uploader-list"></div>
                        <div class="btns">
                            <div id="picker">选择文件</div>
                            <button id="ctlBtn" class="btn btn-default">开始上传</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row cl">
                <label class="form-label col-xs-4 col-sm-3"><span style="color: red;">*</span>所属试卷：</label>
                <div class="formControls col-xs-8 col-sm-9"> 
					<span class="select-box" style="width: 130px;">
						<select class="select" size="1" name="paper_id">
							<option value="" selected>请选择一份试卷</option>
                            @foreach($paper as $val)
                                <option value="{{ $val -> id }}">{{ $val -> paper_name }}</option>
                            @endforeach
						</select>
					</span> 
				</div>
            </div>
            <!-- csrf值 -->
            {{csrf_field()}}
            <!-- 存放头像的地址 -->
            <input type="hidden" name="excelpath" value="" id="excelpath"/>
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
    <!-- 引入webuploader.js文件 -->
    <script type="text/javascript" src="/admin/webuploader-0.1.5/webuploader.js"></script>
    <!-- 引入单独的js上传文件（demo） -->
    <script type="text/javascript">
        var _token = "{{csrf_token()}}";
    </script>
    <script type="text/javascript">
    $(function() {
        // start 文件上传开始
        var $ = jQuery,
        $list = $('#thelist'),
        $btn = $('#ctlBtn'),
        state = 'pending',
        uploader;

        uploader = WebUploader.create({
            // 自定义参数
            formData: {_token: "{{csrf_token()}}"},
            // 不压缩image
            resize: false,
            // swf文件路径
            swf: '/admin/webuploader-0.1.5/Uploader.swf',
            // 文件接收服务端。
            server: '{{route('webuploader')}}',
            // 选择文件的按钮。可选。
            // 内部根据当前运行是创建，可能是input元素，也可能是flash.
            pick: '#picker'
        });

        // 当有文件添加进来的时候
        uploader.on( 'fileQueued', function( file ) {
            $list.append( '<div id="' + file.id + '" class="item">' +
                '<h4 class="info">' + file.name + '</h4>' +
                '<p class="state">等待上传...</p>' +
            '</div>' );
        });

        // 文件上传过程中创建进度条实时显示。
        uploader.on( 'uploadProgress', function( file, percentage ) {
            var $li = $( '#'+file.id ),
                $percent = $li.find('.progress .progress-bar');
            // 避免重复创建
            if ( !$percent.length ) {
                $percent = $('<div class="progress progress-striped active">' +
                '<div class="progress-bar" role="progressbar" style="width: 0%">' +
                '</div>' +
                '</div>').appendTo( $li ).find('.progress-bar');
            }
            $li.find('p.state').text('上传中');
            $percent.css( 'width', percentage * 100 + '%' );
        });

        uploader.on( 'uploadSuccess', function( file , response) {
            $( '#'+file.id ).find('p.state').text('已上传');
            $btn.remove(); // 上传成功后，删除按钮，避免反复点击与submit冲突
            // 写入隐藏域,post提交时能带上隐藏域的值(文件路径)
            if (response.code == '0') {
                layer.msg(response.msg, {icon: 1, time: 1500});
                $('#excelpath').val(response.filepath);
            } else {
                layer.msg(response.msg, {icon: 1, time: 1500});
            }
        });

        uploader.on( 'uploadError', function( file ) {
            $( '#'+file.id ).find('p.state').text('上传出错');
        });

        uploader.on( 'uploadComplete', function( file ) {
            $( '#'+file.id ).find('.progress').fadeOut();
        });

        uploader.on( 'all', function( type ) {
            if ( type === 'startUpload' ) {
                state = 'uploading';
            } else if ( type === 'stopUpload' ) {
                state = 'paused';
            } else if ( type === 'uploadFinished' ) {
                state = 'done';
            }

            if ( state === 'uploading' ) {
                $btn.text('暂停上传');
            } else {
                $btn.text('开始上传');
            }
        });

        $btn.on( 'click', function() {
            if ( state === 'uploading' ) {
                uploader.stop();
            } else {
                uploader.upload();
            }
        });
        // end 文件上传结束

        $('.skin-minimal input').iCheck({
            checkboxClass: 'icheckbox-blue',
            radioClass: 'iradio-blue',
            increaseArea: '20%'
        });

        $("#form-member-add").validate({
            rules: {
                excelpath: {
                    required: true,
                },
                paper_id: {
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