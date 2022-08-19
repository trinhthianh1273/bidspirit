app.controller('closedProduct', function($scope,$http){
    $scope.viewProduct = [];
    viewProduct();
    function viewProduct() {
        $http({
            url: URL + "api/interview/closedProduct.php",
            method: 'GET'
          }).then(function(res){
            $scope.viewProduct = res.data.viewProduct;
          });
    }
})
// View mới thêm từ closedaution