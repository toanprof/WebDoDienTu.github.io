<!DOCTYPE html>
<html lang="en">

<head>
    @include('client_new.shares.head')
</head>

<body>
    <!-- Navigation -->

    @include('client_new.shares.menu')
    <!-- Sidebar login -->

    @include('client_new.components.sidebar_login')

    <!-- Sidebar cart -->

    {{-- @include('client_new.components.sidebar_cart') --}}

    @yield('content')

    <!-- Newsletter -->

    <hr class="m-0">

    <!-- Footer -->

    @include('client_new.shares.foot')

    <!-- Vendor Scripts -->

    @include('client_new.shares.js')
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
    @yield('js')

</body>
<!--Start of Tawk.to Script-->
<script src="https://js.pusher.com/7.1/pusher.min.js"></script>
<script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/62ac65337b967b1179950abd/1g5ommkei';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<script src="/js/app.js"></script>

<script>
    hienThiThongBao();

    function hienThiThongBao() {
        Echo.channel('noti').listen('NotiEvent', (e) => {
            toastr.success(e.noti);
        })
    }
</script>
<!--End of Tawk.to Script-->

</html>
