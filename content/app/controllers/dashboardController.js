app.controller('dashboardController',function(sessionService,$scope,$http,$location){


	$scope.win = 0;
	$scope.totalBid = 0;
	$scope.totalBidAmount = 0;

	getDashboard();
	function getDashboard() {
		$http({
            url: URL + "api/interview/dashboard.php?id=" + $scope.userId,
            method: 'GET'
          }).then(function(res){
            $scope.win = res.data.win[0].win;
            $scope.totalBid = res.data.totalBid[0].totalBid;
            $scope.totalBidAmount = res.data.totalBidAmount.totalBidAmount;
          });
	}

})