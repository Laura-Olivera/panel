<div class="col-xl-12">
    <div class="card card-custom gutter-b">
        <div class="card-header">
            <div class="card-title">
                <h4 class="card-label">Folio: {{$anexo->cve_anexo}}</h4>
                @if ($filename = $anexo->filename)
                <a class="btn btn-icon" href="{{URL::to('documentos/'.$anexo->fac_path.'/'.$filename)}}" title="Factura digital" target="_blank"><i class="icon-xl far fa-file-pdf text-primary"></i></a>
                @endif
            </div>
            <div class="card-toolbar">
                <a class="btn btn-icon" href="javascript:void(0);" onclick="edit_anexo_entrada({{$anexo->id}})" title="Editar"><i class="icon-2x far fa-edit text-primary"></i></a>
                <a class="btn btn-icon" href="javascript:void(0);" onclick="delete_anexo_entrada({{$anexo->id}})" title="Eliminar"><i class="icon-2x far fa-trash-alt text-primary"></i></a>
                <a class="btn btn-icon" href="{{URL::to('entradas/editar/'.$entrada->cve_entrada)}}" title="Descargar"><i class="icon-2x fas fa-download text-primary"></i></a>
                <a class="btn btn-icon" href="{{URL::to('entradas/editar/'.$entrada->cve_entrada)}}" title="Imprimir"><i class="icon-2x fas fa-print text-primary"></i></a>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row align-items-start">
                <div class="col-xl-6">
                    <label class="opacity-80">Fecha de emisión</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->fac_fecha_emision }}</p>
                </div>
                <div class="col-xl-6">
                    <label class="opacity-80">Fecha de operacion</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->fac_fecha_operacion }}</p>
                </div>
            </div>
            <div class="form-group row align-items-start">                
                <div class="col-xl-6">
                    <label class="opacity-80">total</label>
                    <p class="font-weight-bolder mb-2">$ {{ $anexo->fac_total }}</p>
                </div>
                <div class="col-xl-6">
                    <label class="opacity-80">Importe total en letra</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->fac_total_letra }}</p>
                </div>
            </div>
            <div class="form-group row align-items-start">                
                <div class="col-xl-6">
                    <label class="opacity-80">Forma de pago</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->fac_forma_pago }}</p>
                </div>
            </div>
            <div class="form-group row align-items-start">
                <div class="col-xl-6">
                    <label class="opacity-80">Observaciones de la factura</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->fac_notas }}</p>
                </div>
            </div>
            <div class="form-group row align-items-start">
                <div class="col-xl-6">
                    <label class="opacity-80">Observaciones del anexo</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->anexo_notas }}</p>
                </div>
            </div>
            <div class="form-group row align-items-start">
                <div class="col-xl-6">
                    <label class="opacity-80">Registro</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->created_user }}</p>
                </div>
                <div class="col-xl-6">
                    <label class="opacity-80">Modifico</label>
                    <p class="font-weight-bolder mb-2">{{ $anexo->updated_user }}</p>
                </div>
            </div>
            <br><br>
        </div>
    </div>
</div>