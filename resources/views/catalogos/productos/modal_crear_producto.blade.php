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
                                <div class="col-lg-6">
                                    <label>Costo unitario:</label>
                                    <input type="text" class="form-control" placeholder="Costo unitario del producto" id="costo" name="costo" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Cantidad:</label>
                                    <input type="text" class="form-control" placeholder="Cantidad total del producto" id="cantidad" name="cantidad" autocomplete="off"/>
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
                                    <label for="">Descripcion tecnica/detallada: </label>
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
<div class="initial-data">
    <h1>Quick and simple CKEditor 5 Integration</h1>
	<p>Here goes the
	<a href="#">Minitial content of the editor</a>. Lorem Ipsum is simply dummy text of the
	<em>printing and typesetting</em>industry.</p>
	<blockquote>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled. Lorem Ipsum is simply dummy text of the printing and typesetting industry.</blockquote>
	<h3>Flexible &amp; Powerful</h3>
	<p>
	<strong>Lorem Ipsum has been the industry's</strong>standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled.</p>
	<ul>
		<li>List item 1</li>
		<li>List item 2</li>
		<li>List item 3</li>
		<li>List item 4</li>
	</ul>
</div>
@endsection

@section('scripts')
<!--begin::Page Scripts(used by this page)-->
<script src="{{ URL::asset('assets/plugins/custom/ckeditor/ckeditor-document.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/catalogos/productos/nuevoProducto.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection