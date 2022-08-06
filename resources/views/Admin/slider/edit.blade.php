@extends('admin.index')
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <div class="card-box">
                <form action="{{ route('update.slider', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Tên slider</label>
                            <input type="text" class="form-control"  value="{{ $slider->m_name }}" name="name" placeholder="Nhập tên slider">
                        </div>
                       
                        <div class="form-group">
                            <label for="">Mô tả</label>
                            <textarea name="description" class="form-control" rows=" 4">{{$slider->m_description}}</textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="">Hình ảnh</label>
                            <input type="file" class="form-control-file" name="image_path" ">
                            <div class="col-md-4">
                                <div class="row">
                                    <img src="{{ asset($slider->m_image_path)}}" class="image_slider" alt="" style="width: 250px; height: 100px">
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection