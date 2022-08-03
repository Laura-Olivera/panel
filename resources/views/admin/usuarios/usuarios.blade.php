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
					<span class="font-weight-bolder text-dark">Control de Usuarios</span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_usuario_modal();" class="btn btn-light-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<i class="icon-md fas fa-user-plus"></i>
						</span>Nuevo usuario</a>
					<!--end::Button-->
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				@if($errors)
					@foreach($errors->all() as $error)
					<div class="alert alert-custom alert-light-danger fade show mb-5" role="alert" id="alert">
					    <div class="alert-icon"><i class="flaticon-warning"></i></div>
					    <div class="alert-text">{{$error}}</div>
					    <div class="alert-close">
					        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					            <span aria-hidden="true"><i class="ki ki-close"></i></span>
					        </button>
					    </div>
					</div>
					@endforeach
				@endif
				{{ Form::open(['url' => 'admin/usuarios/importar','method' => 'POST','name'=>'frm_importar_usuarios','id'=>'frm_importar_usuarios', 'files' => true, 'class' => 'form']) }}
				<div class="form-group row">
                    <div class="col-lg-6">
						<div class="custom-file">
						  	<input type="file" class="custom-file-input @error('importar') is-invalid @enderror" id="importar" name="importar" accept=".csv, .xlsx">
							  	
							<label class="custom-file-label" for="importar">Seleccione archivo para importar</label>
  						</div>
                    </div>
                    <div class="col-lg-6">
						<button type="submit" class="btn btn-primary" data-container="body" data-toggle="popover" data-placement="top" data-content="Para importar datos debes utilizar un archivo CSV o XLSX.">Importar</button>
                    </div>
                </div>
				{!! Form::close() !!}
				<!--begin: Datatable-->
                <table id="users-table" name="users-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Nombre</th>
							<th>Primer apellido</th>
							<th>Segundo apellido</th>
                            <th>Usuario</th>
                            <th>Correo electrónico</th>
                            <th>Area</th>
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
<script src="{{ URL::asset('js/admin/usuarios.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection