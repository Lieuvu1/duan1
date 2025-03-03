<!-- Deal End -->


<!-- Feature Start -->



<!-- How To Use Start -->

<!-- How To Use End -->


<!-- Product Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-primary mb-3"><span class="fw-light text-dark">Sản phẩm mới</span> cấu hình cực khủng</h1>
            <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis aliquet, erat non malesuada consequat, nibh erat tempus risus.</p>
        </div>
        <div class="row g-4">

            <?php
            $i = 0;
            foreach ($spnew as $sp) {
                extract($sp);
                $hinh = $imgpath . $img;
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                if (($i == 2) || ($i == 5) || ($i == 8) || ($i == 11)) {
                    $mr = "";
                } else {
                    $mr = "margin_right";
                }
                echo '
            <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.5s">
                    <div class="product-item text-center border h-100 p-4">
                        <img class="img-fluid mb-4" src="' . $hinh . '" alt="">
                        <a href="' . $linksp . '" class="h6 d-inline-block mb-2">' . $name . '</a>
                        <h5 class="text-primary mb-3">' . $price . ' USD</h5>
                        <a href="' . $linksp . '" class="btn btn-outline-primary px-3">Add To Cart</a>
                    </div>
                </div>

';
            }

            ?>

        </div>
    </div>
</div>
<!-- Product End -->

<!-- Top 10 Yêu Thích Section Start -->
<div class="container-fluid py-5 bg-light">
    <div class="container">
        <div class="text-center mb-5">
            <h2 class="text-primary mb-3"><span class="fw-light text-dark">TOP 10</span> YÊU THÍCH</h2>
            <p class="mb-4">Khám phá những sản phẩm được yêu thích nhất từ khách hàng của chúng tôi.</p>
        </div>
        <div class="row g-4">
            <?php
            foreach ($dstop10 as $sp) {
                extract($sp);
                $linksp = "index.php?act=sanphamct&idsp=" . $id;
                $img = $imgpath . $img;
                echo '
                <div class="col-md-6 col-lg-3 wow fadeIn" data-wow-delay="0.1s">
                    <div class="product-item text-center border h-100 p-4">
                        <img class="img-fluid mb-3" src="' . $img . '" alt="' . $name . '">
                        <a href="' . $linksp . '" class="h6 text-decoration-none d-inline-block mb-2 text-dark">' . $name . '</a>
                        <h5 class="text-primary mb-3">' . $price . ' USD</h5>
                        <a href="' . $linksp . '" class="btn btn-outline-primary px-3">Mua Ngay</a>
                    </div>
                </div>';
            }
            ?>
        </div>
    </div>
</div>
<!-- Top 10 Yêu Thích Section End -->

<!-- Testimonial Start -->

<!-- Testimonial End -->


<!-- Blog Start -->

<!-- Blog End -->


<!-- Newsletter Start -->
<div class="container-fluid newsletter bg-primary py-5 my-5">
    <div class="container py-5">
        <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 600px;">
            <h1 class="text-white mb-3"><span class="fw-light text-dark">Let's Subscribe</span> The Newsletter</h1>
            <p class="text-white mb-4">Subscribe now to get 30% discount on any of our products</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-7 wow fadeIn" data-wow-delay="0.5s">
                <div class="position-relative w-100 mt-3 mb-2">
                    <input class="form-control w-100 py-4 ps-4 pe-5" type="text" name="kyw" placeholder="Tìm kiếm"
                        style="height: 48px;">
                    <button type="submit" name="timKiem" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i
                            class="fa fa-paper-plane text-white fs-4"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter End -->


<!-- Footer Start -->