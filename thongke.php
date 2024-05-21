<?php
    include('class/cls.php');
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kết Nối Thế Giới | Thống kê</title>
</head>

<body>
    <div class="higher-line">
        <a href="index-admin.php">Quay lại</a>
    </div>
    <form id="form1" name="form1" method="post" action="">
        <h1>Thống kê đơn hàng</h1>
        <?php
                $p->xuatdonhang("select * from orders order by id asc");
            ?>
    </form>
</body>

</html>