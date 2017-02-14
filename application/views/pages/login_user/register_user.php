<body class="signup-page">
    <div class="signup-box">
        <div class="logo">
            <a target="_blank" href="http://ubig.co.id"><img width="300" height="60" src="<?php echo site_url() ?>public/assets/img/logo-white-full.png"></a>
            <small>The world class big data provider</small>
        </div>
        <div class="card">
            <div class="body">
                <?php echo form_open(site_url().'login_user/register/', array('onsubmit' => "if(document.getElementById('terms').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }")) ?>
                    <div style="display:none">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                    </div> 
                    <div class="msg">Register a new membership</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="first_name" placeholder="First Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="last_name" placeholder="Last Name" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">email</i>
                        </span>
                        <div class="form-line">
                            <input type="email" class="form-control" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">phone</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="phone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">public</i>
                        </span>
                        <div class="bfh-selectbox bfh-countries" data-country="ID" data-flags="true">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">location_city</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="city" placeholder="City" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" name="terms" id="terms" class="filled-in chk-col-red" required="you must check this out">
                        <label for="terms">I agree to the terms of usage.</label>
                    </div>

                    <button class="btn btn-block btn-lg bg-red waves-effect" type="submit">SIGN UP</button>

                    <div class="m-t-25 m-b--5 align-center">
                        <?php echo anchor('/', 'You already have a membership?') ?>
                    </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>