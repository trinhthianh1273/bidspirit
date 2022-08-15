app.controller('categoryController', function($scope, $http){
    $scope.category = [];
    getcategory();
    function getcategory() {
        $http({
            url: URL + "api/admin/getCategory.php",
            method: 'GET'
          }).then(function(res){
            $scope.category = res.data.category;
          });
    }

    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getCategoryDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.form = data.data;
      });
    }

    $scope.saveEdit = function(){
      $http({
        url: URL + 'api/admin/setCategory.php?id='+$scope.form.categoryId,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.categoryId,data.data);
          console.log($scope.data);
      });
    }

    $scope.add = function() {
        a = confirm("Do you want to create a category?");
        if(a) {
            $http({
                url: URL + 'api/admin/addCategory.php',
                method: 'POST',
                data: $scope.form
              }).then(function(data){
                    $scope.category.push(data.data);
                    console.log($scope.category);
              });
        }
    }
});