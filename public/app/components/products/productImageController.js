(function(app){
    app.controller('productImageController',productImageController);
    productImageController.$inject = ['apiService','$scope','notificationService','$state','$stateParams','Upload'];

    function productImageController(apiService,$scope,notificationService,$state,$stateParams,Upload){
        $scope.uploadFiles = function (files) {
            $scope.files = files;
            if (files && files.length) {
                Upload.upload({
                    url: 'account/product_image/'+$stateParams.id,
                    data: {
                        files: files
                    }
                }).then(function(){
                    notificationService.displaySuccess("Đổi ảnh thành công");
		            $state.go('products');
                }).catch(function(error){
                    notificationService.displayError(error.data.message);
                });
            }
        };
    }
})(angular.module('myCustomer.products'));