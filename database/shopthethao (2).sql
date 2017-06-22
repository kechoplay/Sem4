-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 04:39 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopthethao`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fullname` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `level` tinyint(2) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_access` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `user`, `pass`, `fullname`, `email`, `level`, `status`, `created_at`, `last_access`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Kieu Tung Son', 'kechoplay@gmail.com', 1, 1, '2017-05-20 09:36:32', '2017-05-31 02:35:52'),
(2, 'tungson', '57bae066e1fc75964b413019aa1681f2', 'Tung Son', 'admin@admin.com', 2, 1, '2017-05-22 07:12:13', '2017-05-31 02:15:16');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `parent_id` int(11) NOT NULL,
  `sort_order` int(11) NOT NULL,
  `cat_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`cat_id`, `cat_name`, `parent_id`, `sort_order`, `cat_status`) VALUES
(1, 'Đồ đá bóng', 0, 1, 1),
(2, 'Giầy thể thao', 0, 2, 1),
(3, 'Máy tập thể thao', 0, 3, 1),
(4, 'Đồ tập gym', 0, 4, 1),
(5, 'Áo đá bóng', 1, 1, 1),
(6, 'Áo khoác đá bóng', 1, 2, 1),
(7, 'Túi đựng giầy', 1, 3, 1),
(8, 'Găng tay thủ môn', 1, 4, 1),
(9, 'Giầy đá bóng', 2, 1, 1),
(10, 'Giầy chạy bộ nam', 2, 2, 1),
(11, 'Giầy chạy bộ nữ', 2, 3, 1),
(12, 'Máy tập cơ bụng', 3, 1, 1),
(13, 'Máy tập tổng hợp', 3, 2, 1),
(14, 'Máy chạy bộ', 3, 3, 1),
(15, 'Quần áo tập gym nam', 4, 1, 1),
(16, 'Quần áo tập gym nữ', 4, 2, 1),
(17, 'Găng tay tập gym', 4, 3, 1),
(18, 'Dụng cụ phòng tập', 4, 4, 1),
(19, 'Dụng cụ thể hình', 4, 5, 1),
(21, 'ád', 0, 5, 1),
(23, 'hfgh', 21, 1, 1),
(26, 'ertrt', 0, 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `ord_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `total` double NOT NULL,
  `ord_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ord_payment` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `ord_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`ord_id`, `cus_id`, `name`, `mobile`, `address`, `total`, `ord_date`, `ord_payment`, `ord_status`) VALUES
(1, 1, 'Kieu Son Tung', '01645220249', 'da nang', 46080000, '2017-05-14 22:36:35', 'Thanh toán trực tiếp', 3),
(2, 1, 'Kieu Son Tung', '01645220249', 'da nang', 26835000, '2017-05-14 22:38:34', 'Thanh toán trực tiếp', 2),
(3, 1, 'Kieu Son Tung', '01645220249', 'da nang', 55640000, '2017-05-14 22:40:11', 'Thanh toán trực tiếp', 0),
(4, 1, 'Kieu Son Tung', '01645220249', 'da nang', 57100000, '2017-05-14 22:47:45', 'Thanh toán trực tiếp', 0),
(5, 1, 'Kieu Son Tung', '01645220249', '120 Xuan Dinh', 120000000, '2017-05-15 14:53:20', 'Thanh toán trực tiếp', 0),
(6, 6, 'ABC', '01234567987', '29,accc', 3705000, '2017-05-15 23:05:51', 'Thanh toán trực tiếp', 0),
(7, 6, 'ABC', '01234567987', '29 - acb', 110000, '2017-05-15 23:07:25', 'Thanh toán trực tiếp', 0),
(8, 6, 'ABC', '01234567987', '29 - acb', 380000, '2017-05-15 23:08:02', 'Thanh toán trực tiếp', 0),
(9, 6, 'ABC', '01234567987', '29 - acb', 110000, '2017-05-15 23:12:00', 'Thanh toán trực tiếp', 0),
(10, 5, 'Kiều Tùng1', '01645220249', '132 xuan dinh', 1550000, '2017-05-26 08:40:53', 'Thanh toán trực tiếp', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `ord_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`ord_id`, `pro_id`, `number`, `price`) VALUES
(1, 76, 6, 180000),
(1, 91, 1, 49000000),
(2, 78, 4, 240000),
(2, 81, 5, 175000),
(2, 94, 1, 28000000),
(3, 78, 5, 240000),
(3, 79, 6, 240000),
(3, 93, 1, 57000000),
(4, 80, 5, 340000),
(4, 82, 6, 400000),
(4, 93, 1, 57000000),
(5, 109, 1, 120000000),
(6, 2, 2, 110000),
(6, 38, 2, 1595000),
(6, 80, 1, 340000),
(7, 2, 1, 110000),
(8, 15, 1, 380000),
(9, 2, 1, 110000),
(10, 31, 1, 1550000);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `cus_id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) CHARACTER SET latin1 NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 NOT NULL,
  `mobile` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`cus_id`, `username`, `password`, `fullname`, `email`, `mobile`, `address`, `status`) VALUES
(1, 'tungvodoi', '0f043c901ac151f0e881bb1428b7d8af', 'Kieu Son Tung', 'kechoplay1@gmail.com', '01645220249', ' xuân đỉnh', 1),
(2, 'sontung', '781e5e245d69b566979b86e28d23f2c7', '', 'k6cda01.kstung@aptech.vn', '0123456798', '', 1),
(5, 'tung1234', '2b8e62db32a33c6ebdea512ee39bfd46', 'Kiều Tùng2', 'tung@gmail.com', '01645220249', '123 Phạm Hùng1', 1),
(6, 'thanhha', '02ca9f484a9cabf9d7ae770dea06f550', 'ABC', 'thanhha@gmail.com', '01234567987', 'abcad dÄƒc', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `pro_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `pro_name` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `pro_price` double NOT NULL,
  `pro_discount` double NOT NULL,
  `pro_image` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `pro_description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `pro_quantity` int(11) NOT NULL,
  `pro_count_buy` int(11) NOT NULL DEFAULT '0',
  `pro_view` int(11) NOT NULL DEFAULT '0',
  `pro_status` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`pro_id`, `cat_id`, `pro_name`, `pro_price`, `pro_discount`, `pro_image`, `pro_description`, `pro_quantity`, `pro_count_buy`, `pro_view`, `pro_status`) VALUES
