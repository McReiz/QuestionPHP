
$(document).ready(function(){
		
		$('#login').submit(function(event){
			event.preventDefault();
			var url = $(this).attr('action');
			var dataVa = $(this).serialize();
			$.ajax({
				url: url,
				type: 'POST',
				data: dataVa,
				success: function (mensaje) {
					$(".resultado").html(mensaje);
					var span = $('#notificacion').attr('class');
					
					if(span == "success"){
						setTimeout(function(){
							window.location = "index.php";
						},1500);
					}
					
				}
			});
			return false;
		});
});