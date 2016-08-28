$(document).ready(function() {
	$('#dataTables-example').DataTable({
	        responsive: true
	});
});

$("div.alert").delay(3000).slideUp();

$(document).ready(function(){
	$("#add_image").click(function(){
		$("#insert").append('<div class="form-group"><input type="file" name="fEditDetail[]"></div>');
	});
});

$(document).ready(function(){
	$("a#del_img_demo").on('click', function(){
		var url = "http://localhost:8000/product/delImg/";
		var _token = $("form[name='fEditProduct']").find("input[name='_token']").val();
		var idImg = $(this).parent().find("img").attr("idImage");
		var img = $(this).parent().find("img").attr("src");
		var rid = $(this).parent().find("img").attr("id");
		$.ajax({
			url: url + idImg,
			type: 'GET',
			cache: false,
			data: {"_token":_token, "idImage":idImg, "src":img},
			success: function(data){
				if(data == "Oke")
					$("#" + rid).remove();
				else
					alert("Error! please contact admin")
			}
		})
	});
});