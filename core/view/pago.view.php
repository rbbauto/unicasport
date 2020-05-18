<div class="card">
        <div class="card-header bg-dark bg-custom" id="headingThree">
            <a class="menu_links text-muted">
            <h3 class="col-md-12" data-toggle="collapse" data-target="#pago" aria-expanded="true" aria-controls=" collapseOne">
             4 Pago <i id="checkPago" class="fas fa-check text-success invisible"></i>
            </h3>  
            </a>
        </div>
        <div id="pago" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
            <div class="card-body">
                <button ng-click="finalizarCompra()" class="btn btn-info">Tarjeta/Mercado Pago</button>
                <hr>
                <p><i class="text-muted">Articulo/s:</i> {{ getCantItemsCart()}}</p>
                <p>
                    <i class="text-muted">Subtotal:</i> {{ getTotal() |currency:'$'}}ARS
                <strong id="resultPago">
                    
                </strong>
                </p>
                <p><i class="text-muted">Envio: </i> {{ pedido.costoEnvio |currency:'$'}}ARS</p>
                <p><i class="text-muted">Total: </i> {{ (getTotal() + pedido.costoEnvio) |currency:'$'}}ARS</p>

            </div>
            
        </div> <!-- /id=pago-->
    
</div>