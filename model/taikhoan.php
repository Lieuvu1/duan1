<?php
if (!function_exists('insert_taikhoan')) {
    function insert_taikhoan($email, $user, $pass, $role = 'user') // 🔹 Mặc định là 'user'
    {
        $sql = "INSERT INTO taikhoan (email, user, pass, role) VALUES (?, ?, ?, ?)";
        pdo_execute($sql, [$email, $user, $pass, $role]);
    }
}

if (!function_exists('checkuser')) {
    function checkuser($user, $pass)
    {
        $sql = "SELECT * FROM taikhoan WHERE user = ? AND pass = ?";
        $result = pdo_query_one($sql, [$user, $pass]);

        // 🔹 Nếu đăng nhập thành công, lưu thông tin vào session
        if ($result) {
            $_SESSION['user'] = [
                'id' => $result['id'],
                'user' => $result['user'],
                'role' => $result['role'] // 🔹 Thêm vai trò vào session
            ];
        }

        return $result;
    }
}

if (!function_exists('checkemail')) {
    function checkemail($email)
    {
        $sql = "SELECT * FROM taikhoan WHERE email = ?";
        return pdo_query_one($sql, [$email]);
    }
}

if (!function_exists('get_user_by_id')) {
    function get_user_by_id($id)
    {
        $sql = "SELECT * FROM taikhoan WHERE id = ?";
        return pdo_query_one($sql, [$id]);
    }
}

if (!function_exists('update_password')) {
    function update_password($id, $new_pass)
    {
        $sql = "UPDATE taikhoan SET pass = ? WHERE id = ?";
        pdo_execute($sql, [$new_pass, $id]);
    }
}

if (!function_exists('get_user_by_email')) {
    function get_user_by_email($email)
    {
        $sql = "SELECT * FROM taikhoan WHERE email = ?";
        return pdo_query_one($sql, [$email]);
    }
}

if (!function_exists('capnhat_taikhoan')) {
    function capnhat_taikhoan($id, $user, $pass, $email, $address, $tel, $role)
    {
        $sql = "UPDATE taikhoan SET user=?, pass=?, email=?, address=?, tel=?, role=? WHERE id=?";
        pdo_execute($sql, [$user, $pass, $email, $address, $tel, $role, $id]);
    }
}

if (!function_exists('loadall_taikhoan')) {
    function loadall_taikhoan()
    {
        $sql = "SELECT * FROM taikhoan ORDER BY id DESC";
        return pdo_query($sql);
    }
}

if (!function_exists('delete_taikhoan')) {
    function delete_taikhoan($id)
    {
        $sql = "DELETE FROM taikhoan WHERE id=?";
        pdo_execute($sql, [$id]);
    }
}
