<?php
session_start();
include "../../lib/db_connection.php";

################### user authentication start ########################
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password =$_POST['password'];
	$sql = "SELECT * FROM `customer` WHERE `email`='$email'";
	$result = $conn->query($sql);

	if ($result->num_rows == 1) {
		$row = $result -> fetch_assoc();
		if (password_verify($password, $row['password'])) {			
			$_SESSION['user_email'] = $email;
			echo "<script>window.location.replace('../../index.php')</script>";
		} else {
			$message = "Invalid username or password";
			echo '<script>window.location.replace("customer_login.php?message='.$message.'")</script>';
		}
	}else{
		$message = "Invalid username or password";
		echo '<script>window.location.replace("customer_login.php?message='.$message.'")</script>';
	}
}

################### user authentication End ########################


################### Create New user start ########################
if (isset($_POST['register'])) {
	$username = $_POST['username'];
	$email    = $_POST['email'];
	$phone    = $_POST['phone'];
	$location = $_POST['location'];

	$rowcount = $conn->query("SELECT * FROM `customer` WHERE `phone`='$phone'")->num_rows;

	if ($rowcount == 0) {
		$hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

		$sql = "INSERT INTO `customer`(`name`, `email`,`phone`, `password`,`location`, `role`) VALUES ('$username','$email','$phone','$hashed_password','$location','customer')";

		if ($conn->query($sql) === TRUE) {
			echo "<script>window.location.replace('customer_login.php')</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		echo "This Email already used try another";
	}
}
################### Create New user end ########################
?>