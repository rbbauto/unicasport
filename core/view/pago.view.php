<?php
/*
// SDK de Mercado Pago
require 'mp/vendor/autoload.php';

// Agrega credenciales
MercadoPago\SDK::setAccessToken('TEST-2186469796881808-091801-d02c2f707d432b1722950e4f14e1da1f-267036991');

// Crea un objeto de preferencia
$preference = new MercadoPago\Preference();
$preference->back_urls = array(
    "success" => "?estado=1",
    "failure" => "?estado=0",
    "pending" => "?estado=2"
);

$preference->payment_methods = array(
    "excluded_payment_types" => array(
    array("id" => "ticket")
  ),
  "installments" => 12
);

$preference->external_reference = $_SESSION["IdUsuario"];
$preference->auto_return = "approved";
$preference->binary_mode = true; 

// Crea un ítem en la preferencia
$item = new MercadoPago\Item();
$item->title = 'Carga de Creditos';
$item->quantity = 1;
$item->unit_price = $_SESSION["MercadoPago"];


$preference->items = array($item);
$preference->save();

*/
?>
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
            	<div class="form-row float-right">
                    <a class="btn btn-info"href="<?php echo $preference->init_point; ?>">Pagar</a>
            	</div>    
            </div>
            
        </div>
    
</div>