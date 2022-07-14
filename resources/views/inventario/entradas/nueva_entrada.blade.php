@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container-fluid">
		<!--begin::Card-->
		<div class="card card-custom">
			<!--begin::Body-->
			<div class="card-body">
				<!--begin::Card-->
                <div class="card card-custom gutter-b example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Nueva entrada</h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        {{ Form::open(['url' => 'foo/bar','method' => 'POST','name'=>'frm_nueva_entrada','id'=>'frm_nueva_entrada','files' => true, 'class' => 'form']) }}
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>No. Factura:</label>
                                    <input type="text" class="form-control" placeholder="Número de factura" id="factura" name="factura" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Proveedor:</label>
                                    <select class="form-control select2" id="proveedor" name="proveedor">
                                        <option label="Label"></option>
                                        @foreach($proveedores as $proveedor)
                                            <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="">RFC:</label>
                                    <input type="text" class="form-control" placeholder="RFC del proveedor" id="prov_rfc" name="prov_rfc" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label for="">Direccion:</label>
                                    <input type="text" class="form-control" placeholder="Direccion del proveedor" name="prov_direccion" id="prov_direccion" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Fecha de emisión de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" id="fac_fecha_emision" name="fac_fecha_emision" placeholder="Seleccione la fecha de emisión de facturacion" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Fecha de operación de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" id="fac_fecha_operacion" name="fac_fecha_operacion" placeholder="Seleccione la fecha de operación de facturacion" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label>SubTotal de factura:</label>
                                    <input type="text" class="form-control" placeholder="SubTotal de la factura" id="fac_subtotal" name="fac_subtotal" autocomplete="off"/>
                                </div>
                                <div class="col-lg-3">
                                    <label>Impuesto de factura:</label>
                                    <input type="text" class="form-control" placeholder="Impuesto de la factura" id="fac_impuesto" name="fac_impuesto" autocomplete="off"/>
                                </div>
                                <div class="col-lg-3">
                                    <label>Extras de factura:</label>
                                    <input type="text" class="form-control" placeholder="Impuesto de la factura" id="fac_extras" name="fac_extras" autocomplete="off"/>
                                </div>
                                <div class="col-lg-3">
                                    <label>Total de factura:</label>
                                    <input type="text" class="form-control" placeholder="Monto total de la factura" id="fac_total" name="fac_total" autocomplete="off"/>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label for="">Importe total en letra:</label>
                                    <input type="text" class="form-control" placeholder="Importe total de la factura en letra" id="fac_total_letra" name="fac_total_letra" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Forma de pago de la factura:</label>
                                    <select class="form-control select2" name="fac_forma_pago" id="fac_forma_pago">
                                        <option value=""></option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Credito">Credito</option>
                                        <option value="Cheques">Cheques</option>
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Metodo de pago de la factura:</label>
                                    <select class="form-control select2" name="fac_metodo_pago" id="fac_metodo_pago">
                                        <option value=""></option>
                                        <option value="Pago en una sola exhibicion">Pago en una sola exhibicion</option>
                                        <option value="Pago en parcialidades">Pago en parcialidades</option>
                                        <option value="Pago diferido">Pago diferido</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="">Factura digital:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fac_path" name="fac_path" accept="pdf">
                                        <label class="custom-file-label" for="fac_path">Seleccione la factura digital</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="">Observaciones de la factura:</label>
                                    <input type="text" class="form-control" placeholder="Observaciones de la factura" id="fac_notas" name="fac_notas" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Observaciones de la entrada:</label>
                                    <textarea class="form-control" name="entrada_notas" id="entrada_notas" rows="5">Sin Observaciones</textarea>
                                </div>
                            </div>                
                            <div class="modal-footer">
                                <button type="button" class="btn btn-light-danger font-weight-bold" onClick="window.history.go(-1);">Cancelar</button>
                                <button type="button" class="btn btn-primary font-weight-bold" name="registrar" id="registrar" onclick="store_entrada();">Registrar</button>
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
<script src="{{ URL::asset('js/inventario/entradas/nueva-entrada.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection