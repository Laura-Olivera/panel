@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom">
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Editar entrada {{$entrada->cve_entrada}}</h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => 'foo/bar','method' => 'POST','name'=>'frm_editar_entrada','id'=>'frm_editar_entrada','files' => true, 'class' => 'form']) }}
                            <input type="hidden" value="{{ $entrada->id }}" id="id" name="id"/>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Proveedor:</label>
                                    <select class="form-control select2" id="proveedor" name="proveedor">
                                        <option label="Label"></option>
                                        @foreach($proveedores as $proveedor)
                                         <option value="{{ $proveedor->id }}" {{ ($entrada->proveedor_id == $proveedor->id) ? "selected" : "" }}>{{ $proveedor->nombre }} - {{ $proveedor->cve_prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>No. Factura:</label>
                                    <input type="text" class="form-control" value="{{ $entrada->factura }}" placeholder="Número de factura" id="factura" name="factura" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Fecha de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" value="{{ $entrada->fac_fecha }}" id="fac_fecha" name="fac_fecha" placeholder="Seleccione la fecha de facturacion" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Total de factura:</label>
                                    <input type="text" class="form-control" value="{{ $entrada->fac_total }}" placeholder="Monto total de la factura" id="fac_total" name="fac_total" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Estatus de la factura:</label>
                                    <select class="form-control select2" name="estatus" id="estatus">
                                        <option value=""></option>
                                        <option value="PAGADO" {{ ($entrada->estatus == 'PAGADO' ? "selected" : "") }}>PAGADA</option>
                                        <option value="POR PAGAR" {{ ($entrada->estatus == 'POR PAGAR' ? "selected" : "") }}>POR PAGAR</option>
                                        <option value="CANCELADO" {{ ($entrada->estatus == 'CANCELADO' ? "selected" : "") }}>CANCELADA</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="">Factura digital:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fac_path" name="fac_path" accept="pdf">
                                        <label class="custom-file-label" for="fac_path">Seleccione la factura digital</label>
                                    </div>
                                </div>
                                <div class="col lg 6">
                                    <label for="">Observaciones de la factura:</label>
                                    <input type="text" class="form-control" value="{{ $entrada->fac_notas }}" placeholder="Observaciones de la factura" id="fac_notas" name="fac_notas" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col lg 12">
                                    <label for="">Factura anterior:</label>
                                    <a class="btn btn-icon" href="#" title="Editar" target="_blank"><i class="icon-2x far fa-file-alt text-primary"></i></a>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Observaciones de la entrada:</label>
                                    <textarea class="form-control" name="notas" id="notas" rows="5">{{ $entrada->notas }}</textarea>
                                </div>
                            </div> 
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-danger font-weight-bold" onClick="window.history.go(-1);">Cancelar</button>
                                <button type="button" class="btn btn-primary font-weight-bold" name="registrar" id="registrar" onclick="update_entrada({{ $entrada->cve_entrada }});">Registrar</button>
                            </div>      
                        
                        {!! Form::close() !!}                    
                    </div>
                </div>
                <!--end::Card-->
			</div>
			<!--end::Body-->
		</div>
		<!--end::Card-->
	</div>
	<!--end::Container-->
</div>
<!--end::Entry-->
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ URL::asset('js/inventario/entradas/editar-entrada.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection