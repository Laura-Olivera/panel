<div class="modal fade" id="modal_nueva_categoria" name="modal_nueva_categoria" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nueva categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nueva_categoria" name="frm_nueva_categoria">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-4">
									<div class="form-group">
										<label>Clave:</label>
 					   					<input type="text" class="form-control" placeholder="Clave de la categoria" id="clave" name="clave" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" class="form-control" placeholder="Nombre" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
                                
								<div class="col-md-4">
									<div class="form-group">
										<label>Slug:</label>
 					   					<input type="text" class="form-control" placeholder="Etiqueta ej. Telefonia" id="slug" name="slug" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="email" class="form-control" placeholder="Descripcion" id="descripcion" name="descripcion" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Calle:</label>
										<input type="text" class="form-control" placeholder="Calle" id="calle" name="calle" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_categoria();">Registrar</button>
            </div>
        </div>
    </div>
</div>