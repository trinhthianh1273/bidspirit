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
      }).then(function(res){
          $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,res.data.user.userId,res.data.user);
      });
    }



    $scope.add = function(){

      $http({

        url: URL + 'api/admin/addUser.php',
        method: 'POST',
        data: $scope.form

      }).then(function(res){
        $scope.data = res.data;
        $scope.msg = res.data.add_msg;

        alert($scope.msg);
        $scope.user.push(res.data.user);
        $(".modal").modal("hide");

        
        
        })
      
    }


    $scope.remove = function(post,index){
      var result = confirm("Do you want to remove this User?");
       if (result) {
        $http({
          url: URL + 'api/admin/removeUser.php?id='+post.userId,
          method: 'DELETE'
        }).then(function(data){
          $scope.user.splice(index,1);
        });
      }
    }

    
});