<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');   ?>
<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a target="_blank" href="http://ubig.co.id"><img width="300" height="60" src="<?php echo site_url() ?>public/assets/img/logo-white-full.png"></a>
            <small>The world class big data provider</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open(site_url().'login_user/reset_password', array('id' => 'forgot_password')) ?>
                    <div style="display:none">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    </div> 
                    <div class="msg">
                        Update your password below
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" minlength="6" placeholder="Password" required>
                        </div>
                        <?php echo form_error('password') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="passconf" minlength="6" placeholder="Retype Password" required>
                        </div>
                        <?php echo form_error('passconf') ?>
                    </div>

                    <button class="btn btn-block btn-lg bg-red waves-effect" type="submit">UPDATE MY PASSWORD</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <?php echo anchor('/', 'Sign In!') ?>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>