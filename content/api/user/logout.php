<?php
session_start();
$_SESSION['username']="";

session_unset();
// session_destroy();
// header("location:https://localhost/Group1/content/");
echo json_encode($_SESSION);
?>


