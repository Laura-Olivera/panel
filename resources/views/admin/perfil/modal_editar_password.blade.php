<div class="modal fade" id="modal_editar_password" name="modal_editar_password" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar contraseña</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_password" name="frm_editar_password">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Contraseña:</label>
										<input type="password" class="form-control" placeholder="Contraseña" id="pass" name="pass" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirmar contraseña:</label>
										<input type="password" class="form-control" placeholder="Confirmar contraseña" id="rpass" name="rpass" autocomplete="off"/>
									</div>
								</div>
							</div>					
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="update_password();">Actualizar</button>
            </div>
        </div>
    </div>
</div>