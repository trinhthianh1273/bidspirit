<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT merchants.merchantId, merchantname, email, phone,type, province, district, commune, address
        from merchants
        INNER join merchantaddress on merchants.merchantId = merchantaddress.merchantId
        INNER join address on address.addressId = merchantaddress.addressId;";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['merchant'] = $json;
echo json_encode($data);


?>