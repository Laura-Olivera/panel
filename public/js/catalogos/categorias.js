'use strict';
$(document).ready(function(){
    $('.categorias-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbCatgoria = $('#categorias-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        responsive: true,
        ajax: {
            "url": "categorias/lista_categorias",
            "type": "GET",
        },
        columns: [
            { data: 'clave_cat', name: 'clave_cat'},
            { data: 'nombre', name: 'nombre' },
            { data: 'descripcion', name: 'descripcion' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="kt-badge kt-badge--'+ (row.estatus == 1 ? 'success' : 'danger') +' kt-badge--inline kt-badge--pill">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id_cat = row.id;
                    let btn = '<a class="btn btn-elevate kt-font-brand" onClick="edit_categoria_modal(' + id_cat + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl far fa-edit"></i></a>';
                    return btn;
                }
            },

        ],
    });
});

function add_categoria_modal()
{
    $.ajax({
        url: "categorias/create",
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

function store_categoria(){
    var form = $("#frm_nueva_categoria");
    var validarForm = validar(form);   
    if(validarForm){
        let data = {
            nombre: $('#nombre').val(),
            descripcion: $('#descripcion').val(),
            path: $('#path').val(),
            slug: $('#slug').val(),
            clave: $('#clave').val(),
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "categorias/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nueva_categoria').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire("Exito!", respuesta.message, "success");
                        $('#categoria-table').DataTable().ajax.reload();
                    });
                } else {
                    $('#modal_nueva_categoria').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire('¡Alerta!', respuesta.message, 'warning');
                        $('#categoria-table').DataTable().ajax.reload();
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

function validar(form){
    var validator = form.validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 150
            },
            descripcion: {
                required: true,
                maxlength: 150
            },
            slug: {
                required: true,
                maxlength: 150
            },
            clave: {
                required: true,
                maxlength: 150
            },
        },
    });

    return validator.form();
}