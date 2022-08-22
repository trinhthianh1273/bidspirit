<?php

session_start();
require_once("../DB_config.php");
if (strlen($_SESSION['alogin']) == 0) {
    $extra = "login.php";
    header("location:$extra");
} else {
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
    <link rel="stylesheet" href="../assets/css/reset.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/angular.min.js"></script>
    <script src="../assets/js/angular-route.min.js"></script>

    <!-- APP Controller -->
    <script src="app/routes.js"></script>
    <script src="app/changepasswordController.js "></script>
    <script src="app/categoryController.js "></script>
    <script src="app/insertController.js "></script>
    <script src="app/merchantController.js "></script>
    <script src="app/orderController.js "></script>
    <script src="app/productController.js "></script>
    <script src="app/userController.js "></script>
</head>

<body ng-app="myApp">


    <div ng-include="'views/header.html'"></div>

    <div class="row justify-content-center"> 
        <div class="col-2">
            <div class="work p-3">
                <i class="fa-solid fa-gauge"></i>
                <a href="#">Dashboard</a>
            </div>
            <div class="work p-3 collapsed" data-toggle="collapse">
                <i class="fa-solid fa-gear"></i>
                <a href="#!/order">Order Management</a>
            </div>
            <div class="work p-3 mt-2">
                <i class="fa-solid fa-users"></i>
                <a href="#!/user">Manage Users</a>
            </div>
            <div class="work p-3">
                <i class="fa-solid fa-users"></i>
                <a href="#!/merchant">Manage Merchant</a>
            </div>
            <div class="work p-3">
                <i class="fa-solid fa-book"></i>
                <a href="#!/category">Create Category</a>
            </div>
            <div class="work p-3">
                <i class="fa-solid fa-copy"></i>
                <a href="#!/insert">Insert products</a>
            </div>
            <div class="work p-3">
                <i class="fa-solid fa-rectangle-list"></i>
                <a href="#!/product">Manage products</a>
            </div>
            <div class="work p-3 mt-2">
                <i class="fa-solid fa-arrow-right-from-bracket"></i>
                <a href="logout.php">Log Out</a>
            </div>
        </div>
        <div class="col-8" style="border: 1px solid #e9e9e9;">
            <ng-view></ng-view>
        </div>
    </div>

</body>

</html>