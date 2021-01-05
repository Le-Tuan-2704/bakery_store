<?php
ini_set("display_errors",1);
include("controllers/c_dang_nhap.php");
$c_dang_nhap=new C_dang_nhap();
if(isset($_GET["func"]))
{
	$c_dang_nhap->thoat_dang_nhap();	
}
$c_dang_nhap->Hien_thi_dang_nhap();
?>
