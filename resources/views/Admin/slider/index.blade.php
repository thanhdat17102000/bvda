@extends('admin.index')
@section('content')
<div class="content">
    <a href="{{ route ('add.slider') }}" class="btn btn-primary " style="margin-left: 12px;
    margin-bottom: 12px; color: white;">Thêm slider</a>
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tiêu đề</th>
                                <th>Mô tả</th>
                                <th>Hình ảnh</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $i = 1;
                            @endphp
                            @foreach($sliders as $slider)
                            <tr>
                                <td>@php
                                    echo $i;
                                    $i++;
                                @endphp</td>
                                <td>{{$slider->m_name}}</td>
                                <td>{{$slider->m_description}}</td>
                                <td><img src="{{ asset($slider->m_image_path) }}" alt="" style="width: 150px; height: 100px;"></td>
                                <td>
                                    <a href="{{route('edit.slider', $slider->id)}}">Sửa</a>
                                    |
                                    <a href="{{route('delete.slider', $slider->id)}}" data-url="">Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div> <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection