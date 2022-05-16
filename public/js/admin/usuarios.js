"use strict";
$(document).ready(function() {
    $('.users-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbUser = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        responsive: true,
        ajax: {
            "url": "usuarios/lista_usuarios",
            "type": "GET",
        },
        columns: [
            { data: 'nombre', name: 'nombre' },
            { data: 'primer_apellido', name: 'primer_apellido' },
            { data: 'segundo_apellido', name: 'segundo_apellido' },
            { data: 'email', name: 'email' },
            { data: 'telefono', name: 'telefono' },
            { data: 'direccion', name: 'direccion' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="kt-badge kt-badge--'+ (row.estatus == 1 ? 'success' : 'danger') +' kt-badge--inline kt-badge--pill">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id_user = row.id;
                    let btn = '<a class="btn btn-elevate kt-font-brand" onClick="edit_usuario_modal(' + id_user + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl far fa-edit"></i></a>';
                    btn += '<a class="btn btn-elevate kt-font-brand" onClick="view_usuario_modal(' + id_user + ');" href="javascript:void(0)" title="Ver detalle"><i class="icon-xl far fa-eye"></i></a>';
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

function store_usuario(){
    var form = $("#frm_nuevo_usuario");
    var validarForm = validar(form);
    var dir = $('#calle').val() + '|' + $('#municipio').val() + '|' + $('#estado').val() + '|' + $('#postal').val();    
    if(validarForm){
        let data = {
            nombre: $('#nombre').val(),
            primer: $('#pApellido').val(),
            segundo: $('#sApellido').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            direccion: dir,
            perfil: $('#perfil').val(),
            telefono: $('#telefono').val(),
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
                        Swal.fire("Exito!", respuesta.message, "success");
                        $('#users-table').DataTable().ajax.reload();
                    });
                } else {
                    $('#modal_nuevo_usuario').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire('¡Alerta!', respuesta.message, 'warning');
                        $('#users-table').DataTable().ajax.reload();
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

function update_usuario(id){  
    var dir = $('#calle').val() + '|' + $('#municipio').val() + '|' + $('#estado').val() + '|' + $('#postal').val();
    let data = {
        id_usuario: $('#id_usuario').val(),
        nombre: $('#nombre').val(),
        primer: $('#pApellido').val(),
        segundo: $('#sApellido').val(),
        email: $('#email').val(),
        password: $('#password').val(),
        direccion: dir,
        perfil: $('#perfil').val(),
        telefono: $('#telefono').val(),
        estatus: $('#estatus').is(':checked') ? 1 : 0,
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
                });
            } else {
                $('#modal_editar_usuario').modal('hide').on('hidden.bs.modal', function () {
                    Swal.fire('¡Alerta!', respuesta.message, 'warning');
                    $('#users-table').DataTable().ajax.reload();
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

function view_usuario_modal(id){

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
            sApellido: {
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
            calle: {
                required: true,
                maxlength: 150
            },
            municipio: {
                required: true,
                maxlength: 150
            },
            estado: {
                required: true,
                maxlength: 150
            },
            postal: {
                required: true,
                maxlength: 5,
                minlength: 5
            },
            telefono: {
                required: true,
                maxlength: 10,
                minlength: 10
            },
            perfil: {
                required: true,
                maxlength: 150
            }
        },
    });

    return validator.form();
}