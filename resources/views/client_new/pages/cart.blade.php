@extends('client_new.master')

@section('main_title')
    Chi Tiết Giỏ Hàng
@endsection

@section('sub_title')
    Chi Tiết Các Mặt Hàng Của Bạn
@endsection

@section('content')
<div id="app">
    <section class="pt-0">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <h2 class="pre-label font-size-base">Chi Tiết Giỏ Hàng</h2>


                    <template v-for="(value, key) in listCart">
                        <div class="bg-white shadow-sm rounded mb-3 p-3 alert alert-dismissible" role="alert">
                            <button type="button" class="close" aria-label="Close" data-toggle="tooltip" data-placement="top" v-on:click="remove(value.id)" title="Delete">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="row align-items-center no-gutters p-md-2">
                                <div class="col-lg-2">
                                    <img v-bind:src="value.hinh_anh" alt="" class="img-fluid" />
                                </div>
                                <div class="col-lg-5 pl-lg-3 mb-2 mb-lg-0">
                                    <h2 class="h5 mb-0">@{{ value.ten_san_pham }}</h2>
                                    {{-- <span>Electronics</span> --}}
                                </div>
                                <div class="col-6 col-lg-2">
                                    <input type="number" v-on:change="update(value)" v-model="value.so_luong_mua" class="form-control" />
                                </div>
                                <div class="col-6 col-lg-3 text-right">
                                    <div class="h5 mb-0">@{{ formatPrice(donGia(value.don_gia_ban, value.don_gia_khuyen_mai)) }} đ</div>
                                    <div class="text-danger"> @{{ formatPrice(thanhTien(value))}} đ</div>
                                </div>
                            </div>
                        </div>
                    </template>



                    <!-- Discount and promocode -->

                    {{-- <div class="bg-white shadow-sm rounded mb-3 p-3">
                        <div class="row align-items-center no-gutters p-md-2">

                            <div class="col-lg-7">
                                <div class="py-2">
                                    <label>Promo code:</label>
                                    <input type="text" value="" class="form-control form-control-sm w-auto" name="couponcode" id="couponcode" placeholder="Coupon code" />
                                </div>
                            </div>

                            <div class="col-lg-5">
                                <div class="row no-gutters">
                                    <div class="col-6">
                                        <b>Discount 20%</b>
                                    </div>
                                    <div class="col-6 text-right">
                                        $ 90,00
                                    </div>
                                    <div class="col-6">
                                        <b>Shipping</b>
                                    </div>
                                    <div class="col-6 text-right">
                                        $ 50,00
                                    </div>
                                    <div class="col-6">
                                        <b>Vat</b>
                                    </div>
                                    <div class="col-6 text-right">
                                        $ 49,00
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div> --}}

                    <div class="bg-white shadow-sm rounded mb-3 p-3">
                        <div class="row">
                            {{-- <div class="col-md-12"> --}}
                                <div class="col-md-4">
                                    <label>Họ và tên:</label>
                                    <input type="text" value="" class="form-control form-control-sm w-auto" v-model="ship_fullname" placeholder="Nhập vào họ và tên" />
                                </div>

                                <div class="col-md-4">
                                    <label>Số điện thoại:</label>
                                    <input type="tel" value="" class="form-control form-control-sm w-auto" v-model="ship_phone" placeholder="Nhập vào số điện thoại" />
                                </div>

                                <div class="col-md-4">
                                    <label>Địa chỉ:</label>
                                    <input type="text" value="" class="form-control form-control-sm w-auto" v-model="ship_address" placeholder="Nhập vào địa chỉ" />
                                </div>
                            {{-- </div> --}}
                        </div>
                    </div>

                    <!-- Total price -->

                    <div class="bg-white shadow-sm rounded mb-2 p-3">
                        <div class="p-md-4">
                            <div class="row no-gutters">
                                <div class="col-6">
                                    <div class="h4 mb-0">Total price</div>
                                </div>
                                <div class="col-6 text-right">
                                    <div class="h4 mb-0">@{{formatPrice(totalRequest())}} VNĐ</div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Buttons -->

                    <div class="py-3">
                        <div class="row align-items-center no-gutters">
                            <div class="col-6">
                                <a href="/home" class="btn btn-dark btn-primary btn-rounded px-lg-5">Shop more</a>
                            </div>
                            <div class="col-6 text-right">
                                <a href="#" v-on:click="createBill()" class="btn btn-primary btn-rounded px-lg-5">Đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
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
                        window.location.reload();
                    })
                    .catch((res) => {
                        var listError = res.response.data.errors;
                        $.each(listError, function(key, value) {
                            toastr.error(value[0]);
                        });
                    });

            },

            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }

        },
    });
</script>
@endsection
