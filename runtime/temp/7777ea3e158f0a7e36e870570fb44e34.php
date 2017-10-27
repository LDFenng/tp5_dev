<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:54:"D:\wamp64\www\tp5_demo/app/admin\view\index\index.html";i:1506052832;s:54:"D:\wamp64\www\tp5_demo/app/admin\view\public\base.html";i:1504862392;s:60:"D:\wamp64\www\tp5_demo/app/admin\view\public\breadcrumb.html";i:1504797159;}*/ ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<?php echo widget('NavBar/seo'); ?>

		<!--[if !IE]> -->

		<!-- <link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/pace.css" />
		<script data-pace-options='{ "ajax": true, "document": true, "eventLag": false, "elements": false }' src="__PUBLIC_PC__/ace/components/PACE/pace.js"></script> -->

		<!-- <![endif]-->

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/components/font-awesome/css/font-awesome.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace-fonts.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace-skins.css" />
		<!-- <link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace-rtl.css" /> -->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="__PUBLIC_PC__/ace/assets/css/ace-ie.css" />
		<![endif]-->

		<!-- ace settings handler -->
		<script src="__PUBLIC_PC__/ace/assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="__PUBLIC_PC__/ace/components/html5shiv/dist/html5shiv.min.js"></script>
		<script src="__PUBLIC_PC__/ace/components/respond/dest/respond.min.js"></script>
		<![endif]-->
		
		<link href="__PUBLIC_PC__/ace/components/bootstrap-datetimepicker/css/bootstrap-datetimepicker.css" rel="stylesheet" media="screen">
		
		<link rel="stylesheet" href="__PUBLIC_PC__/ace/components/dropzone/dist/dropzone.css" />
		<!-- <link rel="stylesheet" href="__PUBLIC_PC__/ace/components/jquery-colorbox/example1/colorbox.css" /> -->
		<link href="__PUBLIC_PC__/ace/components/select2-4.0.3/css/select2.css" rel="stylesheet" />
		<link href="__PUBLIC_PC__/ace/components/bootstrap-table/bootstrap-table.css" rel="stylesheet" />
		
		<link rel="stylesheet" href="__PUBLIC_PC__/admin/css/ldf.css" />
	</head>

	<body class="no-skin">
		<script src="__PUBLIC_PC__/ace/components/jquery/jquery-2.1.4/jquery.min.js"></script>
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default navbar-fixed-top ace-save-state">
		<!-- /.navbar-container -->
		<?php echo widget('NavBar/header'); ?>
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>
			<!-- #section:basics/sidebar -->
			<?php echo widget('NavBar/leftMenu'); ?>
			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
						<div id="breadcrumbs" class="breadcrumbs ace-save-state breadcrumbs-fixed">
	<div class="breadcrumb">
	
	</div> 
