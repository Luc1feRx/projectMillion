-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 08, 2021 at 05:31 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptops`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'tu', '81dc9bdb52d04dc20036dbd8313ed055', 'clgtqwe1@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `name`, `img`) VALUES
(9, 'HP', 'brandHP.png'),
(10, 'Dell', '1636163488163609679316360210481636020059brandDell.png'),
(11, 'Lenovo', 'brandLenovo.png'),
(12, 'Asus', 'brandAsus.png'),
(13, 'acer', 'brandAcer.jpg'),
(15, 'MSI', 'brandMSI.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cartId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Work Staytions'),
(3, 'Laptop Gaming'),
(4, 'Học tập - văn phòng'),
(5, 'Đồ họa'),
(6, 'Cao Cấp');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `date_order` datetime NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `brand_id` int(11) NOT NULL,
  `cate_id` int(11) NOT NULL,
  `short_desc` varchar(3000) NOT NULL,
  `status` int(11) NOT NULL,
  `model` varchar(100) NOT NULL,
  `chip` varchar(100) NOT NULL,
  `ram` varchar(100) NOT NULL,
  `card` varchar(255) NOT NULL,
  `drive` varchar(255) NOT NULL,
  `display` varchar(255) NOT NULL,
  `connect` varchar(255) NOT NULL,
  `vantay` int(11) NOT NULL,
  `operation` varchar(255) NOT NULL,
  `pin` int(11) NOT NULL,
  `weight` float NOT NULL,
  `discount` int(11) NOT NULL,
  `selled` int(11) DEFAULT '0',
  `quantity_product` int(11) NOT NULL,
  `image` varchar(3000) NOT NULL,
  `time_add` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `brand_id`, `cate_id`, `short_desc`, `status`, `model`, `chip`, `ram`, `card`, `drive`, `display`, `connect`, `vantay`, `operation`, `pin`, `weight`, `discount`, `selled`, `quantity_product`, `image`, `time_add`) VALUES
(2, 'ASUS TUF Gaming F17 FX706HC-HX009T', 21312400, 13, 1, '<p>In these last days it&#39;s so rare to actually hear a song that actually speaks to you. It will become a classic in the slow jam sets. When I first heard it, the sincerity in his voice moved me, then as I listened to the lyrics, it really packs a punch straight</p>\r\n', 1, 'FX706HC-HX009T', 'Intel Core i7-11800H (2.3GHz up to 4.6GHz, 24MB Cache)', '8', 'NVIDIA GeForce RTX 3050 4GB GDDR6', '512GB M.2 NVMe PCIe 3.0 SSD', '17.3inch FHD(1920 x 1080) IPS, Anti-Glare 144Hz', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 3, 2, 3, 10, 20, 'd3a49e4b9a.jpg', '2021-11-04 10:17:28'),
(8, 'MSI GS66 Stealth 10UE 200VN', 45890000, 15, 4, '<p>NPP: VS, VX CPU: Intel&reg; Core&trade; I7-10870H (2.20GHz up to 5.00GHz, 16MB) Ram: 16GB(8GBx2) DDR4-3200Mhz (2 khe, tối đa 64GB) Ổ cứng: 2TB NVMe PCIe Gen3x4 SSD VGA: NVIDIA&reg; GeForce RTX 3060 6GB GDDR6 Display: 15.6 inch FHD (1920 x 1080) IPS with Anti-Glare, 300Hz, 3ms, Thin Bezel, 100% sRGB Pin: 4 cell, 99.9Whr Weight: 2.1kg Color: Đen T&iacute;nh năng: Đ&egrave;n nền b&agrave;n ph&iacute;m OS: Windows 10 Home bản quyền</p>\r\n', 1, 'FX706HC-HX009T', 'Intel® Core™ I7-10870H (2.20GHz up to 5.00GHz, 16MB)', '16', 'NVIDIA® GeForce RTX 3060 6GB GDDR6', '512GB M.2 NVMe PCIe 3.0 SSD', '17.3inch FHD(1920 x 1080) IPS, Anti-Glare 144Hz', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 4, 2, 3, 6, 20, 'fd432d5fbb.jpg', '2021-11-04 13:46:49'),
(18, '3qewqwe', 21312400, 12, 6, '<p>312qweqwe</p>\r\n', 1, 'FX706HC-HX009T', 'Intel Core i7-11800H (2.3GHz up to 4.6GHz, 24MB Cache)', '8', 'NVIDIA GeForce RTX 3050 4GB GDDR6', '512GB M.2 NVMe PCIe 3.0 SSD', '17.3inch FHD(1920 x 1080) IPS, Anti-Glare 144Hz', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 2, 3, 3, 3, 10, 'bf63d156c7.jpg', '2021-11-05 11:43:51'),
(19, 'Dell Inspiron 7405 (Ryzen R5-4500U / RAM 8G / SSD 256GB)', 19890000, 10, 5, '<p>CPU: AMD Ryzen&trade; R5-4500U (2.30GHz up to 4.00GHz, 8MB Cache)</p>\r\n\r\n<p>Ram: 8GB DDR4 bus 3200 MHz</p>\r\n\r\n<p>Ổ cứng: 256GB m.2 NVMe SSD</p>\r\n\r\n<p>Display: 14.0&quot; FHD(1920 x 1080)WVA, 220nits, 45%NTSC, xoay gập, cảm ứng</p>\r\n\r\n<p>VGA: AMD Radeon&trade; Graphics</p>\r\n\r\n<p>Color: Bronze</p>\r\n\r\n<p>Pin: 3Cell 40Wh</p>\r\n\r\n<p>Weight: 1.6kg</p>\r\n\r\n<p>OS: Windows 10 home bản quyền</p>\r\n', 1, 'FX706HC-HX009T', 'Intel Core i7-11800H (2.3GHz up to 4.6GHz, 24MB Cache)', '8GB DDR4 bus 3200 MHz', 'AMD Radeon™ Graphics', '256GB m.2 NVMe SSD', '14.0\" FHD(1920 x 1080)WVA, 220nits, 45%NTSC, xoay gập, cảm ứng', '2 USB 3.2 Gen 1 ports 1 USB 3.2 Gen 1 (Type-C™) port 1 headset (headphone and microphone combo) port 1 HDMI 1.4b port', 1, 'Windows 10 Home bản quyền', 2, 2, 8, 8, 17, '9e4c56c42a.jpg', '2021-11-06 01:40:46'),
(20, 'Asus TUF Dash F15 FX516PC-HN002T', 24990000, 12, 3, '<p>NPP: VS</p>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i5-11300H (3.10GHz up to 4.40GHz, 8MB Cache)</p>\r\n\r\n<p>Ram: 8GB DDR4 3200MHz (2x SO-DIMM slot)</p>\r\n\r\n<p>Ổ cứng: 512GB M.2 NVMe&trade; PCIe&reg; 3.0 SSD</p>\r\n\r\n<p>VGA: NVIDIA&reg; GeForce&reg; RTX 3050 4GB GDDR6 (80W+5W)</p>\r\n\r\n<p>Display: 15.6 inch FHD (1920x1080) IPS, Non-Glare, 144Hz, Nanoedge</p>\r\n\r\n<p>Pin: 4 Cell, 76Whr</p>\r\n\r\n<p>Weight: 2 Kg</p>\r\n\r\n<p>Color: Eclipse Gray (X&aacute;m)</p>\r\n\r\n<p>B&agrave;n ph&iacute;m: White Backlit KB</p>\r\n\r\n<p>OS: Windows 10 64bit bản quyền</p>\r\n', 1, 'FX516PC-HN002T', 'Intel® Core™ i5-11300H (3.10GHz up to 4.40GHz, 8MB Cache)', '8GB DDR4 3200MHz (2x SO-DIMM slot)', 'NVIDIA® GeForce® RTX 3050 4GB GDDR6 (80W+5W)', '512GB M.2 NVMe™ PCIe® 3.0 SSD', '15.6 inch FHD (1920x1080) IPS, Non-Glare, 144Hz, Nanoedge', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 3, 2, 7, 4, 7, 'c018cd444b.jpg', '2021-11-06 01:49:01'),
(21, 'HP Envy x360 Convert 13m-bd0033dx', 27590000, 9, 4, '<p>CPU: Intel&reg; Core&trade; i7-1165G7 (2.80GHz up to 4.70GHz, 12MB)</p>\r\n\r\n<p>Ram: 8GB DDR4 3200Mhz</p>\r\n\r\n<p>Ổ cứng: 512GB PCIe&reg; NVMe &trade; M.2 SSD</p>\r\n\r\n<p>VGA: Intel Iris Xe Graphics</p>\r\n\r\n<p>Display: 13.3inch FHD (1920 x 1080), OLED, 400 nits, 100% DCI-P3 - Cảm ứng</p>\r\n\r\n<p>Weigh: 1.32 kg</p>\r\n\r\n<p>Pin: 3Cell, 51WHr</p>\r\n\r\n<p>Color: Pale Gold</p>\r\n\r\n<p>OS: Windows 10 Home 64 bản quyền</p>\r\n', 1, '13m-bd0033dx', 'Intel® Core™ i7-1165G7 (2.80GHz up to 4.70GHz, 12MB)', '8GB DDR4 3200Mhz', 'Intel Iris Xe Graphics', '512GB PCIe® NVMe ™ M.2 SSD', '13.3inch FHD (1920 x 1080), OLED, 400 nits, 100% DCI-P3 - Cảm ứng', '2 USB 3.2 Gen 1 ports 1 USB 3.2 Gen 1 (Type-C™) port 1 headset (headphone and microphone combo) port 1 HDMI 1.4b port', 1, 'Windows 10 Home bản quyền', 4, 2, 4, 10, 15, '803c4bdaee.jpg', '2021-11-06 11:04:44'),
(22, 'Lenovo IdeaPad Gaming 3', 27590000, 11, 3, '<p>NPP: PSD</p>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i7-11370H (3.30GHz up to 4.80GHz, 12MB Cache)</p>\r\n\r\n<p>Ram: 8GB(1x 8GB) DDR4 3200MHz</p>\r\n\r\n<p>Ổ cứng: 512GB M.2 2242 PCIe 3.0x4 NVMe SSD</p>\r\n\r\n<p>VGA: NVIDIA GeForce RTX 3050 4GB GDDR6</p>\r\n\r\n<p>Display: 15.6 inch FHD (1920x1080) IPS 120Hz Anti Glare LED Backlit</p>\r\n\r\n<p>Pin: 3Cell 45WHrs</p>\r\n\r\n<p>Weight: 2.25 kg</p>\r\n\r\n<p>Color: Shadow Black</p>\r\n\r\n<p>B&agrave;n ph&iacute;m: Đ&egrave;n nền trắng</p>\r\n\r\n<p>OS: Windows 10 Home bản quyền</p>\r\n', 1, '15IHU6-82K100FBVN', 'Intel® Core™ i7-11370H (3.30GHz up to 4.80GHz, 12MB Cache)', '8GB(1x 8GB) DDR4 3200MHz', 'NVIDIA GeForce RTX 3050 4GB GDDR6', '512GB M.2 2242 PCIe 3.0x4 NVMe SSD', '15.6 inch FHD (1920x1080) IPS 120Hz Anti Glare LED Backlit', '2 USB 3.2 Gen 1 ports 1 USB 3.2 Gen 1 (Type-C™) port 1 headset (headphone and microphone combo) port 1 HDMI 1.4b port', 1, 'Windows 10 Home bản quyền', 4, 2, 4, 8, 15, '2c0fb84f2b.jpg', '2021-11-06 11:07:41'),
(23, 'Asus Vivobook X413JA', 12490000, 12, 4, '<p>PU: Intel&reg; Core&trade; i3-1005G1 (1.20GHz up to 3.40GHz, 4MB)</p>\r\n\r\n<p>Ram: 4GB DDR4 2400MHz</p>\r\n\r\n<p>Ổ cứng: 128GB NVMe SSD</p>\r\n\r\n<p>VGA: Intel UHD G1</p>\r\n\r\n<p>Display: 14 inch FHD (1920 x 1080)</p>\r\n\r\n<p>Pin: 42Wh</p>\r\n\r\n<p>Weight: 1.40 kg</p>\r\n\r\n<p>Color: DREAMY WHITE</p>\r\n\r\n<p>OS: Windows 10 Home SL bản quyền</p>\r\n', 0, 'X413JA ', 'Intel® Core™ i3-1005G1 (1.20GHz up to 3.40GHz, 4MB)', '4GB DDR4 2400MHz', 'Intel UHD G1', '128GB NVMe SSD', '14 inch FHD (1920 x 1080)', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 3, 2, 10, 0, 4, '8539b4c999.jpg', '2021-11-06 13:38:36'),
(24, 'Dell Vostro 3400 V4I7015W', 22990000, 11, 1, '<p>NPP: PSD</p>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i7-1165G7 (2.80GHz up to 4.70GHz, 12MB)</p>\r\n\r\n<p>Ram: 8GB DDR4 3200Mhz</p>\r\n\r\n<p>Ổ cứng: 512GB M.2 PCIe NVMe SSD</p>\r\n\r\n<p>VGA: NVIDIA GeForce MX330 2GB DDR5</p>\r\n\r\n<p>Display: 14-inch, FHD (1920x1080), 60 Hz, Anti-Glare</p>\r\n\r\n<p>Pin: 3-cell, 42 WHr</p>\r\n\r\n<p>Weight: 1.64 kg</p>\r\n\r\n<p>Color: Đen</p>\r\n\r\n<p>OS: Windows 10 Home bản quyền</p>\r\n', 1, 'V4I7015W', 'Intel® Core™ i7-1165G7 (2.80GHz up to 4.70GHz, 12MB)', '8GB DDR4 3200Mhz', 'NVIDIA GeForce MX330 2GB DDR5', '512GB M.2 PCIe NVMe SSD', '14-inch, FHD (1920x1080), 60 Hz, Anti-Glare', '802.11AX (2X2) ', 0, 'Windows 10 Home bản quyền', 3, 2, 10, 0, 4, '3fbc716cf5.jpg', '2021-11-06 13:43:13'),
(25, 'MSI Creator Z16 A11UET 217VN', 61990000, 15, 6, '<p>NPP: VX</p>\r\n\r\n<p>CPU: Intel&reg; Core&trade; i7-11800H (2.30GHz up to 4.60GHz, 24MB Cache)</p>\r\n\r\n<p>Intel HM570</p>\r\n\r\n<p>Ram: 32GB(16GBx2) DDR4-3200Mhz</p>\r\n\r\n<p>Ổ cứng: 1TB NVMe PCIe Gen4x4 SSD</p>\r\n\r\n<p>VGA: NVIDIA&reg; GeForce RTX 3060 Max-Q 6GB GDDR6</p>\r\n\r\n<p>Display: 16 inch QHD+ (2560 x 1600) 16:10, 120Hz DCI-P3 100% typical, Touch - M&agrave;n h&igrave;nh cảm ứng</p>\r\n\r\n<p>Pin: 4 cell, 90Whr</p>\r\n\r\n<p>Weight: 2.2 kg</p>\r\n\r\n<p>Mini LED Per key backlight KB</p>\r\n\r\n<p>Color: Lunar Gray</p>\r\n\r\n<p>OS: Windows 10 Home bản quyền</p>\r\n', 1, 'A11UET217VN', 'Intel® Core™ i7-11800H (2.30GHz up to 4.60GHz, 24MB Cache)', '32GB(16GBx2) DDR4-3200Mhz', 'NVIDIA® GeForce RTX 3060 Max-Q 6GB GDDR6', '1TB NVMe PCIe Gen4x4 SSD', '16 inch QHD+ (2560 x 1600) 16:10, 120Hz DCI-P3 100% typical, Touch - Màn hình cảm ứng', '802.11AX (2X2) ', 1, 'Windows 10 Home bản quyền', 3, 2, 14, 9, 16, '4e53f870c3.jpg', '2021-11-06 13:46:23'),
(26, 'HP Pavilion 14-dv0534TU Gold', 22090000, 9, 5, '<p>NPP: FPT</p>\r\n\r\n<p>CPU: Intel&reg; Core i7-1165G7 (2.80GHz up to 4.70GHz, 12MB Cache)</p>\r\n\r\n<p>Ram: 8GB DDR4 3200Mhz</p>\r\n\r\n<p>Ổ cứng: 512GB PCIe&reg; NVMe&trade; M.2 SSD</p>\r\n\r\n<p>VGA: Intel&reg; Iris&reg; Xᵉ Graphics</p>\r\n\r\n<p>Display: 14.0 inch, FHD (1920 x 1080) IPS 250nits 45%NTSC</p>\r\n\r\n<p>Pin: 3Cell 43Whrs</p>\r\n\r\n<p>Weight: 1.41 kg</p>\r\n\r\n<p>Color: Warm Gold (V&agrave;ng)</p>\r\n\r\n<p>OS: Windows 11 Home bản quyền</p>\r\n', 1, '14-dv0534TU', 'Intel® Core i7-1165G7 (2.80GHz up to 4.70GHz, 12MB Cache)', '8GB DDR4 3200Mhz', 'Intel® Iris® Xᵉ Graphics', '512GB PCIe® NVMe™ M.2 SSD', '14.0 inch, FHD (1920 x 1080) IPS 250nits 45%NTSC', '802.11AX (2X2) ', 1, 'Windows 11 Home bản quyền', 4, 2, 20, 15, 20, '582b18e641.jpg', '2021-11-06 13:50:38'),
(27, 'Laptop HP 340s G7 (36A35PA)', 19799000, 9, 4, '<ul>\r\n	<li>CPU: Intel Core i5 1035G1</li>\r\n	<li>RAM: 8GB (c&ograve;n 1 khe ram trống)</li>\r\n	<li>Ổ cứng: 512GB SSD (ko c&oacute; slot trống, n&acirc;ng cấp thay thế)</li>\r\n	<li>VGA: Onboard</li>\r\n	<li>M&agrave;n h&igrave;nh: 14 inch FHD</li>\r\n	<li>HĐH: Win10</li>\r\n	<li>M&agrave;u: x&aacute;m</li>\r\n</ul>\r\n', 1, '36A35PA', 'Intel Core i5-1035G1 Processor (1.2 GHz), Max Turbo Frequency : 3.6 GHz', '1 x 8GB DDR4/ 3200MHz (2 slots)', 'Intel UHD Graphics', '512GB SSD PCIe (M.2 2280)', '14.0\" inch FHD', '1 x Thunderbolt 4 support DisplayPort  3 x USB 3', 1, 'Windows 11 Home bản quyền', 4, 2, 5, 8, 17, 'beed74272a.png', '2021-11-07 11:18:29'),
(28, 'Laptop Dell Latitude 3420', 20099000, 10, 4, '<ul>\r\n	<li>CPU: Intel Core i5 1135G7</li>\r\n	<li>RAM: 8GB</li>\r\n	<li>Ổ cứng: 256GB SSD</li>\r\n	<li>VGA: Onboard</li>\r\n	<li>M&agrave;n h&igrave;nh: 14.0 inch HD</li>\r\n	<li>HĐH: Fedora</li>\r\n	<li>M&agrave;u: Đen</li>\r\n</ul>\r\n', 1, 'L3420I5SSD', 'Intel Core™ i5 1135G7 (2.4GHz, 8MB Cache)', '8GB DDR4 3200Mhz (1*8GB) ', ' Intel® Iris® Xe Graphics', '256GB SSD M2 PCIe NVMe (có slot 2.5 inch)', '14 inch HD (1366 x 768) AG Non-Touch, 220nits', '1 x Thunderbolt 4 support DisplayPort  3 x USB 3', 1, 'Windows 11 Home bản quyền', 4, 2, 4, 0, 20, 'ac8ef85dad.png', '2021-11-07 15:49:56');

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `img` varchar(3000) NOT NULL,
  `imgTieuDe` varchar(3000) NOT NULL,
  `content` text NOT NULL,
  `title` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_details`
