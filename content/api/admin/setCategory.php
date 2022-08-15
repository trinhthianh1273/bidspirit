<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE category SET categoryname = '".$post->categoryname."', description = '".$post->description."', updateDate=NOW() WHERE categoryId = '".$id."'";

$result = $mysqli->query($sql);

$sql = "SELECT * FROM category WHERE categoryId = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>