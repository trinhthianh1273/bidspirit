var app = angular.module("my-App", ["ngRoute"]);

// appModule.config(['$locationProvider', function($locationProvider) {
//     $locationProvider.hashPrefix('');
//   }]);


app.config(['$routeProvider',,
    function($routeProvider){
        $routeProvider.
        when('/', {
            templateUrl: "views/home.html",
            controller: 'homeController'
        }).
        when('/login', {
            templateUrl: "views/login.html",
            controller: 'userLogin'
        }).
        when('/register', {
            templateUrl: "views/register.html",
            controller: 'userRegister'
        }).
        when('/admin', {
            templateUrl: "admin/login.html",
            controller: 'admin'
        }).
        otherwise({
            templateUrl: 'views/home.html'
        });
    }]);