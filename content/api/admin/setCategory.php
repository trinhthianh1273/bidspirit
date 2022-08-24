<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
$id  = $_GET["id"];

$post = file_get_contents('php://input');
$post = json_decode($post);

$categoryname = $post->categoryname;
$description = $post->description;

$sql = ("UPDATE category SET categoryname = ?, description = ?, updateDate=NOW() WHERE categoryId = ?");
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ssi", $categoryname, $description, $id);
$stmt->execute();

$sql = "SELECT * FROM category WHERE categoryId = '".$id."'"; 
$result = $mysqli->query($sql);
$data = $result->fetch_assoc();

echo json_encode($data);


?>