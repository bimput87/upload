<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   ?>
	<!-- Left side column. contains the logo and sidebar -->
	<aside class="main-sidebar">
		<!-- sidebar: style can be found in sidebar.less -->
		<section class="sidebar">
			<!-- Sidebar user panel -->
			<div class="user-panel">
				<div class="pull-left image">
					<?php
						$p = ucfirst($this->session->userdata('first_name')); 
					?>
					<img src="<?php echo site_url().'public/assets/img/'.$p[0].'.png' ?>" class="img-circle" alt="User Image">
				</div>
				<div class="pull-left info">
					<p><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name') ?></p>
					<a href="#"><i class="fa fa-circle text-success"></i> Administrator</a>
				</div>
			</div>
			<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator">
						<i class="fa fa-dashboard"></i> <span>Dashboard</span>
					</a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator/members">
						<i class="fa fa-users"></i> <span>Members</span>
					</a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator/orders">
						<i class="fa fa-shopping-basket"></i> <span>Orders</span>
					</a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator/api">
						<i class="fa fa-diamond"></i> <span>API Keys</span>
					</a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator/setting">
						<i class="fa fa-gears"></i> <span>Setting & Logs</span>
					</a>
				</li>
				<li class="treeview">
					<a href="<?php echo site_url() ?>administrator/admin">
						<i class="fa fa-user"></i> <span>Admin</span>
					</a>
				</li>
		</section>
		<!-- /.sidebar -->
	</aside>