(1, 5, 'Áo Chelsea tay dài 2016 2017 sân nhà', 130000, 0, 'ao_dau_Chelsea_tay_dai_san_nha_2016_2017_mau_xanh_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O CHELSEA TAY D&amp;Agrave;I 2016 2017 S&amp;Acirc;N NH&amp;Agrave; MẦU XANH&lt;/h2&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Mẫu &amp;aacute;o Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&lt;span style=&quot;background-color:#ffffff; color:#444444; font-family:Arial,Helvetica,sans-serif; font-size:14px&quot;&gt;&amp;nbsp;mới tự h&amp;agrave;o về một thiết kế cổ điển. Lấy cảm hứng từ truyển thống di sản của c&amp;acirc;u lạc bộ. Adidas vẫn l&amp;agrave; nh&amp;agrave; thiết kế &amp;aacute;o đấu, Yokohama vẫn l&amp;agrave; nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh cho &amp;aacute;o đấu Chelsea m&amp;ugrave;a giải 2016 2017.&lt;/span&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Đồ đ&amp;aacute; banh&amp;nbsp;&lt;strong&gt;&amp;aacute;o Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;l&amp;agrave; sự kết hợp của m&amp;agrave;u xanh v&amp;agrave; m&amp;agrave;u trắng, bộ &amp;aacute;o s&amp;acirc;n nh&amp;agrave; của Chelsea m&amp;ugrave;a giải 2016-2017 sẽ c&amp;oacute; một thiết kế hiện đại v&amp;agrave; đơn giản giống phong c&amp;aacute;ch thiết kế &amp;aacute;o đấu của Adidas tại Euro 2016.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&amp;Aacute;o đấu Chelsea m&amp;ugrave;a giải 2016-2017 vẫn do Adidas thiết kế v&amp;agrave; sản xuất, với mẫu &amp;aacute;o đấu Chelsea tay d&amp;agrave;i 2017 s&amp;acirc;n nh&amp;agrave; c&amp;oacute; m&amp;agrave;u xanh truyền thống. C&amp;ograve;n mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o đấu Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;, s&amp;acirc;n kh&amp;aacute;ch ba sẽ c&amp;oacute; m&amp;agrave;u trắng v&amp;agrave; m&amp;agrave;u đen.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;aacute;o Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave; m&amp;agrave;u xanh&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh vẫn l&amp;agrave; Yokohama. Dự kiến&lt;strong&gt;&amp;nbsp;mẫu &amp;aacute;o&amp;nbsp;Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;sẽ được c&amp;ocirc;ng bố v&amp;agrave;o th&amp;aacute;ng 5 tới, sau khi kết th&amp;uacute;c m&amp;ugrave;a giải Premier League 2015-2016.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave; h&amp;igrave;nh ảnh&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave; mầu xanh&lt;/strong&gt;, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute; mẫu &amp;aacute;o đấu d&amp;agrave;i tay s&amp;acirc;n nh&amp;agrave; mới nhất của clb Chelsea m&amp;ugrave;a giải 2016 2017.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Chelsea_tay_dai_san_nha_2016_2017_mau_xanh_600x900.jpg&quot; style=&quot;float:right; height:200px; width:200px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;Aacute;o đấu Chelsea tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&lt;span style=&quot;background-color:#ffffff; color:#444444; font-family:Arial,Helvetica,sans-serif; font-size:14px&quot;&gt;&amp;nbsp;c&amp;oacute; thiết kế đẹp, với t&amp;ocirc;ng m&amp;agrave;u chủ đạo vẫn l&amp;agrave; m&amp;agrave;u xanh truyền thống của c&amp;acirc;u lạc bộ, mẫu &amp;aacute;o được thiết kế đẹp, bắt mắt, lấy cảm hứng từ những ch&amp;uacute; sư tử in tr&amp;ecirc;n Logo chelsea, lấy cảm hứng từ truyền thống v&amp;agrave; di sản của Chelsea FC. Cổ &amp;aacute;o c&amp;oacute; thiết kế kiểu tr&amp;aacute;i tim, b&amp;ecirc;n cạnh đ&amp;oacute; l&amp;agrave; c&amp;aacute;c đường cổ giả dạng polo như c&amp;aacute;c mẫu &amp;aacute;o nga, T&amp;acirc;y Ban Nha Euro 2016, ống tay &amp;aacute;o c&amp;oacute; viền m&amp;agrave;u trắng bao quanh&lt;/span&gt;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(2, 5, 'Áo Chelsea 2016 2017 sân nhà', 110000, 0, 'ao_dau_Chelsea_san_nha_2016_2017_mau_xanh_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O CHELSEA 2016 2017 S&amp;Acirc;N NH&amp;Agrave; M&amp;Agrave;U XANH&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;mới tự h&amp;agrave;o về một thiết kế cổ điển. Lấy cảm hứng từ truyển thống di sản của c&amp;acirc;u lạc bộ. Adidas vẫn l&amp;agrave; nh&amp;agrave; thiết kế &amp;aacute;o đấu, Yokohama vẫn l&amp;agrave; nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh cho &amp;aacute;o đấu Chelsea m&amp;ugrave;a giải 2016 2017&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Đồ đ&amp;aacute; banh&amp;nbsp;&lt;strong&gt;&amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;l&amp;agrave; sự kết hợp của m&amp;agrave;u xanh v&amp;agrave; m&amp;agrave;u trắng, bộ &amp;aacute;o s&amp;acirc;n nh&amp;agrave; của Chelsea m&amp;ugrave;a giải 2016-2017 sẽ c&amp;oacute; một thiết kế hiện đại v&amp;agrave; đơn giản giống phong c&amp;aacute;ch thiết kế &amp;aacute;o đấu của Adidas tại Euro 2016.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&amp;Aacute;o đấu Chelsea m&amp;ugrave;a giải 2016-2017 vẫn do Adidas thiết kế v&amp;agrave; sản xuất, với mẫu &amp;aacute;o đấu Chelsea 2017 s&amp;acirc;n nh&amp;agrave; c&amp;oacute; m&amp;agrave;u xanh truyền thống. C&amp;ograve;n mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o đấu Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;, s&amp;acirc;n kh&amp;aacute;ch ba sẽ c&amp;oacute; m&amp;agrave;u trắng v&amp;agrave; m&amp;agrave;u đen.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave; m&amp;agrave;u xanh&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh vẫn l&amp;agrave; Yokohama. Dự kiến&lt;strong&gt;&amp;nbsp;mẫu &amp;aacute;o&amp;nbsp;Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;sẽ được c&amp;ocirc;ng bố v&amp;agrave;o th&amp;aacute;ng 5 tới, sau khi kết th&amp;uacute;c m&amp;ugrave;a giải Premier League 2015-2016.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave; h&amp;igrave;nh ảnh&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave; mầu xanh&lt;/strong&gt;, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute; mẫu &amp;aacute;o đấu s&amp;acirc;n nh&amp;agrave; mới nhất của clb Chelsea m&amp;ugrave;a giải 2016 2017.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Chelsea_san_nha_2016_2017_mau_xanh_600x900.jpg&quot; style=&quot;height:300px; width:300px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;&amp;Aacute;o đấu Chelsea 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&lt;span style=&quot;background-color:#ffffff; color:#444444; font-family:Arial,Helvetica,sans-serif; font-size:14px&quot;&gt;&amp;nbsp;c&amp;oacute; thiết kế đẹp, với t&amp;ocirc;ng m&amp;agrave;u chủ đạo vẫn l&amp;agrave; m&amp;agrave;u xanh truyền thống của c&amp;acirc;u lạc bộ, mẫu &amp;aacute;o được thiết kế đẹp, bắt mắt, lấy cảm hứng từ những ch&amp;uacute; sư tử in tr&amp;ecirc;n Logo chelsea, lấy cảm hứng từ truyền thống v&amp;agrave; di sản của Chelsea FC. Cổ &amp;aacute;o c&amp;oacute; thiết kế kiểu tr&amp;aacute;i tim, b&amp;ecirc;n cạnh đ&amp;oacute; l&amp;agrave; c&amp;aacute;c đường cổ giả dạng polo như c&amp;aacute;c mẫu &amp;aacute;o nga, T&amp;acirc;y Ban Nha Euro 2016, ống tay &amp;aacute;o c&amp;oacute; viền m&amp;agrave;u trắng bao quanh.&lt;/span&gt;&lt;/p&gt;\r\n', 6, 4, 5, 1),
(3, 5, 'Áo Chelsea 2016 2017 sân khách đen viền chuôi', 110000, 0, 'ao_dau_Chelsea_san_khach_2016_2017_mau_xam_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O CHELSEA 2016 2017 S&amp;Acirc;N KH&amp;Aacute;CH ĐEN VIỀN CHUỐI&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;C&amp;aacute;c mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch v&amp;agrave; s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;được thiết kế bởi Adidas. Đ&amp;acirc;y l&amp;agrave; m&amp;ugrave;a giải cuối c&amp;ugrave;ng Adidas thiết kế &amp;aacute;o đấu cho Chelsea, thay v&amp;agrave;o đ&amp;oacute; Nike sẽ thiết kế &amp;aacute;o đấu cho c&amp;acirc;u lạc bộ th&amp;agrave;nh Lu&amp;acirc;n Đ&amp;ocirc;n từ m&amp;ugrave;a giải sau 2017-2018.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch c&amp;oacute; m&amp;agrave;u đen&lt;/strong&gt;&amp;nbsp;l&amp;agrave;m chủ đạo thay v&amp;igrave; m&amp;agrave;u trắng như mọi năm. Mặt trước &amp;aacute;o đấu c&amp;oacute; c&amp;aacute;c sọc m&amp;agrave;u x&amp;aacute;m mờ l&amp;agrave;m điểm nhấn của chiếc &amp;aacute;o đấu. C&amp;aacute;c chi tiết ph&amp;ocirc;i ở hai b&amp;ecirc;n vai &amp;aacute;o v&amp;agrave; c&amp;aacute;nh tay c&amp;oacute; m&amp;agrave;u v&amp;agrave;ng nổi bật. Cổ &amp;aacute;o được thiết kế dạng cổ tr&amp;ograve;n đơn giản.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch đen viền chuối&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh vẫn l&amp;agrave; Yokohama. Dự kiến &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch sẽ được c&amp;ocirc;ng bố v&amp;agrave;o th&amp;aacute;ng 7, sau khi kết th&amp;uacute;c Euro 2016&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave;&amp;nbsp;&lt;strong&gt;h&amp;igrave;nh ảnh mẫu &amp;aacute;o Chelsea 2016 2017 s&amp;acirc;n kh&amp;aacute;ch đen viền chuối&lt;/strong&gt;, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute; mẫu &amp;aacute;o đấu s&amp;acirc;n kh&amp;aacute;ch mới nhất của clb Chelsea m&amp;ugrave;a giải 2016 2017.&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Chelsea_san_khach_2016_2017_mau_xam_600x850.jpg&quot; style=&quot;height:300px; width:200px&quot; /&gt;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(4, 5, 'Áo Real Madrid tay dài 2016 2017 sân nhà màu trắng', 130000, 0, 'ao_dau_Real_tay_dai_san_nha_2016_2017_mau_trang_270x350-1.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O REAL MADRID TAY D&amp;Agrave;I 2016 2017 S&amp;Acirc;N NH&amp;Agrave; M&amp;Agrave;U TRẮNG&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mới đ&amp;acirc;y,&amp;nbsp;&lt;strong&gt;Mẫu &amp;aacute;o&amp;nbsp;Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;bị r&amp;ograve; rỉ tr&amp;ecirc;n mạng. Những h&amp;igrave;nh ảnh đầu ti&amp;ecirc;n&amp;nbsp;&lt;strong&gt;&amp;aacute;o đấu Real Madrid d&amp;agrave;i tay 2016 2017&lt;/strong&gt;cho thấy mẫu &amp;aacute;o s&amp;acirc;n nh&amp;agrave; sẽ l&amp;agrave; sự kết hợp m&amp;agrave;u trắng với m&amp;agrave;u t&amp;iacute;m nhạt. C&amp;ograve;n mẫu&lt;strong&gt;&amp;nbsp;&amp;aacute;o Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;sẽ c&amp;oacute; m&amp;agrave;u t&amp;iacute;m l&amp;agrave;m m&amp;agrave;u chủ đạo.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;M&amp;ugrave;a b&amp;oacute;ng 2015-2016 đang khởi trang v&amp;ocirc; c&amp;ugrave;ng s&amp;ocirc;i động. Cả thế giới đang d&amp;otilde;i theo từng nhịp của tr&amp;aacute;i b&amp;oacute;ng lăn. Cũng như thường lệ m&amp;ugrave;a b&amp;oacute;ng mới c&amp;aacute;c c&amp;acirc;u lạc bộ sẽ cho ra c&amp;aacute;c mẫu&amp;nbsp;&lt;a href=&quot;http://dothethao.net.vn/danh-muc/do-da-banh/ao-cau-lac-bo/&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; font-family: Arial, Helvetica, sans-serif; text-decoration: none; outline: 0px; transition: color 0.3s linear; color: rgb(24, 149, 45);&quot; target=&quot;_blank&quot; title=&quot;&aacute;o b&oacute;ng đ&aacute;&quot;&gt;&lt;strong&gt;&amp;aacute;o b&amp;oacute;ng đ&amp;aacute;&lt;/strong&gt;&lt;/a&gt;&amp;nbsp;mới. Theo c&amp;aacute;c nguồn tin r&amp;ograve; rỉ năm 2016 &amp;ndash; 2017 ch&amp;uacute;ng ta c&amp;oacute; thể c&amp;oacute; những bộ&amp;nbsp;&lt;a href=&quot;http://dothethao.net.vn/danh-muc/do-da-banh/ao-cau-lac-bo/&quot; style=&quot;margin: 0px; padding: 0px; border: 0px; font-style: inherit; font-variant: inherit; font-weight: bold; font-stretch: inherit; font-size: inherit; line-height: inherit; vertical-align: baseline; font-family: Arial, Helvetica, sans-serif; text-decoration: none; outline: 0px; transition: color 0.3s linear; color: rgb(24, 149, 45);&quot; target=&quot;_blank&quot; title=&quot;quần &aacute;o đ&aacute; banh&quot;&gt;quần &amp;aacute;o b&amp;oacute;ng đ&amp;aacute; &amp;nbsp;clb 2016 2017&lt;/a&gt;&amp;nbsp;mới nhất sau đ&amp;acirc;y:&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Th&amp;ocirc;ng tin ngay sau đ&amp;acirc;y l&amp;agrave;&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&amp;nbsp;&lt;/strong&gt;mới nhất&amp;nbsp;được trang b&amp;aacute;o nước ngo&amp;agrave;i chia sẻ ch&amp;iacute;nh v&amp;igrave; vậy m&amp;agrave; ch&amp;uacute;ng t&amp;ocirc;i cũng muốn chia sẻ đến cho bạn th&amp;ocirc;ng tin mới nhất n&amp;agrave;y về &amp;aacute;o đấu của Real. Chưa biết trong tương lại đội b&amp;oacute;ng Real c&amp;oacute; thiết kế như vậy kh&amp;ocirc;ng những đ&amp;acirc;y l&amp;agrave; một th&amp;ocirc;ng tin kh&amp;aacute; đặc biệt m&amp;agrave; bạn c&amp;oacute; thể biết v&amp;agrave; hi vọng đội b&amp;oacute;ng m&amp;igrave;nh y&amp;ecirc;u th&amp;iacute;ch sẽ cho ra mắt mẫu &amp;aacute;o đấu đẹp nhất.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;aacute;o&amp;nbsp;Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave; mầu trắng&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Theo nguy&amp;ecirc;n tắc thiết kế c&amp;aacute;c mẫu &amp;aacute;o đấu tại&amp;nbsp;&lt;em&gt;Euro 2016&lt;/em&gt;&amp;nbsp;của Adidas cho thấy&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Real Madrid tay d&amp;agrave;i s&amp;acirc;n nh&amp;agrave; 2016 2017&lt;/strong&gt;sẽ c&amp;oacute; m&amp;agrave;u trắng, ba sọc Adidas ở hai b&amp;ecirc;n h&amp;ocirc;ng &amp;aacute;o sẽ c&amp;oacute; m&amp;agrave;u t&amp;iacute;m nhạt.&amp;nbsp;&lt;strong&gt;&amp;Aacute;o đấu Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;được thiết kế dựa tr&amp;ecirc;n cảm hững mẫu &amp;aacute;o Real Madrid năm 1902. Logo c&amp;acirc;u lặc bộ vẫn giữ nguy&amp;ecirc;n m&amp;agrave;u sắc, trong khi logo nh&amp;agrave; thiết kế Adidas sẽ c&amp;oacute; m&amp;agrave;u xanh. Quần Short dự kiến cũng sẽ c&amp;oacute; m&amp;agrave;u trắng với c&amp;aacute;c sọc t&amp;iacute;m. Lần gần đ&amp;acirc;y nhất mẫu &amp;aacute;o Real Madrid s&amp;acirc;n nh&amp;agrave; c&amp;oacute; sự kết hợp giữ m&amp;agrave;u trắng v&amp;agrave; m&amp;agrave;u t&amp;iacute;m v&amp;agrave;o m&amp;ugrave;a giải 07-08.&lt;br /&gt;\r\nH&amp;igrave;nh ảnh mới nhất về&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o&amp;nbsp;Real Madrid tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;đ&amp;oacute; l&amp;agrave; mẫu &amp;aacute;o kết hợp &amp;nbsp;m&amp;agrave;u trắng với m&amp;agrave;u t&amp;iacute;m nhạt.&amp;nbsp;C&amp;ograve;n mẫu &amp;aacute;o s&amp;acirc;n kh&amp;aacute;ch của Real Madrid d&amp;agrave;i tay 2016 2017 sẽ c&amp;oacute; m&amp;agrave;u t&amp;iacute;m l&amp;agrave;m m&amp;agrave;u chủ đạo&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Real_tay_dai_san_nha_2016_2017_mau_trang_600x850.jpg&quot; style=&quot;height:723px; width:600px&quot; /&gt;.&lt;/p&gt;\r\n', 10, 0, 1, 1),
(5, 5, 'Áo Real Madrid phiên bản Fan 2017 2018 tím than', 230000, 0, 'ao_Real_ban_fan_2017_2018_xanh_den_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&amp;Aacute;O REAL MADRID PHI&amp;Ecirc;N BẢN FAN 2017 2018 T&amp;Iacute;M THAN&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Sau th&amp;ocirc;ng tin đ&amp;aacute;ng tin cậy t&amp;agrave;i khoản Twitter Jack Henderson đ&amp;atilde; r&amp;ograve; rỉ&amp;nbsp;&lt;strong&gt;mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than&lt;/strong&gt;&amp;nbsp;v&amp;agrave; ch&amp;uacute;ng t&amp;ocirc;i mang đến cho bạn những th&amp;ocirc;ng tin độc quyền đầu ti&amp;ecirc;n tr&amp;ecirc;n &amp;aacute;o Real Madrid m&amp;ugrave;a giải mới 2017 2018, nh&amp;agrave; thiết kế nổi tiếng Franco Carabajal đ&amp;atilde; tạo ra một thiết kế tuyệt đẹp.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than sẽ được tung ra v&amp;agrave;o th&amp;aacute;ng S&amp;aacute;u năm 2017, &amp;aacute;o đấu Real Madrid 2017/18 &amp;aacute;o sẽ c&amp;oacute; th&amp;ecirc;m m&amp;agrave;u teal v&amp;agrave; m&amp;agrave;u bạc bạc để bổ sung cho&amp;nbsp;m&amp;agrave;u trắng truyền thống.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than đi k&amp;egrave;m c&amp;aacute;c họa tiết mặt trước &amp;aacute;o rất bắt mắt, trong khi c&amp;aacute;c viền &amp;aacute;o v&amp;agrave; quần m&amp;agrave;u t&amp;iacute;m than. Để l&amp;agrave;m tr&amp;ograve;n thiết kế, đồ họa tinh tế l&amp;agrave; đặc trưng tr&amp;ecirc;n mặt trước mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than&lt;/h3&gt;\r\n\r\n&lt;p&gt;&lt;span style=&quot;background-color:#ffffff; color:#444444; font-family:Arial,Helvetica,sans-serif; font-size:14px&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave; h&amp;igrave;nh ảnh mẫu &amp;Aacute;o Real Madrid phi&amp;ecirc;n bản Fan 2017 2018 t&amp;iacute;m than, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute; m&amp;acirc;u &amp;aacute;o đấu mới nhất của clb Real m&amp;ugrave;a giải 2017 2018.&lt;/span&gt; &lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_Real_ban_fan_2017_2018_xanh_den_600x800.jpg&quot; style=&quot;height:800px; margin-left:100px; margin-right:100px; width:600px&quot; /&gt;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(6, 5, 'Áo MU tay dài 2016 2017 sân nhà mầu đỏ', 130000, 0, 'ao_dau_Man_United_tay_dai_san_nha_2016_2017_mau_do_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O MU TAY D&amp;Agrave;I 2016 2017 S&amp;Acirc;N NH&amp;Agrave; MẦU ĐỎ&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;M&amp;ugrave;a giải mới 2016 2017 c&amp;ograve;n chưa khởi tranh nhưng ngay từ b&amp;acirc;y giờ c&amp;aacute;c c&amp;acirc;u lạc bộ đ&amp;atilde; bắt đầu thiết kế những mẫu &amp;aacute;o đấu mới cho m&amp;ugrave;a giải 2016 2017. Shop thể thao Sơn T&amp;ugrave;ng Sport&amp;nbsp;sẽ li&amp;ecirc;n tục cập nhật những mẫu &amp;aacute;o đấu mới nhất m&amp;ugrave;a giải 2016 2017&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mẫu &amp;aacute;o MU tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave; mới nhất&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Mới đ&amp;acirc;y,&lt;strong&gt;&amp;nbsp;mẫu &amp;aacute;o&amp;nbsp;MU tay d&amp;agrave;i&amp;nbsp;2016 2017 s&amp;acirc;n nh&amp;agrave;&amp;nbsp;&lt;/strong&gt;mới nhất đ&amp;atilde; bị r&amp;ograve; rỉ. Những h&amp;igrave;nh ảnh đ&amp;acirc;u ti&amp;ecirc;n về&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o MU tay d&amp;agrave;i&amp;nbsp;2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;cho thấy một thiết kế 2 m&amp;agrave;u đỏ tr&amp;ecirc;n mặt trước &amp;aacute;o. Lần cuối c&amp;ugrave;ng Manchester United sử dụng mẫu &amp;aacute;o c&amp;oacute; thiết kế tương tự như vậy v&amp;agrave;o m&amp;ugrave;a giải 1992-1993.&amp;nbsp;&lt;em&gt;Shop thể thao Sơn T&amp;ugrave;ng Sport&lt;/em&gt;&amp;nbsp;xin giới thiệt những h&amp;igrave;nh ảnh đầu ti&amp;ecirc;n về mẫu &amp;aacute;o Manchester United m&amp;ugrave;a giải 2016 2017.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;M&amp;ugrave;a giải thứ hai Adidas l&amp;agrave; nh&amp;agrave; thiết kế &amp;aacute;o đấu cho c&amp;acirc;u lạc bộ Manchester united.&amp;nbsp;&lt;strong&gt;Mẫu &amp;aacute;o MU tay d&amp;agrave;i&amp;nbsp;2016 2017 s&amp;acirc;n nh&lt;/strong&gt;&amp;agrave; sẽ c&amp;oacute; một thiết kế mang t&amp;iacute;nh c&amp;aacute;ch mạng với kiểu thiết kế nửa m&amp;agrave;u.&lt;br /&gt;\r\nPh&amp;aacute;t triển từ&amp;nbsp;&lt;strong&gt;bộ &amp;aacute;o đấu MU tay d&amp;agrave;i&amp;nbsp;m&amp;ugrave;a giải 2015-2016&lt;/strong&gt;,&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o mới của MU tay d&amp;agrave;i&amp;nbsp;m&amp;ugrave;a giải 2016 2017&lt;/strong&gt;&amp;nbsp;cũng được thiết kế theo phong c&amp;aacute;ch &amp;aacute;o đấu của Adidas tại&amp;nbsp;&lt;strong&gt;kỳ Euro 2016 tại Ph&amp;aacute;p&lt;/strong&gt;.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave;&amp;nbsp;&lt;strong&gt;h&amp;igrave;nh ảnh mẫu &amp;aacute;o MU d&amp;agrave;i tay&amp;nbsp;21016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;, mời c&amp;aacute;c fans h&amp;acirc;m mộ đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute; gi&amp;aacute; mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o đấu tay d&amp;agrave;i mới nhất của Manchester United m&amp;ugrave;a giải 2016 2017&lt;/strong&gt;.&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Man_United_tay_dai_san_nha_2016_2017_mau_do_600x850.jpg&quot; style=&quot;height:727px; margin-left:120px; margin-right:120px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Man_United_tay_dai_san_nha_2016_2017_mau_do_mat_sau_600x850.jpg&quot; style=&quot;height:737px; margin-left:120px; margin-right:120px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Quần &amp;aacute;o MU&amp;nbsp;tay d&amp;agrave;i 2016 2017 s&amp;acirc;n nh&amp;agrave; m&amp;agrave;u đỏ&amp;nbsp;&lt;/strong&gt;h&amp;agrave;ng thun lạnh , chất vải co gi&amp;atilde;n tốt , thun mặc tho&amp;aacute;ng m&amp;aacute;t , mềm mịn , thấm h&amp;uacute;t mồ h&amp;ocirc;i . Tay &amp;aacute;o c&amp;oacute; l&amp;oacute;t m&amp;uacute;t mềm .&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Chất liệu vải kh&amp;ocirc; tho&amp;aacute;ng, nhẹ, thấm h&amp;uacute;t mồ h&amp;ocirc;i tốt, kh&amp;ocirc;ng khiến người mặc cảm thấy bức b&amp;iacute;, kh&amp;oacute; chịu. Chất liệu n&amp;agrave;y cũng kh&amp;ocirc;ng bị co lại, gi&amp;atilde;n hoặc nhăn sau khi giặt v&amp;agrave; rất nhanh kh&amp;ocirc; kể cả trong thời tiết ẩm ướt. Khi bạn vận động v&amp;agrave; ra nhiều mồ h&amp;ocirc;i, những lỗ nhỏ li ti tr&amp;ecirc;n mặt &amp;aacute;o sẽ thấm h&amp;uacute;t mồ h&amp;ocirc;i nhanh ch&amp;oacute;ng để bạn thấy thoải m&amp;aacute;i v&amp;agrave; dễ chịu hơn.&lt;/p&gt;\r\n', 10, 0, 1, 1),
(7, 5, 'Áo MU 2015-2016 sân khách Fake 1 Thái Lan', 160000, 130000, 'ao_mu_2015_2016_san_khach_body_fit_super_fake_thai_lan_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH MU 2015-2016 S&amp;Acirc;N KH&amp;Aacute;CH M&amp;Agrave;U TRẮNG FAKE 1 TH&amp;Aacute;I LAN&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Bộ trang phục Manchester United 2015-2016 s&amp;acirc;n kh&amp;aacute;ch fake 1 Th&amp;aacute;i Lan&lt;/strong&gt;&amp;nbsp;c&amp;oacute; &amp;aacute;o m&amp;agrave;u trắng m&amp;ugrave;a trước&amp;nbsp;của c&amp;acirc;u lạc bộ. Ba đường sọc b&amp;ecirc;n vai m&amp;agrave;u đen, logo nh&amp;agrave; thiết kế &amp;aacute;o c&amp;oacute; m&amp;agrave;u đen. Logo nh&amp;agrave; t&amp;agrave;i trợ ch&amp;iacute;nh CHEVROLET được giữ nguy&amp;ecirc;n bản. So với trang phục hiện tại của MU, bộ &amp;aacute;o&amp;nbsp;mới n&amp;agrave;y được đ&amp;aacute;nh gi&amp;aacute; l&amp;agrave; h&amp;agrave;i h&amp;ograve;a v&amp;agrave; khỏe khoắn hơn hẳn. Adidas đ&amp;atilde; th&amp;ecirc;m v&amp;agrave;o c&amp;aacute;c đường kẻ sọc tr&amp;ecirc;n th&amp;acirc;n &amp;aacute;o v&amp;agrave; những lỗ tho&amp;aacute;t kh&amp;iacute; dưới tay &amp;aacute;o, đ&amp;uacute;ng với truyền thống thiết kế của m&amp;igrave;nh. Tuy nhi&amp;ecirc;n&amp;nbsp;c&amp;oacute; một v&amp;agrave;i &amp;yacute; kiến cho rằng, chiếc &amp;aacute;o mới của M.U do Adidas sản xuất năm nay kh&amp;aacute; giống với nhiều mẫu &amp;aacute;o c&amp;acirc;u lạc bộ m&amp;agrave; adidas đ&amp;atilde; thiết kế.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Manchester United 2015-2016 s&amp;acirc;n kh&amp;aacute;ch m&amp;agrave;u trắng Fake 1 Th&amp;aacute;i Lan&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave;&amp;nbsp;&lt;strong&gt;h&amp;igrave;nh ảnh mẫu &amp;aacute;o MU m&amp;ugrave;a giải mới 2015-2016 s&amp;acirc;n kh&amp;aacute;ch fake 1&amp;nbsp;&lt;/strong&gt;&amp;nbsp;do adidas thiết kế v&amp;agrave; đồng t&amp;agrave;i trợ, mời c&amp;aacute;c bạn c&amp;ugrave;ng chi&amp;ecirc;m ngưỡng mẫu &amp;aacute;o đấu n&amp;agrave;y:&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_mu_2015_2016_san_khach_body_fit_super_fake_thai_lan_600x900.jpg&quot; style=&quot;height:750px; margin-left:120px; margin-right:120px; width:500px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(8, 5, 'Áo Dortmund 2016 2017 sân nhà', 110000, 0, 'ao_dau_Dortmund_san_nha_2016_2017_vang_soc_den_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O DORTMUND 2016 2017 S&amp;Acirc;N NH&amp;Agrave; V&amp;Agrave;NG SỌC ĐEN&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;sẽ c&amp;oacute; m&amp;agrave;u v&amp;agrave;ng đi k&amp;egrave;m với quần m&amp;agrave;u v&amp;agrave;ng thay v&amp;igrave; quần m&amp;agrave;u đen hiện nay. Trong c&amp;aacute;c trận đấu s&amp;acirc;n nh&amp;agrave; của Dortmund m&amp;ugrave;a giải 2016 2017 c&amp;aacute;c cầu thủ sẽ mặc bộ trang phục m&amp;agrave;u v&amp;agrave;ng. Dự kiến mẫu &amp;aacute;o mới nhất của Dortmund sẽ được Puma giới thiệu sau kỳ Euro 2016.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;C&amp;aacute;c mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n nh&amp;agrave; v&amp;agrave; s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;sẽ được Puma thiết kế theo phong c&amp;aacute;ch ho&amp;agrave;n to&amp;agrave;n mới.&amp;nbsp;&lt;strong&gt;Mẫu &amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;c&amp;oacute; một thiết kế t&amp;aacute;o bạo v&amp;agrave; độc đ&amp;aacute;o với ba sọc m&amp;agrave;u đen ở mặt trước &amp;aacute;o. Một sọc lớn k&amp;eacute;o d&amp;agrave;i nằm ở trung t&amp;acirc;m l&amp;agrave;m điểm nhấn của chiếc &amp;aacute;o đấu.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o D&lt;/strong&gt;ortmund&lt;strong&gt;&amp;nbsp;2016 2017 s&amp;acirc;n nh&amp;agrave; v&amp;agrave;ng sọc đen&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave; h&amp;igrave;nh ảnh&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;m&amp;agrave;u v&amp;agrave;ng truyền thống, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute;&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o đấu mới của Dortmund 2016 2017&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Dortmund_san_nha_2016_2017_vang_soc_den_600x850.jpg&quot; style=&quot;height:850px; margin-left:120px; margin-right:120px; width:600px&quot; /&gt;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(9, 5, 'Áo Dortmund 2016 2017 sân khách đen sọc vàng', 110000, 0, 'ao_dau_Dortmund_san_khach_2016_2017_den_soc_vang_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O DORTMUND 2016 2017 S&amp;Acirc;N KH&amp;Aacute;CH ĐEN SỌC V&amp;Agrave;NG&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Dortmund 2016 2017&amp;nbsp;&lt;strong&gt;s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&lt;/strong&gt;&amp;nbsp;sẽ c&amp;oacute; m&amp;agrave;u v&amp;agrave;ng đi k&amp;egrave;m với quần m&amp;agrave;u v&amp;agrave;ng thay v&amp;igrave; quần m&amp;agrave;u đen hiện nay. Trong c&amp;aacute;c trận đấu s&amp;acirc;n kh&amp;aacute;ch của Dortmund m&amp;ugrave;a giải 2016 2017 c&amp;aacute;c cầu thủ sẽ mặc bộ trang phục m&amp;agrave;u v&amp;agrave;ng. Dự kiến mẫu &amp;aacute;o mới nhất của Dortmund sẽ được Puma giới thiệu sau kỳ Euro 2016&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;C&amp;aacute;c mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n nh&amp;agrave; v&amp;agrave; s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;sẽ được Puma thiết kế theo phong c&amp;aacute;ch ho&amp;agrave;n to&amp;agrave;n mới.&amp;nbsp;&lt;strong&gt;Mẫu &amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;c&amp;oacute; một thiết kế t&amp;aacute;o bạo v&amp;agrave; độc đ&amp;aacute;o với ba sọc m&amp;agrave;u đen ở mặt trước &amp;aacute;o. Một sọc lớn k&amp;eacute;o d&amp;agrave;i nằm ở trung t&amp;acirc;m l&amp;agrave;m điểm nhấn của chiếc &amp;aacute;o đấu.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o D&lt;/strong&gt;ortmund&lt;strong&gt;&amp;nbsp;2016 2017 s&amp;acirc;n kh&amp;aacute;ch đen sọc v&amp;agrave;ng&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;&amp;Aacute;o Dortmund 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;tự h&amp;agrave;o với một thiết kế lạ mắt v&amp;agrave; độc đ&amp;aacute;o. Với m&amp;agrave;u đen l&amp;agrave;m m&amp;agrave;u chủ đạo, mặt trước mẫu&amp;nbsp;&lt;strong&gt;&amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;với ba sọc m&amp;agrave;u v&amp;agrave;ng lớn v&amp;agrave; ba sọc m&amp;agrave;u v&amp;agrave;ng nhỏ hơn l&amp;agrave;m điểm nhấn của chiếc &amp;aacute;o. Cổ &amp;aacute;o được thiết kế dạng cổ chữ V hiện đại.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave; h&amp;igrave;nh ảnh&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o Dortmund 2016 2017 s&amp;acirc;n kh&amp;aacute;ch&lt;/strong&gt;&amp;nbsp;m&amp;agrave;u v&amp;agrave;ng truyền thống, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute;&amp;nbsp;&lt;strong&gt;mẫu &amp;aacute;o đấu mới của Dortmund 2016 2017&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Dortmund_san_khach_2016_2017_den_soc_vang_600x850.jpg&quot; style=&quot;height:850px; width:600px&quot; /&gt;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(10, 5, 'Áo Atletico Madrid 2016 2017 sân nhà', 110000, 0, 'ao_dau_Atletico_madrid_san_nha_2016_2017_270x350.jpg', '&lt;h2 style=&quot;font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;ĐỒ Đ&amp;Aacute; BANH &amp;Aacute;O ATLETICO MADRID 2016 2017 S&amp;Acirc;N NH&amp;Agrave;&lt;/h2&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Atletico Madrid 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;được thiết kế bởi Nike, vẫn l&amp;agrave; m&amp;agrave;u đỏ sọc trắng truyền thống của c&amp;acirc;u lạc bộ thủ đ&amp;ocirc; Madrid, mẫu &amp;aacute;o m&amp;ugrave;a giải mới được thiết kế kh&amp;aacute; giống với mẫu &amp;aacute;o Atletico 2015/16 thay v&amp;igrave; bỏ đi c&amp;aacute;c sọc nhỏ viền xung quang sọc lớn.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Cổ &amp;aacute;o&lt;/strong&gt;&amp;nbsp;&lt;strong&gt;Atletico Madrid 2016 2017 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;được thiết kế dạng cổ tr&amp;ograve;n hiện đại với đường viền m&amp;agrave;u xanh nổi bật. Hai b&amp;ecirc;n h&amp;ocirc;ng &amp;aacute;o cũng c&amp;oacute; c&amp;aacute;c sọc m&amp;agrave;u xanh kh&amp;aacute; đẹp mắt.&lt;/p&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Atletico Madrid 2016 2017 s&amp;acirc;n nh&amp;agrave; sọc đỏ trắng&lt;/strong&gt;&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;&lt;strong&gt;Mẫu &amp;aacute;o Atletico Madrid 2016/17 s&amp;acirc;n nh&amp;agrave;&lt;/strong&gt;&amp;nbsp;được Nike thiết kế đặc biệt h&amp;igrave;nh logo ph&amp;iacute;a b&amp;ecirc;n trong cố &amp;aacute;o để kỷ niệm 50 năm ng&amp;agrave;y th&amp;agrave;nh lập s&amp;acirc;n vận động&amp;nbsp;Vicente Calder&amp;oacute;n. Dự kiến quần Short đi k&amp;egrave;m sẽ c&amp;oacute; m&amp;agrave;u đỏ tr&amp;ugrave;ng với m&amp;agrave;u &amp;aacute;o đấu.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;margin-left:0px; margin-right:0px; text-align:start&quot;&gt;Dưới đ&amp;acirc;y l&amp;agrave;&amp;nbsp;&lt;strong&gt;h&amp;igrave;nh ảnh mẫu &amp;aacute;o&amp;nbsp;Atletico Madrid 2016 2017 s&amp;acirc;n nh&amp;agrave; sọc đỏ trắng&lt;/strong&gt;, mời c&amp;aacute;c bạn đ&amp;oacute;n xem, nhận định v&amp;agrave; đ&amp;aacute;nh gi&amp;aacute; mẫu &amp;aacute;o đấu mới nhất s&amp;acirc;n nh&amp;agrave; của clb Atletico Madrid m&amp;ugrave;a giải 2016/17&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;img alt=&quot;&quot; src=&quot;/upload/images/ao_dau_Atletico_madrid_san_nha_2016_2017_600x850.jpg&quot; style=&quot;height:850px; margin-left:120px; margin-right:120px; width:600px&quot; /&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(11, 6, 'Bộ quần áo khoác Real xám 2015-2016 Super Fake Thái Lan', 550000, 0, 'bo_khoac_training_real_madrid_2015_2016_xam_270x350.jpg', '', 10, 0, 0, 1),
(12, 6, 'Áo khoác MU xanh 2015-2016 Super Fake Thái Lan', 380000, 0, 'ao_khoac_mu_2015_2016_xanh_bich_270x350.jpg', '', 10, 0, 1, 1),
(13, 6, 'Bộ quần áo khoác Training Arsenal 2015-2016 đỏ phối đen', 550000, 500000, 'ao_khoac_training_arsenal_2015_2016_do_270x350.jpg', '', 10, 0, 0, 1),
(14, 6, 'Áo khoác Training Chelsea 2015-2016 trắng viền xanh', 550000, 0, 'ao_khoac_training_chelsea_2015_2016_trang_xanh_270x350.jpg', '', 10, 0, 0, 1),
(15, 6, 'Áo khoác Juventus 2015-2016 Super Fake Thái Lan', 380000, 0, 'ao_khoac_juventus_2015_2016_den_270x350.jpg', '', 9, 1, 1, 1),
(16, 7, 'Túi đựng giày đá banh Nike T90 Xanh', 60000, 0, 'tui-dung-giay-2-ngan-t90.jpg', '', 10, 0, 4, 1),
(17, 7, 'Túi đựng giày đá banh Bayern Munich 2014/15', 60000, 0, 'tui-dung-giay-clb-bayern-300x206.jpg', '', 10, 0, 0, 1),
(18, 7, 'Túi đựng giày đá banh Chelsea 2014/15', 60000, 0, 'dsc0014.jpg', '', 10, 0, 1, 1),
(19, 7, 'Túi đựng giày đá banh Barcelona 2014/15', 60000, 0, '1.jpg', '', 10, 0, 1, 1),
(20, 7, 'Túi đựng giày đá banh Real Madrid 2014/15', 60000, 0, 'dsc0054.jpg', '', 10, 0, 0, 1),
(21, 8, 'Găng tay thủ môn Power Inter Milan', 240000, 0, 'P1014657.jpg', '', 10, 0, 5, 1),
(22, 8, 'Găng tay thủ môn Nike T90 – Grip đỏ', 240000, 0, 'truoc1.jpg', '', 10, 0, 2, 1),
(23, 8, 'Găng tay thủ môn Adidas Pro màu đỏ', 250000, 0, 'truoc5-300x225.jpg', '', 10, 0, 0, 1),
(24, 8, 'Găng tay thủ môn Adidas Pro màu vàng', 250000, 0, 'gang-tay-thu-mon-adidas-pro-mau-vang-truoc1.png', '', 10, 0, 1, 1),
(25, 8, 'Găng tay thủ môn Nike Sports Xanh', 240000, 0, 'xanh-truoc.jpg', '', 10, 0, 0, 1),
(26, 9, 'Giày đá bóng Nike Bomba Finale II', 1700000, 0, 'giay_nike_mercurial_vapor_9_neptune_blue_tf20130324130555.jpg', '', 10, 0, 0, 1),
(27, 9, 'Giày Nike Bomba Finale II cam đen', 550000, 0, 'giay_nike_bomba_finale_ii_cam_den20130603214941.jpg', '', 10, 0, 0, 1),
(28, 9, 'Giày bóng đá Nike Mercurial Vapor IX TF bạc', 500000, 0, 'giay_bong_da_nike_mercurial_vapor_ix_tf_xam201302011328467.jpg', '', 9, 1, 2, 1),
(29, 9, 'Giày bóng đá Nike Mercurial Vapor IX TF cam', 500000, 0, 'giay_bong_da_nike_mercurial_vapor_ix_tf_cam20130201133413.jpg', '', 10, 0, 0, 1),
(30, 9, 'Giày Nike Mercurial Vapor IX CR7 TF đen', 500000, 0, 'giay_nike_mercurial_vapor_ix_cr7_tf_den20130505131057.jpg', '', 10, 0, 1, 1),
(31, 10, 'ADIDAS DURAMO 8 TRAINER- CORE BLACK/ FOOTWEAR WHITE/ SCARLET BB1746', 1550000, 0, '4-4-2017-5-45-57-PM-600x600.jpg', '', 9, 1, 1, 1),
(32, 10, 'ADIDAS ULTRA BOOST- NAVY/ COLLEGIATE NAVY/ SHOCK PINK AQ5928', 4995000, 895000, '4-24-2017-7-56-38-PM-600x600.jpg', '', 10, 0, 0, 1),
(33, 10, 'NIKE LUNARSTELOS- BLACK/ METALLIC SILVER/ ANTHRACITE/ WHITE 844591-001', 2400000, 0, '4-21-2017-2-55-59-PM-600x600.jpg', '', 10, 0, 0, 1),
(34, 10, 'NIKE FREE RN- BLACK/ WHITE 831508-001', 3090000, 610000, '4-19-2017-5-56-46-PM-600x600.jpg', '', 10, 0, 1, 1),
(35, 10, 'NIKE AIR ZOOM ELITE 8- BRIGHT CRIMSON/ GHOST GREEN/ VOLT/ BLACK 748588-603', 3461000, 1511000, '3-17-2017-5-26-37-PM-600x600.jpg', '', 10, 0, 0, 1),
(36, 10, 'ADIDAS DURAMO 8- CORE BLACK/ CORE BLACK/ FOOTWEAR WHITE BB4655', 1595000, 45000, '2-15-2017-12-04-53-PM-600x600.jpg', '', 10, 0, 0, 1),
(37, 11, 'ADIDAS DURAMO 8 WOMENS- UTILITY BLACK / CORE BLACK/ SHOCK PINK BB4668', 1595000, 45000, '2-15-2017-2-47-54-PM-600x600.jpg', '', 10, 0, 1, 1),
(38, 11, 'ADIDAS DURAMO 8 WOMENS- MID GREY/ WHITE/ EASMIN BB4675', 1595000, 45000, '2-15-2017-4-21-34-PM-600x600.jpg', '', 8, 2, 3, 1),
(39, 11, 'ADIDAS PUREBOOST X WOMEN- RAY RED/ VAPOUR PINK/ FOOTWEAR WHITE AQ3399', 3100000, 350000, '1-19-2017-3-49-36-PM-600x600.jpg', '', 10, 0, 1, 1),
(40, 11, 'ADIDAS PUREBOOST X WOMEN- SHOCK PINK/ SEMI SOLAR SLIME AQ6691', 3100000, 350000, '1-10-2017-7-07-15-PM-600x600.jpg', '', 10, 0, 1, 1),
(41, 11, 'NIKE ROSHE ONE -WOMEN – WHITE/ WHITE/ WOLF GREY 599729-102', 1850000, 0, '11-15-2016-5-09-24-PM-600x600.jpg', '', 10, 0, 0, 1),
(42, 12, 'Máy tập cơ bụng Ad Rocket 6 lò xo', 1090000, 0, 'may-tap-ad-rocket-pro-the-he-moi-6-lo-xo-300x318.jpg', '', 10, 0, 1, 1),
(43, 12, 'Máy tập cơ bụng Ad Rocket 4 lò xo', 990000, 0, 'may_tap_co_bung_adrocket_4_lo_xo-300x300.jpg', '', 10, 0, 1, 1),
(44, 12, 'Máy tập cơ bụng Rocket Twister', 1200000, 0, 'may-tap-ab-rocket-twister-300x300.gif', '', 10, 0, 0, 1),
(45, 12, 'Máy tập cơ bụng black power', 900000, 0, 'may_tap_bung_new_black_2-300x300.png', '', 10, 0, 1, 1),
(46, 12, 'Máy tập cơ bụng Black Power đa năng', 1800000, 0, 'May_tap_bung_blackpower_2013-300x300.png', '', 10, 0, 0, 1),
(47, 12, 'Máy tập cơ bụng tổng hợp Elip', 1800000, 0, 'may_tap_bung_tong_hop_elip2013_8-300x300.png', '', 10, 0, 0, 1),
(48, 12, 'Máy tập cơ bụng elip', 990000, 0, '1357182087_40e990f0-300x300.jpg', '', 10, 0, 0, 1),
(49, 13, 'Đai mát xa rung VIBROACTION', 1250000, 0, '8116b7169c5eb029cb6dae027013173e-450x367-300x245.jpg', '', 10, 0, 0, 1),
(50, 13, 'Máy tập rung toàn thân VIBRO MAX PLUS', 9990000, 0, '2010100411515557AM-300x282.jpg', '', 10, 0, 0, 1),
(51, 13, 'Máy tập tổng thể toàn thân Elite Orbitrek ORBITREK ELITE', 5590000, 0, 'orbitrek01.jpg', '', 10, 0, 0, 1),
(52, 13, 'Máy mát xa toàn thân TONIFIC', 1390000, 0, '447-may-mat-xa-toan-than-tonific-300x373.jpg', '', 10, 0, 0, 1),
(53, 13, 'Máy tập tổng hợp Panther', 4990000, 0, 'panther01.jpg', '', 10, 0, 0, 1),
(54, 14, 'Máy tập thể lực chạy bằng điện KL 1305', 8300000, 0, '1365388422_may-tap-chay-bo-dien-da-nang-kl-1305-250.jpg', '', 10, 0, 0, 1),
(55, 14, 'Máy chạy bộ điện YJ 02', 8300000, 0, 'may-chay-bo-dien--300x387.jpg', '', 10, 0, 0, 1),
(56, 14, 'Máy chạy điện KL 1316A', 7900000, 0, 'may-chay-bo-dien-1-chuc-nang-300x300.jpg', '', 10, 0, 0, 1),
(57, 14, 'Máy chạy bộ 2 chức năng', 2500000, 0, '2011063002351609pm-300x339.jpg', '', 10, 0, 1, 1),
(58, 14, 'Máy chạy bộ 7 chức năng', 4000000, 0, '2011101201521159pm-300x281.jpg', '', 10, 0, 0, 1),
(59, 14, 'Máy chạy bộ 8 chức năng', 4200000, 0, '2911_P_1346292972710-300x309.jpg', '', 10, 0, 0, 1),
(60, 14, 'Máy chạy bộ trên không', 1300000, 0, 'may-chay-bo-tren-khong-1381306860-300x300.jpg', '', 10, 0, 0, 1),
(61, 15, 'Áo ba lỗ gym 351261', 250000, 50000, 'ao-tap-gym-ba-lo351261.jpg', '', 10, 0, 4, 1),
(62, 15, 'Quần lửng gym nam 350105', 300000, 0, 'quan-tap-gym-nam-350102.jpg', '', 10, 0, 0, 1),
(63, 15, 'Quần lửng tập gym nam 350103', 300000, 0, 'quan-tap-gym-nam-350100.jpg', '', 10, 0, 0, 1),
(64, 15, 'Quần lửng gym nam 350108', 300000, 0, '3224811610188819973.jpg', '', 10, 0, 0, 1),
(65, 15, 'Quần gym nam 350110', 300000, 0, '3223787392188819973.jpg', '', 10, 0, 0, 1),
(66, 15, 'Quần gym nam lửng 350106', 300000, 0, 'quan-tap-gym-nam-350106.jpg', '', 10, 0, 0, 1),
(67, 15, 'Áo thể thao nam 351179', 250000, 0, '351179.jpg', '', 10, 0, 0, 1),
(68, 15, 'Áo thể thao nam 351178', 250000, 0, '351178.jpg', '', 10, 0, 0, 1),
(69, 15, 'Áo thể thao có cổ 351176', 250000, 0, '351176.jpg', '', 10, 0, 0, 1),
(70, 15, 'Áo gym gile có mũ 351325', 375000, 75000, 'ao-gym-nam-co-mu-351325.jpg', '', 10, 0, 0, 1),
(71, 15, 'Áo gym gile có mũ 351321', 375000, 75000, 'ao-gym-nam-co-mu-351321.jpg', '', 10, 0, 0, 1),
(72, 15, 'Áo gym có mũ 351324', 435000, 85000, 'ao-gym-nam-co-mu-351324.jpg', '', 10, 0, 1, 1),
(73, 15, 'Áo gym ba lỗ 351413', 225000, 45000, 'ao-tap-gym-nam-351413.jpg', '', 10, 0, 0, 1),
(74, 15, 'Áo gym ba lỗ 351408', 225000, 45000, 'ao-tap-gym-nam-351408.jpg', '', 10, 0, 0, 1),
(75, 15, 'Áo gym ba lỗ 351402', 225000, 45000, 'ao-tap-gym-nam-351402a.jpg', '', 10, 0, 0, 1),
(76, 16, 'Áo tập có tay màu hồng', 180000, 0, 'ao-tap-co-tay-mau-hong-1.jpg', '', 6, 6, 1, 1),
(77, 16, 'Áo tập có tay màu xanh', 180000, 0, 'ao-tap-co-tay-mau-xanh.jpg', '', 3, 6, 7, 1),
(78, 16, 'Quần tập phối lưới HT xám nâu', 240000, 0, 'quan-tap-yoga-phoi-luoi-hoa-tiet-mau-xam-1.jpg', '', 5, 5, 6, 1),
(79, 16, 'Quần tập phối lưới HT đen trắng', 240000, 0, 'bo-tap-yoga-mau-den-trang-2.jpg', '', 6, 6, 7, 1),
(80, 16, 'Bộ tập quần lửng áo bra thổ cẩm', 340000, 0, 'bo-tap-lung-mau-tho-cam.jpg', '', 9, 1, 1, 1),
(81, 16, 'Áo tập croptop có tay màu đen', 175000, 0, 'ao-tap-croptop-co-tay-mau-den.jpg', '', 0, 5, 6, 1),
(82, 16, 'Bộ áo croptop quần dài màu trắng', 400000, 0, 'bo-tap-croptop-dai-tay-mau-trang.jpg', '', 10, 0, 1, 1),
(83, 16, 'Áo tập bra LVS màu xám', 170000, 0, 'ao-tap-bra-lvs--mau-xam.jpg', '', 10, 0, 0, 1),
(84, 16, 'Bộ quần áo tập gym màu đen', 320000, 0, 'quan-ao-tap-gym-mau-den-212213.jpg', '', 9, 1, 2, 1),
(85, 17, 'Găng tay tập gym nam màu xanh đen', 195000, 0, '2605037996825646002.400x400.jpg', '', 10, 0, 0, 1),
(86, 17, 'Găng tay tập gym cuốn cổ tay màu xám', 220000, 0, '26164852521168391055.400x400.jpg', '', 10, 0, 1, 1),
(87, 17, 'Gang tay tập gym MRCUE màu đen hồng', 195000, 0, 'a2.jpg', '', 10, 0, 0, 1),
(88, 17, 'Găng tay tập gym cuốn cổ tay MR CUE', 220000, 0, 'gang-tay-3..jpg', '', 10, 0, 0, 1),
(89, 17, 'Găng tay tập gym nữ lưới màu hồng', 150000, 0, '5.jpg', '', 10, 0, 0, 1),
(90, 18, 'Xe đạp tập Impulse PS300C', 13990000, 1990000, 'uploaded-images_xedaptapimpulseps300c_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(91, 18, 'Máy chạy bộ điện Impulse PT300', 49000000, 4000000, 'uploaded-medias-201214_May-chay-bo-dien-Impulse-PT300_thumbcr_212x149.jpg', '', 1, 1, 0, 1),
(92, 18, 'Máy chạy bộ điện Impulse PT400', 62000000, 4000000, 'uploaded-images_May-chay-bo-dien-Impulse-PT400-co-lon_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(93, 18, 'Máy chạy bộ điện Impulse RT500', 57000000, 4000000, 'uploaded-medias-201214_May-chay-bo-dien-Impulse-RT500_thumbcr_212x149.jpg', '', 1, 1, 0, 1),
(94, 18, 'Giàn tạ đa năng Impulse IF1560', 28000000, 3000000, 'uploaded-medias-201214_Gian-ta-da-nang-Impulse-IF1560_thumbcr_212x149.jpg', '', 1, 1, 0, 1),
(95, 18, 'Ghế đẩy tạ ngực dưới Impulse', 14500000, 0, 'uploaded-medias-201214_Ghe-day-ta-nguc-duoi-Impulse-IT7016_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(96, 18, 'Máy đẩy ngực Impulse IT9301', 31500000, 500000, 'uploaded-medias-201214_May-day-nguc-Impulse-IT9301_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(97, 18, 'Máy tập cơ ngực Impulse IT9304', 31500000, 500000, 'uploaded-medias-201214_May-tap-co-nguc-Impulse-IT9304_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(98, 18, 'Máy tập eo Impulse IT9318', 42000000, 7000000, 'uploaded-medias-201214_May-tap-eo-Impulse-IT9318_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(99, 18, 'Máy tập cơ đùi sau Impulse IT9307', 39900000, 0, 'uploaded-medias-201214_May-tap-co-dui-sau-Impulse-IT9307_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(100, 18, 'Xe đạp tập thể dục Impulse PR300', 30000000, 2500000, 'uploaded-medias-201214_Xe-dap-tap-the-duc-Impulse-PR300_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(101, 18, 'Máy tập cơ mông, cơ đùi Impulse IT9310', 32000000, 2100000, 'uploaded-medias-201214_May-tap-co-mong-co-dui-Impulse-IT9310_thumbcr_212x149.jpg', '', 10, 0, 1, 1),
(102, 18, 'Máy tập cơ bụng Impulse IT9314', 31500000, 1600000, 'uploaded-medias-201214_May-tap-co-bung-Impulse-IT9314_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(103, 18, 'Máy tập ép cơ ngực, cơ vai Impulse IT9315', 35000000, 5000000, 'uploaded-medias-201214_May-tap-ep-co-nguc-co-vai-Impulse-IT9315_thumbcr_212x149.jpg', '', 10, 0, 0, 1),
(104, 18, 'Máy tập cơ mông, bắp đùi Impulse IT9326', 35000000, 3000000, 'uploaded-medias-201214_May-tap-co-mong-bap-dui-Impulse-IT9326_thumbcr_212x149.jpg', '', 10, 0, 1, 1),
(105, 18, 'Giàn tạ đa năng Impulse ES3000', 85000000, 3000000, 'uploaded-medias-201214_Gian-ta-da-nang-Impulse-ES3000_thumbcr_212x149.jpg', '', 10, 0, 1, 1);
INSERT INTO `sanpham` (`pro_id`, `cat_id`, `pro_name`, `pro_price`, `pro_discount`, `pro_image`, `pro_description`, `pro_quantity`, `pro_count_buy`, `pro_view`, `pro_status`) VALUES
(106, 18, 'Xe đạp tập Impulse ECU7', 27500000, 1000000, 'uploaded-medias-201214_Xe-dap-tap-Impulse-ECU7_thumbcr_212x149.jpg', '&lt;h2 style=&quot;font-style:normal; text-align:start&quot;&gt;&lt;span style=&quot;font-size:16px&quot;&gt;Sản phẩm xe đạp tập Impulse ECU7&lt;/span&gt;&lt;/h2&gt;\r\n\r\n&lt;h3 style=&quot;color:#000000; font-style:normal; text-align:start&quot;&gt;1. Th&amp;ocirc;ng tin xe đạp tập Impulse ECU7&lt;/h3&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- M&amp;atilde; sản phẩm: Impulse ECU7.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- H&amp;atilde;ng sản xuất: Impulse.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Xuất xứ: Trung Quốc.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;-&amp;nbsp;&lt;strong&gt;Xe đạp tập Impulse ECU7&lt;/strong&gt;&amp;nbsp;l&amp;agrave; xe đạp tập c&amp;oacute; y&amp;ecirc;n được thiết kế hiện đại, chắc chắn từ khung th&amp;eacute;p d&amp;agrave;y v&amp;agrave; sơn tĩnh điện.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;-&amp;nbsp;&lt;a href=&quot;http://www.thethaothientruong.vn/may-tap-the-duc/xe-dap-the-duc/&quot; style=&quot;box-sizing: border-box;&quot;&gt;Xe đạp tập&lt;/a&gt;&amp;nbsp;sử dụng kh&amp;aacute;ng phanh Self-generated 350W c&amp;oacute; tốc độ 60 v&amp;ograve;ng/ ph&amp;uacute;t.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- M&amp;agrave;n h&amp;igrave;nh hiển thị 6 Windows (LED) + Dot matrix LED c&amp;oacute; chức năng hiển thị c&amp;aacute;c th&amp;ocirc;ng số tập luyện gồm tốc độ đạp xe, thời gian tập, watt, calo, qu&amp;atilde;ng đường luyện tập v&amp;agrave; nhịp tim. Với chức năng n&amp;agrave;y th&amp;igrave; bạn c&amp;oacute; thể theo d&amp;otilde;i hiệu quả tập luyện của m&amp;igrave;nh cũng như điều chỉnh cường độ tập để tr&amp;aacute;nh tập qu&amp;aacute; sức.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;-&amp;nbsp;&lt;strong&gt;Impulse ECU7&lt;/strong&gt;&amp;nbsp;gồm c&amp;oacute; 7 chương tr&amp;igrave;nh được c&amp;agrave;i sẵn, 3 chương tr&amp;igrave;nh đo nhịp tim, 3 chương tr&amp;igrave;nh mục ti&amp;ecirc;u, 1 chương tr&amp;igrave;nh chưa c&amp;agrave;i đặt, quickstart v&amp;agrave; đếm ngược.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Cấp độ luyện tập: 20 mức độ kh&amp;aacute;c nhau.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- K&amp;iacute;ch thước lắp đặt sản phẩm: 1132 x 628 x 1480 mm (d&amp;agrave;i x rộng x cao).&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- K&amp;iacute;ch thước đ&amp;oacute;ng th&amp;ugrave;ng: 1155 x 445 x 730 mm (d&amp;agrave;i x rộng x cao).&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Trọng lượng xe đạp tập: 67.4 kg.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Trọng lượng đ&amp;oacute;ng th&amp;ugrave;ng: 78.5 kg.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Trọng lượng tối đa người tập: 160 kg.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Bảo h&amp;agrave;nh: 1 năm.&lt;/p&gt;\r\n\r\n&lt;p style=&quot;text-align:start&quot;&gt;- Gi&amp;aacute; b&amp;aacute;n: 26.500.000 đ.&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n', 10, 0, 1, 1),
(109, 5, 'ford eco 1', 120000000, 0, '2.jpg', '&lt;p&gt;gff&lt;/p&gt;\r\n', 1, 1, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `sli_id` int(11) NOT NULL,
  `sli_name` varchar(200) NOT NULL,
  `sli_image` varchar(200) NOT NULL,
  `sli_link` varchar(200) NOT NULL,
  `sli_status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`sli_id`, `sli_name`, `sli_image`, `sli_link`, `sli_status`) VALUES
(1, 'Đồ tập gym', 'banner_gym.jpg', 'banner_gym', 1),
(2, 'Dụng cụ thể hình', '18555294_1935216213389341_1564054310_n.jpg', 'dung-cu-the-hinh', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ord_id`),
  ADD KEY `fk_cusid` (`cus_id`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD PRIMARY KEY (`ord_id`,`pro_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `ord_id` (`ord_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `fk_groid` (`cat_id`);

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`sli_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `cus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `sli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`cus_id`) REFERENCES `khachhang` (`cus_id`);

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`ord_id`) REFERENCES `hoadon` (`ord_id`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `sanpham` (`pro_id`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `danhmuc` (`cat_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
