@extends('client.layouts.master')
@section("title","Trang chủ website chợ sinh viên")
@section("url","")
@section("image","client/images/food.jpg")
@section("meta_description","Cộng đồng bán hàng của sinh viên")
@section("meta_keyword","Cộng đồng sinh viên")
@section('content')
    <div class="features" style="padding: 3% 0;">
        <div class="container">
            <h1 class="text-center">Nơi buôn bán và trao đổi các linh kiện máy tính</h1>
        </div>
    </div>
    <div class="features" style="padding: 3% 0;">
		<div class="container">
			<h3 class="m_3">Khu vực</h3>
			  <div class="row">
                @foreach ($schools as $item)
                    <div class="col-md-3 top_box">
                        <div class="view view-ninth"><a href="{{route('category',$item->alias)}}">
                          <img src="{{$item->image}}" class="img-responsive" alt=""/>
                          <div class="mask mask-1"></div>
                          <div class="mask mask-2"></div>
                            <div class="content">
                              <h2>{{$item->name}}</h2>
                              <p>{{$item->address}}</p>
                            </div>
                         </a></div>
                        <h4 class="m_4"><a href="#">{{$item->name}}</a></h4>
                        <p class="m_5">{{$item->address}}</p>
                    </div>
                @endforeach	
			</div>
		 </div>
	    </div>
@endsection