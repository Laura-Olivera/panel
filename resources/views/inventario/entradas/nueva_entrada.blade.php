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
                        <h3 class="card-title">Nueva entrada</h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" id="frm_nueva_entrada" name="frm_nueva_entrada">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Proveedor:</label>
                                    <select class="form-control select2" id="proveedor" name="proveedor">
                                        <option label="Label"></option>
                                        @foreach($proveedores as $proveedor)
                                         <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }} - {{ $proveedor->cve_prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>No. Factura:</label>
                                    <input type="text" class="form-control" placeholder="Número de factura" id="factura" name="factura" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Fecha de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" id="fac_fecha" readonly="readonly" placeholder="Seleccione la fecha de facturacion" />
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
                                    <input type="text" class="form-control" placeholder="Monto total de la factura" id="fac_total" name="fac_total" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Estatus de la factura:</label>
                                    <select class="form-control select2" name="estatus" id="estatus">
                                        <option value=""></option>
                                        <option value="1">PAGADA</option>
                                        <option value="2">POR PAGAR</option>
                                        <option value="3">CANCELADA</option>
                                    </select>
                                </div>
                            </div>                            
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="">Factura digital:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fac_path" aria-describedby="fac_path" accept="pdf">
                                        <label class="custom-file-label" for="fac_path">Seleccione la factura digital</label>
                                    </div>
                                </div>
                                <div class="col lg 6">
                                    <label for="">Observaciones:</label>
                                    <input type="text" class="form-control" placeholder="Observaciones de la factura" id="fac_notas" name="fac_notas" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Observaciones de la entrada:</label>
                                    <textarea class="form-control" name="notas" id="notas" rows="5">Sin Observaciones</textarea>
                                </div>
                            </div>
                            {{-- <div id="tabla_modelo">
                                <table class="table" id="tabla">
                                    <tr class="fila-fija">
                                        <td><input required id="modelo" name="modelo[]" placeholder="Modelo"
                                                class="form-control border border-dark" type="text" /></td>
                                        <td class="eliminar"><input type="button" value="Menos -" class="btn btn-danger"/></td>
                                    </tr>
                                </table>

                                <div class="btn-der">
                                    <button id="adicional" name="adicional" type="button" class="btn btn-warning"> Más +
                                    </button>
                                </div>

                            </div> --}}
                        </form>                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-danger font-weight-bold" onClick="window.history.go(-1);">Cancelar</button>
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="store_producto();">Registrar</button>
                        </div>                        
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