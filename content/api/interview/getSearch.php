<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$search  = $_GET["search"];
$data['noresult'] = "No Product Found";

if(!$search) {return 0;}

$sql = "SELECT productId, merchantId, productname,products.description, productImage1, productImage2, productImage3,			categoryname,basePrice, startDate, endDate
        from products
        inner join category on products.categoryId = category.categoryId
        WHERE status = 0 and productname like '%" . $search . "%'";
$result = $mysqli->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	    $json1[] = $row;
	} 
	$data['live'] = $json1;
	$data['noresult'] = '';
}



$sql = "SELECT  productname, products.description,categoryname, productImage1, productImage2, productImage3, basePrice, startDate, endDate from products
        inner join category on products.categoryId = category.categoryId
        WHERE products.status=1 and productname like '%" . $search . "%'";
$result = $mysqli->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	    $json2[] = $row;
	} 
	$data['upcoming'] = $json2;
	$data['noresult'] = '';
}



$sql = "SELECT  productname, products.description,categoryname, productImage1, productImage2, productImage3, basePrice, price, username, startDate, endDate from products
        inner join category on products.categoryId = category.categoryId
        inner join orderauction on products.productId = orderauction.productId
        INNER join users on orderauction.userId = users.userId
        WHERE products.status=-1 and productname like '%" . $search . "%'";
$result = $mysqli->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
	    $json3[] = $row;
	} 
	$data['closed'] = $json3;
	$data['noresult'] = '';
}

echo json_encode($data);

?>