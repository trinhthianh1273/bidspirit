var URL = "http://localhost/group1/content/";

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
			});
	}]);