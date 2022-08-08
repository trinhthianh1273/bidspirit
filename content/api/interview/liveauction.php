<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT productId, merchantId, productname,description, productImage1, productImage2, productImage3,categoryname,basePrice, startDate, endDate
        from products
        inner join category on products.categoryId = category.categoryId
        WHERE status = 0";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['liveauction'] = $json;
echo json_encode($data);


?>