<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id = $_GET['id'];


$sql = "SELECT username, email, phone, payment,company, zipcode,province, district, commune, address  from users 
        inner join useraddress on users.userId = useraddress.userId
        inner join address on useraddress.addressId = address.addressId  
        WHERE users.userId = '" . $id . "'";
$result = $mysqli->query($sql);

while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['profile'] = $json;
echo json_encode($data);


?>