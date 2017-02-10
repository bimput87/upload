<body class="hold-transition register-page">
	<div class="register-box">

		<div class="register-box-body">
			<p class="login-box-msg">Register a new membership</p>
			<?php echo form_open(site_url().'login_user/register/') ?>
				<div style="display:none">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				</div>      
				<div class="form-group has-feedback">
					<input name="first_name" type="text" class="form-control" placeholder="First name">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<?php echo form_error('first_name') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="last_name" type="text" class="form-control" placeholder="Last name">
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
					<?php echo form_error('last_name') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="email" type="email" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php echo form_error('email') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="phone" type="text" class="form-control" placeholder="Phone">
					<span class="glyphicon glyphicon-phone form-control-feedback"></span>
					<?php echo form_error('phone') ?>
				</div>
				<div class="form-group has-feedback">
					<div class="bfh-selectbox bfh-countries" data-country="ID" data-flags="true">
					</div>				
				</div>
				<div class="form-group has-feedback">
					<input name="city" type="text" class="form-control" placeholder="City">
					<span class="glyphicon glyphicon-home form-control-feedback"></span>
					<?php echo form_error('city') ?>
				</div>
				<div class="form-group has-feedback">
					<div class="row">
						<div class="col-xs-8">
						</div>
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
						</div>
					</div>
					<?php echo anchor('/', 'I already have an account', array('class' => 'text-center')) ?>
				</div>
			<?php echo form_close() ?>
			<!-- /.form-box -->
		</div>
		<!-- /.register-box -->