-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 29, 2022 at 11:29 PM
-- Server version: 5.0.51
-- PHP Version: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `phone_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phone` varchar(255) character set utf8 collate utf8_unicode_ci default NULL,
  `address` varchar(500) character set utf8 collate utf8_unicode_ci NOT NULL,
  `note` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `total` int(11) NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `phone`, `address`, `note`, `total`, `created_time`, `last_update`) VALUES
(3, 'Nguyễn Hữu Thắng ', '07464961616', '52/10, khóm Trung An, đường Trần Quang Khải', 'Giao nhanh', 4658, 1667024893, 1667024893),
(5, 'Vĩnh Đức', '0123456789', 'Dầu Tiếng - Bình Dương', 'giao hàng nhanh', 2653, 1667055663, 1667055663);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `id` int(11) NOT NULL auto_increment,
  `order_id` int(11) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_time` int(11) NOT NULL,
  `last_update` int(11) NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `product_id_FK` (`product_id`),
  KEY `order_id_FK` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`id`, `order_id`, `product_id`, `quantity`, `price`, `created_time`, `last_update`) VALUES
(4, 3, 1, 2, 219, 1667024893, 1667024893),
(5, 3, 9, 5, 844, 1667024893, 1667024893),
(6, 5, 4, 5, 193, 1667055663, 1667055663),
(7, 5, 9, 2, 844, 1667055663, 1667055663);

-- --------------------------------------------------------

--
-- Table structure for table `phobien`
--

CREATE TABLE `phobien` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `mucphobien` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `phobien`
--

INSERT INTO `phobien` (`id`, `mucphobien`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tensp` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `hinh` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `mota` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `tensp`, `hinh`, `mota`) VALUES
(4, 'Điện thoại iPhone Xs Max 256GB', 'iphoneXS.png', 'Sau 1 năm mong chờ, chiếc smartphone cao cấp nhất của Apple đã chính thức ra mắt mang tên iPhone Xs Max 256 GB. Máy các trang bị các tính năng cao cấp nhất từ chip A12 Bionic, dàn loa đa chiều cho tới camera kép tích hợp trí tuệ nhân tạo.'),
(5, 'Máy tính bảng iPad Pro M1 11', 'ipadm1.png', 'Trải nghiệm khung hình sống động cùng cảm giác chạm vuốt cực mượt\r\nMáy tính bảng iPad Pro M1 11 inch WiFi Cellular 1TB (2021) thiết kế hình hộp vát cạnh vuông vức, hiện đại với thân máy bằng kim loại chắc chắn, hoàn thiện tỉ mỉ và sang trọng, trọng lượng ');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int(10) NOT NULL auto_increment,
  `tensp` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinh` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `id_hang` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `theloai` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phobien` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `title`, `gia`, `hinh`, `id_hang`, `theloai`, `phobien`) VALUES
