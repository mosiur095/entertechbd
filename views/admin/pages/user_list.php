
<?php
include "../../../lib/db_connection.php";
$result = $conn->query("SELECT * FROM `user`");
?>
<div class="modal" id="user_add_modal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-body">
				<h2>Add User</h2>
				<form id="my-form">
					<div class="form-group">
						<label for="name">Product Name:</label>
						<input type="text" class="form-control" id="name" placeholder="Enter user Name" name="name" required>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<input type="email" class="form-control" id="email" placeholder="Enter Email address" name="email" required>
					</div>
					<div class="form-group">
						<label for="location">Role:</label>
						<select class="form-control" name="role" id="role">
							<option value="admin">Admin</option>
							<option value="user">User</option>
						</select>
					</div>
					<div class="form-group">
						<label for="password">Password:</label>
						<input type="password" class="form-control" id="password" placeholder="Enter user password" name="password" required>
					</div>					
					<button type="button" name="register" id="register" class="btn btn-primary">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

<div id="add_btn">
	<button data-toggle="modal" data-target="#user_add_modal"><i class="far fa-plus-square"></i></button>
</div>
<table class="table table-hover" id="user_lists">
	<thead>
		<tr>
			<th>Name</th>
			<th>Email</th>
			<th>Role</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($row = $result->fetch_assoc()){?>
			<tr>
				<td><?php echo $row['username'];?></td>
				<td><?php echo $row['email'];?></td>
				<td><?php echo $row['role'];?></td>
				<!-- <td class="text-warning"><i class="far fa-edit"></i></td> -->
				<td class="text-danger" onclick="delete_user('<?php echo $row['id'];?>')"><i class="fas fa-trash-alt"></i></td>
			</tr>
			<?php
		}
		?>
	</tbody>
</table>
<script type="text/javascript">
	$(document).ready( function () {
		$('#user_lists').DataTable();
	} );


	$("#register").on("click", function (e) {
		var name = $('#name').val();	
		var email = $('#email').val();	
		var password = $('#password').val();
		var role = $('#role').val();
		$.ajax({
			url : 'login_action.php',
			type: 'POST',
			data : {
				name:name,
				email:email,
				password:password,
				role:role,
				register:'register'
			},
			success: function(data){			
				setTimeout( function() { 
					$( "#user_add_modal" ).modal( "hide" );
					load_component('user_list'); 
				}, 500 );
			}
		});
	});

	function delete_user(id){
		$.ajax({
			url : 'login_action.php',
			type: 'POST',
			data : {
				id:id,
				delete_user:'delete_user'
			},
			success: function(data){			
				load_component('user_list');
			}
		});
	}
</script>