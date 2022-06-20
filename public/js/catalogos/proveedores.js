"use strict";
$(document).ready(function() {
    $('.proveedores-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbProveedores = $('#proveedores-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [1],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "proveedores/listar_proveedores",
            "type": "GET",
        },
        columns: [
            { data: 'cve_prov', name: 'cve_prov' },
            { data: 'nombre', name: 'nombre' },
            { data: 'Telefono', name: 'Telefono', "mRender": function(data, type, row){
                    let tel = row.telefono + ' - ' + row.extension;
                    return tel;
                }
            },
            { data: 'email', name: 'email' },
            { data: 'direccion', name: 'direccion' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" onClick="edit_proveedor_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>';
                    return btn;
                }
            },

        ],
    });
});

function add_proveedor_modal()
{
    $.ajax({
        url: "proveedores/create",
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

function store_proveedor(){
    var form = $("#frm_nuevo_proveedor");
    var validarForm = validar(form); 
    if(validarForm){
        let data = {
            nombre: $('#nombre').val(),
            clave: $('#clave').val(),
            telefono: $('#telefono').val(),
            extension: $('#extension').val(),
            email: $('#email').val(),
            direccion: $('#direccion').val(),
            estatus: $('#estatus').is(':checked') ? true : false,
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "proveedores/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nuevo_proveedor').modal('hide').on('hidden.bs.modal', function () {
                        $('#proveedores-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                    });
                } else {
                    $('#modal_nuevo_proveedor').modal('hide').on('hidden.bs.modal', function () {
                        $('#proveedor-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "warning",
                            title: "¡Alerta!",
                            text: respuesta.message,
                            timer: 1500
                        });
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

function edit_proveedor_modal(id){
    $.ajax({
        url: "proveedores/edit/" + id,
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

function update_usuario(id){  
    let data = {
        id: $('#id').val(),
        nombre: $('#nombre').val(),
        clave: $('#clave').val(),
        telefono: $('#telefono').val(),
        extension: $('#extension').val(),
        email: $('#email').val(),
        direccion: $('#direccion').val(),
        estatus: $('#estatus').is(':checked') ? true : false,
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "proveedores/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_proveedor').modal('hide').on('hidden.bs.modal', function () {
                    $('#proveedor-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_editar_proveedor').modal('hide').on('hidden.bs.modal', function () {
                    $('#proveedor-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: respuesta.message,
                        timer: 1500
                    });
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
            nombre: {
                required: true,
                maxlength: 150
            },
            clave: {
                required: true,
                maxlength: 150
            },
            telefono: {
                required: true,
                maxlength: 12
            },
            extension: {
                required: true,
                maxlength: 10
            },
            email: {
                required: true,
                maxlength: 150
            },
            direccion: {
                required: true,
                maxlength: 150
            }
        },
    });

    return validator.form();
}