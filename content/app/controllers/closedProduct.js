app.controller('closedProduct', function(sessionService, $scope,$http, $location){
    $scope.productId = sessionService.get('productId');
    $scope.productDetail = [];

    getProductDetail();
    function getProductDetail() {
        $http({
            url: URL + "api/interview/closedProduct.php?id=" + $scope.productId,
            method: 'GET'
          }).then(function(res){
            $scope.productDetail = res.data.productDetail;
            $scope.productAuction = res.data.productAuction;
            $scope.merchantname = res.data.merchant[0].merchantname;
            $scope.productImg = $scope.productDetail[0].productImage1;

          });
    }


    biddingHistory();
    function biddingHistory() {
        $http({
            url: URL + 'api/interview/biddingHistory.php?id=' + $scope.productId,
            method: 'get' 
        }). then(function(res) {
            $scope.biddingHistory = res.data.biddingHistory;
        });
    }

    $scope.showAuction = function() {
            $('#auction_info').addClass("active show");
            $('#auction_history').removeClass("active show");
      }

      $scope.showHistory = function() {
        $('#auction_info').removeClass("active show");
        $('#auction_history').addClass("active show");
      }

      $scope.changeImg = function(img) {
        $scope.productImg = img;
        console.log($scope.productImg);
    }
    

})
// View mới thêm từ closedaution