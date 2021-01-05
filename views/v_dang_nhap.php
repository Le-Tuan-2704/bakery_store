<?php
@session_start();
$err="";
if(isset($_SESSION["error"]))
{
	$err=$_SESSION["error"];
	$_SESSION["error"]="";
}?>
<div class="login_sec">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.php">Trang chủ</a></li>
		  <li class="active">Đăng nhập</li>
		 </ol>
		 <h2 >Đăng nhập</h2>
		 <div class="col-md-6 log">			 
				 <form method="post">
					 <h5>Tên tài khoản</h5>	
					 <input type="text" value="" name="ten_dang_nhap">
					 <h5>Mật khẩu</h5>
					 <input type="password" value="" name="mat_khau">					
					 <input type="submit" name="btnDangNhap" value="Đăng nhập">	
						<a class="acount-btn" href="dang_ky.php">Tạo tài khoản</a>
				 </form>
				 <a href="#">Quên mật khẩu</a>
					
		 </div>	
				
		 <div class="clearfix"></div>
	 </div>
</div>
