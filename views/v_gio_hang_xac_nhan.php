<div class="check-sec">
    <div class="cart-total">
		<?php
		if (!empty($ds_san_pham)) {
		?>
			<div class="price-details">
				<h4 style="color:red" class="text-center mb-4">Phiếu mua hàng</h4>
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
						<?php
						foreach ($ds_san_pham as $sp) {
						?>
							<tr>
								<td><?php echo $sp->ten_san_pham; ?></td>
								<td><?php echo number_format($sp->don_gia - ($sp->don_gia * $chiet_khau / 100)); ?> đồng</td>
								<td><?php echo $sp->so_luong; ?></td>
								<td><?php echo number_format($sp->so_luong * ($sp->don_gia - ($sp->don_gia * $chiet_khau / 100))); ?> đồng</td>
							</tr>
						<?php
						}
						?>
					</tbody>
				</table>
				<div class="d-flex justify-content-between">
					<div style="width = 100px;">
						<span>Số lượng sản phẩm: <?php echo count($_SESSION["giohang"]); ?></span>
						<span>Phí giao hàng: 0</span>
					</div>
					<div class="text-right">
						<h4 class="mb-3">Tổng cộng: <?php echo number_format($tongDg); ?> đồng</h4>
					</div>
				</div>
			</div>
				<form action="don_hang" method="post">
					<!-- Trường ẩn action -->
    				<input type="hidden" name="action" value="xac_nhan">
					<!-- Nút submit -->
					<button type="submit" class="btn btn-success btn-block mt-4">ĐẶT HÀNG</button>
				</form>
				
		<?php
			}
		?>
	</div>

    <div class="clearfix"> </div>
</div>