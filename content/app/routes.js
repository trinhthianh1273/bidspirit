var URL = "http://localhost/group2/content/";

var app = angular.module('myApp', ['ngRoute']);
app.config(['$routeProvider',
	function ($routeProvider) {
		$routeProvider.
			when('/', {
				templateUrl: 'views/home.html',
				controller: 'homeController'
			}).
            when('/live', {
				templateUrl: 'views/live.html',
				controller: 'liveController'
			}).
            when('/upcoming', {
				templateUrl: 'views/upcoming.html',
				controller: 'upcomingController'
			}).
            when('/closed', {
				templateUrl: 'views/closed.html',
				controller: 'closedController'
			}). 
            when('/about', {
				templateUrl: 'views/about.html',
				controller: 'aboutController'
			}). 
			when('/category', {
				templateUrl: 'views/category.html',
				controller: 'categoryController'
			}).
            when('/contactus', {
				templateUrl: 'views/contactus.html',
				controller: 'contactusController'
			}).
            when('/privacyandpolicy', {
				templateUrl: 'views/Privacyandpolicy.html',
				controller: 'privacyandpolicyController'
			}). 
			when('/termandcondition', {
				templateUrl: 'views/Privacyandpolicy.html',
				controller: 'privacyandpolicyController'
			}).
            when('/login', {
				templateUrl: 'views/login.html',
				controller: 'loginController'
			}). 
            when('/register', {
				templateUrl: 'views/register.html',
				controller: 'registerController'
			}). 
			when('/profile', {
				templateUrl: 'views/profile.html',
				controller: 'profileController'
			}). 
			when('/bid', {
				templateUrl: 'views/bid.html',
				controller: 'bidController'
			}).
			when('/closedProduct', {
				templateUrl: 'views/closedProduct.html',
				controller: 'closedProduct'
			}). 
			when('/search', {
				templateUrl: 'views/search.html',
				controller: 'searchController'
			}). 
			when('/upcomingProduct', {
				templateUrl: 'views/upcomingProduct.html',
				controller: 'upcomingProductController'
			}). 
			when('/dashboard', {
				templateUrl: 'views/dashboard.html',
				controller: 'dashboardController'
			});
	}]);




/*
app.run(function($rootScope, $location, loginService){
    //prevent going to homepage if not loggedin
    var routePermit = ['/home'];
    $rootScope.$on('$routeChangeStart', function(){
        if(routePermit.indexOf($location.path()) !=-1){
            var connected = loginService.islogged();
            connected.then(function(response){
                if(!response.data){
                    $location.path('/');
                }
            });
 
        }
    });
    //prevent going back to login page if session is set
    var sessionStarted = ['/'];
    $rootScope.$on('$routeChangeStart', function(){
        if(sessionStarted.indexOf($location.path()) !=-1){
            var cantgoback = loginService.islogged();
            cantgoback.then(function(response){
                if(response.data){
                    $location.path('/home');
                }
            });
        }
    });
});
*/



app.controller('mainController',function(sessionService,$scope, $http){
	ulogin();
	function ulogin() {
		    $http({
		            url: URL + "getSession.php",
		            method: 'GET'
		          }).then(function(res){
		            $scope.ulogin = res.data;
		            if($scope.ulogin.username) {
		            	sessionService.set('userId', $scope.ulogin.userId);
		            	sessionService.set('username', $scope.ulogin.username);
						sessionService.set('login_error', $scope.ulogin.login_error);

		            	$scope.userId = sessionService.get('userId');
		            	$scope.username = sessionService.get('username');
		            	$scope.login_error = sessionService.get('login_error');

		            	console.log($scope.username);
		        }
		    });
      }


})
