"use strict";

// Class Definition
var KTLoginGeneral = function() {

    var login = $('#kt_login');

    var showErrorMsg = function(form, type, msg) {
        var alert = $('<div class="mb-10 alert alert-custom alert-light-' + type + ' alert-dismissible" role="alert">\
			<div class="alert-text font-weight-bold ">'+msg+'</div>\
			<div class="alert-close">\
                <i class="ki ki-remove" data-dismiss="alert"></i>\
            </div>\
		</div>');

        form.find('.alert').remove();
        alert.prependTo(form);
        //alert.animateClass('fadeIn animated');
        KTUtil.animateClass(alert[0], 'fadeIn animated');
        alert.find('span').html(msg);
    }

    var displaySignInForm = function() {
        login.removeClass('login-forgot-on');

        login.addClass('login-signin-on');
        KTUtil.animateClass(login.find('.login-signin')[0], 'flipInX animated');
        //login.find('.login-signin').animateClass('flipInX animated');
    }

    var displayForgotForm = function() {
        login.removeClass('login-signin-on');

        login.addClass('login-forgot-on');
        //login.find('.login-forgot-on').animateClass('flipInX animated');
        KTUtil.animateClass(login.find('.login-forgot')[0], 'flipInX animated');

    }

    var handleFormSwitch = function() {
        $('#kt_login_forgot').click(function(e) {
            e.preventDefault();
            displayForgotForm();
        });

        $('#kt_login_forgot_cancel').click(function(e) {
            e.preventDefault();
            displaySignInForm();
        });
    }

    var handleSignInFormSubmit = function() {
        $('#kt_login_signin_submit').click(function(e) {
            e.preventDefault();
            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    username: {
                        required: true,
                    },
                    password: {
                        required: true
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('spinner spinner-right pr-12 spinner-sm spinner-white').attr('disabled', true);

            form.ajaxSubmit({
                headers : {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: 'login',
                type: 'POST',
                cache: false,
                success: function(data) {
                    if(data.success == true){
                        console.log('confirmar');
                        window.location.href = "/home";
                    }else{
                        // similate 2s delay
                	    setTimeout(function() {
	                        btn.removeClass('spinner spinner-right pr-12 spinner-sm spinner-white').attr('disabled', false);
	                        showErrorMsg(form, 'danger', 'Usuario y/o contraseña incorrectos. Comprueba tus credenciales.');
                        }, 1000);
                    }                	
                }
            });
        });
    }

    var handleForgotFormSubmit = function() {
        $('#kt_login_forgot_submit').click(function(e) {
            e.preventDefault();

            var btn = $(this);
            var form = $(this).closest('form');

            form.validate({
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    username: {
                        required: true,
                    }
                }
            });

            if (!form.valid()) {
                return;
            }

            btn.addClass('spinner spinner-right pr-12 spinner-sm spinner-white').attr('disabled', true);

            form.ajaxSubmit({
                url: '',
                success: function(response, status, xhr, $form) {
                	// similate 2s delay
                	setTimeout(function() {
                		btn.removeClass('spinner spinner-right pr-12 spinner-sm spinner-white').attr('disabled', false); // remove
	                    form.clearForm(); // clear form
	                    form.validate().resetForm(); // reset validation states

	                    // display signup form
	                    displaySignInForm();
	                    var signInForm = login.find('.login-signin form');
	                    signInForm.clearForm();
	                    signInForm.validate().resetForm();

	                    showErrorMsg(signInForm, 'success', 'Cool! Password recovery instruction has been sent to your email.');
                	}, 2000);
                }
            });
        });
    }

    // Public Functions
    return {
        // public functions
        init: function() {
            handleFormSwitch();
            handleSignInFormSubmit();
            handleForgotFormSubmit();
        }
    };
}();

// Class Initialization
jQuery(document).ready(function() {
    KTLoginGeneral.init();
});
