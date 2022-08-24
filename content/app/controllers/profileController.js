app.controller('profileController',function(sessionService,$scope,$http,$location){

	$scope.profile = [];

	getProfile();
	function getProfile() {
		$http({
            url: URL + "api/user/getProfile.php?id=" + $scope.userId,
            method: 'GET'
          }).then(function(res){
            $scope.profile = res.data.profile[0];
          });
	}

	$scope.updateProfile = function() {
		alert('anh');
		$http({
        url: URL + 'api/user/updateProfile.php?id='+$scope.userId,
        method: 'POST',
        data: $scope.profile
      }).then(function(data){
        $('#updateSuccess').show();
      });
	}

	
})