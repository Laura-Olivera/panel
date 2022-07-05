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
        language: 'es'
    });

    $('#fac_fecha').val(today);

    $("#adicional").on('click', function() {
        var cve_prod = $("#cve_prod").val();
        var cant_prod = $("#cant_prod").val();
        var pre_prod = $("#pre_prod").val();
        var nota_prod = $("#nota_prod").val();
        let append = '<tr class="fila-fija">'+
                         '<td><input id="cve_prod" name="cve_prod[]" placeholder="Clave del producto"'+
                                 'class="form-control" type="text" value= "'+ cve_prod +'" disabled/></td>' +                                               
                         '<td><input id="pre_prod" name="pre_prod[]" placeholder="Precio total"' +
                             'class="form-control" type="text" value= "'+ cant_prod +'" disabled /></td>' +
                         '<td><input id="cant_prod" name="cant_prod[]" placeholder="Cantidad total"' +
                                 'class="form-control" type="text" value= "'+ pre_prod +'" disabled /></td>' +
                         '<td><input id="nota_prod" name="nota_prod[]" placeholder="Observaciones"' +
                             'class="form-control" type="text" value= "'+ nota_prod +'" disabled /></td>' +
                         '<td class="eliminar" id="delete-row"><button type="button" class="btn btn-danger">-</button></td>' +
                     '</tr>';

        $(append).appendTo("#tabla-agregar");
        /* $("#tabla-busqueda input").val(""); */
    });

    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });

    $("#registrar").on('click', function() {
        var form = $('#frm_nueva_entrada');
        var validarForm = validar(form);
        if(validarForm){
            $.ajax({
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },                
				contentType: false,
				processData: false,          
                url: "store",
                type: 'POST',
                data: new FormData($('#frm_nueva_entrada')[0]),
                dataType: 'json',
                success: function (respuesta) {
                    if (respuesta.success == true) {
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        }).then((result) => {
                            //window.location = '/inventario/entradas/ver_entrada';

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
    });
});

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
