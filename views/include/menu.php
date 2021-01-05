<?php
@session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once("models/database.php");
$sql = "select * from bk_chu_de";
$db = new database();
$db->setQuery($sql);
$chu_de = $db->loadAllRows();
?>

<div class="header-top" style="position: sticky; margin-bottom: 40px;">


	<div class="clearfix"> </div>
	<div class="header-bottom">
		<div class="logo">
			<h1><a href="trang_chu">BakeryStore</a></h1>
		</div>
		<div class="top-nav">
			<ul class="memenu skyblue">
				<li class="active"><a href="trang_chu">Trang chủ</a></li>
				<li class="grid"><a href="san_pham">Sản phẩm</a></li>
				<li class="grid"><a href="lien_he">Liên hệ</a></li>
				<li class="grid"><a href="gio_hang">Giỏ hàng</a></li>
				<?php
				if ($_SESSION["ten_khach_hang"]) {
				?>
					<li class="active" style="float: right; background-color: #9fffff99;"><a href="dang_nhap.php?func=exit" class="#">Chào bạn <?php echo $_SESSION["ten_khach_hang"] ?></a></li>
				<?php
				} else {
				?>
					<li><a href="dang_nhap" class="#">Đăng nhập</a></li>
					<li><a href="dang_ky" class="#">Đăng ký</a></li>
				<?php
				}
				?>

			</ul>
		</div>
	</div>

</div>