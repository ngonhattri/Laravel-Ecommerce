(function(app){
    app.controller('productListController',productListController);
    productListController.$inject = ['apiService','$scope','notificationService','$state'];

    function productListController(apiService,$scope,notificationService,$state){
        $scope.posts = [];
        $scope.totalPages = 0;
        $scope.currentPage = 1;
        $scope.range = [];
        $scope.getPosts = getPosts;
        $scope.totalItem = 0;
        $scope.deletePost = deletePost;
        $scope.loading = true;
        // Delete one
        function deletePost(id) {
            if(confirm("Bạn có muốn xóa ?")){
                apiService.del('/account/product_delete/'+id,null,function(result){
                    notificationService.displaySuccess(result.data.message);
                    getPosts();
                },function(){
                    console.log('Error');
                })
            }
        }
        // Get All
        function getPosts(pageNumber) {
            if (pageNumber === undefined) {
                pageNumber = '1';
            }
            apiService.get('/account/product'+'?page='+pageNumber,null,function(result){
                if(result.data.data.total == 0) {
                    notificationService.displayWarning('Không tìm thấy dữ liệu');
                }
                else {
                    notificationService.displaySuccess('Đã tìm thấy ' + result.data.data.total + ' dữ liệu');
                }
                $scope.loading = false;
                $scope.posts = result.data.data.data;
                $scope.totalPages = result.data.data.last_page;
                $scope.currentPage = result.data.data.current_page;
                $scope.totalItem = result.data.data.total;
                console.log(result.data.data);
                var pages = [];
                for (var i = 1; i <= result.data.data.last_page; i++) {
                    pages.push(i);
                }
                $scope.range = pages;
            },function(){
                $scope.loading = false;
                console.log('Error');
            })
        }
        
        $scope.getPosts();
    }
    // Pagination
    app.directive('postsPagination', function(){
        return {
            restrict: 'E',
            template: '<ul class="pagination pull-right page-list">'+
                '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getPosts(1)">«</a></li>'+
                '<li ng-show="currentPage != 1"><a href="javascript:void(0)" ng-click="getPosts(currentPage-1)">‹ Prev</a></li>'+
                '<li ng-repeat="i in range" ng-class="{active : currentPage == i}">'+
                    '<a href="javascript:void(0)" ng-click="getPosts(i)"><% i %></a>'+
                '</li>'+
                '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getPosts(currentPage+1)">Next ›</a></li>'+
                '<li ng-show="currentPage != totalPages"><a href="javascript:void(0)" ng-click="getPosts(totalPages)">»</a></li>'+
            '</ul>'
        };
    });
})(angular.module('myCustomer.products'));