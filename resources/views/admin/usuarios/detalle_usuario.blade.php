@extends('layouts.app')

@section('styles')

@endsection

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container-fluid">
        <!-- begin::Card-->
        <div class="card card-custom gutter-b">
            <div class="card-header">
                <div class="card-title">
                    <div class="d-flex align-items-center">
                        <div>
                            <h3 class="font-weight-bolder text-dark-75 text-hover-primary">{{ $usuario->fullname }}</h3>
                            <div class="text-muted">{{ $usuario->cve_usuario }}</div>
                        </div>
                    </div>
                </div>
                <div class="card-toolbar">  
                    <a href="javascript:void(0);" onclick="window.history.go(-1);" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">
                        <span class="svg-icon svg-icon-md">
                            <i class="icon-md far fa-id-badge"></i>
                        </span>Regresar
                    </a>
                </div>
            </div>
            <div class="card-header card-header-tabs-line">
                <div class="card-toolbar">
                    <ul class="nav nav-tabs nav-bold nav-tabs-line">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#actividad">
                                <span class="nav-icon"><i class="fas fa-file-invoice"></i></span>
                                <span class="nav-text">Actividad</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info-laboral">
                                <span class="nav-icon"><i class="fas fa-info-circle"></i></span>
                                <span class="nav-text">Información laboral</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#info-personal">
                                <span class="nav-icon"><i class="fas fa-info-circle"></i></span>
                                <span class="nav-text">Información personal</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="actividad" role="tabpanel" aria-labelledby="actividad">
                        <div class="col-xl-12">
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label">Folio: </h4>            
                                    </div>
                                    <div class="card-toolbar">
                                        <a class="btn btn-icon" href="#" title="Editar"><i class="icon-2x far fa-edit text-primary"></i></a>
                                    
                                        <a class="btn btn-icon" href="#" title="Descargar"><i class="icon-2x fas fa-download text-primary"></i></a>
                                        
                                        <a class="btn btn-icon" href="#" title="Imprimir" target="_blank"><i class="icon-2x fas fa-print text-primary"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>Actividad reciente</h3>
                                                    </div>
                                                    <span class="label font-weight-bold label label-inline label-light-danger">Ahora</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <span class="text-dark-50 font-weight-bold font-size-lg mb-1">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia perspiciatis quam repellendus totam repellat placeat, dignissimos aut sunt cum reiciendis exercitationem. Veniam architecto aliquam assumenda ipsa alias eius quod quisquam?</span>
                                                    </div>
                                                    <span class="label label-lg label-light-dark label-inline font-weight-bold py-4">xxxxx</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <span class="text-dark-50 font-weight-bold font-size-lg mb-1">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem, commodi asperiores, obcaecati aperiam nostrum adipisci unde minima maiores totam reiciendis illo iste a animi fugit iure. Reprehenderit nostrum non impedit.</span>
                                                    </div>
                                                    <span class="label label-lg label-light-success label-inline font-weight-bold py-4">xxxxx</span>
                                                </div>
                                            </div>
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <span class="text-dark-50 font-weight-bold font-size-lg mb-1">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Neque error ab aliquam facere, officia eos, officiis laboriosam ipsa assumenda possimus molestiae vel esse, voluptas culpa vitae praesentium incidunt nesciunt? Suscipit.</span>
                                                    </div>
                                                    <span class="label label-lg label-light-danger label-inline font-weight-bold py-4">xxxxx</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>Tareas asignadas</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-6">
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
                                                                                    <span class="bullet bullet-bar bg-warning align-self-stretch"></span>
                                                                                    <!--end::Bullet-->
                                                                                    <!--begin::Checkbox-->
                                                                                    <label class="checkbox checkbox-lg checkbox-light-warning checkbox-inline flex-shrink-0 m-0 mx-4"></label>
                                                                                    <!--end::Checkbox-->
                                                                                    <!--begin::Section-->
                                                                                    <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                                                        <!--begin::Info-->
                                                                                        <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                                                            <!--begin::Title-->
                                                                                            <span class="text-dark-75 font-weight-bold font-size-lg mb-1">xxxxx</span>
                                                                                            <!--end::Title-->
                                                                                            <!--begin::Data-->
                                                                                            <span class="text-muted font-weight-bold">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rerum reiciendis beatae nesciunt commodi consequuntur unde enim omnis cupiditate eligendi, id tenetur dolorem aspernatur, ipsa minus impedit eum eos quia deleniti.</span>
                                                                                            <!--end::Data-->
                                                                                        </div>
                                                                                        <!--end::Info-->
                                                                                        <!--begin::Label-->
                                                                                        <span class="label label-lg label-light-warning label-inline font-weight-bold py-4">pendiente</span>
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
                                                                                            <a href="javascript:void(0);" class="text-dark-75 font-weight-bold text-hover-primary font-size-lg mb-1">xxxx</a>
                                                                                            <!--end::Title-->
                                                                                            <!--begin::Data-->
                                                                                            <span class="text-muted font-weight-bold">xxxx Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus ducimus odio rem excepturi veritatis maiores quaerat possimus, ex dolor optio id, illum consectetur nam doloremque? Atque nam sint labore veritatis.</span>
                                                                                            <!--end::Data-->
                                                                                        </div>
                                                                                        <!--end::Info-->
                                                                                        <!--begin::Label-->
                                                                                        <span class="label label-lg label-light-success label-inline font-weight-bold py-4">Terminado</span>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="info-laboral" role="tabpanel" aria-labelledby="info-laboral">
                        <div class="col-xl-12">
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label">Folio: </h4>            
                                    </div>
                                    <div class="card-toolbar">
                                        <a class="btn btn-icon" href="#" title="Editar"><i class="icon-2x far fa-edit text-primary"></i></a>
                                    
                                        <a class="btn btn-icon" href="#" title="Descargar"><i class="icon-2x fas fa-download text-primary"></i></a>
                                        
                                        <a class="btn btn-icon" href="#" title="Imprimir" target="_blank"><i class="icon-2x fas fa-print text-primary"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>Información</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Nombre de usuario:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $usuario->usuario }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Clave de empleado:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $usuario->cve_usuario }}</span>
                                                </div>
                                            </div>
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Area:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $usuario->area }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>-------------</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-6">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="info-personal" role="tabpanel" aria-labelledby="info-personal">
                        <div class="col-xl-12">
                            <div class="card card-custom gutter-b">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h4 class="card-label">Folio: </h4>            
                                    </div>
                                    <div class="card-toolbar">
                                        <a class="btn btn-icon" href="#" title="Editar"><i class="icon-2x far fa-edit text-primary"></i></a>
                                    
                                        <a class="btn btn-icon" href="#" title="Descargar"><i class="icon-2x fas fa-download text-primary"></i></a>
                                        
                                        <a class="btn btn-icon" href="#" title="Imprimir" target="_blank"><i class="icon-2x fas fa-print text-primary"></i></a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>Información personal</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-6">
                                            <div class="form-group row my-2">
                                                <label class="col-4 col-form-label">Nombre:</label>
                                                <div class="col-8">
                                                    <span class="form-control-plaintext font-weight-bolder">{{ $usuario->fullname }}</span>
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
                                                    <span class="font-weight-bolder">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolore esse commodi expedita consequuntur? Vel earum eos at tenetur exercitationem. Id fugiat voluptas totam. Sapiente velit molestiae adipisci saepe doloribus numquam?</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br>
                                    <div>
                                        <div class="mb-6">
                                            <div class="d-flex align-items-center flex-grow-1">
                                                <div class="d-flex flex-wrap align-items-center justify-content-between w-100">
                                                    <div class="d-flex flex-column align-items-cente py-2 w-75">
                                                        <h3>Información de contacto</h3>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="md-6">
                                                <div class="row align-items-center" class="tab">
                                                    <div class="table-responsive">
                                                        <table class="table table-bordered" id="table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="pr-0 font-weight-boldest text-uppercase">Nombre</th>
                                                                    <th class="pr-0 font-weight-boldest text-uppercase">telefono</th>
                                                                    <th class="pr-0 font-weight-boldest text-uppercase">Direccion</th>
                                                                    <th class="pr-0 font-weight-boldest text-uppercase">Acciones</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="tbody-productos">
                                                                <tr class="font-weight-boldest font-size-lg" id="id-cont">
                                                                    <td class="pt-4"> xxxxxxxxxxxx </td> 
                                                                    <td class="pt-4"> xxxxxxxxxxxx </td> 
                                                                    <td class="pt-4"> xxxxxxxxxxxx </td> 
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary font-weight-bolder btn-sm" name="editar_producto" id="editar-producto" onclick="">editar</button>                                                                        
                                                                        <button type="button" class="btn btn-danger font-weight-bolder btn-sm" name="borrar-producto" id="borrar-producto" onclick="">borrar</button>                                                                                                                                   
                                                                    </td> 
                                                                </tr>
                                                                <tr class="font-weight-bold font-size-lg" id="empty-ent-prod">
                                                                    <td class="text-center pt-4"> No existen contactos registrados </td> 
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->

<!--end::Page Scripts-->
@endsection