@extends('admin.share.master')
@section('title')
<h1>Quản Lý Sản Phẩm</h1>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-tooltip">Thêm Mới Sản Phẩm</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-minus"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show" style="">
                <div class="card-body">
                    <form action="/admin/san-pham/create" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Mã Sản Phẩm</label>
                                        <input name="ma_san_pham" type="text" class="form-control" placeholder="Nhập vào mã sản phẩm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tên Sản Phẩm</label>
                                        <input name="ten_san_pham" type="text" class="form-control" placeholder="Nhập vào tên sản phẩm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Slug Sản Phẩm</label>
                                        <input name="slug_san_pham" type="text" class="form-control" placeholder="Nhập vào slug sản phẩm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá Bán</label>
                                        <input name="gia_ban" type="number" class="form-control" placeholder="Nhập vào giá bán">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Giá khuyến mãi</label>
                                        <input name="gia_khuyen_mai" type="number" class="form-control" placeholder="Nhập vào giá khuyến mãi">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Ảnh đại diện</label>
                                        <input name="hinh_anh" type="file" class="form-control" placeholder="Nhập vào mã danh mục">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Hiển Thị</label>
                                        <select class="form-control" name="is_open">
                                            <option value=1>Hiển Thị</option>
                                            <option value=0>Tạm tắt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Tình Trạng</label>
                                        <select class="form-control" name="is_sell">
                                            <option value=1>Còn kinh doanh</option>
                                            <option value=0>Tạm dừng kinh doanh</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Danh Mục Sản Phẩm</label>
                                        <select class="form-control" name="id_danh_muc">
                                            @foreach ($danhMuc as $key => $value)
                                            <option value={{ $value->id }}> {{ $value->ten_danh_muc }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả Ngắn</label>
                                        <textarea name="mo_ta_ngan" id="" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Mô Tả Chi Tiết</label>
                                        <textarea name="mo_ta_chi_tiet" id="mo_ta_chi_tiet" cols="30" rows="10" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="reset" class="btn btn-warning mr-1">
                                <i class="feather icon-x"></i> Cancel
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa fa-check-square-o"></i> Thêm Mới
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.18.0/ckeditor.js"></script>
<script>
    CKEDITOR.replace('mo_ta_chi_tiet');
</script>
@endsection
