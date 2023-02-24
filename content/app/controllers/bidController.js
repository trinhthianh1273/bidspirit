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

	// get product information
	getProductDetail();
	function getProductDetail(){
		$http({
			url: URL + 'api/interview/productDetail.php?id=' + $scope.productId,
			method: 'get' 
		}). then(function(res) {
			$scope.productDetail = res.data.productDetail;
			$scope.productAuction = res.data.productAuction;
			$scope.merchantname = res.data.merchant[0].merchantname;
			$scope.productImg = $scope.productDetail[0].productImage1;
			
			if($scope.productAuction) {
				$scope.price = $scope.productAuction[0].price;
				
			} else {
				$scope.price = $scope.productDetail[0].basePrice;
			}
		});
	}

	$scope.changeImg = function(img) {
		$scope.productImg = img;
		console.log($scope.productImg);
	}


	/* get bidding history */
	biddingHistory();
	function biddingHistory() {
		$http({
			url: URL + 'api/interview/biddingHistory.php?id=' + $scope.productId,
			method: 'get' 
		}). then(function(res) {
			$scope.biddingHistory = res.data.biddingHistory;
			console.log($scope.biddingHistory);
		});
	}

	$scope.bid = function(amount) {
		$http({
	        url: URL + 'api/interview/bidProduct.php?id='+ $scope.productId + '&user=' + $scope.userId + '&price=' + $scope.price,
	        method: 'POST',
	        data: $scope.form
	      }).then(function(data){
	        $(".modal").modal("hide");
	          // $scope.data = apiModifyTable($scope.data,data.data.userId,data.data);
	          // $scope.bidsuccess = data.data.success;
	          // alert($scope.bidsuccess);
	          // document.getElementById('bid-success').style.display = "block";
	      });	
	  }

	  $scope.login = function login() {
	  	$location.path('/login');
	  }

	  $scope.register = function login() {
	  	$location.path('/register');
	  }

	  $scope.showAuction = function() {
	  		$('#auction_info').addClass("active show");
	  		$('#auction_history').removeClass("active show");
	  }

	  $scope.showHistory = function() {
	  	$('#auction_info').removeClass("active show");
	  	$('#auction_history').addClass("active show");
	  }
})

