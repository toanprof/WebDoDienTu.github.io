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
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div><a class="logo text-start" href="index.html"><img class="img-fluid for-light"
                                    src="/assets_new_admin/images/logo/login.png" alt="looginpage"><img
                                    class="img-fluid for-dark" src="/assets_new_admin/images/logo/logo_dark.png"
                                    alt="looginpage"></a></div>
                        <div class="login-main">
                            <form class="theme-form" autocomplete="off">
                                <h4>Sign in to account</h4>
                                <p>Enter your email & password to login</p>
                                <div class="form-group">
                                    <label class="col-form-label">Email or Phone</label>
                                    <input autocomplete="off" class="form-control" id="username" name="user_name" type="email" required="" placeholder="Nh???p v??o email ho???c s??? ??i???n tho???i">
                                </div>
                                <div class="form-group">
                                    <label class="col-form-label">Password</label>
                                    <div class="form-input position-relative">
                                        <input autocomplete="off" class="form-control" type="password" name="password" required="" id="password"
                                            placeholder="Nh???p v??o nh???p kh???u">
                                        <div class="show-hide"><span class="show"> </span></div>
                                    </div>
                                </div>
                                <div class="form-group mb-0">
                                    <div class="checkbox p-0">
                                        <input id="checkbox1" type="checkbox">
                                        <label class="text-muted" for="checkbox1">Remember password</label>
                                    </div>
                                    <button class="btn btn-primary btn-block w-100" type="button" id="login">Sign in</button>
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
        <!-- login js-->
        <!-- Plugin used-->
        <script>
            $(document).ready(function(){
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $("#login").click(function() {
                    var payload = {
                        'username'  :   $("#username").val(),
                        'password'  :   $("#password").val(),
                    };
                    $.ajax({
                        url     :   '/admin/login',
                        type    :   'post',
                        data    :   payload,
                        success :   function(res) {
                            if(res.status) {
                                window.location.href = "/admin/danh-muc/index";
                            } else {
                                toastr.error('????ng nh???p th???t b???i!');
                            }
                        },
                        error   :   function(res) {
                            var listError = res.responseJSON.errors;
                            $.each(listError, function(key, value) {
                                toastr.error(value[0]);
                            });
                        },
                    });
                })

            })
        </script>
    </div>
</body>

</html>
