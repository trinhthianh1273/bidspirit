<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE merchants SET merchantname = '".$post->merchantname."', email = '".$post->email."',phone = '".$post->phone."', updateDate=NOW() WHERE merchantId = '".$id."'";

$result = $mysqli->query($sql);

$sql = "UPDATE address SET province= '".$post->province."', district= '".$post->district."', commune= '".$post->commune."', address= '".$post->address."', updateDate=NOW()
        WHERE addressId = (
            SELECT addressId FROM merchants INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
            WHERE merchants.merchantId = '".$id."');";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM merchants WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>