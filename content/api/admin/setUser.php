<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$sql = "UPDATE users SET username = '".$post->username."', email = '".$post->email."',phone = '".$post->phone."', updateDate=NOW() WHERE userId = '".$id."'";

$result = $mysqli->query($sql);

$sql = "UPDATE address SET province= '".$post->province."', district= '".$post->district."', commune= '".$post->commune."', address= '".$post->address."', updateDate=NOW()
        WHERE addressId = (
            SELECT addressId FROM users INNER join useraddress on users.userId = useraddress.userId
            WHERE users.userId = '".$id."');";
$result = $mysqli->query($sql);

$sql = "SELECT * FROM users WHERE id = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>