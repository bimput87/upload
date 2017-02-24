<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); ?>
 <section class="content">
    <div class="container-fluid">
        <!-- Vertical Layout -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <?php
                        if(!empty($_SESSION['flash_messsage'])){
                            $html = '<div class="alert bg-red">';
                            $html .= $_SESSION['flash_messsage']; 
                            $html .= '</div>';
                            echo $html;
                        }
                    ?>
                    <div class="header">
                        <h2>
                            UPDATE PASSWORD
                        </h2>
                    </div>
                    <div class="body">
                        <?php echo form_open('member/profile') ?>
                            <div style="display:none">
                                <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                            </div>
                            <label for="password">Old Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="old_password" class="form-control" placeholder="Enter your old password" required>
                                </div>
                                <?php echo form_error('old_password') ?>
                            </div>
                            <label for="password">New Password</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="newpasswd" class="form-control" placeholder="Enter your new password" required>
                                </div>
                                <?php echo form_error('newpasswd') ?>
                            </div>
                            <label for="password">Password Confirmation</label>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="password" name="passconf" class="form-control" placeholder="Retype your new password" required>
                                </div>
                                <?php echo form_error('passconf') ?>
                            </div>
                            <button type="submit" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                        <?php echo form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </section>