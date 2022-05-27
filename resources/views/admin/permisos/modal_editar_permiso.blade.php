<div class="modal fade" id="modal_editar_permiso" name="modal_editar_permiso" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar permiso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_permiso" name="frm_editar_permiso">
                    <input type="hidden" class="form-control" id="id_permiso" name="id_permiso" value="{{$permiso->id}}">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Permiso:</label>
										<input type="text" value="{{ $permiso->name }}" class="form-control" placeholder="Nombre del permiso" id="name" name="name" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>descripción:</label>
										<input type="text" value="{{ $permiso->descrip }}" class="form-control" placeholder="Descrpción del permiso" id="descrip" name="descrip" autocomplete="off"/>
									</div>
								</div>
							</div>							
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="update_permiso();">Registrar</button>
            </div>
        </div>
    </div>
</div>