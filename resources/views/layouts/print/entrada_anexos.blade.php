<!-- <html>
    <head>
        <meta charset="utf-8" />
		<title>{{ $entrada->cve_entrada }}</title>
		<meta name="description" content="Invoice example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		
    </head>
    <body>
        
    </body>
</html> -->
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>{{ $entrada->cve_entrada }}</title>
    <style>
      /* @import url(http://fonts.googleapis.com/css?family=Bree+Serif); */
      body, h1, h2, h3, h4, h5, h6{
      /* font-family: 'Bree Serif', serif; */
      }
      span, h4, .letra {
          font-family: "Times New Roman";
          font-size: 10px;
      }
      .titulo {
          font-family: "Arial Narrow", Arial, sans-serif;
          font-size: 12px;
          white-space: pre;
      }
      .titulopie {
          font-family: Tahoma, Verdana, Segoe, sans-serif;
          font-size: 12px;
          white-space: pre;
      }
      .row > .sinespacio {
          display: inline-block;
          margin: 0;
          float: left;
          white-space: nowrap;
      }
      .row > .limpiar {
          clear: both;
      }
      table {
          border: 0px;
          border-spacing: 0px;
          border-collapse: collapse;
      }
      td, th {
          padding: 0px;
          border: 0px;
          margin: 0px;
      }
      .izq {
          text-align: right;
      }
      .borde {
          border-style: solid;
          border-width: 1px;
          border-color: black;
          padding-bottom: 3px;
      }

      @page { size:8.5in 11in; margin: 1cm }
    </style>
  </head>
  
  <body>
    <div class="container">
      <div class="row">
          <!-- <div class="col-xs-4"><img src="images/logo.png"></div>
          <div class="col-xs-4"><img src="images/direccion.png"></div>
          <div class="col-xs-4"><img src="images/factura.png"></div> -->
      </div>
        <hr>
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Nro. Factura:       </div>
            </div>
            <div class="col-xs-2">
                <div id="numerofactura"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">Autorizacion:       </div>
            </div>
            <div class="col-xs-5">
                <div id="numeroauto"></div>
            </div>
        </div>   
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Fecha Emision: </div>
            </div>
            <div class="col-xs-2">
                <div id="fechaemision"></div>
            </div>
            <div class="col-xs-2">
                <div class="titulo">RUC Cliente:   </div>
            </div>
            <div class="col-xs-5">
                <div id="rucCliente"></div>
            </div>
        </div>  
       
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Telefono:      </div>
            </div>
            <div class="col-xs-2">
                <div id="telefono"></div>
            </div>            
            <div class="col-xs-2">
                <div class="titulo">Direccion:     </div>
            </div>
            <div class="col-xs-5">
                <div id="direccion"></div>
            </div>
        </div>          
        <div class="row">
            <div class="col-xs-2">
                <div class="titulo">Nombres/Razon: </div>
            </div>
            <div class="col-xs-6">
                <div id="razon"></div>
            </div>
        </div>    
        
        <table class="table table-bordered">
        <thead>
          <tr>
              <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;Codigo&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Descripcion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;Cant.&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;P.Unit.&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;Dscto.&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
        <th><h4 class="titulo">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Subtotal&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h4></th>
          </tr>
        </thead>
        <tbody>
          <tr>
              <td class="codigo"></td>
              <td class="descripcion"></td>
              <td class="cantidad izq"></td>
              <td class="precio izq"></td>
              <td class="descuento izq"></td>
              <td class="subtotal izq"></td>
          </tr>
        </tbody>
      </table>
        <div class="row sinespacio">
             <div class="col-xs-3">
                <div><img src="images/blanco.png"></div>
            </div>
            <div class="col-xs-3">
                <div id="blanco1"></div>
            </div>
            <div class="col-xs-3">
                <div>Total Sin Impto.:   </div>
            </div>
            <div class="col-xs-3">
                <div class="izq borde" id="totalSinImpto"></div>
            </div>          
        </div>
        <div class="row sinespacio">
             <div class="col-xs-3">
                <div><img src="images/blanco.png"></div>
            </div>
            <div class="col-xs-3">
                <div id="blanco2"></div>
            </div>
            <div class="col-xs-3">
                <div>Impuesto 12%:       </div>
            </div>
            <div class="col-xs-3">
                <div class="izq borde" id="valorImpto12"></div>
            </div>          
        </div>    
<!--        <div class="row sinespacio">
             <div class="col-xs-3">
                <div><img src="images/blanco.png"></div>
            </div>
            <div class="col-xs-3">
                <div id="blanco3"></div>
            </div>
            <div class="col-xs-3">
                <div>Impuesto 0%:        </div>
            </div>
            <div class="col-xs-3">
                <div class="izq borde" id="valorImpto0"></div>
            </div>          
        </div>  -->
        <div class="row sinespacio">
             <div class="col-xs-3">
                <div><img src="images/blanco.png"></div>
            </div>
            <div class="col-xs-3">
                <div id="blanco4"></div>
            </div>
            <div class="col-xs-3">
                <div>Valor a Pagar:      </div>
            </div>
            <div class="col-xs-3">
                <div class="izq borde" id="apagar"></div>
            </div>          
        </div>
        <div class="row limpiar"></div>
        <!-- <div class="row">
            <div class="col-xs-4">
                <div><img src="images/favor.png"></div>
            </div>
            <div class="col-xs-1"><img src="images/blanco.png"></div>
            <div class="col-xs-2">
                <div><img src="images/recibiConforme.png"></div>
            </div>
            <div class="col-xs-1"><img src="images/blanco.png"></div>
            <div class="col-xs-2">
                <div><img src="images/aceptado.png"></div>
            </div>
        </div> -->
        <div class="row">
            <div class="col-xs-8 titulopie">
                Debo y pagare incondicionalmente a la orden de _____ la cantidad de _________ en esra ciudad de Quito
                En  caso de  mora me  comprometo a  pagar el interes del _____ anual  desde su  vencimiento  hasta la 
                cancelacion  de  la  deuda. En  el evento de juicio me someto a los jueces de la ciudad de Quito y al 
                procedimiento  ejecutivo  o  verbal  sumario a eleccion de _____ sin protesto eximese de presentacion 
                para el pago y de aviso por falta del mismo. 
            </div>
        </div>
        <div class="row">
            <div class="col-xs-5 titulopie">
                QUITO, ______ DE ____________ DEL ______</div>
            <div class="col-xs-1"><img src="images/blanco.png"></div>
            <div class="col-xs-2">
                <img src="images/cliente.png">
            </div>
        </div>
    </div>
  </body>
</html>