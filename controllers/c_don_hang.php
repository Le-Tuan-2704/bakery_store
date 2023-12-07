<?php
include("models/m_don_hang.php");
class C_don_hang
{
	function Hien_thi_don_hang(){
		$m_don_hang=new M_don_hang();

		$orderBakery = array(
			array(
				'ma_don_hang' => 1,
				'ma_san_pham' => 101,
				'ma_khach_hang' => 201,
				'ho_ten_nguoi_nhan' => 'Người Nhận 1',
				'sdt_nguoi_nhan' => '0123456789',
				'dia_diem_giao' => 'Địa chỉ giao hàng 1',
				'ngay_dat_hang' => '2023-12-01',
				'ngay_giao_hang' => '2023-12-05',
				'trang_thai' => 1,
				'tong_gia' => 150000,
				'ghi_chu' => 'Ghi chú đơn hàng 1'
			),
			array(
				'ma_don_hang' => 2,
				'ma_san_pham' => 102,
				'ma_khach_hang' => 202,
				'ho_ten_nguoi_nhan' => 'Người Nhận 2',
				'sdt_nguoi_nhan' => '0987654321',
				'dia_diem_giao' => 'Địa chỉ giao hàng 2',
				'ngay_dat_hang' => '2023-12-02',
				'ngay_giao_hang' => '2023-12-06',
				'trang_thai' => 2,
				'tong_gia' => 200000,
				'ghi_chu' => 'Ghi chú đơn hàng 2'
			),
			// Thêm các đơn hàng khác tương tự
		);
		

		$title="web bán bánh | đơn hàng";
		$view="views/v_don_hang.php";
		include("views/include/layout.php");
	}
}
?>