(1, 'Iphone 14', 'Sản phẩm mới nhất của Apple', 219, 'ip14.jpg', 'Apple', 'phone', 5),
(4, 'Samsung z flip 4', 'Sản phẩm đột phá của Samsung', 193, 'zflip4.jpg', 'Samsung', 'phone', 5),
(5, 'Samsung s22', 'Sản phẩm hot của Samsung', 299, 'sss22.jpg', 'Samsung', 'phone', 5),
(6, 'Iphone 12', 'Sản phẩm đột phá của Apple', 667, 'ip12pro.jpg', 'Apple', 'phone', 4),
(7, 'Nokia 1280', 'Sản phẩm huyền thoại', 250, '1280.jpg', 'Nokia', 'phone', 4),
(9, 'Realme 7 Pro', 'Sản phẩm của Realme', 844, 'realme7.jpg', 'Realme', 'phone', 3),
(10, 'Vivo Y22s', 'Sản phẩm của Vivo', 200, 'vivoy22s.jpg', 'Vivo', 'phone', 2),
(11, 'Realme c15', 'Sản phẩm Realme', 150, 'realmec15.jpg', 'Realme', 'phone', 2),
(12, 'Xiaomi Pad 5', 'Sản phẩm của Xiaomi', 478, 'xiaomipad5.jpg', 'Xiaomi', 'tablet', 1),
(13, 'Ipad Pro M2', 'Sản phẩm của Apple', 789, 'ipadprom2.jpg', 'Apple', 'tablet', 3),
(14, 'Oppo Pad Air', 'Sản phẩm của Oppo', 654, 'oppopadair.png', 'Oppo', 'tablet', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamnoibat`
--

CREATE TABLE `sanphamnoibat` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tensp` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinh` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `id_hang` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `theloai` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phobien` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `sanphamnoibat`
--

INSERT INTO `sanphamnoibat` (`id`, `tensp`, `title`, `gia`, `hinh`, `id_hang`, `theloai`, `phobien`) VALUES
(1, 'Iphone 14', 'Sản phẩm mới nhất của Apple', 42, 'ip14.jpg', 'Apple', 'phone', 5),
(2, 'Samsung z flip 4', 'Sản phẩm đột phá của Samsung', 22, 'zflip4.jpg', 'Samsung', 'phone', 5),
(3, 'Nokia 1280', 'Sản phẩm huyền thoại', 250, '1280.jpg', 'Nokia', 'phone', 1),
(4, 'Samsung s22', 'Sản phẩm hot của Samsung', 15.99, 'sss22.jpg', 'Samsung', 'phone', 3),
(5, 'One Plus 10 Pro', 'OnePlus 10 Pro sẽ được trang bị màn hình AMOLED 6.7 inch cong với độ phân giải 2K và tốc độ làm tươi 120 Hz đem đến trải nghiệm thị giác đã mắt cho người dùng', 19.99, '1plus10pro.jpg', 'Oneplus', 'phone', 2),
(6, 'Samsung galaxy S21 FE', 'Sản phẩm sở hữu thiết kế mặt lưng tối giản cùng cụm camera xếp dọc đính liền vào lưng máy', 25, 's21fe.jpg', 'Samsung', 'phone', 1),
(7, 'Sasung Galaxy Tab', 'Sản phẩm hot của Samsung', 1222, 'sstab.jpg', 'Samsung', 'tablet', 5);

-- --------------------------------------------------------

--
-- Table structure for table `sanphamphobien`
--

CREATE TABLE `sanphamphobien` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tensp` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `title` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `gia` double NOT NULL,
  `hinh` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `id_hang` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `theloai` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `phobien` int(11) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `sanphamphobien`
--

INSERT INTO `sanphamphobien` (`id`, `tensp`, `title`, `gia`, `hinh`, `id_hang`, `theloai`, `phobien`) VALUES
(1, 'Samsung a52', 'Sản phẩm của Samsung', 22, 'a52.jpg', 'Samsung', 'phone', 3),
(2, 'Oppo A95', 'Sản phẩm của Oppo', 33, 'opa95.jpg', 'Oppo', 'phone', 2),
(4, 'Samsung Galaxy Tab A8', 'Cung cấp sức mạnh cho Samsung Galaxy Tab A8 là vi xử lý 8 nhân AP UniSOC T618, RAM 4GB và bộ nhớ trong 128GB', 200, 'taba8.jpg', 'Samsung', 'tablet', 5),
(5, 'Iphone 11 Pro Max', ' iPhone 11 Pro Max 64GB siêu đẳng cấp, bộ 3 camera khủng thời thượng', 700, 'ip11promax.jpg', 'Apple', 'phone', 5);

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE `taikhoan` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `username` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `password` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `username` (`username`),
  KEY `password` (`password`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'kimloan@gmail.com'),
(2, 'kimloan', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'hp@gmail.com'),
(4, 'nguyenhuuthang', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'thang@gmail.com'),
(5, 'Trọng Trường', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'truong@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tentheloai` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`id`, `tentheloai`) VALUES
(1, 'phone'),
(2, 'tablet');

-- --------------------------------------------------------

--
-- Table structure for table `thuonghieu`
--

CREATE TABLE `thuonghieu` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tenhang` varchar(255) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `thuonghieu`
--

INSERT INTO `thuonghieu` (`id`, `tenhang`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Oppo'),
(4, 'Vivo'),
(5, 'Xiaomi'),
(6, 'Nokia'),
(7, 'Realme'),
(8, 'Oneplus');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `sanpham` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
