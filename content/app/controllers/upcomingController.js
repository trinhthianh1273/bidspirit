
app.controller('upcomingController', function(sessionService, $scope,$http, $location){
    $scope.upcomingauction = [];
    upcomingauction();
    function upcomingauction() {
        $http({
            url: URL + "api/interview/upcomingauction.php",
            method: 'GET'
          }).then(function(res){
            $scope.upcomingauction = res.data.upcomingauction; 
         });
    }

    $scope.upcomingProduct = function(id) {
        sessionService.set('productId', id);
        $location.path('/upcomingProduct');
        
    }
})