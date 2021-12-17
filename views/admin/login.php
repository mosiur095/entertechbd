<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="../../css/style.css">
	<link rel="stylesheet" type="text/css" href="../../css/admin_style.css">
</head>
<body>
	<div class="container">
		<div class="row" id="login_form">
			<div class="form-group">
				<?php
				if (isset($_GET['message'])) {
					echo "<p class='error'>".$_GET['message']."<p>";
				}
				?>
			</div>
			<form action="login_action.php" method="post">
				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
				</div>
				<button type="submit" name="login" class="btn btn-primary">Login</button>
			</form> 
		</div>
	</div>	
</body>
</html>