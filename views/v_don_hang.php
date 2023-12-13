<div class="container mt-4">
<h2>Đơn hàng</h2>

    <?php
        foreach ($orderBakery as $oB) {
    ?>
    <!-- Collapse container -->
    <div class=" mt-3" >
        <div class="card card-body">

            <!-- Thông tin đơn hàng -->
            <div class = 'd-flex justify-content-between'>
                <h4>Thông tin đơn hàng</h4>
                <h4>Mã khách hàng: <strong><?php echo $oB->ma_khach_hang; ?></strong></h4>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Mã Đơn Hàng:</strong> <?php echo $oB->ma_don_hang; ?></p>
                    <p><strong>Họ Tên Người Nhận:</strong> <?php echo $oB->ho_ten_nguoi_nhan; ?></p>
                    <p><strong>Số Điện Thoại:</strong> <?php echo $oB->sdt_nguoi_nhan; ?></p>
                    <p><strong>Địa Chỉ Giao Hàng:</strong> <?php echo $oB->dia_diem_giao; ?></p>
                </div>
                <div class="col-md-6">
                    <p><strong>Ngày Đặt Hàng:</strong> <?php echo $oB->ngay_dat_hang; ?></p>
                    <p><strong>Ngày Giao Hàng:</strong> <?php echo $oB->ngay_giao_hang; ?></p>
                    <p><strong>Trạng Thái:</strong> <?php echo $this->hien_thi_trang_thai($oB->trang_thai); ?></p>
                    <p><strong>Tổng Giá:</strong> <?php echo number_format($oB->tong_gia); ?>&nbsp;đồng</p>
                </div>
            </div>
            <div><p><strong>Ghi Chú:</strong> <?php echo $oB->ghi_chu; ?></p></div>

            <div class= "d-flex flex-row-reverse">
                <!-- Button trigger collapse cho chi tiết đơn hàng -->
                <button class="btn btn-info ml-2" type="button" data-toggle="collapse" data-target="#collapseOrderDetails<?php echo $oB->ma_don_hang; ?>" aria-expanded="false" aria-controls="collapseOrderDetails<?php echo $oB->ma_don_hang; ?>">
                    Xem Chi Tiết Đơn Hàng
                </button>
                <?php
                    if (($oB->ma_don_hang != 9 || $oB->ma_don_hang != 255)
                        || (isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] == "khach" && ($oB->ma_don_hang == 1 || $oB->ma_don_hang == 2))) {
                ?>
                <form action="don_hang" method="post">
                    <input type="hidden" name="action" value="huy_don_hang">
                    <input type="hidden" name="trang_thai" value="<?php echo $oB->trang_thai; ?>">
                    <button class="btn btn-danger ml-2" type="submit">
                        Hủy
                    </button>
                </form>
                    
                <?php
                    }
                ?>
                <form action="don_hang" method="post">
                    <input type="hidden" name="action" value="thay_doi_trang_thai">
                    <input type="hidden" name="trang_thai" value="<?php echo $oB->trang_thai; ?>">
                    <button class="btn btn-success ml-2" type="submit">
                        <?php 
                            $this->hien_thi_trang_thai_btn($oB->trang_thai);
                        ?>
                    </button>
                </form>
                
            </div>

            <!-- Collapse container cho chi tiết đơn hàng -->
            <div class="collapse mt-3" id="collapseOrderDetails<?php echo $oB->ma_don_hang; ?>">
                <div class="card card-body">
                    <h4>Chi tiết đơn hàng</h4>
                    <table class="table">
                    <thead>
                        <tr>
                            <th>Mã Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Số Lượng</th>
                            <th>Đơn Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($oB->chi_tiet as $chi_tiet_dh) {
                        ?>
                        <tr>
                            <td><?php echo $chi_tiet_dh->ma_san_pham; ?></td>
                            <td><?php echo $chi_tiet_dh->ten_san_pham; ?></td>
                            <td><?php echo $chi_tiet_dh->so_luong; ?></td>
                            <td><?php echo number_format($chi_tiet_dh->don_gia); ?>&nbsp;đồng</td>
                        </tr>
                        <?php
						    }
						?>
                    </tbody>
                </table>
                </div>
            </div>

        </div>
    </div>
    <?php
        }
    ?>
</div>