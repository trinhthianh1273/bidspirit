<?php
	require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';

	$id  = $_GET["id"];
	$sql = "SELECT users.userId, username, email, phone,zipcode, province, district, commune, address
			from users
			INNER join useraddress on users.userId = useraddress.userId
			INNER join address on address.addressId = useraddress.addressId WHERE users.userId = '".$id."'"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	
	echo json_encode($data);
?>