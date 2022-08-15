<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$sql = "SELECT addressId FROM address
		WHERE addressId = (
            SELECT addressId FROM users INNER join useraddress on users.userId = useraddress.userId
            WHERE users.userId = '".$id."');";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();


$sql = "DELETE FROM useraddress where userId = '".$id."'";
$mysqli->query($sql);



$sql = "DELETE FROM address
		WHERE addressId = '".$data['addressId']."';";
$mysqli->query($sql);



$sql = "DELETE FROM users where userId = '".$id."'";
$result = $mysqli->query($sql);

echo json_encode([$id]);


?>