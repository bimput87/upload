<section class="no-print">
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <?php  $str = ucfirst($this->session->userdata('first_name')); $str2 = ucfirst($this->session->userdata('last_name'));?>
                    <img class="img-circle" src="<?php echo site_url()."public/assets/img/".$str[0] ?>.png" width="50" height="50" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $str." ".$str2 ?></div>
                    <div class="email"><?php echo $this->session->userdata('email') ?></div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="<?php echo site_url() ?>member/profile"><i class="material-icons">person</i>Profile</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="<?php echo site_url() ?>member/logout"><i class="material-icons">input</i>Sign Out</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">MAIN NAVIGATION</li>
                    <li>
                        <a href="<?php echo site_url() ?>member">
                            <i class="material-icons">home</i>
                            <span>Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url() ?>member/tutorial">
                            <i class="material-icons">text_fields</i>
                            <span>Tutorial</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- #END# Right Sidebar -->
    </section>