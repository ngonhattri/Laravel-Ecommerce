(function(app){
    app.factory('apiService',apiService);

    apiService.$inject=['$http'];
    function apiService($http){
        return {
            get: get,
            post: post,
            put:put,
            del:del
        }
        function del(url,data,success,failure) {
            $http.delete(url,data)
            .then(function(result) {
                success(result);
            },function(error){
                if(failure!=null)
                {
                    failure(error);
                }
            });
        }
        function post(url,data,success,failure) {
            $http.post(url,data)
            .then(function(result) {
                success(result);
            },function(error){
                if(failure!=null)
                {
                    failure(error);
                }
            });
        }
        function put(url,data,success,failure) {
            $http.put(url,data)
            .then(function(result) {
                success(result);
            },function(error){
                if(failure!=null)
                {
                    failure(error);
                }
            });
        }
        function get(url,params,success,failure) {
            $http.get(url,params)
            .then(function(result){
                success(result);
            },function(error){
                if(failure!=null)
                {
                    failure(error);
                }
            });
        }
    }
})(angular.module('customer.common'));