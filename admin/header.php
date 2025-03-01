<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Elegant Sidebar Menu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
    <style>
        /* Sidebar styling */
        .sidebar {
            width: 250px;
            background-color: #fff7f0;
            padding: 20px;
            border-radius: 0 15px 15px 0;
            /* Rounded corners on right only */
            position: fixed;
            /* Fixed to the left of the viewport */
            top: 0;
            left: 0;
            height: 100vh;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar .logo img {
            height: 50px;
            margin-bottom: 20px;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #6c757d;
            padding: 10px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #ff7e3c;
            color: #fff;
        }

        .sidebar .nav-link.active i {
            color: #fff;
        }

        .sidebar .nav-link i {
            font-size: 18px;
            color: #6c757d;
        }

        /* Adjust main content to start after the sidebar */
        .content {
            margin-left: 250px;
            /* Same width as sidebar */
            padding: 20px;
        }
    </style>
</head>

<body style="background-color: #fff3e6;">

    <div class="sidebar">
        <!-- Logo section -->
        <div class="logo text-center">
            <img src="../upload/logo2.png" alt="Logo">
        </div>

        <!-- Menu items -->
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="index.php?act=index" class="nav-link active">
                    <i class="bi bi-house-door"></i> Trang chủ
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?act=adddm" class="nav-link">
                    <i class="bi bi-card-list"></i> Quản lý danh mục
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?act=addsp" class="nav-link">
                    <i class="bi bi-app-indicator"></i> Quản lý sản phẩm
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?act=dsbl" class="nav-link">
                    <i class="bi bi-basket"></i>Quản lý bình luận
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?act=dskh" class="nav-link">
                    <i class="bi bi-shield-lock"></i> Quản lý tài khoản
                </a>
            </li>
            <li class="nav-item">
                <a href="index.php?act=listbill" class="nav-link">
                    <i class="bi bi-bell"></i> Quản lý đơn hàng
                </a>
            </li>
            <li class="nav-item">
                <a href="http://localhost/duan1/duan12025/index.php" class="nav-link">
                    <i class="bi bi-bell"></i> Trở về trang người dùng
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div class="content">
        <h1>Dashboard</h1>
        <p>Welcome to the Dashboard!</p>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>