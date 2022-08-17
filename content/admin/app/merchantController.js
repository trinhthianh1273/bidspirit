app.controller('merchantController', function($scope, $http){
    $scope.merchant = [];
    getmerchant();
    function getmerchant() {
        $http({
            url: URL + "api/admin/getMerchant.php",
            method: 'GET'
          }).then(function(res){
            $scope.merchant = res.data.merchant;
            console.log($scope.merchant);
          });
    }

    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getMerchantDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.form = data.data;
      });
    }

    $scope.saveEdit = function(){
      $http({
        url: URL + 'api/admin/setMerchant.php?id='+$scope.form.merchantId,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.merchantId,data.data);
          console.log($scope.data);
      });
    }

    function checkAdd() {
      $http({
            url: URL + "api/admin/addMerchant.php",
            method: 'GET'
          }).then(function(res){
            $scope.error = res.data.error;
            $scope.success = res.data.success;
          });
    }

    $scope.add = function(){
    $http({
      url: URL + 'api/admin/addMerchant.php',
      method: 'POST',
      data: $scope.form
    }).then(function(data){
          $scope.merchant.push(data.data);
          $(".modal").modal("hide");
      
    });
  }


    $scope.remove = function(post,index){
      var result = confirm("Do you want to remove this merchant?");
       if (result) {
        $http({
          url: URL + 'api/admin/removeMerchant.php?id='+post.merchantId,
          method: 'DELETE'
        }).then(function(data){
          $scope.merchant.splice(index,1);
        });
      }
    }
});