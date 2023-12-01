<?php
@session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once("models/database.php");

$sql = "select * from bk_chu_de";
$db = new database();
$chu_de = $db->pdo_query($sql, []);
?>

<div class="header-top" style="position: sticky; margin-bottom: 40px;">
    <div class="clearfix"></div>
    <div class="header-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="trang_chu">BakeryStore</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="trang_chu">Trang chủ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="san_pham">Sản phẩm</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="lien_he">Liên hệ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="gio_hang">Giỏ hàng</a>
                    </li>
                </ul>
                <ul class="navbar-nav">
					<?php if (isset($_SESSION["ten_khach_hang"])) : ?>
						<li class="nav-item" style="background-color: #9fffff99;">
							<a class="nav-link" href="dang_nhap.php?func=exit">Chào bạn <?php echo $_SESSION["ten_khach_hang"] ?></a>
						</li>
					<?php else : ?>
						<li class="nav-item">
							<a class="nav-link" href="dang_nhap">Đăng nhập</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="dang_ky">Đăng ký</a>
						</li>
					<?php endif; ?>
				</ul>

            </div>
        </nav>
    </div>
</div>
