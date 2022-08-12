app.controller('userController', function($scope, $http){
    $scope.user = [];
    getuser();
    function getuser() {
        $http({
            url: URL + "api/admin/getuser.php",
            method: 'GET'
          }).then(function(res){
            $scope.user = res.data.user;
            console.log($scope.user);
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
        url: URL + 'api/admin/getUser.php?id='+$scope.form.id,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.id,data.data);
      });
    }

    $scope.remove = function(post,index){
      var result = confirm("Do you want to remove this User?");
       if (result) {
        $http({
          url: URL + 'api/admin/removeUser.php?id='+post.id,
          method: 'DELETE'
        }).then(function(data){
          $scope.data.splice(index,1);
        });
      }
    }

    
});