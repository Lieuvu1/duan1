<?php
if (isset($_POST['doimatkhau'])) {
    $user_id = $_SESSION['user']['id'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];
    $confirm_pass = $_POST['confirm_pass'];

    // Kiểm tra mật khẩu cũ
    $user = get_user_by_id($user_id);
    if (!$user || $user['pass'] !== $old_pass) {
        $error = "Mật khẩu cũ không đúng!";
    } elseif ($new_pass !== $confirm_pass) {
        $error = "Mật khẩu mới và xác nhận mật khẩu không khớp!";
    } elseif (strlen($new_pass) < 6) {
        $error = "Mật khẩu mới phải có ít nhất 6 ký tự!";
    } else {
        // Cập nhật mật khẩu mới
        update_password($user_id, $new_pass);
        $success = "Đổi mật khẩu thành công!";
    }
}
?>

<style>
    .form-container {
        width: 100%;
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        background: #fff;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        text-align: center;
    }

    .form-container h2 {
        margin-bottom: 20px;
        color: #333;
    }

    .form-container input {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .form-container button {
        width: 100%;
        padding: 10px;
        background: #007bff;
        border: none;
        color: white;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.3s;
    }

    .form-container button:hover {
        background: #0056b3;
    }

    .error {
        color: red;
        margin-bottom: 10px;
    }

    .success {
        color: green;
        margin-bottom: 10px;
    }
</style>

<div class="form-container">
    <h2>Đổi mật khẩu</h2>
    <?php if (isset($error)) echo "<div class='error'>$error</div>"; ?>
    <?php if (isset($success)) echo "<div class='success'>$success</div>"; ?>
    <form action="index.php?act=doimatkhau" method="post">
        <input type="password" name="old_pass" placeholder="Mật khẩu cũ" required>
        <input type="password" name="new_pass" placeholder="Mật khẩu mới" required>
        <input type="password" name="confirm_pass" placeholder="Nhập lại mật khẩu mới" required>
        <button type="submit" name="doimatkhau">Đổi mật khẩu</button>
    </form>
</div>