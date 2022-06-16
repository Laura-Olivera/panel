"use strict";
$(document).ready(function() {
    $('.users-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbUser = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [0],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "usuarios/lista_usuarios",
            "type": "GET",
        },
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'primer_apellido', name: 'primer_apellido' },
            { data: 'segundo_apellido', name: 'segundo_apellido' },
            { data: 'usuario', name: 'usuario' },
            { data: 'email', name: 'email' },
            { data: 'area', name: 'area' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+(row.estatus == 1 ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" onClick="edit_usuario_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>';
                    btn += '<a class="btn btn-icon" href="usuarios/detalle_usuario/'+ id +'" title="Ver detalle"><i class="icon-xl far fa-eye text-info"></i></a>';
                    return btn;
                }
            },

        ],
    });
});

function add_usuario_modal()
{
    $.ajax({
        url: "usuarios/create",
        datatype: 'GET',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                $('#perfil').select2({
                    placeholder: 'Seleccione...',
                    allowClear: true,
                });
                $('#area').select2({
                    placeholder: 'Seleccione...',
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

function store_usuario(){
    var form = $("#frm_nuevo_usuario");
    var validarForm = validar(form);
    
    if(validarForm){
        let data = {
            usuario: $('#usuario').val(),
            nombre: $('#nombre').val(),
            primer: $('#pApellido').val(),
            segundo: $('#sApellido').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            perfil: $('#perfil').val(),
            telefono: $('#telefono').val(),
            rfc: $('#rfc').val(),
            curp: $('#curp').val(),
            area: $('#area').val(),
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "usuarios/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nuevo_usuario').modal('hide').on('hidden.bs.modal', function () {
                        $('#users-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                    });
                } else {
                    $('#modal_nuevo_usuario').modal('hide').on('hidden.bs.modal', function () {
                        $('#users-table').DataTable().ajax.reload();
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

function edit_usuario_modal(id){
    $.ajax({
        url: "usuarios/edit/" + id,
        datatype: 'html',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                $('#perfil').select2({
                    placeholder: 'Seleccione...',
                    allowClear: true,
                });
                $('#area').select2({
                    placeholder: 'Seleccione...',
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

function update_usuario(id){  
    let data = {
        id_usuario: $('#id_usuario').val(),
        usuario: $('#usuario').val(),
        nombre: $('#nombre').val(),
        primer: $('#pApellido').val(),
        segundo: $('#sApellido').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        perfil: $('#perfil').val(),
        telefono: $('#telefono').val(),
        rfc: $('#rfc').val(),
        curp: $('#curp').val(),
        area: $('#area').val(),
        estatus: $('#estatus').is(':checked') ? true : false,
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "usuarios/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_usuario').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire("Exito!", respuesta.message, "success");
                    $('#users-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_editar_usuario').modal('hide').on('hidden.bs.modal', function () {
                    $('#users-table').DataTable().ajax.reload();
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
            pApellido: {
                required: true,
                maxlength: 150
            },
            email: {
                required: true,
                maxlength: 150
            },
            password: {
                required: true,
                maxlength: 150,
                minlength: 8
            },
            rpassword: {
                required: true,
                equalTo: '#password'
            },
            user: {
                required: true,
            },
            perfil: {
                required: true,
                maxlength: 150
            },
            area: {
                required: true,
                maxlength: 150
            }
        },
    });

    return validator.form();
}