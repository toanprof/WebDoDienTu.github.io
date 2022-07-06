@extends('client_new.master')

@section('main_title')
    Đơn Hàng Của Tôi
@endsection

@section('sub_title')
    Danh sách đơn hàng của tôi
@endsection

@section('content')
<div id="app">
    <section class="pt-0">
        <div class="container">
            <div class="row">

                <!-- Menu sidebar -->

                <div class="col-lg-3">

                    <div class="br-sm pr-lg-4 mt-xl-n6">

                        <!-- Profile menu header -->

                        <div class="py-3 py-lg-4">
                            <div class="row align-items-center justify-content-center no-gutters text-lg-center">
                                <div class="col-9 col-lg-12">
                                    <div class="d-flex flex-lg-column align-items-center">
                                        <div class="pr-3 pr-lg-0">
                                            <img src="/assets_client_new/assets/images//demo/user-5.jpg" alt="" class="rounded-circle mb-lg-2 img-fluid" style="width: 50px;">
                                        </div>
                                        <div>
                                            <div class="h5 m-0">{{ Auth::guard('customer')->user()->full_name }}</div>
                                            <div class="text-muted">{{ Auth::guard('customer')->user()->email }}</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 d-lg-none text-right">
                                    <button class="btn btn-icon btn-primary btn-sm toggle-show" data-show="open-profile-sidebar">
                                        <i class="icon icon-text-align-center"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Profile sidebar -->

                        <div class="sidebar sidebar-mobile" id="open-profile-sidebar">
                            <div class="sidebar-content">

                                <div class="sidebar-header clearfix d-lg-none">
                                    <button type="button" class="close toggle-show p-3" data-show="open-profile-sidebar" aria-label="Close">
                                        <i class="icon icon-cross font-size-lg"></i>
                                    </button>
                                </div>

                                <!-- Profile account links -->

                                <div class="mb-4 px-4 p-lg-0">
                                    <ul class="list-group list-group-clean">

                                        <li class="list-group-item text-muted d-flex justify-content-between align-items-center">
                                            <label class="pre-label">Account</label>
                                        </li>

                                        <li class="list-group-item ">
                                            <a href="profile.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-user mr-2"></i>
                                                        <span>Profile account</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item ">
                                            <a href="profile-payment.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-cart mr-2"></i>
                                                        <span>Paymnet methods</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item ">
                                            <a href="profile-notifications.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-alarm mr-2"></i>
                                                        <span>Notifications</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>

                                </div>

                                <!-- Profile dashboard links -->

                                <div class="mb-4 px-4 p-lg-0">
                                    <ul class="list-group list-group-clean">

                                        <li class="list-group-item text-muted d-flex justify-content-between align-items-center">
                                            <label class="pre-label">Dashboard</label>
                                        </li>

                                        <li class="list-group-item  active">
                                            <a href="profile-orders.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-cart mr-2"></i>
                                                        <span>Orders</span>
                                                    </span>
                                                    <span class="badge  badge-primary  badge-pill">125</span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item ">
                                            <a href="profile-whishlist.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-heart mr-2"></i>
                                                        <span>Whishlist</span>
                                                    </span>
                                                    <span class="badge  badge-pill">9</span>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Profile reset -->

                                <div class="mb-4 px-4 p-lg-0">
                                    <ul class="list-group list-group-clean">

                                        <li class="list-group-item text-muted d-flex justify-content-between align-items-center">
                                            <label class="pre-label">Access</label>
                                        </li>

                                        <li class="list-group-item ">
                                            <a href="profile-reset-password.html">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-lock mr-2"></i>
                                                        <span>Reset password</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                        <li class="list-group-item">
                                            <a href="#">
                                                <div class="d-flex justify-content-between align-items-center">
                                                    <span><i class="icon icon-enter-down mr-2"></i>
                                                        <span>Sign out</span>
                                                    </span>
                                                </div>
                                            </a>
                                        </li>

                                    </ul>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Orders content -->

                <div class="col-lg-9 pt-lg-4">

                    <h2 class="pre-label font-size-base">Đơn đặt hàng của tôi</h2>

                    <div class="mb-3 mb-lg-5">
                        <div class="accordion br-sm" id="accordionOrdersExample">
                            <template v-for="(value, key) in listBill">
                                <div class="card card-fill mb-3 shadow-sm rounded">
                                    <div class="card-header bg-white py-4 p-2 p-md-4 pointer" id="heading-1" role="button" data-toggle="collapse" v-bind:data-target="'#a'+key" aria-expanded="true" v-bind:aria-controls="'a'+key">
                                        <div class="row">
                                            <div class="col-md-3 text-nowrap">
                                                <i class="icon icon-tag mr-3"></i>
                                                <span>@{{ value.bill_name }}</span>
                                            </div>
                                            <div class="col-6 col-md-3 text-nowrap">
                                                <i class="icon icon-clock mr-3"></i>
                                                <span>@{{ formatDate(value.created_at) }}</span>
                                            </div>
                                            <div class="col-6 col-md-2 text-right text-nowrap">
                                                <span>@{{ formatPrice(value.bill_total) }} VNĐ</span>
                                            </div>
                                            <div class="col-md-2 text-nowrap text-center">
                                                <small v-if="value.is_payment == 0" class="p-1 bg-light-danger rounded-sm text-white btn-block">
                                                    Chưa Thanh Toán
                                                </small>
                                                <small v-else class="p-1 bg-light-primary rounded-sm text-white btn-block">
                                                    Đã Thanh Toán
                                                </small>
                                            </div>
                                            <div class="col-md-2 text-center pt-3 pt-xl-0">
                                                <small class="p-1 bg-light-success rounded-sm text-white btn-block">
                                                    Delivered
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                    <div v-bind:id="'a'+key" class="collapse pt-0" aria-labelledby="heading-1" data-parent="#accordionOrdersExample">
                                        <hr class="m-0">
                                        <div class="card-body bg-white">
                                            <template v-if="value.id == value_sp.id_don_hang" v-for="(value_sp, key_sp) in listOrder">
                                                <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                                    <div class="row align-items-center no-gutters p-md-2">
                                                        <div class="col-lg-2">
                                                            <img v-bind:src="value_sp.hinh_anh" class="img-fluid br-sm shadow-sm" alt="Image title">
                                                        </div>
                                                        <div class="col-lg-5 pl-lg-3 py-2 py-lg-0">
                                                            <div><strong>@{{ value_sp.ten_san_pham }}</strong></div>
                                                            <small class="text-muted">@{{value_sp.ten_danh_muc}}</small>
                                                        </div>
                                                        <div class="col-6 col-lg-2">
                                                            <div><small class="pre-label">Qty</small></div>
                                                            <span>@{{ value_sp.so_luong_mua }}</span>
                                                        </div>
                                                        <div class="col-6 col-lg-3 text-right">
                                                            <div><small class="pre-label">Total</small></div>
                                                            <span>@{{ formatPrice(thanhTien(value_sp))}} đ</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </template>
                                            <div class="alert alert-warning" role="alert">
                                                <p>Bạn vui lòng chuyển khoản vào số tài khoản: xxx - Ngân hàng: xxx</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
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
            listOrder        :   [],
            listBill         :   [],
        },
        created()   {
            this.getData();
            this.getBill();
        },
        methods :   {
            getData() {
                axios
                    .get('/client/bill/order')
                    .then((res) => {
                        this.listOrder = res.data.listOrder;
                    });
            },

            getBill() {
                axios
                    .get('/client/all-bill')
                    .then((res) => {
                        this.listBill = res.data.listBill;
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
                return this.donGia(v.don_gia_mua, v.don_gia_khuyen_mai) * v.so_luong_mua;
            },

            formatDate(datetime)
            {
                const input = datetime;
                const dateObj = new Date(input);
                const year = dateObj.getFullYear();
                const month = (dateObj.getMonth()+1).toString().padStart(2, '0');
                const date = dateObj.getDate().toString().padStart(2, '0');

                const result = `${date}/${month}/${year}`;

                return result;
            },

            totalRequest() {
                return this.listCart.reduce((acc, item) => acc + this.thanhTien(item), 0);
            },

            formatPrice(value) {
                let val = (value/1).toFixed(0).replace('.', ',')
                return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
            }



        },
    });
</script>
@endsection
