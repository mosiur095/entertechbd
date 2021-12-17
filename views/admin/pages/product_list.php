<?php
include "../../../lib/db_connection.php";
$result = $conn->query("SELECT * FROM `product`");
?>
<script type="text/javascript" src="../../js/product.js"></script>
<div class="modal" id="myModal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
				<h2>Add Product</h2>
				<form action="pages/action.php" method="POST" enctype="multipart/form-data">
					<div class="form-group">
						<label for="product_name">Product Name:</label>
						<input type="text" class="form-control" id="product_name" placeholder="Enter Product Name" name="product_name" required>
					</div>

					<div class="form-group">
						<label for="product_img">Product Image:</label>
						<input type="file" class="form-control" id="product_img"  name="product_img" required>
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
					<button type="submit" name="add_product" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="modal" id="update_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" onclick="close_modal('update_modal')">&times;</button>
			</div>
			<div class="modal-body">
				<h2>Update Product</h2>
				<form method="POST" enctype="multipart/form-data" id="update_form">
					<div id="form_item"></div>
					<button type="submit" id="update_product" class="btn btn-primary">Update</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="add_btn">
	<button data-toggle="modal" data-target="#myModal"><i class="far fa-plus-square"></i></button>
</div>
<table class="table table-hover" id="product_lists">
	<thead>
		<tr>
			<th>Product Name</th>
			<th>Unite Pice</th>
			<th>Location</th>
			<th>Product Image</th>
			<th></th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row = $result->fetch_assoc()){
			?>
			<tr>
				
				<td><?php echo $row['name'];?></td>
				<td><?php echo $row['unite_price'];?></td>
				<td><?php echo $row['location'];?></td>
				<td>
					<?php 
					if($row['product_img'] != null){?>
						<img height="30" width="40" src="../../img/<?php echo $row['product_img'];?>">
						<?php
					}
					?>					
				</td>
				<td class="text-warning" onclick="edit_product('<?php echo $row['id'];?>')" ><i class="far fa-edit"></i></td>
				<td class="text-danger" onclick="delete_product('<?php echo $row['id'];?>')"><i class="fas fa-trash-alt"></i></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready( function () {
		$('#product_lists').DataTable();
	});
</script>