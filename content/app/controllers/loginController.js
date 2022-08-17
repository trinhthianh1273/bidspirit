app.controller('loginController', function(sessionService,$scope,$http, $location){
    
    
    $scope.login = function login() {
        $http({
            url: URL + "api/user/login.php",
            method: 'POST',
            data: $scope.form
          }).then(function(res){
            $scope.ulogin = res.data;
            if($scope.ulogin.userId) {
                $location.path('/home');
            } else {
                document.getElementById('login_error').style.display = 'block';
            }
          });
    }
})