<div class="modal fade" id="modal_nuevo_proveedor" name="modal_nuevo_proveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nuevo_proveedor" name="frm_nuevo_proveedor">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" class="form-control" placeholder="Nombre del proveedor" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Clave: </label>
										<input type="text" class="form-control" placeholder="Clave del proveedor" id="clave" name="clave" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Correo electronico:</label>
										<input type="email" class="form-control" placeholder="Correo electronico" id="email" name="email" autocomplete="off"/>
									</div>
								</div>
                                <div class="col-md-3">
									<div class="form-group">
										<label>Telefono:</label>
										<input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label>Extensión:</label>
										<input type="text" class="form-control" placeholder="Extensión" id="extension" name="extension" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label> Direccion: </label>
 					   					<input type="text" class="form-control" placeholder="Direccion del proveedor" id="direccion" name="direccion" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
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
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" onclick="store_proveedor();">Guardar</button>
            </div>
        </div>
    </div>
</div>