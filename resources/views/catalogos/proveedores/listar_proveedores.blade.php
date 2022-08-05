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
			<!--begin::Header-->
			<div class="card-header align-items-center border-0 mt-4">
				<div class="card-title align-items-start flex-column">
					<h3 class="card-label">
					<span class="font-weight-bolder text-dark">Control de Proveedores</span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					@include('layouts.toolbar.export_options')
					<!--end::Dropdown-->
					@can('CatalogoProveedoresCrear')
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_proveedor_modal();" class="btn btn-light-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<i class="icon-md far fa-id-badge"></i>
						</span>Nuevo proveedor</a>
					<!--end::Button-->
					@endcan					
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				@can('CatalogoProveedoresCrear')
					@include('layouts.toolbar.file_import')
				@endcan
				<!--begin: Datatable-->
                <table id="proveedores-table" name="proveedores-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
                            <th>Telefono</th>
							<th>Correo electronico</th>
							<th>Direccion</th>
                            <th>Estatus</th>
							<th>Acciones</th>  
                        </tr>
                    </thead>
                </table>
				<!--end: Datatable-->
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
<script src="{{ URL::asset('js/catalogos/proveedores.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection