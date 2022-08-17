<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);

$sql = "UPDATE products SET productname = '".$post->productname."', description = '".$post->description."',basePrice = '".$post->basePrice. "',status = '".$post->status. "', updateDate=NOW() WHERE productId = '".$id."'";

$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);

?>