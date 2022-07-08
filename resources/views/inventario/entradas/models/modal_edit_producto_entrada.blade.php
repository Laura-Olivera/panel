<div class="modal fade" id="producto_entrada_edit_modal" name="producto_entrada_edit_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar poducto de entrada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_producto_entrada_edit" name="frm_producto_entrada_edit">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
                            <input type="hidden" value="{{ $entrada_producto->entrada_id }}" id="id_edit" name="id_edit"/>
                            <input type="hidden" value="{{ $entrada_producto->producto_id }}" id="id_prod_edit" name="id_prod_edit"/>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="">Producto:</label>
                                    <input type="text" class="form-control" value="{{ $entrada_producto->producto }}" placeholder="Codigo del producto" id="cve_prod_edit" name="cve_prod_edit" autocomplete="off" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="">Cantidad:</label>
                                    <input type="text" class="form-control" value="{{ $entrada_producto->cantidad }}" placeholder="Cantidad total de producto en factura" id="cant_prod_edit" name="cant_prod_edit" autocomplete="off"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="">Costo total:</label>
                                    <input type="text" class="form-control" value="{{ $entrada_producto->costo_total }}" placeholder="Precio total de producto en factura" id="costo_prod_edit" name="costo_prod_edit" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">                                
                                <div class="col-md-12">
                                    <label class="">Observaciones:</label>
                                    <input type="text" class="form-control" value="{{ $entrada_producto->comentario }}" placeholder="Observaciones en el producto" id="nota_prod_edit" name="nota_prod_edit" autocomplete="off"/>
                                </div>
                            </div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" id="save-update" name="save-update" onclick="update_entrada_producto({{ $entrada_producto->entrada_id}}, {{ $entrada_producto->producto_id }})">Guardar</button>
            </div>
        </div>
    </div>
</div>