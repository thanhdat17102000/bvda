@extends('admin.index')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card-box">
                <form action="{{route('store.slider')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên slider</label>
                            <input type="text" class="form-control" value="" name="name" placeholder="Nhập tên slider">
                        </div>
                       
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="description" class="form-control" rows=" 4"></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image_path" ">
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Thêm</button>
                    </form>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection