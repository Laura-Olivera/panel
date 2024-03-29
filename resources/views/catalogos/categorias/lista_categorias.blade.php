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
					<span class="font-weight-bolder text-dark">Control de Categorias</span></h3>
				</div>
				<div class="card-toolbar">
					<!--begin::Dropdown-->
					<a href="{{ route('descargarDocumento', ['path' => Crypt::encryptString('assets\media\plantillas'),'name' => $plantilla]) }}" class="btn btn-primary font-weight-bolder">
						<span class="navi-icon">
							<i class="la la-file-text-o"></i>
						</span>Descargar plantilla
					</a>
					<!--end::Dropdown-->
					&nbsp;
					@can('CatalogoCategoriasCrear')
						<!--begin::Button-->
						<a href="javascript:void(0);" onclick="add_categoria_modal();" class="btn btn-primary font-weight-bolder">
						<span class="svg-icon svg-icon-md">
							<!--begin::Svg Icon | path:assets/media/svg/icons/Design/Flatten.svg-->
							<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
								<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
									<polygon points="0 0 24 0 24 24 0 24"/>
									<path d="M18,8 L16,8 C15.4477153,8 15,7.55228475 15,7 C15,6.44771525 15.4477153,6 16,6 L18,6 L18,4 C18,3.44771525 18.4477153,3 19,3 C19.5522847,3 20,3.44771525 20,4 L20,6 L22,6 C22.5522847,6 23,6.44771525 23,7 C23,7.55228475 22.5522847,8 22,8 L20,8 L20,10 C20,10.5522847 19.5522847,11 19,11 C18.4477153,11 18,10.5522847 18,10 L18,8 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
									<path d="M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
								</g>
							</svg>
							<!--end::Svg Icon-->
						</span>Nueva categoria</a>
						<!--end::Button-->
					@endcan
				</div>
			</div>
			<!--end::Header-->
			<!--begin::Body-->
			<div class="card-body">
				@can('CatalogoCategoriasCrear')
				@include('layouts.toolbar.file_import')
				@endcan
				<!--begin: Datatable-->
                <table id="categorias-table" name="categorias-table" class="table table-striped- table-bordered table-hover table-checkable">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Nombre</th>
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
<script src="{{ URL::asset('js/catalogos/categorias.js?v=1.0.0') }}" type="text/javascript"></script>
<!--end::Page Scripts-->
@endsection