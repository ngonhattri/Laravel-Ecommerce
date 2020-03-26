@extends('client.layouts.master')
@section("title","Điều lệ website")
@section("url","dieu-le")
@section("image","client/images/food.jpg")
@section("meta_description","Cộng đồng bán hàng của sinh viên")
@section("meta_keyword","Cộng đồng sinh viên")
@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="panel-group" id="accordion">
                @foreach ($rules as $index => $item)
                    <div class="panel-heading">
                        <h4 class="panel-title">
                          <a data-toggle="collapse" href="#collapse{{$index}}">{{$item->title}}</a>
                        </h4>
                      </div>
                      <div id="collapse{{$index}}" class="panel-collapse collapse">
                        <ul class="list-group">
                            @foreach ($item->rules as $key => $rule)
                                <li class="list-group-item"><a data-toggle="collapse" data-parent="#accordion" href="#rules-{{$index}}-{{$key}}">
                                        {{$rule->title}}</a>
                                    </li>
                                    <div id="rules-{{$index}}-{{$key}}" class="panel-collapse collapse in">
                                            <div class="panel-body">{!!$rule->content!!}</div>
                                        </div>
                            @endforeach
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>              
@endsection