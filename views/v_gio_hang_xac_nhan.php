<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="color: red;">
                    <h4>Phiếu mua hàng</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($ds_san_pham as $sp) : ?>
                                <tr>
                                    <td><?php echo $sp->ten_san_pham; ?></td>
                                    <td><?php echo number_format($sp->don_gia - ($sp->don_gia * $chiet_khau / 100)); ?> đồng</td>
                                    <td><?php echo $sp->so_luong; ?></td>
                                    <td><?php echo number_format($sp->so_luong * ($sp->don_gia - ($sp->don_gia * $chiet_khau / 100))); ?> đồng</td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                    <div class="d-flex justify-content-between">
                        <div >
                            <p>Số lượng sản phẩm: <?php echo count($_SESSION["giohang"]); ?></p>
                            
                        </div>
                        <div class="text-right">
							<p>Phí giao hàng: <?php echo number_format(0); ?> đồng</p>
                            <h4 class="mb-3">Tổng cộng: <?php echo number_format($tongDg + 0); ?> đồng</h4>
                        </div>
                    </div>
                </div>

                <!-- Form nhập thông tin người nhận -->
                <div class="card-footer">
                    <form action="don_hang" method="post" id="orderForm">
                        <input type="hidden" name="action" value="xac_nhan">

                        <div class="form-group">
                            <label for="ho_ten_nguoi_nhan">Họ tên người nhận:</label>
                            <input type="text" class="form-control" id="ho_ten_nguoi_nhan" name="ho_ten_nguoi_nhan" required>
                        </div>

                        <div class="form-group">
                            <label for="sdt_nguoi_nhan">Số điện thoại người nhận:</label>
                            <input type="tel" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" required>
                        </div>

                        <div class="form-group">
                            <label for="dia_diem_giao">Địa chỉ giao hàng:</label>
                            <textarea class="form-control" id="dia_diem_giao" name="dia_diem_giao" required></textarea>
                        </div>

                        <div class="form-group">
                            <label for="thoi_gian_giao">Thời gian giao hàng:</label>
                            <input type="datetime-local" class="form-control" id="thoi_gian_giao" name="thoi_gian_giao" required>
                        </div>

                        <div class="form-group">
                            <label for="ghi_chu">Ghi chú:</label>
                            <textarea class="form-control" id="ghi_chu" name="ghi_chu"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success btn-block mt-4" >ĐẶT HÀNG</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Thêm Modal xác nhận -->
<div class="modal fade" id="confirmOrderModal" tabindex="-1" role="dialog" aria-labelledby="confirmOrderModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmOrderModalLabel">Xác nhận đơn hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Cảm ơn bạn đã đặt hàng. Đơn hàng của bạn đã được xác nhận.</p>
                <p>Chúng tôi sẽ liên hệ với bạn để xác nhận thông tin và giao hàng.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" onclick="confirmOrder()">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<script>
    function confirmOrder() {
        // Thay đổi action của form để đưa đến trang xử lý khi xác nhận
        document.getElementById('orderForm').action = 'don_hang';

        // Submit form
        document.getElementById('orderForm').submit();
    }
</script>