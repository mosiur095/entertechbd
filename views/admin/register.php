<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sign UP</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
	<div class="container">
		<div class="row" id="login_form">
			<form action="login_action.php" method="post">
				<div class="form-group">
					<label for="email">Name:</label>
					<input type="text" class="form-control" placeholder="Enter username" id="username" name="username">
				</div>

				<div class="form-group">
					<label for="email">Email address:</label>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="email">Phone Number:</label>
					<input type="email" class="form-control" placeholder="Enter email" id="email" name="email">
				</div>
				<div class="form-group">
					<label for="role">Role:</label>
					<select class="form-control" name="role" id="role">
						<option value="admin">Admin</option>
						<option value="user">User</option>
					</select>
				</div>
				<div class="form-group">
					<label for="pwd">Password:</label>
					<input type="password" class="form-control" placeholder="Enter password" id="pwd" name="password">
				</div>
				<button type="submit" name="register" class="btn btn-primary">Sign UP</button>
			</form> 
		</div>
	</div>	
</body>
</html>