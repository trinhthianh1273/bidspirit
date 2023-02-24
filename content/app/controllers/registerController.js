app.controller('registerController', function($scope,$http, $location){
    
    function checkpass(pass, cpass) {
        if(pass == cpass) {
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
                    console.log('');
                    $scope.data = data.data;
                    if($scope.data.register_msg == "Register Successfully") {
                        alert($scope.data.register_msg);
                        location('/login');
                    } else {
                        alert($scope.data.register_msg);
                    }
              });
        } else {
            $scope.matchpass = "Password not matched";
            alert($scope.matchpass);
        }
        
    }
})