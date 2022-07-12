"use strict";
let today = new Date().toLocaleDateString('en-CA');

$(document).ready(function (){

    $('#proveedor').select2({
        placeholder: "seleccione una opcion...",
        allowClear: true
    });

    $('#estatus').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true
    });

    $('#fac_fecha').datepicker({
        startDate: new Date('01-01-2000'),
		endDate: new Date(),	
		orientation: "bottom left",
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy-mm-dd',
        language: 'es'
    });

    $('#fac_fecha').val(today);

});

function store_entrada()
{
    var form = $('#frm_nueva_entrada');
    var validarForm = validar(form);
    if(validarForm){
        let data = new FormData($('#frm_nueva_entrada')[0]);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },                
			contentType: false,
			processData: false,          
            url: "store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    }).then((result) => {
                        window.location = '/inventario/entradas/ver_entrada/' + respuesta.entrada;
                    });
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: respuesta.message,
                        timer: 1500
                    }).then((result) => {
                        console.log(result);
                    });
                }
            },
            error: function (xhr) { //xhr
                if (xhr.responseJSON) {
                    if (xhr.responseJSON.errors) {
                        imprimirMensajesDeError(xhr.responseJSON.errors);
                    }
                } else {
                    Swal.fire('¡Alerta!', 'Error de conectividad de red.', 'warning');
                }
            },
            beforeSend: function () {
                KTApp.blockPage({
                    overlayColor: '#000000',
                    type: 'v2',
                    state: 'success',
                    zIndex: 3000
                });
            },
            complete: function () {
                KTApp.unblockPage();
            },
        });
    }else{
        return false;
    }
}

function validar(form){
    var validator = form.validate({
        rules: {
            proveedor: {
                required: true,
            },
            factura: {
                required: true,
            },
            fac_fecha: {
                required: true,
            },
            fac_total: {
                required: true,
            },
            estatus: {
                required: true,
            },
            fac_path: {
                required: true,
                extension: "pdf",
                //maxsize: $max_upload_facturas_size,
            },
            fac_notas: {
                required: true,
            },
            notas: {
                required: true,
            },
        },
    });

    return validator.form();
}
