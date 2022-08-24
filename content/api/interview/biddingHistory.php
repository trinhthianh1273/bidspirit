<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$sql = "SELECT	price, auctionTime, username FROM auction 
		inner join users on users.userId = auction.userId
		where productId = '" . $id . "'
		order by price desc
		limit 5";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
    	$json[] = $row;
    }
    
}
$data['biddingHistory'] = $json;
echo json_encode($data);

?>