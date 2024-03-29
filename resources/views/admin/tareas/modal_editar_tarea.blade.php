<div class="modal fade" id="modal_editar_tarea" name="modal_editar_tarea" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ ($tarea->estatus == 4) ? 'Ver tarea' : 'Editar tarea' }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_tarea" name="frm_editar_tarea">
					<input type="hidden" value="{{ $tarea->id }}" id="id" name="id"/>
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Tarea: </label>
 					   					<input type="text" class="form-control" value="{{ $tarea->tarea }}" placeholder="Nombre de la tarea" id="tarea" name="tarea" autocomplete="off" {{ ($tarea->estatus == 4) ? "disabled" : "" }}/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Modulo:</label>
										<select class="form-control task-select2" id="modulo" name="modulo" {{ ($tarea->estatus == 4) ? "disabled" : "" }}>
     										<option value="1" {{ ($tarea->modulo == 1) ? "selected" : "" }}>Modulo 1</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="text" class="form-control" value="{{ $tarea->descripcion }}" placeholder="Descripción de la tarea" id="descripcion" name="descripcion" autocomplete="off" {{ ($tarea->estatus == 4) ? "disabled" : "" }}/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Asignar a:</label>
										<select class="form-control task-select2" id="empleados" name="empleados[]" multiple="multiple" {{ ($tarea->estatus == 4) ? "disabled" : "" }}>
											@foreach($empleados as $empleado)
												<option value="{{ $empleado->id }}" {{ in_array($empleado->id, $asignados) ? "selected" : "" }}>{{ $empleado->nombre }} {{ $empleado->primer_apellido }} {{ $empleado->segundo_apellido }}</option>
                                            @endforeach
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Estatus:</label>
										<select class="form-control task-select2" id="estatus" name="estatus" {{ ($tarea->estatus == 4) ? "disabled" : "" }}>
     										<option value="1" {{ ($tarea->estatus == 1) ? "selected" : ""}}>Realizar</option>
                                            <option value="2" {{ ($tarea->estatus == 2) ? "selected" : ""}}>Urgente</option>
                                            <option value="3" {{ ($tarea->estatus == 3) ? "selected" : ""}}>Extra Urgente</option>
                                            <option value="4" {{ ($tarea->estatus == 4) ? "selected" : ""}}>Terminado</option>
										</select>
									</div>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">{{ ($tarea->estatus == 4) ? 'Cerrar' : 'Cancelar' }}</button>
				@if ($tarea->estatus != 4)
				 <button type="button" class="btn btn-primary font-weight-bold" onclick="update_tarea();">Guardar</button>
				@endif
            </div>
        </div>
    </div>
</div>