app.controller('mainController', function($scope,$http,$location){
    

    $scope.orderType = function() {
        if ($('.ordertype').css("display") == 'none') {
                $('.ordertype').css("display", "block");
        } else {
            $('.ordertype').css("display","none");
        }
    }


    getOrder();
    function getOrder() {
        $http({
            url: URL + "api/admin/getOrder.php",
            method: 'GET'
          }).then(function(res){
            $scope.todayOrder = res.data.todayOrder[0].todayCount;
            $scope.pendingOrder = res.data.pendingOrder[0].pendingCount;
            $scope.deliveredOrder = res.data.deliveredOrder[0].deliverdCount;
            console.log($scope.todayOrder);
          });
    }
});