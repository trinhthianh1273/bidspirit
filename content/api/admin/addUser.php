<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$pass = md5(strrev($post.pass).$post.pass);

$sql = "INSERT into users(username, email, phone, pass, keypass, company, payment) values 
		('".$post.username."', '" .$post.email. "', '" . $post.email ."', '" . $pass. "', '" . strrev($post.pass). "', '" . $post.company . "', '" . $post.payment . ");";


?>