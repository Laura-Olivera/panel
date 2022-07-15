<div class="modal fade" id="anexo_add_modal" name="anexo_add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo anexo {{$entrada->cve_entrada}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
                {{ Form::open(['url' => 'foo/bar','method' => 'POST','name'=>'frm_anexo_add','id'=>'frm_anexo_add','files' => true, 'class' => 'form']) }}
                    <input type="hidden" name="entrada_id" id="entrada_id" value="{{ $entrada->id }}">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Fecha de emisión de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" id="fac_fecha_emision" name="fac_fecha_emision" placeholder="Seleccione la fecha de emisión de facturacion" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Fecha de operación de facturación:</label>
                                    <div class="input-group date">                                        
                                        <input type="text" class="form-control" id="fac_fecha_operacion" name="fac_fecha_operacion" placeholder="Seleccione la fecha de operación de facturacion" />
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="la la-calendar-check-o"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label>Total de factura:</label>
                                    <input type="text" class="form-control" placeholder="Monto total de la factura" id="fac_total" name="fac_total" autocomplete="off"/>
                                </div>
                                <div class="col-lg-8">
                                    <label for="">Importe total en letra:</label>
                                    <input type="text" class="form-control" placeholder="Importe total de la factura en letra" id="fac_total_letra" name="fac_total_letra" autocomplete="off"/>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Parcialidad:</label>
                                    <input type="text" class="form-control" placeholder="Parcialidad" id="fac_parcialidad" name="fac_parcialidad" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Forma de pago de la factura:</label>
                                    <select class="form-control select2" name="fac_forma_pago" id="fac_forma_pago">
                                        <option value=""></option>
                                        <option value="Efectivo">Efectivo</option>
                                        <option value="Credito">Credito</option>
                                        <option value="Cheques">Cheques</option>
                                    </select>
                                </div>
                            </div> 
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label>Saldo anterior:</label>
                                    <input type="text" class="form-control" placeholder="Saldo anterior" id="fac_saldo_anterior" name="fac_saldo_anterior" autocomplete="off"/>
                                </div>
                                <div class="col-lg-6">
                                    <label>Saldo insoluto:</label>
                                    <input type="text" class="form-control" placeholder="Saldo insoluto" id="fac_saldo_insoluto" name="fac_saldo_insoluto" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-4">
                                    <label for="">Factura digital:</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="fac_path" name="fac_path" accept="pdf">
                                        <label class="custom-file-label" for="fac_path">Seleccione la factura digital</label>
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <label for="">Observaciones de la factura:</label>
                                    <input type="text" class="form-control" placeholder="Observaciones de la factura" id="fac_notas" name="fac_notas" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <label>Observaciones del anexo:</label>
                                    <textarea class="form-control" name="anexo_notas" id="anexo_notas" rows="5">Sin Observaciones</textarea>
                                </div>
                            </div> 
						</div>
 					</div>
                {!! Form::close() !!}    
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" id="save-update" name="save-update" onclick="store_entrada_anexo();">Guardar</button>
            </div>
        </div>
    </div>
</div>