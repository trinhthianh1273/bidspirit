var URL = "http://localhost/group1/content/";

var app = angular.module('myApp', ['ngRoute']);

app.config(['$routeProvider', function($routeProvider) {
    $routeProvider. 
        when('/', {
            templateUrl: 'views/changepassword.html',
            controller: 'changepasswordController'
        })
        .when('/order', {
            templateUrl: 'views/order.html',
            controller: 'orderController'
        })
        .when('/user', {
            templateUrl: 'views/user.html',
            controller: 'userController'
        }).
        when('/merchant', {
            templateUrl: 'views/merchant.html',
            controller: 'merchantController'
        }). 
        when('/category', {
            templateUrl: 'views/category.html',
            controller: 'categoryController'
        }). 
        when('/insert', {
            templateUrl: 'views/insert.html',
            controller: 'insertController'
        }). 
        when('/product', {
            templateUrl: 'views/product.html',
            controller: 'productController'
        }). 
        otherwise({
            templateUrl: 'views/changepassword.html'
        });
}]);

app.run(function($rootScope) {
  $rootScope.typeOf = function(value) {
    return typeof value;
  };
}). 
directive('stringToNumber', function() {
  return {
    require: 'ngModel',
    link: function(scope, element, attrs, ngModel) {
      ngModel.$parsers.push(function(value) {
        return '' + value;
      });
      ngModel.$formatters.push(function(value) {
        return parseFloat(value);
      });
    }
  };
});