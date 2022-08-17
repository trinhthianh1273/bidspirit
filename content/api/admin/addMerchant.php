<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);


$sql = "INSERT into merchants(merchantname, email, phone, pass, keypass, type) values 
		('".$post->merchantname."', '" .$post->email. "', '" . $post->phone ."', '" . md5(strrev($post->pass).$post->pass) . "', '" . strrev($post->pass). "', '" . $post->type . "');";

if($mysqli->query($sql) == true) {
	$last_merchant = $mysqli->insert_id;
	$sql = "INSERT INTO address(zipcode, province, district, commune, address) values
			('" .$post->zipcode . "', '" .$post->province . "', '" . $post->district . "', '" . $post->commune . "', '" . $post->address ."');";

	$mysqli->query($sql);
	$last_address = $mysqli->insert_id;

	$sql = "INSERT INTO merchantaddress(merchantId, addressId) values ('" .$last_merchant. "', '" .$last_address. "'	);";
	$mysqli->query($sql);


	$sql = "SELECT merchants.merchantId, username, email, phone,type, province, district, commune, address
        from users
        INNER join merchantaddress on merchantrs.merchantId = merchantaddress.merchantId
        INNER join address on address.addressId = merchantaddress.addressId
         Order by merchantId desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
}


?>