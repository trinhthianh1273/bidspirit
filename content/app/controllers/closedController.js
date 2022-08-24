
app.controller('closedController', function(sessionService, $scope,$http, $location){
    $scope.closedauction = [];
    closedauction();
    function closedauction() {
        $http({
            url: URL + "api/interview/closedauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.closedauction = res.data.closedauction;
          });
    }

    $scope.closedProduct = function(id) {
        sessionService.set('productId', id);
        $location.path('/closedProduct');
        
    }
})