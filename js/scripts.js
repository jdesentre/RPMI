// JavaScript Document
//Obtenemos los elementos del DOM
var myForm = document.getElementById('myForm');
var btnSend = document.getElementById('btn_send');

var inputNombre = document.getElementById('input_nombre');
var inputCorreo = document.getElementById('input_correo');
var inputCheck = document.getElementById('checkBox');
var inputPais = document.getElementById('input_pais');

var inputRadio1 = document.getElementById('radio1');
var inputRadio2 = document.getElementById('radio2');
var inputRadio3 = document.getElementById('radio3');
var inputRadio4 = document.getElementById('radio4');
var inputRadio5 = document.getElementById('radio5');



//Listener para el botón de enviar
btnSend.addEventListener('click',validateForm);

function validateForm()
{
	//Ponemos la variable de errores en falso
	var error = false;
	
	//Comprobamos que el nombre no está vacío y que tiene más de 2 caracteres 
	//mediante Javascript, y sin efecto de aparición
	var nombreValue = inputNombre.value;
	var errorNombre = document.getElementById('error_nombre');
	if(nombreValue == "" || nombreValue.length < 3)
	{
		error = true;
		errorNombre.style.display = "block";
		
	}
	else
	{
		errorNombre.style.display = "none";
	}
	
	//Validamos el correo mediante función externa
	//Validación con JQuery, sin alerta y cambiando solo el CSS
	var correoValue = inputCorreo.value;
	if(validateEmail(correoValue) === false)
	{
		error = true;
		$("#grp_correo").addClass('has-error');
		$("#grp_correo").removeClass('has-success');
	}
	else
	{
		$("#grp_correo").removeClass('has-error');
		$("#grp_correo").addClass('has-success');
	}
	
	//Validamos la contraseña (tiene que tener entre 4 y 8 caracteres)
	//Validación mediante JQuery, lanzando el Tooltip y usando los CSS de Bootstrap
	$passwordValue = $("#input_password").val();
	if($passwordValue.length < 4 || $passwordValue.length > 8)
	{
		
		error = true;
		$("#input_password").tooltip('show');
		$("#grp_password").addClass('has-error');
		$("#grp_password").removeClass('has-success');
	}
	else
	{
		$("#input_password").tooltip('destroy');
		$("#grp_password").removeClass('has-error');
		$("#grp_password").addClass('has-success');
		
		//Si la contraseña es correcta, comprobamos que la contraseña repetida está correcta
		$passwordValue2 = $("#input_password2").val();
		if($passwordValue != $passwordValue2)
		{
			error = true;
			$("#input_password2").tooltip('show');
			$("#grp_password2").addClass('has-error');
			$("#grp_password2").removeClass('has-success');
		}
		else
		{
			$("#input_password2").tooltip('destroy')
			$("#grp_password2").removeClass('has-error');
			$("#grp_password2").addClass('has-success');
		}
	}
	
	
	
	//Validamos el radio button (cada ID de forma independiente)
	if(!inputRadio1.checked && !inputRadio2.checked && !inputRadio3.checked && !inputRadio4.checked && !inputRadio5.checked) 
	{
		error = true;
		$("#error_radio").slideDown('slow');
		
	}
	else
	{
		$("#error_radio").slideUp('fast');
	}
	
	//Validamos el pais
	if(inputPais.value == '') 
	{
		error = true;
		$("#error_pais").slideDown('slow');
		
	}
	else
	{
		$("#error_pais").slideUp('fast');
	}
	
	//Comprobamos si el checkbox está activado
	if(!inputCheck.checked)
	{
		error = true;
		$("#error_check").slideDown('slow');	
		$("#grpCheck").addClass('has-error');
	}
	else
	{
		
		$("#error_check").slideUp('fast');
	}
	
	//Si no hay errores, mandamos el formulario
	if(error === false) {
		myForm.submit();
		//console.log('enviado');
	}
}

//Función externa que valida el correo
//http://stackoverflow.com/questions/46155/validate-email-address-in-javascript
function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}