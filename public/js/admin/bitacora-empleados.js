"use strict";
$(document).ready(function() {
    $('.bitacora-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbBitacora = $('#bitacora-table').DataTable({
        processing: true,
        serverSide: true,
        "ordering": true,
        "order": [[0, 'desc']],
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
        ajax: {
            "url": "bitacora_usuarios/listar_bitacora",
            "type": "GET",
        },
        columns: [
            { data: 'id', name: 'id' }, 
            { data: 'usuario', name: 'usuario'},
            { data: 'accion', name: 'accion' },
            { data: 'data', name: 'data' },
            { data: 'created_at', name: 'created_at' },
        ],
    });
});
