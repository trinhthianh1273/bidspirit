app.controller('profileController',function(sessionService,$scope,$http,$location){

	
	ulogin();
	function ulogin() {
		    $http({
		            url: URL + "getSession.php",
		            method: 'GET',
		          }).then(function(res){
		            $scope.ulogin = res.data;
		            if($scope.ulogin.username) {
		            	console.log($scope.ulogin);
		        }
		    });
      }

})