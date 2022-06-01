<div class="modal fade" id="modal_editar_proveedor" name="modal_editar_proveedor" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_editar_proveedor" name="frm_editar_proveedor">
					<input type="hidden" value="{{ $proveedor->id }}" id="id" name="id"/>
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label> Nombre: </label>
 					   					<input type="text" class="form-control" value="{{ $proveedor->nombre}}" placeholder="Nombre del proveedor" id="nombre" name="nombre" autocomplete="off"/>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Descripción:</label>
										<input type="text" class="form-contro" value="{{ $proveedor->descrip }}" placeholder="Descripción" id="descrip" name="descrip" autocomplete="off"/>
									</div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-6">
									<div class="form-group">
										<label>Clave:</label>
										<input type="text" class="form-control" value="{{ $proveedor->clave }}" placeholder="Clave del proveedor" id="clave_prov" name="clave_prov" autocomplete="off"/>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>slug:</label>
										<input type="text" class="form-control" value="{{ $proveedor->slug }}" placeholder="Slug del proveedor" id="slug" name="slug" autocomplete="off"/>
									</div>
								</div>
							</div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="col-lg-3 col-form-label text-lg-right">Imagen:</label>
									<div class="col-lg-9">
                                        <div class="dropzone dropzone-multi" id="kt_dropzone_5">
                                            <div class="dropzone-panel mb-lg-0 mb-2">
                                                <a class="dropzone-select btn btn-light-primary font-weight-bold btn-sm">Subir archivo</a>
                                            </div>
                                            <div class="dropzone-items">
                                                <div class="dropzone-item" style="display:none">
                                                    <div class="dropzone-file">
                                                        <div class="dropzone-filename" title="some_image_file_name.jpg">
                                                            <span data-dz-name="">some_image_file_name.jpg</span>
                                                            <strong>(
                                                            <span data-dz-size="">340kb</span>)</strong>
                                                        </div>
                                                        <div class="dropzone-error" data-dz-errormessage=""></div>
                                                    </div>
                                                    <div class="dropzone-progress">
                                                        <div class="progress">
                                                            <div class="progress-bar bg-primary" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0" data-dz-uploadprogress=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone-toolbar">
                                                        <span class="dropzone-delete" data-dz-remove="">
                                                            <i class="flaticon2-cross"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="form-text text-muted">Max file size is 1MB and max number of files is 5.</span>
                                    </div>
                                </div>
                                <div class="col-md-6 text-right">
                                    <label class="control-label">Habilitado</label>
                                    <div class="form-group">
                                        <span class="switch switch-md switch-icon">
                                            <label>
                                                <input type="checkbox"  {{ ( $proveedor->estatus == 1) ? 'checked' : ''}} name="estatus" id="estatus">
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
				<button type="button" class="btn btn-primary font-weight-bold" onclick="update_proveedor();">Guardar</button>
            </div>
        </div>
    </div>
</div>