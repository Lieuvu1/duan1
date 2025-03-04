<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb frmdsloai">
            <center><h1 class="dn">GIỎ HÀNG</h1></center>
            <div class="boxcontent cart">
                <style>
                    #cartTable img {
                        height: 100px;
                        width: auto;
                    }

                    /* Style the button group for a polished look */
                    .btn-group-custom {
                        display: flex;
                        justify-content: center;
                        gap: 15px;
                        margin-top: 20px;
                    }

                    .btn-custom {
                        padding: 12px 24px;
                        font-size: 16px;
                        font-weight: bold;
                        border-radius: 30px;
                        transition: all 0.3s ease;
                    }

                    .btn-custom:hover {
                        transform: scale(1.05);
                    }

                    /* Colors for buttons */
                    .btn-order {
                        background-color: #4caf50;
                        color: white;
                        border: none;
                    }

                    .btn-order:hover {
                        background-color: #45a049;
                    }

                    .btn-clear {
                        background-color: #f44336;
                        color: white;
                        border: none;
                    }

                    .btn-clear:hover {
                        background-color: #e53935;
                    }

                    .btn-shop {
                        background-color: #2196f3;
                        color: white;
                        border: none;
                    }

                    .btn-shop:hover {
                        background-color: #1e88e5;
                    }
                </style>

                <table id="cartTable">
                    <?php
                        viewcart(1);
                    ?>
                </table>
            </div>
        </div>
        <div class="row mb">
            <div class="btn-group-custom">
                <a href="index.php?act=bill" class="btn btn-custom btn-order">TIẾP TỤC ĐẶT HÀNG</a>
                <a href="index.php?act=delcart" class="btn btn-custom btn-clear">XOÁ TẤT CẢ SẢN PHẨM TRÊN GIỎ HÀNG</a>
                <a href="index.php?act=sanpham" class="btn btn-custom btn-shop">TIẾP TỤC MUA SẮM</a>
            </div>
        </div>
    </div>
</div>
