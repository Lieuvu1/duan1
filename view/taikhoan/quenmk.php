<?php
include "model/taikhoan.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'] ?? '';

    if (!empty($email) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $user = get_user_by_email($email);

        if ($user) {
            $message = "Mật khẩu của bạn là: <strong>" . htmlspecialchars($user['pass']) . "</strong>";
        } else {
            $message = "Email không tồn tại trong hệ thống!";
        }
    } else {
        $message = "Vui lòng nhập địa chỉ email hợp lệ!";
    }
}
?>

<style>
    .forgot-password-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #f8f9fa;
    }

    .forgot-password-box {
        background: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        text-align: center;
        max-width: 400px;
        width: 100%;
    }

    .forgot-password-box input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    .forgot-password-box button {
        width: 100%;
        padding: 10px;
        background: #ff4b2b;
        border: none;
        color: white;
        border-radius: 5px;
        cursor: pointer;
    }

    .forgot-password-box button:hover {
        background: #ff416c;
    }
</style>

<div class="forgot-password-container">
    <div class="forgot-password-box">
        <h2>Quên Mật Khẩu</h2>
        <p>Nhập email của bạn để tìm lại mật khẩu.</p>
        <form method="post">
            <input type="email" name="email" placeholder="Nhập email của bạn" required>
            <button type="submit">Tìm mật khẩu</button>
        </form>
        <?php if (isset($message)) {
            echo "<p>$message</p>";
        } ?>
        <br>
        <a href="index.php?act=dangnhap">Quay lại đăng nhập</a>
    </div>
</div>