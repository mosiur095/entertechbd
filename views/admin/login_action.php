<?php
session_start();
include "../../lib/db_connection.php";

################### user authentication start ########################
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password =$_POST['password'];
	$sql = "SELECT * FROM `user` WHERE `email`='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		$row = $result -> fetch_assoc();
		if (password_verify($password, $row['password'])) {
			if ($row['role'] == 'admin') {
				$_SESSION['admin_email'] = $email;
			}else{
				$_SESSION['user_email'] = $email;
			}
			
			echo 'Password is valid!';
			echo "<script>window.location.replace('index.php')</script>";
		} else {
			echo 'Invalid password.';
			$message = "Invalid username or password";
			echo '<script>window.location.replace("login.php?message='.$message.'")</script>';
		}
	}else{
		$message = "Invalid username or password";
		echo '<script>window.location.replace("login.php?message='.$message.'")</script>';
	}
}

################### user authentication End ########################


################### Create New user start ########################
if (isset($_POST['register'])) {
	$username = $_POST['name'];
	$email    = $_POST['email'];
	$role = $_POST['role'];
	if (!empty($username) && !empty($email) && !empty($_POST['password'])) {		
		$rowcount = $conn->query("SELECT * FROM `user` WHERE `email`='$email'")->num_rows;
		if ($rowcount == 0) {
			$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			$sql = "INSERT INTO `user`(`username`, `email`, `password`, `role`) VALUES ('$username','$email','$hashed_password','$role')";

			if ($conn->query($sql) === TRUE) {
				echo "user created successfully";
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
		}else{
			echo "This Email already used try another";
		}
	}
}


if (isset($_POST['delete_user'])) {
	$conn->query("DELETE  FROM `user` WHERE `id`='".$_POST['id']."'");
}
################### Create New user end ########################
?>