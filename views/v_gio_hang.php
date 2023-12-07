
<div class="check-sec">
    <div class="col-md-12">
        <h1 class="mb-4">Giỏ hàng của bạn</h1>
    </div>
    <div class=" cart-items">
        <?php
        if (!empty($ds_san_pham)) {
            foreach ($ds_san_pham as $sp) {
        ?>
                <div class="card mb-3">
					<div class="row g-0">
						<div class="col-md-5">
							<img src="public/images/<?php echo $sp->hinh_anh ?>" class="img-fluid rounded-start" alt="<?php echo $sp->ten_san_pham; ?>">
						</div>
						<div class="col-md-6">
							<div class="card-body">
								<h5 class="card-title"><a href="chitiet_sp.php?ma_san_pham=<?php echo $sp->ma_san_pham ?>"><?php echo $sp->ten_san_pham ?></a></h5>
								<p class="card-text">Đơn giá: <?php echo number_format($sp->don_gia - ($sp->don_gia * $chiet_khau / 100)) ?> đồng</p>
								<p class="card-text">Số lượng: <?php echo $sp->so_luong ?></p>
								<p class="card-text">Giảm giá: <?php echo $chiet_khau ?>%</p>
							</div>
						</div>
						<div class="col-md-1">
							<div class="d-flex flex-column justify-content-center align-items-center h-100">
								<a href="javascript:hoixoa(<?php echo $k ?>)" class="btn btn-danger" aria-label="Remove">
									<i class="fas fa-trash-alt"></i>
								</a>
							</div>
						</div>
					</div>
				</div>

        <?php
            }
        } else {
        ?>
            <h4 align="center">Bạn chưa chọn sản phẩm nào</h4>
        <?php
        }
        ?>
        <p align="center">
			<a href="gio_hang.php?func=xac_nhan" class="btn btn-primary">Xác nhận đơn</a>
            <a href="xoa_gio_hang.php" class="btn btn-danger">Xóa giỏ hàng</a>
        </p>
    </div>

    <div class="clearfix"> </div>
</div>
