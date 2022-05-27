<div class="modal fade" id="modal_nuevo_perfil" name="modal_nuevo_perfil" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo perfil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nuevo_perfil" name="frm_nuevo_perfil">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Perfil:</label>
										<input type="text" class="form-control" placeholder="Nombre del perfil" id="name" name="name" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="text" class="form-control" placeholder="Descripción del perfil" id="descrip" name="descrip" autocomplete="off"/>
									</div>
								</div>
							</div>							
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_perfil();">Registrar</button>
            </div>
        </div>
    </div>
</div>