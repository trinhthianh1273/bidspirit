app.controller('merchantController', function($scope){
    $scope.merchant = [];
    getmerchant();
    function getmerchant() {
        $http({
            url: URL + "api/admin/getmerchant.php",
            method: 'GET'
          }).then(function(res){
            $scope.merchant = res.data.merchant;
            console.log($scope.merchant);
          });
    }
});