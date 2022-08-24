<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id = $_GET['id'];
$totalBidAmount = 0;

$sql = "SELECT count(orderId) as win from orderauction where userId = '" . $id . "'";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
    $json1[] = $row;
}
$data['win'] = $json1;


$sql = "SELECT count(auctionId) as totalBid from auction where userId = '" . $id . "'";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
    $json2[] = $row;
}
$data['totalBid'] = $json2;


$sql = "SELECT max(price) as totalBidAmount from auction where userId = '" . $id . "' group by productId";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
    $totalBidAmount += $row['totalBidAmount'];
}
$data['totalBidAmount']['totalBidAmount'] = $totalBidAmount;


echo json_encode($data);


?>