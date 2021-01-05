<div class="container">
  <ol class="breadcrumb">
    <li><a href="index.php">Trang chủ</a></li>
    <li class="active">Tài khoản</li>
  </ol>
  <div class="registration">
    <div class="registration_left">
      <h2><span> Nhập thông tin đặt hàng</span></h2>
      <div class="registration_form"> 
        <!-- Form -->
        <form method="post">
          <div>
            <label>
              <input placeholder="Họ và tên người nhận" type="text" name="ho_ten_nguoi_nhan" id="ho_ten_nguoi_nhan" class="text-input small-input kiemtra" data_error="Nhập họ tên"/>
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Số điện thoại" type="text"  name="sdt_nguoi_nhan" id="sdt_nguoi_nhan" class="text-input small-input kiemtra" data_error="Nhập số điện thoại"/>
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Địa điểm giao hàng" type="text"  name="dia_diem_giao" id="dia_diem_giao" class="text-input small-input kiemtra" data_error="Nhập địa điểm giao hàng"/>
            </label>
          </div>
          <div>
            <label>
              <input placeholder="Ngày giao hàng" type="date"  name="ngay_giao_hang" id="ngay_giao_hang" class="text-input small-input kiemtra" data_error=""/><p style="color:#999;float:right;margin-right:250px">Ngày giao hàng</p>
            </label>
          </div>
          <div>
            <label>
              <textarea placeholder="Ghi chú" type="text"  name="ghi_chu" id="ghi_chu" class="text-input small-input kiemtra" data_error="" ></textarea>
            </label>
          </div>
          <div>
            <input type="submit" value="Mua hàng" id="register-submit" name="btnMuaHang" onclick="return Kiemtradulieu()"/>
          </div>

        </form>
        <!-- /Form --> 
      </div>
    </div>
    <div class="clearfix"></div>
  </div>
</div>
