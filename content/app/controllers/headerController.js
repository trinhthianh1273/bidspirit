
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
      	sessionService.destroy('userId');
      	sessionService.destroy('username');

      	$http({
	            url: URL + "api/user/logout.php",
	            method: 'get'
	          }).then(function(res){
	            $scope.data = res.data;
	            console.log($scope.data);
	            $location.path('/');
	          });

	      document.getElementById('registerBlock').style.display = 'block';
		document.getElementById('userBlock').style.display = 'none';
		document.getElementById('account').style.display = 'block';
		document.getElementById('account_ulogin').style.display = 'none';
		}
      
      $scope.showSearch = function() {
      	$('.search-form').show(500);
      	$('#search-icon').hide();
      	$('#x-icon').show();
      }

      $scope.hideSearch = function() {
      	$('.search-form').hide(500);
      	$('#search-icon').show();
      	$('#x-icon').hide();
      } 


      $scope.search = function(id) {
      	sessionService.set('search', id);

        	$location.path('/search');
      }

        
});
