<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$sql = "SELECT * from orderauction order by status asc";
$result = $mysqli->query($sql);
while($row = $result->fetch_assoc()) {
    $json[] = $row;
}
$data['order'] = $json;
echo json_encode($data);


?>