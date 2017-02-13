<body class="fp-page">
    <div class="fp-box">
        <div class="logo">
            <a target="_blank" href="http://ubig.co.id"><b>UBIG.CO.ID</b></a>
            <small>The world class big data provider</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open(site_url().'login_user/complete/token/'.$token) ?>
                    <div style="display:none">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                    </div> 
                    <div class="msg">
                        Hello <b><?php echo $first_name."</b></br>"; ?>
                        Your username is <b><?php echo $email."</b></br>" ?>
                        <b>Please fill your password to complete registration</b>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required autofocus>
                        </div>
                        <?php echo form_error('password') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="passconf" placeholder="Retype Password" required autofocus>
                        </div>
                        <?php echo form_error('passconf') ?>
                    </div>
                    <button class="btn btn-block btn-lg bg-red waves-effect" type="submit">REGISTER</button>

                    <div class="row m-t-20 m-b--5 align-center">
                        <?php echo anchor('/', 'Sign In!') ?>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>