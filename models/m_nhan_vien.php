<?php
require_once("database.php");

class M_nhan_vien extends database {
    function Doc_nhan_vien() {
        $sql = "SELECT * FROM bk_nhan_vien";
        
        return $this->pdo_query($sql, []);
    }

    function Doc_nhan_vien_theo_taikhoan_matkhau($username, $password) {
        $sql = "SELECT * FROM bk_nhan_vien WHERE username=? AND password=?";
        
        return $this->pdo_query_one($sql, [$username, $password]);
    }
    

    function Them_nhan_vien($ten_nhan_vien, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien) {
        $sql = "INSERT INTO bk_nhan_vien (ma_nhan_vien, ten_nhan_vien, dia_chi, sdt, gioi_tinh, email, username, password, so_tien) VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        return $this->pdo_execute($sql, [$ten_nhan_vien, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien]);
    }

    
}
?>
