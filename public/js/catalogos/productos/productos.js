"use strict";
$(document).ready(function() {
    $('.productos-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbUser = $('#productos-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [0, 'DESC'],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "productos/listar_productos",
            "type": "GET",
        },
        columns: [
            { data: 'codigo', name: 'codigo' },
            { data: 'nombre', name: 'nombre' },
            { data: 'categoria', name: 'categoria' },
            { data: 'proveedor', name: 'proveedor' },
            { data: 'costo', name: 'costo' },
            { data: 'cantidad', name: 'cantidad' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" href="productos/edit/'+ id +'" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>';
                    return btn;
                }
            },

        ],
    });
});
