'use strict';
let today = new Date().toLocaleDateString('en-CA');
$(document).ready(function(){

});

function add_anexo_modal(cve_entrada)
{
    $.ajax({
        url: "/inventario/anexo/create/" + cve_entrada,
        datatype: 'html',
        data: cve_entrada,
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {

                $('#fac_forma_pago').select2({
                    placeholder: "Seleccione una opcion",
                    allowClear: true
                });
                $('#fac_fecha_emision').datepicker({
                    startDate: new Date('01-01-2000'),
                    endDate: new Date(),	
                    orientation: "bottom left",
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'es'
                });
            
                $('#fac_fecha_operacion').datepicker({
                    startDate: new Date('01-01-2000'),
                    endDate: new Date(),	
                    orientation: "bottom left",
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'es'
                });
            
                $('#fac_fecha_emision').val(today);
                $('#fac_fecha_operacion').val(today);

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

function store_entrada_anexo()
{
    var form = $("#frm_anexo_add");
    var validate = validar(form);
    if(validate){
        let data = new FormData($('#frm_anexo_add')[0]);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },                
            contentType: false,
            processData: false,
            url: "/inventario/anexo/store",
            data: data,
            type: 'POST',
            datatype: 'json',
            success: function(response){
                if (response.success) {
                    $('#anexo_add_modal').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: response.message,
                            timer: 1500
                        }).then((result) => {
                            window.location.reload();
                        })
                    });
                } else {
                    $('#anexo_add_modal').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire({
                            icon: "warning",
                            title: "¡Alerta!",
                            text: response.message
                        });
                    });
                }
            },
            error: function(xhr){
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
    }else{
        return false;
    }
}

function edit_anexo_entrada(id)
{
    $.ajax({
        url: "/inventario/anexo/edit/" + id,
        datatype: 'html',
        success: function(data){
            var modal = data;
            $(modal).modal().on('shown.bs.modal', function () {

                $('#fac_forma_pago').select2({
                    placeholder: "Seleccione una opcion",
                    allowClear: true
                });
                $('#fac_fecha_emision').datepicker({
                    startDate: new Date('01-01-2000'),
                    endDate: new Date(),	
                    orientation: "bottom left",
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'es'
                });
            
                $('#fac_fecha_operacion').datepicker({
                    startDate: new Date('01-01-2000'),
                    endDate: new Date(),	
                    orientation: "bottom left",
                    todayHighlight: true,
                    autoclose: true,
                    format: 'yyyy-mm-dd',
                    language: 'es'
                });

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

function update_entrada_anexo(id)
{
    var form = $("#frm_anexo_edit");
    var validate = validar(form);
    if(validate){
        let data = new FormData($('#frm_anexo_edit')[0]);
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },                
            contentType: false,
            processData: false,
            url: "/inventario/anexo/update/" + id,
            data: data,
            type: 'POST',
            datatype: 'json',
            success: function(response){
                if (response.success) {
                    $('#anexo_edit_modal').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire({
                            icon: "success",
                            title: "¡Exito!",
                            text: response.message,
                            timer: 1500
                        }).then((result) => {
                            window.location.reload();
                        })
                    });
                } else {
                    $('#anexo_edit_modal').modal('hide').on('hidden.bs.modal', function () {
                        Swal.fire({
                            icon: "warning",
                            title: "¡Alerta!",
                            text: response.message
                        });
                    });
                }
            },
            error: function(xhr){
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
    }else{
        return false;
    }
}

function delete_anexo_entrada(id)
{
    $.ajax({
        url: "/inventario/anexo/delete/" + id,
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

function confirm_delete(id)
{
    Swal.fire({
        title: '¿Desea eliminar este contacto?',
        showCancelButton: true,
        confirmButtonText: `Eliminar`,
        cancelButtonText: `Cancelar`
    }).then((result) => {
        console.log(result);
        if(result.value){
            
            var form = $("#frm_anexo_delete");
            var validate = validar_delete(form);
            if(validate){
                let data = {
                    id: id,
                    comentario: $("#delete_nota").val()
                }
                $.ajax({
                    headers : {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },                
                    url: "/inventario/anexo/delete/confirm/" + id,
                    data: data,
                    type: 'POST',
                    datatype: 'json',
                    success: function(response){
                        if (response.success) {
                            $('#anexo_delete_modal').modal('hide').on('hidden.bs.modal', function () {
                                Swal.fire({
                                    icon: "success",
                                    title: "¡Exito!",
                                    text: response.message,
                                    timer: 1500
                                }).then((result) => {
                                    window.location.reload();
                                })
                            });
                        } else {
                            $('#anexo_delete_modal').modal('hide').on('hidden.bs.modal', function () {
                                Swal.fire({
                                    icon: "warning",
                                    title: "¡Alerta!",
                                    text: response.message
                                });
                            });
                        }
                    },
                    error: function(xhr){
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
            }else{
                return false;
            }

        }else{
            $('#anexo_delete_modal').modal('hide').on('hidden.bs.modal', function () {
                Swal.fire({
                    icon: "warning",
                    title: "¡Alerta!",
                    text: response.message
                });
            });
        }
    })
}

function validar(form)
{
    var validator = form.validate({
        rules: {
            fac_fecha_emision: {
                required: true
            },
            fac_fecha_operacion: {
                required: true
            },
            fac_total: {
                required: true
            },
            fac_total_letra: {
                required: true
            },
            fac_forma_pago: {
                required: true
            },
            fac_saldo_anterior: {
                required: true
            },
            fac_saldo_insoluto: {
                required: true
            },
            fac_path: {
                required: true
            },
        }
    });

    return validator.form();
}

function validar_delete(form)
{
    var validator = form.validate({
        rules: {
            delete_nota: {
                required: true
            }
        }
    });

    return validator.form();
}