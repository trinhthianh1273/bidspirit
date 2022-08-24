<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$sql = "SELECT products.productId, productname, products.description,categoryname, productImage1, productImage2, productImage3, basePrice, startDate, endDate from products
        inner join category on products.categoryId = category.categoryId
        WHERE products.status=1";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['upcomingauction'] = $json;
echo json_encode($data);


?>