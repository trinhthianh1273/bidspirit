
app.controller('liveController', function(sessionService,$scope,$http,$location){
    $scope.liveauction = [];
    
    liveauction();
    function liveauction() {
        $http({
            url: URL + "api/interview/liveauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.liveauction = res.data.liveauction;
          });
    }

    $scope.bid = function bid(id) {
        sessionService.set('productId', id);
        $location.path('/bid');
        
        // $http({
        //     url: URL + "api/interview/productDetail.php?id=" + id,
        //     method: 'get'
        //   }).then(function(res){
        //     $scope.data = res.data;
        //     console.log($scope.data);
        //     sessionService.set('data', $scope.data.productId);
        //     console.log(sessionService.get('data'));
        //   });
    }
})