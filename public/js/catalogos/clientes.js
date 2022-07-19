"use strict";
$(document).ready(function(){
    $('.clientes-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbCliente = $('#clientes-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [0],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "clientes/listar_clientes",
            "type": "GET",
        },
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'rfc', name: 'rfc' },
            { data: 'email', name: 'email' },
            { data: 'telefono', name: 'telefono' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" onClick="edit_cliente_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>';
                    return btn;
                }
            },

        ],
    });
});

function add_cliente_modal()
{
    $.ajax({
        url: "clientes/create",
        type: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function(){

            }).on('hidden.bs.modal', function(){
                $(this).remove();
            });
        },
        error: function(xhr){
            Swal.fire('¡Alerta!', 'Error de conectividad en la red.', 'warning');
        }, 
        beforeSend: function(){
            KTApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                zIndex: 3000
            });
        },
        complete: function(){
            KTApp.unblockPage();
        }
    });
}

function store_cliente()
{
    var form = $("#modal_nuevo_cliente");
    var validateForm = validar(form);

    if(validateForm){
        let data = {
            nombre: $("#nombre").val(),
            rfc : $("#rfc").val(),
            email: $("#email").val(),
            telefono: $("#telefono").val(),
            direccion: $("#direccion").val(),
            estatus: $('#estatus').is(':checked') ? true : false,
        };
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "clientes/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function(response){
                if(response.success){
                    $('#modal_nuevo_cliente').modal('hide').on('hidden.bs.modal', function () {
                        $('#clientes-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: response.message,
                            timer: 1500
                        });
                    });
                }else{
                    $('#modal_nuevo_cliente').modal('hide').on('hidden.bs.modal', function () {
                        $('#clientes-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "warning",
                            title: "¡Alerta!",
                            text: response.message,
                            timer: 1500
                        });
                    });
                }
            },
            error: function(xhr){
                Swal.fire('¡!Alerta', 'Error en la conectividad de red.', 'warning')
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

function edit_cliente_modal(id)
{
    $.ajax({
        url: "clientes/edit/" + id,
        type: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function(){

            }).on('hidden.bs.modal', function(){
                $(this).remove();
            });
        },
        error: function(xhr){
            Swal.fire('¡Alerta!', 'Error de conectividad en la red.', 'warning');
        }, 
        beforeSend: function(){
            KTApp.blockPage({
                overlayColor: '#000000',
                type: 'v2',
                state: 'success',
                zIndex: 3000
            });
        },
        complete: function(){
            KTApp.unblockPage();
        }
    });
}

function update_cliente(id)
{
    let data = {
        id: $("#id").val(),
        nombre: $("#nombre").val(),
        rfc : $("#rfc").val(),
        email: $("#email").val(),
        telefono: $("#telefono").val(),
        direccion: $("#direccion").val(),
        estatus: $('#estatus').is(':checked') ? true : false,
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "clientes/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response){
            if(response.success){
                $('#modal_editar_cliente').modal('hide').on('hidden.bs.modal', function () {
                    $('#clientes-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: response.message,
                        timer: 1500
                    });
                });
            }else{
                $('#modal_editar_cliente').modal('hide').on('hidden.bs.modal', function () {
                    $('#clientes-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: response.message,
                        timer: 1500
                    });
                });
            }
        },
        error: function(xhr){
            Swal.fire('¡!Alerta', 'Error en la conectividad de red.', 'warning')
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

function validar(form)
{
    var validator = form.validate({
        rules: {
            nombre: {
                required: true
            },
            email: {
                required: true
            },
        }
    });
    return validator.form();
}