app.controller('productController', function($scope, $http){
    $scope.product = [];
    getproduct();
    function getproduct() {
        $http({
            url: URL + "api/admin/getProduct.php",
            method: 'GET'
          }).then(function(res){
            $scope.product = res.data.product;
            console.log($scope.product);
          });
    }

    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getProductDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.form = data.data;
        console.log($scope.form);
      });
    }

    $scope.saveEdit = function(){
      $http({
        url: URL + 'api/admin/setProduct.php?id='+$scope.form.productId,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.ProductId,data.data);
          console.log($scope.data);
      });
    }

    function checkAdd() {
      $http({
            url: URL + "api/admin/addProduct.php",
            method: 'GET'
          }).then(function(res){
          });
    }

    $scope.add = function(){
      $http({
        url: URL + 'api/admin/addProduct.php',
        method: 'POST',
        data: $scope.form
      }).then(function(data){
            $scope.Product.push(data.data);
            $(".modal").modal("hide");
        
      });
    }


    $scope.remove = function(post,index){
      var result = confirm("Do you want to remove this Product?");
       if (result) {
        $http({
          url: URL + 'api/admin/removeProduct.php?id='+post.ProductId,
          method: 'DELETE'
        }).then(function(data){
          $scope.Product.splice(index,1);
        });
      }
    }
});