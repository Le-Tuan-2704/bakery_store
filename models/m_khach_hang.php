<?php
require_once("database.php");
//ma_khach_hang, ten_khach_hang, dia_chi, sdt, gioi_tinh, email, username, password, so_tien
class M_khach_hang extends database{
	function Doc_khach_hang(){
		$sql="SELECT * from bk_khach_hang";
		$this->setQuery($sql);
		return $this->loadAllRows();		
	}
	
	function Doc_khach_hang_theo_taikhoan_matkhau($username,$password){
		$sql="SELECT * from bk_khach_hang where username=? and password=?";
		$this->setQuery($sql);
		return $this->loadRow(array($username,($password)));
	}
	
	function Them_khach_hang($ma_khach_hang, $ten_khach_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, $password, $so_tien)
	{
		$sql="INSERT into bk_khach_hang VALUES(?,?,?,?,?,?,?,?,?)";	
		$this->setQuery($sql);
		return $this->execute(array("NULL", $ten_khach_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, ($password), $so_tien));
	}
	//ma_don_hang, ma_san_pham, ma_khach_hang, ho_ten_nguoi_nhan, sdt_nguoi_nhan, dia_diem_giao, ngay_dat_hang, ngay_giao_hang, trang_thai, tong_gia, ghi_chu
	function Them_hoa_don($ma_don_hang, $ma_san_pham, $ma_khach_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu)
	{
		$sql="INSERT into bk_don_hang(ma_don_hang, ma_san_pham, ma_khach_hang, ho_ten_nguoi_nhan, sdt_nguoi_nhan, dia_diem_giao, ngay_dat_hang, ngay_giao_hang, trang_thai, tong_gia, ghi_chu) values(?,?,?,?,?,?,?,?,?,?,?)";
		$this->setQuery($sql);
		return $this->execute(array("NULL", $ma_san_pham, $ma_khach_hang, $ho_ten_nguoi_nhan, $sdt_nguoi_nhan, $dia_diem_giao, $ngay_dat_hang, $ngay_giao_hang, $trang_thai, $tong_gia, $ghi_chu));
	}
	
	function themChiTietHoaDon( $ma_don_hang, $ma_san_pham, $so_luong,$don_gia)
	{
		$query = "INSERT INTO bk_chi_tiet_don_hang( ma_don_hang, ma_san_pham, so_luong,don_gia) VALUES(?,?,?,?)";
		$this->setQuery($query);
		return $this->execute(array( $ma_don_hang, $ma_san_pham, $so_luong,$don_gia));
	}
}
?>