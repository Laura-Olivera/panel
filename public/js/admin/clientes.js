"use strict";
$(document).ready(function() {
    $('.c-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    $('#c-table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "clientes/lista_clientes",
            "type": "GET",
        },
        columns: [
            { data: 'clave_cliente', name: 'clave_cliente'},
            { data: 'nombre_completo', name: 'nombre_completo' },
            { data: 'email', name: 'email' },
            { data: 'telefono', name: 'telefono' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+(row.estatus == 1 ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ (row.estatus == 1 ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id_user = row.id;
                    let btn = '<a class="btn btn-icon" href="clientes/detalle_cliente/'+ id_user +'" title="Ver detalle"><i class="icon-xl far fa-eye text-info"></i></a>';
                    return btn;
                }
            },

        ],
    });
});