
<?php
include "../../../lib/db_connection.php";
$result = $conn->query("SELECT * FROM `orders`");
$product = $conn->query("SELECT id,name FROM `product`");
?>
<script type="text/javascript" src="../../js/order.js"></script>
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h2>Add Order</h2>
				<form action="/action_page.php" class="was-validated">
					<div class="form-group">
						<label for="product_name">Product Name:</label>
						<input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name" required>
					</div>
					<div class="form-group">
						<label for="unite_price">Unite Price:</label>
						<input type="number" class="form-control" id="unite_price" placeholder="Enter Unite Price" name="unite_price" required>
					</div>

					<div class="form-group">
						<label for="location">Location:</label>
						<select class="form-control" name="location" id="location">
							<option value="Rangpur">Rangpur</option>
							<option value="Barisal">Barisal</option>
							<option value="Chittagong">Chittagong</option>
							<option value="Dhaka">Dhaka</option>
							<option value="Khulna">Khulna</option>
							<option value="Mymensingh">Mymensingh</option>
							<option value="Rajshahi">Rajshahi</option>
							<option value="Sylhet">Sylhet</option>
						</select>
					</div>
					<button type="submit" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="col-md-12">
	<form class="form-inline">
		<label for="email">Product:</label>
		<select class="form-control" name="product_id" id="product_id">
			<?php
			while ($info = $product->fetch_assoc()) {
				?>
				<option value="<?php echo $info['id'];?>"><?php echo $info['name'];?></option>
				<?php
			}
			?>
		</select>
		<button style="width: 75px;" type="button" class="btn btn-primary" onclick="search();">Search</button>
	</form>	
</div>

<!-- <div id="add_btn">
	<button data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i></button>
</div> -->
<div id="order_display">
	<table class="table table-hover" id="product_lists">
		<thead>
			<tr>
				<th>Order ID </th>
				<th>Product</th>
				<th>Unite Price</th>
				<th>Discount</th>
				<th>Total Price</th>
				<th>Customer Contact</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
			<?php
			while($row = $result->fetch_assoc()){?>
				<tr>
					<td><?php echo $row['order_id'];?></td>
					<td>
						<?php
						$product_info = $conn->query("SELECT `name` FROM `product` WHERE `id` ='".$row['product_id']."'");
						$data = $product_info->fetch_assoc();
						echo $data['name'];
						?>					
					</td>
					<td><?php echo $row['unite_price'];?></td>
					<td><?php echo $row['disscount'];?></td>
					<td><?php echo $row['total_price'];?></td>
					<td><?php echo $row['cus_contact'];?></td>
					<td>
						<select class="form-control" name="status" id="status<?php echo $row['order_id'];?>" onchange="update_status('<?php echo $row['order_id']?>')">
							<option <?php if($row['status'] == 'submitted'){ echo 'selected';}?> value="submitted">Submitted</option>
							<option <?php if($row['status'] == 'transit'){ echo 'selected';}?> value="transit">Transit</option>
							<option <?php if($row['status'] == 'delivered'){ echo 'selected';}?> value="delivered">Delivered</option>
						</select>
					</td>
				</tr>
				<?php
			}
			?>
		</tbody>
	</table>
</div>
<script type="text/javascript">
	$(document).ready( function () {
		$('#product_lists').DataTable();
	} );
	
</script>