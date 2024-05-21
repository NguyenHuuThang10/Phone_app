<?php
	include('class/cls.php');
	$p = new phone();
	$layid = $_REQUEST['id'];
  session_start();
	include("class/clslogin.php");
	$a = new Login();
	if(isset($_SESSION['myid']) && isset($_SESSION['myuser']) && isset($_SESSION['mypass']) && isset($_SESSION['myemail']))
	{
		$a->fconfin($_SESSION['myid'], $_SESSION['myuser'], $_SESSION['mypass'], $_SESSION['myemail']); 
	}
	else
	{
		header("location:index.php");
	}
?>
<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Kết Nối Thế Giới | Cập nhật sản phẩm</title>
</head>


<body>
    <div class="higher-line">
        <a href="index-admin.php">Quay lại</a>
    </div>
    <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">

        <table width="727" border="1" align="center">
            <tr align="center">
                <td height="59" colspan="2"><strong>QUẢN LÝ SẢN PHẨM</strong></td>
            </tr>
            <td height="61">Tên Sản Phẩm</td>
            <td><label for="textfield"></label>
                <input type="text" name="txttensp" id="textfield"
                    value="<?php echo $p->laycot("select tensp from sanpham where id = '$layid' limit 1") ?>" />
            </td>
            <input type="hidden" name="txtid" id="textfield3" value="<?php echo $layid; ?>" />
            </tr>
            <tr>
                <td height="153">Mô Tả</td>
                <td><label for="textarea"></label>
                    <textarea name="txtmota" id="txtmota" cols="45"
                        rows="5"><?php echo $p->laycot("select title from sanpham where id = '$layid' limit 1") ?></textarea>
                </td>
            </tr>
            <tr>
                <td height="52">Giá </td>
                <td><label for="textfield2"></label>
                    <input type="text" name="txtgia" id="textfield2"
                        value="<?php echo $p->laycot("select gia from sanpham where id = '$layid' limit 1") ?>" />
                </td>
            </tr>
            <tr>
                <td height="52">Thương hiệu </td>
                <td><label for="textfield2"></label>
                    <input type="text" name="txtthuonghieu" id="textfield3"
                        value="<?php echo $p->laycot("select id_hang from sanpham where id = '$layid' limit 1") ?>" />
                </td>
            </tr>
            <tr>
                <td height="52">Thể loại</td>
                <td><label for="textfield2"></label>
                    <input type="text" name="txttheloai" id="textfield4"
                        value="<?php echo $p->laycot("select theloai from sanpham where id = '$layid' limit 1") ?>" />
                </td>
            </tr>
            <tr>
                <td height="52">Phổ biến </td>
                <td><label for="textfield2"></label>
                    <input type="text" name="txtphobien" id="textfield5"
                        value="<?php echo $p->laycot("select phobien from sanpham where id = '$layid' limit 1") ?>" />
                </td>
            </tr>
            <tr>
            <tr>
                <td height="54">Hình</td>
                <td><input type="file" name="myfile" id="button2" value="Submit" /></td>
            </tr>

            <td height="59" colspan="2" align="center">
                <input type="submit" name="btn" id="button3" value="Xóa sản phẩm" />
                <input type="submit" name="btn" id="btn" value="Sửa sản phẩm" />
            </td>
            </tr>
        </table>
        <?php
switch($_POST['btn']){
	
	case 'Xóa sản phẩm':
	{
		$myid = $_REQUEST['txtid'];
		if($myid > 0){
			if($p->themxoasua("delete from sanpham where id = '$myid' limit 1") == 1){
				echo 'Xóa sản phẩm thành công!';
			}else{
				echo 'xóa sản phẩm thất bại!';	
			}
		}else{
			echo 'Vui lòng chọn sản phẩm muốn xóa!';	
		}
		break;
	}
	
	case 'Sửa sản phẩm':
	{
		$myid = $_REQUEST['txtid'];
		$tensp = $_REQUEST['txttensp'];
        $mota = $_REQUEST['txtmota'];
		$gia = $_REQUEST['txtgia'];
		$name = $_FILES['myfile']['name'];
		$tmp_name = $_FILES['myfile']['tmp_name'];
        $thuonghieu = $_REQUEST['txtthuonghieu'];
        $theloai = $_REQUEST['txttheloai'];
        $phobien = $_REQUEST['phobien'];
		if ($tmp_name != ''){
			if($p->uploadfile($tmp_name, 'img', $name) == 1){
				if ($myid > 0){
					if ($p->themxoasua("UPDATE sanpham SET tensp= '$tensp',gia='$gia',mota= '$mota',hinh='$name',thuonghieu = '$thuonghieu', theloai='$theloai',phobien='$phobien' WHERE id ='$myid' LIMIT 1 ;") == 1){
						echo 'Sửa sản phẩm thành công!';
					}else{
						echo 'Sửa sản phẩm thất bại!';
					}
				}else{
					echo 'Vui lòng chọn sản phẩm cần sửa!';	
				}
			}
		}else{
			echo 'Vui lòng chọn ảnh đại diện cho sản phẩm !';	
		}
		
		
		break;	
	}
}
?>
        <hr />
        <?php
    
	$p->xuatdanhsachsanpham('select * from sanpham order by id asc');
    
?>
    </form>

</body>

</html>