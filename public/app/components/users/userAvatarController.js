(function(app){
    app.controller('userAvatarController',userAvatarController);
    userAvatarController.$inject = ['$scope','notificationService','$state','Upload'];

    function userAvatarController($scope,notificationService,$state,Upload){
        $scope.uploadPic = function(file) {

	    	file.upload = Upload.upload({
	      		url: '/account/upload',
	      		data: {file: file},
	    	});
		    notificationService.displaySuccess("Cập nhật thành công");
		    $state.go('users');
    	}
	}
})(angular.module('myCustomer.users'));