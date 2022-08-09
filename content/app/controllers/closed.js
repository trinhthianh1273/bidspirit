var URL = "http://localhost/group1/content/";

var app = angular.module('closed', ['ngRoute']);
app.controller('closedController', function($scope,$http){
    $scope.closedauction = [];
    closedauction();
    function closedauction() {
        $http({
            url: URL + "api/interview/closedauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.closedauction = res.data.closedauction;
            console.log($scope.closedauction);
          });
    }
})