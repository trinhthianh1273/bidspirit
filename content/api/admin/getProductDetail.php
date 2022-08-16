<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT productname, description, basePrice, status
			from products WHERE productId = '".$id."'"; 

	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>