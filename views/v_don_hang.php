<div class="container mt-4">
    <h1>Đơn hàng</h1>
    <br>
    <form action="don_hang.php" method="get" id="searchForm">
        <input type="hidden" class="form-control" name="action" value="search">
        <div class="row mb-3">
            <div class="col-md-2">
                <input type="text" class="form-control" name="searchMaDonHang" placeholder="Mã đơn hàng">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="searchTenKhachHang" placeholder="Tên khách hàng">
            </div>
            <div class="col-md-2">
                <input type="text" class="form-control" name="searchMaKhachHang" placeholder="Mã khách hàng">
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" name="searchThoiGianDat" placeholder="Thời gian đặt">
            </div>
            <div class="col-md-2">
                <input type="date" class="form-control" name="searchThoiGianGiao" placeholder="Thời gian giao">
            </div>
            <div class="col-md-2">
                <select class="form-control" name="searchStatusDropdown">
                    <option value="0">none</option>
                    <option value="1">Chưa nhận đơn</option>
                    <option value="2">Nhận đơn</option>
                    <option value="3">Đang làm</option>
                    <option value="5">Đã giao</option>
                    <option value="9">Hủy</option>
                    <option value="255">Thành đơn</option>
                </select>
            </div>
            
        </div>
        <div class="row mb-3">
            <div class="col-md-2">
                <button class="btn btn-primary" type="submit" id="btnSearch">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <?php
        foreach ($orderBakery as $oB) {
    ?>
    <!-- Collapse container -->
    <div class="mt-3" id = "ma_don_hang_<?php echo $oB->ma_khach_hang; ?>">
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
                    Xem chi tiết
                </button>

                <?php
                    if (($oB->trang_thai != 9 && $oB->trang_thai != 255)
                        || (isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] == "khach" && ($oB->trang_thai == 1 || $oB->trang_thai == 2))) {
                ?>

                <button class="btn btn-danger ml-2 btnChangeStatus"
                        data-action-don-hang = "huy_don_hang"
                        data-ma-don-hang="<?php echo $oB->ma_don_hang; ?>"
                        data-trang-thai="<?php echo $oB->trang_thai; ?>"
                >
                    Hủy
                </button>
                <?php
                    }
                ?>

                <!-- Thay đổi form thành một button với data attributes -->
                <button class="btn btn-success ml-2 btnChangeStatus" 
                        data-ma-don-hang="<?php echo $oB->ma_don_hang; ?>"
                        data-action-don-hang = "thay_doi_trang_thai"
                        data-trang-thai="<?php echo $oB->trang_thai; ?>"
                        <?php if(isset($_SESSION["vai_tro"]) && $_SESSION["vai_tro"] == "khach" || ($oB->trang_thai == 9 || $oB->trang_thai == 255) ) {echo "disabled";} ?>>
                    <?php $this->hien_thi_trang_thai_btn($oB->trang_thai); ?>
                </button>
                
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

    <!-- danh sach -->
    <div class="clearfix mt-4">
        <ul class="pagination justify-content-center">
            <?php echo $lst; ?>
        </ul>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmModalLabel">Xác nhận thay đổi trạng thái</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Bạn có chắc chắn muốn thay đổi trạng thái không?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="confirmChangeStatus">Xác nhận</button>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var maDonHang, trangThai, actionDonHang;

        $('.btnChangeStatus').on('click', function() {
            actionDonHang = $(this).data('action-don-hang');
            maDonHang = $(this).data('ma-don-hang');
            trangThai = $(this).data('trang-thai');

            // Hiển thị modal
            $('#confirmModal').modal('show');
        });

        $('#confirmChangeStatus').on('click', function() {
            // Ẩn modal
            $('#confirmModal').modal('hide');

            // Gửi yêu cầu Ajax
            $.ajax({
                type: 'POST',
                url: '/bakery_store/don_hang',
                data: {
                    ma_don_hang: maDonHang,
                    action: actionDonHang,
                    trang_thai: trangThai
                },
                success: function(response) {
                    // Xử lý phản hồi từ server (nếu cần)
                    console.log(JSON.parse(response));
                    // console.log(response);

                    // Cập nhật trạng thái trang
                    $('#ma_don_hang_' + maDonHang).load(location.href + ' #ma_don_hang_' + maDonHang);
                },
                error: function(error) {
                    // Xử lý lỗi (nếu có)
                    console.error('Error:', error);
                }
            });
        });
    });
</script>
