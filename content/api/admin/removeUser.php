<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];
$sql = "DELETE FROM users WHERE userId = '".$id."'";
$result = $mysqli->query($sql);

echo json_encode([$id]);


?>