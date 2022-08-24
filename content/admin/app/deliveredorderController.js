app.controller('deliveredorderController',function($scope,$http,$location){

	$scope.delivered = [];

	getDeliveredOrder();
    function getDeliveredOrder() {
        $http({
            url: URL + "api/admin/getDeliveredOrder.php",
            method: 'GET'
          }).then(function(res){
            $scope.delivered = res.data.data;
            console.log($scope.delivered);
          });
    }


    $scope.statusSelect = ['In Process', 'Delivered'];
    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getDeliveredOrderDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.detail = data.data.detail;
        $scope.tracking = data.data.tracking;
      });
    }



	
})