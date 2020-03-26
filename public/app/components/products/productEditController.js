(function(app){
    app.controller('productEditController',productEditController);
    productEditController.$inject = ['apiService','$scope','notificationService','$state','$stateParams'];

    function productEditController(apiService,$scope,notificationService,$state,$stateParams){
        $scope.post = {}
        $scope.ckeditorOptions = {
            language: 'vi',
            height:'200px',
            removePlugins:'image'
        }
        function loadCategories() {
            apiService.get('/account/category',null,function(response){
                $scope.listCategories = response.data;
            },function(){
                console.log('Error');
            });
        }
        function loadProduct(){
        	apiService.get('/account/product/'+$stateParams.id,null,function(response){
                $scope.post = response.data;
            },function(error){
                notificationService.displayError("Không tìm thấy sản phẩm");
            });
        }
        $scope.update = function () {
            apiService.put('/account/product_update/'+$stateParams.id,$scope.post,
            function(response){
                notificationService.displaySuccess("Cập nhật thành công");
                $state.go('products');
            },function(){
                console.log('Error');
            });
        }
        loadProduct();
        loadCategories();
    }
})(angular.module('myCustomer.products'));