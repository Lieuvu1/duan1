<?php
 function loadall_thongke(){
    $sql = "SELECT dm.id, dm.name, COUNT(*) 'soluong', MIN(price)'gia_min', MAX(price)
    'giamax', AVG(price) 'gia_avg' FROM danhmuc dm JOIN sanpham sp ON
    dm.id = sp.iddm GROUP BY dm.id, dm.name ORDER BY soluong DESC";
 }

?>
<?php
function viewcart($del) {
    $tong = 0;

    // Define the delete column header if applicable
    $xoasp_th = $del == 1 ? '<th class="text-center">Thao tác</th>' : '';
    $xoasp_td2 = $del == 1 ? '<td></td>' : '';

    // Table header
    echo '
    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <th class="text-center">Hình</th>
                <th>Sản phẩm</th>
                <th class="text-center">Đơn giá</th>
                <th class="text-center">Số lượng</th>
                <th class="text-center">Thành tiền</th>
                ' . $xoasp_th . '
            </tr>
        </thead>
        <tbody>';

    // Table body
    foreach ($_SESSION['mycart'] as $cart) {
        $hinh = $cart['img'];
        $ttien = $cart['price'] * $cart['soluong'];
        $tong += $ttien;

        $xoasp_td = $del == 1
            ? '<td class="text-center"><a href="index.php?act=delcart&idcart=' . $cart['id'] . '" class="btn btn-danger btn-sm">Xóa</a></td>'
            : '';

        echo '
        <tr>
            <td class="text-center"><img src="' . $hinh . '" alt="" style="height: 100px; width: auto;" class="img-fluid">
</td>
            <td>' . $cart['name'] . '</td>
            <td class="text-center">' . number_format($cart['price'], 2) . ' USD</td>
            <td class="text-center">' . $cart['soluong'] . '</td>
            <td class="text-center" id="total_' . $cart['id'] . '">' . number_format($ttien, 2) . ' USD</td>
            ' . $xoasp_td . '
        </tr>';
    }

    // Table footer
    echo '
        </tbody>
        <tfoot>
            <tr class="table-success">
                <td colspan="4" class="text-right font-weight-bold">Tổng đơn hàng</td>
                <td class="text-center font-weight-bold" id="grandTotal">' . number_format($tong, 2) . ' USD</td>
                ' . $xoasp_td2 . '
            </tr>
        </tfoot>
    </table>';
}

 
 function bill_chi_tiet($listbill){
    global $img_path;
    $tong = 0;
    $i = 0 ;
    foreach ($listbill as $cart){
        $hinh = $cart['img'];
        $thanhtien = $cart['price'] * $cart['soluong'];
        $tong += $thanhtien;

        echo '
         <tr>
                <td><img src="' . $hinh . '" alt="" height="80px"></td>
                <td>' . $cart['name'] . '</td>
                <td>' . $cart['price'] . ' USD</td>
                <td>' . $cart['soluong'] . '</td>
                <td>' . $thanhtien . ' USD</td> 
            </tr>';
            $i++;
    }
    echo '<tr>
            <td colspan="4">Tổng hàng</td>
            <td>' . $tong . ' USD</td>
        </tr>';
 }
 function tongdonhang(){
    $tong=0;
    foreach ($_SESSION['mycart'] as $cart){
        $ttien= $cart['price']*$cart['soluong'];
        $tong+=$ttien;
    }
    return $tong;
 }
 function insert_bill($iduser, $name, $email, $address, $tel, $pttt, $ngaydathang, $tongdonhang, $thanhtoan) {
    $sql = "INSERT INTO bill(iduser, bill_name, bill_email, bill_address, bill_tel, bill_pttt, ngaydathang, total, bill_thanhtoan)
            VALUES ('$iduser', '$name', '$email', '$address', '$tel', '$pttt', '$ngaydathang', '$tongdonhang', '$thanhtoan')";
    return pdo_execute_return_lastInsertId($sql);
}
function insert_cart($iduser,$idpro,$img,$name,$price,$soluong,$thanhtien,$idbill){
    $sql="insert into cart(iduser,idpro,img,name,price,soluong,thanhtien,idbill) values('$iduser','$idpro','$img','$name','$price','$soluong','$thanhtien','$idbill')";
    return pdo_execute($sql);
}
function loadone_bill($id){
    $sql="select *from bill where id=".$id;
    $bill = pdo_query_one($sql);
    return $bill;
}
function loadall_cart($idbill){
    $sql="select * from cart where idbill=".$idbill;
    $bill = pdo_query($sql);
    return $bill;
}
function loadall_cart_count($idbill){
    $sql = "SELECT SUM(soluong) AS total_quantity FROM cart WHERE idbill = ?";
    $result = pdo_query_one($sql, [$idbill]);

    // Return the total quantity of products in the order
    return $result['total_quantity'];
}
function loadall_bill($kyw="",$iduser=0){
    
    $sql="select * from bill where 1";
    if($iduser>0) $sql.=" AND iduser=".$iduser;
    //if($kyw!="") $sql.=" AND id like '%".$kyw."%'";
    $sql.=" order by id desc";
    $listbill=pdo_query($sql);
    return $listbill;
}
function get_ttdh($n){
 switch ($n){
    case '0':
        $tt="Đơn hàng mới";
        break;
    case '1':
        $tt="Đang chuẩn bị";
        break;
    case '2':
        $tt="Đang giao hàng";
        break;
    case '3':
        $tt="Giao hàng thành công";
        break;
    case '4':
            return 'Đã hủy';
        default:
        $tt= "Đơn hàng mới";
        break;
 }
 return $tt;
}
function get_tttt($n){
    switch ($n) {
        case '0':
           $tt=" Chưa thanh toán"; 
            break;
        case '1':
            $tt="Đã thanh toán"; 
            break;
        default:
        $tt=" Đơn Hàng Mới"; 
            break;
    }
    return $tt;
    
}
function delete_bill($id){
    $sql = "DELETE FROM bill WHERE id=".$id;
    pdo_execute($sql);
}
function loadall_dt_bill($idbill){
    $sql = "SELECT * FROM cart WHERE idbill= $idbill" ;
    return pdo_query($sql);
}
function update_donhangstatus($id, $trangthai, $thanhtoan){
    $sql = "UPDATE bill SET bill_status = '$trangthai', bill_thanhtoan = '$thanhtoan'  WHERE id = $id";
    return pdo_execute($sql);
}
function load_products_by_bill($idbill) {
    $sql = "SELECT sanpham.name FROM cart 
            JOIN sanpham ON cart.idpro = sanpham.id 
            WHERE cart.idbill = ?";
    return pdo_query($sql, $idbill);
}
function cancel_order($bill_id) {
    $sql = "UPDATE bill SET bill_status = '4' WHERE id = ?";
    pdo_execute($sql, $bill_id);
}


?>