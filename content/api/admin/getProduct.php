<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT productId,productname, category.categoryname, products.baseprice, products.status, products.createDate, products.updateDate from products 
        inner join category on products.categoryId = category.categoryId;";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['product'] = $json;
echo json_encode($data);


?>