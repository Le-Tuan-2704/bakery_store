<?php
ini_set("display_errors",1);
include("controllers/c_dang_nhap_admin.php");
$c_dang_nhap_admin=new C_dang_nhap_admin();
if(isset($_GET["func"]))
{
	$c_dang_nhap_admin->thoat_dang_nhap_admin();	
}
$c_dang_nhap_admin->Hien_thi_dang_nhap_admin();
?>
