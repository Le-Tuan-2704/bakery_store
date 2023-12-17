<?php
@session_start();
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
include_once("models/database.php");

$sql = "select * from bk_chu_de";
$db = new database();
$chu_de = $db->pdo_query($sql, []);
?>

<div class="header-top" style="position: sticky; margin-bottom: 40px;">
    <div class="clearfix"></div>
    <div class="header-bottom">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="trang_chu">BakeryStore</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'trang_chu') ? 'active' : ''; ?>">
                        <a class="nav-link" href="trang_chu">Trang chủ</a>
                    </li>
                    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'san_pham') ? 'active' : ''; ?>">
                        <a class="nav-link" href="san_pham">Sản phẩm</a>
                    </li>
                    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'lien_he') ? 'active' : ''; ?>">
                        <a class="nav-link" href="lien_he">Liên hệ</a>
                    </li>
                    
                    <?php if (isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] =='khach') :?>
                    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'gio_hang') ? 'active' : ''; ?>">
                        <a class="nav-link" href="gio_hang">Giỏ hàng</a>
                    </li>
                    <?php endif; ?>

                    <?php if (isset($_SESSION["vai_tro"])) :?>
                    <li class="nav-item <?php echo (basename($_SERVER['REQUEST_URI']) == 'don_hang') ? 'active' : ''; ?>">
                        <a class="nav-link" href="don_hang">Đơn hàng</a>
                    </li>
                    <?php endif; ?>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (isset($_SESSION["ten_dang_nhap"])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dang_nhap.php?func=exit"><?php if (isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] =='admin') { echo "ADMIN - ";} else echo "Chào bạn:"; ?> <strong><?php echo strtoupper($_SESSION["ten_dang_nhap"]) ?></strong></a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="dang_nhap">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="dang_ky">Đăng ký</a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </nav>
    </div>
</div>


