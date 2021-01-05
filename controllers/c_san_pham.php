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
		
		$title="BakeryStore | Sản phẩm";
		$view="views/v_san_pham.php";
		include("views/include/layout_2.php");
	}
}
?>