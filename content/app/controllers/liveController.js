
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