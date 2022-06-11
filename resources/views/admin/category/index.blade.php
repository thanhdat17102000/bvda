@extends('admin.index')

@section('content')
<div class="content ">
    <button type="button" class="btn btn-info btn-xs" id="sa-params">Xóa</button>
    <a href="{{route('category-add-admin')}}"><button class="btn btn-primary waves-effect waves-light">Thêm danh mục</button></a>
    @if(Session::has('alert_success'))
        <div class="alert alert-success" style="margin-top: 10px;">
            {!! Session::get('alert_success') !!}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    <ul class="list-group list-group-flush mt-3 h4" id="admin-category-list-content"></ul>
</div>
@endsection
