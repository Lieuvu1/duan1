<style>
    /* Title styling */
    .formtitle h1 {
        font-size: 24px;
        font-weight: bold;
        color: #333;
        text-align: center;
        margin-bottom: 20px;
    }

    /* Table container styling */
    .formdsloai {
        max-width: 1000px;
        margin: 0 auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 12px 15px;
        text-align: left;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
        text-align: center;
    }

    table th {
        background-color: #435ebe;
        color: white;
    }

    table tr:hover {
        background-color: #f1f1f1;
    }

    /* Button styling */
    .btn-custom {
        background-color: #007bff;
        border: none;
        color: white;
        border-radius: 5px;
        padding: 10px 15px;
        transition: background-color 0.3s ease;
    }

    .btn-custom:hover {
        background-color: #0056b3;
    }

    /* Bottom action buttons styling */
    .pt-2 {
        text-align: center;
        margin-top: 20px;
    }

    /* Margin between elements */
    .row.margin10 {
        margin-bottom: 15px;
    }

    /* Style for error messages */
    .error-message {
        color: red;
        font-size: 12px;
    }
    
</style>
<div>
    <div class="row formtitle magrin10">
<h1>Damh sách sản phẩm</h1>
    </div>
    <form action="index.php?act=listsp" method="post" class ="d-flex align-items-center gap-3 mb-4">
<div class="flex-grow-1">
    <input type="text " name="kyw" class="form-control" placeholder="" aria-label="Search products">

</div>
<div>
    <select name="iddm" class="form-select">
        <option value="0" selected>All Danh mục</option>
        <?php
        foreach($listdanhmuc as $danhmuc){
            extract($danhmuc);
            echo '<option value="' . $id . '">' . htmlspecialchars($name) .'</option>';
        }
        ?>
    </select>
</div>
<div>
    <input type="submit" name="listok" value="GO" class="btn-custom" id="">
</div>
    </form>
    <div class="row formcontent">
<div class="row magrin10 formdsloai">
<table>
    <tr>
        <th></th>
        <th>id</th>
        <th>Tên sản phẩm</th>
        <th>Hình </th>
        <th>Giá </th>
        <th>Mô tả</th>
        <th></th>
    </tr>

    <?php
    foreach($listsanpham as $sanpham){
        extract($sanpham);
        $suasp = "index.php?act=suasp&id=" . $id;
        $xoasp = "index.php?act=xoasp&id=" . $id;
        $imgpath = "../upload/" .$img;
        if (is_file($imgpath)){
            $img = "<img src ='" . $imgpath . "' height='80'>";
        }else{
            $img = "Không có hình";
        }

       echo '
        <tr>
        <td><input type="checkbox"></td>
        <td>'.$id.'</td>
        <td>'. htmlspecialchars($name) . '</td>
        <td>'.$img.'</td>
        <td>'. htmlspecialchars($price) . '</td>
      
        <td><center class="d-flex"><a class="pe-2" href="' . $suasp . '"><input type="button" value="Sửa" class="btn-custom"></a>
        <a href="' . $xoasp . '"><input class="bg-danger btn-custom" type="button" value="Xóa"></a></center></td>
        </tr>';
    }
    
    ?>
</table>
</div>
<div class="pt-2">
            <input type="button" value="Chọn tất cả" class="btn-custom">
            <input type="button" value="Bỏ chọn tất cả" class="btn-custom">
            <input type="button" value="Xóa các mục đã chọn" class="btn-custom">
            <a href="index.php?act=addsp"><input type="button" value="Nhập thêm" class="btn-custom"></a>
        </div>
    </div>
</div>