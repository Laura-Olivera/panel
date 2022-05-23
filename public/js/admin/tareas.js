"use strict";

$(document).ready(function() {
    $('.tareas-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbTareas = $('#tareas-table').DataTable({
        processing: true,
        "ordering": true,
        "searching": true,
        responsive: true,
        /* dom: 'Bfrtip */
    });
});

function add_tarea_modal()
{
    $.ajax({
        url: "tareas/create",
        datatype: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                $('.selectKeyword').select2({
                    placeholder: 'Seleccione...',
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

function store_tarea()
{
    var form = $("#frm_nueva_tarea");
    var validarForm = valida(form);
    if(validarForm){
        let data ={
            tarea: $("#tarea").val(),
            descripcion: $("#descripcion").val(),
            modulo: $("#modulo").val(),
            empleados: $("#empleados").val(),
            estatus: $("#estatus").val()
        }
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "tareas/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nueva_tarea').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire("Exito!", respuesta.message, "success");
                    });
                } else {
                    $('#modal_nueva_tarea').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire('¡Alerta!', respuesta.message, 'warning');
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

function edit_tarea_modal(id)
{
    $.ajax({
        url: "tareas/edit/" + id,
        datatype: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                $('.selectKeyword').select2({
                    placeholder: 'Seleccione...',
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

function valida(form)
{
    var validador =form.validate({
        rules: {
            tarea: {
                required: true,
                maxlength: 200,
            },
            descripcion: {
                required: true,
                maxlength: 250,
            },
            modulo: {
                required: true,
                maxlength: 150,
            },
            empleados: {
                required: true,
            },
            estatus: {
                required: true
            }
        }
    });

    return validador.form();
}