<div class="modal fade" id="modal_nuevo_usuario" name="modal_nuevo_usuario" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar nuevo usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_nuevo_usuario" name="frm_nuevo_usuario">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-4">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre(s)" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Primer apellido:</label>
 					   					<input type="text" class="form-control @error('primer') is-invalid @enderror" placeholder="Primer apellido" id="pApellido" name="pApellido" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label>Segundo apellido:</label>
										<input type="text" class="form-control" placeholder="Segundo apellido" id="sApellido" name="sApellido" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>CURP:</label>
										<input type="text" class="form-control " placeholder="CURP" id="curp" name="curp" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>RFC:</label>
										<input type="text" class="form-control" placeholder="REF" id="rfc" name="rfc" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Usuario: </label>
 					   					<input type="text" class="form-control @error('usuario') is-invalid @enderror" placeholder="Nombre de usuario" id="usuario" name="usuario" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Correo electrónico:</label>
										<input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Correo electrónico" id="email" name="email" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Contraseña:</label>
										<input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Contraseña" id="password" name="password" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Confirmar contraseña:</label>
										<input type="password" class="form-control @error('rpassword') is-invalid @enderror" placeholder="Confirmar contraseña" id="rpassword" name="rpassword" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Telefono:</label>
										<input type="text" class="form-control" placeholder="Telefono" id="telefono" name="telefono" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Perfil:</label>
										<select class="form-control @error('perfil') is-invalid @enderror select2_basic" id="perfil" name="perfil">
											<option label="Label"></option>
											@foreach($roles as $role)
     										<option value="{{ $role->id }}">{{ $role->name }}</option>
											@endforeach
										</select>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<div class="form-group">
										<label>Area:</label>
										<select class="form-control @error('area') is-invalid @enderror select2_basic" id="area" name="area">
											<option label="Label"></option>
											@foreach($areas as $area)
     										<option value="{{ $area->cve_area }}">{{ $area->nombre }} - {{ $area->cve_area }}</option>
											@endforeach
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
                <button type="button" class="btn btn-primary font-weight-bold" onclick="store_usuario();">Registrar</button>
            </div>
        </div>
    </div>
</div>