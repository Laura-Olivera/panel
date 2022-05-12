"use strict";
$(document).ready(function() {
    $('.permisos-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbPermisos = $('#permisos-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        responsive: true,
        ajax: {
            "url": "permisos/lista_permisos",
            "type": "GET",
        },
        columns: [
            { data: 'name', name: 'name' },
            { data: 'descrip', name: 'descrip' },
            {
                "mRender": function (data, type, row) {
                    let id_permiso = row.id;
                    let btn = '<a class="btn btn-elevate kt-font-brand" onClick="edit_permiso_modal(' + id_permiso + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl far fa-edit"></i></a>';
                    return btn;
                }
            },

        ],
    });
});

function add_permiso_modal()
{
    $.ajax({
        url: "permisos/create",
        datatype: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {

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

function store_permiso(){
    var form = $("#frm_nuevo_permiso");
    var validarForm = validar(form);
    if(validarForm){
        let data = {
            name: $('#name').val(),
            descrip: $('#descrip').val(),
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "permisos/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nuevo_permiso').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire("Exito!", respuesta.message, "success");
                        $('#permisos-table').DataTable().ajax.reload();
                    });
                } else {
                    $('#modal_nuevo_permiso').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire('¡Alerta!', respuesta.message, 'warning');
                        $('#permisos-table').DataTable().ajax.reload();
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

function edit_permiso_modal(id){
    $.ajax({
        url: "permisos/edit/" + id,
        datatype: 'html',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {

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

function update_permiso(id){
    let data = {
        id:$('#id_permiso').val(),
        name: $('#name').val(),
        descrip: $('#descrip').val(),
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "permisos/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_permiso').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $('#permisos-table').DataTable().ajax.reload();
                });
            } else {
                $('#modal_editar_permiso').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $('#permisos-table').DataTable().ajax.reload();
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
            name: {
                required: true,
                maxlength: 150
            },
            descrip: {
                required: true,
                maxlength: 150
            },
        },
    });

    return validator.form();
}