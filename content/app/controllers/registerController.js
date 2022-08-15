app.controller('registerController', function($scope,$http){
    
    function category() {
        $http({
            url: URL + "api/user/register.php",
            method: 'POST',
            data: $scope.form
          }).then(function(res){
            
          });
    }
})