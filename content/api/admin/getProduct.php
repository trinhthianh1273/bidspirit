<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT * from products order by startDate asc ";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['product'] = $json;
echo json_encode($data);


?>