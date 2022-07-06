<div class="topbar dark topbar-padding">
    <div class="container">
        <div class="topbar-left-items">
            <ul class="toplist toppadding pull-left paddtop1">
                <li class="rightl">Customer Care</li>
                <li>(888) 123-4567</li>
            </ul>
        </div>
        <!--end left-->

        <div class="topbar-right-items pull-right">
            <ul class="toplist toppadding">
                <li><a href="#"><i class="fa fa-search"></i> &nbsp;</a></li>
                <li><a href="https://www.facebook.com/codelayers"><i class="fa fa-facebook"></i></a></li>
                <li><a href="https://twitter.com/codelayers"><i class="fa fa-twitter"></i></a></li>

                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li class="last"><a href="#"> USD <i class="fa fa-angle-down"></i></a></li>
            </ul>
        </div>
    </div>
</div>
<div class="topbar white">
    <div class="container">
        <div class="topbar-left-items">
            <div class="margin-top1"></div>
            @if(!Auth::guard('customer')->check())
            <ul class="toplist toppadding pull-left paddtop1">
                <li class="lineright"><a href="#" data-toggle="modal" data-target="#loginModal">Login</a></li>
                <div class="modal fade" id="loginModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title text-white" id="exampleModalLabel">Đăng Nhập</h5>
                            </div>
                            <form id="loginForm">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Điền vào email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật Khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Điền vào mật khẩu">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Đăng nhập</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <li><a href="#" data-toggle="modal" data-target="#registerModal">Register</a></li>

                <div class="modal fade" id="registerModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header bg-primary">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <h5 class="modal-title text-white" id="exampleModalLabel">Đăng Ký</h5>
                            </div>
                            <form id="registerForm">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Họ và tên</label>
                                        <input type="text" name="full_name" class="form-control"
                                            placeholder="Điền vào họ và tên">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control"
                                            placeholder="Điền vào email">
                                    </div>
                                    <div class="form-group">
                                        <label>Mật Khẩu</label>
                                        <input type="password" name="password" class="form-control"
                                            placeholder="Điền vào mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <label>Nhập Lại Mật Khẩu</label>
                                        <input type="password" name="re_password" class="form-control"
                                            placeholder="Nhập lại mật khẩu">
                                    </div>
                                    <div class="form-group">
                                        <label>Số điện thoại</label>
                                        <input type="tel" name="phone" class="form-control"
                                            placeholder="Điền vào số điện thoại">
                                    </div>
                                    <div class="form-group">
                                        <label>Giới tính</label>
                                        <select name="sex" class="form-control">
                                            <option value="0">Nam</option>
                                            <option value="1">Nữ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Ngày Sinh</label>
                                        <input type="date" name="dob" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Đăng Ký</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </ul>
            @endif
        </div>
        <!--end left-->

        <div class="topbar-middle-logo no-bgcolor"><a href="/"><img src="/assets_new_client/images/logo.png"
                    alt="" /></a></div>
        <!--end middle-->

        <div class="topbar-right-items pull-right">
            <div class="margin-top1"></div>
            <ul class="toplist toppadding">
                <li class="lineright"><a href="#">My Account</a></li>
                <li class="lineright"><a href="#">Checkout</a></li>
                <li class="last"><a href="/client/cart">Cart (0)</a></li>
            </ul>
        </div>
    </div>
</div>
