app.controller('changepasswordController', function($scope, $http){
	$scope.matchpass = "";

    $scope.checkpass = function() {
    	if($scope.curPass === $scope.curPassA) {
    		matchpass = "Password Matched";
    		console.log(matchpass);
    		$http({
		        url: URL + 'api/admin/changePass.php',
		        method: 'POST',
		        data: $scope.form
		      }).then(function(data){
		        
		          $scope.data = data.data;
		          console.log($scope.data);
		      });
    	} else {
    		matchpass =" Password not matched";
    		console.log(matchpass);
    		
    	}
    }
});