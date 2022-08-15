<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
session_start();

$post = file_get_contents('php://input');
$post = json_decode($post);
$curpass = md5(strrev($post->curPass).$post->curPass);
$newpass = md5(strrev($post->newPass).$post->newPass);


$sql = "UPDATE admin SET pass = '" . $newpass ."', keypass = '" . strrev($post->newPass). "' where adminId = '" . $_SESSION['alogin'] ."' AND pass = '".$curpass."'";

$mysqli->query($sql);

$sql = "SELECT * from admin where adminId = '" .$_SESSION['alogin']."'";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>