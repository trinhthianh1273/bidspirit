app.controller('categoryController', function($scope){
    $scope.category = [];
    getcategory();
    function getcategory() {
        $http({
            url: URL + "api/admin/getcategory.php",
            method: 'GET'
          }).then(function(res){
            $scope.category = res.data.category;
            console.log($scope.category);
          });
    }
});