<div class="card" ng-if="carrito.length > 0">
   	<div class="card-header bg-dark bg-custom" id="headingThree">
        <a class="menu_links text-muted">
        <h3 class="col-md-12" data-toggle="collapse" data-target="#envio" aria-expanded="true" aria-controls=" collapseOne">
        3 Metodo de Envio <i id="checkEnvio" class="fas fa-check text-success invisible"></i>
        </h3>  
    	</a>
    </div>
    <div id="envio" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
	    <div class="card-body">
	    	<form>
			    <div class="radio">
			    	<div class="row">
			    		<div class="col-md-2">
			    			<label>
			    				<input ng-model="envio" type="radio" value="correo" ng-change="setEnvio()">
			    			</label>
			    		</div>
			    		<div class="col-md-2">
			    			<img src="assets/img/default/MercadoEnvio.jpg" class="imgInfoCarrito">
			    		</div>
			    		<div class="col-md-8">
			    			<p ng-if="pedido.costoEnvio != undefined">
			    				$<input class="col-xs-2 no-border" size="9" type="text" ng-model="pedido.costoEnvio"ng-readonly="true">
			    			</p>
			    			<p><i>(Mercado Envios) </i><strong class="text-success" id="estimatedSend"></strong></p>
			    		</div>
			    	</div>
			    </div>
			    <hr>
			    <div class="radio">
			    	<div class="row">
			    		<div class="col-md-2">
			    			<label>
			    				<input ng-model="envio" type="radio" value="noEnvio" ng-change="setEnvio()">
			    			</label>
			    		</div>
			    		<div class="col-md-2">
			    			<img src="assets/img/default/fabrica.jpg" class="imgInfoCarrito">
			    		</div>
			    		<div class="col-md-6">
			    			Retirar en Fabrica	
			    		</div>
			    	</div>
			    </div>
			    <div class="float-right">
			    	<button class="btn btn-success"
			    			data-toggle="collapse" 
                            data-target="#pago" 
                            aria-expanded="true">
			    		Continuar
			    	</button>
			    </div>
    
  			</form>           
	    </div>
    </div>
</div>