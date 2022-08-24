<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);

$username = $post->username;
$email = $post->email;
$phone = $post->phone;
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;

$sqlU = "UPDATE users SET username = ?, email = ?,phone = ?, updateDate=NOW() WHERE userId = ?";
$stmtU = $mysqli->prepare($sqlU);
$stmtU->bind_param("sssi",$username, $email, $phone, $id);

$sqlA = ("UPDATE address SET province= ?, district= ?, commune= ?, address= ?, updateDate=NOW()
        WHERE addressId = (
            SELECT addressId FROM users INNER join useraddress on users.userId = useraddress.userId
            WHERE users.userId = ?);");
$stmtA = $mysqli->prepare($sqlA);
$stmtA->bind_param("ssssi", $province, $district, $commune, $address, $id);

$stmtU->execute();
$stmtA->execute();

$sql = "SELECT * FROM users WHERE userId = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>