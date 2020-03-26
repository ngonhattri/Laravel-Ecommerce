@extends("client.layouts.master")
@section("title","Người dùng")
@section("url","account")
@section("image","client/images/food.jpg")
@section("meta_description","Bán hàng")
@section("meta_keyword","Bán hàng")
@section("content")
<div class="main" ng-app="myCustomer">
    <div class="shop_top">
        <div ui-view></div>        
    </div>
</div>
@endsection