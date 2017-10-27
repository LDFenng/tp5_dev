<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:61:"D:\wamp64\www\tp5_demo/app/admin\view\material\videoList.html";i:1504664314;s:54:"D:\wamp64\www\tp5_demo/app/admin\view\public\base.html";i:1504862392;s:60:"D:\wamp64\www\tp5_demo/app/admin\view\public\breadcrumb.html";i:1504797159;s:64:"D:\wamp64\www\tp5_demo/app/admin\view\file_upload\fileModal.html";i:1504667787;}*/ ?>
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
		<h1>
			素材管理
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				视频列表
			</small>
		</h1>
	</div><!-- /.page-header -->
	<form class="form-search form-horizontal" id="ajax_page_list" method="post" action="<?php echo url('admin/Material/videoList'); ?>">
		<div class="row margintop" id="table_bar">
			<div class="col-xs-12 col-lg-5">
				<select name='page_num' class='ajax-change select2' style='width:35%'><option value='10' <?php if(10==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页10条</option><option value='15' <?php if(15==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页15条</option><option value='20' <?php if(20==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页20条</option><option value='50' <?php if(50==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页50条</option><option value='100' <?php if(100==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页100条</option></select>	
		        <select name="type" class="ajax-change select2" style="width:63%" data-placeholder='点击选择'>
					<?php if(is_array(\think\Config::get('extarray.video_type')) || \think\Config::get('extarray.video_type') instanceof \think\Collection || \think\Config::get('extarray.video_type') instanceof \think\Paginator): $i = 0; $__LIST__ = \think\Config::get('extarray.video_type');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type_info): $mod = ($i % 2 );++$i;?>
						<option value="<?php echo $type_info['code']; ?>" <?php if($type_info['code'] == \think\Request::instance()->param('type')): ?>selected<?php endif; ?>><?php echo $type_info['title']; ?></option>
					<?php endforeach; endif; else: echo "" ;endif; ?>
		        </select>    		        				
			</div>
			<div class="col-xs-12 col-lg-4">
				<div class="input-group"> <span class="input-group-addon"> <i class="ace-icon fa fa-check"></i> </span>
					<input type="text" name="key_words" id="key_words" class="input-xs form-control" value="<?php echo \think\Request::instance()->param('key_words'); ?>" placeholder="名称" />
				</div>       
			</div>			
			<div class="col-xs-12 col-lg-3 input-group-btn"> 
				<a class="btn btn-sm btm-input btn-purple ajax-search-form" data-rel="tooltip" data-placement="bottom" title="搜索"> <i class="ace-icon fa fa-search icon-on-right bigger-130"></i> 搜索 </a>
				<a data-ajax-page='true' class="btn btn-sm  btn-success" href="<?php echo url('admin/Material/videoList'); ?>" data-rel="tooltip" data-placement="bottom" title="显示全部"><i class="ace-icon fa fa-globe bigger-130"></i> 显示全部 </a>	
				<a href="<?php echo new_url('admin/Material/editVideo'); ?>" class="btn btn-sm btn-info" data-rel="tooltip" data-placement="bottom" title="添加" data-toggle="modal" data-target="#edit_data"><i class="ace-icon fa fa-plus bigger-130"></i>添加视频</a>
				<?php if(!(empty($video_list) || (($video_list instanceof \think\Collection || $video_list instanceof \think\Paginator ) && $video_list->isEmpty()))): ?>
				<a class="btn btn-sm btn-default del-data" data-rel="tooltip" data-placement="bottom" title="删除"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>			 
				<?php endif; ?>
			</div>
		</div>  	 
		<div class="row margintop">
			<div class="col-xs-12">
				<table data-locale='zh-CN' data-toggle="table" data-toolbar="#table_bar" data-seacrh='true' data-show-columns="true" class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<tr>
							<th class="center">
								<label class="pos-rel">
									<input type="checkbox" class="ace input-lg check-all" value="<?php echo url('admin/Material/delVideo'); ?>"/>
									<span class="lbl"></span>															
								</label>											
							</th>
							<th data-sortable="true" class="center hidden-sm hidden-xs">编号</th>
							<th data-sortable="true" class="center">名称</th>
							<th data-sortable="true" class="center">艺术家</th>
						    <th data-sortable="true" class="center">类型</th>
							<th data-sortable="true" class="center hidden-sm hidden-xs">大小</th>
							<th data-sortable="true" class="center">分辨率</th>
							<th data-sortable="true" class="center hidden-sm hidden-xs">时长</th>
							<th data-sortable="true" class="center hidden-sm hidden-xs">是否审核</th>
							<th data-sortable="true" class="center">排序</th>
							<th data-sortable="true" class="center hidden-sm hidden-xs">添加时间</th>
							<th style="border-right:#CCC solid 1px;">操作</th>
						</tr>	
					</thead>	
					<tbody>
						<?php if(is_array($video_list) || $video_list instanceof \think\Collection || $video_list instanceof \think\Paginator): if( count($video_list)==0 ) : echo "" ;else: foreach($video_list as $key=>$video_info): ?>
							<tr class="center" id="data_<?php echo $video_info['id']; ?>">
								<td class="hidden-xs center">
									<label class="pos-rel">
										<input class="ace input-lg check-data" type='checkbox' value='<?php echo $video_info['id']; ?>'>
										<span class="lbl"></span>
									</label>
								</td>	
								<td class="hidden-sm hidden-xs"><?php echo $video_info['id']; ?></td>
								<td><?php echo $video_info['name']; ?></td>
								<td><?php echo $video_info['artist']; ?></td>
								<td>
								<?php if(is_array(\think\Config::get('extarray.video_type')) || \think\Config::get('extarray.video_type') instanceof \think\Collection || \think\Config::get('extarray.video_type') instanceof \think\Paginator): $i = 0; $__LIST__ = \think\Config::get('extarray.video_type');if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$type_info): $mod = ($i % 2 );++$i;if($type_info['code'] == $video_info['type']): ?>
									<span class="label label-info"><?php echo $type_info['title']; ?></span>
									<?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</td>
								<td class="hidden-sm hidden-xs"><?php echo format_bytes($video_info['size']); ?></td>
								<td class="hidden-sm hidden-xs"><?php echo $video_info['resolution']; ?></td> 
								<td class="hidden-sm hidden-xs"><?php echo (isset($video_info['play_time']) && ($video_info['play_time'] !== '')?$video_info['play_time']:'【未知】'); ?></td>
								<td>
									<?php if($video_info['is_enabled'] == 1): ?>
										<a class="btn btn-minier btn-yellow status-btn" href="<?php echo url('admin/Material/changeVideoStatus'); ?>" data-id="<?php echo $video_info['id']; ?>" title="已通过">
											通过
										</a>
										<?php else: ?>
										<a class="btn btn-minier btn-danger status-btn" href="<?php echo url('admin/Material/changeVideoStatus'); ?>" data-id="<?php echo $video_info['id']; ?>" title="未审核">
											未审核
										</a>
									<?php endif; ?>
								</td>	
								<td class='hidden-sm hidden-xs col-xs-1'><input class='form-control input-sm list-order' name="<?php echo $video_info['id']; ?>" value='<?php echo $video_info['sort']; ?>'></td>					
								<td class="hidden-sm hidden-xs"><?php echo date("Y-m-d",$video_info['create_time']); ?></td>
								<td>
									<div class="hidden-sm hidden-xs btn-group action-buttons">
										<a class="btn btn-xs btn-success" data-rel="tooltip" data-placement="bottom" href="<?php echo new_url('admin/Material/editVideo',['id'=>$video_info['id']]); ?>" data-toggle="modal" data-target="#edit_data" title="编辑">
										<i class="ace-icon fa fa-pencil-square-o bigger-160"></i>
										</a>
									</div>		
									<div class="hidden-md hidden-lg">
										<div class="inline position-relative">
											<button class="btn btn-minier btn-primary dropdown-toggle" data-toggle="dropdown" data-position="auto">
												<i class="ace-icon fa fa-cog icon-only bigger-110"></i>
											</button>
											<ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
												<li>
													<a href="<?php echo new_url('admin/Material/editVideo',['id'=>$video_info['id']]); ?>" data-placement="bottom" data-rel="tooltip" data-toggle="modal" data-target="#edit_data" title="编辑">
														<span class="green">
															<i class="ace-icon fa fa-pencil bigger-120"></i>
														</span>
													</a>
												</li>
											</ul>
										</div>
									</div>
								</td>
							</tr>
						<?php endforeach; endif; else: echo "" ;endif; ?>
					</tbody>								
				</table>
			</div>		
		</div> 
	</form> 
	<div class="row">
		<div class="col-xs-1 btn-corner">
		<a class="btn btn-white btn-yellow btn-sm btn-order" href="<?php echo new_url('admin/Material/orderVideo'); ?>">排序</a>
		</div>
		<div class="col-xs-10 center"><?php echo $page; ?></div>
		<div class="col-xs-1"></div>	
	</div>	 
	<!-- 项目模态框 -->
	<div class="modal fade" id="edit_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="form-horizontal modal-dialog">
	      <div class="modal-content">
	
	      </div>
	      <!-- /.modal-content --> 
	    </div>
	    <!-- /.modal-dialog -->
	</div>	
		<!-- 项目模态框 -->
<div class="modal fade" id="file_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="form-horizontal modal-dialog">
      <div class="modal-content">

      </div>
      <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog -->
</div>	
<input type="hidden" id="crop_img_url" value="<?php echo url('admin/FileUpload/uploadOneImg'); ?>"> 
<input type="hidden" id="upload_file_url" value="<?php echo url('admin/FileUpload/filesUpload'); ?>">
<input type="hidden" id="select_file_url" value="<?php echo url('admin/FileUpload/materialFile'); ?>">
<script type="text/javascript">
$("#file_modal").on("hidden.bs.modal", function() {  
	$("#file_modal").removeData("bs.modal");  
});
var xhrOnProgress=function(fun) {
    xhrOnProgress.onprogress = fun; //绑定监听
    //使用闭包实现监听绑
    return function() {
        //通过$.ajaxSettings.xhr();获得XMLHttpRequest对象
        var xhr = $.ajaxSettings.xhr();
        //判断监听函数是否为函数
        if (typeof xhrOnProgress.onprogress !== 'function')
            return xhr;
        //如果有监听函数并且xhr对象支持绑定时就把监听函数绑定上去
        if (xhrOnProgress.onprogress && xhr.upload) {
            xhr.upload.onprogress = xhrOnProgress.onprogress;
        }
        return xhr;
    }
}

//保留小数
function decimal(num,v){
	var vv = Math.pow(10,v);
	return Math.round(num*vv)/vv;
}
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
