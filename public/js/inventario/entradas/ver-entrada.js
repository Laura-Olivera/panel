"use strict";

$(document).ready(function(){

});

function buscar_producto()
{
    $("#cve_prod").change(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
            }, 
            type: 'GET',
            url: "buscar_prod/" + this.value,
            datatype: 'json',
            success: function(response){
                if (response.success) {
                    $("#id_prod").val(response.id_prod);
                    $("#costo").val(response.costo);
                    $("#general").val(response.descrip_gral);
                    $("#cant_prod").focus();
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: 'El producto no existe.'
                    });
                }
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
        })
    });
}

function agregar_entrada_producto(entrada_id)
{
    console.log(entrada_id);
    $.ajax({
        url: "/agregar_producto",
        datatype: 'html',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {
                buscar_producto();
                $('#id').val(entrada_id);
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
    })
}

function store_entrada_producto()
{
    let data = {
        id: $('#id').val(),
        id_prod: $('#id_prod').val(),
        cant_prod: $('#cant_prod').val(),
        pre_prod: $('#costo_prod').val(),
        nota_prod: $('#nota_prod').val()
    };

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, 
        url: "entrada_producto",
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response){
            if (response.success) {
                $('#producto_entrada_add_modal').modal('hide').on('hidden.bs.modal', function () {                        
                    $("#empty-ent-prod").remove();
                    $("#entrada-productos-table").load(" #entrada-productos-table");
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: response.message,
                        timer: 1500
                    });
                });
            } else {
                $('#producto_entrada_add_modal').modal('hide').on('hidden.bs.modal', function () {  
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: response.message
                    });
                });
            }
        },
        error: function (xhr) {
            console.log(xhr);
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

function editar_entrada_producto(entrada_id, producto_id)
{
    $.ajax({
        url: "editar_producto/" + entrada_id + "/" + producto_id,
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

function update_entrada_producto(entrada_id, producto_id)
{
    let data = {
        id: $('#id_edit').val(),
        id_prod: $('#id_prod_edit').val(),
        cant_prod: $('#cant_prod_edit').val(),
        pre_prod: $('#costo_prod_edit').val(),
        nota_prod: $('#nota_prod_edit').val(),
    };
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, 
        url: "guardar_edit/" + entrada_id + "/" + producto_id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function(response){
            if (response.success) {
                $('#producto_entrada_edit_modal').modal('hide').on('hidden.bs.modal', function () {
                    $("#entrada-productos-table").load(" #entrada-productos-table");
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: response.message,
                        timer: 1500
                    });
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "¡Alerta!",
                    text: response.message
                });
            }
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

function borrar_entrada_producto(entrada_id, producto_id)
{
    Swal.fire({
        title: '¿Desea eliminar este producto?',
        showCancelButton: true,
        confirmButtonText: `Eliminar`,
        cancelButtonText: `Cancelar`
    }).then((result) => {
        console.log(result);
        if(result.value){
            delete_ent_prod(entrada_id, producto_id);
        }
    })
}

function delete_ent_prod(entrada_id, producto_id)
{
    let data = {
        id: entrada_id,
        id_prod: producto_id
    };

    $.ajax({
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "delete_producto/" + entrada_id + "/" + producto_id,
        type: 'POST',
        data: data,
        dataType: 'json',
        success: function (response) {
            if (response.success) {
                $("#entrada-productos-table").load(" #entrada-productos-table");
                Swal.fire({
                    icon: "success",
                    title: "¡Exito!",
                    text: response.message,
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "¡Alerta!",
                    text: response.message,
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

function mostrar_archivo(path, name)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')   
        },
        url: "/documentos/" + path + "/" + name,
        type: "GET",
        success: function(){

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

function validar(form)
{
    var validator = form.validate({
        rules: {
            cve_prod: {
                required: true
            },
            cant_prod: {
                requered: true
            },
            costo_prod: {
                required: true
            }
        }
    });

    return validator.form();
}