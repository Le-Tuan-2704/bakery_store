<?php
include("models/m_san_pham.php");
class C_san_pham{
	function Hien_thi_san_pham()
	{
		$m_san_pham=new M_san_pham();
		$san_phams=$m_san_pham->Doc_san_pham();
		
		$chu_de=$m_san_pham->Doc_chu_de();
		$huong_vi=$m_san_pham->Doc_huong_vi();
		$khuyen_mai=$m_san_pham->Doc_khuyen_mai();
		
		include("Pager.php");
		$p=new pager();
		$limit=9;
		$count=count($san_phams);
		$vt=$p->findStart($limit);
		$pages=$p->findPages($count,$limit);
		$curpage=$_GET["page"];
		
		$lst=$p->pageList($curpage,$pages);
		$san_phams=$m_san_pham->Doc_san_pham($vt,$limit);

		$san_pham = $m_san_pham->Doc_tat_ca_san_pham();
		$tongsl = 0;
		$tongDg = 0;
		if (isset($_SESSION["giohang"])) {
			// $tongsl = count($_SESSION["giohang"]);
			foreach ($_SESSION["giohang"] as $k => $sl) {

				foreach ($san_pham as $sp) {
					if ($k == $sp->ma_san_pham) {
						$tongDg += $sl * ($sp->don_gia - ($sp->don_gia * $sp->chiet_khau / 100));
						$tongsl += $sl;
					}
				}
			}
		}
		
		$title="BakeryStore | Sản phẩm";
		$view="views/v_san_pham.php";
		include("views/include/layout_2.php");
	}
}
?>