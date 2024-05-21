<?php
	include ('class/cls.php');
	$p = new phone();

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
    <title>Kết Nối Thế Giới | Thêm bài viết</title>
</head>
<style>
body {
    background-image: url("../webmarket-html/images/dummy/menu/R.jpg")
}

.cls {
    padding-top: 15%;
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
        <table width="600" border="1" align="center" class="mau">
            <tr>
                <th height="48" colspan="2" scope="col" class="color">ĐĂNG BÀI</th>
            </tr>
            <tr>
                <th height="49" scope="row" class="color">Tên sản phẩm</th>
                <td><input type="text" name="txtten" id="button2" /></td>
            </tr>
            <tr>
                <th height="49" scope="row" class="color">Hình</th>
                <td><input type="file" name="myfile" id="button2" /></td>
            </tr>
            <tr>
                <th width="199" height="49" scope="row" class="color">Mô tả</th>
                <td width="419"><label for="select"></label>
                    <textarea name="txtpost" id="" cols="30" rows="10"></textarea>
            </tr>
            <tr>
                <th colspan="2" scope="row">
                    <input type="submit" name="btn" id="button" value="post" />
                </th>
            </tr>

        </table>
        <div>
            <?php
                switch ($_POST['btn'])
                {
                    case 'post':
                        {
                            $name = $_FILES['myfile']['name'];
                            $tmp_name = $_FILES['myfile']['tmp_name'];
                            $post = $_REQUEST['txtpost'];
                            $id = 1;
                            $tensp = $_REQUEST['txtten'];
                            if($tmp_name != '')
                            {
                                if($p->uploadfile($tmp_name,'images/dummy/post',$name)==1)
                                {
                                    if($p->themxoasua("INSERT INTO post(tensp,hinh,mota) values('$tensp','$name','$post')")==1)
                                    {
                                        echo '<script type="text/javascript">
                                            alert("thành công");
                                            </script>'
                                        ;
                                    }
                                    else
                                    {
                                        echo '<script type="text/javascript">
                                            alert("thất bại");
                                            </script>'
                                        ;
                                    }
                                }
                            }
                            else
                            {
                                echo '<script type="text/javascript">
                                            alert("vui lòng chọn ảnh ");
                                            </script>'
                                        ;
                            }
                        }
                }
            ?>
        </div>


    </form>
</body>

</html>