</div>
<style>
.breakcrumb-btn>.btn-title{
	border-right:0px;
}
.breakcrumb-btn>.btn-icon{
	position: relative;
	border-left:0px;
	margin-left:-1px !important;
}
</style>
<script type="text/javascript">
$("#breadcrumbs").delegate('.remove-breadcrumb','click',function(e){
	e.preventDefault();
	$(this).parents('.breakcrumb-btn').remove();
})
$("#breadcrumbs").delegate("a[data-ajax-page='true']",'click',function(e){
	var menu_id_str=$(this).data('id'),
	menu_arr=menu_id_str.split('_');
	var menu_arr_count=menu_arr['length'];
	$('.submenu').hide(); 
	$(".nav-list").find('li').removeClass("active open");
	if(menu_arr_count==2){
		$("#"+menu_id_str).addClass('active');
	}
	else if(menu_arr_count==3){
		$("#menu_"+menu_arr[1]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]).addClass('active');
	}
	else if(menu_arr_count==4){
		$("#menu_"+menu_arr[1]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]+'_'+menu_arr[3]).addClass('active open');
	}
	else if(menu_arr_count==5){
		$("#menu_"+menu_arr[1]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]+'_'+menu_arr[3]).addClass('active open');
		$("#menu_"+menu_arr[1]+'_'+menu_arr[2]+'_'+menu_arr[3]+'_'+menu_arr[4]).addClass('active');
	}
})
</script>
					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content" id="ajax_content">
						<!-- #section:settings.box -->
						<!-- /.ace-settings-container -->
						
						<!-- /section:settings.box -->
						<div class="page-content-area">
							<!-- ajax content goes here -->
							 
	<div class="page-header">
		<h1>首页<small></small></h1>
	</div><!-- /.page-header -->
	<div class="row">
		<div class="col-xs-12">
			<!-- 提示 -->
			<div class="alert alert-block alert-success">
				<button type="button" class="close" data-dismiss="alert">
					<i class="ace-icon fa fa-times"></i>
				</button>
				<i class="ace-icon fa fa-check green"></i>
				为了您更好的体验管理后台系统，建议屏幕分辨率1280*768以上，并且安装chrome谷歌浏览器或者火狐浏览器 （剔除万恶IE）
				<a href="http://sw.bos.baidu.com/sw-search-sp/software/2150022a0c020/ChromeStandalone_58.0.3029.81_Setup.exe">下载谷歌</a>&nbsp;或者
				<a href="http://download.firefox.com.cn/releases-sha2/stub/official/zh-CN/Firefox-latest.exe">下载火狐</a> 
			</div>
		</div>  
		<div class="col-xs-12">
			<?php if(!(empty($slide_list) || (($slide_list instanceof \think\Collection || $slide_list instanceof \think\Paginator ) && $slide_list->isEmpty()))): ?>
		    <div class="swiper-container" style="width:100%;height:350px">
		        <div class="swiper-wrapper">
		            <?php if(is_array($slide_list) || $slide_list instanceof \think\Collection || $slide_list instanceof \think\Paginator): $i = 0; $__LIST__ = $slide_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$slide_info): $mod = ($i % 2 );++$i;?>
		            <!-- 动画 -->
		            <?php if($slide_info['is_animate'] == 1): ?>
		            <div class="swiper-slide">
		            <!-- 加载背景图 -->
		            <?php if(!(empty($slide_info['url']) || (($slide_info['url'] instanceof \think\Collection || $slide_info['url'] instanceof \think\Paginator ) && $slide_info['url']->isEmpty()))): ?><a href="<?php echo $slide_info['url']; ?>"><?php endif; ?>
					<img src="<?php echo $slide_info['img_url']; ?>" style="width:100%;" title='<?php echo $slide_info['title']; ?>'/>
					<?php if(!(empty($slide_info['url']) || (($slide_info['url'] instanceof \think\Collection || $slide_info['url'] instanceof \think\Paginator ) && $slide_info['url']->isEmpty()))): ?></a><?php endif; if(is_array($slide_info['animate_data']) || $slide_info['animate_data'] instanceof \think\Collection || $slide_info['animate_data'] instanceof \think\Paginator): $i = 0; $__LIST__ = $slide_info['animate_data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$animate_info): $mod = ($i % 2 );++$i;if(!(empty($animate_info['url']) || (($animate_info['url'] instanceof \think\Collection || $animate_info['url'] instanceof \think\Paginator ) && $animate_info['url']->isEmpty()))): ?><a href="<?php echo $animate_info['url']; ?>"><?php endif; ?>
					<img src="<?php echo $animate_info['animate_img_url']; ?>" class="ani" <?php echo $animate_info['style']; ?>  swiper-animate-effect="<?php echo (isset($animate_info['effect']) && ($animate_info['effect'] !== '')?$animate_info['effect']:'fadeInUp'); ?>" swiper-animate-duration="<?php echo (isset($animate_info['duration']) && ($animate_info['duration'] !== '')?$animate_info['duration']:'0'); ?>s" swiper-animate-delay="<?php echo (isset($animate_info['delay']) && ($animate_info['delay'] !== '')?$animate_info['delay']:'0'); ?>s">
					<?php if(!(empty($animate_info['url']) || (($animate_info['url'] instanceof \think\Collection || $animate_info['url'] instanceof \think\Paginator ) && $animate_info['url']->isEmpty()))): ?></a><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<?php else: ?>
					<!-- 无动画 -->
		            <div class="swiper-slide">
		            <?php if(!(empty($slide_info['url']) || (($slide_info['url'] instanceof \think\Collection || $slide_info['url'] instanceof \think\Paginator ) && $slide_info['url']->isEmpty()))): ?><a href="<?php echo $slide_info['url']; ?>"><?php endif; ?>
		            <img src="<?php echo $slide_info['img_url']; ?>" style="width:100%;" title='<?php echo $slide_info['title']; ?>'/>
		            <?php if(!(empty($slide_info['url']) || (($slide_info['url'] instanceof \think\Collection || $slide_info['url'] instanceof \think\Paginator ) && $slide_info['url']->isEmpty()))): ?></a><?php endif; ?>
		            </div>
		            <?php endif; endforeach; endif; else: echo "" ;endif; ?>
		        </div>
			    <div class="swiper-pagination"></div>
			    <!-- 如果需要导航按钮 -->
			    <div class="swiper-button-prev"></div>
			    <div class="swiper-button-next"></div>
		    </div>		
		    <?php endif; ?>	
		</div>  
	</div>
	<div class="row margintop">	    			
		<div class="col-sm-6">
			<div class="row">
				<div class="col-xs-12">
					<div class="space-6"></div>
				</div>
			</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						<i class="ace-icon fa fa-bolt"></i>
						<span class="icon-dashboard"></span>通知
					</div>
					<div class="panel-body">
						<?php echo (isset($web_info['notic']) && ($web_info['notic'] !== '')?$web_info['notic']:"暂无通知"); ?>
					</div>
				</div>																	
			</div>
			<div class="col-sm-6">
				<div class="widget-box widget-color-dark">
					<div class="widget-header">
						<h5 class="widget-title" style="color:#ffff">今日</h5>	
				</div>	
				<div  class="widget-body panel-collapse collapse in">
				<!-- #section:custom/scrollbar --> 
					<div class="widget-main padding-4 scrollable" data-size="250">
						<?php if(!(empty($personal_data_list) || (($personal_data_list instanceof \think\Collection || $personal_data_list instanceof \think\Paginator ) && $personal_data_list->isEmpty()))): if(is_array($personal_data_list) || $personal_data_list instanceof \think\Collection || $personal_data_list instanceof \think\Paginator): if( count($personal_data_list)==0 ) : echo "" ;else: foreach($personal_data_list as $key=>$personal_data_info): ?>
						<div class="profile-activity clearfix">
							<div>
								<?php echo $personal_data_info['text']; ?>
								<div class="time">
								<i class="ace-icon fa fa-clock-o bigger-110"></i>
								<?php echo $personal_data_info['update_time']; ?>
								</div>
							</div>
							<div class="tools action-buttons">
<!-- 											<a class="red" href="#">
											<i class="ace-icon fa fa-times bigger-125"></i>
											</a> -->
							</div>	
						</div>										
						<?php endforeach; endif; else: echo "" ;endif; endif; if(empty($personal_data_list) || (($personal_data_list instanceof \think\Collection || $personal_data_list instanceof \think\Paginator ) && $personal_data_list->isEmpty())): ?>
						<p style="text-align:center">暂无数据</p>
						<?php endif; ?>
					</div>
				</div>
			</div>																	
		</div>
		<div class="vspace-12-sm"></div>
	</div><!-- /.row -->
	<div class="col-md-12">
	<?php if(!(empty($counselor_count_datas) || (($counselor_count_datas instanceof \think\Collection || $counselor_count_datas instanceof \think\Paginator ) && $counselor_count_datas->isEmpty()))): ?>
	<div id="booking_man" style="height:400px;"></div>
	<?php endif; if(!(empty($school_statistics_info['y_statistics_count']) || (($school_statistics_info['y_statistics_count'] instanceof \think\Collection || $school_statistics_info['y_statistics_count'] instanceof \think\Paginator ) && $school_statistics_info['y_statistics_count']->isEmpty()))): ?>
	<div id="school_booking_count" style="height:400px;"></div>
	<?php endif; if(!(empty($project_statistics_info['y_statistics_count']) || (($project_statistics_info['y_statistics_count'] instanceof \think\Collection || $project_statistics_info['y_statistics_count'] instanceof \think\Paginator ) && $project_statistics_info['y_statistics_count']->isEmpty()))): ?>
	<div id="project_booking_count" style="height:400px;"></div>
	<?php endif; if(!(empty($booking_statistics_info['y_booking_count']) || (($booking_statistics_info['y_booking_count'] instanceof \think\Collection || $booking_statistics_info['y_booking_count'] instanceof \think\Paginator ) && $booking_statistics_info['y_booking_count']->isEmpty()))): ?>
	<div id="booking_count" style="height:400px;"></div>
	<?php endif; ?>
	</div>

<link rel="stylesheet" href="__PUBLIC_PC__/ace/components/Swiper-3.4.1/css/swiper.min.css" />
<link rel="stylesheet" href="__PUBLIC_PC__/ace/components/Swiper-3.4.1/css/animate.min.css" />
<script type="text/javascript">
$(function(){
	var scripts=[
		"__PUBLIC_PC__/ace/components/Swiper-3.4.1/js/swiper.min.js",
		"__PUBLIC_PC__/ace/components/Swiper-3.4.1/js/swiper.animate1.0.2.min.js",
		"__PUBLIC_PC__/ace/components/chart/echarts-all.js",
		"__PUBLIC_PC__/admin/js/index/index.js"
	];
	$.addScript(scripts);
})
</script>

						</div><!-- /.page-content-area -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			<?php echo widget('NavBar/footer'); ?>
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		
		<!--[if IE]>
		<script src="__PUBLIC_PC__/ace/components/jquery.1x/dist/jquery.js"></script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='__PUBLIC_PC__/ace/components/_mod/jquery.mobile.custom/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="__PUBLIC_PC__/ace/components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- ace scripts -->			
		<script src="__PUBLIC_PC__/ace/assets/js/jquery.pjax.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/elements.scroller.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/elements.wysiwyg.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/elements.wizard.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/elements.aside.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/ace.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.scrolltop.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.touch-drag.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.sidebar-scroll-1.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.submenu-hover.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/src/ace.widget-box.js"></script>
		<script src="__PUBLIC_PC__/ace/components/phpjs/dest/phpjs_util.min.js"></script>
		<script src="__PUBLIC_PC__/ace/assets/js/maxlength.js"></script>
		<script src="__PUBLIC_PC__/ace/components/jquery-form/jquery.form.js"></script>
		<script src="__PUBLIC_PC__/ace/components/layer/layer.js"></script>
		<script src="__PUBLIC_PC__/ace/components/select2-4.0.3/js/select2.min.js"></script>
		<script src="__PUBLIC_PC__/ace/components/select2-4.0.3/js/pinyin.js"></script>
		<script src="__PUBLIC_PC__/ace/components/select2-4.0.3/js/i18n/zh-CN.js"></script>
		<script src="__PUBLIC_PC__/ace/components/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
        <script src="__PUBLIC_PC__/ace/components/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
		<script src="__PUBLIC_PC__/ace/components/bootstrap-table/bootstrap-table.js"></script>
		<script src="__PUBLIC_PC__/ace/components/bootstrap-table/locale/bootstrap-table-zh-CN.js"></script>
		<script src="__PUBLIC_PC__/admin/js/ldf.js?<?php echo time(); ?>"></script>
		
		
		
		
	</body>
	
</html>
