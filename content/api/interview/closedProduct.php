<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$sql = "SELECT products.productId, users.username, productname, products.description, productImage1, productImage2, productImage3,categoryname,basePrice, price, startDate, endDate
        from products
        inner join category on products.categoryId = category.categoryId
        inner join orderauction on products.productId = orderauction.productId
        INNER join users on orderauction.userId = users.userId
        WHERE products.productId = '" . $id . "'";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $json1[] = $row;
    $data['productDetail'] = $json1;
}



$sql = "SELECT merchantname from merchants
        where merchantId IN (SELECT merchantId from products WHERE productId = '" . $id . "')";
$result = $mysqli->query($sql);
if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $json2[] = $row;

    $data['merchant'] = $json2;
}


$sql = "SELECT * from auction 
        inner join products on auction.productId = products.productId
        WHERE auction.productId = '" . $id ."' order by price desc limit 1";
$result = $mysqli->query($sql);

if($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $json3[] = $row;
    $data['productAuction'] = $json3;
}


echo json_encode($data);

?>