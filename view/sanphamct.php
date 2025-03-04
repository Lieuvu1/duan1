<div class="container product-detail py-5">
    <?php
    // Dữ liệu sản phẩm (thông qua biến PHP)
    $img = $imgpath . $img; // Đảm bảo đường dẫn ảnh đúng
    // Hiển thị nội dung HTML với dữ liệu động
    echo '
    <div class="row">
        <!-- Product Images -->
        <div class="col-lg-6">
            <div class="product-images">
                <img id="main-image" src="' . $img . '" alt="Main Product Image" class="img-fluid mb-3">
            </div>
        </div>

        <!-- Product Details -->
        <div class="col-lg-6">
            <h2 class="product-title">' . $name . '</h2>
     
            <div class="rating mb-3">
                <span>⭐⭐⭐⭐⭐</span> <span>(0 đánh giá)</span>
            </div>
            <h3 class="price text-danger">' . $price . ' USD</h3>

            <!-- Tabs -->
        

            <!-- Form để thêm vào giỏ hàng -->
            <form action="index.php?act=addtocart" method="post">
                ';

                // Kiểm tra người dùng đã đăng nhập chưa
                if (isset($_SESSION['user'])) {
                    echo '
                    <input type="hidden" name="id" value="' . $id . '">
                    <input type="hidden" name="name" value="' . $name . '">
                    <input type="hidden" name="img" value="' . $img . '">
                    <input type="hidden" name="price" value="' . $price . '"> 

                    <!-- Quantity Selector -->
                    <div class="quantity-selector mb-4">
                        <label for="quantity">Số lượng:</label>
                        <div class="d-flex align-items-center">
                            <input type="number" id="quantity" name="soluong" value="1" min="1" class="form-control text-center mx-2" style="width: 60px;">
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="action-buttons">
                        <input type="submit" class="btn btn-primary px-4 me-3" name="addtocart" value="Thêm vào giỏ hàng">
                    </div>
                       <div class="product-tabs mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#description" class="nav-link active" data-bs-toggle="tab">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a href="#details" class="nav-link" data-bs-toggle="tab">CHI TIẾT SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a href="#care" class="nav-link" data-bs-toggle="tab">BẢO QUẢN</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div id="description" class="tab-pane fade show active">
                        <p>' . $mota . '</p>
                    </div>
                    <div id="details" class="tab-pane fade">
                        <p>Chi tiết sản phẩm sẽ hiển thị ở đây.</p>
                    </div>
                    <div id="care" class="tab-pane fade">
                        <p>Hướng dẫn bảo quản sẽ hiển thị ở đây.</p>
                    </div>
                </div>
            </div> 
                    ';
                    
                } else {
                    echo '<h1>Bạn cần đăng nhập để thêm giỏ hàng!</h1>
                        <div class="product-tabs mt-5">
                <ul class="nav nav-tabs">
                    <li class="nav-item">
                        <a href="#description" class="nav-link active" data-bs-toggle="tab">GIỚI THIỆU</a>
                    </li>
                    <li class="nav-item">
                        <a href="#details" class="nav-link" data-bs-toggle="tab">CHI TIẾT SẢN PHẨM</a>
                    </li>
                    <li class="nav-item">
                        <a href="#care" class="nav-link" data-bs-toggle="tab">BẢO QUẢN</a>
                    </li>
                </ul>
                <div class="tab-content mt-3">
                    <div id="description" class="tab-pane fade show active">
                        <p>' . $mota . '</p>
                    </div>
                    <div id="details" class="tab-pane fade">
                        <p>Chi tiết sản phẩm sẽ hiển thị ở đây.</p>
                    </div>
                    <div id="care" class="tab-pane fade">
                        <p>Hướng dẫn bảo quản sẽ hiển thị ở đây.</p>
                    </div>
                </div>
            </div>';
                }
                
                echo '</form>';
            echo '
        </div>
    </div>
    ';
    ?>
</div>
<!-- Comment Section -->
<div class="comment-section">
    <h3>Đánh giá sản phẩm</h3>
    <div class="comment">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#binhluan").load("view/binhluan/binhluanform.php", {idpro: <?= $id ?>});
            });
        </script>
        <div class="comment" id="binhluan">
            <iframe src="view/binhluan/binhluanform.php?idpro=<?= $id ?>" frameborder="0" width="100%" height="300px"></iframe>
        </div>
    </div>
</div>

<!-- Related Products Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <h2 class="text-center text-primary mb-4"><span class="fw-light text-dark">Sản Phẩm</span> Cùng Loại</h2>
        <div class="row g-4">
            <?php
            $i = 0;
            foreach ($sp_cung_loai as $sp_cung_loai) {
                extract($sp_cung_loai);
                $img = $imgpath . $img;
                $linksp = "index.php?act=sanphamct&idsp=" . $id;

                echo '
                <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                    <div class="related-product-item border h-100 p-3 text-center">
                        <a href="' . $linksp . '">
                            <img src="' . $img . '" alt="' . $name . '" class="img-fluid mb-3" style="height: 200px; object-fit: cover;">
                        </a>
                        <h6 class="related-product-name mb-2">
                            <a href="' . $linksp . '" class="text-dark text-decoration-none">' . $name . '</a>
                        </h6>
                        <div class="related-product-price text-danger fw-bold">' . $price . ' USD</div>
                        <a href="' . $linksp . '" class="btn btn-outline-primary mt-3">Xem Chi Tiết</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Related Products Section End -->

