@extends('new_client.master')
@section('content')
<div id="app">
    <section>
        <div class="header-inner two">
            <div class="inner text-center">
                <h4 class="title text-white uppercase roboto-slab">Chi Tiết Giỏ Hàng</h4>
                <h5 class="text-white uppercase">Chi Tiết Các Mặt Hàng Của Bạn</h5>
            </div>
            <div class="overlay bg-opacity-5"></div>
            {{-- <img src="http://placehold.it/1920x800" alt="" class="img-responsive" /> --}}
        </div>
    </section>
    <!-- end header inner -->
    <div class="clearfix"></div>
    <section>
        <div class="pagenation-holder">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Chi Tiết Giỏ Hàng</h3>
                    </div>
                    <div class="col-md-6 text-right">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Tên Sản Phẩm</th>
                            <th class="text-center">Hình Ảnh</th>
                            <th class="text-center">Số Lượng</th>
                            <th class="text-center">Đơn Giá</th>
                            <th class="text-center">Thành Tiền</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    {{-- <tbody>
                        @foreach ($data as $key => $value)
                        @php
                            $donGia = $value->don_gia_khuyen_mai == 0 ? $value->don_gia_ban : $value->don_gia_khuyen_mai;
                        @endphp
                        <tr>
                            <th class="text-center align-middle">{{ $key + 1 }}</th>
                            <td class="align-middle">
                                {{ $value->ten_san_pham }}
                            </td>
                            <td class="text-center align-middle">
                                <img src="{{ $value->hinh_anh }}" class="img-thumbnail" style="max-width: 200px">
                            </td>
                            <td>
                                <input type="number" class="form-control" value="{{ $value->so_luong_mua }}">
                            </td>
                            <td class="align-middle">
                                {{ $donGia  }}
                            </td>
                            <td class="align-middle">
                                {{ $donGia * $value->so_luong_mua }}
                            </td>
                            <td class="text-center align-middle">
                                <button class="btn btn-sm btn-danger">Remove</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                    <tbody>
                        <tr v-for="(value, key) in listCart">
                            <td class="text-center">
                                @{{ (key + 1) }}
                            </td>
                            <td class="align-middle">
                                @{{ value.ten_san_pham }}
                            </td>
                            <td class="text-center align-middle">
                                <img v-bind:src="value.hinh_anh" class="img-thumbnail" style="max-width: 200px">
                            </td>
                            <td>
                                <input v-on:change="update(value)" v-model="value.so_luong_mua" type="number" class="form-control">
                            </td>
                            <td class="align-middle">
                                @{{ donGia(value.don_gia_ban, value.don_gia_khuyen_mai) }}
                            </td>
                            <td class="align-middle">
                                @{{ thanhTien(value) }}
                            </td>
                            <td class="text-center align-middle">
                                <button class="btn btn-sm btn-danger" v-on:click="remove(value.id)">Remove</button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <td colspan="4">
                                <b>Tổng Tiền Hóa Đơn</b>
                            </td>
                            <td colspan="3">
                                @{{ totalRequest() }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row" style="margin: 20px 0 20px 0">
                <div class="col-md-3">
                    <input type="text" class="form-control" v-model="ship_fullname" placeholder="Nhập vào tên người nhận">
                </div>
                <div class="col-md-3">
                    <input type="text" class="form-control" v-model="ship_phone" placeholder="Nhập vào số điện thoại người nhận">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" v-model="ship_address" placeholder="Nhập vào địa chỉ nhận hàng">
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary" v-on:click="createBill">ĐẶT HÀNG</button>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    new Vue({
        el      :   '#app',
        data    :   {
            listCart        :   [],
            ship_phone      :   '',
            ship_fullname   :   '',
            ship_address    :   '',
        },
        created()   {
            this.getData();
        },
        methods :   {
            remove(id) {
                axios
                    .get('/client/cart/remove/' + id)
                    .then((res) => {
                        toastr.success("Đã xóa sản phẩm khỏi giỏ hàng");
                        this.getData();
                    });
            },
            getData() {
                axios
                    .get('/client/cart/data')
                    .then((res) => {
                        this.listCart = res.data.chiTiet;
                    });
            },
            donGia(x, y) {
                if(x == 0) {
                    return y;
                } else {
                    return x;
                }
            },
            thanhTien(v) {
                return this.donGia(v.don_gia_ban, v.don_gia_khuyen_mai) * v.so_luong_mua;
            },
            totalRequest() {
                return this.listCart.reduce((acc, item) => acc + this.thanhTien(item), 0);
            },
            update(x) {
                axios
                    .post('/client/cart/update', x)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success(res.data.message);
                            this.getData();
                        } else {
                            toastr.warning(res.data.message);
                            this.getData();
                        }
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                        x.so_luong_mua = 1;
                    });
            },
            createBill() {
                var payload = {
                    ship_phone      :   this.ship_phone,
                    ship_fullname   :   this.ship_fullname,
                    ship_address    :   this.ship_address,
                };
                axios
                    .post('/client/bill/create', payload)
                    .then((res) => {
                        toastr.success('Đã tạo đơn hàng thành công!');
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });

            },

        },
    });
</script>
@endsection
