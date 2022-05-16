<html lang="en">
	<!--begin::Head-->
	<head>
		<meta charset="utf-8" />
		<title>S97 | Panel</title>
		<meta name="description" content="Login page example" />
		<meta name="csrf-token" content="{{ csrf_token() }}">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{ URL::asset('assets/css/pages/users/login-3.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{ URL::asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{ URL::asset('assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{ URL::asset('assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-signin-on login-3 d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center flex-row-fluid bgi-size-cover bgi-position-top bgi-no-repeat" style="background-image: url(assets/media/bg/bg-3.jpg);">
					<div class="login-form text-center p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<a href="#">
								<img src="assets/media/logos/logo-letter-13.png" class="max-h-75px" alt="" />
							</a>
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3>Iniciar Sesión</h3>
								<div class="text-muted font-weight-bold">Ingresa los datos para entrar a tu cuenta:</div>
							</div>
							<form class="form" method="POST">
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Correo electronico" name="username" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Contraseña" name="password" id="pass_login" />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center">
									<label class="checkbox m-0 text-muted">
									<input type="checkbox" name="remember" />Recordarme
									<span></span></label>
									<a href="javascript:;" id="kt_login_forgot" class="text-muted text-hover-primary">¿Olvidaste tu contraseña?</a>
								</div>
								<button id="kt_login_signin_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-4">Entrar</button>
							</form>
							<div class="mt-10">
								<span class="opacity-70 mr-4">Aun no tienes una cuenta?</span>
								<a href="javascript:;" id="kt_login_signup" class="text-muted text-hover-primary font-weight-bold">Registrate!</a>
							</div>
						</div>
						<!--end::Login Sign in form-->
						<!--begin::Login Sign up form-->
						<div class="login-signup">
							<div class="mb-20">
								<h3>Registrar</h3>
								<div class="text-muted font-weight-bold">Ingresa los datos para crear tu cuenta</div>
							</div>
							<form class="form">
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Nombre(s) y apellidos" name="usuario" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="email" placeholder="Correo electronico" name="email" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Telefono" name="telefono" autocomplete="off" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Contraseña" name="password" />
								</div>
								<div class="form-group mb-5">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="password" placeholder="Confirmar contraseña" name="rpassword" />
								</div>
								<div class="form-group mb-5 text-left">
									<label class="checkbox m-0">
									<input type="checkbox" name="agree" />Estoy de acuerdo con los
									<a href="#" class="font-weight-bold">terminos y condiciones</a>.
									<span></span></label>
									<div class="form-text text-muted text-center"></div>
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_signup_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Crear cuenta</button>
									<button id="kt_login_signup_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign up form-->
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3>Olvidaste tu contraseña?</h3>
								<div class="text-muted font-weight-bold">Ingresa tu correo electronico para restablecer tu contraseña</div>
							</div>
							<form class="form">
								<div class="input-group mb-10">
									<input class="form-control h-auto form-control-solid py-4 px-8" type="text" placeholder="Correo electronico" name="email" id="kt_email" autocomplete="off" />
								</div>
								<div class="form-group d-flex flex-wrap flex-center mt-10">
									<button id="kt_login_forgot_submit" class="btn btn-primary font-weight-bold px-9 py-4 my-3 mx-2">Enviar</button>
									<button id="kt_login_forgot_cancel" class="btn btn-light-primary font-weight-bold px-9 py-4 my-3 mx-2">Cancelar</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		<!--begin::Global Config(global config for global JS scripts)-->
		<script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1200 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#6993FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#F3F6F9", "dark": "#212121" }, "light": { "white": "#ffffff", "primary": "#E1E9FF", "secondary": "#ECF0F3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#212121", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#ECF0F3", "gray-300": "#E5EAEE", "gray-400": "#D6D6E0", "gray-500": "#B5B5C3", "gray-600": "#80808F", "gray-700": "#464E5F", "gray-800": "#1B283F", "gray-900": "#212121" } }, "font-family": "Poppins" };</script>
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{ URL::asset('assets/plugins/global/plugins.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/js/scripts.bundle.js')}}" type="text/javascript"></script>
		<script src="{{ URL::asset('assets/vendors/general/jquery_validation/dist/jquery.validate.min.js')}}" type="text/javascript"></script>
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{ URL::asset('assets/js/pages/custom/login/login.js?v=1.0.0')}}" type="text/javascript"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>