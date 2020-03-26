@extends('client.layouts.master')
@section("title",$data->name)
@section("url","trang/$data->alias")
@section("image",$data->image)
@section("meta_description",$data->meta_description)
@section("meta_keyword",$data->meta_keyword)
@section('content')
<div class="main">
        <div class="shop_top">
          <div class="container">
            <h3 style="text-align:center">{{$data->name}}</h3>
                {!!$data->content!!}
            </div>
        </div>
       </div>
@endsection