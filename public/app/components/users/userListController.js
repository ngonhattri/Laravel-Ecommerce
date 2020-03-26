(function(app){
    app.controller('userListController',userListController);

    userListController.$inject = ['$scope','apiService'];

    function userListController($scope,apiService){
        // Get User
        function getUser() {
            apiService.get('/account/user',null,function(response){
            	$scope.user = response.data.user;
                $scope.user.school = response.data.school;
            },function(){
                console.log('Error');
            });
        }
        getUser();
    }
})(angular.module('myCustomer.users'));
