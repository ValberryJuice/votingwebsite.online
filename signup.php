<?php  include_once('config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Signup</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<?php  require_once('includes/css.php'); ?>
</head>
<body class="login">
	<div class="wrapper wrapper-login">
		<div class="container container-login animated fadeIn">
			<h3 class="text-center">Sign Up To User</h3>
			<?php  require_once('includes/alerts.php'); ?>
			<div class="login-form">
				<form action="<?php echo PROJECT_USER_URL; ?>user_register.php" method="POST">
					<div class="form-group form-floating-label">
						<input id="username" name="username" type="text" class="form-control input-border-bottom" required>
						<label for="username" class="placeholder">Username</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="name" name="name" type="text" class="form-control input-border-bottom" required>
						<label for="name" class="placeholder">Name</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="email" name="email" type="email" class="form-control input-border-bottom" required>
						<label for="email" class="placeholder">Email</label>
					</div>
					<div class="form-group form-floating-label">
						<input id="phone" name="phone" type="text" class="form-control input-border-bottom" required>
						<label for="phone" class="placeholder">Phone</label>
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
						<span class="msg">Already have an account?</span>
						<a href="<?php echo PROJECT_USER_URL; ?>login.php" id="show-signup" class="link">Sign In</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
<?php require_once('includes/scripts.php'); ?>
</html>