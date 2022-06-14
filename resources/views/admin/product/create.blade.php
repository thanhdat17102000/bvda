@extends('admin.index')
@section('content')
@if(Session::has('alert_success'))
    <div class="alert alert-success" style="margin-top: 10px;">
        {!! Session::get('alert_success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
    </div>
@endif
<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">Thêm sản phẩm</h3>
    </div>
    <form action="{{route('product.store')}}" class="form-horizontal" method="post" role="form" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                <div class="col-sm-10" style="">
                <input type="text" class="form-control" name="m_product_name" placeholder="Nhập tên sản phẩm">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Chọn Danh mục</label>
                <div class="col-sm-10" style="">
                    <select class="form-control" id="id_category" name="m_id_category">
                        @foreach($showcategory as $key => $show)
                            <option value="{{$show->id}}" {{($show->m_id_parent == 0) ? 'style=font-weight:bold':''}}>{{$show->m_title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Giá gốc</label>
                <div class="col-sm-10" style="">
                    <input type="text" class="form-control" name="m_price" placeholder="Nhập giá sản phẩm">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Giá ưu đãi</label>
                <div class="col-sm-10" style="">
                    <input type="text" class="form-control" name="m_original_price" placeholder="Nhập giá ưu đãi sản phẩm">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Số lượng tồn kho</label>
                <div class="col-sm-10" style="">
                    <input type="text" class="form-control" name="m_buy" placeholder="Nhập số lượng tồn kho">
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Hình ảnh sản phẩm</label>
                <div class="col-sm-10" style="">
                    <input type="file" name="file_upload[]" class="form-control" placeholder="Nhập hình ảnh sản phẩm" multiple>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Mô tả ngắn</label>
                <div class="col-sm-10">
                    <textarea class="ckeditor form-control" name="m_short_description" placeholder="Nhập mô tả ngắn sản phẩm"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Mô tả sản phẩm</label>
                <div class="col-sm-10">
                <textarea class="ckeditor form-control" name="m_description" placeholder="Nhập mô tả sản phẩm"></textarea>
                
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Ẩn / Hiện</label>
                <div class="col-sm-10" style="">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="m_status" value="2">
                        <label class="form-check-label" for="flexRadioDefault1">
                            Ẩn 
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="m_status" value="1">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Hiện
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-right mb-0">
            <button type="submit" class="btn btn-info">Submit</button>
            <button type="reset" class="btn btn-secondary waves-effect waves-light">Clear</button>
        </div>
    </form>
</div>
@endsection
@push('scripts')
<script src="http://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('noidung');
</script>
<script type="text/javascript">
    CKEDITOR.replace('motangan');
</script>
@endpush
