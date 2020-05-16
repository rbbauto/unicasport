<?php 
	$data=json_decode(file_get_contents("php://input"),true);

	if ((strlen($data['envio']) > 5) && (count($data['carrito']) > 0) && (count($data['pedido']) > 13)) 
	{
		require 'mp/vendor/autoload.php';

		// Agrega credenciales
		MercadoPago\SDK::setAccessToken('TEST-633745925553658-051611-eb9797460c877042e2cf0920c8d88c06-569072434');

		$items= array();
		// Crea un array de ítems en la preferencia
		foreach ($data['carrito'] as $producto) 
		{
			
		
        	$items[]= array
        	(
           		"title"			=>	$producto['nombre'],
                "quantity"		=>	$producto['cantidad'],
                "currency_id"	=>	"ARS",
                "unit_price"	=>	intval($producto['precio']),
                "id"			=>	$producto['id'],
                "description"	=>	$producto['descripcion'],
                "picture_url"	=>	$producto['imagen']);
        	}
		
         // ...
		  $payer = new MercadoPago\Payer();
		  $payer->name = $data['pedido']['nombre'];
		  $payer->surname = $data['pedido']['apellido'];
		  $payer->email = $data['pedido']['email'];
		  //$payer->date_created = "2018-06-02T12:58:41.425-04:00";
		  $payer->phone = array(
		    "area_code" => "",
		    "number" => $data['pedido']['telefono']
		  );
		  $payer->identification = array(
		    "type" => "DNI",
		    "number" => "12345678"
		  );
		  $payer->address = array(
		    "street_name" => $data['pedido']['direccion'],
		    "street_number" => 1236,
		    "zip_code" => "86084"
		  );
		  // ...

		// Crea un objeto de preferencia
		$preference = new MercadoPago\Preference();
		$preference->back_urls = array(
		    "success" => "localhost/unicasport?estado=1",
		    "failure" => "localhost/unicasport?estado=0",
		    "pending" => "localhost/unicasport?estado=2"
		);
		

		//Dados do Frete
		$shipments = new MercadoPago\ Shipments();
		$shipments->cost = 420.23;
		$shipments->receiver_address = array(
			"zip_code" => "4247",
			"street_number" => 1552,
			"street_name" => "Saraiva Travessa",
			"floor" => 6,
			"apartment" => "C"
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
		 $preference->payer = $payer; 
		$preference->items = $items;
		$preference->shipments= $shipments;
		$preference->save();
		
	}
	 
 ?>
<div class="form-row float-right">
	<a class="btn btn-info"href="<?php echo $preference->init_point; ?>">Pagar</a>
</div>
<pre><?php var_dump($preference); ?></pre>