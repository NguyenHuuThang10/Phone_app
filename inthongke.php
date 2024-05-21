<?php
    include ('class/cls.php');
    $p = new phone();
    $link = $p->connect();

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
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

<head>
    <title>Chi tiết đơn hàng</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="../resources/ckeditor/ckeditor.js"></script>

    <style>
    #order-detail-wrapper {
        width: 450px;
        margin: 50px auto;
        border: 4px solid #000;
        padding: 5px;
    }

    #order-detail {
        border: 1px solid #000;
        padding: 20px;
        line-height: 20px;
    }

    #order-detail ul {
        margin: 0;
        padding: 0;
    }

    #order-detail ul li {
        list-style: none;
    }

    #order-detail label {
        font-weight: bold;
    }
    </style>
</head>

<body>
    <div class="higher-line">
        <a href="index-admin.php">Quay lại</a>
    </div>
    <?php
            $orders = mysql_query("SELECT orders.name, orders.address, orders.phone, orders.note, order_detail.*, sanpham.tensp as product_name 
                FROM orders
                INNER JOIN order_detail ON orders.id = order_detail.order_id
                INNER JOIN sanpham ON sanpham.id = order_detail.product_id
                WHERE orders.id ='$layid' ",$link);
            $orders_1 = mysql_fetch_array($orders);
        ?>
    <div id="order-detail-wrapper">
        <div id="order-detail">
            <h1>Chi tiết đơn hàng</h1>
            <label>Người nhận: </label><span> <?php echo $orders_1['name']; ?></span><br />
            <label>Điện thoại: </label><span> <?php echo $orders_1['address']; ?></span><br />
            <label>Địa chỉ: </label><span> <?php echo $orders_1['phone']; ?></span><br />
            <hr />
            <h3>Danh sách sản phẩm</h3>
            <ul>
                <li>
                    <span class="item-name"><?php echo $orders_1['product_name']; ?></span>
                    <span class="item-quantity"> - SL: <?php echo $orders_1['quantity']; ?> sản phẩm</span>
                </li>
                <?php
                    $totalQuantity = $orders_1['quantity'];
                    $totalMoney = ($orders_1['price'] * $orders_1['quantity']);
                    $i = 0;
                    while($row = mysql_fetch_array($orders)) {
                ?>
                <li>
                    <span class="item-name"><?php echo $row['product_name']; ?></span>
                    <span class="item-quantity"> - SL: <?php echo $row['quantity']; ?> sản phẩm</span>
                </li>
                <?php
                        $totalMoney += ($row['price'] * $row['quantity']);
                        $totalQuantity += $row['quantity'];
                        $i++;
                    }
                ?>
            </ul>
            <hr />
            <label>Tổng SL:</label> <?php echo $totalQuantity; ?> - <label>Tổng tiền:</label>
            <?php echo $totalMoney; ?> $
            <p><label>Ghi chú: </label><?php echo $orders_1['note'] ?></p>
        </div>
    </div>
</body>

</html>