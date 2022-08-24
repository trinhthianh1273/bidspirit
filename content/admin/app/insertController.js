app.controller('insertController',function(sessionService,$scope, $http, $location, $filter){
    

    getcategory();
    function getcategory() {
        $http({
            url: URL + "api/admin/getCategoryName.php",
            method: 'GET'
          }).then(function(res){
            $scope.category = res.data;
          });
    }


    getmerchant();
    function getmerchant() {
        $http({
            url: URL + "api/admin/getMerchantName.php",
            method: 'GET'
          }).then(function(res){
            $scope.merchant = res.data;
          });
    }


    $scope.insert = function() {
        console.log($scope.form);
        $scope.form.startDate = $filter('date')($scope.form.startDate,'yyyy-MM-dd hh:mma');
        $scope.form.endDate = $filter('date')($scope.form.endDate,'yyyy-MM-dd hh:mma');
        
            var fd = new FormData();
            angular.forEach($scope.form.productimage1,function(file){
                fd.append('file[]',file);
            });
            angular.forEach($scope.form.productimage2,function(file){
                fd.append('file[]',file);
            });
            angular.forEach($scope.form.productimage3,function(file){
                fd.append('file[]',file);
            });

            $http({
              method: 'post',
              url: URL + "api/admin/upload.php",
              data: fd,
              headers: {'Content-Type': undefined},
            }).then(function(response) { 
              $scope.img = response.data;
              console.log($scope.img.name[0]);
              
            });

            $http({
              method: 'post',
              url: URL + "api/admin/addProduct.php",
              data: $scope.form,
            }).then(function(response) { 
              
              $scope.response = response.data;
              console.log($scope.response);
            });

        document.getElementById('insertForm').reset();
    }

    
});