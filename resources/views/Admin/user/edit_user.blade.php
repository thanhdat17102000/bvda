@extends('admin.index')
@section('title')
    Cập nhật thông tin
@endsection
@push('scripts')
    <!-- dropify js -->
    <script src="{{ asset('admin/assets/libs/dropify/dropify.min.js') }}"></script>
    <script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
    {{-- <script type="text/javascript">
        CKEDITOR.replace('m_desc');
        CKEDITOR.replace('m_content');
    </script> --}}
    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }

        const renderUser = () => {
            $.ajax({
                type: "get",
                url: "{{ url('api/user/' . $data['id']) }}",
                success: function(response) { 
                    console.log(response)
                    $('input[name=name]').val(response.name);
                    $('input[name=email]').val(response.email);
                    $('input[name=phone]').val(response.phone);
                    $('input[name=m_address]').val(response.address)
                    $('select[name=m_role]').val(response.m_role);
                    $('input[name=m_status]').val(response.m_status);
                    response.m_status == 0 ? $('#hidden').prop("checked", true) : '';
                    $('.dropify').attr('data-default-file',
                        `{{ asset('uploads/post/${response.m_avatar}') }}`)
                    $('.dropify').dropify({
                        messages: {
                            'default': 'Drag and drop a file here or click',
                            'replace': 'Drag and drop or click to replace',
                            'remove': 'Remove',
                            'error': 'Ooops, something wrong appended.'
                        },
                        error: {
                            'fileSize': 'The file size is too big (1M max).'
                        }
                    });
                },
                error: function(error) {
                    toastr.error('Lỗi lấy thông tin tài khoản!', 'Vui lòng kiểm tra lại thông tin')
                }
            });
        }
        renderUser();

        $('.form-horizontal:first').submit(function(e) {
            e.preventDefault();
            let data = new FormData(this);
            console.log(data)
            // data.set('m_desc', CKEDITOR.instances.m_desc.getData());
            // data.set('m_content', CKEDITOR.instances.m_content.getData());
            $.ajax({
                url: '{{ url('api/user/' . $data['id']) }}',
                type: 'post',
                data,
                processData: false,
                contentType: false,
                success: function(response) {
                    toastr.success('Sửa thành công!', 'Xem danh sách để kiểm tra'),
                        renderUser();
                },
                error: function(error) {
                    console.log(error);
                    toastr.error('Lỗi sửa bài viết!', 'Vui lòng kiểm tra lại thông tin')
                }
            });
        });
    </script>
@endpush
@push('styles')
    <!-- dropify -->
    <link href="{{ asset('admin/assets/libs/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endpush
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <div class="row">
                            <div class="col-12">
                                <div class="p-2">
                                    <form class="form-horizontal" role="form" enctype="multipart/form-data"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Họ và tên</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập họ và tên"
                                                name="name">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Email</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập email"
                                                    name="email">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Số điện thoại</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập số điện thoại"
                                                name="phone">                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Địa chỉ</label>
                                            <div class="col-md-10">
                                                <input type="text" class="form-control" placeholder="Nhập địa chỉ"
                                                name="m_address">                                            
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Role</label>
                                            <div class="col-md-10">
                                                <select class="form-select form-control" aria-label="">
                                                    <option name="m_role" value="0"  selected>Khách hàng</option>
                                                    <option name="m_role" value="1">Admin</option>
                                                    <option name="m_role" value="2">Tác giả</option>
                                                    <option name="m_role" value="3">Kế toán</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Trạng thái hiển thị</label>
                                            <div class="col-md-10 row mt-1">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="hidden" name="m_status" value="0"
                                                        class="custom-control-input">
                                                    <label class="custom-control-label" for="hidden">Đang hoạt động</label>
                                                </div>
                                                <div class="custom-control custom-radio ml-4">
                                                    <input type="radio" id="show" name="m_status" value="1"
                                                        class="custom-control-input" @checked(true)>
                                                    <label value="0" name="m_status" class="custom-control-label" for="show">Ngưng hoạt động</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-md-2 col-form-label">Hình ảnh</label>
                                            <div class="col-md-4">
                                                <div class="card-box">
                                                    <input type="file" name="m_avatar" class="dropify"
                                                        data-default-file="" />
                                                </div>
                                            </div><!-- end col -->
                                        </div>
                                        <div class="form-group text-right mb-0">
                                            <button class="btn btn-primary waves-effect waves-light mr-1" type="submit">
                                                Lưu
                                            </button>
                                            <button type="reset" class="btn btn-secondary waves-effect waves-light">
                                                Hủy
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <!-- end row -->

                    </div> <!-- end card-box -->
                </div><!-- end col -->
            </div>
            <!-- end row -->
        </div>
    </div>
@endsection