"use strict";
$(document).ready(function() {
    $('.roles-table').each(function () {
        $(this).dataTable(window.dtDefaultOptions);
    });
    var tbRoles = $('#roles-table').DataTable({
        processing: true,
        "ordering": false,
        "searching": false,
        responsive: true,
        language: {
            "url": '//cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json'
        },
    });
});

function add_perfil_modal()
{
    $.ajax({
        url: "perfiles/create",
        datatype: 'GET',
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

function store_perfil(){
    var form = $("#frm_nuevo_perfil");
    var validarForm = validar(form);
    if(validarForm){
        let data = {
            name: $('#name').val(),
            descrip: $('#descrip').val(),
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "perfiles/store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    $('#modal_nuevo_perfil').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire("Exito!", respuesta.message, "success");
                        $("#roles-table").load(" #roles-table");
                    });
                } else {
                    $('#modal_nuevo_perfil').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire('¡Alerta!', respuesta.message, 'warning');
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
    }else{
        return false;
    }
}

function validar(form){
    var validator = form.validate({
        rules: {
            name: {
                required: true,
                maxlength: 150
            },
            descrip: {
                required: true,
                maxlength: 150
            },
        },
    });

    return validator.form();
}