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
                        <h2 class="card-label">{{$entrada->cve_entrada}}</h2>
                    </div>
                    <div class="card-toolbar">
                        <a href="javascript:void(0);" onclick="add_anexo_modal({{$entrada->id}});" class="btn btn-light-primary font-weight-bolder btn-sm mr-2">
                            <span class="svg-icon svg-icon-md">
                                <i class="icon-md far fa-id-badge"></i>
                            </span>Agregar Anexo
                        </a>
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
                                <a class="nav-link active" data-toggle="tab" href="#entrada-principal">
                                    <span class="nav-icon"><i class="fas fa-file-invoice"></i></span>
                                    <span class="nav-text">Principal</span>
                                </a>
                            </li>
                            @if (count($anexos) > 0)
                            @foreach ($anexos as $anexo)
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#{{ $anexo->cve_anexo }}">
                                    <span class="nav-icon"><i class="fas fa-info-circle"></i></span>
                                    <span class="nav-text">Anexo {{ $anexo->consecutivo }}</span>
                                </a>
                            </li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="entrada-principal" role="tabpanel" aria-labelledby="entrada-principal">
                            <div class="col-xl-12">
                                <div class="card card-custom gutter-b">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h4 class="card-label">Folio: {{$entrada->cve_entrada}}</h4>
                                            @if ($filename = $entrada->filename)
                                            <a class="btn btn-icon" href="{{URL::to('documentos/'.$entrada->fac_path.'/'.$filename)}}" title="Factura digital" target="_blank"><i class="icon-xl far fa-file-pdf text-primary"></i></a>
                                            @endif
                                        </div>
                                        <div class="card-toolbar">
                                            <a class="btn btn-icon" href="{{URL::to('inventario/entradas/editar/'.$entrada->cve_entrada)}}" title="Editar"><i class="icon-2x far fa-edit text-primary"></i></a>
                                            <a class="btn btn-icon" href="{{URL::to('entradas/editar/'.$entrada->cve_entrada)}}" title="Descargar"><i class="icon-2x fas fa-download text-primary"></i></a>
                                            <a class="btn btn-icon" href="{{URL::to('entradas/editar/'.$entrada->cve_entrada)}}" title="Imprimir"><i class="icon-2x fas fa-print text-primary"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-4">
                                                <label class="opacity-80">Factura</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->factura }}</p>
                                            </div>
                                            <div class="col-xl-4">
                                                <label class="opacity-80">Fecha de emisión</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_fecha_emision }}</p>
                                            </div>
                                            <div class="col-xl-4">
                                                <label class="opacity-80">Fecha de operacion</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_fecha_operacion }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-6">
                                                <label class="opacity-80">Proveedor</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->proveedor }}</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <label class="opacity-80">RFC</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->rfc }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-4">
                                                <label class="opacity-80">Dirección</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->direccion }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-3">
                                                <label class="opacity-80">SubTotal</label>
                                                <p class="font-weight-bolder mb-2">$ {{ $entrada->fac_subtotal }}</p>
                                            </div>
                                            <div class="col-xl-3">
                                                <label class="opacity-80">Impuestos</label>
                                                <p class="font-weight-bolder mb-2">$ {{ $entrada->fac_impuestos }}</p>
                                            </div>
                                            <div class="col-xl-3">
                                                <label class="opacity-80">Extras</label>
                                                <p class="font-weight-bolder mb-2">$ {{ ($entrada->fac_extras) ? $entrada->fac_extras : "00.00"}}</p>
                                            </div>
                                            <div class="col-xl-3">
                                                <label class="opacity-80">total</label>
                                                <p class="font-weight-bolder mb-2">$ {{ $entrada->fac_total }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-4">
                                                <label class="opacity-80">Importe total en letra</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_total_letra }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-6">
                                                <label class="opacity-80">Forma de pago</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_forma_pago }}</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <label class="opacity-80">Metodo de pago</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_metodo_pago }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-12">
                                                <label class="opacity-80">Observaciones de la factura</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->fac_notas }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-12">
                                                <label class="opacity-80">Observaciones de la entrada</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->entrada_notas }}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-6">
                                                <label class="opacity-80">Registro</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->created_user }}</p>
                                            </div>
                                            <div class="col-xl-6">
                                                <label class="opacity-80">Modifico</label>
                                                <p class="font-weight-bolder mb-2">{{ $entrada->updated_user }}</p>
                                            </div>
                                        </div>
                                        <br><br>
                                        <div class="form-group row align-items-start">
                                            <div class="col-xl-6">
                                                <h5 class="font-weight-bolder mb-2">Productos</h5>
                                            </div>
                                           <div class="col-xl-6 text-right">
                                                <button type="button" class="btn btn-primary font-weight-bolder btn-sm" id="agregar-producto" name="agregar-producto" onclick="agregar_entrada_producto({{ $entrada->id }});">Agregar producto</button>
                                           </div>
                                        </div>
                                        <div class="row align-items-center" class="tab-productos">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="entrada-productos-table">
                                                    <thead>
                                                        <tr>
                                                            <th class="pr-0 font-weight-boldest text-uppercase">Producto</th>
                                                            <th class="text-right font-weight-boldest text-uppercase">Cantidad</th>
                                                            <th class="text-right font-weight-boldest text-uppercase">Total</th>
                                                            <th class="pr-0 font-weight-boldest text-uppercase">Observaciones</th>
                                                            <th class="pr-0 font-weight-boldest text-uppercase">Acciones</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tbody-productos">
                                                        @if (count($entrada_productos) > 0)
                                                            @foreach ($entrada_productos as $ent_prod)
                                                            <tr class="font-weight-boldest font-size-lg" id="{{ $ent_prod->producto }}">
                                                                <td class="pt-4"> {{ $ent_prod->producto }} </td> 
                                                                <td class="text-right pt-4"> {{ $ent_prod->cantidad }} </td> 
                                                                <td class="text-right pt-4">$ {{ $ent_prod->costo_total }} </td> 
                                                                <td class="pt-4"> {{ $ent_prod->comentario }} </td> 
                                                                <td><button type="button" class="btn btn-danger font-weight-bolder btn-sm" name="borrar-producto" id="borrar-producto" onclick="borrar_entrada_producto({{ $ent_prod->entrada_id }}, {{ $ent_prod->producto_id }});">-</button>
                                                                    <button type="button" class="btn btn-primary font-weight-bolder btn-sm" name="editar_producto" id="editar-producto" onclick="editar_entrada_producto({{ $ent_prod->entrada_id }}, {{ $ent_prod->producto_id }});">editar</button>
                                                                </td> 
                                                            </tr>
                                                            @endforeach
                                                        @else
                                                            <tr class="font-weight-bold font-size-lg" id="empty-ent-prod">
                                                                <td class="text-center pt-4"> No existen productos en la entrada </td> 
                                                            </tr>
                                                        @endif
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if (count($anexos) > 0)
                        @foreach ($anexos as $anexo)
                        <div class="tab-pane fade" id="{{ $anexo->cve_anexo }}" role="tabpanel" aria-labelledby="{{ $anexo->cve_anexo }}">
                            @include('inventario.entradas.partials.entrada_anexo')
                        </div>
                        @endforeach
                        @endif
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
    <script src="{{ URL::asset('js/inventario/entradas/ver-entrada.js?v=1.0.0') }}" type="text/javascript"></script>
    <script src="{{ URL::asset('js/inventario/anexos/anexo-entrada.js?v=1.0.0') }}" type="text/javascript"></script>
@endsection