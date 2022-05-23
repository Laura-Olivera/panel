<div class="modal fade" id="modal_editar_tarea" name="modal_editar_tarea" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_tarea" name="frm_editar_tarea">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Tarea: </label>
 					   					<input type="text" class="form-control" value="{{ $tarea->tarea }}" placeholder="Nombre de la tarea" id="tarea" name="tarea" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Modulo:</label>
										<select class="form-control" id="modulo" name="modulo">
     										<option value="1" {{ ($tarea->modulo = 1) ? "selected" : "" }}>Modulo 1</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="text" class="form-control" value="{{ $tarea->descripcion }}" placeholder="Descripción de la tarea" id="descripcion" name="descripcion" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Asignar a:</label>
										<select class="form-control select2" id="empleados" name="empleados[]" multiple="multiple">
											@foreach($empleados as $empleado)
                                                {{-- @foreach($empleadoTareas as $asignado)
                                                <option value="{{ $empleado->id }}" {{ ($asignado == $empleado->id) ? "selected" : "" }}>{{ $empleado->nombre }} {{ $empleado->primer_apellido }} {{ $empleado->segundo_apellido }}</option>
                                                @endforeach --}}
											@endforeach
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Estatus:</label>
										<select class="form-control" id="estatus" name="estatus">
     										<option value="1" {{ ($tarea->estatus = 1) ? "selected" : ""}}>Realizar</option>
                                            <option value="2" {{ ($tarea->estatus = 2) ? "selected" : ""}}>Urgente</option>
                                            <option value="3" {{ ($tarea->estatus = 3) ? "selected" : ""}}>Extra Urgente</option>
                                            <option value="4" {{ ($tarea->estatus = 4) ? "selected" : ""}}>Terminado</option>
										</select>
									</div>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_tarea();">Registrar</button>
            </div>
        </div>
    </div>
</div>