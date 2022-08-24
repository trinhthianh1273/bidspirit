<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
session_start();

$post = file_get_contents('php://input');
$post = json_decode($post);
$pass = $post->pass;
$keypass = strrev($post->newPass);
$curpass = md5(strrev($post->curPass).$post->curPass);
$newpass = md5(strrev($post->newPass).$post->newPass);
$adminId = $_SESSION['alogin'];


$sql = ("UPDATE admin SET pass = ?, keypass = ? where adminId = ? AND pass = ?");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssis", $newpass, $keypass, $adminId, $curpass);
$stmt->execute();

$sql = "SELECT * from admin where adminId = '" .$_SESSION['alogin']."'";
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>