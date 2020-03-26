@extends('client.layouts.master')
@section("title",$school->name)
@section("url","danh-muc/".$school->alias)
@section("image","$school->image")
@section("meta_description","Danh sách sản phẩm ở ".$school->name)
@section("meta_keyword",$school->name)
@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row shop_box-top">
            	<nav class="navbar navbar-inverse">
				  <div class="container-fluid">
				    <div class="navbar-header">
				      <a class="navbar-brand" href="javascript:void(0)">Danh mục</a>
				    </div>
				    <ul class="nav navbar-nav">
				    	@foreach($categories as $category)
				      		<li><a href="{{route('detail_category',[$school->alias,$category->id])}}">{{$category->name}}</a></li>
				      	@endforeach
				    </ul>
				  </div>
				</nav>
                @foreach ($products_array as $item)
                    <div class="col-md-3 shop_box">
                        <a href="{{route('detail',[$item->id,$item->alias])}}">
                            @foreach (json_decode($item->gallery) as $image)
                                @if ($loop->first)
                                    <img src="{{$image}}" style="width:262.5px; height:197px;" class="img-responsive" alt="" />
                                @endif
                            @endforeach
                            <div class="shop_desc">
                                <h3><a href="{{route('detail',[$item->id,$item->alias])}}">{{$item->name}}</a></h3>
                                <p><b>Người bán:</b><a href="{{route('profile',[$item->users->id,$item->users->name])}}">{{$item->users->name}}</a></p>
                                <span class="actual"><b>Giá:</b> {{number_format($item->price)}} VNĐ</span>
                                <br>
                            </div>
                        </a>
                    </div>  
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection