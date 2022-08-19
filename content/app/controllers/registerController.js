app.controller('registerController', function($scope,$http){
    
    function checkpass(pass, cpass) {
        if(pass === cpass) {
            return true;
        } else {
            return false;
        }
    }
        
    $scope.register = function(){
        
        if(checkpass($scope.form.pass, $scope.form.cpass)) {
            $http({
                url: URL + 'api/user/register.php',
                method: 'POST',
                data: $scope.form
              }).then(function(data){
                    $scope.data = data.data;
                    console.log($scope.data);
                    location.path('/home');
              });
        } else {
            $scope.matchpass = "Password not matched";
        }
        
    }
})