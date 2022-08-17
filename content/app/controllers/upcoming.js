var URL = "http://localhost/group1/content/";

var app = angular.module('upcoming', ['ngRoute']);
app.controller('upcomingController', function($scope,$http){
    $scope.upcomingauction = [];
    upcomingauction();
    function upcomingauction() {
        $http({
            url: URL + "api/interview/upcomingauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.upcomingauction = res.data.upcomingauction;
            console.log($scope.upcomingauction);
          });
    }
})