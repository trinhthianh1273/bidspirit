<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);

$tracking = $post->tracking;
$remark = $post->remark;
$createDate = date("Y-m-d H:i:s");
if($tracking == "Delivered") {
    $status = 1;
} else {
    $status = 0;
}


$sqlT = "INSERT INTO tracking(orderId, tracking, remark, createDate) values(?,?,?,?)";
$stmtT = $mysqli->prepare($sqlT);
$stmtT->bind_param("isss", $id, $tracking, $remark, $createDate);


$sqlO = ("UPDATE orderauction SET status = ?");
$stmtO = $mysqli->prepare($sqlO);
$stmtO->bind_param("i", $status);

 $stmtT->execute();
$stmtT->execute();

$sql = "SELECT products.productname, orderauction.orderId, orderauction.createDate, tracking.tracking, tracking.remark
            from orderauction 
            inner join tracking on orderauction.orderId = tracking.orderId
            inner join products on orderauction.productId = products.productId
            WHERE orderauction.orderId = '" . $id . "'
            order by tracking.orderId desc limit 1"; 
    $result = $mysqli->query($sql);
    $data = $result->fetch_assoc();

echo json_encode($data);

?>