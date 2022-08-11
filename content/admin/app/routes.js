var dashboard = angular.moduel('dashboard', ['ngRoute']);

dashboard.config(['$routeProvider',
    function($routeProvider){
        $routeProvider.
        when('/', {
            templateUrl: "views/changepassword.html",
            controller: 'changepasswordController'
        }).
        when('/category', {
            templateUrl: "views/createcategory.html",
            controller: 'categoryController'
        }).
        when('/order', {
            templateUrl: "views/ordermanagement.html",
            controller: 'ordermanagementController'
        }).
        when('/merhchant', {
            templateUrl: "views/managemerchant.html",
            controller: 'managemerchantController'
        }).
        when('/insertproduct', {
            templateUrl: "views/insertproduct.html",
            controller: 'insertproductController'
        }).
        when('/manageproduct', {
            templateUrl: "views/manageproduct.html",
            controller: 'manageproductController'
        })
    }]);