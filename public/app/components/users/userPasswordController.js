(function(app){
    app.controller('userPasswordController',userPasswordController);
    userPasswordController.$inject = ['apiService','$scope','notificationService','$state'];

    function userPasswordController(apiService,$scope,notificationService,$state){
        $scope.post = {}
        $scope.UpdateProfile = UpdateProfile;
        function UpdateProfile() {
            apiService.put('/account/password',$scope.post,
            function(response){
                notificationService.displaySuccess("Cập nhật thành công");
                $state.go('users');
            },function(error){
                notificationService.displayError(error.data.message);
            });
        }
    }
})(angular.module('myCustomer.users'));