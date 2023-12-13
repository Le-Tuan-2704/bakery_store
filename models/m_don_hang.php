<?php
require_once("database.php");

class M_don_hang extends database {
    function Doc_don_hang() {
        $sql = "SELECT * FROM bk_don_hang";
        
        return $this->pdo_query($sql, []);
    }

    function Doc_don_hang_theo_khach_hang($ma_khach_hang) {
        $sql = "SELECT * FROM bk_don_hang WHERE ma_khach_hang = ? Order By trang_thai";
        
        return $this->pdo_query($sql, [$ma_khach_hang]);
    }

    function Doc_chi_tiet_don_hang($ma_don_hang) {
        $sql = "SELECT * FROM bk_chi_tiet_don_hang ctdh inner join bk_san_pham sp on ctdh.ma_san_pham = sp.ma_san_pham WHERE ma_don_hang = ?";
        
        return $this->pdo_query($sql, [$ma_don_hang]);
    }

    function Doc_don_hang_theo_taikhoan_matkhau($username, $password) {
        $sql = "SELECT * FROM bk_don_hang WHERE username=? AND password=?";
        
        return $this->pdo_query_one($sql, [$username, $password]);
    }
    

    function Them_don_hang($ten_don_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien) {
        $sql = "INSERT INTO bk_don_hang (ma_don_hang, ten_don_hang, dia_chi, sdt, gioi_tinh, email, username, password, so_tien) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        return $this->pdo_execute($sql, [$ten_don_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien]);
    }

    function Them_hoa_don($ma_san_pham, $ma_don_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu) {
        $sql = "INSERT INTO bk_don_hang (ma_don_hang, ma_san_pham, ma_don_hang, ho_ten_nguoi_nhan, sdt_nguoi_nhan, dia_diem_giao, ngay_dat_hang, ngay_giao_hang, trang_thai, tong_gia, ghi_chu) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        return $this->pdo_execute($sql,[$ma_san_pham, $ma_don_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu]);
    }

    function them_chi_tiet_hoa_don($ma_don_hang, $ma_san_pham, $so_luong, $don_gia) {
        $sql = "INSERT INTO bk_chi_tiet_don_hang (ma_don_hang, ma_san_pham, so_luong, don_gia) VALUES (?, ?, ?, ?)";
        
        return $this->pdo_execute($sql,[$ma_don_hang, $ma_san_pham, $so_luong, $don_gia]);
    }
}
?>
