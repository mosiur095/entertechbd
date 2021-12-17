function edit_product (product_id){
	$.ajax({
		url: "pages/action.php",
		type: "POST",
		data: {
			product_id: product_id,
			edit_product:'edit_product'		
		},
		cache: false,
		success: function(response){			
			$('#form_item').html(response);
			$('#update_modal').show();
		}
	});
}

$("#update_product").on("click", function(){
	var formData = new FormData(document.getElementById('update_form'));
	formData.append('update_product', 'update_product');	
	$.ajax({
		url : 'pages/action.php',
		type: 'POST',
		data : formData,
		contentType: false,
		processData: false,
		success: function(data){
			$("#update_form").trigger("reset");
			$("#dispaly").empty();			
			load_component('product_list');
		}
	});
});


function delete_product (id){
	$.ajax({
		type: "POST",
		url: "pages/action.php",
		data: {
			product_id: id,
			delete_product :'delete_product'		
		},
		success: function(data) {
			// console.log(data);
			load_component('product_list');
		}
	});
}


function close_modal(modal_id){
	document.getElementById(modal_id).style.display = "none";
}