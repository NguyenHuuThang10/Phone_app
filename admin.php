<?php
	include ('class/cls.php');
	$p = new phone();
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kết Nối Thế Giới | Thêm sản phẩm</title>
</head>
<style>
body {
    background-image: url("./images/dummy/menu/R.jpg")
}

.cls {
    padding-top: 5%;
}

.mau {
    border-color: red;
}

.color {
    color: red;
}
</style>


<body>
    <div class="higher-line">
       <a href="index-admin.php">Quay lại</a>
    </div>
    <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data" class="cls">
        <table width="600" border="1" align="center" cellpadding="0" cellspacing="0" class="mau">
            <tr>
                <th height="48" colspan="2" scope="col" class="color">QUẢN LÝ SẢN PHẨM</th>
            </tr>
            <tr>
                <th width="199" height="49" scope="row" class="color">Tên thương hiệu</th>
                <td width="419"><label for="select"></label class="color">
                    <?php
                    $p->loadcongty('select * from thuonghieu order by id asc');
                ?>
            </tr>
            <tr>
                <th width="199" height="49" scope="row" class="color">Tên thể loại</th>
                <td width="419"><label for="select"></label>
                    <?php
                    $p->loadtheloai('select * from theloai order by id asc');
                ?>
            </tr>
            <tr>
                <th width="199" height="49" scope="row" class="color">Tên sản phẩm</th>
                <td width="385"><label for="textfield"></label>
                    <input type="text" name="txttensp" id="textfield" />
                </td>
            </tr>
            <tr>
                <th height="42" scope="row" class="color">Title</th>
                <td><label for="textfield2"></label>
                    <input type="text" name="txttitle" id="textfield2" />
                </td>
            </tr>
            <tr>
                <th height="43" scope="row" class="color">Giá</th>
                <td><label for="textfield3"></label>
                    <input type="text" name="txtgia" id="textfield3" />
                </td>
            </tr>
            <tr>
                <th height="49" scope="row" class="color">Hình</th>
                <td><input type="file" name="myfile" id="button2" /></td>
            </tr>
            <tr>
                <th width="199" height="49" scope="row" class="color">Mức độ phổ biến</th>
                <td width="419"><label for="select"></label>
                    <?php
                    $p->loadphobien('select * from phobien order by id asc');
                ?>
            </tr>
            <tr>
                <th height="45" colspan="2" scope="row">
                    <input name="btn" type="submit" class="mau" id="button" value="Thêm sản phẩm mới" />
                    <input name="btn" type="submit" class="mau" id="button" value="Thêm sản phẩm nổi bật" />
                    <input name="btn" type="submit" class="mau" id="button" value="Thêm sản phẩm phổ biến" />
                </th>
            </tr>
        </table>

        <?php
            switch($_POST['btn'])
            {
                case 'Thêm sản phẩm mới':
                {
                    $name = $_FILES['myfile']['name'];
                    $tmp_name = $_FILES['myfile']['tmp_name'];
                    $tensp = $_REQUEST['txttensp'];
                    $title = $_REQUEST['txttitle'];
                    $gia = $_REQUEST['txtgia'];
                    $thuonghieu = $_REQUEST['thuonghieu'];
                    $theloai = $_REQUEST['theloai'];
                    $mucphobien = $_REQUEST['phobien'];
                    if ($tmp_name != ''){
                        if ($p->uploadfile($tmp_name, 'images/dummy/products', $name) == 1){
                            if ($p->themxoasua("INSERT INTO sanpham(tensp,title,gia,hinh, id_hang, theloai, phobien) VALUES ('$tensp', '$title', '$gia', '$name', '$thuonghieu', '$theloai', '$mucphobien')")==1){
                                echo 'Thêm sản phẩm thành công!';
                            }else{
                                echo 'Thêm sản phẩm thất bại!';
                            }
                        }
                    }else {
                        echo 'Vui lòng chọn ảnh đại diện!';
                    }

                    break;
                }

                case 'Thêm sản phẩm nổi bật':
                    {
                        $name = $_FILES['myfile']['name'];
                        $tmp_name = $_FILES['myfile']['tmp_name'];
                        $tensp = $_REQUEST['txttensp'];
                        $title = $_REQUEST['txttitle'];
                        $gia = $_REQUEST['txtgia'];
                        $thuonghieu = $_REQUEST['thuonghieu'];
                        $theloai = $_REQUEST['theloai'];
                        $mucphobien = $_REQUEST['phobien'];
                        if ($tmp_name != ''){
                            if ($p->uploadfile($tmp_name, 'images/dummy/featured-products', $name) == 1){
                                if ($p->themxoasua("INSERT INTO sanphamnoibat(tensp,title,gia,hinh, id_hang, theloai, phobien) VALUES ('$tensp', '$title', '$gia', '$name', '$thuonghieu', '$theloai', '$mucphobien')")==1){
                                    echo 'Thêm sản phẩm thành công!';
                                }else{
                                    echo 'Thêm sản phẩm thất bại!';
                                }
                            }
                        }else {
                            echo 'Vui lòng chọn ảnh đại diện!';
                        }
    
                        break;
                    }

                    case 'Thêm sản phẩm phổ biến':
                        {
                            $name = $_FILES['myfile']['name'];
                            $tmp_name = $_FILES['myfile']['tmp_name'];
                            $tensp = $_REQUEST['txttensp'];
                            $title = $_REQUEST['txttitle'];
                            $gia = $_REQUEST['txtgia'];
                            $thuonghieu = $_REQUEST['thuonghieu'];
                            $theloai = $_REQUEST['theloai'];
                            $mucphobien = $_REQUEST['phobien'];
                            if ($tmp_name != ''){
                                if ($p->uploadfile($tmp_name, 'images/dummy/most-popular-products', $name) == 1){
                                    if ($p->themxoasua("INSERT INTO sanphamphobien(tensp,title,gia,hinh, id_hang, theloai, phobien) VALUES ('$tensp', '$title', '$gia', '$name', '$thuonghieu', '$theloai', '$mucphobien')")==1){
                                        echo 'Thêm sản phẩm thành công!';
                                    }else{
                                        echo 'Thêm sản phẩm thất bại!';
                                    }
                                }
                            }else {
                                echo 'Vui lòng chọn ảnh đại diện!';
                            }
        
                            break;
                        }
            
            }
        ?>
    </form>
    </form>
</body>

</html>