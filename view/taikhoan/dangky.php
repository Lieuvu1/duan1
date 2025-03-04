<style>
    #custom-form {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f8f9fa;
    }

    #custom-form .form-container {
        display: flex;
        width: 900px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        overflow: hidden;
        background-color: #fff;
    }

    #custom-form .welcome-section {
        flex: 1;
        background: linear-gradient(135deg, #ff416c, #ff4b2b);
        color: #fff;
        padding: 50px 30px;
        text-align: center;
    }

    #custom-form .create-account {
        flex: 1;
        padding: 30px;
        text-align: center;
    }
</style>
<div id="custom-form">
    <div class="form-container">
        <div class="welcome-section">
            <h2>Xin chào quý khách</h2>
            <p>bạn đã có tài khoản hãy đăng nhập tại đây</p>
            <a href="index.php?act=dangnhap"><button class="btn btn-light">Đăng nhập</button></a>
        </div>
        <div class="create-account">
            <h2>Đăng ký tài khoản tại đây</h2>
            <div class="d-flex justify-content-center gap-3 mb-4">
                <a href="#" class="btn btn-outline-secondary btn-sm">F</a>
                <a href="#" class="btn btn-outline-secondary btn-sm">9</a>
                <a href="#" class="btn btn-outline-secondary btn-sm">9</a>
            </div>
            <form action="index.php?act=dangky" method="post">
                <div class="mb-3">
                    <input type="text" name="email" class="form-control" placeholder="Email">
                </div>
                <div class="mb-3">
                    <input type="text" name="user" class="form-control" placeholder="Tên Đăng nhập">
                </div>

                <div class="mb-3">
                    <input type="password" name="pass" class="form-control" placeholder="Password">
                </div>
                <div hidden>
                    <label for="role">Chọn vai trò:</label>
                    <select name="role" id="role">
                        <option value="0" selected>Người dùng</option>
                    </select>
                </div>
                <button type="submit" name="dangky" value="Đăng ký" class="btn btn-danger">Đăng ký</button>
            </form>
        </div>
    </div>
</div>