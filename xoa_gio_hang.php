<?php
session_start();
if(isset($_GET["id"])) // Xóa một 
{
	$id=$_GET["id"];
	unset($_SESSION["giohang"][$id]);
	if(count($_SESSION["giohang"])>0)
	{
		header("location:gio_hang.php");	
	}	
	else
	{
		header("location:san_pham.php");
	}
}
else
{
	header("location:san_pham.php");
}

?>