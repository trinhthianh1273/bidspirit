<?php 

session_start();

echo utf8_encode($_SESSION['productImg1']);

echo json_encode($_SESSION);




?>