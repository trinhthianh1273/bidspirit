<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT users.userId, username, email, phone, province, district, commune, address
        from users
        INNER join useraddress on users.userId = useraddress.userId
        INNER join address on address.addressId = useraddress.addressId;";

$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['data'] = $json;
echo json_encode($data);


?>