@extends('client.layouts.master')
@section("title",$product->name)
@section("url","san-pham/".$product->id."/".$product->alias)
@section("image",$image)
@section("meta_description",$product->meta_description)
@section("meta_keyword",$product->meta_description)
@section('content')
<div class="main">
        <div class="shop_top">
          <div class="container">
              <div class="row">
                  <div class="col-md-9 single_left">
                     <div class="single_image">
                           <ul id="etalage">
                               @foreach (json_decode($product->gallery) as $image)
                               <li>
                                    <a href="javascript:void(0)">
                                        <img class="etalage_thumb_image" src="{{$image}}" />
                                        <img class="etalage_source_image" src="{{$image}}" />
                                    </a>
                                </li>
                               @endforeach
                          </ul>
                          </div>
                          <!-- end product_slider -->
                          <div class="single_right">
                              <h3>{{$product->name}}</h3>
                                <h4><b>Người bán: </b><a href="{{route('profile',[$product->users->id,$product->users->name])}}">{{$product->users->name}}</a></h4>
                                @if($product->out_of_stock == 1)
                                <h4><b>Tình trạng: Còn hàng</b></h4>
                                @else
                                <h4><b>Tình trạng: Hết hàng</b></h4>
                                @endif
                              <div class="social_buttons">
                                <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="window.location.href='{{$product->facebook}}'">
                                    <i class="icon-facebook"></i> Facebook
                                  </button>
                              </div>
                          </div>
                          <div class="clear"> </div>
                  </div>
                  <div class="col-md-3">
                    <div class="box-info-product">
                      <p class="price2">{{number_format($product->price)}} VNĐ</p>
                     </div>
                 </div>
              </div>		
              <div class="desc">
                     <h4>Giới thiệu sản phẩm</h4>
                     <p>{!!$product->content!!}</p>
              </div>
           </div>
         </div>
        </div>
@endsection