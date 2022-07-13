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
            { data: 'fac_fecha_emision', name: 'fac_fecha' },
            { data: 'fac_total', name: 'fac_total' },
            {   
                "mRender": function ( data, type, row ) {
                    var estado = '';
                    switch (row.fac_metodo_pago) {
                        case 'Pago en una sola exhibicion':
                            estado = '<span class="label label-lg label-light-success label-inline font-weight-bold py-4"> Pago en una sola exhibicion </span>';
                            break;
                        case 'Pago en parcialidades':
                            estado = '<span class="label label-lg label-light-warning label-inline font-weight-bold py-4"> Pago en parcialidades </span>';
                            break;
                        case 'Pago diferido':
                            estado = '<span class="label label-lg label-light-warning label-inline font-weight-bold py-4"> Pago diferido </span>';
                            break;                    
                        default:
                            estado = '<span class="label label-lg label-light-info label-inline font-weight-bold py-4"> SIN ESTATUS </span>';
                            break;
                    }
                    return estado;
                }
            },
            { data: 'entrada_notas', name: 'entrada_notas' },
        ],
    });
});