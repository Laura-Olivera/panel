"use strict";

$(document).ready(function(){
    
   /*  var tbEntradaProductos = $('#entrada-productos-table').DataTable({
        processing: false,
        serverSide: false,
        "ordering": false,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "entradas/ver_entrada/listar_entrada_productos",
            "type": "GET",
        },
        columns: [
            { data: 'codigo', name: 'codigo' },
            { data: 'cantidad', name: 'cantidad' },
            { data: 'costo_total', name: 'costo_total' },
            { data: 'comentario', name: 'comentario' },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn= '';
                    btn += '<div><a class="btn btn-icon" href="" title="Eliminar"><i class="icon-xl fas fa-trash text-primary"></i></a></div>';
                    return btn;
                }
            },
        ],
    }); */

    var producto = $("#cve_prod");
    producto.change(function(){
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
            }, 
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
                        text: 'El producto no existe.',
                        timer: 1500
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

    $(document).on("click", ".eliminar", function() {
        var parent = $(this).parents().get(0);
        $(parent).remove();
    });

});

function show_form_producto(){
    $("#add-producto").removeClass('d-none');
    $("#cve_prod").focus();
}

function entrada_producto_store()
{
    let data = {
        id: $("#id").val(),
        id_prod: $("#id_prod").val(),
        cve_prod: $("#cve_prod").val(),
        cant_prod: $("#cant_prod").val(),
        pre_prod: $("#costo_prod").val(),
        nota_prod: $("#nota_prod").val(),
    };

    let append = '<tr>'+
                    '<td class="pt-4"></td>' +
                    '<td class="text-right pt-4">80</td>' +
                    '<td class="text-right pt-4">$40.00</td>' +
                    '<td class="pt-4">$3200.00</td>' +
                '</tr>';

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')           
        }, 
        url: "entrada_producto",
        type: 'POST',
        data: data,
        datatype: 'json',
        success: function(response){
            if (response.success) {
                Swal.fire({
                    icon: "success",
                    title: "¡Exito!",
                    text: 'El producto se registro.',
                    timer: 1500
                });
            } else {
                Swal.fire({
                    icon: "warning",
                    title: "¡Alerta!",
                    text: 'El producto no existe.',
                    timer: 1500
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