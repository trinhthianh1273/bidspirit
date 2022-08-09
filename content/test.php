<!doctype html>
<html lang="vi">
    <head>
        <meta charset="UTF-8">
        <title>Ví dụ sử dụng Directive ng-include Freetuts.net</title>
        <script src="./assets/js/angular.min.js"></script>
        <style>
            *{margin:0;padding:0}
            body{margin:20px;}
        </style>
        <script>
            /*
             * Author: thehalfheart@gmail.com
             * Website: freetuts.net
             */
            angular.module('ngInit', ['ngRoute']).controller('myController', ['$scope', function($scope) {     
                    $scope.message = 'CHÀO MỪNG CÁC BẠN ĐẾN VỚI FREETUTS.NET';
            }]);
        </script>
    </head>
    <body ng-app="ngInit" ng-author="thehalfheart@gmail.com" ng-website="freetuts.net">
        <div ng-controller="myController">
            <div ng-include=" 'template-a.html' "></div>
            <div ng-include=" 'template-b.html' "></div>
        </div>
    </body>
</html>