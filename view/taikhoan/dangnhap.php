<style>
    .custom-auth {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
        margin: 0;
    }

    .form-container {
        display: flex;
        width: 900px;
        height: 500px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
    }

    .sign-in,
    .sign-up {
        flex: 1;
        padding: 40px 30px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }

    .sign-in {
        background-color: #fff;
        text-align: center;
    }

    .sign-up {
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        color: #fff;
        text-align: center;
        justify-content: flex-start;
    }

    h2 {
        font-size: 24px;
        margin-bottom: 20px;
    }

    .form-container input {
        margin-bottom: 15px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
        width: 100%;
        box-sizing: border-box;
    }

    .form-container button {
        border-radius: 5px;
        padding: 12px;
        width: 100%;
        margin-top: 15px;
        background-color: #ff4b2b;
        border: none;
        color: #fff;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .form-container button:hover {
        background-color: #ff416c;
    }

    .social-icons {
        display: flex;
        justify-content: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .social-icons a {
        display: inline-block;
        width: 40px;
        height: 40px;
        line-height: 40px;
        border-radius: 50%;
        background-color: #f8f9fa;
        color: #555;
        text-align: center;
        font-size: 18px;
        text-decoration: none;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        transition: background-color 0.3s ease;
    }

    .social-icons a:hover {
        background-color: #ddd;
    }

    .text-muted {
        font-size: 14px;
        color: #6c757d;
    }

    .trangquantri {
        background-color: #fff;
        padding: 40px;
        border-radius: 10px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 900px;
        margin: 20px auto;
        text-align: center;
    }

    .dn {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
        color: #333;
    }

    .thongtinadmin {
        font-size: 18px;
        margin-top: 20px;
    }

    .qmk {
        margin: 10px 0;
    }

    .qmk a {
        font-size: 16px;
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .qmk a:hover {
        color: #0056b3;
    }

    .qmk1 {
        font-size: 16px;
        margin-top: 20px;
    }

    .qmk1 a {
        text-decoration: none;
        color: #007bff;
        transition: color 0.3s ease;
    }

    .qmk1 a:hover {
        color: #0056b3;
    }

    .thongtinadmin .qmk {
        font-size: 16px;
    }

    /* Hover effect for section links */
    .thongtinadmin a {
        font-size: 16px;
        text-decoration: none;
        color: #007bff;
        padding: 5px 0;
        border-bottom: 1px solid transparent;
        transition: all 0.3s ease;
    }

    .thongtinadmin a:hover {
        border-color: #007bff;
        color: #0056b3;
    }

    /* Styling for user account info */
    .thongtinadmin {
        background-color: #f8f9fa;
        padding: 15px;
        border-radius: 5px;
        margin-top: 20px;
    }

    .thongtinadmin .qmk1 {
        font-size: 16px;
        text-align: center;
    }
</style>


<div class="custom-auth">
    <div class="form-container">
        <?php
        // Kiểm tra xem người dùng đã đăng nhập hay chưa
        if (isset($_SESSION['user']) && is_array($_SESSION['user'])) {
            extract($_SESSION['user']); // Chỉ gọi extract nếu là mảng
        ?>
            <div class="trangquantri">
                <div class="dn">
                    Xin chào <?= htmlspecialchars($user) ?><br>
                </div>

                <div class="thongtinadmin">
                    <div class="qmk"><a href="index.php?act=doimatkhau">Đổi mật khẩu</a><br></div>
                    <?php if (!isset($role) || $role != 1) { ?>
                        <div class="qmk"><a href="index.php?act=mybill">Đơn hàng của tôi</a><br></div>
                    <?php } ?>
                    <?php if (isset($role) && $role == 1) { ?>
                        <div class="qmk"><a href="admin/index.php">Trang quản trị</a><br></div>
                    <?php } ?>
                    <div class="qmk"><a href="index.php?act=thoat">Đăng xuất</a><br></div>
                </div>
            </div>
        <?php
        } else {
        ?>
            <!-- Sign In Section -->
            <!-- Sign In Section -->
            <div class="sign-in">
                <h2>Đăng nhập</h2>
                <div class="social-icons mb-3">
                    <a href="#">F</a>
                    <a href="#">9</a>
                    <a href="#">9</a>
                </div>
                <p class="text-muted mb-4">đăng nhập tại đây</p>
                <?php if (isset($thongbao)) { ?>
                    <p style="color: red; font-weight: bold;"><?= htmlspecialchars($thongbao) ?></p>
                <?php } ?>

                <form action="index.php?act=dangnhap" method="post">
                    <input type="text" name="user" id="username" placeholder="Tên người dùng" required>
                    <input type="password" name="pass" id="password" placeholder="Mật khẩu" required>
                    <button type="submit" value="Đăng nhập" name="dangnhap" class="btn btn-danger">Đăng nhập</button>
                </form>
                <!-- Moved 'Quên mật khẩu?' to be outside the form -->
                <div class="qmk"><a href="index.php?act=quenmk">Quên mật khẩu?</a></div>
            </div>
            <!-- Sign Up Section -->
            <div class="sign-up">
                <h2>Xin chào quý khách</h2>
                <p class="mb-4">Nếu bạn chưa có tài khoản hãy đăng ký tại đây</p>
                <a href="index.php?act=dangky"><button class="btn btn-light">Đăng ký</button></a>
            </div>
        <?php } ?>
    </div>
</div>