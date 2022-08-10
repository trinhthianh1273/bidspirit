<?php

session_start();
require_once("../DB_config.php");
if(strlen($_SESSION['alogin']) == 0) {
    $extra="index.php";
    header("location:$extra");
} else {
    
}

?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
    a {
        color: black;
    }
    a:hover {
        text-decoration: none;
    }
</style>

<body>
    <!-- admin navigation -->
    <div class="row my-3">
        <div class="col-2"></div>
        <div class="col">
            <a href="" style="color: black;"><h3>Admin Portal</h3></a>
        </div>
    </div>
    <hr class="mb-5">

    <!-- dashboard main -->
    <div class="row justify-content-center">
        <div class="col-3">
            <div>
                <i class="fa-solid fa-gear"></i>
                <a href="">Order Management</a>
            </div>
            <div>
                <i class="fa-solid fa-gauge"></i>
                <a href="">Dashboard</a>
            </div>
            <div>
                <i class="fa-solid fa-users"></i>
                <a href="">Manage Users</a>
            </div>
            <div>
                <i class="fa-solid fa-users"></i>
                <a href="">Manage Merchant</a>
            </div>
            <div>
                <i class="fa-solid fa-book"></i>
                <a href="">Create Category</a>
            </div>
            <div>
                <i class="fa-solid fa-copy"></i>
                <a href="">Insert products</a>
            </div>
            <div>
                <i class="fa-solid fa-rectangle-list"></i>
                <a href="">Manage products</a>
            </div>
            <div>
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <a href="">Log Out</a>
            </div>
        </div>

        <div class="col-6" style="border: 1px solid #e9e9e9;">

        </div>
    </div>
</body>