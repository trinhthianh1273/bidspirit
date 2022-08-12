app.controller('loginController', function(sessionService,$scope,$http, $location){
    
    login();
    function login() {
        $http({
            url: URL + "api/user/login.php",
            method: 'GET'
          }).then(function(res){
            if(res.data.ulogin) {
                $scope.ulogin = res.data.ulogin;
                console.log($scope.ulogin);
            }

          });
    }
})