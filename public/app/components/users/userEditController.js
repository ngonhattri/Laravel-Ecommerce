(function(app){
    app.controller('userEditController',userEditController);
    userEditController.$inject = ['apiService','$scope','notificationService','$state'];

    function userEditController(apiService,$scope,notificationService,$state){
        $scope.post = {}
        $scope.UpdateProfile = UpdateProfile;
        function loadPostDetail() {
            apiService.get('/account/user',null,function(response){
            	$scope.post = response.data.user;
            	$scope.post.phone = parseInt(response.data.user.phone);
            },function(){
                console.log('Error');
            });
        }
        function UpdateProfile() {
            apiService.put('/account/user',$scope.post,
            function(response){
                notificationService.displaySuccess("Cập nhật thành công");
                $state.go('users');
            },function(){
                console.log('Error');
            });
        }
        function loadSchools() {
            apiService.get('/account/school',null,function(response){
                $scope.listSchools = response.data;
            },function(){
                console.log('Error');
            });
        }
        loadPostDetail();
        loadSchools();
    }
})(angular.module('myCustomer.users'));