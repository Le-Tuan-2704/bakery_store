<div class="container">
    <div class="mb-4">
        <h2 class="text-info">Sản phẩm khuyến mãi</h2>
    </div>
    <div class="row">
        <?php foreach ($ma_khuyen_mai as $km) : ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="san_pham">
                        <img class="card-img-top" src="public/images/<?php echo $km->hinh_anh; ?>" alt="<?php echo $km->ten_san_pham; ?>" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $km->ten_san_pham; ?></h5>
                        <?php if ($km->chiet_khau != 0) : ?>
                            <p class="card-text"><del><?php echo number_format($km->don_gia); ?>&nbsp;đồng</del></p>
                            <p class="card-text discount-text">[<?php echo $km->chiet_khau; ?>% Off]</p>
                        <?php endif; ?>
                        <p class="card-text price-text" style="color: #f00"><?php echo number_format($km->don_gia - ($km->don_gia * $km->chiet_khau / 100)); ?>&nbsp;đồng</p>
                        <a href="san_pham" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <hr>

    <div class="mb-4">
        <h2 class="text-info">Danh sách sản phẩm mới nhất</h2>
    </div>
    <div class="row">
        <?php foreach ($ngay_them_san_pham as $ngay_them) : ?>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <a href="san_pham">
                        <img class="card-img-top" src="public/images/<?php echo $ngay_them->hinh_anh; ?>" alt="<?php echo $ngay_them->ten_san_pham; ?>" />
                    </a>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $ngay_them->ten_san_pham; ?></h5>
                        <?php if ($ngay_them->chiet_khau != 0) : ?>
                            <p class="card-text"><del><?php echo number_format($ngay_them->don_gia); ?>&nbsp;đồng</del></p>
                            <p class="card-text discount-text">[<?php echo $ngay_them->chiet_khau; ?>% Off]</p>
                        <?php endif; ?>
                        <p class="card-text price-text" style="color: #f00"><?php echo number_format($ngay_them->don_gia - ($ngay_them->don_gia * $ngay_them->chiet_khau / 100)); ?>&nbsp;đồng</p>
                        <a href="san_pham" class="btn btn-primary">Xem thêm</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
