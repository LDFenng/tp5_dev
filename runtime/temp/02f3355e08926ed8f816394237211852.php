<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"D:\wamp64\www\tp5_demo/app/admin\view\public\footer.html";i:1504506169;}*/ ?>
<div class="footer">
	<div class="footer-inner">
		<!-- #section:basics/footer -->
		<div class="footer-content">
			<span class="bigger-120">
				<span class="blue bolder"><?php echo (isset($foot_info['name']) && ($foot_info['name'] !== '')?$foot_info['name']:'LDF'); ?></span>
				版权所有 &copy; 2016-<?php echo date('Y'); ?>
			</span>
			&nbsp; &nbsp;
			<span class="action-buttons">
				<a href="#">
					<i class="ace-icon fa fa-qq light-blue bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-weibo text-primary bigger-150"></i>
				</a>

				<a href="#">
					<i class="ace-icon fa fa-weixin orange bigger-150"></i>
				</a>
			</span>
		</div>

		<!-- /section:basics/footer -->
	</div>
</div>