<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php'; 

$sql = "SELECT orderauction.orderId, users.username, users.email, users.phone,address.zipcode, address.province, address.district, address.commune, address.address, products.productname, orderauction.price, orderauction.createDate
    from orderauction 
    inner join users on users.userId = orderauction.userId
    inner join useraddress on useraddress.userId = users.userId
    inner join address on address.addressId = useraddress.addressId
    inner join products on products.productId = orderauction.productId
    where orderauction.status = 1;" ; 

$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['data'] = $json;




echo json_encode($data);


?>