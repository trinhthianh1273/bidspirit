app.controller('closedProduct', function(sessionService, $scope,$http, $location){
    $scope.viewProduct = [];

    getProductDetail();
    function getProductDetail(id) {
        $http({
            url: URL + "api/interview/closedProduct.php?id=" + id,
            method: 'GET'
          }).then(function(res){
            $scope.productDetail = res.data;
          });
    }

    $scope.closedProduct = function(id) {
        sessionService.set('productId', id);
        $location.path('/closedProduct');
        
    }

})
// View mới thêm từ closedaution