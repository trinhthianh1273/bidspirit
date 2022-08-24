<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$username = $post->username;
$email = $post->email;
$phone = $post->phone;
$pass = $post->pass;
$keypass = md5($pass.strrev($pass));
$company = $post->company;
$payment = $post->payment;
$zipcode = $post->zipcode;
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;



$sqlU = "INSERT into users(username, email, phone, pass, keypass, company, payment) values(?,?,?,?,?,?,?);";
$sqlU = $mysqli->prepare($sqlU);
$stmtU->bind_param("ssssssss", $username, $email, $phone, $pass, $keypass, $type, $company, $payment);

$sqlA = "INSERT INTO address(zipcode, province, district, commune, address) values(?,?,?,?,?);";
$stmtA = $mysqli->prepare($sqlA);
$stmtA->bind_param("sssss", $zipcode, $province, $district, $commune, $address);


$sqlUM = "INSERT INTO useraddress(userId, addressId) values(?,?);";
$stmtUM = $mysqli->prepare($sqlUM);
$stmtUM->bind_param("ii", $userId, $addressId);



$result = $mysqli->query("SELECT count(userId) from users where email = $email or phone=$phone");
if($result->num_rows == 0) {
	$stmtU->execute();
	$userId = $stmtU->insert_id;

	$stmtA->execute();
	$addressId = $stmtA->insert_id;

	$sqlUM->execute();

	$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
         	from users
        	INNER join useraddress on users.userId = useraddress.userId
        	INNER join address on address.addressId = useraddress.addressId
            Order by userId desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data = $result->fetch_assoc();
	echo json_encode($data);
}

// if($mysqli->query($sql) == true) {
// 	$last_user = $mysqli->insert_id;
// 	$sql = "INSERT INTO address(zipcode, province, district, commune, address) values
// 			('" .$post->zipcode . "', '" .$post->province . "', '" . $post->district . "', '" . $post->commune . "', '" . $post->address ."');";

// 	$mysqli->query($sql);
// 	$last_address = $mysqli->insert_id;

// 	$sql = "INSERT INTO useraddress(userId, addressId) values ('" .$last_user. "', '" .$last_address. "');";
// 	$mysqli->query($sql);


// 	$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
//         from users
//         INNER join useraddress on users.userId = useraddress.userId
//         INNER join address on address.addressId = useraddress.addressId
//          Order by userId desc LIMIT 1"; 
// 	$result = $mysqli->query($sql);
// 	$data = $result->fetch_assoc();
// 	echo json_encode($data);
// }
	

?>