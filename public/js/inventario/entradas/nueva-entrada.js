"use strict";
let today = new Date().toLocaleDateString('en-CA');

$(document).ready(function (){

    $('#proveedor').select2({
        placeholder: "seleccione una opcion...",
        allowClear: true
    });

    $('#fac_forma_pago').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true
    });

    $('#fac_metodo_pago').select2({
        placeholder: "Seleccione una opcion",
        allowClear: true
    });

    $('#fac_fecha_emision').datepicker({
        startDate: new Date('01-01-2000'),
		endDate: new Date(),	
		orientation: "bottom left",
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy-mm-dd',
        language: 'es'
    });

    $('#fac_fecha_operacion').datepicker({
        startDate: new Date('01-01-2000'),
		endDate: new Date(),	
		orientation: "bottom left",
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy-mm-dd',
        language: 'es'
    });

    $('#fac_fecha_emision').val(today);
    $('#fac_fecha_operacion').val(today);

    $("#proveedor").on('change', function(){
        id = this.value;
        buscar_proveedor(id);
    });

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

function buscar_proveedor(id)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, 
        type: 'GET',
        url: "buscar_proveedor/" + id,
        datatype: 'json',
        success: function(response){
            if (response.success) {
                $("#prov_rfc").val(response.rfc);
                $("#prov_direccion").val(response.direccion);
                $("#fac_fecha_emision").focus();
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "¡Alerta!",
                    text: 'El proveedor no existe.'
                });
            }
        },
        error: function (xhr) {
            Swal.fire('¡Alerta!', 'Error de conectividad de red', 'warning');
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
            fac_fecha_emision: {
                required: true,
            },
            fac_fecha_operacion: {
                required: true,
            },
            fac_subtotal: {
                required: true,
            },
            fac_impuesto: {
                required:true,
            },
            fac_total: {
                required: true,
            },
            fac_forma_pago: {
                required: true,
            },
            fac_metodo_pago: {
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
            entrada_notas: {
                required: true,
            },
        },
        message: {
            proveedor: "Este campo es requerido",
            factura: "Este campo es requerido",
            fac_fecha_emision: "Este campo es requerido",
            fac_fecha_operacion: "Este campo es requerido",
            fac_subtotal: "Este campo es requerido",
            fac_impuesto: "Este campo es requerido",
            fac_total: "Este campo es requerido",
            fac_forma_pago: "Este campo es requerido",
            fac_metodo_pago: "Este campo es requerido",
            fac_path: {
                required: "Este campo es requerido",
                extension: "Solo puede ingresar documento en formato PDF"
            },
            fac_notas: "Este campo es requerido",
            entrada_notas: "Este campo es requerido",
        }
    });

    return validator.form();
}
