<?php 
	$data=json_decode(file_get_contents("php://input"),true);

	if (isset($data['nombre']) && isset($data['contrasenia'])) {
		require_once"../../administracion/core/model/library.class.php";
		$crud = new Crud();

		$pass=md5($data['contrasenia']);

		$result= $crud->checkLoginCliente($data['nombre'],$pass);

		$result[0]['password']="";
		
		echo json_encode($result[0]);

		
		
	}
?>