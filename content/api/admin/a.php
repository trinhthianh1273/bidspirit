<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
session_start();

echo $_SESSION['alogin'];
echo '<br/>';

$username = "trinhlinh";
$email = "abc1@gmail.com";
$pass = "Linh@123";
$phone = "01696766853";
$company ="";
$payment = "";
$zipcode = 42000;
$province = "nam dinh";
$district = "xuan truong";
$commune ="xuan kien";
$address = "xom 12b";

echo md5(strrev('Test@123') . 'Test@123');
echo '<br/>';

$p = 'Test@123';
$p = md5(strrev($p).$p);
echo $p;
	

// $sql = "SELECT addressId FROM address
// 		WHERE addressId = (
//             SELECT addressId FROM users INNER join useraddress on users.userId = useraddress.userId
//             WHERE users.userId = '6');";

$sql = "SELECT adminId from admin where adminId = '" . $_SESSION['alogin'] ."' AND pass = '" .$p. "'";



// if($mysqli->query($sql) == true) {
// 	$last_user = $mysqli->insert_id;
// 	$sql = "INSERT INTO address(zipcode, province, district, commun, address) values
// 			('" .$zipcode . "', '" .$province . "', '" . $district . "', '" . $commune . "', '" . $address ."');";

// 	$mysqli->query($sql);
// 	$last_address = $mysqli->insert_id;

// 	$sql = "INSERT INTO useraddress(userId, addressId) values ('" .$last_user. "', '" .$last_address. "'	);";
// 	$mysqli->query($sql);


// 	$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
//         from users
//         INNER join useraddress on users.userId = useraddress.userId
//         INNER join address on address.addressId = useraddress.addressId
//          Order by userId desc LIMIT 1;"; 
// 	$result = $mysqli->query($sql);
// 	$data = $result->fetch_assoc();
	
// 	echo json_encode($data);
// }

		$result = $mysqli->query($sql);
		$data = $result->fetch_assoc();
		echo $data['adminId'];


?>