<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/group2/content/DB_config.php';
session_start();
$post = file_get_contents('php://input');
$post = json_decode($post);



$checkpass = md5(strrev($post->pass).$post->pass);
$sql = "SELECT * from users WHERE email = '" . $post->email . "' and pass='" . md5(strrev($post->pass).$post->pass) . "'";

// $sql = "SELECT * from users WHERE email = 'phungbaokimanh@gmail.com' and pass='" . md5(strrev('User@123').'User@123') . "'";

$result = $mysqli->query($sql);
if($result->num_rows > 0) {
    $row =  $result->fetch_assoc();

    $_SESSION['userId'] = $row['userId'];
    $_SESSION['username'] = $row['username'];
    $_SESSION['login_msg'] = "Login Successfully";
    
} else {
    $_SESSION['login_msg'] = 'Email or password incorrect';
}



echo json_encode($_SESSION);
?>