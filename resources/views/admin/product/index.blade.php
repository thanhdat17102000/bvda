@extends('Admin.index')
@section('content')
<link href="{{asset('admin/assets/libs/tablesaw/tablesaw.css')}}" rel="stylesheet" type="text/css">
<style>
        .phongnen{
            width: 150px;
            height: 200px;
            border: 1px solid rgb(247, 247, 247);
            border-radius: 15px;
            box-shadow: rgba(247, 247, 247, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;
        }
        .phongnen img{
            padding: 5px 5px 5px 5px;
            width: 148.5px;
            height: 198px;
            border-radius: 15px;
            box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        }
        .phongheader{
            border: 1px solid #000;
        }
        .list-group li{
            font-weight: bold;
        }
        .list-group li:nth-child(2n-1){
            background-color: rgb(243, 241, 241);
        }
        .suaxoa a{
            margin-left: 5px;
        }
        .overchapter{
            height: 300px;
            overflow-y: auto;
        }
        .textdes{
            overflow-y: auto;
            height: 200px;
            background-color: rgb(237 237 237);
            padding: 7px;
            border-radius: 5px;
            text-align: justify;
            box-shadow: rgba(67, 71, 85, 0.27) 0px 0px 0.25em, rgba(90, 125, 188, 0.05) 0px 0.25em 1em;
        }
        .textdes::-webkit-scrollbar {
            width: 6px;
            background-color: #F5F5F5;
        }
        .textdes::-webkit-scrollbar-thumb {
            background-color: #cccccc;
            border-radius: 5px;
        }
        .butthemne{
            margin-top: 3px;
            position: relative;
            padding-left: 24px;
        }
        .iconthem{
            font-size: 24px;
            position: absolute;
            left: 0;
            top: 0.6px;
        }
    </style>
@if(Session::has('alert_success'))
    <div class="alert alert-success" style="margin-top: 10px;">
        {!! Session::get('alert_success') !!}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif
<div class="row">
    <div class="col-12">
    <section class="content-info">
    <div class="card-box">
    <h4 class="mt-0 header-title"><b>Danh mục sản phẩm</b></h4>
    <div class=" tablesaw-bar  tablesaw-all-cols-visible  tablesaw-mode-columntoggle">
    <table class="tablesaw table mb-0 tablesaw-columntoggle" data-tablesaw-mode="columntoggle" data-tablesaw-mode-switch="" data-tablesaw-minimap="" id="tablesaw-7261" style="">
        <thead>
        <tr>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="persist" class=" tablesaw-swipe-cellpersist" style="width: 30px;">#</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="0" class="tablesaw-priority-0 tablesaw-toggle-cellvisible">Images</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-sortable-default-col="" data-tablesaw-priority="1" class="tablesaw-priority-1">Danh mục</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="2" class="tablesaw-priority-2 tablesaw-toggle-cellvisible">Name</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="3" class=" tablesaw-priority-3">Slug</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="4" class=" tablesaw-priority-4">Giá gốc</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="5" class=" tablesaw-priority-5">Trạng thái</th>
            <th scope="col" data-tablesaw-sortable-col="" data-tablesaw-priority="6" class=" tablesaw-priority-6" style="width:306px;">Action</th>
        </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach($datas as $key => $dt)
                <tr>
                    <td class=" tablesaw-swipe-cellpersist" style="width: 30px;">{{$i++}}</td>
                    <td class="tablesaw-priority-0 tablesaw-toggle-cellvisible">
                        @if(json_decode($dt->m_picture))
                        <img src="{{asset('uploads')}}/{{json_decode($dt->m_picture)[0]}}" width="100px" height="100px" />
                        @else
                        <img src="{{asset('uploads')}}/1657125436-sanpham.p1.jpg" width="100px" height="100px" />
                        @endif
                    </td>
                    <td class="tablesaw-priority-1 tablesaw-toggle-cellvisible">{{$dt->showdanhmuc->m_title}}</td>
                    <td class="tablesaw-priority-2 tablesaw-toggle-cellvisible">{{$dt->m_product_name}}</td>
                    <td class="tablesaw-priority-3 tablesaw-toggle-cellvisible">{{$dt->m_product_slug}}</td>
                    <td class="tablesaw-priority-4 tablesaw-toggle-cellvisible">{{number_format($dt->m_price, 0, '.', '.')}} Vnđ</td>
                    <td class=" tablesaw-priority-5">
                    @if($dt->m_status == 1)
                        <h4 class="badge badge-primary" style="padding:5px 10px;font-size:15px">Hiện</h4>
                    @else
                        <h4 class="badge badge-danger" style="padding:5px 10px;font-size:15px">Ẩn</h4>
                    @endif
                    </td>
                    <td class=" tablesaw-priority-6" style="width: 306px;">
                        <button class="btn btn-warning waves-effect waves-light btn-primary" data-toggle="modal" data-target=".bs-example-modal-xl{{$dt->id}}"><i class="fa fa-eye"></i></button>
                        <a href="{{route('product.edit', $dt->id)}}" class="btn btn-primary waves-effect width-md waves-light">Sửa</a>
                        <a href="{{route('product.destroy', $dt->id)}}" class="btn btn-danger waves-effect width-md waves-light btndelete">Xóa</a>
                    </td>



                    <div class="modal fade bs-example-modal-xl{{$dt->id}}" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myExtraLargeModalLabel">Sản phẩm : {{$dt->m_product_name}}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="phongnen">
                                                @if(json_decode($dt->m_picture))
                                                <img src="{{asset('uploads')}}/{{json_decode($dt->m_picture)[0]}}" alt="">
                                                @endif
                                            </div>
                                            <div class="form-group" style="text-align:center; margin:15px 0px 0px 0px">
                                                <p><a class="btn btn-primary waves-effect waves-light mr-1 collapsed" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"> xem thêm hình </a>
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <h3><strong class="text-primary">{{$dt->m_product_name}}</strong></h3>
                                            <p>Slug: <span class="text-muted">{{$dt->m_product_slug}}</span></p>
                                            <p><strong>Danh mục: </strong><span>{{$dt->showdanhmuc->m_title}}</span></p>
                                            <p><strong>Giá gốc: </strong>
                                            @if($dt->m_original_price)
                                                <s>{{number_format($dt->m_price, 0, '.', '.')}} Vnđ</s>
                                            @else
                                                <span>{{number_format($dt->m_price, 0, '.', '.')}} Vnđ</span>
                                            @endif
                                        </p>
                                            <p><strong>Giá đã giảm: </strong><mark>{{number_format($dt->m_original_price, 0, '.', '.')}} Vnđ</mark></p>
                                            <p><strong>Ngày đăng sản phẩm: </strong><span>{{$dt->updated_at->diffForHumans()}}</span></p>
                                            <p><strong>Số lượng tồn kho: </strong><span>{{$dt->m_buy}}</span> 
                                            |
                                            <strong>lượt xem sản phẩm: </strong><span>{{$dt->m_view}}</span></p>
                                        </div>
                                        <div class="col-md-5">
                                        <p><strong>Mô tả ngắn: </strong></p>
                                            <div class="textdes">
                                                {!!$dt->m_short_description!!}
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                        <div class="collapse" id="collapseExample" style="">
                                            <div class="card-box">
                                                @if(json_decode($dt->m_picture))
                                                    @foreach(json_decode($dt->m_picture) as $picture)
                                                        <img src="{{asset('uploads')}}/{{$picture}}" alt="" width="100px" height="100px">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                        </div>
                                        <hr>
                                        <div class="col-md-12">
                                            <div class="textdes">
                                                {!!$dt->m_description!!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </diV>
                </tr>
            @endforeach
            {{ $datas -> links()}}
        </tbody>
    </table>
    </div>
    </section>
    </div>
</div>
<!-- form-delete -->
<form method="POST" action="" id="form-delete">
    @method('DELETE')
    @csrf
</form> 
@endsection
@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@endpush
@push('scripts')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>

<script src="{{asset('admin/assets/libs/tablesaw/tablesaw.js')}}"></script>
<script src="{{asset('admin/assets/js/pages/tablesaw.init.js')}}"></script>
<!-- <script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script> -->
<!-- <script type="text/javascript">

     $('.btndelete').click(function(event) {
          var form =  $(this).closest("form#form-delete");
          var name = $(this).data("name");
          event.preventDefault();
          swal({
              title: `Bạn muốn xóa chứ?`,
              text: "Bạn không thể quay lại bước này.",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              form.submit();
            }
          });
      });

</script> -->
<!-- javascript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
<!-- Semantic UI theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
<!-- Bootstrap theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
<script>
    jQuery(document).ready(function($) {
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action',_href);
            alertify.confirm('bạn muốn xóa sản phẩm này chứ ?', function(result){
                if(result){
                    $('form#form-delete').submit();
                }
            })
        });
    });
</script>
@endpush