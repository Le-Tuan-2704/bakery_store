<?php
@session_start();
include("models/m_khach_hang.php");
class C_dang_ky{
	function Them_khach_hang(){
		$m_khach_hang=new M_khach_hang();
		$ten_khach_hang=$dia_chi=$sdt=$gioi_tinh=$email=$username=$password=$password_2="";
		$hople=true;
		if(isset($_POST["btnDangki"]))
		{
			$ten_khach_hang=$_POST["ten_khach_hang"];	
			$dia_chi=$_POST["dia_chi"];
			$sdt=$_POST["sdt"];
			$gioi_tinh=$_POST["gioi_tinh"];
			$email=$_POST["email"];
			$username=$_POST["username"];
			$password=$_POST["password"];
			$password_2=$_POST["password_2"];
			$so_tien=0;

			if($hople && $password == $password_2)
			{
				$kq=$m_khach_hang->Them_khach_hang("NULL", $ten_khach_hang, $dia_chi, $sdt, $gioi_tinh, $email, $username, ($password), $so_tien);
				echo "<script>alert('Đăng ký thành công')</script>";
				echo "<script>window.location='dang_nhap.php'</script>";	
			}
			else
			{
				echo "<script>alert('Đăng ký không thành công')</script>";
				echo "<script>window.location='dang_ky.php'</script>";
			}
		}
		
		$title="Bakery | Đăng ký";	
		$view="views/v_dang_ky.php";
		include("views/include/layout_2.php");
	}
}

?>