<?php
@session_start();
class C_gio_hang
{
	function Xem_gio_hang()
	{
		$gio_hang = $this->layGioHang();
		if ($gio_hang) //Nếu có giỏ hàng
		{
			$gio_hang_san_pham = array();
			foreach ($gio_hang as $key => $value) {
				if (substr($key, 0, 1) == 't')
					$gio_hang_san_pham[substr($key, 1, strlen($key) - 1)] = $value;
				else
					$gio_hang_san_pham[$key] = $value;
			}
			if ($gio_hang_san_pham) //Nếu có chọn sản phẩm
			{
				$_SESSION['gio_hang_san_pham'] = $gio_hang_san_pham;
				$ds_san_pham = $this->lay_thong_tin_san_pham($gio_hang_san_pham);
			}
		}

		$title = "Bakery | Giỏ hàng";
		$view = "views/v_gio_hang.php";
		include("views/include/layout_2.php");
	}

	function layGioHang()
	{
		if (isset($_SESSION["giohang"]))
			return $_SESSION["giohang"];
		else
			return false;
	}

	function lay_thong_tin_san_pham($san_pham)
	{
		$ma_san_pham = array();
		foreach ($san_pham as $key => $value) {
			$ma_san_pham[] = $key;
		}
		$ma_san_pham = implode(",", $ma_san_pham);
		include_once('models/m_san_pham.php');
		$m_san_pham = new M_san_pham();
		$ds_san_pham = $m_san_pham->lay_san_pham_cho_gio_hang($ma_san_pham);
		$ds_san_pham_gio_hang = array(); //Ðua số lượng vào $ds_mon_an
		foreach ($ds_san_pham as $item) {
			$item->so_luong = $san_pham[$item->ma_san_pham];
			$ds_san_pham_gio_hang[] = $item;
		}
		return $ds_san_pham_gio_hang;
	}
	function themGioHang($maSP, $so_luong, $donGia)
	{
		if ($so_luong > 0) {
			if (isset($_SESSION['giohang'][$maSP])) {
				$_SESSION['thanh_tien'] -= $_SESSION['giohang'][$maSP] * $donGia;
				$_SESSION['so_luong'] -= $_SESSION['giohang'][$maSP];
			}
			$_SESSION['giohang'][$maSP] = $so_luong;
			if (isset($_SESSION['thanh_tien'])) {
				$_SESSION['thanh_tien'] = $_SESSION['thanh_tien'] + $so_luong * $donGia;
				$_SESSION['so_luong'] = $_SESSION['so_luong'] + $so_luong;
			} else {
				$_SESSION['thanh_tien'] = $so_luong * $donGia;
				$_SESSION['so_luong'] = $so_luong;
			}
		} elseif ($so_luong == 0) {
			$this->xoaMatHang($maSP, $donGia);
		}
	}
	function dat_hang()
	{
		include("models/m_khach_hang.php");
		$m_khach_hang = new M_khach_hang();
		$ma_san_pham = array();
		$ma_khach_hang = $ho_ten_nguoi_nhan = $sdt_nguoi_nhan = $dia_diem_giao = $ngay_giao_hang = $tong_gia = $ghi_chu = "";
		$ngay_dat_hang = date('Y-m-d');
		$ma_san_pham = $ds_san_pham->ma_san_pham;
		$trang_thai = 0;
		$tong_gia = 0;
		$hople = true;
		if (isset($_POST["btnMuaHang"])) {
			$ma_khach_hang = 1;
			$ho_ten_nguoi_nhan = $_POST["ho_ten_nguoi_nhan"];
			$sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
			$dia_diem_giao = $_POST["dia_diem_giao"];
			$ngay_giao_hang = $_POST["ngay_giao_hang"];
			$ghi_chu = $_POST["ghi_chu"];
			$dat_hang = $m_khach_hang->Them_hoa_don("NULL", $ma_san_pham, $ma_khach_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu);
			if ($dat_hang > 0) {
				echo "<script>alert('Mua hàng thành công')</script>";
				if ($dat_hang > 0) {
					$c_gio_hang = new C_gio_hang();
					$gio_hang = $c_gio_hang->layGioHang();

					foreach ($gio_hang as $key => $value) {
						$m_khach_hang->themChiTietHoaDon($dat_hang, $key, $value, 0);
					}
				} else {
					echo "<script>alert('Mua hàng thất bại' )</script>";
				}
			}
		}
	}


	function xoaMatHang($maSP, $donGia)
	{
		$giohang = $this->layGioHang();
		$giohangMoi = array();
		foreach ($giohang as $key => $value) {
			if ($key != $maSP)
				$giohangMoi[$key] = $value;
			else {
				$_SESSION['thanh_tien'] = @$_SESSION['thanh_tien'] - $giohang[$maSP] * $donGia;
				$_SESSION['so_luong'] = @$_SESSION['so_luong'] - $giohang[$maSP];
			}
		}
		if (!empty($giohangMoi)) {
			$_SESSION['giohang'] = $giohangMoi;
		} else {
			$this->xoaGioHang();
		}
	}
	function xoaGioHang()
	{
		unset($_SESSION['giohang']);
		unset($_SESSION['thanh_tien']);
		unset($_SESSION['so_luong']);
	}
	function thanh_tien()
	{
		if (isset($_SESSION['thanh_tien']))
			return $_SESSION['thanh_tien'];
		else
			return 0;
	}
	function so_luong()
	{
		if (isset($_SESSION['so_luong']))
			return $_SESSION['so_luong'];
		else
			return 0;
	}
	function tongSoMatHang()
	{
		if (isset($_SESSION['so_luong']))
			return $_SESSION['so_luong'];
		else
			return 0;
	}

	function capNhatGioHang($maSP, $so_luong, $donGia)
	{
		if (!is_numeric($so_luong))
			return false;
		$so_luong = (int)$so_luong;
		if ($so_luong > 0) {
			$_SESSION['thanh_tien'] -= $_SESSION['giohang'][$maSP] * $donGia;
			$_SESSION['thanh_tien'] += $so_luong * $donGia;
			$_SESSION['giohang'][$maSP] = $so_luong;
			$_SESSION['so_luong'] -= $_SESSION['giohang'][$maSP];
			return false;
		}
		if ($so_luong == 0)
			$this->xoaMatHang($maSP, $donGia);
		return false;
	}
}
