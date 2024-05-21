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
        <table width="726" border="1" align="center">
            <tr>
                <th width="55" height="50" scope="col">STT
					<input type="hidden" name="txtid" id="textfield3" value="<?php echo $layid; ?>" />
				</th>
                <th width="136" scope="col">Tài khoản</th>
                <th width="401" scope="col">Mật khẩu</th>
                <th width="260" scope="col">Email</th>
            </tr>
            <?php
			$p->xuattaikhoan('select * from taikhoan order by id asc');
		?>
            <tr>
                <th height="45" colspan="4" scope="row">
                    <input name="btn" type="submit" id="button" value="Xóa tài khoản" />
                </th>
            </tr>
        </table>
    </form>
    <?php
	switch($_POST['btn']){
	
		case 'Xóa tài khoản':
		{
			$myid = $_REQUEST['txtid'];
			if($myid > 0){
				if($p->themxoasua("delete from taikhoan where id = '$myid' limit 1") == 1){
					echo 'Xóa sản tài khoản thành công!';
					header ('location:taikhoan.php');
				}else{
					echo 'xóa tài khoản thất bại!';	
				}
			}else{
				echo 'Vui lòng chọn tài khoản muốn xóa!';	
			}
			break;
		}
	}
?>
</body>

</html>