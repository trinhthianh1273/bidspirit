
app.controller('headerController', function(sessionService,$scope,$http,$location){

	// getSession();
	// function getSession() {
	// 	sessionService.set('username');
	// 	console.log(sessionService.get('username'));
	// }

	/*
	ulogin();
	function ulogin() {
		    $http({
		            url: URL + "getSession.php",
		            method: 'GET',
		            param: {'ulogin':ulogin}
		          }).then(function(res){
		            $scope.ulogin = res.data;
		            if($scope.ulogin.username) {
		            	document.getElementById('registerBlock').style.display = 'none';
		            	document.getElementById('userBlock').style.display = 'block';
		            	document.getElementById('account').style.display = 'none';
		            	document.getElementById('account_ulogin').style.display = 'block';
		            	console.log($scope.ulogin);
		        }
		    });
      }
      */
      a();
      function a() {
      	if($scope.ulogin.username) {
			document.getElementById('registerBlock').style.display = 'none';
		    document.getElementById('userBlock').style.display = 'block';
		    document.getElementById('account').style.display = 'none';
		    document.getElementById('account_ulogin').style.display = 'block';
      	}
      }
  
})