(function(app){
    app.controller('productAddController',productAddController);
    productAddController.$inject = ['apiService','$scope','notificationService','$state','Upload'];

    function productAddController(apiService,$scope,notificationService,$state,Upload){
        $scope.post = {}
        $scope.ckeditorOptions = {
            language: 'vi',
            height:'200px',
            removePlugins:'image'
        }
        $scope.uploadFiles = function (files) {
            $scope.files = files;
            if (files && files.length) {
                Upload.upload({
                    url: 'account/product_add',
                    data: {
                        files: files,
                        data: $scope.post
                    }
                }).then(function(){
                    notificationService.displaySuccess("Thêm thành công");
		            $state.go('products');
                }).catch(function(error){
                    notificationService.displayError(error.data.message);
                });
            }
        };
        function loadCategories() {
            apiService.get('/account/category',null,function(response){
                $scope.listCategories = response.data;
            },function(){
                console.log('Error');
            });
        }
        loadCategories();
    }
})(angular.module('myCustomer.products'));