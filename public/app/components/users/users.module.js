(function(){
    angular.module('myCustomer.users',['customer.common'],function($interpolateProvider){
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    }).config(config);
    config.$inject = ['$stateProvider','$urlRouterProvider'];
    function config($stateProvider,$urlRouterProvider) {
        $stateProvider
        .state('users',{
           url:'/user',
           parent:'base',
           templateUrl:'app/components/users/userListView.html',
           controller:'userListController' 
        })
        .state('user_edit',{
            url:'/user/edit',
            parent:'base',
            templateUrl:'app/components/users/userEditView.html',
            controller:'userEditController'
        })
        .state('user_edit_avatar',{
            url:'/user/edit_avatar',
            parent:'base',
            templateUrl:'app/components/users/userAvatarView.html',
            controller:'userAvatarController'
        })
        .state('user_edit_password',{
            url:'/user/edit_password',
            parent:'base',
            templateUrl:'app/components/users/userPasswordView.html',
            controller:'userPasswordController'
        });
    }
})();