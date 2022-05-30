<div class="modal fade" id="modal_editar_empresa" name="modal_editar_empresa" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar datos de empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_empresa" name="frm_editar_empresa">
					<input type="hidden" class="form-control" id="id_usuario" name="id_usuario" value="{{$empresa->id}}">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Nombre: </label>
                                    <input type="text" class="form-control" value="{{ $empresa->nombre }}" placeholder="Nombre" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Correo electrónico:</label>
                                    <input type="email" class="form-control" value=" {{ $empresa->email }}" placeholder="Segundo apellido" id="sApellido" name="sApellido" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Direccion:</label>
                                    <input type="email" class="form-control" value=" {{ $empresa->direccion }}" placeholder="Correo electrónico" id="email" name="email" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Telefono:</label>
                                    <input type="text" class="form-control" value="{{ $empresa->telefono }}" placeholder="Telefono" id="telefono" name="telefono" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary font-weight-bold" onclick="update_empresa();">Guardar</button>
            </div>
        </div>
    </div>
</div>