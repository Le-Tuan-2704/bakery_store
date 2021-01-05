<meta charset="utf-8" />
<?php
session_start();
$id=$_GET["id"];
$sl=$_GET["sl"];
// Lưu session 
$_SESSION["giohang"][$id]+=$sl;
// Thông báo chuyển về món ăn
echo "<script>alert('Thêm vào giỏ hàng thành công');window.location='san_pham.php'</script>"
?>