<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$sql = "INSERT INTO products(productname, categoryId, merchantId, description, productImage1, productImage2, productImage3, baseprice, startDate, endDate, status) values(?,?,?,?,?,?,?,?,?,?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("siissssissi", $productname, $categoryId, $merchantId, $description, $productImage1, $productImage2, $productImage3, $baseprice, $startDate, $endDate, $status);

$productname = $post->productname;
$categoryId = $post->category->categoryId;
$merchantId = $post->merchant->merchantId;
$description = $post->description;
$productImage1 = $post->productimage1.name[0];
$productImage2 = $post->productimage2.name[0];
$productImage3 = $post->productimage3.name[0];
$baseprice = $post->baseprice;
$date = date_create($post->startDate);
$startDate = date_format($date,"Y-m-d H:i:s");
$date = date_create($post->endDate);
$endDate = date_format($date,"Y-m-d H:i:s");
$status = 1;


$stmt->execute();


?>