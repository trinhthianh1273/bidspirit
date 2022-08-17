<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT  productname, products.description,categoryname, productImage1, productImage2, productImage3, basePrice, price, username, startDate, endDate from products
        inner join category on products.categoryId = category.categoryId
        inner join orderauction on products.productId = orderauction.productId
        INNER join users on orderauction.userId = users.userId
        WHERE products.status=-1";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['closedauction'] = $json;
echo json_encode($data);


?>