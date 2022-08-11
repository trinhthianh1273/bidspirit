<?php 

session_start();
error_reporting(0);
require_once("../DB_config.php");


if (isset($_POST['submit'])) {
    // if(empty($_POST['admin'])) {
    //     $error['user'] = "Please enter username";
    // }
    // if(empty($_POST['passAdmin'])) {
    //     $error['pass'] = "Please enter password";
    // }
    
        $admin = $_POST['adminId'];
        $passAdmin = md5(strrev($_POST['passAdmin']).$_POST['passAdmin']);
        
        $ret = $mysqli->query("SELECT * FROM admin WHERE adminId='$admin' and pass='$passAdmin'");
        $num = $ret->num_rows;
    if($num > 0) {
        $extra = "index.php";
        $_SESSION['alogin'] = $_POST['adminId'];
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    } else {
        $_SESSION['errmsg'] = "Invalid username or password";
        $extra="login.php";
        $host=$_SERVER['HTTP_HOST'];
        $uri=rtrim(dirname($_SERVER['PHP_SELF']),'/\\');
        header("location:http://$host$uri/$extra");
        exit();
    }
    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="../assets/css/boostrap.min.css">
    <link rel="stylesheet" href="../assets/css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="../assets/css/reset.css">
    
    <!-- Script Library -->
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/bootstrap.min.js"></script>
	<script src="./assets/js/angular.min.js"></script>
    <script src="./assets/js/angular-route.js"></script>

    <!-- My App -->
	<script src="app/routes.js"></script>
</head>

<style>
    a:hover {
        text-decoration: none;
    }
</style>
<body class="controllers">

    <!-- admin navigation -->
    <div class="row my-3">
        <div class="col-2"></div>
        <div class="col">
            <a href="" style="color: black;"><h3>Admin Portal</h3></a>
        </div>
    </div>
    <hr class="mb-5">

    <!-- admin login form -->
    <form class="mx-auto" action="" method="post" style="max-width:30%; border:1px solid #e9e9e9;">
        <div class="module-head p-3" style="background-color: #f6f6f6;">
            <caption><strong>Log In</strong></caption>
        </div>
        <div class="px-3">
        <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
        </div>

        <div class="control-group">
            <div class="p-3">
                <input type="text" class="form-control" name="adminId" placeholder="admin" require>
            </div>
            <div class="p-3">
                <input type="password" class="form-control" name="passAdmin" placeholder="password" require>
            </div>
        </div>

        <div class="module-foot p-3" style="background-color: #f6f6f6;">
            <div class="controls clearfix" >
                <button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
            </div>
        </div>
    </form>
</body>
</html>