<div class="container mt-5">
   <div class="row justify-content-center">
      <div class="col-md-8">
         <?php if (isset($_SESSION['mycart']) && count($_SESSION['mycart']) > 0): ?>
            <form action="index.php?act=billcomfirm" method="post">
               <!-- Order Information Section -->
               <div class="card mb-4">
                  <div class="card-header text-center bg-primary text-white">
                     <h5>Thông tin đặt hàng</h5>
                  </div>
                  <div class="card-body">
                  <?php
                         if (isset($_SESSION['user'])){
                            $name = $_SESSION['user']['user'];
                            $address = $_SESSION['user']['address'];
                            $email = $_SESSION['user']['email'];
                            $tel = $_SESSION['user']['tel'];
                         }else{
                            $name = "";
                            $address = "";
                            $email = "";
                            $tel = "";
                         }
                         ?>
                     <div class="mb-3">
                        <label for="name" class="form-label">Người đặt hàng</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?= htmlspecialchars($name) ?>" placeholder="Nhập tên của bạn">
                        <?php if (isset($_SESSION['errors']['name'])): ?>
                           <div class="text-danger mt-1"><?=$_SESSION['errors']['name']; unset($_SESSION['errors']['name']); ?></div>
                        <?php endif; ?>
                     </div>
                     <div class="mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo htmlspecialchars($address ?? ''); ?>" placeholder="Nhập địa chỉ">
                        <?php if (isset($_SESSION['errors']['address'])): ?>
                           <div class="text-danger mt-1"><?=$_SESSION['errors']['address']; unset($_SESSION['errors']['address']); ?></div>
                        <?php endif; ?>
                     </div>
                     <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= htmlspecialchars($email) ?>" placeholder="Nhập email">
                        <?php if (isset($_SESSION['errors']['email'])): ?>
                           <div class="text-danger mt-1"><?=$_SESSION['errors']['email']; unset($_SESSION['errors']['email']); ?></div>
                        <?php endif; ?>
                     </div>
                     <div class="mb-3">
                        <label for="tel" class="form-label">Điện thoại</label>
                        <input type="text" name="tel" id="tel" class="form-control" value="<?php echo htmlspecialchars($tel ?? ''); ?>" placeholder="Nhập số điện thoại">
                        <?php if (isset($_SESSION['errors']['tel'])): ?>
                           <div class="text-danger mt-1"><?=$_SESSION['errors']['tel']; unset($_SESSION['errors']['tel']); ?></div>
                        <?php endif; ?>
                     </div>
                  </div>
               </div>

               <!-- Payment Method Section -->
               <div class="card mb-4">
                  <div class="card-header text-center bg-success text-white">
                     <h5>Phương thức thanh toán</h5>
                  </div>
                  <div class="card-body">
                     <div class="form-check mb-2">
                        <input type="radio" class="form-check-input" id="pttt1" value="1" name="pttt" checked>
                        <label for="pttt1" class="form-check-label">Trả tiền khi nhận hàng</label>
                     </div>
                  </div>
               </div>

               <!-- Order Details Section -->
               <div class="card mb-4">
                  <div class="card-header text-center bg-info text-white">
                     <h5>Đơn hàng</h5>
                  </div>
                  <div class="card-body">
                     <table class="table table-bordered text-center">
                        <?php viewcart(0); ?>
                     </table>
                  </div>
               </div>

               <!-- Submit Button -->
               <div class="text-center">
 <center><input type="submit" class="btn btn-success" value="Đồng ý đặt hàng" name="dongydathang"></center>
               </div>
            </form>
         <?php else: ?>
            <!-- Empty Cart Message -->
            <div class="alert alert-warning text-center">
               <h4>Giỏ hàng của bạn hiện tại không có sản phẩm.</h4>
               <a href="index.php" class="btn btn-success mt-3">Tiếp tục mua sắm</a>
            </div>
         <?php endif; ?>
      </div>
   </div>
</div>
