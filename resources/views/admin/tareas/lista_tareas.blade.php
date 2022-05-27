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
			<h5 class="text-dark font-weight-bold mt-2 mb-2 mr-5">Control de Tareas</h5>
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
			<!--begin::Header-->
			<div class="card-header flex-wrap border-0 pt-6 pb-0">
				<div class="card-title">
					<h3 class="card-label">
					<span class="d-block text-muted pt-2 font-size-sm"></span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Button-->
					<a href="javascript:void(0);" onclick="add_tarea_modal();" class="btn btn-light-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<i class="icon-md fas fa-tasks"></i>
						</span>Nuevo tarea</a>
					<!--end::Button-->
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				<!--begin: Datatable-->
                <table id="tareas-table" name="tareas-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Tarea</th>
                            <th>Descripción</th>
                            <th>Responsable(s)</th>
							<th>Inicio</th>
							<th>Termino</th>
                            <th>Estatus</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->tarea }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                            <td>
                             {{ getStringFromObject($tarea->empleados()->pluck('nombre'), ', ') }}
                            </td>
							<td>{{ $tarea->created_at }}</td>
							<td>{{ ($tarea->updated_at) ? $tarea->updated_at : "Tarea sin finalizar" }} </td>
                            <td><span class="label label-lg label-light-{{ getLabelStatusTask($tarea->estatus) }} label-inline font-weight-bold py-4"> {{ statusToString($tarea->estatus) }} </span></td>
                            <td>
								@if ($tarea->estatus == 4)
									<a class="btn btn-icon" href="javascript:void(0);" onclick="edit_tarea_modal({{ $tarea->id }});" title="Ver Tarea"><i class="icon-xl far fa-eye text-success"></i></a>
								@else
									<a class="btn btn-icon" href="javascript:void(0);" onclick="edit_tarea_modal({{ $tarea->id }});" title="Editar"><i class="icon-xl far fa-edit text-primary"></i></a>
								@endif
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
<script src="{{ URL::asset('assets/plugins/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>
<script src="{{ URL::asset('js/admin/tareas.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection