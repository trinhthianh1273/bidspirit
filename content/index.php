<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BidSpirit</title>

    <link rel="stylesheet" href="./assets/css/boostrap.min.css">
    <link rel="stylesheet" href="./assets/css/main.css">

    <!-- Script Library -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/angular.min.js"></script>
	<script src="assets/js/angular-route.min.js"></script>

	<!-- My App -->
	<script src="app/routes.js"></script>
	<script src="app/helper/myHelper.js"></script>
</head>
<body ng-app="my-App">
    <?php require_once $_SERVER['DOCUMENT_ROOT']."/BidSpirit/content/views/header.html"; ?>
    <div class="container">
        <ng-view>
            
        </ng-view>
    </div>

    <?php require_once $_SERVER['DOCUMENT_ROOT']."/BidSpirit/content/views/footer.html"; ?>
</body>
</html>