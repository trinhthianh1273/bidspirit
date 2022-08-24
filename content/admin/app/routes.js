var URL = "http://localhost/group2/content/";
// var multer = require('multer');
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
        when('/todayorder', {
            templateUrl: 'views/todayOrder.html',
            controller: 'todayorderController'
        }). 
        when('/pendingorder', {
            templateUrl: 'views/Pendingorder.html',
            controller: 'pendingorderController'
        }). 
        when('/deliveredorder', {
            templateUrl: 'views/deliveredOrder.html',
            controller: 'deliveredorderController'
        }).
        otherwise({
            templateUrl: 'views/changepassword.html'
        });
}]);

app.service('sessionService', ['$http', function($scope,$http){
    return{
        set: function(key, value){
            
            return sessionStorage.setItem(key, value);
        },
        get: function(key){

            return sessionStorage.getItem(key);
        },
        destroy: function(key){

            return sessionStorage.removeItem(key);
        }
    };
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

// app.use(multer({dest: URL + 'assets/img'}));

app.directive('ngFile', ['$parse', function ($parse) {
        return {
           restrict: 'A',
           link: function(scope, element, attrs) {
              element.bind('change', function(){

              $parse(attrs.ngFile).assign(scope,element[0].files)
                 scope.$apply();
              });
           }
        };
    }]);

// app.service('fileUpload', ['$https', function ($https) {
//     this.uploadFileToUrl = function(file, uploadUrl) {
//         fd = new FormData();
//         fd.append('file', file);
            
//         $https.post(uploadUrl, fd, {
//             transformRequest: angular.identity,
//             headers: {'Content-Type': undefined}
//         }).
//         success(function() {
//         }).
//         error(function() {
//         });
//    }
// }]);