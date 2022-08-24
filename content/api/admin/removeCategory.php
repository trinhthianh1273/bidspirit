<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];


$sql = "DELETE FROM category where categoryId = '".$id."'";
$result = $mysqli->query($sql);

echo json_encode([$id]);


?>