@extends('admin.index')
@section('title')
    Quản lý tài khoản
@endsection
@push('styles')
    <!-- third party css -->
    <link href=" {{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('admin/assets/libs/datatables/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('admin/assets/libs/datatables/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href=" {{ asset('admin/assets/libs/datatables/select.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <!-- third party css end -->
@endpush
@push('scripts')
        <!-- third party js -->
        <script src=" {{ asset('admin/assets/libs/datatables/jquery.dataTables.min.js') }}"></script>
        <script src=" {{ asset('admin/assets/libs/datatables/dataTables.bootstrap4.js') }}"></script>
        <script src=" {{ asset('admin/assets/libs/datatables/dataTables.responsive.min.js') }}"></script>
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
            
        </script>
@endpush
@section('content')
<div class="content">
    <!-- Start Content-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <table id="datatable" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID người dùng</th>
                                <th>Họ và tên</th>
                                <th>Email</th>
                                <th>Số điện thoại</th>
                                <th>Địa chỉ</th>
                                <th>Role</th>
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