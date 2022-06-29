@extends('admin.index')
@push('styles')
    <!-- third party css -->

    {{-- <link href=" {{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" /> --}}
    {{-- <link href=" {{ asset('admin/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" /> --}}
    <link href=" {{ asset('admin/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('admin/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush
@push('scripts')
    <!-- third party js -->
    <script src=" {{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
    {{-- <script src=" {{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script> --}}
    {{-- <script src=" {{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script> --}}
    <script src=" {{ asset('admin/assets/libs/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/dataTables.buttons.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/buttons.html5.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/buttons.flash.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/buttons.print.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/dataTables.keyTable.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/datatables/dataTables.select.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/pdfmake/pdfmake.min.js') }}"></script>
    <script src=" {{ asset('admin/assets/libs/pdfmake/vfs_fonts.js') }}"></script>
    <!-- third party js ends -->
    <!-- Datatables init -->
    <script src=" {{ asset('admin/assets/js/pages/datatables.init.js') }}"></script>
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
        const renderData = () => {
            $.ajax({
                url: '{{ url('api/post') }}',
                type: "get",
                data: "",
                dataType: "json",
                success: function(response) {
                    let tbody = ``;
                    response.map((item, index) => {
                        tbody += `
                                <tr>
                                    <td>${item.m_title}</td>
                                    <td>
                                        <img src="{{ asset('uploads/post/${item.m_image}') }}" width="150px" alt="Image post">
                                    </td>
                                    <td>${item.m_slug}</td>
                                    <td>${item.m_content}</td>
                                    <td>${item.m_meta_keyword}</td>
                                    <td>${item.m_staus == 0 ? 'Ẩn' : 'Hiện'}</td>
                                    <td>
                                        <button type="button" data-id="${item.id}" class="btn-edit btn btn-icon waves-effect waves-light btn-success"><i class="far fa-edit"></i></button>
                                        <button type="button" data-id="${item.id}" class="btn-delete btn btn-icon waves-effect waves-light btn-danger mt-2"><i class="fas fa-trash-alt"></i></button>
                                    </td>
                                </tr>`
                    })
                    $('tbody:first').html(tbody);
                    $('.btn-delete').click(function(e) {
                        let id = $(this).data('id');
                        $.ajax({
                            type: "delete",
                            url: `{{ url('api/post/${id}') }}`,
                            processData: false,
                            contentType: false,
                            success: function(response) {
                                renderData();
                                toastr.success('Xóa thành công!',
                                    'Xem danh sách để kiểm tra')
                            },
                            error: function(e) {
                                toastr.error('Lỗi xóa!', 'Dữ liệu không tồn tại');
                            }
                        });
                    });
                    $('.btn-edit').click(function (e) { 
                        let id = $(this).data('id');
                        $(location).attr('href',`{{ url('admintrator/post/edit/${id}') }}`)
                    });
                },
                error: function(e) {
                    toastr.error('Lỗi tải trang!', 'Dữ liệu không tồn tại');
                }
            });
        }
        renderData();
    </script>
@endpush
@section('content')
    <div class="content">
        <!-- Start Content-->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card-box">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Tiêu đề</th>
                                    <th>Hình ảnh</th>
                                    <th>Slug</th>
                                    <th>Nội dung</th>
                                    <th>Từ khóa</th>
                                    <th>Hiển thị</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>

                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end row -->

        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection
