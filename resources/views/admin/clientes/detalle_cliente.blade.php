@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Details-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Detalle Cliente {{ $cliente->clave_cliente }}</h5>
			<!--end::Title-->
		</div>
		<!--end::Details-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Row-->
		<div class="row">
			<div class="col-xl-4">
				<!--begin::Card-->
				<div class="card card-custom">
					<!--begin::Header-->
					<div class="card-header h-auto py-4">	
                        <div class="d-flex flex-center flex-column">
                            <!--begin::Name-->
							<span class="fs-3 text-gray-800 fw-bolder mb-1">{{ $cliente->nombre_completo }}</span>
							<!--end::Name-->
							<!--begin::Position-->
							<div class="fs-5 fw-bold text-muted mb-6">Tipo cliente</div>
							<!--end::Position-->
                            <!--begin::Info-->
						    <div class="d-flex flex-wrap flex-center">
							    <!--begin::Stats-->
							    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
							    	<div class="fs-4 fw-bolder text-gray-700">
							    		<span class="w-75px">6,900</span>
                                        <i class="fas fa-shopping-cart icon-md text-dark"></i>
							    	</div>
							    	<div class="fw-bold text-muted">Compras</div>
							    </div>
							    <!--end::Stats-->
							    <!--begin::Stats-->
							    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mx-4 mb-3">
							    	<div class="fs-4 fw-bolder text-gray-700">
							    		<span class="w-50px">130</span>
							    		<!--begin::Svg Icon | path: icons/duotune/arrows/arr065.svg-->
							    		<span class="svg-icon svg-icon-3 svg-icon-danger">
                                            <i class="fas fa-clipboard-list icon-md text-dark"></i>
							    		</span>
							    		<!--end::Svg Icon-->
							    	</div>
							    	<div class="fw-bold text-muted">Wishlist</div>
							    </div>
							    <!--end::Stats-->
							    <!--begin::Stats-->
							    <div class="border border-gray-300 border-dashed rounded py-3 px-3 mb-3">
							    	<div class="fs-4 fw-bolder text-gray-700">
							    		<span class="w-50px">500</span>
                                        <i class="fas fa-clock icon-md text-dark"></i>
							    	</div>
							    	<div class="fw-bold text-muted">Pendientes</div>
							    </div>
							    <!--end::Stats-->
						    </div>
						    <!--end::Info-->
                        </div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body py-4">
						<div class="form-group row my-2">
							<label class="col-4 col-form-label">Cliente ID:</label>
							<div class="col-8">
								<span class="form-control-plaintext font-weight-bolder">{{ $cliente->clave_cliente }}</span>
							</div>
						</div>
						<div class="form-group row my-2">
							<label class="col-4 col-form-label">Correo electrónico:</label>
							<div class="col-8">
								<span class="form-control-plaintext font-weight-bolder">{{ $cliente->email }}</span>
							</div>
						</div>
						<div class="form-group row my-2">
							<label class="col-4 col-form-label">Telefono:</label>
							<div class="col-8">
								<span class="form-control-plaintext font-weight-bolder">{{ $cliente->telefono }}</span>
							</div>
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Card-->
			</div>
			<div class="col-xl-8">
				<!--begin::Card-->
				<div class="card card-custom gutter-b">
					<!--begin::Header-->
					<div class="card-header card-header-tabs-line">
						<div class="card-toolbar">
							<ul class="nav nav-tabs nav-tabs-space-lg nav-tabs-line nav-bold nav-tabs-line-3x" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="tab" href="#kt_apps_contacts_view_tab_1">
										<span class="nav-icon mr-2">
											<span class="svg-icon mr-3">
												<!--begin::Svg Icon | path:assets/media/svg/icons/General/Notification2.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M13.2070325,4 C13.0721672,4.47683179 13,4.97998812 13,5.5 C13,8.53756612 15.4624339,11 18.5,11 C19.0200119,11 19.5231682,10.9278328 20,10.7929675 L20,17 C20,18.6568542 18.6568542,20 17,20 L7,20 C5.34314575,20 4,18.6568542 4,17 L4,7 C4,5.34314575 5.34314575,4 7,4 L13.2070325,4 Z" fill="#000000" />
														<circle fill="#000000" opacity="0.3" cx="18.5" cy="5.5" r="2.5" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</span>
										<span class="nav-text">Ordenes</span>
									</a>
								</li>
								<li class="nav-item mr-3">
									<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_2">
										<span class="nav-icon mr-2">
											<span class="svg-icon mr-3">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Chat-check.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M4.875,20.75 C4.63541667,20.75 4.39583333,20.6541667 4.20416667,20.4625 L2.2875,18.5458333 C1.90416667,18.1625 1.90416667,17.5875 2.2875,17.2041667 C2.67083333,16.8208333 3.29375,16.8208333 3.62916667,17.2041667 L4.875,18.45 L8.0375,15.2875 C8.42083333,14.9041667 8.99583333,14.9041667 9.37916667,15.2875 C9.7625,15.6708333 9.7625,16.2458333 9.37916667,16.6291667 L5.54583333,20.4625 C5.35416667,20.6541667 5.11458333,20.75 4.875,20.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
														<path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</span>
										<span class="nav-text">Wishlist</span>
									</a>
								</li>
								<li class="nav-item mr-3">
									<a class="nav-link" data-toggle="tab" href="#kt_apps_contacts_view_tab_3">
										<span class="nav-icon mr-2">
											<span class="svg-icon mr-3">
												<!--begin::Svg Icon | path:assets/media/svg/icons/Devices/Display1.svg-->
												<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
													<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
														<rect x="0" y="0" width="24" height="24" />
														<path d="M11,20 L11,17 C11,16.4477153 11.4477153,16 12,16 C12.5522847,16 13,16.4477153 13,17 L13,20 L15.5,20 C15.7761424,20 16,20.2238576 16,20.5 C16,20.7761424 15.7761424,21 15.5,21 L8.5,21 C8.22385763,21 8,20.7761424 8,20.5 C8,20.2238576 8.22385763,20 8.5,20 L11,20 Z" fill="#000000" opacity="0.3" />
														<path d="M3,5 L21,5 C21.5522847,5 22,5.44771525 22,6 L22,16 C22,16.5522847 21.5522847,17 21,17 L3,17 C2.44771525,17 2,16.5522847 2,16 L2,6 C2,5.44771525 2.44771525,5 3,5 Z M4.5,8 C4.22385763,8 4,8.22385763 4,8.5 C4,8.77614237 4.22385763,9 4.5,9 L13.5,9 C13.7761424,9 14,8.77614237 14,8.5 C14,8.22385763 13.7761424,8 13.5,8 L4.5,8 Z M4.5,10 C4.22385763,10 4,10.2238576 4,10.5 C4,10.7761424 4.22385763,11 4.5,11 L7.5,11 C7.77614237,11 8,10.7761424 8,10.5 C8,10.2238576 7.77614237,10 7.5,10 L4.5,10 Z" fill="#000000" />
													</g>
												</svg>
												<!--end::Svg Icon-->
											</span>
										</span>
										<span class="nav-text">algo</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
					<!--end::Header-->
					<!--begin::Body-->
					<div class="card-body px-0">
						<div class="tab-content pt-5">
							<!--begin::Tab Content-->
							<div class="tab-pane active" id="kt_apps_contacts_view_tab_1" role="tabpanel">
								<div class="container">
									<table id="c-table" name="c-table" class="table table-striped- table-bordered table-hover table-checkable">
										<thead>
											<tr>
												<th>No. Orden</th>
												<th>Nombre</th>
												<th>Correo electrónico</th>
												<th>Telefono</th>
												<th>Estatus</th>                            
												<th>Acciones</th>
											</tr>
										</thead>
									</table>
									<!--end: Datatable-->
								</div>
							</div>
							<!--end::Tab Content-->
							<!--begin::Tab Content-->
							<div class="tab-pane" id="kt_apps_contacts_view_tab_2" role="tabpanel">
								<form class="form">
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<h3 class="font-size-h6 mb-5">Contact Info:</h3>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="Nick" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Owner</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="Bold" />
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Customer Name</label>
										<div class="col-lg-9 col-xl-6">
											<input class="form-control form-control-lg form-control-solid" type="text" value="Loop Inc." />
											<span class="form-text text-muted">If you want your invoices addressed to a company. Leave blank to use your full name.</span>
										</div>
									</div>
									<div class="separator separator-dashed my-10"></div>
									<!--begin::Heading-->
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<h3 class="font-size-h6 mb-5">Contact Info:</h3>
										</div>
									</div>
									<!--end::Heading-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Contact Phone</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-phone"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid" value="+35278953712" placeholder="Phone" />
											</div>
											<span class="form-text text-muted">We'll never share your email with anyone else.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid" value="nick.bold@loop.com" placeholder="Email" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Company Site</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<input type="text" class="form-control form-control-lg form-control-solid" placeholder="Username" value="loop" />
												<div class="input-group-append">
													<span class="input-group-text">.com</span>
												</div>
											</div>
										</div>
									</div>
								</form>
							</div>
							<!--end::Tab Content-->
							<!--begin::Tab Content-->
							<div class="tab-pane" id="kt_apps_contacts_view_tab_3" role="tabpanel">
								<form class="form">
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<!--begin::Notice-->
											<div class="alert alert-custom alert-light-danger fade show mb-9" role="alert">
												<div class="alert-icon">
													<i class="flaticon-warning"></i>
												</div>
												<div class="alert-text">Configure user passwords to expire periodically.
												<br />Users will need warning that their passwords are going to expire, or they might inadvertently get locked out of the system!</div>
												<div class="alert-close">
													<button type="button" class="close" data-dismiss="alert" aria-label="Close">
														<span aria-hidden="true">
															<i class="ki ki-close"></i>
														</span>
													</button>
												</div>
											</div>
											<!--end::Notice-->
										</div>
									</div>
									<!--begin::Heading-->
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<h3 class="font-size-h6 mb-5">Account:</h3>
										</div>
									</div>
									<!--end::Heading-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Username</label>
										<div class="col-lg-9 col-xl-6">
											<div class="spinner spinner-sm spinner-success spinner-right">
												<input class="form-control form-control-lg form-control-solid" type="text" value="nick84" />
											</div>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Email Address</label>
										<div class="col-lg-9 col-xl-6">
											<div class="input-group input-group-lg input-group-solid">
												<div class="input-group-prepend">
													<span class="input-group-text">
														<i class="la la-at"></i>
													</span>
												</div>
												<input type="text" class="form-control form-control-lg form-control-solid" value="nick.watson@loop.com" placeholder="Email" />
											</div>
											<span class="form-text text-muted">Email will not be publicly displayed.
											<a href="#">Learn more</a>.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Language</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid">
												<option>Select Language...</option>
												<option value="id">Bahasa Indonesia - Indonesian</option>
												<option value="msa">Bahasa Melayu - Malay</option>
												<option value="ca">Català - Catalan</option>
												<option value="cs">Čeština - Czech</option>
												<option value="da">Dansk - Danish</option>
												<option value="de">Deutsch - German</option>
												<option value="en" selected="selected">English</option>
												<option value="en-gb">English UK - British English</option>
												<option value="es">Español - Spanish</option>
												<option value="eu">Euskara - Basque (beta)</option>
												<option value="fil">Filipino</option>
												<option value="fr">Français - French</option>
												<option value="ga">Gaeilge - Irish (beta)</option>
												<option value="gl">Galego - Galician (beta)</option>
												<option value="hr">Hrvatski - Croatian</option>
												<option value="it">Italiano - Italian</option>
												<option value="hu">Magyar - Hungarian</option>
												<option value="nl">Nederlands - Dutch</option>
												<option value="no">Norsk - Norwegian</option>
												<option value="pl">Polski - Polish</option>
												<option value="pt">Português - Portuguese</option>
												<option value="ro">Română - Romanian</option>
												<option value="sk">Slovenčina - Slovak</option>
												<option value="fi">Suomi - Finnish</option>
												<option value="sv">Svenska - Swedish</option>
												<option value="vi">Tiếng Việt - Vietnamese</option>
												<option value="tr">Türkçe - Turkish</option>
												<option value="el">Ελληνικά - Greek</option>
												<option value="bg">Български език - Bulgarian</option>
												<option value="ru">Русский - Russian</option>
												<option value="sr">Српски - Serbian</option>
												<option value="uk">Українська мова - Ukrainian</option>
												<option value="he">עִבְרִית - Hebrew</option>
												<option value="ur">اردو - Urdu (beta)</option>
												<option value="ar">العربية - Arabic</option>
												<option value="fa">فارسی - Persian</option>
												<option value="mr">मराठी - Marathi</option>
												<option value="hi">हिन्दी - Hindi</option>
												<option value="bn">বাংলা - Bangla</option>
												<option value="gu">ગુજરાતી - Gujarati</option>
												<option value="ta">தமிழ் - Tamil</option>
												<option value="kn">ಕನ್ನಡ - Kannada</option>
												<option value="th">ภาษาไทย - Thai</option>
												<option value="ko">한국어 - Korean</option>
												<option value="ja">日本語 - Japanese</option>
												<option value="zh-cn">简体中文 - Simplified Chinese</option>
												<option value="zh-tw">繁體中文 - Traditional Chinese</option>
											</select>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Time Zone</label>
										<div class="col-lg-9 col-xl-6">
											<select class="form-control form-control-lg form-control-solid">
												<option data-offset="-39600" value="International Date Line West">(GMT-11:00) International Date Line West</option>
												<option data-offset="-39600" value="Midway Island">(GMT-11:00) Midway Island</option>
												<option data-offset="-39600" value="Samoa">(GMT-11:00) Samoa</option>
												<option data-offset="-36000" value="Hawaii">(GMT-10:00) Hawaii</option>
												<option data-offset="-28800" value="Alaska">(GMT-08:00) Alaska</option>
												<option data-offset="-25200" value="Pacific Time (US &amp; Canada)">(GMT-07:00) Pacific Time (US &amp; Canada)</option>
												<option data-offset="-25200" value="Tijuana">(GMT-07:00) Tijuana</option>
												<option data-offset="-25200" value="Arizona">(GMT-07:00) Arizona</option>
												<option data-offset="-21600" value="Mountain Time (US &amp; Canada)">(GMT-06:00) Mountain Time (US &amp; Canada)</option>
												<option data-offset="-21600" value="Chihuahua">(GMT-06:00) Chihuahua</option>
												<option data-offset="-21600" value="Mazatlan">(GMT-06:00) Mazatlan</option>
												<option data-offset="-21600" value="Saskatchewan">(GMT-06:00) Saskatchewan</option>
												<option data-offset="-21600" value="Central America">(GMT-06:00) Central America</option>
												<option data-offset="-18000" value="Central Time (US &amp; Canada)">(GMT-05:00) Central Time (US &amp; Canada)</option>
												<option data-offset="-18000" value="Guadalajara">(GMT-05:00) Guadalajara</option>
												<option data-offset="-18000" value="Mexico City">(GMT-05:00) Mexico City</option>
												<option data-offset="-18000" value="Monterrey">(GMT-05:00) Monterrey</option>
												<option data-offset="-18000" value="Bogota">(GMT-05:00) Bogota</option>
												<option data-offset="-18000" value="Lima">(GMT-05:00) Lima</option>
												<option data-offset="-18000" value="Quito">(GMT-05:00) Quito</option>
												<option data-offset="-14400" value="Eastern Time (US &amp; Canada)">(GMT-04:00) Eastern Time (US &amp; Canada)</option>
												<option data-offset="-14400" value="Indiana (East)">(GMT-04:00) Indiana (East)</option>
												<option data-offset="-14400" value="Caracas">(GMT-04:00) Caracas</option>
												<option data-offset="-14400" value="La Paz">(GMT-04:00) La Paz</option>
												<option data-offset="-14400" value="Georgetown">(GMT-04:00) Georgetown</option>
												<option data-offset="-10800" value="Atlantic Time (Canada)">(GMT-03:00) Atlantic Time (Canada)</option>
												<option data-offset="-10800" value="Santiago">(GMT-03:00) Santiago</option>
												<option data-offset="-10800" value="Brasilia">(GMT-03:00) Brasilia</option>
												<option data-offset="-10800" value="Buenos Aires">(GMT-03:00) Buenos Aires</option>
												<option data-offset="-9000" value="Newfoundland">(GMT-02:30) Newfoundland</option>
												<option data-offset="-7200" value="Greenland">(GMT-02:00) Greenland</option>
												<option data-offset="-7200" value="Mid-Atlantic">(GMT-02:00) Mid-Atlantic</option>
												<option data-offset="-3600" value="Cape Verde Is.">(GMT-01:00) Cape Verde Is.</option>
												<option data-offset="0" value="Azores">(GMT) Azores</option>
												<option data-offset="0" value="Monrovia">(GMT) Monrovia</option>
												<option data-offset="0" value="UTC">(GMT) UTC</option>
												<option data-offset="3600" value="Dublin">(GMT+01:00) Dublin</option>
												<option data-offset="3600" value="Edinburgh">(GMT+01:00) Edinburgh</option>
												<option data-offset="3600" value="Lisbon">(GMT+01:00) Lisbon</option>
												<option data-offset="3600" value="London">(GMT+01:00) London</option>
												<option data-offset="3600" value="Casablanca">(GMT+01:00) Casablanca</option>
												<option data-offset="3600" value="West Central Africa">(GMT+01:00) West Central Africa</option>
												<option data-offset="7200" value="Belgrade">(GMT+02:00) Belgrade</option>
												<option data-offset="7200" value="Bratislava">(GMT+02:00) Bratislava</option>
												<option data-offset="7200" value="Budapest">(GMT+02:00) Budapest</option>
												<option data-offset="7200" value="Ljubljana">(GMT+02:00) Ljubljana</option>
												<option data-offset="7200" value="Prague">(GMT+02:00) Prague</option>
												<option data-offset="7200" value="Sarajevo">(GMT+02:00) Sarajevo</option>
												<option data-offset="7200" value="Skopje">(GMT+02:00) Skopje</option>
												<option data-offset="7200" value="Warsaw">(GMT+02:00) Warsaw</option>
												<option data-offset="7200" value="Zagreb">(GMT+02:00) Zagreb</option>
												<option data-offset="7200" value="Brussels">(GMT+02:00) Brussels</option>
												<option data-offset="7200" value="Copenhagen">(GMT+02:00) Copenhagen</option>
												<option data-offset="7200" value="Madrid">(GMT+02:00) Madrid</option>
												<option data-offset="7200" value="Paris">(GMT+02:00) Paris</option>
												<option data-offset="7200" value="Amsterdam">(GMT+02:00) Amsterdam</option>
												<option data-offset="7200" value="Berlin">(GMT+02:00) Berlin</option>
												<option data-offset="7200" value="Bern">(GMT+02:00) Bern</option>
												<option data-offset="7200" value="Rome">(GMT+02:00) Rome</option>
												<option data-offset="7200" value="Stockholm">(GMT+02:00) Stockholm</option>
												<option data-offset="7200" value="Vienna">(GMT+02:00) Vienna</option>
												<option data-offset="7200" value="Cairo">(GMT+02:00) Cairo</option>
												<option data-offset="7200" value="Harare">(GMT+02:00) Harare</option>
												<option data-offset="7200" value="Pretoria">(GMT+02:00) Pretoria</option>
												<option data-offset="10800" value="Bucharest">(GMT+03:00) Bucharest</option>
												<option data-offset="10800" value="Helsinki">(GMT+03:00) Helsinki</option>
												<option data-offset="10800" value="Kiev">(GMT+03:00) Kiev</option>
												<option data-offset="10800" value="Kyiv">(GMT+03:00) Kyiv</option>
												<option data-offset="10800" value="Riga">(GMT+03:00) Riga</option>
												<option data-offset="10800" value="Sofia">(GMT+03:00) Sofia</option>
												<option data-offset="10800" value="Tallinn">(GMT+03:00) Tallinn</option>
												<option data-offset="10800" value="Vilnius">(GMT+03:00) Vilnius</option>
												<option data-offset="10800" value="Athens">(GMT+03:00) Athens</option>
												<option data-offset="10800" value="Istanbul">(GMT+03:00) Istanbul</option>
												<option data-offset="10800" value="Minsk">(GMT+03:00) Minsk</option>
												<option data-offset="10800" value="Jerusalem">(GMT+03:00) Jerusalem</option>
												<option data-offset="10800" value="Moscow">(GMT+03:00) Moscow</option>
												<option data-offset="10800" value="St. Petersburg">(GMT+03:00) St. Petersburg</option>
												<option data-offset="10800" value="Volgograd">(GMT+03:00) Volgograd</option>
												<option data-offset="10800" value="Kuwait">(GMT+03:00) Kuwait</option>
												<option data-offset="10800" value="Riyadh">(GMT+03:00) Riyadh</option>
												<option data-offset="10800" value="Nairobi">(GMT+03:00) Nairobi</option>
												<option data-offset="10800" value="Baghdad">(GMT+03:00) Baghdad</option>
												<option data-offset="14400" value="Abu Dhabi">(GMT+04:00) Abu Dhabi</option>
												<option data-offset="14400" value="Muscat">(GMT+04:00) Muscat</option>
												<option data-offset="14400" value="Baku">(GMT+04:00) Baku</option>
												<option data-offset="14400" value="Tbilisi">(GMT+04:00) Tbilisi</option>
												<option data-offset="14400" value="Yerevan">(GMT+04:00) Yerevan</option>
												<option data-offset="16200" value="Tehran">(GMT+04:30) Tehran</option>
												<option data-offset="16200" value="Kabul">(GMT+04:30) Kabul</option>
												<option data-offset="18000" value="Ekaterinburg">(GMT+05:00) Ekaterinburg</option>
												<option data-offset="18000" value="Islamabad">(GMT+05:00) Islamabad</option>
												<option data-offset="18000" value="Karachi">(GMT+05:00) Karachi</option>
												<option data-offset="18000" value="Tashkent">(GMT+05:00) Tashkent</option>
												<option data-offset="19800" value="Chennai">(GMT+05:30) Chennai</option>
												<option data-offset="19800" value="Kolkata">(GMT+05:30) Kolkata</option>
												<option data-offset="19800" value="Mumbai">(GMT+05:30) Mumbai</option>
												<option data-offset="19800" value="New Delhi">(GMT+05:30) New Delhi</option>
												<option data-offset="19800" value="Sri Jayawardenepura">(GMT+05:30) Sri Jayawardenepura</option>
												<option data-offset="20700" value="Kathmandu">(GMT+05:45) Kathmandu</option>
												<option data-offset="21600" value="Astana">(GMT+06:00) Astana</option>
												<option data-offset="21600" value="Dhaka">(GMT+06:00) Dhaka</option>
												<option data-offset="21600" value="Almaty">(GMT+06:00) Almaty</option>
												<option data-offset="21600" value="Urumqi">(GMT+06:00) Urumqi</option>
												<option data-offset="23400" value="Rangoon">(GMT+06:30) Rangoon</option>
												<option data-offset="25200" value="Novosibirsk">(GMT+07:00) Novosibirsk</option>
												<option data-offset="25200" value="Bangkok">(GMT+07:00) Bangkok</option>
												<option data-offset="25200" value="Hanoi">(GMT+07:00) Hanoi</option>
												<option data-offset="25200" value="Jakarta">(GMT+07:00) Jakarta</option>
												<option data-offset="25200" value="Krasnoyarsk">(GMT+07:00) Krasnoyarsk</option>
												<option data-offset="28800" value="Beijing">(GMT+08:00) Beijing</option>
												<option data-offset="28800" value="Chongqing">(GMT+08:00) Chongqing</option>
												<option data-offset="28800" value="Hong Kong">(GMT+08:00) Hong Kong</option>
												<option data-offset="28800" value="Kuala Lumpur">(GMT+08:00) Kuala Lumpur</option>
												<option data-offset="28800" value="Singapore">(GMT+08:00) Singapore</option>
												<option data-offset="28800" value="Taipei">(GMT+08:00) Taipei</option>
												<option data-offset="28800" value="Perth">(GMT+08:00) Perth</option>
												<option data-offset="28800" value="Irkutsk">(GMT+08:00) Irkutsk</option>
												<option data-offset="28800" value="Ulaan Bataar">(GMT+08:00) Ulaan Bataar</option>
												<option data-offset="32400" value="Seoul">(GMT+09:00) Seoul</option>
												<option data-offset="32400" value="Osaka">(GMT+09:00) Osaka</option>
												<option data-offset="32400" value="Sapporo">(GMT+09:00) Sapporo</option>
												<option data-offset="32400" value="Tokyo">(GMT+09:00) Tokyo</option>
												<option data-offset="32400" value="Yakutsk">(GMT+09:00) Yakutsk</option>
												<option data-offset="34200" value="Darwin">(GMT+09:30) Darwin</option>
												<option data-offset="34200" value="Adelaide">(GMT+09:30) Adelaide</option>
												<option data-offset="36000" value="Canberra">(GMT+10:00) Canberra</option>
												<option data-offset="36000" value="Melbourne">(GMT+10:00) Melbourne</option>
												<option data-offset="36000" value="Sydney">(GMT+10:00) Sydney</option>
												<option data-offset="36000" value="Brisbane">(GMT+10:00) Brisbane</option>
												<option data-offset="36000" value="Hobart">(GMT+10:00) Hobart</option>
												<option data-offset="36000" value="Vladivostok">(GMT+10:00) Vladivostok</option>
												<option data-offset="36000" value="Guam">(GMT+10:00) Guam</option>
												<option data-offset="36000" value="Port Moresby">(GMT+10:00) Port Moresby</option>
												<option data-offset="36000" value="Solomon Is.">(GMT+10:00) Solomon Is.</option>
												<option data-offset="39600" value="Magadan">(GMT+11:00) Magadan</option>
												<option data-offset="39600" value="New Caledonia">(GMT+11:00) New Caledonia</option>
												<option data-offset="43200" value="Fiji">(GMT+12:00) Fiji</option>
												<option data-offset="43200" value="Kamchatka">(GMT+12:00) Kamchatka</option>
												<option data-offset="43200" value="Marshall Is.">(GMT+12:00) Marshall Is.</option>
												<option data-offset="43200" value="Auckland">(GMT+12:00) Auckland</option>
												<option data-offset="43200" value="Wellington">(GMT+12:00) Wellington</option>
												<option data-offset="46800" value="Nuku'alofa">(GMT+13:00) Nuku'alofa</option>
											</select>
										</div>
									</div>
									<div class="form-group row align-items-center mb-0">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Communication</label>
										<div class="col-lg-9 col-xl-6">
											<div class="checkbox-inline">
												<label class="checkbox">
												<input type="checkbox" />
												<span></span>Email</label>
												<label class="checkbox">
												<input type="checkbox" />
												<span></span>SMS</label>
												<label class="checkbox">
												<input type="checkbox" />
												<span></span>Phone</label>
											</div>
										</div>
									</div>
									<div class="separator separator-dashed my-10"></div>
									<!--begin::Heading-->
									<div class="row">
										<div class="col-lg-9 col-xl-6 offset-xl-3">
											<h3 class="font-size-h6 mb-5">Security:</h3>
										</div>
									</div>
									<!--end::Heading-->
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Login verification</label>
										<div class="col-lg-9 col-xl-6">
											<button type="button" class="btn btn-light-primary font-weight-bold btn-sm">Setup login verification</button>
											<span class="form-text text-muted">After you log in, you will be asked for additional information to confirm your identity and protect your account from being compromised.
											<a href="#">Learn more</a>.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right">Password reset verification</label>
										<div class="col-lg-9 col-xl-6">
											<div class="checkbox-inline">
												<label class="checkbox">
												<input type="checkbox" />Require personal information to reset your password.
												<span></span></label>
											</div>
											<span class="form-text text-muted">For extra security, this requires you to confirm your email or phone number when you reset your password.
											<a href="#">Learn more</a>.</span>
										</div>
									</div>
									<div class="form-group row">
										<label class="col-xl-3 col-lg-3 col-form-label text-right"></label>
										<div class="col-lg-9 col-xl-6">
											<button type="button" class="btn btn-light-danger font-weight-bold btn-sm">Deactivate your account ?</button>
										</div>
									</div>
								</form>
							</div>
							<!--end::Tab Content-->
						</div>
					</div>
					<!--end::Body-->
				</div>
				<!--end::Card-->
			</div>
		</div>
		<!--end::Row-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->

<!--end::Page Scripts-->
@endsection