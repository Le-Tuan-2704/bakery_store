<div>

    <h1 class="mt-4 mb-4">Quản lý đơn hàng</h1>

    <!-- Đơn hàng chờ xác nhận -->
    <div>
        <h2>Đơn hàng chờ xác nhận (1)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Đơn hàng</th>
                    <th>Chi tiết đơn hàng</th>
                    <th>Xác nhận đơn</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderBakery as $order) : ?>
                    <?php if ($order['trang_thai'] == 'Chờ xác nhận') : ?>
                        <tr>
                            <td><?= $order['ma_don_hang']; ?></td>
                            <td><?= $order['chi_tiet_don_hang']; ?></td>
                            <td><button class="btn btn-primary" onclick="confirmOrder(<?= $order['ma_don_hang']; ?>)">Xác nhận</button></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Đơn hàng đang thực hiện -->
    <div>
        <h2>Đơn hàng đang thực hiện (2)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Đơn hàng</th>
                    <th>Chi tiết đơn hàng</th>
                    <th>Xác nhận xong</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderBakery as $order) : ?>
                    <?php if ($order['trang_thai'] == 'Đang thực hiện') : ?>
                        <tr>
                            <td><?= $order['ma_don_hang']; ?></td>
                            <td><?= $order['chi_tiet_don_hang']; ?></td>
                            <td><button class="btn btn-success" onclick="completeOrder(<?= $order['ma_don_hang']; ?>)">Hoàn thành</button></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Đơn hàng đã giao và hoàn tất -->
    <div>
        <h2>Đơn hàng đã giao và hoàn tất (3)</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID Đơn hàng</th>
                    <th>Chi tiết đơn hàng</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($orderBakery as $order) : ?>
                    <?php if ($order['trang_thai'] == 'Đã giao và hoàn tất') : ?>
                        <tr>
                            <td><?= $order['ma_don_hang']; ?></td>
                            <td><?= $order['chi_tiet_don_hang']; ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        function confirmOrder(orderId) {
            // Xử lý xác nhận đơn hàng
            alert('Xác nhận đơn hàng ' + orderId);
        }

        function completeOrder(orderId) {
            // Xử lý hoàn thành đơn hàng
            alert('Hoàn thành đơn hàng ' + orderId);
        }
    </script>

</div>