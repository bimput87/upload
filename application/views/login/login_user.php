<?php  
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>User | Log in</title>

	<?php  require_once VINC.'header.php';?>

</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<!-- /.login-logo -->
		<div class="login-box-body">
			<?php
				if(!empty($_SESSION['flash_messsage'])){
					$html = '<div class="alert alert-danger alert-dismissible">';
					$html .= $_SESSION['flash_messsage']; 
					$html .= '</div>';
					echo $html;
				}
			?>
			<p class="login-box-msg">Sign in to start your session</p>
			<?php echo form_open(site_url().'login_user/status_login/') ?>
				<div style="display:none">
					<input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
				</div>   
				<div class="form-group has-feedback">
					<input name="email" type="email" class="form-control" placeholder="Email">
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
					<?php echo form_error('email') ?>
				</div>
				<div class="form-group has-feedback">
					<input name="password" type="password" class="form-control" placeholder="Password">
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					<?php echo form_error('password') ?>
				</div>
				<div class="row">
					<div class="col-xs-8">
					</div>
					<!-- /.col -->
					<div class="col-xs-4">
						<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div>
					<!-- /.col -->
				</div>
			<?php echo form_close() ?>

			<?php echo anchor('login_user/forgot', 'I forgot my password') ?>
			<br>
			<?php echo anchor('login_user/register_view', 'Register a new account', array('class' => 'text-center')) ?>

		</div>
		<!-- /.login-box-body -->
	</div>
	<!-- /.login-box -->

	<?php  require_once VINC.'footer.php';?>
</body>
</html>