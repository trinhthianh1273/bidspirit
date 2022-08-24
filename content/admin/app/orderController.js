app.controller('orderController', function($scope,$http,$location){
    
    function getorder() {
        $http({
            url: URL + "api/admin/getOrder.php",
            method: 'GET'
          }).then(function(res){
          });
    }
});