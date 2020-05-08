<?php
	$data = json_decode(file_get_contents('php://input'), TRUE); 
	
	require_once"../../administracion/core/model/library.class.php";

	
	if (count($data) > 0) {

		$crud = new Crud();
		
		foreach ($data as  $item) {
			$sql=$crud->setItemCart($item['id'], $item['nombre'], gethostname(), $item['precio'], $item['cantidad'], $item['subtotal']);
		}
		if (!$sql) {
			http_response_code(400);
		}
	}

	
?>

