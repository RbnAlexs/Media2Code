$(document).ready(function(){
	$(".boton_envio").click(function() {
		
		var nombre = $(".nombre").val();
			email = $(".email").val();
			validacion_email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.([a-zA-Z]{2,4})$/;
		
		if (nombre == "") {
		    $(".nombre").focus();
		    return false;
		}else if(email == "" || !validacion_email.test(email)){
		    $(".email").focus();	
		    return false;

		}else{
			$('.ajaxgif');
			var datos = 'nombre='+ nombre + 
						'&email=' + email;
			$.ajax({
	    		type: "POST",
	    		url: "http://monitornacional.com/parser-acmedia/themes/monitor/proceso.php",
	    		data: datos,
	    		success: function() {
					
					$('.inbox').addClass('hide');
					$('.boton_envio').addClass('hide');
	      			$('.msg').text('¡Gracias por suscribirte a Monitor Nacional!').addClass('msg_ok').animate({ 'top' : '105px' }, 180);
					$('.ajaxgif').removeClass('hide');	
	    		},
				error: function() {
					$('.ajaxgif').hide();
	      			$('.msg').text('Ingresa tus datos nuevamente...').addClass('msg_error');					
				}
	   		});
	 		return false;	
		}
	});
});

