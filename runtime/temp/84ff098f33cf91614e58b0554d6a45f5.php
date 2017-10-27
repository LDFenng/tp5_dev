<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:51:"D:\wamp64\www\tp5_demo/app/admin\view\test\bbb.html";i:1506312004;s:54:"D:\wamp64\www\tp5_demo/app/admin\view\public\base.html";i:1504862392;s:60:"D:\wamp64\www\tp5_demo/app/admin\view\public\breadcrumb.html";i:1504797159;}*/ ?>
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
							
	<style>

		#show-time{margin:20px;margin-bottom: 20px;text-align: center;}
		#record{margin-top:20px;}
		#record div{width:400px;height:30px;border-bottom:1px dotted #666;}
		#record span{font-size:20px;}
		.left{float:left;}
		.right{float:right;}
	</style>
    <div class="page-header">
        <h1>Bootstrap File Input Example
            <small><a href="https://github.com/kartik-v/bootstrap-fileinput-samples"><i
                    class="glyphicon glyphicon-download"></i> Download Sample Files</a></small>
        </h1>
    </div>
    <div class="row">
    	<div class="col-xs-6">
    	</div>
    	<div class="col-xs-6">
			<div id="bbbb"></div> 	
    	</div>
    	<div class="col-xs-6">
			<div id="qwer">
			
			</div>   	
    	</div>
    	<div class="col-xs-6">
			<div id="asd">
			
			</div>	
    	</div>  
    	<div class="col-xs-6">
			<div id="zxcv">
			
			</div>	
    	</div> 
    	 	    	    	
    </div>

	<div class="form-group">
			<div class="col-xs-12">
				<!-- #section:custom/file-input -->
				<input type="file" id="id-input-file-2" />
			</div>
		</div>
<link rel="stylesheet" href="__PUBLIC_PC__/admin/css/times-handle-1.0.css" />
<script src="__PUBLIC_PC__/ace/assets/js/src/elements.fileinput.js"></script>
<script src="__PUBLIC_PC__/admin/js/count-down-1.0.js"></script>
	<script type="text/javascript">

	$(function(){

		
		if($.addScript(['__PUBLIC_PC__/admin/js/count-down-1.0.js'])=='success'){
			$("#aaaa").timesHandle({
				type:'countDown',
				startTime:"<?php echo date('Y/m/d 23:40:00'); ?>",
				apart:100,
				timeEnd:function(){
					console.log(1111);
				}
			}); 
			$("#bbbb").timesHandle({
				type:'countDown',
				startTime:"<?php echo date('Y/m/d',strtotime('+20 days')); ?>",
				apart:10
			}); 
			$("#qwer").timesHandle({
				type:'clockTime'
			}); 
			$("#asd").timesHandle({
				type:'clockTime',
				isScale:true
			}); 
			$("#zxcv").timesHandle({
				type:'timer'
			});			
		}
		
		$('#id-input-file-2').ace_file_input({
			no_file:'No File ...',
			btn_choose:'Choose',
			btn_change:'Change',
			droppable:false,
			onchange:null,
			thumbnail:false //| true | large
			//whitelist:'gif|png|jpg|jpeg'
			//blacklist:'exe|php'
			//onchange:''
			//
		});
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
