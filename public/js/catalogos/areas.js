'use strict';
$(document).ready(function(){
    $('.areas-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbCatgoria = $('#areas-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "areas/lista_areas",
            "type": "GET",
        },
        columns: [
            { data: 'cve_area', name: 'cve_area'},
            { data: 'nombre', name: 'nombre' },
            { data: 'responsable', name: 'responsable' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" onClick="edit_area_modal(' + id + ');" href="javascript:void(0)" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>'
                    return btn;
                }
            },

        ],
    });
});

function add_area_modal()
{
    $.ajax({
        url: "areas/create",
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

function store_area(){
    var form = $("#frm_nueva_area");
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
            url: "areas/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nueva_area').modal('hide').on('hidden.bs.modal', function () {
                        $('#areas-table').DataTable().ajax.reload();
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: respuesta.message,
                            timer: 1500
                        });
                    });
                } else {
                    $('#modal_nueva_area').modal('hide').on('hidden.bs.modal', function () {
                        $('#areas-table').DataTable().ajax.reload();
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

function edit_area_modal(id){
    $.ajax({
        url: "areas/edit/" + id,
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

function update_area(id){  
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
        url: "areas/update/" + id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (respuesta) {
            if (respuesta.success == true) {
                $('#modal_editar_area').modal('hide').on('hidden.bs.modal', function () {
                    $('#areas-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    });
                });
            } else {
                $('#modal_editar_area').modal('hide').on('hidden.bs.modal', function () {
                    $('#areas-table').DataTable().ajax.reload();
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

function import_areas()
{
    var form = $("#frm_importar_areas");
    var validate = validar_importacion(form);
    if(validate){
        let data = new FormData($('#frm_importar_areas')[0]);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },                
            contentType: false,
            processData: false,
            url: "areas/importar",
            data: data,
            type: 'POST',
            datatype: 'json',
            success: function(response){
                if (response.success) {
                    $('#areas-table').DataTable().ajax.reload();
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: response.message,
                        timer: 1500
                    }).then((result) => {
                        window.location.reload();
                    })
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: response.message
                    });
                }
            },
            error: function(xhr){
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
    }else{
        return false;
    }
}

function validar(form){
    var validator = form.validate({
        rules: {
            nombre: {
                required: true,
                maxlength: 150
            },
            responsable: {
                required: true,
                maxlength: 255
            },
            clave: {
                required: true,
                maxlength: 150
            },
        },
    });

    return validator.form();
}

function validar_importacion(form)
{
    var validator = form.validate({
        rules: {
            importar_areas: {
                required: true,
                extension: "csv, xlsx",
            },
        },
    });

    return validator.form();
}