<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);


$sqlU = ("UPDATE users SET username = ?, payment = ?, company = ?, updateDate = ? where userId = ?");
$stmtU = $mysqli->prepare($sqlU);
$stmtU->bind_param("ssssi", $username, $payment, $company, $updateDate, $id);


$sqlA = ("UPDATE address SET zipcode = ?, province = ?, district = ?, address = ?, commune = ?, updateDate = ?
            where addressId = (SELECT addressId from userAddress where userId = ?);");
$stmtA = $mysqli->prepare($sqlA);
$stmtA->bind_param("isssssi", $zipcode, $province, $district, $address,$commune,$updateDate, $id);


$username = $post->username;
$payment = $post->payment;
$company = $post->company;
$updateDate = date("Y-m-d H:i:s");

$zipcode = intval($post->zipcode);
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;

if($username!=null && $zipcode!=null && $province!=null && $district!=null && $commune!=null) {
    $stmtU->execute();
    $stmtA->execute();
}






?>