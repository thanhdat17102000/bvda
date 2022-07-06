@extends('admin.index')
@section('title')
    Cập nhật thông tin
@endsection
@section('content')
<div class="card-box">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="#home1" data-toggle="tab" aria-expanded="false" class="nav-link active">
                <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                <span class="d-none d-sm-block">Đổi mật khẩu</span>            
            </a>
        </li>
        <!-- <li class="nav-item">
            <a href="#messages1" data-toggle="tab" aria-expanded="false" class="nav-link">
                <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                <span class="d-none d-sm-block">Vai trò quản trị</span>    
            </a>
        </li> -->
    </ul>

    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade show active" id="home1">
        <div role="tabpanel" class="tab-pane fade" id="profile1">
        <center> - Đổi Thông tin - </center>
        <form action="{{route('profile.update', Auth::user()->id)}}" method="post" role="form" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Họ và Tên</label>
                <input type="text" class="form-control" id="idadmin" value="{{Auth::user()->name}}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" placeholder="nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số điện thoại</label>
                <input type="number" class="form-control" id="phone" name="phone" value="{{Auth::user()->phone}}" min="0" placeholder="nhập số điện thoại">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Địa chỉ</label>
                <input type="text" class="form-control" id="address" name="m_address" value="{{Auth::user()->m_address}}" placeholder="nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Role</label>
                <input type="text" class="form-control" id="address" name="m_address" value="{{Auth::user()->m_role}}" placeholder="nhập địa chỉ">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Avatar</label>
                <input type="file" class="form-control" id="avatar" name="avatar" placeholder="Chọn hình ảnh avatar">
                @if(Auth::user()->m_avatar)
                    <img src="{{asset('uploads/avatar')}}/{{Auth::user()->m_avatar}}" alt="" width="100px" height="100px" style="margin:5px">
                @endif
            </div>
            <button type="submit" id="btnthongtin" class="btn btn-primary">Lưu Thông Tin</button>
        </form>
        </div>
        <!-- <div role="tabpanel" class="tab-pane fade" id="messages1">
            <p class="mb-0">Etsy mixtape wayfarers, ethical
                wes anderson tofu before they sold out mcsweeney's organic lomo
                retro fanny pack lo-fi farm-to-table readymade. Messenger bag
                gentrify pitchfork tattooed craft beer, iphone skateboard locavore
                carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy
                irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy
                retro mlkshk vice blog. Scenester cred you probably haven't heard of
                them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu
                synth chambray yr.</p>
        </div> -->
    </div>
</div>

@endsection