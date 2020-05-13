<?php 
	$data=json_decode(file_get_contents("php://input"),true);

	if ($data['contrasenia'] != "")
	{
		require_once"../../administracion/core/model/library.class.php";
		$crud = new Crud();
	}
	

	if ($crud->delPedido($data['email'])) {
		
	}else
	{
		return http_response_code(400);
	}

	if ($data['contrasenia'] != "")
	{
		
		
		if ($crud->setCliente(	$data['nombre'],
							$data['apellido'],
							$data['email'],
							$data['telefono'],
							$data['empresa'],
							$data['cuit'],
							$data['direccion'],
							$data['ciudad'],
							$data['provincia'],
							$data['pais'],
							$data['cp'],
							$data['contrasenia'],
							$data['checkboxFacturarAca'])) 
		{
			return http_response_code(200);
		}else
		{
			return http_response_code(400);
		}
	}else{
		if ($crud->setCliente(	$data['nombre'],
							$data['apellido'],
							$data['email'],
							$data['telefono'],
							$data['empresa'],
							$data['cuit'],
							$data['direccion'],
							$data['ciudad'],
							$data['provincia'],
							$data['pais'],
							$data['cp'],
							$data['contrasenia'],
							$data['checkboxFacturarAca'])) 
		{
			return http_response_code(200);
		}else
		{
			return http_response_code(400);
		}

	}
 ?>
