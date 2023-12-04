<?php
include("models/m_san_pham.php");
class C_chi_tiet_san_pham{
	function Hien_thi_chi_tiet_san_pham(){
		$ma_san_pham=$_GET["ma_san_pham"];
		$c_chi_tiet= new M_san_pham();
		$chi_tiet=$c_chi_tiet->Doc_san_pham_theo_ma_san_pham($ma_san_pham);

		echo($ma_san_pham);
		
		$title="Chi tiết sản phẩm";
		$view="views/v_chi_tiet_san_pham.php";
		include("views/include/layout_2.php");	
	}
}
?>