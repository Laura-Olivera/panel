"use strict";
$(document).ready(function() {
    $('.clientes-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbCliente = $('#clientes-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            "url": "clientes/lista_clientes",
            "type": "GET",
        },
        columns: [
            { data: 'clave_cliente', name: 'clave_cliente'},
            { data: 'nombre', name: 'nombre' },
            { data: 'email', name: 'email' },
            { data: 'telefono', name: 'telefono' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="kt-badge kt-badge--'+ (row.estatus == 1 ? 'success' : 'danger') +' kt-badge--inline kt-badge--pill">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id_user = row.id;
                    let btn = '<a class="btn btn-elevate kt-font-brand" href="admin/clientes/detalle_cliente/'+ id_user +'" title="Ver detalle"><i class="icon-xl far fa-eye"></i></a>';
                    return btn;
                }
            },

        ],
    });
});