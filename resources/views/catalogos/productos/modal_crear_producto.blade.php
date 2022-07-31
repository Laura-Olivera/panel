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
                        <h3 class="card-title">Nuevo producto</h3>
                        <div class="card-toolbar">
                        </div>
                    </div>
                    <div class="card-body">
                        <form class="form" id="frm_nuevo_producto" name="frm_nuevo_producto">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Codigo/Clave:</label>
                                    <input type="text" class="form-control" placeholder="Codigo o clave del producto" id="codigo" name="codigo" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Nombre:</label>
                                    <input type="text" class="form-control" placeholder="Nombre del producto" id="nombre" name="nombre" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Modelo:</label>
                                    <input type="text" class="form-control" placeholder="Modelo del producto" id="modelo" name="modelo" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Marca:</label>
                                    <input type="text" class="form-control" placeholder="Marca del producto" id="marca" name="marca" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Proveedor:</label>
                                    <select class="form-control select2" id="proveedor" name="proveedor">
                                        <option label="Label"></option>
                                        @foreach($proveedores as $proveedor)
                                         <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }} - {{ $proveedor->cve_prov }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-lg-6">
                                    <label>Categoria:</label>
                                    <select class="form-control select2" id="categoria" name="categoria">
                                        <option label="Label"></option>
                                        @foreach($categorias as $categoria)
                                         <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Costo unitario:</label>
                                    <input type="text" class="form-control" value="00.00" placeholder="Costo unitario del producto" id="costo" name="costo" autocomplete="off"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Costo venta:</label>
                                    <input type="text" class="form-control" value="00.00" placeholder="Precio de venta del producto" id="venta" name="venta" autocomplete="off"/>
                                </div>
                                <div class="col-lg-4">
                                    <label>Cantidad:</label>
                                    <input type="text" class="form-control" value="000" placeholder="Cantidad total del producto" id="cantidad" name="cantidad" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Descripcion general:</label>
                                    <textarea rows="5" class="form-control" placeholder="Descripcion general del producto" id="general" name="general"> </textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Descripcion tecnica/detallada: </label>
                                    <br>
                                    <div id="kt-ckeditor-1-toolbar"></div>
						            <div id="kt-ckeditor-1">
						            	
						            </div>
                                    <textarea name="tecnica" id="tecnica" hidden></textarea>
                                </div>
                            </div>
                            <br>
                            <div class="col-lg-12 text-right">
								<label class="control-label">Habilitado</label>
								<div class="form-group">
									<span class="switch switch-md switch-icon">
										<label>
											<input type="checkbox" name="estatus" id="estatus">
											<span></span>
										</label>
									</span>
								</div>
							</div>
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
<div class="d-none" id="initial-data">
    <h2><strong>DESCRIPCION DETALLADA DEL PRODUCTO</strong></h2>
    <h3><strong>Características principales del producto</strong></h3>
    <ol>
        <li><strong>Descripción uno</strong></li>
        <li><strong>Descripción dos</strong></li>
        <li><strong>Descripción tres</strong></li>
        <li><strong>Descripción n...</strong></li>
    </ol>
    <h3><strong>Características técnicas del producto</strong></h3>
    <ul>
        <li><strong>Característica uno</strong></li>
        <li><strong>Característica dos</strong></li>
        <li><strong>Característica tres</strong></li>
        <li><strong>Característica n...</strong></li>
    </ul>
    <p><strong>Descripción de la funcionalidad del producto</strong></p>
</div>
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ URL::asset('assets/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/catalogos/productos/editor-producto.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection