<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hairnic - Single Product Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500&family=Poppins:wght@200;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->

    <link href="template/lib/animate/animate.min.css" rel="stylesheet">

    <link href="template/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="template/css/bootstrap.min.css" rel="stylesheet">


    <!-- Template Stylesheet -->
    <link href="template/css/style.css" rel="stylesheet">
    <script>
        // Cập nhật tổng tiền của sản phẩm khi số lượng thay đổi
        function updateTotal(price, quantityInput) {
            var quantity = quantityInput.value;
            var total = price * quantity;

            // Tìm phần tử td chứa tổng thành tiền và cập nhật giá trị
            var totalElement = document.getElementById('total_' + quantityInput.id.split('_')[1]);
            if (totalElement) {
                totalElement.textContent = total + ' USD';

                // Cập nhật tổng giỏ hàng
                updateGrandTotal();

                // Gửi yêu cầu AJAX để cập nhật session
                updateSession(quantityInput.id.split('_')[1], quantity);
            } else {
                console.error('Total element not found.');
            }
        }

        // Cập nhật tổng tiền của tất cả sản phẩm trong giỏ hàng
        function updateGrandTotal() {
            var grandTotal = 0;

            // Lặp qua các hàng trong bảng giỏ hàng
            var table = document.getElementById('cartTable');
            var rows = table.getElementsByTagName('tr');
            for (var i = 1; i < rows.length - 1; i++) { // Bắt đầu từ 1 để tránh hàng tiêu đề và kết thúc trước hàng tổng đơn hàng
                var totalElement = rows[i].getElementsByTagName('td')[4]; // Cột chứa tổng thành tiền
                if (totalElement) {
                    var total = parseFloat(totalElement.textContent.replace(' USD', ''));

                    grandTotal += total;
                } else {
                    console.error('Total element not found in row ' + i);
                }
            }

            // Cập nhật tổng đơn hàng
            var grandTotalElement = document.getElementById('grandTotal');
            if (grandTotalElement) {
                grandTotalElement.textContent = grandTotal + ' USD';
            } else {
                console.error('Grand total element not found.');
            }
        }

        // Gửi yêu cầu AJAX để cập nhật session
        function updateSession(productId, quantity) {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4) {
                    if (this.status == 200) {
                        // Xử lý kết quả nếu cần
                        console.log('Session updated successfully.');
                    } else {
                        console.error('Error updating session.');
                    }
                }
            };

            // Tạo URL chứa tham số id và quantity (cập nhật URL chính xác)
            var url = 'update_session.php?id=' + productId + '&soluong=' + quantity;

            // Gửi yêu cầu AJAX với URL đúng
            xhttp.open("GET", url, true);
            xhttp.send();
        }
    </script>
</head>

<body>
    <!-- Spinner Start -->

    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid sticky-top">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light p-0">
                <a href="index.php" class="navbar-brand">
                    <h2 class="text-white">F99</h2>
                </a>
                <button type="button" class="navbar-toggler ms-auto me-0" data-bs-toggle="collapse"
                    data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                        <a href="index.php" class="nav-item nav-link active">Trang chính</a>
                        <a href="index.php?act=sanpham" class="nav-item nav-link">Sản phẩm</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Các mục</a>
                            <div class="dropdown-menu bg-light mt-2">
                                <a href="feature.php" class="dropdown-item">Features</a>
                                <a href="how-to-use.php" class="dropdown-item">How To Use</a>
                                <a href="testimonial.php" class="dropdown-item">Testimonial</a>
                                <a href="blog.php" class="dropdown-item">Blog Articles</a>
                                <a href="404.php" class="dropdown-item">404 Page</a>
                            </div>
                        </div>


                    </div>
                    <form action="index.php?act=sanpham" method="post" class="form">
                        <div class="input-group mb-1">
                            <input type="text" name="kyw" required class="form-control" placeholder="Nhập từ khóa">
                            <button type="submit" name="timkiem" class="btn btn-primary">Tìm kiếm</button>
                        </div>
                    </form>
                    <a href="index.php?act=addtocart" class="btn btn-primary py-2 px-4 d-none d-lg-inline-block ms-3 ">Giỏ hàng</a>
                    <div class="iconadmin ms-3"><a href="index.php?act=dangnhap"><svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" viewBox="0 0 24 24" style="fill: rgba(0, 0, 0, 1);transform: ;msFilter:;">
                                <path d="M12 2C6.579 2 2 6.579 2 12s4.579 10 10 10 10-4.579 10-10S17.421 2 12 2zm0 5c1.727 0 3 1.272 3 3s-1.273 3-3 3c-1.726 0-3-1.272-3
                    -3s1.274-3 3-3zm-5.106 9.772c.897-1.32 2.393-2.2 4.106-2.2h2c1.714 0 3.209.88 4.106 2.2C15.828 18.14 14.015 19 12 19s-3.828-.86-5.106-2.228z"></path>
                            </svg></a></div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary hero-header mb-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 text-center text-lg-start">
                    <h3 class="fw-light text-white animated slideInRight">Giá rẻ & Ở đây</h3>
                    <h1 class="display-4 text-white animated slideInRight">Laptop<span class="fw-light text-dark">Giảm giá </span> Cực Sâu</h1>
                    <p class="text-white mb-4 animated slideInRight">Kể từ khi ra đời lần đầu tiên cách đây hơn 40 năm bởi Osborne Computer, chiếc laptop đã không ngừng được các hãng sản xuất cải tiến cả về ngoại hình và công nghệ. Đến nay, nó đã trở thành một trong những thiết bị điện tử không thể thiếu phục vụ cho nhiều mục đích như công việc, học tập và giải trí.</p>
                    <a href="index.php?act=addtocart" class="btn btn-dark py-2 px-4 me-3 animated slideInRight">Giỏ hàng của bạn</a>
                    <a href="" class="btn btn-outline-dark py-2 px-4 animated slideInRight">Contact Us</a>
                </div>
                <div class="col-lg-6">
                    <img class="img-fluid animated pulse infinite" src="../upload/dell1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Feature Start -->