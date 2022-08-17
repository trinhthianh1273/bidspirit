

app.service('sessionService', ['$http', function($scope,$http){
	return{
        set: function(key, value){
            
            return sessionStorage.setItem(key, value);
        },
        get: function(key){

            return sessionStorage.getItem(key);
        },
        destroy: function(key){

            return sessionStorage.removeItem(key);
        }
    };
}]);


function apiModifyTable(originalData,id,response){
    angular.forEach(originalData, function (item,key) {
        if(item.id == id){
            originalData[key] = response;
        }
    });
    return originalData;
}

