<?php
session_start();
include "../../lib/db_connection.php";

if (isset($_POST['buy_product'])) {
	if (isset($_SESSION['user_email'])) {
		$login_user = $_SESSION['user_email'];
		$product_data = $conn->query("SELECT * FROM `product` WHERE `id`='".$_POST['product_id']."'")->fetch_assoc();
		$user_data = $conn->query("SELECT * FROM `customer` WHERE `email`='$login_user'")->fetch_assoc();

		if($user_data['location'] == $product_data['location']){
			$discount = round($product_data['unite_price']*(25/100));
		}else{
			$discount = 0;
		}
		$total_price = (1*$product_data['unite_price']) - $discount;
		$sql = "INSERT INTO `orders`(`product_id`, `unite_price`, `disscount`, `total_price`,`order_by`,`cus_contact`, `status`) VALUES ('".$_POST['product_id']."','".$product_data['unite_price']."','".$discount."','".$total_price."','$login_user','".$user_data['phone']."','submitted')";
		if($conn->query($sql)== true){
			$json = array('status' => 'success');
			echo json_encode($json);
		}else{
			$json = array('status' => 'failed');
			echo json_encode($json);
		}
	}else{
		$json = array('status' => 'failed');
		echo json_encode($json);
	}
}



if (isset($_POST['view_product'])) {
	$result = $conn->query("SELECT * FROM `product` WHERE `id`='".$_POST['product_id']."'");
	while($row = $result->fetch_assoc()){
		?>
		<div class="item">
			<div id="banner1">
				<img height="300" width="100%" src="img/<?php echo $row['product_img']?>">
			</div>
			<div id="detail">
				<p><?php echo $row['name']?></p>
			</div>
			<div id="btn">
				<div onclick="process_order('<?php echo $row['id']?>')">Process Order</div>
			</div>
		</div>
		<?php
	}
}
?>