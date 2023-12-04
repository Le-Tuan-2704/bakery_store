<?php
include("models/m_don_hang.php");
class C_don_hang
{
	function Hien_thi_don_hang(){
		$m_don_hang=new M_don_hang();

		$title="web bán bánh | đơn hàng";
		$view="views/v_don_hang.php";
		include("views/include/layout.php");
	}
}
?>