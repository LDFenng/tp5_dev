<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\wamp64\www\tp5_demo/app/admin\view\public\header.html";i:1504863792;}*/ ?>
<div class="navbar navbar-default ace-save-state navbar-fixed-top" id="navbar-container">
	<!-- #section:basics/sidebar.mobile.toggle -->
	<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
		<span class="sr-only">Toggle sidebar</span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>

		<span class="icon-bar"></span>
	</button>

	<!-- /section:basics/sidebar.mobile.toggle -->
	<div class="navbar-header pull-left">
		<!-- #section:basics/navbar.layout.brand -->
		<a href="#" class="navbar-brand">
			<small>
				<img alt="" src="<?php echo (isset($header_info['logo']) && ($header_info['logo'] !== '')?$header_info['logo']:'..'); ?>" class="img-circle" width="23px">
				<?php echo (isset($header_info['name']) && ($header_info['name'] !== '')?$header_info['name']:''); ?>
			</small>
		</a>

		<!-- /section:basics/navbar.layout.brand -->

		<!-- #section:basics/navbar.toggle -->

		<!-- /section:basics/navbar.toggle -->
	</div>

	<!-- #section:basics/navbar.dropdown -->
	<div class="navbar-buttons navbar-header pull-right" role="navigation">
		<ul class="nav ace-nav">
			<li class="green dropdown-modal">
				
			</li>
			<script type="text/javascript">

			</script>
			<!-- #section:basics/navbar.user_menu -->
			<li class="grey">
				<a href="http://www.yolaila.top/demo/home.php" target="_blank">前台资讯</a>
			</li>
			<li class="light-blue dropdown-modal">
				<a data-toggle="dropdown" href="#" class="dropdown-toggle">
					<img class="nav-user-photo" src="<?php echo (\think\Session::get('avatar_src') ?: default_img(2)); ?>" alt="<?php echo (\think\Session::get('user_name') ?: '管理员'); ?>" />
					<span class="user-info">
						<small>欢迎</small>
						<?php echo (\think\Session::get('user_name') ?: '管理员'); ?>
					</span>

					<i class="ace-icon fa fa-caret-down"></i>
				</a>

				<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
					<li>
						<a data-ajax-page='true' href="<?php echo url('admin/Sys/adminConfig'); ?>">
							<i class="ace-icon fa fa-cog"></i>
							设置
						</a>
					</li>
					<li>
						<a data-ajax-page='true' href="<?php echo url('admin/User/userInfo'); ?>">
							<i class="ace-icon fa fa-user"></i>
							个人信息
						</a>
					</li>
					<!-- <li class="divider"></li> -->
					<li>
						<a class='get-btn' href="<?php echo url('admin/Sys/cleanCache'); ?>"> 
							<i class="ace-icon fa fa-trash"></i>
							清除缓存
						</a>
					</li>
					<li>
						<a href="<?php echo url('admin/Login/logout'); ?>">
							<i class="ace-icon fa fa-power-off"></i>
							注销
						</a>
					</li>
				</ul>
			</li>

			<!-- /section:basics/navbar.user_menu -->
		</ul>
	</div>
	<!-- /section:basics/navbar.dropdown -->
</div>