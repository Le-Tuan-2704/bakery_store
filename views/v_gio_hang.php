<?php
include_once("models/database.php");
$sql = "SELECT *,chiet_khau from bk_san_pham sp inner join bk_khuyen_mai km on sp.ma_khuyen_mai=km.ma_khuyen_mai ";
$db = new database();
$db->setQuery($sql);
$san_pham = $db->loadAllRows();
$tongsl = 0;
$tongDg = 0;
if (isset($_SESSION["giohang"])) {
	$tongsl = count($_SESSION["giohang"]);
	foreach ($_SESSION["giohang"] as $k => $v) {
		foreach ($san_pham as $sp) {
			if ($k == $sp->ma_san_pham) {
				$chiet_khau = $sp->chiet_khau;
				$tongDg += $v * ($sp->don_gia - ($sp->don_gia * $sp->chiet_khau / 100));
			}
		}
	}
}
?>
<div class="check-sec">
	<div class="col-md-3 cart-total">
		<?php
		if (isset($ds_san_pham)) {
		?>
			<a class="continue" href="san_pham.php">Tiếp tục mua hàng</a>
			<div class="price-details">
				<h4 style="color:red" align="center">Phiếu mua hàng</h4>
				<span>Số lượng sản phẩm</span>
				<span class="total1"><?php echo count($_SESSION["giohang"]) ?></span>
				<span>Phí giao hàng</span>
				<span class="total1">0</span>
				<div class="clearfix"></div>
			</div>
			<ul class="total_price">
				<li class="last_price">
					<h4>Tổng cộng</h4>
				</li>
				<li class="last_price"><span><?php echo number_format($tongDg); ?></span></li>
			</ul>
			<div class="clearfix"></div>
			<div class="clearfix"></div>
			<?php
			if (!isset($_SESSION["ten_khach_hang"])) {
			?>
				<a class="order" href="dang_nhap" onclick="">ĐẶT HÀNG</a>
			<?php
			} else {
			?>
				<a class="order" onclick="window.location.href = 'mua_hang.php?key=dat-hang'">ĐẶT HÀNG</a>
			<?php
			}
			?>
	</div>
	<div class="col-md-9 cart-items">
		<h1>Giỏ hàng</h1>
		<?php
			foreach ($ds_san_pham as $sp) {
		?>
			<div class="cart-header">
				<a href="javascript:hoixoa(<?php echo $k ?>)">
					<div class="close1"></div>
				</a>
				<div class="cart-sec ">
					<div class="cart-item cyc">
						<img src="public/images/<?php echo $sp->hinh_anh ?>" class="img-responsive" alt="" />
					</div>
					<div class="cart-item-info">
						<h4><a href="chitiet_sp.php?ma_san_pham=<?php echo $sp->ma_san_pham ?>"><?php echo $sp->ten_san_pham ?></a></h4>
						<ul class="qty">
							<li>
								<p style="font-size:18px">Giá: <?php echo number_format($sp->don_gia - ($sp->don_gia * $chiet_khau / 100)) ?> đồng</p>
							</li>
							<li>
								<p style="font-size:18px">Số lượng: <?php echo $sp->so_luong ?> </p>
							</li>
							<li>
								<p style="font-size:18px">Giảm giá: <?php echo $chiet_khau ?> %</p>
							</li>
						</ul>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		<?php
			}
		?>
		<p align="center">

			<input type="submit" name="btnCapnhat" value="Cập nhật" class="button-2" />
			<a href="xoa_gio_hang.php"><input type="button" class="button-1" id="btnxoa" value="Xóa giỏ hàng" /></a>
		</p>
	<?php
		} else {
	?>
		<h4 align="center">Bạn chưa chọn sản phẩm nào</h4>
	<?php
		}
	?>
	</div>
	<div class="clearfix"> </div>
</div>