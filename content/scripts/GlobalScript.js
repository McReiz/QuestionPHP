
$(document).ready(function(){
		
		$('#form').submit(function(event){
			event.preventDefault();
			var url = $(this).attr('action');
			var dataVa = $(this).serialize();
			$.ajax({
				url: url,
				type: 'POST',
				data: dataVa,
				success: function (mensaje) {
					$(".resultado").html(mensaje);
					var vericidad = $('#notificacion').attr('class');
					
					if(vericidad == "success"){
						setTimeout(function(){
							window.location = "index.php";
						},1500);
					}
					
				}
			});
			return false;
		});
});