<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$sql1 = "INSERT INTO users(username, email, phone, pass, keypass, company, payment) values(?, ?, ?, ?, ?, ?, ?)";
$stmt1 = $mysqli->prepare($sql1);
$stmt1->bind_param("sssssss", $username, $email, $phone,$pass, $keypass, $company, $payment);

$sql2 = "INSERT INTO address(zipcode, province, district, commune, address) values(?, ?, ?, ?, ?)";
$stmt2 = $mysqli->prepare($sql2);
$stmt2->bind_param("issss", $zipcode, $province, $district, $commune, $address);

$sql3 = "INSERT INTO useraddress(userId, addressId) values(?, ?)";
$stmt3 = $mysqli->prepare($sql3);
$stmt3->bind_param("ii", $userId, $addressId);

$username = $post->username;
$email = $post->email;
$phone = $post->phone;
$pass = $post->pass;
$keypass = strrev($pass);
$pass = md5($keypass.$pass);
$company = $post->company;
$payment = $post->payment;
$zipcode = $post->zipcode;
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;

$sql4 = "SELECT userId from users WHERE email = '" . $email . "' or phone = '" . $phone . "'";
$result = $mysqli->query($sql4);

if($result->num_rows > 0) {
	$data['add_msg'] = "Phone number or Email already exists";
	
	
} else {
	if($username==null || $email==null || $phone==null || $pass==null || $company==null || $payment==null || $zipcode==null || $province==null || $district==null || $commune==null) {
		$data['add_msg'] = "No infomation";
	} else {
		$stmt1->execute();
		$userId = $mysqli->insert_id;
		$stmt2->execute();
			$addressId = $mysqli->insert_id;
		$stmt3->execute();

		$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
			from users
			INNER join useraddress on users.userId = useraddress.userId
			INNER join address on address.addressId = useraddress.addressId
			Order by userId desc LIMIT 1";
				$result = $mysqli->query($sql);
				if($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
					$json[] = $row;
				}
		$data['user'] = $json;
		}
		$data['add_msg'] = "Successfully added new user";
	}
}

		
echo json_encode($data);
	
?>