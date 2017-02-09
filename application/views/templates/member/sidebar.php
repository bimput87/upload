
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php
            $p = $this->session->userdata('first_name'); 
          ?>
          <img src="<?php echo site_url().'public/assets/img/'.$p[0].'.png' ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name') ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Dashboard</li>
        <li class="treeview">
          <a href="<?php echo site_url() ?>member">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
        <li class="header">API</li>
        <li class="treeview">
          <a href="<?php echo site_url() ?>member/page/show">
            <i class="fa fa-dashboard"></i> <span>My API</span>
          </a>
        </li>
        <li class="treeview">
          <a href="<?php echo site_url() ?>member/page/order">
            <i class="fa fa-dashboard"></i> <span>Order API</span>
          </a>
        </li>
        <li class="header">Tutorial</li>
        <li><a href="documentation/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
    </section>
    <!-- /.sidebar -->
  </aside>
