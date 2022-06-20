<div class="modal fade" id="modal_editar_area" name="modal_editar_area" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_area" name="frm_editar_area">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Clave:</label>
 					   					<input type="text" value="{{ $area->cve_area }}" class="form-control" placeholder="Clave de area" id="clave" name="clave" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" value="{{ $area->nombre }}" class="form-control" placeholder="Nombre" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="col-md-12 text-right">
								<label class="control-label">Habilitado</label>
								<div class="form-group">
									<span class="switch switch-md switch-icon">
										<label>
											<input type="checkbox"  {{ ( $area->estatus) ? 'checked' : ''}} name="estatus" id="estatus">
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
                <button type="button" class="btn btn-ligh-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="update_area();">Registrar</button>
            </div>
        </div>
    </div>
</div>