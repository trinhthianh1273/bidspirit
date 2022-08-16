<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);


$sql = "INSERT into users(username, email, phone, pass, keypass, company, payment) values 
		('".$post->username."', '" .$post->email. "', '" . $post->phone ."', '" . md5(strrev($post->pass).$post->pass) . "', '" . strrev($post->pass). "', '" . $post->company . "', '" . $post->payment . "');";

if($mysqli->query($sql) == true) {
	$last_user = $mysqli->insert_id;
	$sql = "INSERT INTO address(zipcode, province, district, commune, address) values
			('" .$post->zipcode . "', '" .$post->province . "', '" . $post->district . "', '" . $post->commune . "', '" . $post->address ."');";

	$mysqli->query($sql);
	$last_address = $mysqli->insert_id;

	$sql = "INSERT INTO useraddress(userId, addressId) values ('" .$last_user. "', '" .$last_address. "');";
	$mysqli->query($sql);


	$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
        from users
        INNER join useraddress on users.userId = useraddress.userId
        INNER join address on address.addressId = useraddress.addressId
         Order by userId desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
}
	

?>