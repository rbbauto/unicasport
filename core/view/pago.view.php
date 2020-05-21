<div class="card" ng-if="carrito.length > 0">
        <div class="card-header bg-dark bg-custom" id="headingThree">
            <a class="menu_links text-muted">
            <h3 class="col-md-12" data-toggle="collapse" data-target="#pago" aria-expanded="true" aria-controls=" collapseOne">
             4 Pago <i id="checkPago" class="fas fa-check text-success invisible"></i>
            </h3>  
            </a>
        </div>
        <div id="pago" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <p>
                    <i class="text-muted">Articulo/s:</i> {{ getCantItemsCart()}}
                </p>
                <p ng-if="envio == 'correo'">
                    <i class="text-muted">Subtotal:</i> {{ getTotal() |currency:'$'}}ARS
                </p>
                <p ng-if="envio == 'correo'">
                    <i class="text-muted">Envio: </i> {{ pedido.costoEnvio |currency:'$'}}ARS
                </p>
                <p ng-if="envio == 'correo'">
                    <i class="text-muted">Total: </i> {{ (getTotal() + pedido.costoEnvio) |currency:'$'}}ARS
                </p>
                <p ng-if="envio == 'noEnvio'">
                    <i class="text-muted">Total: </i> {{ getTotal() |currency:'$'}}ARS
                </p>

                <div id="metodosPago">
                    <h3 class="cursor col-md-12 text-center alert alert-secondary">Tarjeta / Mercado Pago</h3>
                    <div  class="showMethod">
                        <button ng-click="finalizarCompra()" class="btn btn-info">Procesar Pago</button>
                        <hr>
                        <strong id="resultPago"></strong>
                        <hr>
                    </div>
                    <h3 class="cursor col-md-12 text-center alert alert-secondary">Transferencia Bancaria</h3>
                    <h4 class="showMethod">en construcción</h4>
                </div>
            </div>
            
        </div> <!-- /id=pago-->
    
</div> 