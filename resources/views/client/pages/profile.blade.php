@extends('client.layouts.master')
@section("title","Cửa hàng của ".$user->name)
@section("url","nguoi-ban/".$user->id."/".$user->name)
@section("image",$user->avatar)
@section("meta_description",$user->about)
@section("meta_keyword",$user->name)
@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            <div class="row">
                <div class="col-md-4 team_bottom">
                    <ul class="team_list">
                        <h4>{{$user->name}}</h4>
                        <li>Số điện thoại
                            <p>{{$user->phone}}</p>
                        </li>
                        <li>Trường
                            <p>{{$user->school->name}}</p>
                        </li>
                        @if($user->instagram != null)
                        <li>Instagram
                            <p><a href="{{$user->instagram}}" target="_blank">Link</a></p>
                        </li>
                        @endif
                        @if($user->facebook != null)
                        <li>Facebook
                            <p><a href="{{$user->facebook}}" target="_blank">Link</a></p>
                        </li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-8">
                    <ul class="team_list">
                        <h4>Giới thiệu</h4>
                        <p class="m_7">{!!$user->about!!}</p>
                        <img src="{{$user->avatar}}" style="width:250px; height:250px;" class="img-responsive" alt="" />
                    </ul>
                </div>
            </div>
            <div class="row team_box">
                <h3 class="m_2">Sản phẩm của tôi</h3>
                @foreach ($user->products as $item)
                    @if($item->status == 1)
                    <div class="col-md-3 team1">
                        @foreach (json_decode($item->gallery) as $image)
                            @if ($loop->first)
                                <a class="popup-with-zoom-anim" href="{{route('detail',[$item->id,$item->alias])}}"><img style="width:262.5px; height:175px;" src="{{$image}}" class="img-responsive" title="continue" alt="" /></a>
                            @endif
                        @endforeach
                        <div id="small-dialog3" class="mfp-hide">
                            <div class="pop_up2">
                                <h3>{{$item->name}}</h3>
                            </div>
                        </div>
                        <p class="m_6">Giá: {{number_format($item->price)}} VNĐ</p>
                    </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection