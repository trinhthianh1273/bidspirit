<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$sql = "SELECT addressId FROM address
		WHERE addressId = (
            SELECT addressId FROM merchants INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
            WHERE merchants.merchantId = '".$id."');";
$result = $mysqli->query($sql);


$sql = "DELETE FROM merchantaddress where merchantId = '".$id."'";
$result = $mysqli->query($sql);



$sql = "DELETE FROM address
		WHERE addressId = '".$data['addressId']."';";
$result = $mysqli->query($sql);



$sql = "DELETE FROM merchants where merchantId = '".$id."'";
$result = $mysqli->query($sql);

echo json_encode([$id]);



?>