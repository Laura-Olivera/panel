<div class="modal fade" id="anexo_edit_modal" name="anexo_edit_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar anexo {{$anexo->cve_anexo}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    A simple danger alert—check it out!
                </div>
                {{ Form::open(['url' => 'foo/bar','method' => 'POST','name'=>'frm_anexo_edit','id'=>'frm_anexo_edit','files' => true, 'class' => 'form']) }}
                    <input type="hidden" name="entrada_id" id="entrada_id" value="{{ $anexo->id }}">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
                            <div class="form-group row">
                                <div class="col-lg-3">
                                    <label class="font-weight-bold ">Parcialidad:</label>
                                    <p class="font-weight-bolder ">{{ $anexo->fac_parcialidad }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <label class="font-weight-bold ">Total:</label>
                                    <p class="font-weight-bolder ">{{ $anexo->fac_total }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <label class="font-weight-bold ">Fecha de emisión:</label>
                                    <p class="font-weight-bolder ">{{ $anexo->fac_fecha_emision }}</p>
                                </div>
                                <div class="col-lg-3">
                                    <label class="font-weight-bold ">Fecha de operación:</label>
                                    <p class="font-weight-bolder ">{{ $anexo->fac_fecha_operacion }}</p>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Justificación de la baja:</label>
                                    <textarea class="form-control" name="anexo_notas" id="anexo_notas" rows="5"></textarea>
                                </div>
                            </div> 
						</div>
 					</div>
                {!! Form::close() !!}    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" id="save-update" name="save-update" onclick="delete_entrada_anexo({{ $anexo->id }});">Guardar</button>
            </div>
        </div>
    </div>
</div>