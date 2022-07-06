<!doctype html>
<html lang="en">

<head>
    @include('new_client.share.head')
</head>

<body>
    <div class="site_wrapper">
        @include('new_client.share.top')
        <div class="clearfix"></div>

        <div id="header">
            @include('new_client.share.menu')
        </div>
        <!--end menu-->
        @yield('content')

        @include('new_client.share.foot')
        <!--end section-->
        <div class="clearfix"></div>

        <a href="#" class="scrollup red-4"></a><!-- end scroll to top of the page-->
    </div>

    @include('new_client.share.js')
    <script src="/js/app.js"></script>
    <script>
        $("#loginForm").submit(function(e) {
            e.preventDefault();
            var payload = window.getFormData($(this));
            axios
                .post('/login', payload)
                .then((res) => {
                    if (res.data.status == 1) {
                        toastr.success("Đã login thành công!");
                        window.location.href = "/";
                    } else if (res.data.status == 2) {
                        toastr.warning("Tài khoản chưa kích hoạt!");
                    } else {
                        toastr.error("Đăng nhập thất bại");
                    }
                })
                .catch((res) => {
                    var listError = res.response.data.errors;
                    $.each(listError, function(key, value) {
                        toastr.error(value[0]);
                    });
                });
        });

        $("#registerForm").submit(function(e) {
            e.preventDefault();
            var payload = window.getFormData($(this));
            console.log(payload);
            axios
                .post('/register', payload)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success("Đã tạo tài khoản thành công!");
                        $("#registerForm").hide();
                        $("#loginForm").show();
                    }
                })
                .catch((res) => {
                    var listError = res.response.data.errors;
                    $.each(listError, function(key, value) {
                        toastr.error(value[0]);
                    });
                });
        });

        $(".addToCart").click(function(e) {
            var id_san_pham = $(this).data('id');
            axios
                .get('/client/add-to-cart/' + id_san_pham)
                .then((res) => {
                    if (res.data.status) {
                        toastr.success(res.data.message);
                    } else {
                        toastr.error(res.data.message);
                    }
                });
        });
    </script>
    <script src="/js/app.js"></script>
    @yield('js')
</body>

</html>
