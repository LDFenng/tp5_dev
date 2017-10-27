<?php
//000000000030
 exit();?>
a:2:{i:0;s:2860:"<!DOCTYPE HTML>
<html lang="zh-CN">
<head>
	<meta charset="UTF-8">
	<title>后台登陆系统</title>
	<link rel="stylesheet" href="/tp5_demo/public/pc-ui/ace/assets/css/bootstrap.css" />
	<link rel="stylesheet" href="/tp5_demo/public/pc-ui/admin/css/style.css" />
</head>
<body>
	<div class="lg-container">
		<h1>用户登录</h1>
		<form id="checklogin" class="ajaxForm3" name="checklogin" method="post" action="/tp5_demo/admin.php/Login/CheckLogin.ldf">
			<div>
				<label class="block clearfix"> 用户名:</label>
				<input type="text" class="form-control" name="user_name" id="user_name" placeholder="用户名" required/>
			</div>
			<div>
				<label for="password">密码:</label>
				<input type="password" class="form-control" name="password" id="user_pwd" placeholder="密码" required/>
			</div>
						<div>
				<label for="password">验证码:</label>
				<input type="text" class="form-control" name="verify" id="verify" placeholder="输入验证码" required autocomplete="off"/>
			</div>				
			<div>
				<img class="verify_img" id="verify_img" src="/tp5_demo/admin.php/v.ldf" onClick="this.src='/tp5_demo/admin.php/v.ldf'+'?'+Math.random()"  class="img-border" style="width:100%" title="点击获取">
			</div>				
						
				<button class="lg-btn" type="submit">
				<span class="bigger-110">登录</span>
				</button>
		</form>
	</div>
</body>
		<!-- 基本的js -->
		<!--[if !IE]> -->
		<script src="/tp5_demo/public/pc-ui/ace/components/jquery/dist/jquery.js"></script>
		<!-- <![endif]-->
		<!-- 如果为IE,则引入jq1.12.1 -->
		<!--[if IE]>
		<script src="/tp5_demo/public/pc-ui/ace/components/jquery.1x/dist/jquery.js"></script>
		<![endif]-->
		<script src="/tp5_demo/public/pc-ui/ace/components/jquery-form/jquery.form.js"></script>
		<script src="/tp5_demo/public/pc-ui/ace/components/layer/layer.js"></script>
		<script src="http://static.geetest.com/static/tools/gt.js"></script>
		<script src="/tp5_demo/public/pc-ui/admin/js/login/login.js"></script>
<script type="text/javascript">
	if('ontouchstart' in document.documentElement) document.write("<script src='/tp5_demo/public/pc-ui/ace/others/jquery.mobile.custom.min.js'>"+"<"+"/script>");
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
	    url: "/tp5_demo/admin.php/geetest.ldf?t=" + (new Date()).getTime(),
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
</html>";i:1;a:4:{s:12:"Content-Type";s:24:"text/html; charset=utf-8";s:13:"Cache-Control";s:26:"max-age=30,must-revalidate";s:13:"Last-Modified";s:29:"Tue, 12 Sep 2017 15:31:55 GMT";s:7:"Expires";s:29:"Tue, 12 Sep 2017 15:32:25 GMT";}}