var URL = "http://localhost/group1/content/";

var footer = angular.module('footer', ['ngRoute']);
footer.controller('footerController', function($scope,$http){
    $scope.strategy = [];
    strategy();
    function strategy() {
        $http({
            url: URL + "api/interview/strategy.php",
            method: 'GET'
          }).then(function(res){
            $scope.strategy = res.data.strategy;
            console.log($scope.strategy);
          });
    }
})