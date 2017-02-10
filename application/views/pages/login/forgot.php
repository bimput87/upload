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
			<p class="login-box-msg">Fill email to reset your link for reset password</p>

			<?php echo form_open(site_url().'login_user/forgot/', array('class' => 'bs-example')) ?>
				<div style="display:none">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				</div> 
				<div class="form-group has-feedback">
					<input name="email" type="email" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php echo form_error('email') ?>
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