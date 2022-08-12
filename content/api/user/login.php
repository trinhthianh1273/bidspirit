<?php 

session_start();
require_once $_SERVER['DOCUMENT_ROOT'] . '/Group1/content/DB_config.php';


if ($_SERVER['REQUEST_METHOD'] === "POST") {

        $email = $_POST['email'];
        $password = md5(strrev($_POST['password']).$_POST['password']);
        
        $ret = $mysqli->query("SELECT * FROM users WHERE email='$email' and pass='$password'");
        $num = $ret->num_rows;
    if($num > 0) {
        while($row = $ret->fetch_assoc()) {
            $json[] = $row;
        }
        $_SESSION['ulogin'] = $json;
        $data['ulogin'] = $_SESSION['ulogin'];
        echo json_encode($data);

    } else {
        $data['uloginError'] = "Email or Password incorrect.";
        echo json_encode($data);
    }
} else {
    if(isset($_SESSION['ulogin'])) {
        $data['ulogin'] = $_SESSION['ulogin'];
        echo json_encode($data);
    }
}
?>