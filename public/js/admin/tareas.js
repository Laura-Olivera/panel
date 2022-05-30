"use strict";

$(document).ready(function() {
    $('.tareas-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbTareas = $('#tareas-table').DataTable({
        processing: true,
        "ordering": false,
        "searching": false,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        /* dom: 'Bfrtip */
        /* ajax: {
            "url": "tareas/listar_tareas",
            "type": "GET",
        },
        columns: [
            { data: 'tarea', name: 'tarea' },
            { data: 'descripcion', name: 'descripcion' },
            { data: 'nombre', name: 'nombre' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="kt-badge kt-badge--'+ (row.estatus == 1 ? 'success' : 'danger') +' kt-badge--inline kt-badge--pill">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-elevate kt-font-brand" onClick="edit_usuario_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl far fa-edit"></i></a>';
                    return btn;
                }
            },

        ], */
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
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                        $("#tareas-table").load(" #tareas-table");
                    });
                } else {
                    $('#modal_nueva_tarea').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire({
                            icon: "warning",
                            title: "¡Alerta!",
                            text: respuesta.message,
                            timer: 1500
                        });
                        $("#tareas-table").load(" #tareas-table");
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

function update_tarea(id)
{
    let data = {
        id: $('#id').val(),
        tarea: $('#tarea').val(),
        descripcion: $('#descripcion').val(),
        modulo: $('#modulo').val(),
        estatus: $('#estatus').val(),
        empleados: $('#empleados').val()
    }
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "tareas/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_tarea').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $("#tareas-table").load(" #tareas-table");
                });
            } else {
                $('#modal_editar_tarea').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $("#tareas-table").load(" #tareas-table");
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