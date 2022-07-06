<div class="modal fade" id="producto_entrada_modal" name="producto_entrada_modal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Nuevo proveedor</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
				<form class="form" id="frm_producto_entrada" name="frm_producto_entrada">
 					<div class="panel panel-primary">
 					 	<div class="panel-body">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="opacity-75">Producto:</label>
                                    <input type="text" class="form-control" placeholder="Codigo del producto" id="cve_prod" name="cve_prod"/>
                                </div>
                                <div class="col-md-6">
                                    <label class="opacity-75">Costo:</label>
                                    <input type="text" class="form-control" placeholder="Precio de compra del producto" id="costo" name="costo"/>
                                </div>
                            </div>
                            <div class="form-group row">                                
                                <div class="col-md-12">
                                    <label class="opacity-75">Descripción:</label>
                                    <input type="text" class="form-control" placeholder="Descripción general del producto" id="general" name="general"/>
                                </div>
                            </div>   
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="opacity-75">Cantidad:</label>
                                    <input type="text" class="form-control" placeholder="Cantidad total de producto en factura" id="cant_prod" name="cant_prod"/>
                                </div>
                                <div class="col-md-4">
                                    <label class="opacity-75">Costo total:</label>
                                    <input type="text" class="form-control" placeholder="Precio total de producto en factura" id="costo_prod" name="costo_prod"/>
                                </div>
                            </div>
                            <div class="form-group row">                                
                                <div class="col-md-12">
                                    <label class="opacity-75">Observaciones:</label>
                                    <input type="text" class="form-control" placeholder="Observaciones en el producto" id="nota_prod" name="nota_prod"/>
                                </div>
                            </div>
						</div>
 					</div>
				</form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-danger font-weight-bold" data-dismiss="modal">Cancelar</button>
				<button type="button" class="btn btn-primary font-weight-bold" onclick="store_entrada_producto();">Guardar</button>
            </div>
        </div>
    </div>
</div>