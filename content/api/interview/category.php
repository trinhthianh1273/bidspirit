<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$sql = "SELECT * from category";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $sql = "SELECT count(productId) as count from products WHERE categoryId = '" .$row["categoryId"] . "'";
    $count = $mysqli->query($sql);
    $c = $count->fetch_assoc();
    $row["count"] = $c["count"];
    $json[] = $row;
}
$data['category'] = $json;
echo json_encode($data);


?>