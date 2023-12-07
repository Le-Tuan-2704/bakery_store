<?php
@session_start();
$err="";
if(isset($_SESSION["error"]))
{
	$err=$_SESSION["error"];
	$_SESSION["error"]="";
}?>

<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h2 class="text-center">Đăng nhập Admin</h2>
                    </div>
                    <div class="card-body">
                        <form method="post">
                            <div class="form-group">
                                <label for="ten_dang_nhap">Tên tài khoản</label>
                                <input type="text" id="ten_dang_nhap" name="ten_dang_nhap" class="form-control" placeholder="Nhập tên tài khoản" required>
                            </div>
                            <div class="form-group">
                                <label for="mat_khau">Mật khẩu</label>
                                <input type="password" id="mat_khau" name="mat_khau" class="form-control" placeholder="Nhập mật khẩu" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="btnDangNhap" value="Đăng nhập" class="btn btn-primary btn-block">Đăng nhập</button>
                            </div>
                        </form>
                        <div class="text-center">
                            <a href="#">Quên mật khẩu?</a>
                        </div>
                        <?php if ($err) : ?>
                            <div class="alert alert-danger mt-3"><?php echo $err; ?></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
