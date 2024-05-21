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

<!DOCTYPE html>
<!--[if lt IE 8]>      <html class="no-js lt-ie10 lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie10 lt-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lt-ie10"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
<!--<![endif]-->

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:43:21 GMT -->

<head>
    <meta charset="utf-8">
    <title>Kết Nối Thế Giới | Thông tin</title>
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

<body data-spy="scroll" data-target="#spyMenu" data-offset="80" class="">
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
                            <img src="images/logo.png" alt="Webmarket Logo" width="48" height="48" />
                            <span class="pacifico">Kết Nối Thế Giới</span>

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
                                    <li class="dropdown">
                                        <a href="index-guest.php" class="dropdown-toggle"> Home <b></b> </a>

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

                                            </li>
                                        </ul>
                                    </li>
                                    <li class="dropdown dropdown-megamenu">
                                        <a href="shop.php" class="dropdown-toggle"> Megamenu <b class="caret"></b> </a>
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
                                                            alt="woman in red" width="540" height="270"></a>
                                                    <h5><span class="light">Featured</span> Category</h5>
                                                    <p>
                                                        Iphone 14 sản phẩm mới nhất và nổi trội nhất hiện nay của Apple
                                                    </p>
                                                </div>
                                            </li>

                                        </ul>
                                    </li>

                                    <li class="active"><a href="about-us.php">Bài viết</a></li>
                                    <li><a href="contact.php">Liên hệ</a></li>
                                </ul>
                            </div>
                        </div>



                        <div class="span3">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="darker-stripe">
        <div class="container">
            <div class="row">
                <div class="span12">
                    <ul class="breadcrumb">
                        <li>
                            <a href="index-guest.php">Kết Nối Thế Giới</a>
                        </li>
                        <li><span class="icon-chevron-right"></span></li>
                        <li>
                            <a href="about-us.php">Bài viết</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="push-up blocks-spacer">
            <div class="row">



                <aside class="span3">
                    <div class="sidebar-item">



                        <div class="underlined">
                            <h3><span class="light"></span> Team của chúng tôi</h3>
                        </div>



                        <div class="row">
                            <div class="span3" id="spyMenu">
                                <ul class="nav nav-pills nav-stacked">
                                    <li class="active"><a href="#jaka">Hữu Thắng <i
                                                class="icon-caret-right pull-right"></i></a></li>
                                    <li><a href="#primoz">Trọng Trường <i class="icon-caret-right pull-right"></i></a>
                                    </li>
                                    <li><a href="#jaka">Kim Loan <i class="icon-caret-right pull-right"></i></a></li>
                                    <li><a href="#primoz">Trường Sa <i class="icon-caret-right pull-right"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside>



                <section class="span9">



                    <div class="underlined push-down-20">
                        <h3><span class="light">A</span> Little Something About Us</h3>
                    </div>



                    <section class="blocks-spacer">

                    </section>
                    <div class="row-fluid push-down-20" id="jaka">
                        <div class="span4">
                            <h4><span class="light">Hữu</span> Thắng</h4>
                            <h6 class="move-title-up">Leader</h6>
                            <p>Các nhà lãnh đạo không thể đạt được tầm nhìn của mình nếu không có sự đóng góp của người
                                khác. Khả năng thúc đẩy và cộng tác với mọi người của một nhà lãnh đạo sẽ giúp họ thực
                                hiện tầm nhìn đó. Do đó, phần lớn khả năng lãnh đạo hiệu quả dựa vào kỹ năng của con
                                người.
                            </p>
                        </div>
                        <div class="span4">
                            <a href="#"><img src="images/dummy/about-us/teamwork.jpg" alt="person" width="550"
                                    height="660" /></a>
                        </div>
                        <div class="span4">
                            <h4><span class="light">Kim</span> Loan</h4>
                            <h6 class="move-title-up">Member</h6>
                            <p>Làm việc theo nhóm tạo ra một hệ thống để đảm bảo rằng thời hạn được đáp ứng và công việc
                                có chất lượng cao. Khi một thành viên trong nhóm bị tụt lại phía sau, sẽ có một thành
                                viên khác sẵn sàng hỗ trợ để hoàn thành nhiệm vụ được giao đúng tiến độ. Khi công việc
                                được phân chia giữa các thành viên trong nhóm, công việc sẽ được hoàn thành nhanh hơn,
                                giúp hoạt động kinh doanh tổng thể hoạt động hiệu quả hơn.
                        </div>
                    </div>

                    <div class="row-fluid push-down-20" id="primoz">
                        <div class="span4">
                            <h4><span class="light">Trọng</span> Trường</h4>
                            <h6 class="move-title-up">Member</h6>
                            <p>Làm việc theo nhóm tạo ra một hệ thống để đảm bảo rằng thời hạn được đáp ứng và công việc
                                có chất lượng cao. Khi một thành viên trong nhóm bị tụt lại phía sau, sẽ có một thành
                                viên khác sẵn sàng hỗ trợ để hoàn thành nhiệm vụ được giao đúng tiến độ. Khi công việc
                                được phân chia giữa các thành viên trong nhóm, công việc sẽ được hoàn thành nhanh hơn,
                                giúp hoạt động kinh doanh tổng thể hoạt động hiệu quả hơn.
                            </p>
                        </div>
                        <div class="span4">
                            <a href="#"><img src="images/dummy/about-us/kynang.jpg" alt="person" width="550"
                                    height="660" /></a>
                        </div>
                        <div class="span4">
                            <h4><span class="light">Trường</span> Sa</h4>
                            <h6 class="move-title-up">Member</h6>
                            <p>Làm việc theo nhóm tạo ra một hệ thống để đảm bảo rằng thời hạn được đáp ứng và công việc
                                có chất lượng cao. Khi một thành viên trong nhóm bị tụt lại phía sau, sẽ có một thành
                                viên khác sẵn sàng hỗ trợ để hoàn thành nhiệm vụ được giao đúng tiến độ. Khi công việc
                                được phân chia giữa các thành viên trong nhóm, công việc sẽ được hoàn thành nhanh hơn,
                                giúp hoạt động kinh doanh tổng thể hoạt động hiệu quả hơn.
                            </p>
                        </div>
                    </div>
                    <section>



                        <div class="underlined push-down-20">
                            <h3><span class="light">Faces</span> Behind The Webmarket</h3>
                        </div>

                        <div class="row-fluid push-down-20" id="jaka">

                            <div>
                                <?php
                                    $p->xuatprofile('select *from post order by id asc');
                                ?>
                            </div>
                        </div>

                    </section>
                    <hr />
                </section>
            </div>
        </div>
    </div>



    <footer>



        <div class="foot-light">
            <div class="container">
                <div class="row">
                    <div class="span4">
                        <h2 class="pacifico">Kết nối thế giới &nbsp; <img src="images/webmarket.png"
                                alt="Webmarket Cart" class="align-baseline" /></h2>
                        <p>Đến với chúng tôi bạn sẽ được trải nghiệm những điều khác biệt! </p>
                    </div>
                    <div class="span4">
                        <div class="main-titles lined">
                            <h3 class="title">Facebook</h3>
                        </div>
                        <div class="bordered">
                            <div class="fill-iframe">
                                <div class="fb-like-box" data-href="https://www.facebook.com/ProteusNet"
                                    data-width="292" data-height="200" data-colorscheme="dark" data-show-faces="true"
                                    data-header="false" data-stream="false" data-show-border="false"></div>
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
                            <form action="" method="post" id="mc-embedded-subscribe-form"
                                name="mc-embedded-subscribe-form" class="validate form form-inline" target="_blank"
                                novalidate>
                                <div class="mc-field-group">
                                    <input type="email" value="" placeholder="Enter your e-mail address" name="EMAIL"
                                        class="required email" id="mce-EMAIL">
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
                            <h3 class="title"><span class="light">Hỗ trợ khách hagnf</span></h3>
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


    <script src="js/custom.js" type="text/javascript"></script>
</body>

<!-- Mirrored from www.proteusthemes.com/themes/webmarket-html/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 09 Aug 2015 15:43:24 GMT -->

</html>