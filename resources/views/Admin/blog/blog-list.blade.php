@extends('admin.index')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <button type="button" class="btn btn-primary">Thêm bài viết</button>
            </div>
    <!-- /.card-header -->
            <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Tiêu Đề</th>
                    <th>Tóm tắt</th>
                    <th>Ẩn hiện</th>
                    <th>Ngày đăng</th>
                    <th>Thao tác</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>111</td>
                    <td>Nguyetvo@gmail.com</td>
                    <td>Võ Thị Ánh Nguyệt</td>
                    <td>0978261116</td>
                    <td>
                        <select name="cars" id="cars">
                            <option value="volvo">Admin</option>
                            <option value="saab">Khách hàng</option>
                            <option value="opel">Nhân viên</option>
                            <option value="audi">Quản trị</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning">Xóa</button>
                    </td>
                </tr>
                <tr>
                    <td>111</td>
                    <td>Nguyetvo@gmail.com</td>
                    <td>Võ Thị Ánh Nguyệt</td>
                    <td>0978261116</td>
                    <td>
                        <select name="cars" id="cars">
                            <option value="volvo">Admin</option>
                            <option value="saab">Khách hàng</option>
                            <option value="opel">Nhân viên</option>
                            <option value="audi">Quản trị</option>
                        </select>
                    </td>
                    <td>
                        <button type="button" class="btn btn-warning">Xóa</button>
                    </td>
                </tr>
                </tfoot>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>

<!-- jQuery -->
<script src="{{asset('admin/assets/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- DataTables  & Plugins -->
<script src="{{asset('admin/assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('admin/assets/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('admin/assets/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('admin/assets/dist/js/demo.js')}}"></script>
<!-- Page specific script -->
<script>
    $(function () {
        $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        });
    });
    </script>
@endsection
