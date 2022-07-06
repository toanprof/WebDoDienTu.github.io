@extends('new_admin.master')
@section('title')
    Quản lý hóa đơn bán hàng
@endsection
@section('content')
<div id="app">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <input type="text" class="form-control" placeholder="Nhập vào hóa đơn cần tìm">
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Ngày</th>
                                <th class="text-center">Tổng Tiền</th>
                                <th class="text-center">Thanh Toán</th>
                                <th class="text-center">Tình Trạng</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in listBill">
                                <th class="align-middle">@{{ (key + 1) }}</th>
                                <td class="align-middle">@{{ formatDate(value.created_at) }}</td>
                                <td class="align-middle">@{{ formatPrice(value.bill_total) }}</td>
                                <td class="align-middle">@{{ value.is_payment == 0 ? 'Chưa Thanh Toán' : 'Đã Thanh Toán' }}</td>
                                <td class="align-middle">@{{ showType(value.is_type) }}</td>
                                <td>
                                    <button class="btn btn-primary" v-on:click="chiTiet(value)">View</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Chi Tiết Bán Hàng
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Tên Sản Phẩm</th>
                                <th class="text-center">Số Lượng</th>
                                <th class="text-center">Đơn Giá</th>
                                <th class="text-center">Thành Tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in listDetail">
                                <th class="align-middle">@{{ (key + 1) }}</th>
                                <td class="align-middle">@{{ value.ten_san_pham }}</td>
                                <td class="align-middle">@{{ formatPrice(value.so_luong_mua) }}</td>
                                <td class="align-middle">@{{ formatPrice(value.don_gia_mua) }}</td>
                                <td class="align-middle">@{{ formatPrice(value.don_gia_mua * value.so_luong_mua) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered mt-3">
                        <tr>
                            <th>Tên Người Nhận</th>
                            <td>@{{ ship_name }}</td>
                        </tr>
                        <tr>
                            <th>Số Điện Thoại Nhận</th>
                            <td>@{{ ship_phone }}</td>
                        </tr>
                        <tr>
                            <th>Địa Chỉ</th>
                            <td>@{{ ship_add }}</td>
                        </tr>
                    </table>
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
                listBill    :  [],
                listDetail  :  [],
                ship_name   :  '',
                ship_phone  :  '',
                ship_add    :  '',
            },
            created()   {
                this.getData();
            },
            methods :   {
                getData() {
                axios
                        .get('/admin/hoa-don-ban-hang/data')
                        .then((res) => {
                            this.listBill = res.data.bill;
                        });
                },
                chiTiet(value) {
                    this.ship_name  = value.ship_fullname;
                    this.ship_phone = value.ship_phone;
                    this.ship_add   = value.ship_address;
                    axios
                        .get('/admin/hoa-don-ban-hang/detail/' + value.id)
                        .then((res) => {
                            this.listDetail = res.data.chiTiet;
                        });
                },
                showType(type) {
                    if(type == 0) {
                        return 'Đang xử lý';
                    } else if(type == 1) {
                        return 'Đang vận chuyển';
                    } else if(type == 2) {
                        return 'Đã thành công';
                    } else {
                        return 'Đã hoàn trả';
                    }
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
                formatPrice(value) {
                    let val = (value/1).toFixed(0).replace('.', ',')
                    return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".")
                },
            },
        });
    </script>
@endsection
