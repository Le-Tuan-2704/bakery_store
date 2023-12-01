<?php
@session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include("models/m_khach_hang.php");


class C_dang_nhap{
    function Hien_thi_dang_nhap()
    {
        if(isset($_POST["btnDangNhap"]))
        {
            $ten = $_POST["ten_dang_nhap"];
            $mk = $_POST["mat_khau"];
            $this->luu_dang_nhap($ten, $mk);
			
            if(isset($_SESSION["ten_khach_hang"]))
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
		$view = "views/v_dang_nhap.php";
		include("views/include/layout_2.php");
    }

    function thoat_dang_nhap()
    {
        session_destroy();
        header("location:dang_nhap.php");
    }

    function luu_dang_nhap($ten, $mk)
    {
        $m_khach_hang = new M_khach_hang();
        $khach_hang = $m_khach_hang->Doc_khach_hang_theo_taikhoan_matkhau($ten, $mk);
        if($khach_hang) {
            $_SESSION['ten_khach_hang'] = $khach_hang->ten_khach_hang;
        }
    }
}
?>
