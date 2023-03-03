<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$username = $_POST["username"];
	$password = $_POST["password"];

	$mongo = new MongoDB\Client("mongodb://localhost:27017");
	$database = $mongo->mydatabase;
	$collection = $database->users;

	$user = $collection->findOne(["username" => $username, "password" => $password]);

	if ($user) {
		$_SESSION["username"] = $username;
		header("Location: index.php");
		exit();
	} else {
		$error = "Invalid username or password";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- Custom CSS -->
	<link rel="stylesheet" href="css/login-style.css">
</head>
<body>
	<div class="container">
		<h1>Login</h1>
		<?php if (isset($error)) { ?>
		<div class="alert alert-danger" role="alert">
			<?php echo $error; ?>
		</div>
		<?php } ?>
		<form method="post">
			<div class="form-group">
				<label for="username">User Name:</label>
				<input type="text" class="form-control" id="username" name="username" placeholder="Enter user name" required>
			</div>
			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" class="form-control" id="password" name="password" placeholder="Enter password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>
		</form>
		<p>Don't have an account? <a href="register.php">Register here</a></p>
	</div>

	<!-- Bootstrap JS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<!-- Custom JS -->
	<script src="js/login-script.js"></script>
</body>
</html>