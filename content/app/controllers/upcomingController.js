

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