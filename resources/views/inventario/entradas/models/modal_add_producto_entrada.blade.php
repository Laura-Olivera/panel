<div class="modal fade" id="producto_entrada_add_modal" name="producto_entrada_add_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar poducto a entrada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_producto_entrada_add" name="frm_producto_entrada_add">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
                            <input type="hidden" id="id" name="id"/>
                            <input type="hidden" id="id_prod" name="id_prod"/>
                            <input type="hidden" id="proveedor" name="proveedor" value="{{$prov_id}}">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="">Producto:</label>
                                    <input type="text" class="form-control" placeholder="Codigo del producto" id="cve_prod" name="cve_prod" autocomplete="off"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="opacity-75">Costo:</label>
                                        <input type="text" class="form-control" placeholder="Precio de compra del producto" id="costo" name="costo" autocomplete="off" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">                                
                                <div class="col-md-12">
                                    <label class="opacity-75">Descripción:</label>
                                    <input type="text" class="form-control" placeholder="Descripción general del producto" id="general" name="general" autocomplete="off" disabled/>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="">Cantidad:</label>
                                    <input type="text" class="form-control" placeholder="Cantidad total de producto en factura" id="cant_prod" name="cant_prod" autocomplete="off"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="">Costo total:</label>
                                    <input type="text" class="form-control" placeholder="Precio total de producto en factura" id="costo_prod" name="costo_prod" autocomplete="off"/>
                                </div>
                            </div>
                            <div class="form-group row">                                
                                <div class="col-md-12">
                                    <label class="">Observaciones:</label>
                                    <input type="text" class="form-control" placeholder="Observaciones en el producto" id="nota_prod" name="nota_prod" autocomplete="off"/>
                                </div>
                            </div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" id="save-update" name="save-update" onclick="store_entrada_producto();">Guardar</button>
            </div>
        </div>
    </div>
</div>