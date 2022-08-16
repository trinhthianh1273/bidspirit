app.controller('loginController', function(sessionService,$scope,$http, $location){
    
    ulogin();
    function ulogin() {
            $http({
                    url: URL + "getSession.php",
                    method: 'GET',
                  }).then(function(res){
                    $scope.session = res.data;
                    if($scope.session.ulogin_error) {
                        document.getElementById('login_error').style.display = 'block';
                    console.log($scope.session);
                }
                  });
      }
    
    $scope.login = function login() {
        $http({
            url: URL + "api/user/login.php",
            method: 'POST',
            data: $scope.form
          }).then(function(res){
            $scope.ulogin = res.data;
            if($scope.ulogin.ulogin_error) {
                document.getElementById('login_error').style.display = 'block';
            }
            console.log($scope.ulogin);
          });
    }
})