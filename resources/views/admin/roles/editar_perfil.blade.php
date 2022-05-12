@extends('layouts.app')

@section('styles')
<link href="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
		<!--begin::Details-->
		<div class="d-flex align-items-center flex-wrap mr-2">
			<!--begin::Title-->
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Editar Perfil</h5>
			<!--end::Title-->
		</div>
		<!--end::Details-->
	</div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
	<!--begin::Container-->
	<div class="container">
		<!--begin::Card-->
		<div class="card card-custom">
            <div class="card-header flex-wrap border-0 pt-6 pb-0">
				<div class="card-title">
					<h3 class="card-label">Perfil {{ $rol->name }}</h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="" class="btn btn-primary font-weight-bolder">
					<span class="svg-icon svg-icon-md">
					</span>Regresar</a>
					<!--end::Button-->
				</div>
			</div>
			<!--begin::Body-->
			<div class="card-body">
                <div class="checkbox-list">
                    {{ Form::model($rol, array('url' => array('admin/perfiles/update', $rol->id), 'method' => 'POST')) }}
                    {{ Form::label('name', 'Nombre del Rol Asignado') }}
                    {{ Form::text('name', null, array('class' => 'form-control','readonly' => true)) }}
                    <br>
                    <h5><b>Permisos Asignados</b></h5>
                    @foreach ($permissions as $permission)
                    {{Form::checkbox('permissions[]',  $permission->id, $rol->permissions ) }}
                    {{Form::label($permission->name, ucfirst($permission->name)) }}<br>
                    @endforeach
                    <br>
                    {{ Form::submit('Editar', array('class' => 'btn btn-primary')) }}
                    {{ Form::close() }}
                </div>
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