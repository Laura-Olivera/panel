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
            <button onClick="window.history.go(-1)" class="btn btn-primary font-weight-bolder">Regresar</button>
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
                                    <a href="#" class="d-flex align-items-center text-dark text-hover-primary font-size-h5 font-weight-bold mr-3">{{ $usuario->nombre }} {{ $usuario->primer_apellido }}</a>
                                    <!--end::Name-->
                                    <span class="label label-light-success label-inline font-weight-bolder mr-1">{{$perfil->name}}</span>                                    
                                </div>
                                <!--begin::Contacts-->
                                <div class="d-flex flex-wrap my-2">
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold mr-lg-8 mr-5 mb-lg-0 mb-2">
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
                                    </span>{{ $usuario->email }}</a>
                                    <a href="#" class="text-muted text-hover-primary font-weight-bold">
                                    <span class="svg-icon svg-icon-md svg-icon-gray-500 mr-1">
                                        <!--begin::Svg Icon | path:assets/media/svg/icons/Map/Marker2.svg-->
                                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24" />
                                                <path d="M9.82829464,16.6565893 C7.02541569,15.7427556 5,13.1079084 5,10 C5,6.13400675 8.13400675,3 12,3 C15.8659932,3 19,6.13400675 19,10 C19,13.1079084 16.9745843,15.7427556 14.1717054,16.6565893 L12,21 L9.82829464,16.6565893 Z M12,12 C13.1045695,12 14,11.1045695 14,10 C14,8.8954305 13.1045695,8 12,8 C10.8954305,8 10,8.8954305 10,10 C10,11.1045695 10.8954305,12 12,12 Z" fill="#000000" />
                                            </g>
                                        </svg>
                                        <!--end::Svg Icon-->
                                    </span>{{ $direccion[2] }}</a>
                                </div>
                                <!--end::Contacts-->
                            </div>
                            <!--begin::User-->
                        </div>
                        <!--end::Title-->
                        <!--begin::Content-->
                        <div class="d-flex align-items-center flex-wrap justify-content-between">
                            <!--begin::Description-->
                            <div class="flex-grow-1 font-weight-bold text-dark-50 py-2 py-lg-2 mr-5">I distinguish three main text objectives could be merely to inform people.
                            <br />A second could be persuade people. You want people to bay objective.</div>
                            <!--end::Description-->
                            <!--begin::Progress-->
                            <div class="d-flex mt-4 mt-sm-0">
                                <span class="font-weight-bold mr-4">Progress</span>
                                <div class="progress progress-xs mt-2 mb-2 flex-shrink-0 w-150px w-xl-500px">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 63%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span class="font-weight-bolder text-dark ml-4">78%</span>
                            </div>
                            <!--end::Progress-->
                        </div>
                        <!--end::Content-->
                    </div>
                    <!--end::Info-->
                </div>
            </div>
        </div>
        <!--end::Card-->
        <!--begin::Row-->
        <div class="row">
            <div class="col-xl-4">
                <!--begin::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header h-auto py-3 border-0">
                        <div class="card-title">
                            <h3 class="card-label text-danger">Actividad reciente</h3>
                        </div>
                        <div class="card-toolbar">
                            <span class="label font-weight-bold label label-inline label-light-danger">Ahora</span>
                        </div>
                    </div>
                    <div class="card-body pt-2">
                        @foreach ($ultimaAccion as $accion)
                            <p class="text-dark-50">{{ $accion->accion }}</p>
                        @endforeach
                    </div>
                </div>
                <!--end::Card-->
                <div class="card card-custom gutter-b">
                    <div class="card-header card-header-tabs-line">
                        <div class="card-toolbar">
                            <ul class="nav nav-tabs nav-bold nav-tabs-line">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#kt_tab_pane_1_3">
                                        <span class="nav-icon"><i class="fas fa-tasks"></i></span>
                                        <span class="nav-text">Pendientes</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#kt_tab_pane_2_3">
                                        <span class="nav-icon"><i class="fas fa-info-circle"></i></span>
                                        <span class="nav-text">Terminadas</span>
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
                                            @foreach ($tPendientes as $tarea)
                                                @foreach ($empleadoTarea as $asignado)
                                                    @if ($asignado->tarea_id == $tarea->id)                                                  
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Bullet-->
                                                            <span class="bullet bullet-bar bg-{{ getLabelStatusTask($tarea->estatus) }} align-self-stretch"></span>
                                                            <!--end::Bullet-->
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4"></label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="javascript:void(0);" onclick="edit_tarea_modal({{ $tarea->id }});" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">{{ $tarea->tarea }}</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">{{ $tarea->descripcion }}</span>
                                                                    <span class="text-muted font-weight-bold">{{ $tarea->created_at }}</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-{{ getLabelStatusTask($tarea->estatus) }} label-inline font-weight-bold py-4">{{ statusToString($tarea->estatus) }}</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>                                                    
                                                    @endif
                                                @endforeach
                                            @endforeach
                                            {{-- end::item --}}
                                        </div>
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
                                            @foreach ($tFinalizadas as $tarea)
                                                @foreach ($empleadoTarea as $asignado)
                                                    @if ($asignado->tarea_id == $tarea->id)                                                    
                                                    <div class="mb-6">
                                                        <!--begin::Content-->
                                                        <div class="d-flex align-items-center flex-grow-1">
                                                            <!--begin::Bullet-->
                                                            <span class="bullet bullet-bar bg-{{ getLabelStatusTask($tarea->estatus) }} align-self-stretch"></span>
                                                            <!--end::Bullet-->
                                                            <!--begin::Checkbox-->
                                                            <label class="checkbox checkbox-lg checkbox-light-success checkbox-inline flex-shrink-0 m-0 mx-4"></label>
                                                            <!--end::Checkbox-->
                                                            <!--begin::Section-->
                                                            <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                <!--begin::Info-->
                                                                <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                    <!--begin::Title-->
                                                                    <a href="javascript:void(0);" onclick="edit_tarea_modal({{ $tarea->id }});" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">{{ $tarea->tarea }}</a>
                                                                    <!--end::Title-->
                                                                    <!--begin::Data-->
                                                                    <span class="text-muted font-weight-bold">{{ $tarea->descripcion }}</span>
                                                                    <span class="text-muted font-weight-bold">{{ $tarea->created_at }}</span>
                                                                    <!--end::Data-->
                                                                </div>
                                                                <!--end::Info-->
                                                                <!--begin::Label-->
                                                                <span class="label label-lg label-light-{{ getLabelStatusTask($tarea->estatus) }} label-inline font-weight-bold py-4">{{ statusToString($tarea->estatus) }}</span>
                                                                <!--end::Label-->
                                                            </div>
                                                            <!--end::Section-->
                                                        </div>
                                                        <!--end::Content-->
                                                    </div>                                                    
                                                    @endif
                                                @endforeach
                                            @endforeach
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
                <div class="card card-custom">
                    <!--begin::Header-->
                    <div class="card-header h-auto py-4">
                        <div class="card-title">
                            <h3 class="card-label">
                            <span class="d-block text-muted pt-2 font-size-sm">Informacion de contacto</span></h3>
                        </div>
                    </div>
                    <!--end::Header-->
                    <!--begin::Body-->
                    <div class="card-body py-4">
                        <div class="form-group row my-2">
                            <label class="col-4 col-form-label">Nombre:</label>
                            <div class="col-8">
                                <span class="form-control-plaintext font-weight-bolder">{{ $usuario->nombre }} {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}</span>
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
                                <span class="font-weight-bolder">{{ $direccion[0] }}. {{ $direccion[1] }}. {{ $direccion[2] }}. {{ $direccion[3] }}</span>
                            </div>
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