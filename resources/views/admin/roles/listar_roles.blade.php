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
					<span class="font-weight-bolder text-dark">Control de Perfiles</span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_perfil_modal();" class="btn btn-light-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
						<i class="icon-md fas fa-sitemap"></i>
					</span>Nuevo perfil</a>
					<!--end::Button-->
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin: Datatable-->
                <table id="roles-table" name="roles-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Perfil</th>
                            <th>Descripción</th>
                            <th>Permisos otorgados</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>{{ $role->descrip }}</td>
                            <td>
                             {{ objectToString($role->permissions()->pluck('name')) }}
                            </td>
                            <td>
                            <a href="{{ URL::to('admin/perfiles/editar_perfil/'.$role->id) }}" class="btn btn-icon" style="margin-right: 3px;" title="Editar"><i class="icon-xl fa fa-edit text-primary"></i></a>
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
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
<script src="{{ URL::asset('js/admin/roles.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection