@extends('admin.share.master')
@section('title')
<h1>Quản Lý Danh Mục Sản Phẩm</h1>
@endsection

@section('content')
<div class="row">
    <div class="col-md-5">
        <div class="card" style="height: 861.984px;" data-height="">
            <div class="card-header">
                <h4 class="card-title" id="basic-layout-tooltip">Issue Tracking</h4>
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
                    <form class="form" action="/admin/danh-muc/index" method="post">
                        @csrf
                        <div class="form-body">
                            <div class="form-group">
                                <label>Mã Danh Mục</label>
                                <input name="ma_danh_muc" type="text" class="form-control" placeholder="Nhập vào mã danh mục">
                            </div>

                            <div class="form-group">
                                <label>Tên Danh Mục</label>
                                <input name="ten_danh_muc" type="text" class="form-control" placeholder="Nhập vào tên danh mục">
                            </div>

                            <div class="form-group">
                                <label>Chọn tình trạng</label>
                                <select name="is_open" class="form-control">
                                    <option value=1>Hiển Thị</option>
                                    <option value=0>Tạm Tắt</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Danh Mục Cha</label>
                                <select name="id_danh_muc_cha" class="form-control">
                                    <option value=0>Root</option>
                                    @foreach ($danh_muc_cha as $key => $value)
                                    <option value={{ $value->id }}>{{ $value->ten_danh_muc }}</option>
                                    @endforeach
                                </select>
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
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Bordered table</h4>
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
            <div class="card-content collapse show">
                <div class="card-body">
                    <p class="card-text">Add <code>.table-bordered</code> for borders on all sides of the table and cells.</p>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Mã Danh Mục</th>
                                <th class="text-center">Tên Danh Mục</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Danh Mục Cha</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $key => $value)
                            <tr>
                                <th scope="row" class="align-middle">{{ $key + 1}}</th>
                                <td class="align-middle">{{ $value->ma_danh_muc }}</td>
                                <td class="align-middle">{{ $value->ten_danh_muc }}</td>
                                <td class="align-middle">
                                    @if($value->is_open)
                                    <button class="btn btn-primary">Hiển Thị</button>
                                    @else
                                    <button class="btn btn-danger">Tạm Tắt</button>
                                    @endif
                                </td>
                                <td class="align-middle">
                                    {{ empty($value->ten_danh_muc_cha) ? 'Root' : $value->ten_danh_muc_cha }}
                                </td>
                                <td class="align-middle">
                                    <a href="/admin/danh-muc/edit/{{$value->id}}" class="btn btn-info">Edit</a>
                                    <a href="/admin/danh-muc/delete/{{$value->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
