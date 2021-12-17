
<?php
include "../../../lib/db_connection.php";
$total_product = $conn->query("SELECT * FROM `product`")->num_rows;
$total_order = $conn->query("SELECT * FROM `orders`")->num_rows;
?>
<div id="dashboard">
	<div class="dash_item">
		<div class="col-md-6">
			<img src="../../img/index.png">
		</div>
		<div class="col-md-6">
			<p id="counter"><?php echo $total_product;?></p>
			<p>Total Product</p>
		</div>
	</div>

	<div class="dash_item">
		<div class="col-md-6">
			<img src="../../img/order.jpg">
		</div>
		<div class="col-md-6">
			<p id="counter"><?php echo $total_order;?></p>
			<p>Total Order</p>
		</div>
	</div>
</div>