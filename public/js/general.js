
$.extend($.validator, {
    messages: {
        required: 'El campo es obligatorio',
        equalTo: 'Las contraseñas deben ser iguales',
        maxlength: 'El campo no debe sobrepasar los 150 caracteres',
        minlength: 'El campo debe tener {0} caracteres como minimo',
		extension: 'Seleccione un archivo con un formato valido',
    }
});

function imprimirMensajesDeError(data) {	
	$(".is-invalid").removeClass("is-invalid");

	var errores = '';
	var mensaje;

	$.each(data, function (key, value) {
		$('#' + key + '').addClass('is-invalid');
		errores += '<li>' + value + '</li>';
	});

	mensaje = '<ul>' + errores + '</ul>'
    Swal.fire({
        icon: "warning",
        title: "¡Alerta!",
        html: mensaje,
    });
}