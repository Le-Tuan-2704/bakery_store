<?php
require_once("database.php");

class M_khach_hang extends database {
    function Doc_khach_hang() {
        $sql = "SELECT * FROM bk_khach_hang";
        
        return $this->pdo_query($sql, []);
    }

    function Doc_khach_hang_theo_taikhoan_matkhau($username, $password) {
        $sql = "SELECT * FROM bk_khach_hang WHERE username=? AND password=?";
        
        return $this->pdo_query_one($sql, [$username, $password]);
    }

    function Doc_khach_hang_theo_id($id) {
        $sql = "SELECT * FROM bk_khach_hang WHERE ma_khach_hang=?";
        
        return $this->pdo_query_one($sql, [$id]);
    }
    

    function Them_khach_hang($ten_khach_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien) {
        $sql = "INSERT INTO bk_khach_hang (ma_khach_hang, ten_khach_hang, dia_chi, sdt, gioi_tinh, email, username, password, so_tien) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        return $this->pdo_execute($sql, [$ten_khach_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien]);
    }

    function Them_hoa_don($ma_khach_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu) {

        $dateNow = date("Y-m-d H:i:s");

        $sql = "INSERT INTO bk_don_hang (ma_khach_hang, ho_ten_nguoi_nhan, sdt_nguoi_nhan, dia_diem_giao, ngay_dat_hang, ngay_giao_hang, trang_thai, tong_gia, ghi_chu) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $this->pdo_execute($sql,[$ma_khach_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $dateNow, $dateNow, $trang_thai, $tong_gia, $ghi_chu]);

        $sql_select = "SELECT * FROM bk_don_hang WHERE ma_khach_hang = ? AND ngay_dat_hang = ?";

        return $this->pdo_query_one($sql_select, [$ma_khach_hang, $dateNow]);
    }

    function Them_chi_tiet_don_hang($ma_don_hang, $ma_san_pham, $so_luong, $don_gia) {
        $sql = "INSERT INTO bk_chi_tiet_don_hang (ma_don_hang, ma_san_pham, so_luong, don_gia) VALUES (?, ?, ?, ?)";
        
        return $this->pdo_execute($sql,[$ma_don_hang, $ma_san_pham, $so_luong, $don_gia]);
    }
}
?>
