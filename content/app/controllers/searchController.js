
app.controller('searchController', function(sessionService,$scope,$http,$location){
    $scope.search = sessionService.get('search');
    $scope.searchResult = [];
    
    getSearch();
    function getSearch() {
        $http({
            url: URL + 'api/interview/getSearch.php?search=' + $scope.search,
            method: 'get' 
        }). then(function(res) {
            $scope.live = res.data.live;
            $scope.upcoming = res.data.upcoming;
            $scope.closed = res.data.closed;
            $scope.noresult = res.data.noresult;
            
            
        });
    }

    $scope.bid = function(id) {
        sessionService.set('productId', id);
        $location.path('/bid');
        
    }

    $scope.upcomingProduct = function(id) {
        sessionService.set('productId', id);
        $location.path('/upcomingProduct');
        
    }

    $scope.closedProduct = function bid(id) {
        sessionService.set('productId', id);
        $location.path('/closedProduct');
        
    }

    
})