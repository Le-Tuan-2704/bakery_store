<?php
include("models/m_don_hang.php");
include("models/m_san_pham.php");
include("models/m_khach_hang.php");

class C_don_hang
{

	function dat_hang() {
		$m_san_pham=new M_san_pham();
		$m_khach_hang=new M_khach_hang();

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

		$san_pham = $m_san_pham->Doc_san_pham();

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

		$thong_tin_khach_hang = $m_khach_hang->Doc_khach_hang_theo_id($_SESSION["ma_dang_nhap"]);

		$don_hang = $m_khach_hang->Them_hoa_don($thong_tin_khach_hang->ma_khach_hang, $thong_tin_khach_hang->ten_khach_hang, $thong_tin_khach_hang->sdt, $thong_tin_khach_hang->dia_chi, date("Y-m-d H:i:s"), date("Y-m-d H:i:s"), 1, $tongDg, 'ghi chú');
		

		if (!empty($ds_san_pham)) {
            foreach ($ds_san_pham as $sp) {
				$m_khach_hang->Them_chi_tiet_don_hang($don_hang->ma_don_hang, $sp->ma_san_pham, $sp->so_luong, $chiet_khau);
			}

			header("Location: /bakery_store/don_hang");
			// Xóa biến session "giohang"
			unset($_SESSION["giohang"]);
			exit;
		}
	}

	function Hien_thi_don_hang(){
		$m_don_hang=new M_don_hang();


		$orderBakery = $m_don_hang->Doc_don_hang_theo_khach_hang($_SESSION["ma_dang_nhap"]);
		
		foreach($orderBakery as $oB){
			$oB->chi_tiet = $m_don_hang->Doc_chi_tiet_don_hang($oB->ma_don_hang);
		}

		$title="web bán bánh | đơn hàng";
		$view="views/v_don_hang.php";
		include("views/include/layout.php");
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
}
?>