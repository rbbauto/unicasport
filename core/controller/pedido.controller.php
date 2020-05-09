<?php 
	require_once"administracion/core/model/pedido.class.php";

	$pedido=new Pedido();
	
	$productos=$pedido->getItems();
 ?>