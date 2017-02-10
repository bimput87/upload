<body class="hold-transition register-page">
	<div class="register-box">

		<div class="register-box-body">
			<div class="callout callout-info">
				<p>Hello <?php echo $first_name; ?>
				<p>Your username is <?php echo $email ?>
			</div>
			<p class="login-box-msg">Fill your password to finish sign up process</p>

			<?php echo form_open(site_url().'login_user/complete/token/'.$token, array('class' => 'bs-example')) ?>
				<div style="display:none">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
					<input type="hidden" name="user_id" value="<?php echo $user_id ?>">
				</div>      
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<?php echo form_error('password') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="passconf" type="password" class="form-control" placeholder="Retype password">
					<span class="glyphicon glyphicon-log-in form-control-feedback"></span>
					<?php echo form_error('passconf') ?>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo form_close() ?>

		</div>
		<!-- /.form-box -->
	</div>
	<!-- /.register-box -->