<?php
session_start();
include("controllers/c_dang_nhap.php");
$c_dang_xuat=new C_dang_nhap();
$c_dang_xuat->thoat_dang_nhap();
?>