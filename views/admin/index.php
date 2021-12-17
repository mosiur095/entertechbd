<?php
session_start();
include "../../lib/db_connection.php";
$result = $conn->query("SELECT * FROM `product`");
if (isset($_SESSION['admin_email'])) {?>
	<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Admin panel</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" type="text/css" href="../../css/admin_style.css">
		<script src="https://kit.fontawesome.com/418e01176d.js" crossorigin="anonymous"></script>
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.css">
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.js"></script>	
	</head>
	<body id="body">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-2" id="left_side_bar">
						<ul>
							<li onclick="load_component('dashboard')"> Dasdboard <span><i class="fas fa-chevron-right"></i></span></li>
							<li onclick="load_component('product_list')"> Product List <span><i class="fas fa-chevron-right"></i></span></li>
							<li onclick="load_component('order_list')"> Order list <span><i class="fas fa-chevron-right"></i></span></li>
							<li onclick="load_component('user_list')"> User list<span><i class="fas fa-chevron-right"></i></span></li>
						</ul>
					</div>
					<div class="col-md-10">
						<div class="col-md-12" id="top_menu">
							<ul>
								<li id="user_profile">
									<img src="../../img/img_avatar.png">								
								</li>
								<li><i class="far fa-bell"></i></li>
								<li><i class="fas fa-sms"></i></li>
								<li><input type="text" name="search"></li>
							</ul>

							<div id="profile">
								<p>Admin</p>
								<a href="logout.php"><p>Logout</p></a>
							</div>

						</div>
						<div class="col-md-12" id="dispaly">
						</div>	
						<div class="col-md-12" id="footer"><p>© 2005-2021 Mosiur Today All Rights Reserved</p></div>				
					</div>
				</div>			
			</div>
		</div>
		<script type="text/javascript">

			$(document).ready( function () {
				load_component('product_list');
			});



			$("#user_profile").mouseenter(function() {
				document.getElementById('profile').style.visibility = 'visible';
			});
			$("#profile").mouseleave(function() {
				document.getElementById('profile').style.visibility = 'hidden';
			});

			function load_component(component_id){
				$.ajax({
					url: "pages/"+component_id+".php",
					type: "GET",
					data: {
						component_id: component_id			
					},
					cache: false,
					success: function(response){
						$("#dispaly").empty();
						$('#dispaly').html(response);
					}
				});
			}		
		</script>	
	</body>
	</html>
	<?php
}else{
	$message = "Please login First";
	echo '<script>window.location.replace("login.php?message='.$message.'")</script>';
}

?>