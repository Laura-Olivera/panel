@extends('layouts.app')

@section('styles')
@endsection

@section('content')
<!--end::Subheader-->
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
					<span class="font-weight-bolder text-dark">Control de Permisos</span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_permiso_modal();" class="btn btn-light-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<i class="icon-md fas fa-check-double"></i>
						</span>Nuevo permiso</a>	
					<!--end::Button-->
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin: Datatable-->
                <table id="permisos-table" name="permisos-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Permiso</th>
                            <th>Descripción</th>
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
<script src="{{ URL::asset('js/admin/permisos.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection