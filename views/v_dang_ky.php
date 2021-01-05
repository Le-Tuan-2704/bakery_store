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
          <div>
            <label>
              <input placeholder="Họ và tên" type="text" name="ten_khach_hang" id="ten_khach_hang" class="text-input small-input kiemtra" data_error="Nhập họ tên" />
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Địa chỉ" type="text" name="dia_chi" id="dia_chi" class="text-input small-input kiemtra" data_error="Nhập địa chỉ" />
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Email" type="email" name="email" id="email" class="text-input small-input kiemtra" data_error="Nhập Email" />
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Số điện thoại" type="text" name="sdt" id="sdt" class="text-input small-input kiemtra" data_error="Nhập số điện thoại" />
            </label>
          </div>
          <div class="sky_form1" style="margin-left:20px">
            <ul>
              <li>
                <label class="radio left">
                  <input type="radio" name="gioi_tinh" checked="checked" />
                  <i></i>Nam</label>
              </li>
              <li>
                <label class="radio">
                  <input type="radio" name="gioi_tinh" />
                  <i></i>Nữ</label>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div>
            <label>
              <input placeholder="Tên tài khoản" type="text" name="username" id="username" class="text-input small-input kiemtra" data_error="Nhập tên tài khoản" />
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Mật khẩu" type="password" name="password" id="password" class="text-input small-input kiemtra" data_error="Nhập mật khẩu" />
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Nhập lại mật khẩu" type="password" name="password_2" id="password_2" class="text-input small-input kiemtra" data_error="Nhập lại mật khẩu" />
            </label>
          </div>
          <div>
            <input type="submit" value="Đăng ký tài khoản" id="register-submit" name="btnDangki" onclick="return Kiemtradulieu()" />
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
          <div>
            <label>
              <input placeholder="Tài khoản" type="email" tabindex="3" required>
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Mật khẩu" type="password" tabindex="4" required>
            </label>
          </div>
          <div>
            <input type="submit" value="Đăng nhập">
          </div>
          <div class="forget"> <a href="#">Quên mật khẩu</a> </div>
        </form>
        <!-- /Form -->
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>