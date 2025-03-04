<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="text-success">Cảm ơn quý khách đã đặt hàng</h2>
    </div>

    <?php if (isset($bill) && is_array($bill)) : extract($bill); endif; ?>

    <!-- Order Information -->
    <div class="card mb-4">
        <div class="card-body text-center">
            <ul class="list-unstyled">
                <li><strong>Mã đơn hàng:</strong> DA-<?= $bill['id']; ?></li>
                <li><strong>Ngày đặt hàng:</strong> <?= $bill['ngaydathang']; ?></li>
                <li><strong>Tổng số tiền đơn hàng:</strong> <?= $bill['total']; ?> USD</li>
                <li><strong>Phương thức thanh toán:</strong> <?= $bill['bill_pttt']; ?></li>
            </ul>
        </div>
    </div>

    <!-- Customer Information -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Thông tin đặt hàng</div>
        <div class="card-body">
            <table class="table table-striped">
                <tr>
                    <th>Người đặt hàng:</th>
                    <td><?= $bill['bill_name']; ?></td>
                </tr>
                <tr>
                    <th>Địa chỉ:</th>
                    <td><?= $bill['bill_address']; ?></td>
                </tr>
                <tr>
                    <th>Email:</th>
                    <td><?= $bill['bill_email']; ?></td>
                </tr>
                <tr>
                    <th>Điện thoại:</th>
                    <td><?= $bill['bill_tel']; ?></td>
                </tr>
            </table>
        </div>
    </div>

    <!-- Cart Details -->
    <div class="card mb-4">
        <div class="card-header bg-secondary text-white">Chi tiết giỏ hàng</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>Hình</th>
                        <th>Sản phẩm</th>
                        <th>Đơn giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    <?php bill_chi_tiet($billct); ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Back to Home Button -->
    <div class="text-center">
        <a href="index.php" class="btn btn-success">Trở về trang chủ</a>
    </div>
</div>
