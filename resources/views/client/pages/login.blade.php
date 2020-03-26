@extends('client.layouts.master')
@section("title","Đăng nhập")
@section("url","dang-nhap")
@section("image","client/images/food.jpg")
@section("meta_description","Cộng đồng bán hàng của sinh viên")
@section("meta_keyword","Cộng đồng sinh viên")
@section('content')
<div class="main">
    <div class="shop_top">
        <div class="container">
            @if(session()->has('status'))
                <div class="alert alert-success">
                    {{ session()->get('status') }}
                </div>
            @endif
            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session()->get('error') }}
                </div>
            @endif
            <div class="col-md-6">
                <div class="login-page">
                    <h4 class="title">Thành viên mới ?</h4>
                    <p>Đăng ký, và đọc quy định cần biết để trở thành thanh viên của chợ sinh viên bạn nhé</p>
                    <a href="">Quy định</a>
                    <div class="button1">
                        <a href="{{route('register')}}"><input type="submit" name="Submit" value="Tạo tài khoản"></a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="login-title">
                    <h4 class="title">Đăng nhập</h4>
                    <div id="loginbox" class="loginbox">
                        <form method="POST" action="{{ route('login') }}" name="login" id="login-form">
                            {{ csrf_field() }}
                            <fieldset class="input">
                                <p id="login-form-username">
                                    <label for="modlgn_username">E-mail</label>
                                    <input id="modlgn_username" type="email" name="email" class="inputbox" size="18" autocomplete="off">
                                </p>
                                <p id="login-form-password">
                                    <label for="modlgn_passwd">Password</label>
                                    <input id="modlgn_passwd" type="password" name="password" class="inputbox" size="18" autocomplete="off">
                                </p>
                                <div class="remember">
                                    <label class="checkbox"><input type="checkbox" name="remember"><i> </i>Ghi nhớ đăng nhập</label>
                                    <input type="submit" name="Submit" class="button" value="Đăng nhập"><div class="clear"></div>
                                </div>
                            </fieldset>
                        </form>
                        <p id="login-form-remember">
                            <label for="modlgn_remember"><a href="{{route('password.reset')}}">Bạn quên mật khẩu ? </a></label>
                        </p>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</div>
@endsection