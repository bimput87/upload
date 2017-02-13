<body class="login-page">
    <div class="login-box body">
        <div class="logo">
            <a target="_blank" href="http://ubig.co.id"><b>UBIG</b>.CO.ID</a>
            <small>The word class big data provider</small>
        </div>
        <div class="card">
            <?php
                if(!empty($_SESSION['flash_messsage'])){
                    $html = '<div class="alert bg-red">';
                    $html .= $_SESSION['flash_messsage']; 
                    $html .= '</div>';
                    echo $html;
                }
            ?>
            <div class="body">
                <?php echo form_open(site_url().'admin') ?>
                    <div style="display:none">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div>
                    <div class="msg">Sign in to start your session</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="email" placeholder="Email" required autofocus>
                        </div>
                        <?php echo form_error('email') ?>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                        </div>
                        <?php echo form_error('password') ?>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-block bg-red waves-effect" type="submit">SIGN IN</button>
                        </div>
                    </div>
                <?php echo form_close() ?>
            
            </div>
        </div>
    </div>