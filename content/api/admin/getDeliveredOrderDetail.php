<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT products.productname, orderauction.orderId
			from orderauction 
			inner join products on orderauction.productId = products.productId
			WHERE orderauction.orderId = '" . $id . "'"; 
	$result = $mysqli->query($sql);
	$data['detail'] = $result->fetch_assoc();


	$sql = "SELECT orderauction.createDate, tracking.tracking, tracking.remark
			from orderauction 
			inner join tracking on orderauction.orderId = tracking.orderId
			WHERE orderauction.orderId = '" . $id . "'
			order by tracking.orderId desc"; 
	$result = $mysqli->query($sql);
	while($row = $result->fetch_assoc()) {
		$json[] = $row;
	}
	$data['tracking'] = $json;
	
	echo json_encode($data);
?>