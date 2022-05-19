"use strict";
$(document).ready(function() {
    $('.contacto-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    $('#contacto-table').DataTable({
        "ordering": false,
        "searching": false,
        responsive: true,
    });
});

function add_contacto_modal()
{
    $.ajax({
        url: "perfil/create",
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

function store_contacto(){
    let data = {
        nombre: $('#nombre').val(),
        telefono: $('#telefono').val(),
        direccion: $('#direccion').val(),
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "perfil/store",
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_nuevo_contacto').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $("#contacto-table").load(" #contacto-table");
                });
            } else {
                $('#modal_nuevo_contacto').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $("#contacto-table").load(" #contacto-table");
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

function edit_contacto_modal(id){
    $.ajax({
        url: "perfil/edit/" + id,
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

function update_contacto(id){  
    let data = {
        id: $('#id').val(),
        nombre: $('#nombre').val(),
        telefono: $('#telefono').val(),
        direccion: $('#direccion').val(),
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "perfil/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_contacto').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $("#contacto-table").load(" #contacto-table");
                });
            } else {
                $('#modal_editar_contacto').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $("#contacto-table").load(" #contacto-table");
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

function edit_password()
{
    $.ajax({
        url: 'perfil/viewPassword',
        dataType: 'html',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function(){

            }).on('hidden.bs.modal', function(){
                $(this).remove();
            });
        },
        error: function(xhr){
            Swal.fire('¡Alerta!', 'Error en la conectividad de red', 'warning');
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
    })
}

function update_password()
{
    let data = {
        nombre: $('#password').val(),
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "perfil/resetPassword",
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_password').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                });
            } else {
                $('#modal_editar_password').modal('hide').on('hidden.bs.modal', function () {
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
}

function delete_contacto(id)
{
    
}