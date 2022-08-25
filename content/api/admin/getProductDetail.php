<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT productId, productname, description, basePrice, status
			from products WHERE productId = '".$id."'"; 

	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>