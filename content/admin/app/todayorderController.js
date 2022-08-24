app.controller('todayorderController',function($scope,$http,$location){

	getTodayOrder();
    function getTodayOrder() {
        $http({
            url: URL + "api/admin/getTodayOrder.php",
            method: 'GET'
          }).then(function(res){
            $scope.today = res.data;
            console.log($scope.today);
          });
    }

    $scope.statusSelect = ['In Process', 'Delivered'];
    $scope.edit = function(id){
      $http({
        url: URL + 'api/admin/getPendingOrderDetail.php?id='+id,
        method: 'GET'
      }).then(function(data){
        $scope.form = data.data;
      });
    }


    $scope.saveEdit = function(){
      $http({
        url: URL + 'api/admin/setOrder.php?id='+$scope.form.orderId,
        method: 'POST',
        data: $scope.form
      }).then(function(data){
        $(".modal").modal("hide");
          $scope.data = apiModifyTable($scope.data,data.data.orderId,data.data);
          $scope
          alert('')
      });
    }

	
})