--

INSERT INTO `product_details` (`id`, `product_id`, `img`, `imgTieuDe`, `content`, `title`) VALUES
(2, 2, 'd3a49e4b9a.jpg', '163620512716361966849222_hp_envy_x360_convert_13m_bd0033dx__1.jpg', 'ewqwqddassd', ''),
(3, 8, 'fd432d5fbb.jpg', '1636205073brandMSI.png', 'dddsdasdxc', 'TUD'),
(13, 18, 'bf63d156c7.jpg', '1636205097brandAcer.jpg', 'ewqeqw', 'TUD'),
(14, 19, '9e4c56c42a.jpg', '16361628468235_dell_inspiron_7405_3.jpg', 'Dell inspiron 7405 đã gây được ấn tượng mạnh với người dùng bởi thiết kế vuông vức. Toàn bộ máy được làm bằng chất liệu kim loại nguyên khối, chắc chắn. Bao phủ toàn bộ máy là màu cà phê độc đáo. Logo Dell được bố trí chính giữa mặt lưng.\r\nTrọng lượng máy nhẹ 1.6kg với độ dày là 17mm. So với một chiếc laptop có cấu hình khủng để chơi game hay làm đồ hoạ thì trọng lượng máy được đánh giá là rất nhẹ. Người dùng có thể dễ dàng mang theo máy khi di chuyển ở bất cứ nơi đâu.\r\nDell inspiron 7405 2n1 sở hữu màn hình 14 inch với độ phân giải FHD (1920x1080 pixel). Viền màn hình máy khá mỏng, cho góc nhìn rộng. Từ đó mang đến cho người dùng những trải nghiệm vô cùng tuyệt vời khi xem phim hay chơi game. Bên cạnh đó, máy còn sử dụng tấm nền IPS chống chói. Giúp người dùng có thể làm việc trong nhiều môi trường ánh sáng, ở nhiều góc nghiêng. Đặc biệt là khi bạn phải làm việc trực tiếp dưới ánh nắng mặt trời.\r\n\r\nNgoài ra, máy còn được bố trí một webcam ở chính giữa màn hình. Chất lượng hình ảnh video của dell 7405 được đánh giá ở mức trung bình. Không quá xuất sắc. Bên cạnh đó, là sự tích hợp của công nghệ Windows Hello. Cho phép người dùng có thể dễ dàng đăng nhập vào máy tính của mình thông qua việc nhận dạng vân tay, quét võng mạc mắc hay nhận diện khuôn mặt. Điều này giúp bảo vệ máy tính của bạn khỏi những kẻ tò mò', 'asdasddad'),
(15, 20, 'c018cd444b.jpg', '16361633419019_asus_tuf_dash_f15_fx516pe_1.jpg', 'Những đường nét sắc sảo định hình nên diện mạo cho TUF Dash F15. Kiểu chữ đơn giản nổi bật trên phần nền táo bạo màu Trắng Moonlight White và Xám Eclipse Gray. Bộ khung cũng góp phần làm nổi bật dòng chữ thẳng, tô điểm thêm cho độ mỏng 19,9mm. Phần viền siêu mỏng giúp tối đa hóa không gian màn hình và tăng cường độ tập trung.\r\n2. HIỆU NĂNG MẠNH MẼ\r\nLuôn sẵn sàng cho mọi hành trình, Dash F15 xử lý dễ dàng mọi tác vụ dù là chơi game, phát trực tiếp và hơn thế nữa. Sức mạnh CPU lên đến Intel® Core™ i7-11375H thế hệ thứ 11 phù hợp để giải trí và làm việc hàng ngày. Đồ họa nhanh và mượt mà với GPU lên đến GeForce RTX™ 3070 với Dynamic Boost 2.0 mang lại tốc độ khung hình cao ổn định. 32GB RAM DDR4-3200 RAM cho phép bạn đổi trang bị giữa trận một cách trơn tru. Đồng thời, ổ cứng SSD NVMe PCIe® lên đến 1TB giúp đẩy nhanh thời gian tải trên tất cả các ứng dụng và trò chơi của bạn.', 'qwewerwer'),
(16, 21, '803c4bdaee.jpg', '16361966849222_hp_envy_x360_convert_13m_bd0033dx__1.jpg', 'atwueufowneufn', 'asdasddad'),
(17, 22, '2c0fb84f2b.jpg', '16361968619016_lenovo_ideapad_gaming_3_15ach6_2.jpg', 'vxfv123131ada', 'arwewefwefwfew'),
(18, 23, '8539b4c999.jpg', '16362059169005_asus_vivobook_x413ja__1.jpg', 'ádczxczxcqwe', 'gfgwerwt'),
(19, 24, '3fbc716cf5.jpg', '16362061937760_dell_vostro_14_3400_2.jpg', 'fdsfsdgcvvccv', 'rrfdfgdg'),
(20, 25, '4e53f870c3.jpg', '16362063838611_msi_creator_z16__6.jpg', 'ghjgj121', 'czcbbbb'),
(21, 26, '582b18e641.jpg', '16362066389048_hp_pavilion_14_dv0005tu_3.jpg', 'czxczc', 'gfghfh'),
(22, 27, 'beed74272a.png', '163628390960650_laptop_hp_340s_g7_36a35pa_xam_9.png', 'dczzxczxczxc', 'đâsdasd'),
(23, 28, 'ac8ef85dad.png', '163630019659833_laptop_dell_latitude_3420_l3420i5ssd_den_2021_5.png', 'Ni Hảo', 'A ShiBa');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `name`, `img`) VALUES
(3, 'eqqq', '163628505104_Nov28d2aab6e49743467ee66a4b8346ad64.png'),
(4, 'dfrqr', '163628505704_Novcecd5acf0cc3057dd3d08716e02438f6.png'),
(5, 'dkasnd', '163628506306_Nov1285a2825c7a6f7fa076eaddc6d2aac4.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `address` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role_id` int(11) NOT NULL,
  `image` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
