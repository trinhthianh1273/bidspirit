app.controller('userController', function($scope, $http){
    $scope.user = [];
    getuser();
    function getuser() {
        $http({
            url: URL + "api/admin/getuser.php",
            method: 'GET'
          }).then(function(res){
            $scope.user = res.data.data;
          });
    }

    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getUserDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.form = data.data;
      });
    }

    $scope.saveEdit = function(){
      $http({
        url: URL + 'api/admin/setUser.php?id='+$scope.form.userId,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.userId,data.data);
          console.log($scope.data);
      });
    }

    function checkAdd() {
      $http({
            url: URL + "api/admin/addUser.php",
            method: 'GET'
          }).then(function(res){
            $scope.error = res.data.error;
            $scope.success = res.data.success;
          });
          if($scope.error) {
            return 0;
          }
          return 1;
    }

    $scope.add = function(){
    $http({
      url: URL + 'api/admin/addUser.php',
      method: 'POST',
      data: $scope.form
    }).then(function(data){
      if(checkAdd()==1) {
          $scope.data.push(data.data);
          $(".modal").modal("hide");
      }
      
    });
  }


    $scope.remove = function(post,index){
      var result = confirm("Do you want to remove this User?");
       if (result) {
        $http({
          url: URL + 'api/admin/removeUser.php?id='+post.userId,
          method: 'DELETE'
        }).then(function(data){
          $scope.data.splice(index,1);
        });
      }
    }

    
});