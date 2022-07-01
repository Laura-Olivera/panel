'use strict';
$(document).ready(function(){
    $('.entradas-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbEntradas = $('#entradas-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [[2, 'DESC']],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "entradas/listar_entradas",
            "type": "GET",
        },
        columns: [
            {
                "mRender": function (data, type, row) {
                    let id = row.id;
                    let btn = '<a class="btn btn-icon" href="" title="Ver detalle"><i class="icon-xl fa fa-eye text-primary"></i></a>';
                    return btn;
                }
            },
            { data: 'proveedor', name: 'proveedor' },
            { data: 'fac_fecha', name: 'fac_fecha' },
            { data: 'fac_total', name: 'fac_total' },
            {   
                "mRender": function ( data, type, row ) {
                    return '<span class="label label-lg label-light-'+((row.estatus) ? 'success' : 'warning')+' label-inline font-weight-bold py-4">'+ ((row.estatus) ? 'Activo' : 'Inactivo') +'</span>';
                }
            },
            { data: 'notas', name: 'notas' },
        ],
    });
});