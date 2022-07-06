<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Cuba admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Cuba admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="/assets_new_admin/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="/assets_new_admin/images/favicon.png" type="image/x-icon">
    <title>Cuba - Premium Admin Template</title>
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/font-awesome.css">
    <!-- ico-font-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/vendors/icofont.css">
    <!-- Themify icon-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/vendors/themify.css">
    <!-- Flag icon-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/vendors/flag-icon.css">
    <!-- Feather icon-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/vendors/feather-icon.css">
    <!-- Plugins css start-->
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/style.css">
    <link id="color" rel="stylesheet" href="/assets_new_admin/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="/assets_new_admin/css/responsive.css">
    @toastr_css
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.27.2/axios.min.js"></script>
</head>

<body>
    <!-- login page start-->
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-5"><img class="bg-img-cover bg-center" src="/assets_new_admin/images/login/3.jpg"
                    alt="looginpage"></div>
            <div class="col-xl-7 p-0">
                <div class="login-card">
                    <div>
                        <div><a class="logo text-start"><img class="img-fluid for-light"
                                    src="/assets_new_admin/images/logo/login.png" alt="looginpage"><img
                                    class="img-fluid for-dark" src="/assets_new_admin/images/logo/logo_dark.png"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form id="loginForm" class="theme-form" autocomplete="off">
                                <h4>Sign in to account <button type="button" class="btn btn-primary" id="viewRegister">Register</button></h4>
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email or Phone</label>
                                    <input autocomplete="off" class="form-control" id="username" name="email" type="email" required="" placeholder="Nhập vào email hoặc số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input autocomplete="off" class="form-control" type="password" name="password" required="" id="password"
                                            placeholder="Nhập vào nhập khẩu">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    {!! NoCaptcha::renderJs() !!}
                                    {!! NoCaptcha::display() !!}
                                    <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    <button class="btn btn-primary btn-block w-100" type="submit" id="login">Sign in</button>
                                </div>
                            </form>
                            <form id="registerForm" class="theme-form" autocomplete="off">
                                <h4>Register to account <button type="button" class="btn btn-warning" id="viewLogin">Login</button></h4>
                                <p>Enter your email & password to form</p>
                                <div class="form-group">
                                    <label class="col-form-label">Họ Và Tên</label>
                                    <input autocomplete="off" class="form-control" name="full_name" type="text" required="" placeholder="Nhập vào họ và tên">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Email</label>
                                    <input autocomplete="off" class="form-control" name="email" type="email" required="" placeholder="Nhập vào email">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Phone</label>
                                    <input autocomplete="off" class="form-control" name="phone" type="tel" required="" placeholder="Nhập vào số điện thoại">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mật Khẩu</label>
                                    <input autocomplete="off" class="form-control" name="password" type="password" required="" placeholder="Nhập vào mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Mật Lại Khẩu</label>
                                    <input autocomplete="off" class="form-control" name="re_password" type="password" required="" placeholder="Nhập lại mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Giới Tính</label>
                                    <select class="form-control" name="sex">
                                        <option value="1">Nam</option>
                                        <option value="0">Nữ</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Ngày Sinh</label>
                                    <input autocomplete="off" class="form-control" name="dob" type="date" required="" placeholder="Nhập vào ngày sinh">
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="submit">Sign in</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @jquery
        @toastr_js
        @toastr_render
        <!-- latest jquery-->
        <script src="/assets_new_admin/js/jquery-3.5.1.min.js"></script>
        <!-- Bootstrap js-->
        <script src="/assets_new_admin/js/bootstrap/bootstrap.bundle.min.js"></script>
        <!-- feather icon js-->
        <script src="/assets_new_admin/js/icons/feather-icon/feather.min.js"></script>
        <script src="/assets_new_admin/js/icons/feather-icon/feather-icon.js"></script>
        <!-- scrollbar js-->
        <!-- Sidebar jquery-->
        <script src="/assets_new_admin/js/config.js"></script>
        <!-- Plugins JS start-->
        <!-- Plugins JS Ends-->
        <!-- Theme js-->
        <script src="/assets_new_admin/js/script.js"></script>
        <script src="/js/app.js"></script>
        <!-- login js-->
        <!-- Plugin used-->


        <script>
            $("#registerForm").hide();
            $("#viewRegister").click(function() {
                $("#loginForm").hide();
                $("#registerForm").show();
            });
            $("#viewLogin").click(function() {
                $("#registerForm").hide();
                $("#loginForm").show();
            });

            $("#registerForm").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                console.log(payload);
                axios
                    .post('/register', payload)
                    .then((res) => {
                        if(res.data.status) {
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

            $("#loginForm").submit(function(e) {
                e.preventDefault();
                var payload = window.getFormData($(this));
                axios
                    .post('/login', payload)
                    .then((res) => {
                        if(res.data.status == 1) {
                            toastr.success("Đã login thành công!");
                            window.location.href = "/";
                        } else if(res.data.status == 2) {
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


        </script>
    </div>
</body>

</html>
