<div class="container">
    <ol class="breadcrumb">
        <li><a href="index.php">Trang chủ</a></li>
        <li class="active">Tài khoản</li>
    </ol>

    <div class="registration">
        <div class="registration_left">
            <h2><span> Đăng ký tài khoản mới </span></h2>
            <div class="registration_form">
                <!-- Form -->
                <form method="post" action="">
                    <div class="form-group">
                        <label for="ten_khach_hang">Họ và tên:</label>
                        <input type="text" class="form-control kiemtra" id="ten_khach_hang" name="ten_khach_hang" placeholder="Họ và tên" data_error="Nhập họ tên" />
                    </div>
                    <div class="form-group">
                        <label for="dia_chi">Địa chỉ:</label>
                        <input type="text" class="form-control kiemtra" id="dia_chi" name="dia_chi" placeholder="Địa chỉ" data_error="Nhập địa chỉ" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control kiemtra" id="email" name="email" placeholder="Email" data_error="Nhập Email" />
                    </div>
                    <div class="form-group">
                        <label for="sdt">Số điện thoại:</label>
                        <input type="text" class="form-control kiemtra" id="sdt" name="sdt" placeholder="Số điện thoại" data_error="Nhập số điện thoại" />
                    </div>
                    <div class="form-group">
                        <label>Giới tính:</label>
                        <div class="sky_form1" style="margin-left:20px">
                            <ul>
                                <li>
                                    <label class="radio left">
                                        <input type="radio" name="gioi_tinh" checked="checked" />
                                        <i></i>Nam
                                    </label>
                                </li>
                                <li>
                                    <label class="radio">
                                        <input type="radio" name="gioi_tinh" />
                                        <i></i>Nữ
                                    </label>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Tên tài khoản:</label>
                        <input type="text" class="form-control kiemtra" id="username" name="username" placeholder="Tên tài khoản" data_error="Nhập tên tài khoản" />
                    </div>
                    <div class="form-group">
                        <label for="password">Mật khẩu:</label>
                        <input type="password" class="form-control kiemtra" id="password" name="password" placeholder="Mật khẩu" data_error="Nhập mật khẩu" />
                    </div>
                    <div class="form-group">
                        <label for="password_2">Nhập lại mật khẩu:</label>
                        <input type="password" class="form-control kiemtra" id="password_2" name="password_2" placeholder="Nhập lại mật khẩu" data_error="Nhập lại mật khẩu" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Đăng ký tài khoản" id="register-submit" name="btnDangki" onclick="return Kiemtradulieu()" />
                    </div>
                </form>
                <!-- /Form -->
            </div>
        </div>

        <div class="registration_left">
            <h2>Đăng nhập</h2>
            <div class="registration_form">
                <!-- Form -->
                <form method="post">
                    <div class="form-group">
                        <label for="email_login">Tài khoản:</label>
                        <input type="email" class="form-control" id="email_login" name="email_login" placeholder="Tài khoản" tabindex="3" required>
                    </div>
                    <div class="form-group">
                        <label for="password_login">Mật khẩu:</label>
                        <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Mật khẩu" tabindex="4" required>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Đăng nhập">
                    </div>
                    <div class="forget"> <a href="#">Quên mật khẩu</a> </div>
                </form>
                <!-- /Form -->
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
</div>
