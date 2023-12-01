<?php
include("models/m_san_pham.php");
class C_trang_chu
{
	function Hien_thi_trang_chu(){
		$m_san_pham=new M_san_pham();
		$ma_khuyen_mai=$m_san_pham->Doc_san_pham_theo_ma_khuyen_mai();
		$ngay_them_san_pham=$m_san_pham->Doc_san_pham_theo_ngay_them();

		$title="web bán bánh | trang chủ";
		$view="views/v_trang_chu.php";
		include("views/include/layout.php");
	}
}
?>