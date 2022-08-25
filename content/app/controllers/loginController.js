app.controller('loginController', function(sessionService,$scope,$http, $location){
    
    
    $scope.login = function login() {
        // event.preventDefault();
        
        $http({
            url: URL + "api/user/login.php",
            method: 'POST',
            data: $scope.form
          }).then(function(res){
            $scope.ulogin = res.data;
            if($scope.ulogin.userId) {
                
                    alert($scope.ulogin.login_msg);
                    $location.path('/home');
                
            } else {
                alert($scope.ulogin.login_msg);
                document.getElementById('login_error').style.display = 'block';
            }
          });
    }
})