  <header class="main-header">
    <!-- Logo -->
    <a href="<?php echo site_url() ?>administrator" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>U</b>BIG</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UBIG</b>.CO.ID</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo $this->session->userdata('first_name') ?></span>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <?php
                  $p = ucfirst($this->session->userdata('first_name')); 
                ?>
                <img class="img-circle" src="<?php echo site_url().'public/assets/img/'.$p[0].'.png' ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('first_name')." ".$this->session->userdata('last_name'); ?>
                  <small><?php echo $this->session->userdata('email') ?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                	<?php echo anchor('member/logout', 'Sign Out', array('class' => 'btn btn-default btn-flat')) ?>
                </div>
              </li>
            </ul>
          </li>
          <li>
            <div class="col-xs-4"></div>
          </li>
        </ul>
      </div>
     

    </nav>
  </header>