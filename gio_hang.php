<?php
ini_set("display_errors",1);
include("controllers/c_gio_hang.php");
if(isset($_SESSION["ten_dang_nhap"]))
{
    $c_gio_hang=new C_gio_hang();
    
    if (isset($_GET["func"]) && $_GET["func"] == "xac_nhan") {
        $c_gio_hang->Xac_nhan_gio_hang();
        return;
    }

    $c_gio_hang->Xem_gio_hang();
}
else
{
    header("location:dang_nhap.php");
}

?>