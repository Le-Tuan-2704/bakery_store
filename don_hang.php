<?php
session_start();

include("controllers/c_don_hang.php");

if(isset($_SESSION["ten_dang_nhap"]))
{
    $c_don_hang=new C_don_hang();

    if (isset($_POST["action"]) && $_POST["action"] == "xac_nhan") {
        $ho_ten_nguoi_nhan = $_POST["ho_ten_nguoi_nhan"];
        $sdt_nguoi_nhan = $_POST["sdt_nguoi_nhan"];
        $dia_diem_giao = $_POST["dia_diem_giao"];
        $ngay_giao_hang = $_POST["ngay_giao_hang"];
        $ghi_chu = $_POST["ghi_chu"];
        $c_don_hang->dat_hang($ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_giao_hang, $ghi_chu);
        return;
    }

    if (isset($_POST["action"]) && $_POST["action"] == "thay_doi_trang_thai") {
        $res = $c_don_hang->thay_doi_trang_thai($_POST["ma_don_hang"], $_POST["trang_thai"]);
        echo json_encode($res);
        return;
    }

    if (isset($_POST["action"]) && $_POST["action"] == "huy_don_hang") {
        $res = $c_don_hang->huy_don_hang($_POST["ma_don_hang"], $_POST["trang_thai"]);
        echo json_encode($res);
        return;
    }

    if (isset($_GET["action"]) && $_GET["action"] == "search") {

        $searchMaDonHang = $_GET["searchMaDonHang"];
        $searchTenKhachHang = $_GET["searchTenKhachHang"];
        $searchMaKhachHang = $_GET["searchMaKhachHang"];
        $searchThoiGianDat = $_GET["searchThoiGianDat"];
        $searchThoiGianGiao = $_GET["searchThoiGianGiao"];
        $searchStatusDropdown = $_GET["searchStatusDropdown"];

        $c_don_hang->Hien_thi_don_hang($searchMaDonHang, $searchTenKhachHang, $searchMaKhachHang, $searchThoiGianDat, $searchThoiGianGiao, $searchStatusDropdown);
        // Sau khi xử lý xong, unset($_GET) để xóa dữ liệu
        unset($_GET);
        return;
    }
    

    $c_don_hang->Hien_thi_don_hang('', '', '', '', '', 0);
}



?>