<?php
@session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include("models/m_nhan_vien.php");


class C_dang_nhap_admin{
    function Hien_thi_dang_nhap_admin()
    {
        if(isset($_POST["btnDangNhap"]))
        {
            $ten = $_POST["ten_dang_nhap"];
            $mk = $_POST["mat_khau"];
            $this->luu_dang_nhap($ten, $mk);
			
            if(isset($_SESSION["ten_dang_nhap"]))
            {
                echo "<script>alert('Đăng nhập thành công')</script>";    
                header("location:index.php");
            }
            else
            {
                echo "<script>alert('Thông tin đăng nhập không hợp lệ')</script>";
                session_destroy();
            }
        }


		$title = "Bakery | Đăng nhập";
		$view = "views/v_dang_nhap_admin.php";
		include("views/include/layout_2.php");
    }

    function thoat_dang_nhap_admin()
    {
        session_destroy();
        header("location:dang_nhap_admin.php");
    }

    function luu_dang_nhap($ten, $mk)
    {
        $m_nhan_vien = new M_nhan_vien();
        $nhan_vien = $m_nhan_vien->Doc_nhan_vien_theo_taikhoan_matkhau($ten, $mk);
        if($nhan_vien) {
            $_SESSION['ma_dang_nhap'] = $nhan_vien->ma_nhan_vien;
            $_SESSION['ten_dang_nhap'] = $nhan_vien->ten_nhan_vien;
            $_SESSION['vai_tro'] = 'admin';
        }
    }
}
?>
