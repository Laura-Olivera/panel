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
					<span class="font-weight-bolder text-dark">Control de Clientes</span></h3>
				</div>
				<div class="card-toolbar">
					@can('CatalogoClientesCrear')
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_cliente_modal();" class="btn btn-light-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<i class="icon-md far fa-id-badge"></i>
						</span>Nuevo cliente</a>
					<!--end::Button-->
					@endcan
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin: Datatable-->
                <table id="clientes-table" name="clientes-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>RFC</th>
							<th>Correo electronico</th>
                            <th>Telefono</th>
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
<script src="{{ URL::asset('js/catalogos/clientes.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection