<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT merchants.merchantId, merchantname, email, phone, type, zipcode, province, district, commune, address
			from merchants
			INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
			INNER join address on address.addressId = merchantaddress.addressId WHERE merchants.merchantId = '".$id."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>