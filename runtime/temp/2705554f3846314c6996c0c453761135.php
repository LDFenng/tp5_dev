<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:58:"D:\wamp64\www\tp5_demo/app/admin\view\public\leftMenu.html";i:1505014447;}*/ ?>
<!-- #section:basics/sidebar -->
<div id="sidebar" class="sidebar responsive ace-save-state sidebar-fixed sidebar-scroll compact">
	<script type="text/javascript">
		try{ace.settings.loadState('sidebar')}catch(e){}
	</script>

	<div class="sidebar-shortcuts" id="sidebar-shortcuts">
		<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
			<button class="btn btn-success">
				<i class="ace-icon fa fa-signal"></i>
			</button>
			<button class="btn btn-info reload-btn" type='button'>
				<i class="ace-icon fa fa-refresh "></i>
			</button>
			<!-- #section:basics/sidebar.layout.shortcuts -->
			<button class="btn btn-warning">
				<i class="ace-icon fa fa-users"></i>
			</button>
			<button class="btn btn-danger">
				<i class="ace-icon fa fa-cogs"></i>
			</button>
			<!-- /section:basics/sidebar.layout.shortcuts -->
		</div>
		<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
			<span class="btn btn-success"></span>
			<span class="btn btn-info"></span>
			<span class="btn btn-warning"></span>
			<span class="btn btn-danger"></span>
		</div>
	</div><!-- /.sidebar-shortcuts -->

	<ul class="nav nav-list">
		<?php if(!(empty($menu_list) || (($menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator ) && $menu_list->isEmpty()))): if(is_array($menu_list) || $menu_list instanceof \think\Collection || $menu_list instanceof \think\Paginator): if( count($menu_list)==0 ) : echo "" ;else: foreach($menu_list as $key=>$menu_info): if(empty($menu_info['child'])): ?>
		<li id='menu_<?php echo $menu_info['id']; ?>' class="hover <?php if($menu_info['is_selected'] == true): ?> active<?php endif; ?>">
			<a data-ajax-page='true' href="<?php echo url($menu_info['url'],['md'=>$menu_info['id']]); ?>">
				<i class="menu-icon fa <?php echo (isset($menu_info['icon']) && ($menu_info['icon'] !== '')?$menu_info['icon']:'fa-desktop'); ?>"></i>
				<span class="menu-text"> <?php echo (isset($menu_info['title']) && ($menu_info['title'] !== '')?$menu_info['title']:'【非法菜单】'); ?> </span>
			</a>
			<b class="arrow"></b>
		</li>		
		<?php else: ?>
		<li id='menu_<?php echo $menu_info['id']; ?>' class="hover <?php if($menu_info['is_selected'] == true): ?>active<?php endif; ?>">
			<a data-ajax-page=false href="#" class="dropdown-toggle">
				<i class="menu-icon fa <?php echo (isset($menu_info['icon']) && ($menu_info['icon'] !== '')?$menu_info['icon']:'fa-desktop'); ?>"></i>
				<span class="menu-text">
					<?php echo (isset($menu_info['title']) && ($menu_info['title'] !== '')?$menu_info['title']:'【非法菜单】'); ?>
				</span>
				<b class="arrow fa fa-angle-down"></b>
			</a>
			<b class="arrow"></b>
			<ul class="submenu">
			<?php if(is_array($menu_info['child']) || $menu_info['child'] instanceof \think\Collection || $menu_info['child'] instanceof \think\Paginator): if( count($menu_info['child'])==0 ) : echo "" ;else: foreach($menu_info['child'] as $key=>$two_info): if(empty($two_info['child'])): ?>
				<li id='menu_<?php echo $menu_info['id']; ?>_<?php echo $two_info['id']; ?>' class="hover <?php if($two_info['is_selected'] == true): ?>active<?php endif; ?>">
					<a data-ajax-page='true' href="<?php echo url($two_info['url'],['md'=>$two_info['id']]); ?>">
						<i class="menu-icon fa <?php echo (isset($two_info['icon']) && ($two_info['icon'] !== '')?$two_info['icon']:'fa-desktop'); ?>"></i>
						<span class="menu-text">
						<?php echo (isset($two_info['title']) && ($two_info['title'] !== '')?$two_info['title']:'【非法菜单】'); ?>
						</span>
					</a>
					<b class="arrow"></b>
				</li>		
			<?php else: ?>
				<li id='menu_<?php echo $menu_info['id']; ?>_<?php echo $two_info['id']; ?>' class="<?php if($two_info['is_selected'] == true): ?>open active<?php endif; ?>">
					<a data-ajax-page='false' href="#" class="dropdown-toggle">
						<i class="menu-icon fa <?php echo (isset($two_info['css']) && ($two_info['css'] !== '')?$two_info['css']:'fa-desktop'); ?>"></i>
						<span class="menu-text" style="padding-left:10px">
						<?php echo (isset($two_info['title']) && ($two_info['title'] !== '')?$two_info['title']:'【非法菜单】'); ?>
						</span>
						<b class="arrow fa fa-angle-down"></b>
					</a>
					<b class="arrow"></b>
					<ul class="submenu">
					<?php if(is_array($two_info['child']) || $two_info['child'] instanceof \think\Collection || $two_info['child'] instanceof \think\Paginator): if( count($two_info['child'])==0 ) : echo "" ;else: foreach($two_info['child'] as $key=>$three_info): if(empty($three_info['child'])): ?>
						<li id='menu_<?php echo $menu_info['id']; ?>_<?php echo $two_info['id']; ?>_<?php echo $three_info['id']; ?>' class="hover <?php if($three_info['is_selected'] == true): ?>active<?php endif; ?>">
							<a data-ajax-page='true' href="<?php echo url($three_info['url'],['md'=>$three_info['id']]); ?>">
								<i class="menu-icon fa <?php echo (isset($three_info['icon']) && ($three_info['icon'] !== '')?$three_info['icon']:'fa-desktop'); ?>"></i>
								<span class="menu-text">
								<?php echo (isset($three_info['title']) && ($three_info['title'] !== '')?$three_info['title']:'【非法菜单】'); ?>
								</span>
							</a>
							<b class="arrow"></b>
						</li>					
					<?php else: ?>
						<li id='menu_<?php echo $menu_info['id']; ?>_<?php echo $two_info['id']; ?>_<?php echo $three_info['id']; ?>' class="hover <?php if($three_info['is_selected'] == true): ?>active<?php endif; ?>">
							<a data-ajax-page=false href="#" class="dropdown-toggle">
								<i class="menu-icon fa <?php echo (isset($three_info['icon']) && ($three_info['icon'] !== '')?$three_info['icon']:'fa-desktop'); ?>"></i>
								<span class="menu-text">
								<?php echo (isset($three_info['title']) && ($three_info['title'] !== '')?$three_info['title']:'【非法菜单】'); ?>
								</span>
								<b class="arrow fa fa-angle-down"></b>
							</a>
							<b class="arrow"></b>
							<ul class="submenu">
							<?php if(is_array($three_info['child']) || $three_info['child'] instanceof \think\Collection || $three_info['child'] instanceof \think\Paginator): if( count($three_info['child'])==0 ) : echo "" ;else: foreach($three_info['child'] as $key=>$four_info): ?>
								<li id='menu_<?php echo $menu_info['id']; ?>_<?php echo $two_info['id']; ?>_<?php echo $three_info['id']; ?>_<?php echo $four_info['id']; ?>' class="hover <?php if($four_info['is_selected'] == true): ?>active<?php endif; ?>">
									<a data-ajax-page='true' href="<?php echo url($four_info['url'],['md'=>$four_info['id']]); ?>">
										<i class="menu-icon fa <?php echo (isset($four_info['icon']) && ($four_info['icon'] !== '')?$four_info['icon']:'fa-desktop'); ?> purple"></i>
										<span class="menu-text">
										<?php echo (isset($four_info['title']) && ($four_info['title'] !== '')?$four_info['title']:'【非法菜单】'); ?>
										</span>
									</a>
									<b class="arrow"></b>
								</li>							
							<?php endforeach; endif; else: echo "" ;endif; ?>							
							</ul>
						</li>					
					<?php endif; endforeach; endif; else: echo "" ;endif; ?>					
					</ul>
				</li>				
			<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</ul>
		</li>		
		<?php endif; endforeach; endif; else: echo "" ;endif; endif; ?>
	</ul><!-- /.nav-list -->
	<!-- #section:basics/sidebar.layout.minimize -->
	<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
		<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
	</div>
	<!-- /section:basics/sidebar.layout.minimize -->
</div>