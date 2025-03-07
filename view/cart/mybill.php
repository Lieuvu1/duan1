<div class="mb">
    <div class="boxtrai mr">
        <div class="row mb frmdsloai">
            <center>
                <h3 class="dn">ĐƠN HÀNG CỦA BẠN</h3>
            </center>

            <!-- Hiển thị thông báo thành công khi đơn hàng bị hủy -->
            <?php if (isset($_GET['status']) && $_GET['status'] == 'success') : ?>
                <div class="alert alert-success">
                    Đơn hàng đã được hủy thành công.
                </div>
            <?php endif; ?>

            <div class="boxcontent cart">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>MÃ ĐƠN HÀNG</th>
                            <th>NGÀY ĐẶT</th>
                            <th>SẢN PHẨM</th>
                            <th>SỐ LƯỢNG MẶT HÀNG</th>
                            <th>TỔNG GIÁ TRỊ ĐƠN HÀNG</th>
                            <th>TÌNH TRẠNG ĐƠN</th>
                            <th>TÌNH TRẠNG THANH TOÁN</th>
                            <th>HÀNH ĐỘNG</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $listbill = loadall_bill();  // Lấy tất cả các đơn hàng từ CSDL
                    if (is_array($listbill) && count($listbill) > 0) {
                        foreach ($listbill as $bill) {
                            $xoabill = "index.php?act=xoabill&id=" . $bill['id'];
                            extract($bill);

                            // Get status and payment status
                            $ttdh = get_ttdh($bill['bill_status']);
                            $tttt = get_tttt($bill['bill_thanhtoan']);
                            // Get total number of items for this bill
                            $countsp = loadall_cart_count($bill['id']);
                            
                            // Load product names for the bill
                            $products = load_products_by_bill($bill['id']);
                            $productNames = array_map(function($product) {
                                return $product['name'];
                            }, $products);
                            $productList = implode(', ', $productNames);

                            echo '<tr>
                                    <td>DA1-' . htmlspecialchars($bill['id']) . '</td>
                                    <td>' . htmlspecialchars($bill['ngaydathang'] ?? '', ENT_QUOTES, 'UTF-8') . '</td>
                                    <td>' . htmlspecialchars($productList, ENT_QUOTES, 'UTF-8') . '</td>
                                    <td>' . htmlspecialchars($countsp ?? '', ENT_QUOTES, 'UTF-8') . '</td>
                                    <td>' . htmlspecialchars($bill['total'] ?? '', ENT_QUOTES, 'UTF-8') . ' USD</td>
                                    <td>' . htmlspecialchars($ttdh ?? '', ENT_QUOTES, 'UTF-8') . '</td>
                                    <td>' . htmlspecialchars($tttt ?? '', ENT_QUOTES, 'UTF-8') . '</td>
                                    <td>';

                            // Only allow cancellation if the status is not "Delivered" or "Completed"
                            if ($bill['bill_status'] != '2' && $bill['bill_status'] != '3' && $bill['bill_status'] != '4') {
                                echo '<a href="' . $xoabill . '" onclick="return confirm(\'Bạn có chắc chắn muốn hủy đơn hàng?\')">
                                        <button class="btn btn-danger btn-sm">Hủy Đơn</button>
                                      </a>';
                            } else {
                                echo htmlspecialchars(get_ttdh($bill['bill_status']), ENT_QUOTES, 'UTF-8'); // Hiển thị trạng thái
                            }
                            

                            echo '</td>
                                </tr>';
                        }
                    } else {
                        echo '<tr><td colspan="8" class="text-center">Bạn chưa có đơn hàng nào.</td></tr>';
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
