<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php'; 

$sql = "SELECT count(orderId) as todayCount from orderauction where DATE(createDate) = " . date("Y-m-d") . "" ; 
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json1[] = $row;
}
$data['todayOrder'] = $json1;

$sql = "SELECT count(orderId) as pendingCount from orderauction where status = 0" ; 
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json2[] = $row;
}
$data['pendingOrder'] = $json2;


$sql = "SELECT count(orderId) as deliverdCount from orderauction where status = 1" ; 
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json3[] = $row;
}
$data['deliveredOrder'] = $json3;


echo json_encode($data);


?>