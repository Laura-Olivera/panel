@extends('layouts.app')

@section('styles')
<link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Details-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Mi Perfil</h5>
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
        <!--begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-body">
                <!--begin::Details-->
                <div class="d-flex mb-9">
                    <!--begin::Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex justify-content-between flex-wrap mt-1">
                            <div class="d-flex mr-3">
                                <a href="#" class="text-dark-75 text-hover-primary font-size-h5 font-weight-bold mr-3">{{ getCompleteName() }}</a>
                                <a href="#">
                                    <i class="flaticon2-correct text-success font-size-h5"></i>
                                </a>
                            </div>
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class="d-flex flex-wrap justify-content-between mt-1">
                            <div class="d-flex flex-column flex-grow-1 pr-8">
                                <div class="d-flex flex-wrap mb-4">
                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <i class="flaticon2-new-email mr-2 font-size-lg"></i></a>
                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <i class="flaticon2-calendar-3 mr-2 font-size-lg"></i></a>
                                    <a href="#" class="text-dark-50 text-hover-primary font-weight-bold">
                                    <i class="flaticon2-placeholder mr-2 font-size-lg"></i></a>
                                </div>
                            </div>
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
                <!--end::Details-->
                <div class="separator separator-solid"></div>
                <!--begin::Items-->
                <div class="d-flex align-items-center flex-wrap mt-8">
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-piggy-bank display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Earnings</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span></span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-confetti display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Expenses</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span></span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-pie-chart display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column text-dark-75">
                            <span class="font-weight-bolder font-size-sm">Net</span>
                            <span class="font-weight-bolder font-size-h5">
                            <span class="text-dark-50 font-weight-bold"></span></span>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-file-2 display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column flex-lg-fill">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">73 Tasks</span>
                            <a href="#" class="text-primary font-weight-bolder"></a>
                        </div>
                    </div>
                    <!--end::Item-->
                    <!--begin::Item-->
                    <div class="d-flex align-items-center flex-lg-fill mr-5 mb-2">
                        <span class="mr-4">
                            <i class="flaticon-chat-1 display-4 text-muted font-weight-bold"></i>
                        </span>
                        <div class="d-flex flex-column">
                            <span class="text-dark-75 font-weight-bolder font-size-sm">648 Comments</span>
                            <a href="#" class="text-primary font-weight-bolder"></a>
                        </div>
                    </div>
                    <!--end::Item-->
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!-- begin::card-tab -->
        <div class="card card-custom gutter-b">
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                <span class="nav-icon"><i class="fas fa-tasks"></i></span>
                                <span class="nav-text">Tareas</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
                                <span class="nav-icon"><i class="fas fa-info-circle"></i></span>
                                <span class="nav-text">Informacion personal</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_3_3">
                                <span class="nav-icon"><i class="fas fa-user-shield"></i></span>
                                <span class="nav-text">Información de contacto</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                        <div class="col-xl-12">
							<!--begin::List Widget 10-->
							<div class="card card-custom card-stretch gutter-b">
								<!--begin::Body-->
								<div class="card-body pt-0">
									<!--begin::Item-->
                                    <div class="alert alert-success mb-5 p-5" role="alert">
                                        <h4 class="alert-heading">¡Has terminado!</h4>
                                        <p>No hay tareas asignadas.</p>
                                    </div>
                                            <div class="mb-6">
                                                <!--begin::Content-->
                                                <div class="d-flex align-items-center flex-grow-1">
                                                    <!--begin::Bullet-->
                                                    <span class="bullet bullet-bar bg-success align-self-stretch"></span>
                                                    <!--end::Bullet-->
                                                    <!--begin::Checkbox-->
                                                    <label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4"></label>
                                                    <!--end::Checkbox-->
                                                    <!--begin::Section-->
                                                    <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                            <!--begin::Title-->
                                                            <a href="javascript:void(0);"  class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1"></a>
                                                            <!--end::Title-->
                                                            <!--begin::Data-->
                                                            <span class="text-muted font-weight-bold"></span>
                                                            <span class="text-muted font-weight-bold"></span>
                                                            <!--end::Data-->
                                                        </div>
                                                        <!--end::Info-->
                                                        <!--begin::Label-->
                                                        <span class="label label-lg label-light-success label-inline font-weight-bold py-4"></span>
                                                        <!--end::Label-->
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Content-->
                                            </div>
                                    <!-- end::item -->
								</div>
								<!--end: Card Body-->
							</div>
							<!--end: Card-->
							<!--end: List Widget 10-->
						</div>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header h-auto py-4">
                                <div class="card-title">
                                    <h3 class="card-label">
                                    <span class="d-block text-muted pt-2 font-size-md"></span></h3>
                                </div>
                                <div class="card-toolbar">
                                    <!--begin::Button-->
			                		<a href="javascript:void(0);" onclick="edit_password();" class="btn btn-success btn-sm">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Cambiar contraseña</a>
                                        <!--end::Button-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-4">
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Nombre:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder">{{ getCompleteName() }}</span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Correo electrónico:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder"></span>
                                    </div>
                                </div>
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Telefono:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder"></span>
                                    </div>
                                </div>         
                                <div class="form-group row my-2">
                                    <label class="col-4 col-form-label">Dirección:</label>
                                    <div class="col-8">
                                        <span class="form-control-plaintext font-weight-bolder"></span>
                                    </div>
                                </div>                 
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kt_tab_pane_3_3" role="tabpanel" aria-labelledby="kt_tab_pane_3_3">
                        <div class="card card-custom">
                            <!--begin::Header-->
                            <div class="card-header h-auto py-4">
                                <div class="card-title">
                                    <h3 class="card-label">
                                    <span class="d-block text-muted pt-2 font-size-md">Informacion de contacto</span></h3>
                                </div>
                                <div class="card-toolbar"  id="contacto-card" name="contacto-card">
                                    <!--begin::Button-->
		                			<a href="javascript:void(0);" class="btn btn-success btn-sm">
                                        <span class="svg-icon svg-icon-md">
                                            <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
                                        </span>Nuevo contacto</a>
                                        <!--end::Button-->
                                </div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Body-->
                            <div class="card-body py-4">
                                <table id="contacto-table" name="contacto-table" class="table table-striped- table-bordered table-hover table-checkable">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Telefono</th>
                                            <th>Dirección</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td><a href="javascript:void(0);" class="btn btn-elevate kt-font-brand" style="margin-right: 3px;"><i class="icon-xl far fa-edit"></i></a>
                                                <a href="javascript:void(0);" class="btn btn-elevate kt-font-brand eliminar" style="margin-right: 3px;"><i class="icon-xl far fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--end::Body-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/users/perfil.js?v=1.0.0') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/admin/tareas.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection