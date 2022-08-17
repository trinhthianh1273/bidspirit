app.controller('bidController', function(sessionService,$scope, $http, $location) {
	
	$scope.productId = sessionService.get('productId');
	$scope.productDetail = [];

	getProductDetail();
	function getProductDetail(){
		$http({
			url: URL + 'api/interview/productDetail.php?id=' + $scope.productId,
			method: 'get' 
		}). then(function(res) {
			$scope.productDetail = res.data.productDetail;
			console.log($scope.productDetail[0].productname);
		});
	}
})