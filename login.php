<?php
session_start();

// Check if user is already logged in
if (isset($_SESSION['loggedIn'])) {
	header('Location: index.php');
	exit();
}

require_once('inc/config/constants.php');
require_once('inc/config/db.php');
require_once('inc/header.html');
?>

<body>

	<?php
	// Variable to store the action (login, passwordReset)
	$action = '';
	if (isset($_GET['action'])) {
		$action = $_GET['action'];
		if ($action == 'resetPassword') {
	?>
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-sm-12 col-md-5 col-lg-5">
						<div class="card">
							<div class="card-header">
								<h2 class="text-info d-flex justify-content-center align-content-center">Reset Password</h2>
							</div>
							<div class="card-body">
								<form action="">
									<div id="resetPasswordMessage"></div>
									<div class="form-group">
										<label for="resetPasswordUsername">Username</label>
										<input type="text" class="form-control" id="resetPasswordUsername" name="resetPasswordUsername">
									</div>
									<div class="form-group">
										<label for="resetPasswordPassword1">New Password</label>
										<input type="password" class="form-control" id="resetPasswordPassword1" name="resetPasswordPassword1">
									</div>
									<div class="form-group">
										<label for="resetPasswordPassword2">Confirm New Password</label>
										<input type="password" class="form-control" id="resetPasswordPassword2" name="resetPasswordPassword2">
									</div>
									<a href="login.php" class="btn btn-primary">Login</a>
									<button type="button" id="resetPasswordButton" class="btn btn-danger">Reset Password</button>
									<button type="reset" class="btn btn-dark">Clear</button>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

	<?php
			require 'inc/footer.php';
			echo '</body></html>';
			exit();
		}
	}
	?>
	<!-- Default Page Content (login form) -->
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-sm-12 col-md-5 col-lg-5">
				<div class="card">
					<div class="card-header">
						<h1 class="text-info d-flex justify-content-center align-content-center">Login Panel</h1>
					</div>
					<div class="card-body">
						<form action="">
							<div id="loginMessage"></div>
							<div class="form-group">
								<label for="loginUsername">Username</label>
								<input type="text" class="form-control" id="loginUsername" name="loginUsername">
							</div>
							<div class="form-group">
								<label for="loginPassword">Password</label>
								<input type="password" class="form-control" id="loginPassword" name="loginPassword">
							</div>
							<button type="button" id="login" class="btn btn-primary">Login</button>
							<a href="login.php?action=resetPassword" class="btn btn-danger">Reset Password</a>
							<button type="reset" class="btn btn-dark">Clear</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php
	require 'inc/footer.php';
	?>
</body>

</html>