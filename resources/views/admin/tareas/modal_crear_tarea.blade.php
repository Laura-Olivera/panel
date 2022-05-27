<div class="modal fade" id="modal_nueva_tarea" name="modal_nueva_tarea" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nueva tarea</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nueva_tarea" name="frm_nueva_tarea">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Tarea: </label>
 					   					<input type="text" class="form-control" placeholder="Nombre de la tarea" id="tarea" name="tarea" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Modulo:</label>
										<select class="form-control task-select2" id="modulo" name="modulo">
     										<option value="1">Modulo 1</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="text" class="form-control" placeholder="Descripción de la tarea" id="descripcion" name="descripcion" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Asignar a:</label>
										<select class="form-control task-select2" id="empleados" name="empleados[]" multiple="multiple">
											@foreach($empleados as $empleado)
     										<option value="{{ $empleado->id }}">{{ $empleado->nombre }} {{ $empleado->primer_apellido }} {{ $empleado->segundo_apellido }}</option>
											@endforeach
										</select>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Estatus:</label>
										<select class="form-control task-select2" id="estatus" name="estatus">
     										<option value="1">Realizar</option>
                                            <option value="2">Urgente</option>
                                            <option value="3">Extra Urgente</option>
										</select>
									</div>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_tarea();">Registrar</button>
            </div>
        </div>
    </div>
</div>