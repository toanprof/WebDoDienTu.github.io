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
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
</head>

<body>
    <div id="app" class="container-fluid">
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
                            <form class="theme-form" autocomplete="off">
                                <h4>Change password your account</h4>
                                <div class="form-group">
                                    <input type="hidden" id="hash" value="{{ $hash }}">
                                    <label class="col-form-label">Password</label>
                                    <input autocomplete="off" class="form-control" v-model="password" type="email"
                                        required="">
                                    <label class="col-form-label">Re-Password</label>
                                    <input autocomplete="off" class="form-control" v-model="re_password" type="email"
                                        required="">
                                </div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block w-100 mt-2" type="button" v-on:click="changePass()">Change Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
@jquery
@toastr_js
@toastr_render
<script src="/assets_new_admin/js/jquery-3.5.1.min.js"></script>
<script src="/assets_new_admin/js/bootstrap/bootstrap.bundle.min.js"></script>
<script src="/assets_new_admin/js/icons/feather-icon/feather.min.js"></script>
<script src="/assets_new_admin/js/icons/feather-icon/feather-icon.js"></script>
<script src="/assets_new_admin/js/config.js"></script>
<script src="/assets_new_admin/js/script.js"></script>
<script src="/js/app.js"></script>
<script>
    new Vue({
        el: '#app',
        data: {
            password    :   '',
            re_password :   '',
        },
        methods: {
            changePass() {
                var payload = {
                    'password'      : this.password,
                    're_password'   : this.re_password,
                    'hash'          : document.getElementById("hash").value,
                };

                axios
                    .post('/change-pass', payload)
                    .then((res) => {
                        if(res.data.status) {
                            toastr.success('Mật khẩu đã được thay đổi!');
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

</html>
