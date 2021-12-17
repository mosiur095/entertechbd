<?php
include "../../../lib/db_connection.php";
if (isset($_POST['add_product'])) {
	$product_name = $_POST['product_name'];
	$product_img  = $_FILES['product_img'];
	$filename     = $_FILES["product_img"]["name"];
	$tempname     = $_FILES["product_img"]["tmp_name"];
	$extension    = pathinfo($filename, PATHINFO_EXTENSION);
	$newfilename  = time() .".".$extension;
	$folder       = "../../../img/".$newfilename;
	$unite_price  = $_POST['unite_price'];
	$location     = $_POST['location'];

	$rowcount = $conn->query("SELECT * FROM `product` WHERE `name`='$product_name'")->num_rows;

	if ($rowcount == 0) {
		$sql = "INSERT INTO `product`(`name`, `product_img`, `unite_price`, `location`) VALUES ('$product_name','$newfilename','$unite_price','$location')";

		if ($conn->query($sql) === TRUE) {
			move_uploaded_file($tempname, $folder);
			echo "<script>window.location.replace('../index.php')</script>";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
	}else{
		$message = "Prodcut Name Already Added";
		echo '<script>window.location.replace("../index.php?message='.$message.'")</script>';
	}
}

if (isset($_POST['edit_product'])) {
	$data = $conn->query("SELECT * FROM `product` WHERE `id`='".$_POST['product_id']."'")->fetch_assoc();
	?>
	<input type="hidden" name="id" value="<?php echo $data['id'];?>">
	<input type="hidden" name="img" value="<?php echo $data['product_img'];?>">
	<div class="form-group">
		<label for="product_name">Product Name:</label>
		<input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name" value="<?php echo $data['name']?>" required>
	</div>

	<div class="form-group">
		<label for="product_img">Product Image:</label>
		<input type="file" class="form-control" id="product_img"  name="product_img">
		<img  height="30" width="60" top="5" src="../../img/<?php echo $data['product_img']?>">
	</div>

	<div class="form-group">
		<label for="unite_price">Unite Price:</label>
		<input type="number" class="form-control" id="unite_price" placeholder="Enter Unite Price" name="unite_price"  value="<?php echo $data['unite_price']?>" required>			
	</div>

	<div class="form-group">
		<label for="location">Location:</label>
		<select class="form-control" name="location" id="location">
			<option <?php if($data['location'] == 'Rangpur' ){ echo 'selected';}?> value="Rangpur">Rangpur</option>
			<option <?php if($data['location'] == 'Barisal' ){ echo 'selected';}?> value="Barisal">Barisal</option>
			<option <?php if($data['location'] == 'Chittagong' ){ echo 'selected';}?> value="Chittagong">Chittagong</option>
			<option <?php if($data['location'] == 'Dhaka' ){ echo 'selected';}?> value="Dhaka">Dhaka</option>
			<option <?php if($data['location'] == 'Khulna' ){ echo 'selected';}?> value="Khulna">Khulna</option>
			<option <?php if($data['location'] == 'Mymensingh' ){ echo 'selected';}?> value="Mymensingh">Mymensingh</option>
			<option <?php if($data['location'] == 'Rajshahi' ){ echo 'selected';}?> value="Rajshahi">Rajshahi</option>
			<option <?php if($data['location'] == 'Sylhet' ){ echo 'selected';}?> value="Sylhet">Sylhet</option>
		</select>
	</div>
	<?php
}


if (isset($_POST['update_product'])) {

	$product_name = $_POST['product_name'];
	$product_img  = $_FILES['product_img'];
	$unite_price  = $_POST['unite_price'];
	$location     = $_POST['location'];

	if ($product_img['size'] != 0) {
		if (file_exists("../../../img/".$_POST['img'])) {
			unlink("../../../img/".$_POST['img']);
		}

		$filename     = $_FILES["product_img"]["name"];
		$tempname     = $_FILES["product_img"]["tmp_name"];
		$extension    = pathinfo($filename, PATHINFO_EXTENSION);
		$newfilename  = time() .".".$extension;
		$folder       = "../../../img/".$newfilename;

		$conn->query("UPDATE `product` SET `name`='$product_name',`product_img`='$newfilename',`unite_price`='$unite_price',`location`='$location' WHERE `id`='".$_POST['id']."'");
		move_uploaded_file($tempname, $folder);
	}else{
		$conn->query("UPDATE `product` SET `name`='$product_name',`unite_price`='$unite_price',`location`='$location' WHERE `id`='".$_POST['id']."'");
	}
}

if (isset($_POST['delete_product'])) {	
	$data = $conn->query("SELECT * FROM `product` WHERE `id`='".$_POST['product_id']."'")->fetch_assoc();
	$conn->query("DELETE FROM `product` WHERE `id`='".$_POST['product_id']."'");
	if (file_exists("../../../img/".$data['product_img'])) {
		unlink("../../../img/".$data['product_img']);
		echo 'File ' . $data['product_img'] . ' has been deleted';
	}
}


if (isset($_POST['update_status'])) {
	$sql = "UPDATE `orders` SET `status`='".$_POST['status']."' WHERE `order_id`='".$_POST['order_id']."'";
	$conn->query($sql);
}


if (isset($_POST['search_order'])) {
	$result = $conn->query("SELECT * FROM `orders` WHERE `product_id` = '".$_POST['product_id']."'");
	?>
	<table class="table table-hover" id="order_lists">
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
						<select class="form-control" name="status" id="status" onchange="update_status('<?php echo $row['order_id']?>')">
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
	<script type="text/javascript">
		$(document).ready( function () {
			$('#order_lists').DataTable();
		} );

	</script>
	<?php
}
?>