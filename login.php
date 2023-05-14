<?php  include_once('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Login</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<?php  require_once('includes/css.php'); ?>
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign in to continue</h3>
			<?php  require_once('includes/alerts.php'); ?>
			<div class="login-form">
				<form action="<?php echo PROJECT_USER_URL; ?>check_credentials.php" method="POST">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="password" name="password" type="password" class="form-control input-border-bottom" required>
						<label for="password" class="placeholder">Password</label>
						<div class="show-password">
							<i class="flaticon-interface"></i>
						</div>
					</div>
					<div class="form-action mb-3">
						<button type="submit" class="btn btn-primary btn-rounded btn-login">Sign In</button>
					</div>
					<div class="login-account">
						<span class="msg">Don't have an account yet?</span>
						<a href="<?php echo PROJECT_USER_URL; ?>signup.php" id="show-signup" class="link">Sign Up</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<?php require_once('includes/scripts.php'); ?>
</html>