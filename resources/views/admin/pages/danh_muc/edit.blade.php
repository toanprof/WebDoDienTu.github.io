@extends('admin.share.master')
@section('title')
<h1>Cập Nhật Danh Mục Sản Phẩm</h1>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-5">
            <div class="card" style="height: 861.984px;" data-height="">
                <div class="card-header">
                    <h4 class="card-title" id="basic-layout-tooltip">Cập Nhật Danh Mục</h4>
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
                        <div class="card-text">
                            <p>This form shows tooltips on hover to provide useful information while user is filling the form. Use data attributes like toggle <code>data-toggle</code>, trigger <code>data-trigger</code>, placement <code>data-placement</code>, title <code>data-title</code> to show tooltips on form controls.</p>
                        </div>
                        <form class="form" action="/admin/danh-muc/update" method="post">
                            @csrf
                            <input type="text" name="id" value="{{ $id }}" hidden>
                            <div class="form-body">
                                <div class="form-group">
                                    <label>Mã Danh Mục</label>
                                    <input value="{{ $danh_muc->ma_danh_muc }}" name="ma_danh_muc" type="text" class="form-control" placeholder="Nhập vào mã danh mục">
                                </div>

                                <div class="form-group">
                                    <label>Tên Danh Mục</label>
                                    <input value="{{ $danh_muc->ten_danh_muc }}" name="ten_danh_muc" type="text" class="form-control" placeholder="Nhập vào tên danh mục">
                                </div>

                                <div class="form-group">
                                    <label>Chọn tình trạng</label>
                                    <select name="is_open" class="form-control">
                                        <option value=1 {{ $danh_muc->is_open == 1 ? 'selected' : '' }}>Hiển Thị</option>
                                        <option value=0 {{ $danh_muc->is_open == 0 ? 'selected' : '' }}>Tạm Tắt</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Danh Mục Cha</label>
                                    <select name="id_danh_muc_cha" class="form-control">
                                        <option value=0 {{ $danh_muc->id_danh_muc_cha == 0 ? 'selected' : '' }}>Root</option>
                                        @foreach ($danh_muc_cha as $key => $value)
                                        <option value={{ $value->id }} {{ $danh_muc->id_danh_muc_cha == $value->id ? 'selected' : '' }}>{{ $value->ten_danh_muc }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-actions">
                                <button type="reset" class="btn btn-warning mr-1">
                                    <i class="feather icon-x"></i> Cancel
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-check-square-o"></i> Cập Nhật
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
