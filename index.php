<?php
session_start();
include "model/pdo.php";
include "model/danhmuc.php";
include_once 'model/sanpham.php';
include "model/taikhoan.php";
$imgpath = "./upload/";
$dsdm = loadall_danhmuc();
$spnew = loadall_sanpham_home();
$dstop10 = loadall_sanpham_top10();
ob_start();
include "model/cart.php";
include "view/header.php";

if (isset($_GET['act']) && ($_GET['act'] != "")) {
    $act = $_GET['act'];
    switch ($act) {
        case 'sanpham':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }
            if (isset($_GET['iddm']) && ($_GET['iddm'] > 0)) {
                $iddm = $_GET['iddm'];
            } else {
                $iddm = 0;
            }
            $dssp = loadall_sanpham($kyw, $iddm);
            $tendm = load_ten_dm($iddm);
            include "view/sanpham.php";
            break;

        case 'sanphamct':
            if (isset($_GET['idsp']) && ($_GET['idsp'] > 0)) {
                $id = $_GET['idsp'];
                $onesp = loadone_sanpham($id);
                extract($onesp);
                $sp_cung_loai = load_sanpham_cungloai($id,$iddm);
                include "view/sanphamct.php";
            } else {
                include 'view/home.php';
            }
            break;

        case 'dangky':
            if (isset($_POST['dangky']) && ($_POST['dangky'])) {
                $email = $_POST['email'] ?? '';
                $user = $_POST['user'] ?? '';
                $pass = $_POST['pass'] ?? '';
                $role = $_POST['role'] ?? '';
                $errors = [];

                if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = "Email không hợp lệ.";
                }
                if (empty($user) || strlen($user) < 3) {
                    $errors['user'] = "Tên đăng nhập phải có ít nhất 3 ký tự.";
                }
                if (empty($pass) || strlen($pass) < 6) {
                    $errors['pass'] = "Mật khẩu phải có ít nhất 6 ký tự.";
                }
                if (empty($errors)) {
                    insert_taikhoan($email, $user, $pass, $role);
                    $thongbao = "Đã đăng ký thành công. Vui lòng đăng nhập để thực hiện chức năng.";
                    $email = $user = $pass = '';
                }
            }
            include "view/taikhoan/dangky.php";
            break;

        case 'dangnhap':
            if (isset($_POST['dangnhap']) && ($_POST['dangnhap'])) {
                $user = $_POST['user'];
                $pass = $_POST['pass'];
                $checkuser = checkuser($user, $pass);
                if (is_array($checkuser)) {
                    $_SESSION['user'] = $checkuser;
                    header('location: index.php');
                } else {
                    $thongbao = "Tài khoản tồn tại vui lòng thử lại";
                }
            }
            include "view/taikhoan/dangnhap.php";
            break;

        case 'thoat':
            unset($_SESSION['user']);
            header('location:index.php');
            break;

        case 'addtocart':
            if (isset($_POST['addtocart'])) {
                $id = $_POST['id'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $soluong = $_POST['soluong'];
                $ttien = $soluong * $price;

                $spadd = [
                    'id' => $id,
                    'name' => $name,
                    'img' => $img,
                    'price' => $price,
                    'soluong' => $soluong,
                    'ttien' => $ttien,
                ];

                if (!isset($_SESSION['mycart'])) {
                    $_SESSION['mycart'][$id] = $spadd;
                } else {
                    if (isset($_SESSION['mycart'][$id])) {
                        $_SESSION['mycart'][$id]['soluong'] += $soluong;
                        $_SESSION['mycart'][$id]['ttien'] = $_SESSION['mycart'][$id]['soluong'] * $price;
                    } else {
                        $_SESSION['mycart'][$id] = $spadd;
                    }
                }
            }
            include "view/cart/viewcart.php";
            break;

        case 'delcart':
            if (isset($_GET['idcart'])) {
                unset($_SESSION['mycart'][$_GET['idcart']]);
            } else {
                $_SESSION['mycart'] = [];
            }
            header('Location: index.php?act=viewcart');
            break;

        case 'viewcart':
            include "view/cart/viewcart.php";
            break;

        case 'bill':
            include "view/cart/bill.php";
            break;

        case 'billcomfirm':
            if (isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                $errors = [];
                if (empty($_POST['name'])) {
                    $errors['name'] = 'Vui lòng nhập tên người đặt hàng.';
                }
                if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                    $errors['email'] = 'Vui lòng nhập địa chỉ email hợp lệ.';
                }
                if (empty($_POST['address'])) {
                    $errors['address'] = 'Vui lòng nhập địa chỉ giao hàng.';
                }
                if (empty($_POST['tel']) || !preg_match('/^[0-9]{10,11}$/', $_POST['tel'])) {
                    $errors['tel'] = 'Vui lòng nhập số điện thoại (10-11 số).';
                }
                if (!empty($errors)) {
                    foreach ($errors as $error) {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                    break;
                }
                $iduser = isset($_SESSION['user']) ? $_SESSION['user']['id'] : 0;
                $name = $_POST['name'];
                $email = $_POST['email'];
                $address = $_POST['address'];
                $tel = $_POST['tel'];
                $pttt = $_POST['pttt'];
                $ngaydathang = date('h:i:sa d/m/y');
                $tongdonhang = tongdonhang();
                $thanhtoan = 0;

                $idbill = insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $thanhtoan);
                if ($idbill) {
                    foreach ($_SESSION['mycart'] as $cart) {
                        insert_cart($iduser, $cart['id'], $cart['img'], $cart['name'], $cart['price'], $cart['soluong'], $cart['ttien'], $idbill);
                    }
                    $_SESSION['mycart'] = [];
                } else {
                    echo "<div class='alert alert-danger'>Error creating the bill. Please try again.</div>";
                    break;
                }
                $bill = loadone_bill($idbill);
                $billct = loadall_cart($idbill);
                include "view/cart/billcomfirm.php";
            }
            break;
            case 'mybill':
                if(session_status() == PHP_SESSION_NONE){
                    session_start();
                }
                if(!isset($_SESSION['user'])){
                    header('Location: index.php?act=dangnhap');
                    exit;
                }
                $listbill = loadall_bill($_SESSION['user']['id']);
                include "view/cart/mybill.php";
                break;

            case 'xoabill':
                if (isset($_GET['act']) && $_GET['act'] == 'xoabill') {
                    $id = $_GET['id'];
                    if ($id) {
                        // Gọi hàm hủy đơn hàng
                        cancel_order($id);
                
                        // Redirect lại trang và hiển thị thông báo
                        header('Location: index.php?status=success');
                        exit();
                    }
                }
                

        default:
            include "view/home.php";
            break;
    }
} else {
    include "view/home.php";
}
include "view/footer.php";
