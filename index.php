<?php
session_start();
include "lib/db_connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin panel</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> 
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/admin_style.css">
	<script type="text/javascript" src="js/frontend_script.js"></script>
</head>
<body>
	<?php
	include "views/layouts/modal.php";
	?>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<nav class="navbar navbar-inverse">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand" href="#">WebSiteName</a>
						</div>
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
						</ul>
						<ul class="nav navbar-nav navbar-right">
							<li><a href="views/pages/register.php" target="blank"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
							<?php
							if (isset($_SESSION['user_email'])) {
								?>
								<li><a href="views/pages/logout.php" target="blank"><span class="glyphicon glyphicon-log-in"></span> logout ( <?php echo $_SESSION['user_email'];?>)</a></li>
								<?php
							}else{?>
								<li><a href="views/pages/customer_login.php" target="blank"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
								<?php
							}
							?>							
						</ul>
					</div>
				</nav> 
			</div>
		</div>
		<div class="col-md-12">
			<div id="main_container">
				<?php
				$result = $conn->query("SELECT * FROM `product`");
				while($row = $result->fetch_assoc()){
					?>
					<div class="item">
						<div id="banner">
							<img src="img/<?php echo $row['product_img']?>">
						</div>
						<div id="detail">
							<p><?php echo $row['name']?></p>
						</div>
						<div id="btn">
							<div onclick="view_product('<?php echo $row['id']?>')">Buy</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
	</div>
</body>
</html>