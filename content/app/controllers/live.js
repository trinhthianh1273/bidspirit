var URL = "http://localhost/group1/content/";

var app = angular.module('live', ['ngRoute']);
app.controller('liveController', function($scope,$http){
    $scope.liveauction = [];
    liveauction();
    function liveauction() {
        $http({
            url: URL + "api/interview/liveauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.liveauction = res.data.liveauction;
            console.log($scope.liveauction);
          });
    }
})