<?php 

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';
$post = file_get_contents('php://input');
$post = json_decode($post);

$checkpass = md5(strrev($post->pass).$post->pass);
$sql = "SELECT username from users WHERE email = '" . $post->email . "' and pass='" . $checkpass . "'";

$result = $mysqli->query($sql);
if($result->num_rows > 0) {
    $_SESSION['ulogin'] = $result['username'];
} else {
    $_SESSION['ulogin_error'] = "Email or password incorrect";
}

echo json_encode($_SESSION);
?>