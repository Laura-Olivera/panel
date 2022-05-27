"use strict";

$(document).ready(function() {
    
});

function edit_empresa_modal(id)
{
    $.ajax({
        url: "empresa/edit/" + id,
        datatype: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                // multi select
                $('#empleados').select2({
                    placeholder: "Seleciona una o mas opciones",
                    allowClear: true,
                });
                $('.task-select2').select2({
                    placeholder: "Seleciona una opcion",
                    allowClear: true,
                });

            }).on('hidden.bs.modal', function () {
                $(this).remove();
            });
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

function update_empresa(id)
{
    let data = {
        id: $('#id').val(),
        nombre: $('#nombre').val(),
        email: $('#email').val(),
        telefono: $('#telefono').val(),
        direccion: $('#direccion').val(),
        logo: $('#logo').val(),
        color: $('#color').val(),
    }
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "empresa/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_empresa').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $("#info-content").load(" #info-content");
                });
            } else {
                $('#modal_editar_empresa').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $("#info-content").load(" #info-content");
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

function valida(form)
{
    var validador =form.validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 200,
            },
            email: {
                required: true,
                maxlength: 250,
            },
            telefono: {
                required: true,
                maxlength: 150,
            },
            direccion: {
                required: true,
            },
            logo: {
                required: true
            },
            color: {
                required: true
            }
        }
    });

    return validador.form();
}