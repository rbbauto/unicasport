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
                "unit_price"	=>	$producto['precio'],
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
		    "number" => $data['pedido']['cuit']
		  );
		  $payer->address = array(
		    "street_name" => $data['pedido']['direccion'],
		    "street_number" => $data['pedido']['numero'],
		    "zip_code" => $data['pedido']['cp']
		  );
		  // ...

		// Crea un objeto de preferencia
		$preference = new MercadoPago\Preference();
		$preference->back_urls = array(
		    "success" => "localhost/unicasport/cobro.php?checkout=go",
		    "failure" => "localhost/unicasport/cobro.php?checkout=stp",
		    "pending" => "localhost/unicasport/cobro.php?checkout=std"
		);
		

		if ($data['envio'] == "correo") 
		{
			//Dados do Frete
			$shipments = new MercadoPago\ Shipments();
			$shipments->cost = $data['pedido']['costoEnvio'];
			$shipments->receiver_address = array(
				"zip_code" => $data['pedido']['cp'],
				"street_number" => $data['pedido']['numero'], 
				"street_name" => $data['pedido']['direccion'],
				"floor" => 0,
				"apartment" => ""
			);	# code...
		}
		

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
		if ($data['envio'] == "correo") $preference->shipments= $shipments;
		$preference->save();
		
	}
	 
 ?>
	<a class="btn btn-success"href="<?php echo $preference->init_point; ?>">Pagar</a> con Mercado Pago
	

