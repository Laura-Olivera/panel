<div class="modal fade" id="modal_nueva_area" name="modal_nueva_area" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nueva area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nueva_area" name="frm_nueva_area">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Clave:</label>
 					   					<input type="text" class="form-control" placeholder="Clave de la categoria" id="clave" name="clave" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Responsable:</label>
										<select class="form-control select2" id="responsable" name="responsable">
											<option label="Label"></option>
											@foreach($usuarios as $usuario)
     										<option value="{{ $usuario->fullname }}">{{ $usuario->fullname }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<label class="control-label">Habilitado</label>
								<div class="form-group">
									<span class="switch switch-md switch-icon">
										<label>
											<input type="checkbox" name="estatus" id="estatus">
											<span></span>
										</label>
									</span>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_area();">Registrar</button>
            </div>
        </div>
    </div>
</div>