<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$data = [];

$merchantname = $post->merchantname;
$email = $post->email;
$phone = $post->phone;
$pass = $post->pass;
$keypass = md5(strrev($pass).$pass);
$type = $post->type;
$zipcode = $post->zipcode;
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;



$sqlM = "INSERT into merchants(merchantname, email, phone, pass, keypass, type) values(?,?,?,?,?,?);";
$stmtM = $mysqli->prepare($sqlM);
$stmtM->bind_param("ssssss", $merchantname, $email, $phone, $pass, $keypass, $type);


$sqlA = "INSERT INTO address(zipcode, province, district, commune, address) values(?,?,?,?,?);";
$stmtA = $mysqli->prepare($sqlA);
$stmtA->bind_param("sssss", $zipcode, $province, $district, $commune, $address);


$sqlAM = "INSERT INTO merchantaddress(merchantId, addressId) values(?,?);";
$stmtAM = $mysqli->prepare($sqlAM);
$stmtAM->bind_param("ii", $merchantId, $addressId);

$result = $mysqli->query("SELECT merchantId from merchants where email = '" . $email . "' or phone = '" . $phone ."'");


if($result->num_rows > 0) {

	$data['add_msg'] = "Phone number or Email already exists";
	

} else {

	$stmtM->execute();
	$merchantId = $stmtM->insert_id;

	$stmtA->execute();
	$addressId = $stmtA->insert_id;

	$stmtAM->execute();

	$sql = "SELECT merchants.merchantId, merchantname, email, phone,type, province, district, commune, address
	        from merchants
	        INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
	        INNER join address on address.addressId = merchantaddress.addressId
         	Order by merchantId desc LIMIT 1"; 
	$result = $mysqli->query($sql);
	$data['merchant'] = $result->fetch_assoc();
	$data['add_msg'] = "Successfully added new merchant";
}

echo json_encode($data);



?>