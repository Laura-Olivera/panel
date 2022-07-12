"use strict";

$(document).ready(function(){
  
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

    $("#agregar-ent-prod").on('click', function(){
        entrada_producto();
    });

    $("#close-form").on('click', function(){
        $("#add-producto").addClass('d-none');
        $("#id_prod").val("");
        $("#cve_prod").val("");
        $("#costo").val("");
        $("#general").val("");
        $("#cant_prod").val("");
        $("#costo_prod").val("");
        $("#nota_prod").val("");
    });

});

function show_form_producto(){
    $("#add-producto").removeClass('d-none');
    $("#cve_prod").focus();
}

function entrada_producto()
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
                $("#empty-ent-prod").remove();
                /* var datos = response.data;
                let append = '<tr class="font-weight-boldest font-size-lg" id="'+ datos.producto +'">' +
                                '<td class="pt-4"> '+ datos.producto +' </td> ' +
                                '<td class="text-right pt-4"> '+ datos.cantidad +' </td>' +
                                '<td class="text-right pt-4">$ '+ datos.total +' </td> ' +
                                '<td class="pt-4"> '+ datos.notas +' </td> ' +
                                '<td><button type="button" class="btn btn-danger" name="borrar-producto" id="borrar-producto" onclic="">-</button>' +
                                    '<button type="button" class="btn btn-info" name="editar_producto" id="editar-producto" onclic="editar_entrada_producto('+ datos.entrada_id + ',' + datos.producto_id + ');">editar</button>' +
                                '</td> ' +
                            '</tr>';
                $(append).appendTo("#tbody-productos"); */
                $("#id_prod").val("");
                $("#cve_prod").val("");
                $("#costo").val("");
                $("#general").val("");
                $("#cant_prod").val("");
                $("#costo_prod").val("");
                $("#nota_prod").val("");
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
                    text: response.message
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