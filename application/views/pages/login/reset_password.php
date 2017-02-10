<body class="hold-transition register-page">
	<div class="register-box">

		<div class="register-box-body">
			<?php
				if(!empty($_SESSION['flash_messsage'])){
					$html = '<div class="alert alert-danger alert-dismissible">';
					$html .= $_SESSION['flash_messsage']; 
					$html .= '</div>';
					echo $html;
				}
			?>
			<p class="login-box-msg">Update your password below</p>

			<?php echo form_open(site_url().'login_user/reset_password/', array('class' => 'bs-example')) ?>
				<div style="display:none">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
				</div> 
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php echo form_error('password') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="passconf" type="password" class="form-control" placeholder="Retype Password">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php echo form_error('passconf') ?>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Send</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo form_close() ?>
			<?php echo anchor('/', 'Back') ?>
		</div>
		<!-- /.form-box -->
	</div>
	<!-- /.register-box -->