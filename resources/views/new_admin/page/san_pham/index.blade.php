@extends('new_admin.master')
@section('title')
    Quản lý sản phẩm
@endsection
@section('content')
    <div class="row">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Mã Sản Phẩm</label>
                            <input tabindex="1" class="form-control" id="ma_san_pham" name="ma_san_pham" type="text"
                                placeholder="Nhập vào mã sản phẩm">
                            <small class="text-danger" id="message_ma_san_pham"><i></i></small>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input tabindex="2" class="form-control" id="ten_san_pham" name="ten_san_pham" type="text"
                                placeholder="Nhập vào tên sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Slug Sản Phẩm</label>
                            <input class="form-control" id="slug_san_pham" name="slug_san_pham" type="text"
                                placeholder="Nhập vào slug sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Hiển Thị</label>
                            <select name="is_open" id="is_open" class="form-control">
                                <option value=1>Hiển Thị</option>
                                <option value=0>Tạm Tắt</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Giá Bán</label>
                            <input tabindex="3" class="form-control" id="don_gia_ban" name="don_gia_ban" type="number"
                                placeholder="Nhập vào giá bán sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Giá Khuyến Mãi</label>
                            <input tabindex="4" class="form-control" id="don_gia_khuyen_mai" name="don_gia_khuyen_mai"
                                type="number" placeholder="Nhập vào giá khuyến mãi sản phẩm">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Hình Ảnh</label>
                            <div class="input-group">
                                <span class="input-group-btn">
                                    <a data-input="thumbnail" data-preview="holder" class="btn btn-primary lfm">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                                <input id="thumbnail" class="form-control" type="text" name="filepath">
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:100px;"> </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="mb-3">
                            <label class="form-label">Danh Mục</label>
                            <select tabindex="6" name="danh_muc_id" id="danh_muc_id" class="form-control">
                                <option value=0>Hiển Thị</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <textarea tabindex="7" class="form-control" id="mo_ta_ngan" name="mo_ta_ngan" cols="30" rows="10"
                            placeholder="Nhập vào mô tả ngắn sản phẩm"></textarea>
                    </div>
                    <div class="col-md-12 mt-3">
                        <textarea tabindex="8" class="form-control" id="mo_ta_chi_tiet" name="mo_ta_chi_tiet" cols="30" rows="10"
                            placeholder="Nhập vào mô tả chi tiết sản phẩm"></textarea>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button id="createSanPham" class="btn btn-primary" type="button" disabled>Thêm Mới Sản Phẩm</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        {{-- Danh Sách Sản Phẩm --}}
        <div class="card">
            <div class="card-header">
                <h5>Danh Sách Sản Phẩm</h5>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="danhSachDanhMuc">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">#</th>
                            <th scope="col">Mã Sản Phẩm</th>
                            <th scope="col">Tên Sản Phẩm</th>
                            <th scope="col">Danh Mục</th>
                            <th scope="col">Giá Bán</th>
                            <th scope="col">Giá Khuyến Mãi</th>
                            <th scope="col">Hình Ảnh</th>
                            <th scope="col">Tình Trạng</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $('.lfm').filemanager('image', {
            prefix: '/laravel-filemanager'
        });
        var options = {
            filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
            filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
            filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        $(document).ready(function() {
            CKEDITOR.replace('mo_ta_chi_tiet');
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            function converToSlug(str) {
                str = str.toLowerCase();

                str = str
                    .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                    .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp

                // Thay ký tự đĐ
                str = str.replace(/[đĐ]/g, 'd');

                // Xóa ký tự đặc biệt
                str = str.replace(/([^0-9a-z-\s])/g, '');

                // Xóa khoảng trắng thay bằng ký tự -
                str = str.replace(/(\s+)/g, '-');

                // Xóa ký tự - liên tiếp
                str = str.replace(/-+/g, '-');

                // xóa phần dư - ở đầu & cuối
                str = str.replace(/^-+|-+$/g, '');

                // return
                return str;
            };
            $("#ten_san_pham").keyup(function() {
                var ten_san_pham = $("#ten_san_pham").val();
                var slug = converToSlug(ten_san_pham);
                $("#slug_san_pham").val(slug);
            });

            $("#createSanPham").click(function() {
                var payload = {
                    'ma_san_pham': $('#ma_san_pham').val(),
                    'ten_san_pham': $('#ten_san_pham').val(),
                    'slug_san_pham': $('#slug_san_pham').val(),
                    'is_open': $('#is_open').val(),
                    'don_gia_ban': $('#don_gia_ban').val(),
                    'don_gia_khuyen_mai': $('#don_gia_khuyen_mai').val(),
                    'danh_muc_id': $('#danh_muc_id').val(),
                    'hinh_anh': $('#hinh_anh').val(),
                    'mo_ta_ngan': $('#mo_ta_ngan').val(),
                    'mo_ta_chi_tiet': CKEDITOR.instances['mo_ta_chi_tiet'].getData(),
                };
                console.log(payload);
                $.ajax({
                    url: '/admin/san-pham/index',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        toastr.success('Đã thêm mới sản phẩm thành công!');
                        loadTable();
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            loadDanhMuc();
            loadTable();

            function loadDanhMuc() {
                $.ajax({
                    url: '/admin/danh-muc/get-data',
                    type: 'get',
                    success: function(res) {
                        var contentDanhMuc = '';
                        $.each(res.data, function(key, value) {
                            contentDanhMuc += '<option value=' + value.id + '>' + value
                                .ten_danh_muc + '</option>'
                        });
                        $("#danh_muc_id").html(contentDanhMuc);
                    },
                });
            }

            $("#ma_san_pham").blur(function() {
                var payload = {
                    'ma_san_pham': $("#ma_san_pham").val(),
                };
                $.ajax({
                    url: '/admin/san-pham/check-product-id',
                    type: 'post',
                    data: payload,
                    success: function(res) {
                        // Nếu true nghĩa đỏ và thông báo không được
                        if (res.status) {
                            $("#message_ma_san_pham").text("Mã sản phẩm đã tồn tại!");
                            $("#ma_san_pham").removeClass("border border-primary");
                            $("#ma_san_pham").addClass("border border-danger");
                            $("#createSanPham").prop('disabled', true);
                        } else {
                            $("#message_ma_san_pham").text("Mã sản phẩm có thể tạo!");
                            $("#ma_san_pham").removeClass("border border-danger");
                            $("#ma_san_pham").addClass("border border-primary");
                            $("#createSanPham").prop('disabled', false);
                        }
                    },
                    error: function(res) {
                        var listError = res.responseJSON.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    },
                });
            });

            function loadTable() {
                $.ajax({
                    url: '/admin/san-pham/data',
                    type: 'get',
                    success: function(res) {
                        var listSanPham = res.listSanPham; // 1 array
                        var contentTable = '';
                        $.each(listSanPham, function(key, value) {
                            contentTable += '<tr class="align-middle">';
                            contentTable += '<th class="text-center">' + (key + 1) + '</th>';
                            contentTable += '<td class="text-nowrap">' + value.ma_san_pham +
                                '</td>';
                            contentTable += '<td class="text-nowrap">' + value.ten_san_pham +
                                '</td>';
                            contentTable += '<td class="text-nowrap">' + value.ten_danh_muc +
                                '</td>';
                            contentTable += '<td class="text-nowrap">' + value.don_gia_ban +
                                '</td>';
                            contentTable += '<td class="text-nowrap">' + value
                                .don_gia_khuyen_mai + '</td>';
                            contentTable += '<td class="text-nowrap">';
                            contentTable +=
                                '<img class="img-thumbnail" style="width: 200px" src="' + value
                                .hinh_anh + '">';
                            contentTable += '</td>';
                            contentTable += '<td class="text-nowrap text-center">';
                            if (value.is_open == 1) {
                                contentTable +=
                                    '<button class="btn btn-primary">Hiển Thị</button>';
                            } else {
                                contentTable +=
                                    '<button class="btn btn-danger">Tạm Tắt</button>';
                            }
                            contentTable += '</td>';
                            contentTable += '<td class="text-nowrap text-center">';
                            contentTable += '<button class="btn btn-info ml-2">Edit</button>';
                            contentTable += '<button class="btn btn-danger">Delete</button>';
                            contentTable += '</td>';
                            contentTable += '</tr>';
                        });
                        $("#danhSachDanhMuc tbody").html(contentTable);
                    },
                });
            }
        });
    </script>
@endsection
