<?php
session_start();

include("controllers/c_don_hang.php");

if(isset($_SESSION["ten_dang_nhap"]))
{
    $c_don_hang=new C_don_hang();

    if (isset($_POST["action"]) && $_POST["action"] == "xac_nhan") {

        $c_don_hang->dat_hang();
        return;
    }

    $c_don_hang->Hien_thi_don_hang();
}



?>