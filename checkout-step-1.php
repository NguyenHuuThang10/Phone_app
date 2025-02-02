<?php
    session_start();
    include ('class/cls.php');
    $p = new phone();
    $link=$p->connect();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }

    $error = false;
    $succes = false;

    if(isset($_GET['action'])){

        function update_cart($add = false){
            foreach ($_POST['quantity'] as $id => $quantity) {
                if($quantity == 0){
                    unset($_SESSION['cart'][$id]);
                }else{
                    if($add){
                        $_SESSION['cart'][$id] += $quantity;
                    }else {
                        $_SESSION['cart'][$id] = $quantity;
                    }
                }
            }
        }
        switch($_GET['action']){
            case 'add':
            {
                update_cart(true);
                header('location:./checkout-step-1.php');
                break;
            }

            case 'delete':
            {
                if(isset($_GET['id'])){
                    unset($_SESSION['cart'][$_GET['id']]);
                }
                header('location:./checkout-step-1.php');
                break;
            }
            case 'submit':
            {
                if (isset($_POST['update_click'])){
                    update_cart();
                    header('location:./checkout-step-1.php');
                }else if (isset($_POST['order_click'])){
                    if (empty($_POST['quantity'])){
                        $error = 'Giỏ hàng rỗng';
                    }else if (empty($_POST['name'])){
                        $error = "Bạn chưa nhập tên người nhận!";
                    }else if(empty($_POST['phone_n'])){
                        $error = 'Bạn chưa nhập số điện thoại người nhận!';
                    }else if(empty($_POST['address'])){
                        $error = 'Bạn chưa nhập địa chỉ người nhận!';
                    }

                    if ($error == false && !empty($_POST['quantity'])){
                        // var_dump($_POST['quantity']);exit;
                        $products = mysql_query("select * from sanpham where id IN(".implode(",", array_keys($_POST['quantity'])).")", $link);
                        $total = 0;
                        // var_dump($_POST['quantity']);exit;
                        $orderProducts = array();
                        while($row = mysql_fetch_array($products)){
                            $orderProducts[] = $row;
                            $total += $row['gia'] * $_POST['quantity'][$row['id']];
                        }
                        $insertOrder = mysql_query("INSERT INTO `orders` (`id` ,`name` ,`phone` ,`address` ,`note` ,`total` ,`created_time` ,`last_update`)VALUES (NULL , '".$_POST['name']."', '".$_POST['phone_n']."', '".$_POST['address']."', '".$_POST['note']."', '".$total."', '".time()."', '".time()."');", $link);
                        $orderID = mysql_insert_id($link);
                        $insertString = "";
                        foreach ($orderProducts as $key => $product) {
                            $insertString .= "(NULL, '" . $orderID . "', '" . $product['id'] . "', '" . $_POST['quantity'][$product['id']] . "', '" . $product['gia'] . "', '" . time() . "', '" . time() . "')";
                            if ($key != count($orderProducts) - 1) {
                                $insertString .= ",";
                            }
                        }
                        $insertOrder = mysql_query("INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_update`) VALUES " . $insertString . ";", $link);
                        $succes = 'Đặt hàng thành công';
                        unset($_SESSION['cart']);
                    }
                    
                }
                break;
            }
        }
    }

    if (!empty($_SESSION['cart'])){
        // // //select * from sanpham where id IN (4,10,7,9,12)
        // var_dump($_SESSION['cart'][13]);exit;
        $products = mysql_query("select * from sanpham where id IN (".implode(",", array_keys($_SESSION['cart'])).")", $link);
        
    }
?>
<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/checkout-step-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:42:38 GMT -->

<head>
    <meta charset="utf-8">
    <title>Kết Nối Thế Giới | Đơn hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

    <script type="text/javascript">
    WebFontConfig = {
        google: {
            families: ['Open+Sans:400,700,400italic,700italic:latin,latin-ext,cyrillic', 'Pacifico::latin']
        }
    };
    (function() {
        var wf = document.createElement('script');
        wf.src = ('https:' == document.location.protocol ? 'https' : 'http') +
            '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
        wf.type = 'text/javascript';
        wf.async = 'true';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(wf, s);
    })();
    </script>

    <link href="stylesheets/bootstrap.css" rel="stylesheet">
    <link href="stylesheets/responsive.css" rel="stylesheet">

    <link rel="stylesheet" href="js/rs-plugin/css/settings.css" type="text/css" />

    <link rel="stylesheet" href="js/jquery-ui-1.10.3/css/smoothness/jquery-ui-1.10.3.custom.min.css" type="text/css" />

    <link rel="stylesheet" href="js/prettyphoto/css/prettyPhoto.css" type="text/css" />

    <link href="stylesheets/main.css" rel="stylesheet">

    <script src="js/modernizr.custom.56918.js"></script>

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/apple-touch/144.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/apple-touch/114.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/apple-touch/72.png">
    <link rel="apple-touch-icon-precomposed" href="images/apple-touch/57.png">
    <link rel="shortcut icon" href="images/apple-touch/57.png">
</head>

