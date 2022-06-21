"use strict";
// Class definition
let texto;
var editorProductos = function () {    
    // Private functions
    var editor = function () {
        DecoupledEditor
            .create( document.querySelector( '#kt-ckeditor-1' ) )
            .then( editor => {
                const toolbarContainer = document.querySelector( '#kt-ckeditor-1-toolbar' );

                toolbarContainer.appendChild( editor.ui.view.toolbar.element );

                texto = editor;
            } )
            .catch( error => {
                console.error( error );
            } );

            $('.select2').select2({
                placeholder: 'Seleccione...',
                allowClear: true,
            });
    }

    return {
        // public functions
        init: function() {
            editor(); 
        }
    };
}();

function store_producto(){
    var form = $('#frm_nuevo_producto');
    var validarForm = validar(form);
    if(validarForm){
        let data = {
            nombre: $('#nombre').val(),
            codigo: $('#codigo').val(),
            modelo: $('#modelo').val(),
            marca: $('#marca').val(),
            proveedor: $('#proveedor').val(),
            categoria: $('#categoria').val(),
            costo: $('#costo').val(),
            cantidad: $('#cantidad').val(),
            general: $('#general').val(),
            tecnica: texto.getData(),
            estatus: $('#estatus').is(':checked') ? true : false,
        };
        $.ajax({
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "store",
            type: 'POST',
            data: data,
            dataType: 'json',
            success: function (respuesta) {
                if (respuesta.success == true) {
                    Swal.fire({
                        icon: "success",
                        title: "¡Exito!",
                        text: respuesta.message,
                        timer: 1500
                    }).then((result) => {
                        window.location = '/catalogos/productos';

                    });
                } else {
                    Swal.fire({
                        icon: "warning",
                        title: "¡Alerta!",
                        text: respuesta.message,
                        timer: 1500
                    }).then((result) => {
                        console.log(result);
                        
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
            nombre: {
                required: true,
            },
            codigo: {
                required: true,
            },
            modelo: {
                required: true,
            },
            marca: {
                required: true,
            },
            proveedor: {
                required: true,
            },
            categoria: {
                required: true,
            },
            costo: {
                required: true,
            },
            cantidad: {
                required: true,
            },
            general: {
                required: true
            },
            tecnica: {
                requires: true
            }
        },
    });

    return validator.form();
}

// Initialization
jQuery(document).ready(function() {
    editorProductos.init();
});