<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:55:"D:\wamp64\www\tp5_demo/app/admin\view\login\login1.html";i:1504662783;}*/ ?>
<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>后台登陆系统</title>
	<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/bootstrap.css" />
	<link rel="stylesheet" href="__PUBLIC_PC__/admin/css/style.css" />
</head>
<body>
	<div class="lg-container">
		<h1>用户登录</h1>
		<form id="checklogin" class="ajaxForm3" name="checklogin" method="post" action="<?php echo url('admin/Login/CheckLogin'); ?>">
			<div>
				<label class="block clearfix"> 用户名:</label>
				<input type="text" class="form-control" name="user_name" id="user_name" placeholder="用户名" required/>
			</div>
			<div>
				<label for="password">密码:</label>
				<input type="password" class="form-control" name="password" id="user_pwd" placeholder="密码" required/>
			</div>
			<?php if(config('geetest.geetest_on') == true): ?>
			<div id="captcha"></div>
			<?php elseif(config('is_verify') == true): ?>
			<div>
				<label for="password">验证码:</label>
				<input type="text" class="form-control" name="verify" id="verify" placeholder="输入验证码" required autocomplete="off"/>
			</div>				
			<div>
				<img class="verify_img" id="verify_img" src="<?php echo url('admin/Login/loginVerify'); ?>" onClick="this.src='<?php echo url('admin/Login/loginVerify'); ?>'+'?'+Math.random()"  class="img-border" style="width:100%" title="点击获取">
			</div>				
			<?php endif; ?>			
				<button class="lg-btn" type="submit">
				<span class="bigger-110">登录</span>
				</button>
		</form>
	</div>
</body>
		<!-- 基本的js -->
		<!--[if !IE]> -->
		<script src="__PUBLIC_PC__/ace/components/jquery/dist/jquery.js"></script>
		<!-- <![endif]-->
		<!-- 如果为IE,则引入jq1.12.1 -->
		<!--[if IE]>
		<script src="__PUBLIC_PC__/ace/components/jquery.1x/dist/jquery.js"></script>
		<![endif]-->
		<script src="__PUBLIC_PC__/ace/components/jquery-form/jquery.form.js"></script>
		<script src="__PUBLIC_PC__/ace/components/layer/layer.js"></script>
		<script src="http://static.geetest.com/static/tools/gt.js"></script>
		<script src="__PUBLIC_PC__/admin/js/login/login.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='__PUBLIC_PC__/ace/others/jquery.mobile.custom.min.js'>"+"<"+"/script>");
	var handler = function (captchaObj) {
	    captchaObj.appendTo("#captcha");
	    captchaObj.onSuccess(function () {
	        //验证成功执行
	    });
	    captchaObj.onReady(function () {
	        //加载完毕执行
	    });
	};
	$.ajax({
	    url: "<?php echo geetest_url(); ?>?t=" + (new Date()).getTime(),
	    type: "get",
	    dataType: "json",
	    success: function (data) {
	        initGeetest({
	            gt: data.gt,
	            challenge: data.challenge,
	            product: "float",
	            offline: !data.success
	        }, handler);
	    }
	});	

</script>		
</html>