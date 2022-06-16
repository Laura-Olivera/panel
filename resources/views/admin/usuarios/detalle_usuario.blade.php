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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Detalle usuario {{ $usuario->clave_empleado }}</h5>
			<!--end::Title-->
		</div>
        <div class="d-flex align-items-center">
            <!--begin::Actions-->
            <button onClick="window.history.go(-1);" class="btn btn-primary font-weight-bolder">Regresar</button>
            <!--end::Actions-->
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
                <div class="d-flex">
                    <!--begin: Info-->
                    <div class="flex-grow-1">
                        <!--begin::Title-->
                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                            <!--begin::User-->
                            <div class="mr-3">
                                <div class="d-flex align-items-center mr-3">
                                    <!--begin::Name-->
                                    <h6 class="d-flex align-items-center text-dark font-size-h5 font-weight-bold mr-3">{{ $usuario->nombre }} {{ $usuario->primer_apellido }}</h6>
                                    <!--end::Name-->
                                    <span class="label label-light-primary label-inline font-weight-bolder mr-1">{{$perfil->name}}</span>                                    
                                </div>
                                <!--begin::Contacts-->
                                <div class="d-flex flex-wrap my-2">
                                    <h6 class="text-muted font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-notification.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z" fill="#000000" />
                                                <circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>{{ $usuario->email }}</h6>
                                </div>
                                <!--end::Contacts-->
                            </div>
                            <!--begin::User-->
                        </div>
                        <!--end::Title-->
                    </div>
                    <!--end::Info-->
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-12">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label">Actividad reciente</h3>
                        </div>
                        <div class="card-toolbar">
                            <span class="label font-weight-bold label label-inline label-light-danger">Ahora</span>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div class="mb-6">
                            <!--begin::Content-->
                            <div class="d-flex align-items-center flex-grow-1">
                                <!--begin::Section-->
                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                    <!--begin::Info-->
                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                        <!--begin::Title-->
                                        <span class="text-dark-50 font-weight-bold font-size-lg mb-1"></span>
                                        <!--end::Title-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Label-->
                                    <span class="label label-lg label-light-dark label-inline font-weight-bold py-4"></span>
                                    <!--end::Label-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Content-->
                        </div>
                    </div>
                </div>
                <!--end::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label">Tareas asignadas</h3>
                        </div>
                    </div>                    
                    <div class="card-body pt-2">
                        <div class="card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                            <span class="nav-icon"><i class="far fa-clock"></i></span>
                                            <span class="nav-text">Pendientes</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
                                            <span class="nav-icon"><i class="fas fa-check"></i></span>
                                            <span class="nav-text">Terminadas</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><br>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="kt_tab_pane_1_3" role="tabpanel" aria-labelledby="kt_tab_pane_1_3">
                                <div class="col-xl-12">
                                    <!--begin::List Widget 10-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Item-->                                                
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
                                                                    <span class="text-dark-75 font-weight-bold font-size-lg mb-1"></span>
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
                                            {{-- end::item --}}
                                        </div>
                                        {{-- {{ $tPendientes->links() }} --}}
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end: Card-->
                                    <!--end: List Widget 10-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="kt_tab_pane_2_3" role="tabpanel" aria-labelledby="kt_tab_pane_2_3">
                                <div class="col-xl-12">
                                    <!--begin::List Widget 10-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Item-->                                                   
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
                                                                    <a href="javascript:void(0);" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1"></a>
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
                                            {{-- end::item --}}
                                        </div>
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end: Card-->
                                    <!--end: List Widget 10-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label">Información</h3>
                        </div>
                    </div>                    
                    <div class="card-body pt-2">
                        <div class="card-header-tabs-line">
                            <div class="card-toolbar">
                                <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#info_tab_pane_1_3">
                                            <span class="nav-icon"><i class="fas fa-user"></i></span>
                                            <span class="nav-text">Personal</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#info_tab_pane_2_3">
                                            <span class="nav-icon"><i class="fas fa-users"></i></span>
                                            <span class="nav-text">Contacto</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div><br>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="info_tab_pane_1_3" role="tabpanel" aria-labelledby="info_tab_pane_1_3">
                                <div class="col-xl-12">
                                    <!--begin::List Widget 10-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Item-->
                                            <div class="card-body py-4">
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">Nombre:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $usuario->nombre }} {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">Correo electrónico:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $usuario->email }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">Telefono:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext font-weight-bolder">{{ $usuario->telefono }}</span>
                                                    </div>
                                                </div>
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">Dirección:</label>
                                                    <div class="col-8">
                                                        <span class="form-control-plaintext">
                                                        <span class="font-weight-bolder"></span>
                                                    </div>
                                                </div>                        
                                            </div>
                                            {{-- end::item --}}
                                        </div>
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end: Card-->
                                    <!--end: List Widget 10-->
                                </div>
                            </div>
                            <div class="tab-pane fade" id="info_tab_pane_2_3" role="tabpanel" aria-labelledby="info_tab_pane_2_3">
                                <div class="col-xl-12">
                                    <!--begin::List Widget 10-->
                                    <div class="card card-custom card-stretch gutter-b">
                                        <!--begin::Body-->
                                        <div class="card-body pt-0">
                                            <!--begin::Item-->
                                            <div class="card-body py-4">
                                                <div class="form-group row my-2">
                                                    <span class="form-control-plaintext font-weight-bolder">No se encontraron registros.</span>
                                                </div>                      
                                            </div>
                                            <div class="card-body py-4">
                                                <div class="form-group row my-2">
                                                    <label class="col-4 col-form-label">Nombre:</label>
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
                                                        <span class="form-control-plaintext">
                                                        <span class="font-weight-bolder"></span>
                                                    </div>
                                                </div>                        
                                            </div>
                                            {{-- end::item --}}
                                        </div>
                                        <!--end: Card Body-->
                                    </div>
                                    <!--end: Card-->
                                    <!--end: List Widget 10-->
                                </div>
                            </div>
                        </div>
                    </div>
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