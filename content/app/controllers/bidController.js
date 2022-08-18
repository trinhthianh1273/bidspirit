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
			
			if($scope.productAuction) {
				$scope.price = $scope.productAuction[0].price;
				
			} else {
				$scope.price = $scope.productDetail[0].basePrice;
			}
		});
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
})

/*
function($) {
	"use strict";

	var selector = '#bid_counter1';

            if ($(selector).length) {
                // If you need specific date then comment out 1 and comment in 2
                // let endDate = "2021/05/20"; //comment out this 1
                let endDate = $(selector).text(); //comment out this 1
                // let endDate = (new Date().getFullYear()) + '/' + (new Date().getMonth() + 1) + '/' + (new Date().getDate() + 1); // comment in this 2
                let counterElement = document.querySelector(selector);
                let myCountDown = new ysCountDown(endDate, function (remaining, finished) {
                    let message = "";
                    if (finished) {
                        message = "Expired";
                    } else {
                        var re_hours = (remaining.totalDays * 24) + remaining.hours;
                        message += re_hours + " : ";
                        message += remaining.minutes + " : ";
                        message += remaining.seconds;
                    }
                    counterElement.textContent = message;
                });
            }
}
*/