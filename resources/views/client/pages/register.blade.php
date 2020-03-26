@extends('client.layouts.master')
@section("title","Đăng ký")
@section("url","dang-ky")
@section("image","client/images/food.jpg")
@section("meta_description","Cộng đồng bán hàng của sinh viên")
@section("meta_keyword","Cộng đồng sinh viên")
@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            <form method="POST" action="{{ route('register') }}"> 
                {{ csrf_field() }}
                <div class="register-top-grid">
                    <h3>Thông tin người dùng tới khách hàng</h3>
                    <div>
                        <span>Họ và tên<label>*</label></span>
                        <input type="text" name="name" value="{{ old('name') }}" required> 
                        @if ($errors->has('name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <span>Số điện thoại<label>*</label></span>
                        <input type="number" name="phone" value="{{ old('phone') }}" required> 
                        @if ($errors->has('phone'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <span>Trường<label>*</label></span>
                        <select name="id_school">
                            @foreach ($schools as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>                                  
                            @endforeach
                        </select> 
                        @if ($errors->has('id_school'))
                            <span class="help-block">
                                <strong>{{ $errors->first('id_school') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="clear"> </div>
                        <a class="news-letter" href="#">
                            <label class="checkbox"><input type="checkbox" name="rule"><i> </i>Tôi đã đọc và chấp nhận nội quy</label>
                        </a>
                        <br/>
                        @if ($errors->has('rule'))
                            <span class="help-block">
                                <strong>{{ $errors->first('rule') }}</strong>
                            </span>
                        @endif
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
                <div class="register-bottom-grid">
                    <h3>Thông tin đăng nhập</h3>
                    <div>
                        <span>Địa chỉ email<label>*</label></span>
                        <input type="text" name="email" value="{{ old('email') }}" required> 
                        @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <span>Password<label>*</label></span>
                        <input type="password" name="password" required>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div>
                        <span>Xác nhận Password<label>*</label></span>
                        <input type="password" name="password_confirmation" required>
                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password_confirmation') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="clear"> </div>
                </div>
                <div class="clear"> </div>
                <input type="submit" value="Đăng ký">
            </form>
        </div>
    </div>
</div>
@endsection