
app.controller('headerController', function(sessionService,$scope,$http,$location){

      a();
      function a() {
      	if($scope.userId) {
			document.getElementById('registerBlock').style.display = 'none';
		    document.getElementById('userBlock').style.display = 'block';
		    document.getElementById('account').style.display = 'none';
		    document.getElementById('account_ulogin').style.display = 'block';
      	}
      }

      $scope.logout = function(){
      	alert('Anh');
      	document.getElementById('registerBlock').style.display = 'block';
		    document.getElementById('userBlock').style.display = 'none';
		    document.getElementById('account').style.display = 'block';
		    document.getElementById('account_ulogin').style.display = 'none';

      	sessionService.destroy('userId');
      	sessionService.destroy('username');

      	$http({
	            url: URL + "api/user/logout.php",
	            method: 'POST'
	          }).then(function(res){
	            $scope.data = res.data;
	            console.log($scope.data);
	            $location.path('/');
	          });

      }

        
})