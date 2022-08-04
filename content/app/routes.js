var app = angular.module('my-App', ['ngRoute']);

app.config(function($routeProvider){
	$routeProvider.when('/', {
        templateUrl: "./views/home.html",
        controller: 'homeController'
    })
    .when('/login', {
        templateUrl: "./views/login.php",
        controller: 'userLogin'
    })
    .when('/register', {
        templateUrl: "./views/register.php",
        controller: 'userRegister'
    })
    .when('/admin', {
        templateUrl: "./admin/login.php",
        controller: 'admin'
    })
    .otherwise({
        templateUrl: '404'
    })
});