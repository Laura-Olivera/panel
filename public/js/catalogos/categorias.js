'use strict';
$(document).ready(function(){
    $('.categorias-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbCatgoria = $('#categorias-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [1, 'ASC'],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "categorias/lista_categorias",
            "type": "GET",
        },
        columns: [
            { data: 'cve_cat', name: 'cve_cat'},
            { data: 'nombre', name: 'nombre' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" onClick="edit_categoria_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>';
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
            clave: $('#clave').val(),
            estatus: $('#estatus').is(':checked') ? true : false,
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
                        $('#categorias-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                    });
                } else {
                    $('#modal_nueva_categoria').modal('hide').on('hidden.bs.modal', function () {
                        $('#categorias-table').DataTable().ajax.reload();
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

function edit_categoria_modal(id){
    $.ajax({
        url: "categorias/edit/" + id,
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

function update_categoria(id){  
    let data = {
        id: $('#id').val(),
        nombre: $('#nombre').val(),
        clave: $('#clave').val(),
        estatus: $('#estatus').is(':checked') ? true : false,
    };
    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "categorias/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_categoria').modal('hide').on('hidden.bs.modal', function () {
                    $('#categorias-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_editar_categoria').modal('hide').on('hidden.bs.modal', function () {
                    $('#categorias-table').DataTable().ajax.reload();
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
        },
    });

    return validator.form();
}