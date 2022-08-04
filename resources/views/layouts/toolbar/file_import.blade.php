@if($errors->any())
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
{{ Form::open(['url' => 'documento/importar/'.$class,'method' => 'POST','name'=>'frm_importar','id'=>'frm_importar', 'files' => true, 'class' => 'form']) }}
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