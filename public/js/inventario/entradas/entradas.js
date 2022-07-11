'use strict';
$(document).ready(function(){
    $('.entradas-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbEntradas = $('#entradas-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        order: [[0, 'DESC']],
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
                    let btn= '';
                    btn += '<div>'+row.cve_entrada+'</div>';
                    btn += '<div><a class="btn btn-icon" href="entradas/ver_entrada/'+ row.cve_entrada +'" title="Ver detalle"><i class="icon-xl fa fa-eye text-primary"></i></a></div>';
                    return btn;
                }
            },
            { data: 'proveedor', name: 'proveedor' },
            { data: 'fac_fecha', name: 'fac_fecha' },
            { data: 'fac_total', name: 'fac_total' },
            {   
                "mRender": function ( data, type, row ) {
                    var estado = '';
                    switch (row.estatus) {
                        case 'PAGADO':
                            estado = '<span class="label label-lg label-light-success label-inline font-weight-bold py-4"> PAGADO </span>';
                            break;
                        case 'POR PAGAR':
                            estado = '<span class="label label-lg label-light-warning label-inline font-weight-bold py-4"> POR PAGAR </span>';
                            break;
                        case 'CANCELADO':
                            estado = '<span class="label label-lg label-light-danger label-inline font-weight-bold py-4"> CANCELADO </span>';
                            break;                    
                        default:
                            estado = '<span class="label label-lg label-light-info label-inline font-weight-bold py-4"> SIN ESTATUS </span>';
                            break;
                    }
                    return estado;
                }
            },
            { data: 'notas', name: 'notas' },
        ],
    });
});