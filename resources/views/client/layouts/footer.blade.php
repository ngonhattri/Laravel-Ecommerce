<div class="container">
    <div class="row">
        <div class="col-md-4">
            <ul class="footer_box">
                <h4>Trang</h4>
                @foreach ($pages as $item)
                    <li>
                        <a href="{{route('page',$item->alias)}}">
                            {{$item->name}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="footer_box">
                <h4>Danh mục</h4>
                <li><a href="{{route('login')}}">Tôi bán</a></li>
                <li><a href="{{route('rule')}}">Điều lệ</a></li>
            </ul>
        </div>
        <div class="col-md-4">
            <ul class="footer_box">
                <h4>Liên hệ</h4>
                @if($contact != null)
                <li style="color: white">Địa chỉ: {{$contact->address}}</li>
                <li style="color: white">Email: {{$contact->email}}</li>
                <li style="color: white">Điện thoại: {{$contact->phone}}</li>
                @endif
            </ul>
        </div>
    </div>
    <div class="row footer_bottom">
    </div>
</div>