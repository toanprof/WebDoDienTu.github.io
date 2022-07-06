@extends('new_admin.master')
@section('title')
    Quản lý sản phẩm
@endsection
@section('content')
    <div id="app">
        <div class="row">
            <div class="card">
                <div class="card-header">
                    Gửi thông báo
                </div>
                <div class="card-body">
                    <textarea cols="30" rows="10" class="form-control" v-model="noti">

                    </textarea>

                </div>
                <div class="card-footer">
                    <button class="btn btn-primary" v-on:click="sendNoti">Gửi thông báo</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                noti: '',
            },
            methods: {
                sendNoti() {
                    var payload = {
                        noti: this.noti,
                    };
                    axios
                        .post('/admin/thong-bao/index', payload)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success('Da gui thongn bao thanh cong');
                                this.noti = '';
                            }
                        })
                        .catch((res) => {
                            var listError = res.response.data.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        });
                }
            },
        });
    </script>
@endsection
