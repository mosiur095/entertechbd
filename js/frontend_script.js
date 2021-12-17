function process_order(product_id){
	$.ajax({
		url: "views/pages/frontend_action.php",
		type: "POST",
		data: {
			product_id: product_id,
			buy_product:'buy_product'		
		},
		cache: false,
		success: function(response){

			console.log(response);
			
			var json = JSON.parse(response)
			if(json.status == 'failed'){
				var message = "Please login to continue";
				window.location.replace("views/pages/customer_login.php?message='"+message+"'");
			}

			if (json.status == 'success') {
				var message = "Order Completed ..";
				window.location.replace("index.php?message='"+message+"'");
			}
		}
	})
}

function view_product(product_id){
	$.ajax({
		url: "views/pages/frontend_action.php",
		type: "POST",
		data: {
			product_id: product_id,
			view_product:'view_product'		
		},
		cache: false,
		success: function(response){		
			$('.modal-body').html(response);
			$('#buyModal').show();
		}
	})
}
function close_modal(modal_id){
	document.getElementById(modal_id).style.display = "none";
}