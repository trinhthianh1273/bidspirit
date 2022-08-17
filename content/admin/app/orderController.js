app.controller('orderController', function($scope){
    $scope.order = [];
    getorder();
    function getorder() {
        $http({
            url: URL + "api/admin/getorder.php",
            method: 'GET'
          }).then(function(res){
            $scope.order = res.data.order;
            console.log($scope.order);
          });
    }
});