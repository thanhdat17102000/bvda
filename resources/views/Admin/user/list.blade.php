@extends('admin.index')
@section('content')
    {{-- <div class="row">
    @foreach ($thanhvien as $d)
        <div class="card ml-3 overflow-hidden" style="width: 15rem;">
            <img src="{{asset('uploads/avatar')}}/{{$d->m_avatar}}" height="175" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$d->name}}</h5>
                Email: <p class="card-text">{{$d->email}}</p>
                @if( $d->role ==1)
                    <p class="card-text">Quản trị viên</p>
                @else
                    <p class="card-text">Khách hàng</p>
                @endif
                Số điện thoại<p class="card-text">{{$d->phone}}</p>
                <p class="card-text">{{$d->address}}</p>
                <a href="#" class="btn btn-primary">Sửa</a>
            </div>
        </div>
    @endforeach
    </div>   --}}
        <!-- Editable table -->
    <div class="card">
        <h3 class="card-header text-center font-weight-bold text-uppercase py-4">
        Danh sách tài khoản
        </h3>
        <div class="card-body">
        <div id="table" class="table-editable">
            <span class="table-add float-right mb-3 mr-2"
            ><a href="#!" class="text-success"
                ><i class="fas fa-plus fa-2x" aria-hidden="true"></i></a
            ></span>
            <table class="table table-bordered table-responsive-md table-striped text-center">
            <thead>
                <tr>
                <th class="text-center">STT</th>
                {{-- <th class="text-center">Ảnh</th> --}}
                <th class="text-center">Tên</th>
                <th class="text-center">Email</th>
                <th class="text-center">Số điện thoại</th>
                <th class="text-center">Địa chỉ</th>
                <th class="text-center">Role</th>
                <th class="text-center">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($thanhvien as $d)
                <tr>
                    <td class="pt-3-half" contenteditable="true">{{$d->id}}</td>
                    {{-- <td class="pt-3-half" contenteditable="true">{{$d->m_avatar}}</td> --}}
                    <td class="pt-3-half" contenteditable="true">{{$d->name}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$d->email}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$d->phone}}</td>
                    <td class="pt-3-half" contenteditable="true">{{$d->m_address}}</td>
                    <td>
                        <span class="table-remove"
                        ><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                            Sửa
                        </button></span
                        >
                    </td>
                    <td>
                        <span class="table-remove"
                        ><button type="button" class="btn btn-danger btn-rounded btn-sm my-0">
                            Xóa
                        </button></span
                        >
                    </td>
                </tr>
                @endforeach
                <!-- This is our clonable table line -->
            </tbody>
            </table>
        </div>
        </div>
    </div>
    <!-- Editable table -->
@endsection