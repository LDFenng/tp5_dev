<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:56:"D:\wamp64\www\tp5_demo/app/admin\view\sys\emailList.html";i:1505225710;s:54:"D:\wamp64\www\tp5_demo/app/admin\view\public\base.html";i:1504862392;s:60:"D:\wamp64\www\tp5_demo/app/admin\view\public\breadcrumb.html";i:1504797159;}*/ ?>
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
			系统管理
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				邮件账号配置
			</small>
		</h1>
	</div><!-- /.page-header -->
    <div class="row margintop">
		<form class="form-search"  method="post" id="ajax_page_list" action="<?php echo url('admin/Sys/emailList'); ?>" autocomplete="off">
			<div class="col-xs-2 col-lg-2">
				<select name='page_num' class='ajax-change select2 col-xs-12' ><option value='10' <?php if(10==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页10条</option><option value='15' <?php if(15==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页15条</option><option value='20' <?php if(20==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页20条</option><option value='50' <?php if(50==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页50条</option><option value='100' <?php if(100==\think\Request::instance()->param('page_num')): ?>selected='selected'<?php endif; ?>>每页100条</option></select>			
			</div>
			<div class="col-xs-6 col-lg-6 input-group-btn"> 
				<a href="<?php echo url('admin/Sys/editEmail'); ?>" class="btn btn-sm btn-info"  data-rel="tooltip" data-placement="bottom" title="添加" data-toggle="modal" data-target="#edit_data"><i class="ace-icon fa fa-plus bigger-130"></i>添加邮件账号</a>
				<?php if(!(empty($email_list) || (($email_list instanceof \think\Collection || $email_list instanceof \think\Paginator ) && $email_list->isEmpty()))): ?>
				<a class="btn btn-sm btn-default del-data" data-rel="tooltip" data-placement="bottom" title="删除"> <i class="ace-icon fa fa-trash-o bigger-130"></i> </a>			 
				<a href="#send_data" class="btn btn-sm btn-info"  data-rel="tooltip" data-placement="bottom" title="添加" data-toggle="modal"><i class="ace-icon fa fa-plus bigger-130"></i>测试发送</a>
				<?php endif; ?>
			</div>			   		
		</form>
    </div>	
	<div class="row">
		<div class="col-xs-12 table-responsive">
			<table class="table table-striped table-bordered table-hover">
				<thead>
				<tr>
					<th class="center">
						<label class="pos-rel">
							<input type="checkbox" class="ace input-lg check-all" value="<?php echo url('admin/Sys/delEmail'); ?>"/>
							<span class="lbl"></span>															
						</label>											
					</th>
					<th data-sortable="true" class="center">名称</th>
					<th data-sortable="true" class="center">账号</th>
					<th class="center hidden-md">回复账号</th>
					<th data-sortable="true" class="center hidden-md">排序</th>
					<th class="center hidden-md">是否启用</th>
					<th data-sortable="true" class="center hidden-md">添加时间</th>
					<th style="border-right:#CCC solid 1px;">操作</th>
				</tr>
				</thead>
				<tbody>
					<?php if(is_array($email_list) || $email_list instanceof \think\Collection || $email_list instanceof \think\Paginator): if( count($email_list)==0 ) : echo "" ;else: foreach($email_list as $key=>$email_info): ?>
						<tr class="center" id="data_<?php echo $email_info['id']; ?>">
							<td class="hidden-xs center">
								<label class="pos-rel">
									<input class="ace input-lg check-data" type='checkbox' value='<?php echo $email_info['id']; ?>'>
									<span class="lbl"></span>
								</label>
							</td>	
							<td><?php echo $email_info['name']; ?></td>
							<td><?php echo $email_info['email']; ?></td>
							<td class="hidden-md"><?php echo $email_info['reply_mail']; ?></td>
							<td class='hidden-md col-xs-1'><input class='form-control input-sm list-order' name="<?php echo $email_info['id']; ?>" value='<?php echo $email_info['sort']; ?>'></td>
							<td class="hidden-md">
								<?php if($email_info['is_enabled'] == 1): ?>
									<a class="btn btn-minier btn-yellow status-btn" href="<?php echo url('admin/Sys/changeEmailStatus'); ?>" data-id="<?php echo $email_info['id']; ?>" title="已开启">
										开启
									</a>
									<?php else: ?>
									<a class="btn btn-minier btn-danger status-btn" href="<?php echo url('admin/Sys/changeEmailStatus'); ?>" data-id="<?php echo $email_info['id']; ?>" title="已禁用">
										禁用
									</a>
								<?php endif; ?>
							</td>
							<td class="hidden-md"><?php echo date("Y-m-d",$email_info['create_time']); ?></td>
							<td>
								<div class="hidden-sm hidden-xs btn-group action-buttons">
									<a class="btn btn-xs btn-success" data-rel="tooltip" data-placement="bottom" href="<?php echo new_url('admin/Sys/editEmail',['id'=>$email_info['id']]); ?>" data-toggle="modal" data-target="#edit_data" title="编辑">
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
												<a href="<?php echo new_url('admin/Sys/editEmail',['id'=>$email_info['id']]); ?>" data-toggle="modal" data-target="#edit_data" data-placement="bottom" data-rel="tooltip" title="编辑">
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
	<div class="row margintop">
		<div class="col-xs-1">
		<a class="btn btn-white btn-yellow btn-sm btn-order" href="<?php echo url('admin/Sys/orderEmail'); ?>">排序</a>
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
	<div class="modal fade" id="send_data" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	    <div class="form-horizontal modal-dialog">
	      <div class="modal-content">
<!-- 项目状态模态框 -->
<form class="form-horizontal ajax-form-1" method="post" action="<?php echo new_url('admin/Sys/sendEmail'); ?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">添加、编辑邮件账户</h4>
	</div>
	<div class="modal-body">	
		<div class="row">
			<div class="col-sm-12">
				<input type="hidden" name="id" value='<?php echo (isset($email_info['id']) && ($email_info['id'] !== '')?$email_info['id']:null); ?>'>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">收件人： </label>
					<div class="col-sm-9">
						<input type="text" name="name" id="name" value="" class="col-xs-7" required/>
						<span class="help-inline col-xs-12 col-sm-5">
							<span class="middle red">*</span>
						</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">地址： </label>
					<div class="col-sm-9">
						<input type="text" name="email" id="email" value="" class="col-xs-7" required/>
						<span class="help-inline col-xs-12 col-sm-5">
							<span class="middle red">*</span>
						</span>
					</div>
				</div>				
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">抄送人： </label>
					<div class="col-sm-9">
						<input type="text" name="cc" id="cc" value="" class="col-xs-7" pattern="([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" title="邮箱格式错误"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>									
					</div>							
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">标题： </label>
					<div class="col-sm-9">
						<input type="text" name="title" value="" class="col-xs-7"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>	
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">内容： </label>
					<div class="col-sm-9">
						<input type="text" name="content"  value="" class="col-xs-7"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>	
					</div>
				</div>					
			</div>														
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-success">发送</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	</div>	
</form>	
	      </div>
	      <!-- /.modal-content --> 
	    </div>
	    <!-- /.modal-dialog -->
	</div>	
<script type="text/javascript">
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
