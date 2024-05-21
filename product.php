<?php
    include('class/cls.php');
    $p = new phone();

    $layid = $_REQUEST['id'];
    $layphanloai = $_REQUEST['phanloai'];

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
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/product.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:43:09 GMT -->

<head>
    <meta charset="utf-8">
    <title>Kết Nối Thế Giới | Sản phẩm</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ProteusThemes">

    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ['Open+Sans:400,700,400italic,700italic:latin,latin-ext,cyrillic', 'Pacifico::latin']
            }
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = ('https:' == document.location.protocol ? 'https' : 'http') + '://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
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

<body class="">
    <div class="master-wrapper">
        <header id="header">
            <div class="darker-row">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                        <div class="higher-line">
                               
                                <a href="index.php">Đăng xuất</a>
                               
                            </div>
                        </div>
                        <div class="span8">
                            <div class="topmost-line">

                                <div class="higher-line">
                                    <a href="#" class="gray-link">My account</a>
                                    &nbsp; | &nbsp;
                                    <a href="#" class="gray-link">Wishlist (2)</a>
                                    &nbsp; | &nbsp;
                                    <a href="#" class="gray-link">Checkout</a>
                                </div>
                                &nbsp;
                                <div class="lang-currency">
                                    <div class="dropdown js-selectable-dropdown">
                                        <a data-toggle="dropdown" class="selected" href="#"><span
                                                class="js-change-text"><i class="famfamfam-flag-gb"></i> English
                                                (EN)</span> <b class="caret"></b></a>
                                        <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                            <li><a href="#"><i class="famfamfam-flag-gb"></i> English (EN)</a></li>
                                            <li><a href="#"><i class="famfamfam-flag-si"></i> Slovenian (SI)</a></li>
                                            <li><a href="#"><i class="famfamfam-flag-de"></i> German (DE)</a></li>
                                            <li><a href="#"><i class="famfamfam-flag-fr"></i> French (FR)</a></li>
                                            <li><a href="#"><i class="famfamfam-flag-es"></i> Spanish (ES)</a></li>
                                        </ul>
                                    </div>
                                    <div class="dropdown js-selectable-dropdown">
                                        <a data-toggle="dropdown" class="selected" href="#"><span
                                                class="js-change-text">USD ($)</span> <b class="caret"></b></a>
                                        <ul class="dropdown-menu js-possibilities" role="menu" aria-labelledby="dLabel">
                                            <li><a href="#">USD ($)</a></li>
                                            <li><a href="#">EUR (€)</a></li>
                                            <li><a href="#">YEN (¥)</a></li>
                                            <li><a href="#">GBP (£)</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">



                    <div class="span7">
                        <a class="brand" href="index-guest.php">
                            <img src="images/logo.png" alt="Logo" width="48" height="48" />
                            <span class="pacifico">Kết nối thế giới</span>
                        </a>
                    </div>



                    <div class="span5">
                        <div class="top-right">
                            <div class="icons">
                                <a href="http://www.facebook.com/ProteusNet"><span class="zocial-facebook"></span></a>
                                <a href="skype:primozcigler?call"><span class="zocial-skype"></span></a>
                                <a href="https://twitter.com/proteusnetcom"><span class="zocial-twitter"></span></a>
                                <a href="http://eepurl.com/xFPYD"><span class="zocial-rss"></span></a>
                                <a href="#"><span class="zocial-wordpress"></span></a>
                                <a href="#"><span class="zocial-android"></span></a>
                                <a href="#"><span class="zocial-html5"></span></a>
                                <a href="#"><span class="zocial-windows"></span></a>
                                <a href="#"><span class="zocial-apple"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>



        <div class="navbar navbar-static-top" id="stickyNavbar">
            <div class="navbar-inner">
                <div class="container">
                    <div class="row">
                        <div class="span9">
                            <button type="button" class="btn btn-navbar" data-toggle="collapse"
                                data-target=".nav-collapse">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>



                            <div class="nav-collapse collapse">
                                <ul class="nav" id="mainNavigation">
                                    <li class="dropdown active">
                                        <a href="index-guest.php" class="dropdown-toggle"> Home</a>
                                    </li>
                                    <li class="dropdown dropdown-supermenu">
                                        <a href="shop.php" class="dropdown-toggle"> Shop <b class="caret"></b> </a>
                                        <ul class="dropdown-menu supermenu accepts-5">
                                            <li class="row">
                                                <div class="span2">
                                                    <ul class="nav nav-pills nav-stacked">
                                                        <li><a href="shop.php">Grid View</a></li>
                                                        <li><a href="shop-list-view.php">List View</a></li>
                                                        <li><a href="shop-no-sidebar.php">Full Width</a></li>
                                                    </ul>
                                                </div>
                                                <div class="span3">
                                                    <div class="embed-container"><iframe
                                                            src="http://player.vimeo.com/video/5606758" frameborder="0"
                                                            webkitAllowFullScreen mozallowfullscreen
                                                            allowFullScreen></iframe></div>
                                                </div>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-megamenu">
                                        <a href="#" class="dropdown-toggle"> Megamenu <b class="caret"></b> </a>
                                        <ul class="dropdown-menu megamenu container">
                                            <li class="row">
                                                <div class="span3">
                                                    <ul class="nav nav-pills nav-stacked">
                                                        <li><a href="shop.php">Điện thoại</a></li>
                                                        <li><a href="shop.php">Máy tính bảng</a></li>
                                                    </ul>
                                                </div>
                                                <div class="span3">
                                                    <a href="shop.php"><img src="images/dummy/menu/1.webp"
                                                            width="540" height="270"></a>
                                                    <h5><span class="light"></span>Sản phẩm nổi bật</h5>
                                                    <p>
                                                        Iphone 14 sản phẩm mới nhất và nổi trội nhất hiện nay của Apple
                                                    </p>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>
                                    <li><a href="about-us.php">Bài viết</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>



                                <form class="navbar-form pull-right" action="#" method="get">
                                    <button type="submit"><span class="icon-search"></span></button>
                                    <input type="text" class="span1" name="search" id="navSearchInput">
                                </form>
                            </div>
                        </div>



                        <div class="span3">
                            <div class="cart-contaner" id="cartContainer">
                                <div class="cart">
                                    <a href="checkout-step-1.php" class="btn btn-danger">
                                        <i class="icon-shopping-cart"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="darker-stripe">
        </div>



        <div class="container">
            <div class="push-up top-equal blocks-spacer">


                <?php
                    if ($layphanloai == 'noibat'){
                        $p->getdetails_nb("select * from sanphamnoibat where id = '$layid' order by id");
                    }else if ($layphanloai == 'moi'){                    
                        $p->getdetails("select * from sanpham where id = '$layid' order by id");
                    }else if ($layphanloai == 'phobien'){
                        $p->getdetails_pb("select * from sanphamphobien where id = '$layid' order by id");
                    }
                ?>



                <div class="row">
                    <div class="span12">
                        <ul id="myTab" class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab-1" data-toggle="tab">Details</a>
                            </li>
                            <li>
                                <a href="#tab-3" data-toggle="tab">COMMENTS</a>
                            </li>
                            <li>
                                <a href="#tab-4" data-toggle="tab">SHIPPING DETAILS</a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="fade in tab-pane active" id="tab-1">
                                <h3>Product Description</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus dui ante,
                                    vulputate at pellentesque eget, viverra ac dolor. Morbi interdum tortor non leo
                                    aliquam ac aliquet nulla porta. Morbi id dolor massa, ut ornare augue. Morbi
                                    tincidunt magna bibendum enim tristique tristique. Quisque a massa tellus, ac tempor
                                    magna. Sed eget ligula tellus, nec pellentesque dolor. Phasellus dictum, mauris non
                                    mollis ornare, turpis libero faucibus orci, at fringilla urna leo sodales libero.
                                    Aliquam nec lectus mauris. Morbi lectus quam, convallis vel euismod a, auctor non
                                    dui. Etiam a nisi risus.</p>
                                <p>Phasellus velit quam, ultrices et hendrerit vitae, suscipit nec dui. Sed at ligula
                                    vitae ligula pellentesque dictum. Duis lobortis auctor ipsum vel placerat. Phasellus
                                    nisi odio, ornare eget faucibus et, accumsan nec mauris. per conubia nostra, per
                                    inceptos himenaeos. Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Phasellus dui ante, vulputate at pellentesque eget, viverra ac dolor.Etiam a nisi
                                    risus.</p>
                                <p>Phasellus velit quam, ultrices et hendrerit vitae, suscipit nec dui. Sed at ligula
                                    vitae ligula pellentesque dictum. Duis lobortis auctor ipsum vel placerat. Phasellus
                                    nisi odio, ornare eget faucibus et, accumsan nec mauris. per conubia nostra, per
                                    inceptos himenaeos.</p>
                            </div>
                            <div class="fade tab-pane" id="tab-3">
                                <p>
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                                    fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
                                    them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                                </p>
                            </div>
                            <div class="fade tab-pane" id="tab-4">
                                <p>
                                    Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's
                                    organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify
                                    pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy
                                    hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred
                                    pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel
                                    fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of
                                    them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.
                                    Another text here ...
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="boxed-area no-bottom">
            <div class="container">



                <div class="row">
                    <div class="span12">
                        <div class="main-titles lined">
                            <h2 class="title"><span class="light">Related</span> Products</h2>
                        </div>
                    </div>
                </div>
                
                <?php
                    $p->xuatdanhsachtuongtu("select * from sanpham where id < 7 order by id asc");
                ?>
                <!-- <div class="row popup-products">



                    <div class="span3">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-img">
                                    <div class="picture">
                                        <a href="product.php"><img src="images/dummy/products/product-1.jpg" alt=""
                                                width="540" height="374" /></a>
                                        <div class="img-overlay">
                                            <a class="btn more btn-primary" href="product.php">More</a>
                                            <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-titles no-margin">
                                    <h4 class="title"><span class="striked">$32</span> <span class="red-clr">$29</span>
                                    </h4>
                                    <h5 class="no-margin">Adidas Converse 552</h5>
                                </div>
                                <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam
                                    frignila</p>
                                <p class="center-align stars">
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="span3">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-img">
                                    <div class="picture">
                                        <a href="product.php"><img src="images/dummy/products/product-2.jpg" alt=""
                                                width="540" height="374" /></a>
                                        <div class="img-overlay">
                                            <a class="btn more btn-primary" href="product.php">More</a>
                                            <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-titles no-margin">
                                    <h4 class="title"><span class="striked">$32</span> <span class="red-clr">$29</span>
                                    </h4>
                                    <h5 class="no-margin">Adidas Converse 552</h5>
                                </div>
                                <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam
                                    frignila</p>
                                <p class="center-align stars">
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="span3">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-img">
                                    <div class="picture">
                                        <a href="product.php"><img src="images/dummy/products/product-3.jpg" alt=""
                                                width="540" height="374" /></a>
                                        <div class="img-overlay">
                                            <a class="btn more btn-primary" href="product.php">More</a>
                                            <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-titles no-margin">
                                    <h4 class="title"><span class="striked">$32</span> <span class="red-clr">$29</span>
                                    </h4>
                                    <h5 class="no-margin">Adidas Converse 552</h5>
                                </div>
                                <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam
                                    frignila</p>
                                <p class="center-align stars">
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>



                    <div class="span3">
                        <div class="product">
                            <div class="product-inner">
                                <div class="product-img">
                                    <div class="picture">
                                        <a href="product.php"><img src="images/dummy/products/product-4.jpg" alt=""
                                                width="540" height="374" /></a>
                                        <div class="img-overlay">
                                            <a class="btn more btn-primary" href="product.php">More</a>
                                            <a href="#" class="btn buy btn-danger">Add to Cart</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="main-titles no-margin">
                                    <h4 class="title"><span class="striked">$32</span> <span class="red-clr">$29</span>
                                    </h4>
                                    <h5 class="no-margin">Adidas Converse 552</h5>
                                </div>
                                <p class="desc">59% Cotton Lorem Ipsum Dolor Sit Amet esed ultrices sapien nunc nam
                                    frignila</p>
                                <p class="center-align stars">
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star stars-clr"></span>
                                    <span class="icon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div> -->
        </div>



        <footer>



            <div class="foot-light">
                <div class="container">
                    <div class="row">
                        <div class="span4">
                            <h2 class="pacifico">Kết nối thế giới &nbsp; <img src="images/webmarket.png" alt="Webmarket Cart"
                                    class="align-baseline" /></h2>
                            <p>Đến với chúng tôi bạn sẽ được trải nghiệm những điều khác biệt! </p>
                        </div>
                        <div class="span4">
                            <div class="main-titles lined">
                                <h3 class="title">Facebook</h3>
                            </div>
                            <div class="bordered">
                                <div class="fill-iframe">
                                    <div class="fb-like-box" data-href="https://www.facebook.com/ProteusNet"
                                        data-width="292" data-height="200" data-colorscheme="dark"
                                        data-show-faces="true" data-header="false" data-stream="false"
                                        data-show-border="false"></div>
                                </div>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="main-titles lined">
                                <h3 class="title"><span class="light"></span>Email</h3>
                            </div>
                            <p>Hãy để lại nếu bạn muốn nhận được nhiều về thông tin
                                và ưu đãi bên chúng tôi!
                            </p>

                            <div id="mc_embed_signup">
                                <form
                                    action=""
                                    method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                    class="validate form form-inline" target="_blank" novalidate>
                                    <div class="mc-field-group">
                                        <input type="email" value="" placeholder="Enter your e-mail address"
                                            name="EMAIL" class="required email" id="mce-EMAIL">
                                        <input type="submit" value="Send" name="subscribe" id="mc-embedded-subscribe"
                                            class="btn btn-primary">
                                    </div>
                                    <div id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="foot-dark">
                <div class="container">
                    <div class="row">



                        <div class="span3">
                            <div class="main-titles lined">
                                <h3 class="title"><span class="light">Thông tin công ty</span></h3>
                            </div>
                            <ul class="nav bold">
                                <li><a href="#">Trang chủ</a></li>
                                <li><a href="#">Về chúng tôi</a></li>
                                <li><a href="#">Hệ thống cửa hàng</a></li>
                                <li><a href="#">Tuyển dụng</a></li>
                                <li><a href="#">Liên hệ</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>



                        <div class="span3">
                            <div class="main-titles lined">
                                <h3 class="title"><span class="light">Chính sách</span></h3>
                            </div>
                            <ul class="nav">
                                <li><a href="#">Bảo vệ thông tin người dùng</a></li>
                                <li><a href="#">Bảo mật giao dịch của khách hàng</a></li>
                                <li><a href="#">Chính sách bảo hành</a></li>
                                <li><a href="#">Chính sách quy đổi và thanh toán</a></li>
                                <li><a href="#">Chính sách 30 ngày đổi mới</a></li>
                            </ul>
                        </div>



                        <div class="span3">
                            <div class="main-titles lined">
                                <h3 class="title"><span class="light">Hỗ trợ khách hàng</span></h3>
                            </div>
                            <ul class="nav">
                                <li><a href="#">Hóa đơn điện tử</a></li>
                                <li><a href="#">Câu hỏi thường gặp</a></li>
                                <li><a href="#">Vận chuyện và giao nhận</a></li>
                                <li><a href="#">Phương thức thanh toán</a></li>
                                <li><a href="#">Tra cứu đơn hàng</a></li>
                            </ul>
                        </div>



                        <div class="span3">
                            <div class="main-titles lined">
                                <h3 class="title"><span class="light">Thông tin khác</span> </h3>
                            </div>
                            <ul class="nav">
                                <li><a href="#">Thông tin liên hệ</a></li>
                                <li><a href="#">Tổng đài hỗ trợ</a></li>
                                <li><a href="#">Thương hiệu</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>



            <div class="foot-last">
                <a href="#" id="toTheTop">
                    <span class="icon-chevron-up"></span>
                </a>
               
            </div>
        </footer>




        <div id="loginModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel"
            aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="loginModalLabel"><span class="light">Login</span> To Webmarket</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputEmail">Username</label>
                        <div class="controls">
                            <input type="text" class="input-block-level" id="inputEmail" placeholder="Username"
                                required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputPassword">Password</label>
                        <div class="controls">
                            <input type="password" class="input-block-level" id="inputPassword" placeholder="Password"
                                required>
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox">
                                Remember me
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary input-block-level bold higher">
                        SIGN IN
                    </button>
                </form>
                <p class="center-align push-down-0">
                    <a data-toggle="modal" role="button" href="#forgotPassModal" data-dismiss="modal">Forgot your
                        password?</a>
                </p>
            </div>
        </div>

        <div id="registerModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel"
            aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="registerModalLabel"><span class="light">Register</span> To Webmarket</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputUsernameRegister">Username</label>
                        <div class="controls">
                            <input type="text" class="input-block-level" id="inputUsernameRegister"
                                placeholder="Username" required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputEmailRegister">Email</label>
                        <div class="controls">
                            <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Email"
                                required>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputPasswordRegister">Password</label>
                        <div class="controls">
                            <input type="password" class="input-block-level" id="inputPasswordRegister"
                                placeholder="Password" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-danger input-block-level bold higher">
                        REGISTER
                    </button>
                </form>
                <p class="center-align push-down-0">
                    <a data-toggle="modal" role="button" href="#loginModal" data-dismiss="modal">Already Registered?</a>
                </p>
            </div>
        </div>

        <div id="forgotPassModal" class="modal hide fade" tabindex="-1" role="dialog"
            aria-labelledby="forgotPassModalLabel" aria-hidden="true">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="forgotPassModalLabel"><span class="light">Forgot</span> your password?</h3>
            </div>
            <div class="modal-body">
                <form method="post" action="#">
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputUsernameRegister">Username</label>
                        <div class="controls">
                            <input type="text" class="input-block-level" id="inputUsernameRegister"
                                placeholder="Username">
                        </div>
                    </div>
                    <p class="center-align">OR</p>
                    <div class="control-group">
                        <label class="control-label hidden shown-ie8" for="inputEmailRegister">Email</label>
                        <div class="controls">
                            <input type="email" class="input-block-level" id="inputEmailRegister" placeholder="Email">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary input-block-level bold higher">
                        SEND ME A NEW PASSWORD
                    </button>
                </form>
            </div>
        </div>
    </div>




    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "../../../connect.facebook.net/en_US/all.html#xfbml=1&appId=126780447403102";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

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

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/product.php by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:43:12 GMT -->

</html>