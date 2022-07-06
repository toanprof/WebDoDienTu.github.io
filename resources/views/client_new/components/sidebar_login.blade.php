<nav id="loginComponent" class="sidebar bg-white border-right">
    <div class="sidebar-content sidebar-content-warning">

        <!-- Sidebar header -->

        <div class="sidebar-header p-3">
            <button type="button" class="toggle-show close" data-show="loginComponent">
                <span class="icon icon-cross"></span>
            </button>
        </div>

        <!-- Sidebar content -->

        <div class="d-flex w-100 align-items-center">
            <div class="w-100">
                <div class="p-4 p-lg-5">
                    <div class="mb-5 text-center">
                        <img src="/assets_client_new/assets/svg/reveal-symbol.svg" alt="" width="80" />
                    </div>
                    <form id="loginForm">
                        <div class="form-group">
                            <label class="label" for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <div class="form-group">
                            <label class="label" for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                        </div>
                        <div class="form-group d-flex justify-content-between">
                            <small>
                                <a href="#" class="text-muted">Forgot password?</a>
                            </small>
                        </div>
                    <div class="row justify-content-center pt-3">
                        <div class="col-md-10">
                            <button type="submit" class="btn btn-sm btn-block btn-dark btn-rounded px-5">Login</button>
                        </div>
                    </div>
                </form>
                    <div class="text-center">
                        <small>
                            <a href="#" class="text-muted">Don't have an account?</a> <br />
                            <a href="/login" class="text-muted">Create an account</a>
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
