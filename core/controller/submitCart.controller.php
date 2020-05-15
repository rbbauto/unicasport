<?php 
	$data=json_decode(file_get_contents("php://input"),true);

	if ((strlen($data['envio']) > 5) && (count($data['carrito']) > 0) && (count($data['pedido']) > 13)) 
	{
		require 'mp/vendor/autoload.php';

		// Agrega credenciales
		MercadoPago\SDK::setAccessToken('TEST-2186469796881808-091801-d02c2f707d432b1722950e4f14e1da1f-267036991');

		$items= array();
		// Crea un array de ítems en la preferencia
		foreach ($data['carrito'] as $producto) 
		{
			
		
        	$items[]= array(
           		"title"			=>	$producto['nombre'],
                "quantity"		=>	$producto['cantidad'],
                "currency_id"	=>	"ARS",
                "unit_price"	=>	intval($producto['precio']),
                "id"			=>	$producto['id'],
                "description"	=>	$producto['descripcion'],
                "picture_url"	=>	$producto['imagen']);
                            
                }
		

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

		$preference->external_reference = gethostname();
		$preference->auto_return = "approved";
		$preference->binary_mode = true; 

		$preference->items = $items;
		$preference->save();
		
	}
	 
 ?>
<div class="form-row float-right">
	<a class="btn btn-info"href="<?php echo $preference->init_point; ?>">Pagar</a>
</div>