<body class=" checkout-page">
    <?php if (!empty($error)) { ?>
    <h3 id="notify_msg">
        <?php echo $error; ?>
    </h3>
    <a href="Javascript:history.back()">Quay lại</a>
    <?php } else if(!empty($succes)){ ?>
        <h3 id="notify_msg">
                <?php echo $succes; ?>
        </h3>
        <a href="index-guest.php">Tiếp tục mua hàng</a>
    <?php }else { ?>
    <div class="master-wrapper">
        <div class="container">
            <div class="row">



                <section class="span12">
                    <div class="checkout-container">
                        <div class="row">

                            <div class="span10 offset1">
                                <header>
                                    <div class="row">
                                        <div class="span2">
                                            <a href="index-guest.php"><img src="images/logo-bw.png" alt="Webmarket Logo"
                                                    width="48" height="48" /></a>
                                        </div>
                                        <div class="span6">
                                            <div class="center-align">
                                                <h1><span class="light">Review</span> Shopping Cart</h1>
                                            </div>
                                        </div>
                                        <div class="span2">
                                            <div class="right-align">
                                                <img src="images/buttons/security.jpg" alt="Security Sign" width="92"
                                                    height="65" />
                                            </div>
                                        </div>
                                    </div>
                                </header>


                                <form action="checkout-step-1.php?action=submit" method="post">
                                    <table class="table table-items">
                                        <thead>
                                            <tr>
                                                <th colspan="2">Item</th>
                                                <th>
                                                    <div class="align-center">Quantity</div>
                                                </th>
                                                <th>
                                                    <div class="align-right">Price</div>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- class="icon-remove-sign" -->
                                            <?php
                                                if (!empty($products)){
                                                    $total=0;
                                                    while($row = mysql_fetch_array($products)){
                                                        $hinh = $row['hinh'];
                                                        $tensp = $row['tensp'];
                                                        $gia = $row['gia'];
                                                        $id = $row['id'];
                                                        echo '<tr>
                                                                    <td class="image">
                                                                        <img src="images/dummy/products/'.$hinh.'" alt=""
                                                                            width="124" height="124" />
                                                                    </td>
                                                                    <td class="desc">'.$tensp.' &nbsp; 
                                                                    
                                                                        <a  href="checkout-step-1.php?action=delete&id='.$id.'">Xóa </a>
                                                                    </td>
                                                                    <td class="qty">
                                                                        <input type="text" class="tiny-size" value="'.$_SESSION['cart'][$id].'" name="quantity['.$id.']" >
                                                                    </td>
                                                                    <td class="price">
                                                                        '.$gia * $_SESSION['cart'][$id].'$
                                                                    </td>
                                                                </tr>';
                                                        $total += $gia * $_SESSION['cart'][$id];
                                                    }
                                                    ?>
                                            <tr>
                                                <td class="stronger">Subtotal:</td>
                                                <td>&nbsp;</td>
                                                <td>&nbsp;</td>
                                                <td class="stronger">
                                                    <div class="size-20 align-right"><?php echo $total; ?>$</div>
                                                </td>
                                            </tr>
                                            <?php } ?>


                                        </tbody>
                                    </table>
                                    <p class="right-align">
                                        <input type="submit" name="update_click" class="btn btn-primary higher bold"
                                            value="CẬP NHẬT">
                                    </p>
                                    <hr />
                                    <div class="control-group">
                                        <label class="control-label" for="name">Tên người nhận:<span
                                                class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="name" name="name" class="span4">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="phone_n">Điện thoại:<span
                                                class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="text" id="phone_n" name="phone_n" class="span4">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="address">Địa chỉ:<span
                                                class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <input type="tel" id="address" name="address" class="span4">
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="note">Ghi chú:<span
                                                class="red-clr bold">*</span></label>
                                        <div class="controls">
                                            <textarea id="note" name="note" cols="100" rows="7"></textarea>
                                        </div>
                                    </div>
                                    <p class="right-align">
                                        <input type="submit" name="order_click" class="btn btn-primary higher bold"
                                            value="ĐẶT HÀNG">
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php } ?>






    <div id="fb-root"></div>
    <script>
    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "../../../connect.facebook.net/en_US/all.html#xfbml=1&appId=126780447403102";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <script type="text/javascript" src="../../../ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.html"></script>
    <script type="text/javascript">
    if (typeof jQuery == 'undefined') {
        document.write('<script src="js/jquery.min.js"><\/script>');
    }
    </script>

    <script src="js/underscore/underscore-min.js" type="text/javascript"></script>

    <script src="js/bootstrap.min.js" type="text/javascript"></script>

    <script src="js/rs-plugin/js/jquery.themepunch.plugins.min.js" type="text/javascript"></script>
    <script src="js/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>

    <script src="js/jquery.carouFredSel-6.2.1-packed.js" type="text/javascript"></script>

    <script src="js/jquery-ui-1.10.3/js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui-1.10.3/touch-fix.min.js" type="text/javascript"></script>

    <script src="js/isotope/jquery.isotope.min.js" type="text/javascript"></script>

    <script src="js/bootstrap-tour/build/js/bootstrap-tour.min.js" type="text/javascript"></script>

    <script src="js/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>

    <script type="text/javascript"
        src="http://maps.google.com/maps/api/js?key=AIzaSyDvMjN1g49P1MA2Onsj-GulDkmDuuH6aoU&amp;sensor=false"></script>
    <script type="text/javascript" src="js/goMap/js/jquery.gomap-1.3.2.min.js"></script>

    <script src="js/custom.js" type="text/javascript"></script>
</body>

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/checkout-step-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:42:43 GMT -->

</html>