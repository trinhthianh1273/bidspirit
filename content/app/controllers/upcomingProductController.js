app.controller('upcomingProductController', function(sessionService, $scope, $http, $location) {
	
	$scope.productId = sessionService.get('productId');
	$scope.productDetail = [];

	getProductDetail();
	function getProductDetail(){
		$http({
			url: URL + 'api/interview/productDetail.php?id=' + $scope.productId,
			method: 'get' 
		}). then(function(res) {
			$scope.productDetail = res.data.productDetail;
			$scope.productAuction = res.data.productAuction;
			$scope.merchantname = res.data.merchant[0].merchantname;
			$scope.price = $scope.productDetail[0].basePrice;
			$scope.productImg = $scope.productDetail[0].productImage1;
		});
	}


	$scope.changeImg = function(img) {
		$scope.productImg = img;
		console.log($scope.productImg);
	}



});