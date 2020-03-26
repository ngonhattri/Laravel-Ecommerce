(function(){
    angular.module('myCustomer',[
        'myCustomer.users',
        'myCustomer.products',
        'customer.common',
    ],function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).config(config)
      .config(configAuthentication);
    config.$inject = ['$stateProvider','$urlRouterProvider'];
    function config($stateProvider,$urlRouterProvider) {
        $stateProvider
        .state('base',{
            url:'',
            templateUrl:'app/shared/views/baseView.html',
            abstract:true,
        });
        $urlRouterProvider.otherwise('/user');
    }
    function configAuthentication($httpProvider) {
        $httpProvider.interceptors.push(function ($q, $location) {
            return {
                request: function (config) {
                     return config;
                },
                requestError: function (rejection) {
                     return $q.reject(rejection);
                },
                response: function (response) {
                    return response;
                },
                responseError: function (rejection) {
                    return $q.reject(rejection);
                }
            };
        });
    }
})();