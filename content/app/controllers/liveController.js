
app.controller('liveController', function(sessionService,$scope,$http,$location){
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

    $scope.bid = function(id) {
        sessionService.set('productId', id);
        $location.path('/bid');
        
    }
})