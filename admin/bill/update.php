<style>
    /* Title styling */
    .formtitle h1 {
        font-size: 24px;
        font-weight: bold;
        color: black;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Form container styling */
    .formcontent {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Form input and label styling */
    input[type="text"], select {
        width: 100%;
        padding: 10px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ddd;
        border-radius: 4px;
        box-sizing: border-box;
        font-size: 16px;
    }

    /* Submit button styling */
    input[type="submit"] {
        width: 100%;
        background-color: #435ebe;  /* Màu xanh đậm giống phần danh sách */
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #3a4fb1;  /* Hover xanh đậm hơn một chút */
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th, table td {
        padding: 12px 15px;
        text-align: center;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
    }

    table th {
        background-color: #435ebe;  /* Cùng màu với phần danh sách */
        color: white;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    /* Button inside table */
    table input[type="button"] {
        padding: 5px 10px;
        background-color: #435ebe;  /* Đồng màu với bảng */
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    table input[type="button"]:hover {
        background-color: #3a4fb1;  /* Hover nút bấm */
    }

    /* Margin between elements */
    .row.margin10 {
        margin-bottom: 15px;
    }
</style>

<div class="row">
    <div class="row formtitle">
        <h1>CẬP NHẬT ĐƠN HÀNG</h1>
    </div>
    <div class="row formcontent">
        <form action="index.php?act=updatedh&id=<?php echo $donhang['id'] ?>" method="post" enctype="multipart/form-data">
            <div class="row margin10">
                <label>Mã đơn hàng</label><br>
                <input type="hidden" name="id" value="<?=$donhang['id']?>">
                <input type="text" readonly name="id" value="<?=$donhang['id']?>">

                <label>Khách hàng</label><br>
                <input type="text" readonly name="bill_name" value="<?=$donhang['bill_name']?>">

                <!-- Trạng thái đơn hàng -->
                <label>Trạng thái đơn hàng</label><br>
                <select name="bill_status">
                    <?php
                        $statusOptions = [
                            0 => 'Đơn hàng mới',
                            1 => 'Đang chuẩn bị',
                            2 => 'Đang giao hàng',
                            3 => 'Giao hàng thành công'
                        ];

                        // Only display the current status and future statuses
                        foreach ($statusOptions as $key => $label) {
                            if ($key >= $donhang['bill_status']) {
                                $selected = ($donhang['bill_status'] == $key) ? 'selected' : '';
                                echo "<option value=\"$key\" $selected>$label</option>";
                            }
                        }
                    ?>
                </select>

                <!-- Trạng thái thanh toán -->
                <br><label>Trạng thái thanh toán</label><br>
                <select name="bill_thanhtoan">
                    <?php
                        $paymentOptions = [
                            0 => 'Chưa thanh toán',
                            1 => 'Đã thanh toán',
                        ];

                        // Display options based on current bill payment status
                        foreach ($paymentOptions as $key => $label) {
                            if ($donhang['bill_thanhtoan'] <= $key) {
                                $selected = ($donhang['bill_thanhtoan'] == $key) ? 'selected' : '';
                                echo "<option value=\"$key\" $selected>$label</option>";
                            }
                        }
                    ?>
                </select>
            </div>

            <div class="row formcontent">
                <div class="row margin10 formdsloai">
                    <table>
                        <tr>
                            <th>HÌNH ẢNH</th>
                            <th>TÊN SẢN PHẨM</th>
                            <th>ĐƠN GIÁ</th>
                            <th>SỐ LƯỢNG</th>
                            <th>THÀNH TIỀN</th>
                        </tr>
                        <?php foreach($dt_bill as $bill): ?>
                        <tr>
                            <td><img width="80px" src="../<?php echo $bill['img'] ?>" alt=""></td>
                            <td><?php echo $bill['name'] ?></td>
                            <td><?php echo $bill['price'] ?></td>
                            <td><?php echo $bill['soluong'] ?></td>
                            <td><?php echo $bill['price'] * $bill['soluong'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>

            <div class="row margin10">
                <input type="submit" name="capnhat" value="CẬP NHẬT">
            </div>
            <?php if(isset($thongbao) && $thongbao != "") echo $thongbao; ?>
        </form>
    </div>
</div>
