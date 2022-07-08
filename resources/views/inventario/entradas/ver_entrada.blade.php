@extends('layouts.app')
@section('styles')
    
@endsection
@section('content')
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!-- begin::Card-->
            <div class="card card-custom overflow-hidden">
                <div class="card-body pt-0">
                    <!-- begin: Invoice-->
                    <!-- begin: Invoice header-->
                    <div class="row justify-content-center py-md-15 px-md-0">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between pb-1 pb-md-5 flex-column flex-md-row">
                                <h2 class="font-weight-bolder">{{$entrada->cve_entrada}}</h2>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <span class="d-flex flex-column align-items-md-end opacity-70">
                                        
                                    </span>
                                </div>
                                <div class="d-flex flex-column align-items-md-end px-0">
                                    <span class="d-flex flex-column align-items-md-end opacity-70">
                                        
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice header-->
                    <!-- begin: Invoice body-->
                    <div class="row justify-content-center">
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-4">
                                    <label class="opacity-80">Factura</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->factura }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="opacity-80">Fecha de emisión</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->fac_fecha }}</p>
                                </div>
                                <div class="col-md-4">
                                    <label class="opacity-80">Fecha de registro</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->created_at }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="opacity-80">Proveedor</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->proveedor }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-12">
                                    <label class="opacity-80">Observaciones</label>
                                    <p class="font-weight-bolder mb-15">{{ $entrada->notas }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label class="opacity-80">Registró</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->user }}</p>
                                </div>
                                <div class="col-md-6">
                                    <label class="opacity-80">Modificó</label>
                                    <p class="font-weight-bolder mb-2">{{ $entrada->updated_user_id }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row justify-content-center">
                        <div class="col-md-9 d-flex justify-content-between pb-1 pb-md-5 flex-column flex-md-row">
                                <h5><p class="font-weight-bolder mb-2">Agregar productos</p></h5>
                                <a href="javascript:void(0);" class="btn btn-icon btn-success btn-sm" onclick="show_form_producto()">
                                    <i class="flaticon2-down"></i>
                                </a>
                        </div>
                        <br>
                        <div class="col-md-9 d-none" id="add-producto" name="add-producto">
                            <form class="form" id="frm_producto_entrada" name="frm_producto_entrada">
                                <input type="hidden" value="{{ $entrada->id }}" id="id" name="id"/>
                                <input type="hidden" value="" id="id_prod" name="id_prod"/>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="opacity-75">Producto:</label>
                                        <input type="text" class="form-control" placeholder="Codigo del producto" id="cve_prod" name="cve_prod" autocomplete="off"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="opacity-75">Costo:</label>
                                        <input type="text" class="form-control" placeholder="Precio de compra del producto" id="costo" name="costo" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
                                        <label class="opacity-75">Descripción:</label>
                                        <input type="text" class="form-control" placeholder="Descripción general del producto" id="general" name="general" autocomplete="off"/>
                                    </div>
                                </div>   
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label class="opacity-75">Cantidad:</label>
                                        <input type="text" class="form-control" placeholder="Cantidad total de producto en factura" id="cant_prod" name="cant_prod" autocomplete="off"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="opacity-75">Costo total:</label>
                                        <input type="text" class="form-control" placeholder="Precio total de producto en factura" id="costo_prod" name="costo_prod" autocomplete="off"/>
                                    </div>
                                </div>
                                <div class="form-group row">                                
                                    <div class="col-md-12">
                                        <label class="opacity-75">Observaciones:</label>
                                        <input type="text" class="form-control" placeholder="Observaciones en el producto" id="nota_prod" name="nota_prod" autocomplete="off"/>
                                    </div>
                                </div>
                            </form>                            
                            <div class="col-md-12 text-right">
                                <button id="close-form" name="close-form" type="button" class="btn btn-sm btn-light-danger"> Cancelar</button>
                                <button type="button" class="btn btn-sm btn-light-success" id="agregar-ent-prod" name="agregar-ent-prod"> Agregar</button>
                            </div>
                        </div>
                        <br><br>
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table" id="entrada-productos-table">
                                    <thead>
                                        <tr>
                                            <th class="pl-0 font-weight-boldest text-uppercase">Producto</th>
                                            <th class="text-right font-weight-boldest text-uppercase">Cantidad</th>
                                            <th class="text-right font-weight-boldest text-uppercase">Total</th>
                                            <th class="pr-0 font-weight-boldest text-uppercase">Observaciones</th>
                                            <th class="pr-0 font-weight-boldest text-uppercase">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody id="tbody-productos">
                                        @if (count($entrada_productos) > 0)
                                        @foreach ($entrada_productos as $ent_prod)
                                        <tr class="font-weight-boldest font-size-lg" id="{{ $ent_prod->producto }}">
                                            <td class="pt-4"> {{ $ent_prod->producto }} </td> 
                                            <td class="text-right pt-4"> {{ $ent_prod->cantidad }} </td> 
                                            <td class="text-right pt-4">$ {{ $ent_prod->costo_total }} </td> 
                                            <td class="pt-4"> {{ $ent_prod->comentario }} </td> 
                                            <td><button type="button" class="btn btn-danger" name="borrar-producto" id="borrar-producto" onclick="editar_entrada_producto({{ $ent_prod->entrada_id }}, {{ $ent_prod->producto_id }});">-</button>
                                                <button type="button" class="btn btn-info" name="editar_producto" id="editar-producto" onclick="editar_entrada_producto({{ $ent_prod->entrada_id }}, {{ $ent_prod->producto_id }});">editar</button>
                                            </td> 
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="font-weight-bold font-size-lg" id="empty-ent-prod">
                                            <td class="text-center pt-4"> No existen productos en la entrada </td> 
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end: Invoice body-->
                    <!-- begin: Invoice footer-->
                    {{-- <div class="row justify-content-center bg-gray-100 py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-9">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="font-weight-bold text-muted text-uppercase">BANK</th>
                                            <th class="font-weight-bold text-muted text-uppercase">ACC.NO.</th>
                                            <th class="font-weight-bold text-muted text-uppercase">DUE DATE</th>
                                            <th class="font-weight-bold text-muted text-uppercase">TOTAL AMOUNT</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr class="font-weight-bolder">
                                            <td>BARCLAYS UK</td>
                                            <td>12345678909</td>
                                            <td>Jan 07, 2018</td>
                                            <td class="text-danger font-size-h3 font-weight-boldest">20,600.00</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end: Invoice footer-->
                    <!-- begin: Invoice action-->
                    {{-- <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0">
                        <div class="col-md-9">
                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                                <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>
                            </div>
                        </div>
                    </div> --}}
                    <!-- end: Invoice action-->
                    <!-- end: Invoice-->
                </div>
            </div>
            <!-- end::Card-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
@endsection
@section('scripts')
    <script src="{{ URL::asset('js/inventario/entradas/ver-entrada.js?v=1.0.0') }}" type="text/javascript"></script>
@endsection