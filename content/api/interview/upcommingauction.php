<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT  productname, description,categoryname, productImage1, productImage2, productImage3, basePrice, startDate, endDate from products
        inner join category on products.categoryId = category.categoryId
        WHERE products.status=1";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['upcommingauction'] = $json;
echo json_encode($data);


?>