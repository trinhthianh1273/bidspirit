<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT products.productname, orderauction.orderId, orderauction.createDate, tracking.tracking, tracking.remark
			from orderauction 
			inner join tracking on orderauction.orderId = tracking.orderId
			inner join products on orderauction.productId = products.productId
			WHERE orderauction.orderId = '" . $id . "'
			order by tracking.orderId desc limit 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>