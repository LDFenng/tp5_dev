<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\wamp64\www\tp5_demo/app/admin\view\sys\editEmail.html";i:1505224906;}*/ ?>
<!-- 项目状态模态框 -->
<form class="form-horizontal ajax-form-1" method="post" action="<?php echo new_url('admin/Sys/saveEmail'); ?>">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title">添加、编辑邮件账户</h4>
	</div>
	<div class="modal-body">	
		<div class="row">
			<div class="col-sm-12">
				<input type="hidden" name="id" value='<?php echo (isset($email_info['id']) && ($email_info['id'] !== '')?$email_info['id']:null); ?>'>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">账号名称： </label>
					<div class="col-sm-9">
						<input type="text" name="name" id="name" value="<?php echo (isset($email_info['name']) && ($email_info['name'] !== '')?$email_info['name']:null); ?>" class="col-xs-7" required/>
						<span class="help-inline col-xs-12 col-sm-5">
							<span class="middle red">*</span>
						</span>
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">邮件地址： </label>
					<div class="col-sm-9">
						<input type="text" name="email" id="email" value="<?php echo (isset($email_info['email']) && ($email_info['email'] !== '')?$email_info['email']:null); ?>" class="col-xs-7" pattern="([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" title="邮箱格式错误"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>									
					</div>							
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">邮件密码： </label>
					<div class="col-sm-9">
						<input type="text" name="password" id="password" value="<?php echo (isset($email_info['password']) && ($email_info['password'] !== '')?$email_info['password']:null); ?>" class="col-xs-7"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>	
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">回复邮件地址： </label>
					<div class="col-sm-9">
						<input type="text" name="reply_mail" id="reply_mail" placeholder="默认跟发件地址同一个" value="<?php echo (isset($email_info['reply_mail']) && ($email_info['reply_mail'] !== '')?$email_info['reply_mail']:null); ?>" class="col-xs-7" pattern="([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+" title="邮箱格式错误"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>	
					</div>
				</div>
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">服务端口： </label>
					<div class="col-sm-9">
						<input type="text" name="mail_port" id="mail_port" value="<?php echo (isset($email_info['mail_port']) && ($email_info['mail_port'] !== '')?$email_info['mail_port']:25); ?>" class="col-xs-7"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">请登录各服务商邮件管理查询端口</span>
						</span>	
					</div>
				</div>					
				<div class="space-4"></div>
				<div class="form-group">
					<label class="col-sm-3 control-label no-padding-right">服务商地址： </label>
					<div class="col-sm-9">
						<input type="text" name="host" id="host" value="<?php echo (isset($email_info['host']) && ($email_info['host'] !== '')?$email_info['host']:null); ?>" class="col-xs-7"/>
						<span class="help-inline col-xs-12 col-sm-5"> 
							<span class="middle red">*</span>
						</span>	
					</div>
				</div>						
			</div>														
		</div>
	</div>
	<div class="modal-footer">
		<button type="submit" class="btn btn-success">提交</button>
		<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
	</div>	
</form>
<script type="text/javascript">

</script>
