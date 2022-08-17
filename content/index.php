<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BidSpirit</title>

    <link rel="stylesheet" href="assets/css/boostrap.min.css">
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <!-- <link rel="stylesheet" href="./assets/css/footer.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/angular.min.js"></script>
    <script src="assets/js/angular-route.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.bundle.min.js" integrity="sha512-sH8JPhKJUeA9PWk3eOcOl8U+lfZTgtBXD41q6cO/slwxGHCxKcW45K4oPCUhHG7NMB4mbKEddVmPuTXtpbCbFA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Rubik+Burned&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arvo:wght@700&family=Signika+Negative&display=swap" rel="stylesheet">

    <!-- APP Controller -->
    <script src="app/routes.js"></script>
    <script src="app/helper/myHelper.js"></script>

    
    <script src="app/controllers/homeController.js "></script>
    <script src="app/controllers/headerController.js "></script>
    <script src="app/controllers/footerController.js "></script>
    <script src="app/controllers/liveController.js "></script>
    <script src="app/controllers/upcomingController.js "></script>
    <script src="app/controllers/closedController.js "></script>
    <script src="app/controllers/loginController.js "></script>
    <script src="app/controllers/registerController.js "></script>
    <script src="app/controllers/categoryController.js "></script>
    <script src="app/controllers/bidController.js "></script>
    <script src="app/controllers/profileController.js "></script>
</head>
<body ng-app="myApp" ng-controller="mainController">


    <div ng-include="'views/header.html'"></div>

    <ng-view></ng-view>

    <div ng-include="'views/footer.html'"></div>



</body>
</html>