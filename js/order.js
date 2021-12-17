function update_status(order_id){	
	var status = $('#status'+order_id).val();
	$.ajax({
		url: "pages/action.php",
		type: "POST",
		data: {
			order_id: order_id,
			status:status,
			update_status:'update_status'		
		},
		cache: false,
		success: function(response){			
			load_component('order_list');
		}
	});
};

function search(){
	var product_id = $('#product_id').val();
	$.ajax({
		url: "pages/action.php",
		type: "POST",
		data: {
			product_id: product_id,
			search_order:'search_order'		
		},
		cache: false,
		success: function(response){
			$('#order_display').html(response);
		}
	});
}