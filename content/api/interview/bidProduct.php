<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post); 

$sql = "INSERT INTO auction(productId, userId, price, status) values(?, ?, ?, ?)";



$stmt = $mysqli->prepare($sql);
$stmt->bind_param("iiii", $productId, $userId, $price, $status);

$productId = $_GET['id'];
$userId = $_GET['user'];
$price = $_GET['price'];
$status = 1;
$amount = $post->amount;
$price += $amount;

$sql = "UPDATE auction SET status = 0 where productId = '" . $productId . "' and status = 1";
$mysqli->query($sql);

$stmt->execute();

$success = 'Bid Successfully';
$data['success'] = $success;

echo json_encode('$data');


?>