-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2023 at 03:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `website_mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(150) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `name`, `email`, `user`, `password`, `level`) VALUES
(2, 'phi', 'nguyenngocphi10.2003@gmail.com', 'phiadmin', 'e10adc3949ba59abbe56e057f20f883e', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandid` int(11) NOT NULL,
  `brandname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandid`, `brandname`) VALUES
(1, 'Dell'),
(3, 'Samsung'),
(4, 'Apple'),
(5, 'Huawei'),
(6, 'Oppo');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `productname` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartid`, `productid`, `sid`, `productname`, `price`, `quantity`, `image`) VALUES
(49, 17, 'mena6akbeid59pc6cv8985r3ql', 'Laptop HUAWEI MateBook D 14 BE', '8990000', 1, '0ae4645dc1.webp');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catid` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`catid`, `catname`) VALUES
(3, 'Laptop'),
(4, 'Desktop'),
(5, 'Mobiles Phone'),
(6, 'Accessories'),
(7, 'Software'),
(8, 'Foolware'),
(9, 'Sports and amp Fitness'),
(10, 'Jewellery'),
(11, 'Clothing'),
(12, 'Home Decor &amp; amp Kitchen'),
(13, 'Beaule &amp; amp Healthcare'),
(14, 'Toys Kids &amp; amp Babies');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productid` int(11) NOT NULL,
  `productname` tinytext NOT NULL,
  `catid` int(11) NOT NULL,
  `brandid` int(11) NOT NULL,
  `productdesc` text NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`productid`, `productname`, `catid`, `brandid`, `productdesc`, `type`, `price`, `image`) VALUES
(12, 'Điện thoại OPPO Reno10 5G 128GB', 5, 6, '<h3>Đến hẹn lại l&ecirc;n, h&atilde;ng&nbsp;<a title=\"Tham khảo một số mẫu điện thoại OPPO tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd-oppo\" target=\"_blank\" rel=\"noopener\">điện thoại OPPO</a>&nbsp;tiếp tục cho ra mắt sản phẩm&nbsp;<a title=\"Tham khảo mẫu điện thoại OPPO Reno10 5G 128GB tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/oppo-reno10-5g-128gb\" target=\"_blank\" rel=\"noopener\">OPPO Reno10 5G 128GB</a>&nbsp;tại thị trường Việt Nam trong năm 2023. Điện thoại mang trong m&igrave;nh lối thiết kế đẹp mắt, hiệu năng mượt m&agrave; xử l&yacute; tốt mọi t&aacute;c vụ, đi c&ugrave;ng bộ ba camera mang đến những bức ảnh đẹp mắt.</h3>\r\n<h3>Thiết kế trẻ trung thu h&uacute;t mọi &aacute;nh nh&igrave;n</h3>\r\n<p>Mang đến cho người d&ugrave;ng lối thiết kế trẻ trung hiện đại, khi Reno10 5G được l&agrave;m nguy&ecirc;n khối k&egrave;m với đ&oacute; sẽ l&agrave; kiểu phối m&agrave;u gradient cực kỳ bắt mắt v&agrave; sang trọng. Từ đ&oacute; cho bạn c&aacute;i nh&igrave;n cao cấp v&agrave; sang trọng hơn, gi&uacute;p bạn tự tin sử dụng ở bất cứ đ&acirc;u v&agrave; lu&ocirc;n nhận được sự ch&uacute; &yacute; của mọi người khi sử dụng Reno 10 5G tr&ecirc;n tay.</p>', 0, '9690000', 'f693d39204.jpg'),
(13, 'Điện thoại OPPO Find N2 Flip 5G ', 5, 6, '<div class=\"article__content short\">\r\n<div class=\"content-article\">\r\n<h3><a title=\"Tham khảo OPPO Find N2 Flip 5G tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/oppo-find-n2-flip\" target=\"_blank\" rel=\"noopener\">OPPO Find N2 Flip 5G</a>&nbsp;-&nbsp;chiếc điện thoại gập đầu ti&ecirc;n của OPPO đ&atilde; được giới thiệu ch&iacute;nh thức tại Việt Nam v&agrave;o th&aacute;ng 03/2023. Sở hữu cấu h&igrave;nh mạnh mẽ c&ugrave;ng thiết kế&nbsp;si&ecirc;u nhỏ gọn gi&uacute;p tối ưu k&iacute;ch thước, chiếc điện thoại sẽ&nbsp;c&ugrave;ng bạn nổi bật trong mọi kh&ocirc;ng gian với vẻ ngo&agrave;i đầy c&aacute; t&iacute;nh.</h3>\r\n<h3>Sử dụng ng&ocirc;n ngữ thiết kế gập hiện đại</h3>\r\n<p>L&agrave; mẫu điện thoại gập dọc đầu ti&ecirc;n của OPPO, v&igrave; thế Find N2 Flip mang đến cho m&igrave;nh kh&aacute; nhiều sự t&ograve; m&ograve; cũng như cảm hứng về phần thiết kế, điều n&agrave;y gi&uacute;p qu&aacute; tr&igrave;nh sử dụng trở n&ecirc;n th&uacute; vị hơn so với đại đa số những mẫu m&aacute;y th&ocirc;ng thường kh&aacute;c.</p>\r\n<p>Tổng quan về c&aacute;i nh&igrave;n, theo m&igrave;nh m&aacute;y trong kh&aacute; d&agrave;i v&agrave; thon, khi mở ho&agrave;n to&agrave;n th&igrave; Find N2 Flip c&oacute; k&iacute;ch thước l&ecirc;n tới 166.2 mm nhưng sau khi gập th&igrave; m&aacute;y chỉ c&ograve;n 85.5 mm. L&uacute;c n&agrave;y điện thoại trở n&ecirc;n nhỏ gọn hơn, cầm nắm cũng chắc tay hơn.</p>\r\n</div>\r\n</div>', 0, '19990000', 'e55393b4af.jpg'),
(14, 'Điện thoại OPPO Reno8 T 5G 256GB', 5, 6, '<h3>Tiếp nối sự th&agrave;nh c&ocirc;ng rực rỡ đến từ c&aacute;c thế hệ trước đ&oacute; th&igrave; chiếc&nbsp;<a title=\"Tham khảo điện thoại OPPO Reno8 T 5G 256GB đang kinh doanh tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/oppo-reno8-t-5g-256gb\" target=\"_blank\" rel=\"noopener\">OPPO Reno8 T 5G 256GB</a>&nbsp;cuối c&ugrave;ng đ&atilde; được giới thiệu ch&iacute;nh thức tại Việt Nam, được định h&igrave;nh l&agrave; d&ograve;ng sản phẩm thuộc ph&acirc;n kh&uacute;c tầm trung với camera 108 MP, con chip Snapdragon 695 c&ugrave;ng kiểu d&aacute;ng thiết kế mặt lưng v&agrave; m&agrave;n h&igrave;nh bo cong hết sức nổi bật.</h3>\r\n<h3>Thiết kế với kiểu d&aacute;ng bắt mắt</h3>\r\n<p>Qua những lần chạm đầu ti&ecirc;n tr&ecirc;n chiếc Reno8 T 5G th&igrave; m&igrave;nh thấy đ&acirc;y l&agrave; một chiếc điện thoại c&oacute; độ ho&agrave;n thiện kh&aacute; tốt, m&aacute;y mang lại cho m&igrave;nh một cảm gi&aacute;c cầm nắm tương đối l&agrave; đầm tay, hai b&ecirc;n cạnh cũng được l&agrave;m bo cong gi&uacute;p hạn chế t&igrave;nh trạng cấn tay mang đến cho m&igrave;nh một trải nghiệm sử dụng kh&aacute; l&agrave; thoải m&aacute;i.</p>', 1, '8490000', 'c0a98117ec.jpg'),
(15, 'Laptop HUAWEI MateBook D 14 2023', 3, 5, '<h2><strong><span lang=\"vi\">Huawei MateBook D 14 2023 - &ldquo;Con th&uacute; hiệu năng&rdquo; trong th&acirc;n h&igrave;nh mỏng nhẹ</span></strong></h2>\r\n<p class=\"MsoNormal\"><strong><span lang=\"vi\">MateBook D 14 2023</span></strong><span lang=\"vi\">&nbsp;đ&atilde; thu h&uacute;t sự ch&uacute; &yacute; lớn từ người d&ugrave;ng cả trong v&agrave; ngo&agrave;i nước nhờ t&iacute;ch hợp c&aacute;c c&ocirc;ng nghệ ti&ecirc;n tiến v&agrave; cải tiến đ&aacute;ng kể so với thế hệ trước đ&oacute;. Sản phẩm g&acirc;y ấn tượng bởi thiết kế mỏng nhẹ v&agrave; m&agrave;n h&igrave;nh chất lượng cao, cho ph&eacute;p người d&ugrave;ng tận hưởng những h&igrave;nh ảnh sống động v&agrave; sắc n&eacute;t. V&igrave; vậy, h&atilde;y c&ugrave;ng Ho&agrave;ng H&agrave; t&igrave;m hiểu th&ecirc;m th&ocirc;ng tin, kh&aacute;m ph&aacute; sự đột ph&aacute; tiện &iacute;ch m&agrave; sản phẩm n&agrave;y mang lại ngay sau đ&acirc;y.</span></p>', 0, '15290000', '8f05607b34.webp'),
(16, 'Laptop HUAWEI MateBook D 15 AMD', 3, 5, '<p class=\"MsoNormal\"><strong><span lang=\"vi\">HUAWEI MateBook D 15 AMD mang đến một thiết kế thanh lịch</span></strong></p>\r\n<p class=\"MsoNormal\"><span lang=\"vi\">Thuận tiện v&agrave; linh hoạt l&agrave; điều m&agrave; HUAWEI MateBook D15 AMD chắc chắn c&oacute; thể đ&aacute;p ứng cho bạn. Với khối lượng&nbsp;<strong>1,63kg</strong>&nbsp;c&ugrave;ng độ mỏng chỉ&nbsp;<strong>29,9mm</strong>, HUAWEI MateBook D15 c&oacute; một vẻ ngo&agrave;i kh&aacute; mỏng v&agrave; gọn nhẹ. HUAWEI cũng tỉ mỉ trang bị cho sản phẩm n&agrave;y một lớp vỏ bạc với khả năng chống v&acirc;n tay, bụi bẩn, trầy xước, gi&uacute;p cho m&aacute;y lu&ocirc;n giữ vẻ sang trọng v&agrave; thanh lịch vốn c&oacute;.</span></p>', 0, '11990000', '743ad3069e.webp'),
(17, 'Laptop HUAWEI MateBook D 14 BE', 3, 5, '<h2><strong><span lang=\"vi\">Laptop HUAWEI MateBook D 14 BE - Laptop mỏng nhẹ c&ugrave;ng hiệu năng cực ấn tượng</span></strong></h2>\r\n<p class=\"MsoNormal\"><span lang=\"vi\">Với những th&ocirc;ng số m&agrave;&nbsp;<strong>Laptop HUAWEI MateBook D 14 BE</strong>&nbsp;sở hữu, đ&acirc;y l&agrave; lựa chọn hợp l&yacute; d&agrave;nh cho những ai đang t&igrave;m kiếm một chiếc laptop di động để đ&aacute;p ứng nhu cầu học tập, l&agrave;m việc văn ph&ograve;ng, giải tr&iacute; cơ bản thường ng&agrave;y. H&atilde;y c&ugrave;ng Ho&agrave;ng H&agrave; Mobile kh&aacute;m ph&aacute; về chiếc laptop ngay nh&eacute;</span></p>', 1, '8990000', '0ae4645dc1.webp'),
(18, 'Điện thoại iPhone 14 Pro Max 1TB', 5, 4, '<h3><a title=\"Tham khảo điện thoại iPhone 14 Pro Max 1TB tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-14-pro-max-1tb\" target=\"_blank\" rel=\"noopener\">iPhone 14 Pro Max 1TB</a> l&agrave; phi&ecirc;n bản điện thoại cao cấp nhất m&agrave; Apple đ&atilde; cho ra mắt tại sự kiện giới thiệu sản phẩm mới cho năm 2022. Được thừa hưởng mọi c&ocirc;ng nghệ h&agrave;ng đầu thế giới n&ecirc;n m&aacute;y hứa hẹn sẽ mang lại trải nghiệm sử dụng tốt nhất từ chơi game cho tới chụp ảnh, xứng đ&aacute;ng l&agrave; chiếc điện thoại đ&aacute;ng mua nhất tr&ecirc;n thị trường hiện tại.</h3>', 0, '41990000', '5b9e26f0bf.jpg'),
(19, 'Điện thoại iPhone 13 256GB', 5, 4, '<h3><a title=\"Tham khảo sản phẩm ch&iacute;nh h&atilde;ng của Apple tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/apple\" target=\"_blank\" rel=\"noopener\">Apple</a>&nbsp;thỏa m&atilde;n sự chờ đ&oacute;n của iFan v&agrave; người d&ugrave;ng với sự ra mắt của&nbsp;<a title=\"Tham khảo iPhone 13 256 GB c&oacute; tại Thế Giới Di Động\" href=\"https://www.thegioididong.com/dtdd/iphone-13-256gb\" target=\"_blank\" rel=\"noopener\">iPhone 13</a>. D&ugrave; ngoại h&igrave;nh kh&ocirc;ng c&oacute; nhiều thay đổi so với&nbsp;<a title=\"Tham khảo iPhone 12 tại Thegioididong.com\" href=\"https://www.thegioididong.com/dtdd/iphone-12\" target=\"_blank\" rel=\"noopener\">iPhone 12</a> nhưng với cấu h&igrave;nh mạnh mẽ hơn, đặc biệt pin &ldquo;tr&acirc;u&rdquo; hơn v&agrave; khả năng quay phim chụp ảnh cũng ấn tượng hơn, hứa hẹn mang đến những trải nghiệm th&uacute; vị tr&ecirc;n phi&ecirc;n bản mới n&agrave;y.</h3>', 0, '19490000', '4b1d2c2665.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandid`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartid`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
