app.controller('bidController', function(sessionService,$scope, $http, $location) {
	
	$scope.productId = sessionService.get('productId');
	$scope.productDetail = [];

	if($scope.username) {
		document.querySelector('.bid-notlogin').style.display = 'none';
		document.querySelector('.bid-form').style.display = 'block';
	} else {
		document.querySelector('.bid-notlogin').style.display = 'block';
		document.querySelector('.bid-form').style.display = 'none';
	}

	getProductDetail();
	function getProductDetail(){
		$http({
			url: URL + 'api/interview/productDetail.php?id=' + $scope.productId,
			method: 'get' 
		}). then(function(res) {
			$scope.productDetail = res.data.productDetail;
			$scope.productAuction = res.data.productAuction;
			if($scope.productAuction) {
				$scope.price = $scope.productAuction[0].price;
			} else {
				$scope.price = $scope.productDetail[0].basePrice;
			}
			console.log($scope.price);
		});
	}

	$scope.bid = function(amount) {
		$http({
	        url: URL + 'api/interview/bidProduct.php?id='+ $scope.productId + '&user=' + $scope.userId,
	        method: 'POST',
	        data: $scope.form
	      }).then(function(data){
	        $(".modal").modal("hide");
	          // $scope.data = apiModifyTable($scope.data,data.data.userId,data.data);
	      });	
	  }

	  $scope.login = function login() {
	  	$location.path('/login');
	  }

	  $scope.register = function login() {
	  	$location.path('/register');
	  }
})