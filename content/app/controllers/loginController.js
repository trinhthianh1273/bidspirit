app.controller('loginController', function(sessionService,$scope,$http, $location){
    $scope.ulogin = [];
    
    function login() {
        $http({
            url: URL + "api/user/login.php",
            method: 'POST',
            data: $scope.form
          }).then(function(res){
            $scope.ulogin = res.data;
            console.log($scope.ulogin);
          });
    }
})