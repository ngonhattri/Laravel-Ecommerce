<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="header-left">
                <div class="logo">
                    <a href="/"><h3>Linh kiện máy tính</h3></a>
                </div>
                <div class="menu">
                    <a class="toggleMenu" href="#"><img src="client/images/nav.png" alt="" /></a>
                        <ul class="nav" id="nav">
                            <li><a href="{{route('rule')}}">Điều lệ</a></li>
                            @if(Auth::guard('web')->check())
                            <li><a href="{{route('user-dashboard')}}">{{Auth::guard('web')->user()['name']}}</a></li>
                            @else
                            <li><a href="{{route('login')}}">Tôi bán</a></li>
                            @endif
                            <div class="clear"></div>
                        </ul>
                </div>							
                <div class="clear"></div>
            </div>
            @if(Auth::guard('web')->check())
            <div class="header_right">
                <a href="{{route('user-logout')}}">Đăng xuất</a>
                <div class="clear"></div>
            </div>
            @endif
        </div>
    </div>
</div>