
app.controller('footerController', function($scope,$http, $location){
    $scope.strategy = [];
    strategy();
    function strategy() {
        $http({
            url: URL + "api/interview/strategy.php",
            method: 'GET'
          }).then(function(res){
            $scope.strategy = res.data.strategy;
          });
    }
})