<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$categoryname = $post->categoryname;
$description = $post->description;



$sql = "INSERT INTO category(categoryname, description) values(?,?)";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $categoryname, $description);
$stmt->execute();

$sql = "SELECT * FROM category Order by categoryId desc LIMIT 1";
$result = $mysqli->query($sql);

$data = $result->fetch_assoc();
echo json_encode($data);

?>