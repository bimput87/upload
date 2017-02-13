<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a target="_blank" href="http://ubig.co.id"><b>UBIG.CO.ID</b></a>
            <small>The world class big data provider</small>
        </div>
        <div class="card">
            <div class="body">
                <?php
                    if(!empty($_SESSION['flash_messsage'])){
                        $html = '<div class="alert alert-danger alert-dismissible">';
                        $html .= $_SESSION['flash_messsage']; 
                        $html .= '</div>';
                        echo $html;
                    }
                ?>
                <?php echo form_open(site_url().'login_user/forgot', array('id' => 'forgot_password')) ?>
                    <div style="display:none">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div> 
                    <div class="msg">
                        Enter your email address that you used to register. We'll send you an email with your username and a
                        link to reset your password.
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                        <?php echo form_error('email') ?>
                    </div>

                    <button class="btn btn-block btn-lg bg-red waves-effect" type="submit">RESET MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <?php echo anchor('/', 'Sign In!') ?>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>