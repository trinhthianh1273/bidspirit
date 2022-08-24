<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);
$merchantname = $post->merchantname;
$email = $post->email;
$phone = $post->phone;
$type = $post->type;
$province = $post->province;
$district = $post->district;
$commune = $post->commune;
$address = $post->address;


$sqlM = ("UPDATE merchants SET merchantname = ?, email = ? ,phone = ?, type = ?, updateDate=NOW() WHERE merchantId = ?");
$stmtM = $mysqli->prepare($sqlM);
$stmtM->bind_param("ssssi", $merchantname, $email, $phone, $type, $id);

$sqlA = ("UPDATE address SET province= ?, district= ?, commune= ?, address= ?, updateDate=NOW()
        WHERE addressId = (
            SELECT addressId FROM merchants INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
            WHERE merchants.merchantId = ?);");
$stmtA = $mysqli->prepare($sqlA);
$stmtA->bind_param("ssssi", $province, $district, $commune, $address, $id);

$stmtM->execute();
$stmtA->execute();

$sql = "SELECT * FROM merchants WHERE merchantId = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>