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
        startDate: new Date('01-01-2014'),
		endDate: new Date(),	
		orientation: "bottom left",
		todayHighlight: true,
		autoclose: true,
		format: 'yyyy-mm-dd',
        language: 'en'
    });

    $('#fac_fecha').val(today);

    $("#adicional").on('click', function() {
        $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla");
    });

    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });
});

function store_producto(){
    var form = $('#frm_nuevo_producto');
    var validarForm = validar(form);
    if(validarForm){
        let data = {
            nombre: $('#nombre').val(),
            codigo: $('#codigo').val(),
            modelo: $('#modelo').val(),
            marca: $('#marca').val(),
            proveedor: $('#proveedor').val(),
            categoria: $('#categoria').val(),
            costo: $('#costo').val(),
            venta: $('#venta').val(),
            cantidad: $('#cantidad').val(),
            general: $('#general').val(),
            tecnica: texto.getData(),
            estatus: $('#estatus').is(':checked') ? true : false,
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
                        window.location = '/catalogos/productos';

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

function update_producto(){
    let data = {
        id: $('#id').val(),
        nombre: $('#nombre').val(),
        codigo: $('#codigo').val(),
        modelo: $('#modelo').val(),
        marca: $('#marca').val(),
        proveedor: $('#proveedor').val(),
        categoria: $('#categoria').val(),
        costo: $('#costo').val(),
        venta: $('#venta').val(),
        cantidad: $('#cantidad').val(),
        general: $('#general').val(),
        tecnica: texto.getData(),
        estatus: $('#estatus').is(':checked') ? true : false,
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "update",
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
                    window.location = '/catalogos/productos';

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
