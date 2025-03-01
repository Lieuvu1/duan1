<?php
include "../model/pdo.php";
include "header.php";
include "../model/danhmuc.php";
include "../model/sanpham.php";
include "../model/cart.php";
include "../model/binhluan.php";
include "../model/taikhoan.php";

if (isset($_GET['act'])) {
    $act = $_GET['act'];
    switch ($act) {
        case 'adddm':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $tenloai = trim($_POST['tenloai']);
                if (empty($tenloai)) {

                    $thongbao = "Vui lòng nhập tên loại";
                } elseif (is_numeric($tenloai)) {
                    $thongbao = "Tên loại không được là số";
                } else {
                    insert_danhmuc($tenloai);
                    $thongbao = "Thêm thành công";
                }
            }
            include "danhmuc/add.php";
            break;
        case 'listdm':
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;

        case 'xoadm':
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_danhmuc($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include 'danhmuc/list.php';
            break;
        case 'suadm':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $dm = loadone_danhmuc($_GET['id']);
            }
            include 'danhmuc/update.php';
            break;

        case 'updatedm':
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $name = trim($_POST['name']);
                $id = $_POST['id'];

                if (empty($name)) {
                    $thongbao = "Vui lòng nhập tên loại";
                } elseif (is_numeric($name)) {
                    $thongbao = "Tên loại không được là số";
                } else {
                    update_danhmuc($id, $name);
                    $thongbao = "Cập nhật thành công";
                }
            }
            $listdanhmuc = loadall_danhmuc();
            include "danhmuc/list.php";
            break;
        case 'addsp':
            if (isset($_POST['themmoi']) && ($_POST['themmoi'])) {
                $iddm = $_POST['iddm'];
                $tensp = trim($_POST['name']);
                $giasp = $_POST['price'];
                $mota = trim($_POST['mota']);
                $hinh = $_FILES['img']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES['img']['name']);

                if (!empty($hinh)) {
                    move_uploaded_file($_FILES["img"]["tmp_name"], $target_file);
                }



                insert_sanpham($tensp, $giasp, $hinh, $mota, $iddm);
                $thongbao = "Thêm thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            include "sanpham/add.php";
            break;
        case "listsp":
            if (isset($_POST['listok']) && ($_POST['listok'])) {
                $kyw = $_POST['kyw'];
                $iddm = $_POST['iddm'];
            } else {
                $kyw = "";
                $iddm = 0;
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham($kyw, $iddm);
            include 'sanpham/list.php';
            break;
        case "xoasp":
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_sanpham($_GET['id']);
            }
            $listsanpham = loadall_sanpham();
            include 'sanpham/list.php';
            break;
        case "suasp":
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $sanpham = loadone_sanpham($_GET['id']);
            }
            $listdanhmuc = loadall_danhmuc();
            include 'sanpham/update.php';
            break;
        case "updatesp":
            if (isset($_POST['capnhat']) && ($_POST['capnhat'])) {
                $id = $_POST['id'];
                $iddm = $_POST['iddm'];
                $tensp = $_POST['tensp'];
                $giasp = $_POST['giasp'];
                $mota = $_POST['mota'];
                $hinh = $_FILES['hinh']['name'];
                $target_dir = "../upload/";
                $target_file = $target_dir . basename($_FILES["hinh"]["name"]);
                if (move_uploaded_file($_FILES["hinh"]["tmp_name"], $target_file)) {
                } else {
                }
                update_sanpham($id, $iddm, $tensp, $giasp, $mota, $hinh);
                $thongbao = "Cập nhật thành công";
            }
            $listdanhmuc = loadall_danhmuc();
            $listsanpham = loadall_sanpham("", 0);
            include "sanpham/list.php";
            break;
        case 'dsbl':
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'xoabl':
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                delete_binhluan($_GET['id']);
            }
            $listbinhluan = loadall_binhluan(0);
            include "binhluan/list.php";
            break;
        case 'dskh':

            $listtaikhoan = loadall_taikhoan();
            include 'taikhoan/list.php';
            break;

        case 'xoatk':
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_taikhoan($_GET['id']);
            }
            $listtaikhoan = loadall_taikhoan();
            include 'taikhoan/list.php';
            break;
        case 'listbill':
            if (isset($_POST['kyw']) && ($_POST['kyw'] != "")) {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }

            if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1) {
                // Admin sẽ xem tất cả đơn hàng
                $listbill = loadall_bill();
            } else {
                // Người dùng thường chỉ xem đơn hàng của họ
                $listbill = loadall_bill($_SESSION['user']['id']);
            }

            include 'bill/listbill.php';
            break;

        case 'xoadh':
            if (isset($_GET['id']) && ($_GET['id'])) {
                delete_bill($_GET['id']);
            }
            $listbill = loadall_bill(0);
            include 'bill/listbill.php';
            break;

        case 'suadh':
            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_bill($_GET['id']);
            }
            $dt_bill = loadall_dt_bill($_GET['id']);
            include 'bill/update.php';
            break;
        case 'updatedh':
            if (isset($_POST['capnhat'])) {
                $id = $_POST['id'];
                $thanhtoan = $_POST['bill_thanhtoan'];
                $new_status = $_POST['bill_status'];

                // Load the current order status from the database
                $donhang = loadone_bill($id);
                $current_status = $donhang['bill_status'];

                // Check if the new status is earlier than the current status
                if ($new_status < $current_status) {
                    // Prevent update if trying to revert to an earlier status
                    $thongbao = "Không thể quay lại trạng thái trước.";
                } else {
                    // Proceed with the update
                    update_donhangstatus($id, $new_status, $thanhtoan);
                    $thongbao = "Cập nhật thành công";
                }
            }

            if (isset($_GET['id']) && ($_GET['id'] > 0)) {
                $donhang = loadone_bill($_GET['id']);
            }

            $dt_bill = loadall_dt_bill($_GET['id']);
            include 'bill/update.php';
            break;


        default:
            include 'home.php';
            break;
    }
} else {
    include "home.php";
}
