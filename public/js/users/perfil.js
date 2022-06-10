"use strict";
$(document).ready(function() {
    $('.contacto-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    $('#contacto-table').DataTable({
        "ordering": false,
        "searching": false,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
    });

    $(document).on('click', 'a.eliminar', function(e){
        let id = $(this).data('id');
        Swal.fire({
            title: '¿Desea eliminar este contacto?',
            showCancelButton: true,
            confirmButtonText: `Eliminar`,
            cancelButtonText: `Cancelar`
        }).then((result) => {
            console.log(result);
            if(result.value){
                delete_contacto(id);
            }
        })
    });

    function delete_contacto(id)
    {
        let data = {
            id: id,
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "perfil/delete/" + id,
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $("#contacto-table").load(" #contacto-table");
                    $("#contacto-card").load(" #contacto-card");
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: respuesta.message,
                        timer: 1500
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
                    $("#contacto-table").load(" #contacto-table");
                    $("#contacto-card").load(" #contacto-card");
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_nuevo_contacto').modal('hide').on('hidden.bs.modal', function () {
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
                    $("#contacto-table").load(" #contacto-table");
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_editar_contacto').modal('hide').on('hidden.bs.modal', function () {
                    $("#contacto-table").load(" #contacto-table");
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
    var form = $('#frm_editar_password');
    var valid = validar(form);
    if(valid){
        let data = {
            password: $('#rpass').val(),
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
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                    });
                } else {
                    $('#modal_editar_password').modal('hide').on('hidden.bs.modal', function () {
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

function validar(form){
    var validator = form.validate({
        rules: {
            pass: {
                required: true,
                maxlength: 150,
                minlength: 8
            },
            rpass: {
                required: true,
                equalTo: '#pass',
            }
        },
    });

    return validator.form();
}