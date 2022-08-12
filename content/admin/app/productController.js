app.controller('productController', function($scope){
    $scope.product = [];
    getproduct();
    function getproduct() {
        $http({
            url: URL + "api/admin/getproduct.php",
            method: 'GET'
          }).then(function(res){
            $scope.product = res.data.product;
            console.log($scope.product);
          });
    }
});