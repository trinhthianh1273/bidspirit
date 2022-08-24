

app.controller('categoryController', function(sessionService, $scope,$http, $location){
    $scope.category = [];
    category();
    function category() {
        $http({
            url: URL + "api/interview/category.php",
            method: 'GET'
          }).then(function(res){
            $scope.category = res.data.category;
          });
    }
})