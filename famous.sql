-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 14, 2019 at 02:09 AM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phonebechdou_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `admin_privileges` int(1) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `password`, `contact`, `admin_privileges`, `is_active`, `is_deleted`, `created_on`, `updated_on`) VALUES
(2, 'Mikhail Alam', 'mikhailalam@gmail.com', '0591d96e285f2ffed8a8cdd1b2777bf8', '03215222207', 1, 1, 0, '2018-06-03 19:00:00', '0000-00-00 00:00:00'),
(4, 'Abdullah Tariq', 'abdwebmail@gmail.com', 'e5a51b77b2564bbd625616de7eb75bfa', '03335330948', 1, 1, 1, '2018-07-12 06:46:00', '2018-07-23 21:30:24'),
(5, 'Muhammad Musa khan', 'muhammad.mk5698@gmail.com', '2b0822ec01d63e1f82215c03a9676364', '03081966778', 1, 1, 0, '2018-07-14 09:00:00', '0000-00-00 00:00:00'),
(6, 'Muhammad Mk', 'muhammad.mk1995@gmail.com', 'eb7f9542101c6a94f27404fafc3efd53', '0308', 2, 1, 0, '2018-07-18 21:54:26', '0000-00-00 00:00:00'),
(7, 'Muhammad Ali', 'alisherdin1796@gmail.com', 'eb7f9542101c6a94f27404fafc3efd53', '03174473636', 2, 1, 1, '2018-07-29 21:23:26', '2018-07-29 21:23:26');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `useremail` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `comment_time` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `username`, `useremail`, `message`, `comment_time`) VALUES
(1, 14, 'Mk', 'muhammad.mk1995@gmail.com', 'very interested and helpful.', '2018-08-07 05:08:26'),
(2, 14, 'Muhammad Musa', 'muhammad.mk5698@gmail.com', 'got it. Thanx', '2018-08-07 23:19:24'),
(3, 14, 'Abdullah', 'abdwebmail@gmail.com', 'Good Info. Thanks', '2018-08-08 00:10:23'),
(4, 27, 'Mk', 'muhammad.mk5698@gmail.com', 'interesting', '2018-08-31 00:42:04');

-- --------------------------------------------------------

--
-- Table structure for table `devices_brands`
--

CREATE TABLE `devices_brands` (
  `id` int(11) NOT NULL,
  `category_id` varchar(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `brand_detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices_brands`
--

INSERT INTO `devices_brands` (`id`, `category_id`, `brand_name`, `brand_detail`, `image`, `is_active`, `is_deleted`, `created_on`) VALUES
(3, '1', 'Apple', 'Apple Inc. is an American multinational technology company headquartered in Cupertino, California, that designs, develops, and sells consumer electronics, computer software, and online services.', 'apple.jpg', 1, 0, '2018-10-24 06:03:40'),
(4, '1', 'Samsung', 'Second most leading brand in mobile market.', 'samsung.jpg', 1, 0, '2018-10-24 06:09:26'),
(5, '1', 'Nokia', 'Nokia Corporation is a Finnish multinational telecommunications, information technology. The Nokia brand has since returned to the mobile and smartphone market through a licensing arrangement with HMD Global.', 'nokia.jpg', 1, 0, '2018-06-22 02:11:51'),
(6, '1', 'Q mobile', 'QMobile is a Karachi based consumer electronics company which markets smartphones in Pakistan. It is the largest smartphone brand in Pakistan with an estimate of one million mobile phones sold monthly. QMobile was launched in 2009.', 'qmobile.jpg', 1, 0, '2018-06-22 02:12:15'),
(7, '1', 'Sony', 'Sony Corporation is a Japanese multinational conglomerate corporation headquartered. The first Sony-branded product, the TR-55 transistor radio, appeared in 1955 but the company name did not change to Sony until January 1958.', 'sony.jpg', 1, 0, '2018-06-22 08:28:34'),
(8, '1', 'Asus', 'Asus was founded in Taipei in 1989 by T.H. Tung, Ted Hsu, Wayne Hsieh and M.T. Liao, all four having previously worked at Acer as hardware engineers.', 'asus.jpg', 1, 0, '2018-06-22 08:29:36'),
(9, '1', 'BlackBerry', 'BlackBerry was one of the most prominent smartphone vendors in the world, specializing in secure communications and mobile productivity, and well-known for the keyboards on most of its devices.', 'blackberry.jpg', 1, 0, '2018-06-22 08:30:44'),
(10, '1', 'LG', ' South Korean multinational electronics company headquartered in Yeouido-dong, Seoul, South Korea, and is part of the LG Group, employing 82,000 people working in 119 local subsidiaries worldwide.  One of the leading brand in market.', 'lg.jpg', 1, 0, '2018-07-16 19:27:17'),
(11, '1', 'Lenovo', 'The company was incorporated in Hong Kong in 1988 and would grow to be the largest PC company in China. Legend Holdings changed its name to Lenovo in 2004 and, in 2005, acquired the former Personal Computer Division of IBM, the company that invented the PC industry in 1981.', 'lenovo.jpg', 1, 0, '2018-06-22 19:13:40'),
(12, '3', 'Sony PlayStation', 'PlayStation is a gaming brand that consists of four home video game consoles, as well as a media center, an online service, a line of controllers, two handhelds and a phone, as well as multiple magazines.', 'sony ps.jpg', 1, 0, '2018-09-10 23:00:11'),
(13, '2', 'XBOX', 'Xbox is a video gaming brand created and owned by Microsoft of the United States. ... The Xbox 360 was officially unveiled on MTV on May 12, 2005, with detailed launch', 'xbox.jpg', 1, 0, '2018-09-10 23:00:59'),
(14, '1', 'Inifix', 'Infinix is a Hong Kong-based smartphone maker. The company claims to have R&D centres sprawling between France and Korea, with manufacturing centres in China. The company makes smartphones that run the Android operating system. It was founded in 2013.', 'inifix.jpg', 1, 0, '2018-10-24 07:32:17'),
(15, '2', 'Xbox', 'XBOX detail of brand category of gaming console', 'xbox.jpg', 1, 1, '2019-04-29 15:17:04'),
(16, '1', 'brand name test', 'brand name test detail', 'laptops.jpg', 1, 1, '2019-04-29 15:18:09'),
(17, '4', 'test brand image', 'test brand detail update image', 'samsung-smart_watch.jpg', 1, 1, '2019-05-01 08:14:03');

-- --------------------------------------------------------

--
-- Table structure for table `devices_category`
--

CREATE TABLE `devices_category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `category_detail` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices_category`
--

INSERT INTO `devices_category` (`id`, `category_name`, `category_detail`, `image`, `is_active`, `is_deleted`, `created_on`) VALUES
(1, 'Mobile', 'All type of devices related mobile should be added in that type', 'mobiles.jpg', 1, 0, '2019-04-28 12:38:23'),
(2, 'Gaming Console', 'All type of devices related Gaming devices should be added here.', 'gaming-consoles.png', 1, 0, '2019-05-21 18:08:45'),
(3, 'Smart Watch', 'All type of devices  smart watch should be added in that type', 'smart-watches.jpg', 1, 0, '2019-05-21 18:09:15'),
(4, 'Tablet', 'All brands and products against tablet device should be placed in that category', 'tablets.jpg', 1, 0, '2019-05-01 08:09:47'),
(5, 'Laptop', 'All device related laptop category should be placed here.', 'laptops.jpg', 1, 1, '2019-05-01 08:10:48'),
(6, 'test category', 'test category detail update image', 'samsung-smart_watch.jpg', 1, 1, '2019-05-01 08:13:13');

-- --------------------------------------------------------

--
-- Table structure for table `devices_products`
--

CREATE TABLE `devices_products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_model` varchar(100) NOT NULL,
  `top_product` int(1) NOT NULL,
  `image` varchar(100) NOT NULL,
  `product_detail` text NOT NULL,
  `stock` int(11) DEFAULT '0',
  `new_price` varchar(50) NOT NULL,
  `perfect_price` varchar(50) NOT NULL,
  `good_price` varchar(50) NOT NULL,
  `normal_price` varchar(50) NOT NULL,
  `faulty_price` varchar(50) NOT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `devices_products`
--

INSERT INTO `devices_products` (`id`, `category_id`, `brand_id`, `product_model`, `top_product`, `image`, `product_detail`, `stock`, `new_price`, `perfect_price`, `good_price`, `normal_price`, `faulty_price`, `is_active`, `is_deleted`, `created_on`) VALUES
(13, 1, 4, 'Samsung S6 64gb', 1, 'google.jpg', 'Samsung Galaxy S6 represents a unique fusion of glass molding and metal sculpturing techniques. Make a breathtaking design statement with its beautiful curves and radiant glass surfaces that reflect a wide spectrum of dazzling colours.', 0, '35000', '24500', '17500', '10500', 'Inquire for evaluation', 1, 1, '2018-06-23 23:31:13'),
(12, 1, 4, 'Samsung S6 32Gb', 0, 'samsung_s6_64gb.jpg', 'Samsung Galaxy S6 represents a unique fusion of glass molding and metal sculpturing techniques. Make a breathtaking design statement with its beautiful curves and radiant glass surfaces that reflect a wide spectrum of dazzling colors.', 0, '', '13600', '12325', '10200', 'Inquire for evaluation', 1, 0, '2018-07-17 18:31:21'),
(14, 1, 4, 'Samsung S6 Edge  32Gb', 1, 'samsung_s6_64gb.jpg', 'The worldâ€™s first and only dual curved smartphone screen expands the beauty and functionality of one of the brightest and highest resolution displays on the market.', 0, '250000', '175000', '125000', '75000', 'Inquire for evaluation', 1, 0, '2018-07-17 18:18:24'),
(15, 1, 4, 'Samsung S6 Edge  64Gb', 0, 'samsung_s6_64gb.jpg', 'The worldâ€™s first and only dual curved smartphone screen expands the beauty and functionality of one of the brightest and highest resolution displays on the market.', 0, '', '17000', '14450', '11050', 'Inquire for evaluation', 1, 0, '2018-06-23 23:35:27'),
(16, 1, 4, 'Samsung S7 32Gb', 0, 'samsung_s6_64gb.jpg', 'The dual-curve backs on the Galaxy S7 and S7 edge are the reason why they feel so comfortable when you hold them. Everything about the design, from the naturally flowing lines to the thin form factor, come together to deliver a grip.', 0, '', '18700', '16150', '11900', 'Inquire for evaluation', 1, 0, '2018-06-23 23:40:07'),
(17, 1, 4, 'Samsung S7 64Gb', 1, 'samsung_s6_64gb.jpg', 'The dual-curve backs on the Galaxy S7 and S7 edge are the reason why they feel so comfortable when you hold them. Everything about the design, from the naturally flowing lines to the thin form factor, come together to deliver a grip.', 0, '', '19550', '17000', '11900', 'Inquire for evaluation', 1, 0, '2018-06-23 23:44:27'),
(18, 1, 4, 'Samsung S7 Edge 32Gb', 1, 'samsung_s6_64gb.jpg', 'The dual-curve backs on the Galaxy  S7 edge is the reason why they feel so comfortable when you hold them. Everything about the design, from the naturally flowing lines to the thin form factor, come together to deliver a grip.', 0, '', '22100', '19550', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-23 23:46:38'),
(19, 1, 4, 'Samsung S7 Edge 64 Gb', 0, 'samsung_s6_64gb.jpg', 'The dual-curve backs on the Galaxy S7 edge is the reason why they feel so comfortable when you hold them. Everything about the design, from the naturally flowing lines to the thin form factor, come together to deliver a grip.', 0, '', '23800', '21250', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-23 23:49:18'),
(23, 1, 4, 'Samsung S8 32Gb', 1, 'samsung_s6_64gb.jpg', 'Prying eyes are not a problem when you have iris scanning on the Galaxy S8 .', 0, '', '34850', '31450', '28050', 'Inquire for evaluation', 1, 0, '2018-06-24 01:58:36'),
(24, 1, 4, 'Samsung S8 64Gb', 1, 'samsung_s6_64gb.jpg', 'Prying eyes are not a problem when you have iris scanning on the Galaxy S8 .', 0, '', '35700', '32300', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-07-17 18:18:17'),
(25, 1, 4, 'Samsung S8 plus', 1, 'samsung_s6_64gb.jpg', 'Prying eyes are not a problem when you have iris scanning on the Galaxy  S8+.', 0, '', '46750', '44200', '34000', 'Inquire for evaluation', 1, 0, '2018-06-24 02:00:56'),
(26, 1, 4, 'Samsung S5', 0, 'samsung_s6_64gb.jpg', 'The elements are no match for this phone. The Galaxy S5 is resistant to sweat, rain, sand and dust. So you can take it with you anywhere and everywhere you go.', 0, '', '7225', '5100', '3400', 'Inquire for evaluation', 1, 0, '2018-06-24 02:13:07'),
(27, 1, 4, 'Samsung C5 32Gb', 0, 'samsung_s6_64gb.jpg', 'The elements are no match for this phone. \r\n', 0, '', '13175', '11050', '7650', 'Inquire for evaluation', 1, 0, '2018-06-24 02:15:11'),
(28, 1, 4, 'Samsung C5 64Gb', 0, 'samsung_s6_64gb.jpg', 'The elements are no match for this phone. ', 0, '', '16150', '13600', '11050', 'Inquire for evaluation', 1, 0, '2018-06-24 02:16:26'),
(29, 1, 4, 'Samsung C7 32Gb', 1, 'samsung_s6_64gb.jpg', 'The elements are no match for this phone. you can take it with you anywhere and everywhere you go.', 0, '', '18275', '14450', '11900', 'Inquire for evaluation', 1, 0, '2018-06-24 02:18:17'),
(30, 1, 4, 'Samsung C7 64Gb', 0, 'samsung_s6_64gb.jpg', 'you can take it with you anywhere and everywhere you go.', 0, '', '18700', '15300', '12750', 'Inquire for evaluation', 1, 0, '2018-06-24 02:19:49'),
(31, 1, 4, 'Samsung C9 32Gb', 0, 'samsung_s6_64gb.jpg', 'The new Galaxy C9 is a lean mean machine. The stunningly crafted design with solid curves, the powerful 2.5D Glass with full-metal Unibody â€“ all come within a 6.9 mm thin frame.', 0, '', '20400', '18275', '13600', 'Inquire for evaluation', 1, 0, '2018-06-24 02:21:19'),
(32, 1, 4, 'Samsung C9 64Gb', 1, 'samsung_s6_64gb.jpg', 'The new Galaxy C9 is a lean mean machine. The stunningly crafted design with solid curves, the powerful 2.5D Glass with full-metal Unibody â€“ all come within a 6.9 mm thin frame.', 0, '', '21250', '18700', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:22:07'),
(33, 1, 4, 'Samsung A 5 (2015)', 0, 'samsung_s6_64gb.jpg', 'Elegance in its purest form. Crafted with minimalism in mind for maximum enjoyment its highly resistant rear 3D Glass and optimal 5.2â€ display fuse together flawlessly to provide a remarkably seamless design.', 0, '', '8500', '6800', '5950', 'Inquire for evaluation', 1, 0, '2018-06-24 02:27:06'),
(34, 1, 4, 'Samsung Note 3', 0, 'samsung_s6_64gb.jpg', 'Like a mini tablet that fits in your pocket. The stunning 5.7â€ display with full-HD resolution is ideal for watching videosâ€”even in bright daylight. Super slim and super light, it really is the best of both worlds.', 0, '', '8500', '6800', '5950', 'Inquire for evaluation', 1, 0, '2018-06-24 02:29:01'),
(35, 1, 4, 'Samsung Note 5', 0, 'samsung_s6_64gb.jpg', 'Bigger has always been better.', 0, '', '17000', '14450', '10200', 'Inquire for evaluation', 1, 0, '2018-06-24 02:32:47'),
(36, 1, 4, 'Samsung Note 8 Single sim', 1, 'samsung_s6_64gb.jpg', 'Use the S Pen to express yourself in ways that make a difference. Draw your own emojis to show how you feel or write a message on a photo and send it as a handwritten note. Do things that matter with the S Pen.', 0, '', '52700', '51000', '42500', 'Inquire for evaluation', 1, 0, '2018-06-24 02:35:25'),
(37, 1, 4, 'Samsung Note 8 Dual Sim', 1, 'samsung_s6_64gb.jpg', 'Use the S Pen to express yourself in ways that make a difference. Draw your own emojis to show how you feel or write a message on a photo and send it as a handwritten note. Do things that matter with the S Pen.', 0, '40000', '28000', '20000', '12000', 'Inquire for evaluation', 1, 1, '2018-07-17 18:20:31'),
(38, 1, 3, 'Iphone  8 64Gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 8 are splash, water, and dust resistant ', 0, '', '46750', '44200', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:42:51'),
(39, 1, 3, 'Iphone 8 256Gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 8 are splash, water, and dust resistant ', 0, '', '53550', '51000', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:43:53'),
(40, 1, 3, 'iphone 8 plus 64Gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 8 Plus are splash, water, and dust resistant ', 0, '', '59500', '53550', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-07-17 18:19:57'),
(41, 1, 3, 'iphone 8 plus 256Gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 8 Plus are splash, water, and dust resistant ', 0, '', '67150', '64600', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:45:53'),
(42, 1, 3, 'Iphone X 64Gb', 1, 'samsung_s6_64gb.jpg', 'The iPhone X display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle.', 0, '', '77350', '72250', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:50:29'),
(43, 1, 3, 'Iphone X 256Gb', 1, 'samsung_s6_64gb.jpg', 'The iPhone X display has rounded corners that follow a beautiful curved design, and these corners are within a standard rectangle.', 0, '', '85000', 'Inquire for evaluation', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 02:52:45'),
(44, 1, 3, 'Iphone 516Gb', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.00-inch touchscreen display with a resolution of 640 pixels by 1136 pixels at a PPI of 326 pixels per inch. ', 0, '', '7225', '5950', '4250', 'Inquire for evaluation', 1, 0, '2018-07-17 18:20:04'),
(45, 1, 3, 'Iphone 5 32Gb', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.00-inch touchscreen display with a resolution of 640 pixels by 1136 pixels at a PPI of 326 pixels per inch. ', 0, '', '8500', '6800', '4250', 'Inquire for evaluation', 1, 0, '2018-06-24 02:55:51'),
(46, 1, 3, 'Iphone 5c', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.00-inch touchscreen display with a resolution of 640 pixels by 1136 pixels at a PPI of 326 pixels per in', 0, '300', '225', '180', '120', 'Inquire for evaluation', 1, 0, '2018-10-05 06:37:37'),
(47, 1, 3, 'Iphone 5s', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.00-inch touchscreen display with a resolution of 640 pixels by 1136 pixels at a PPI of 326 pixels per inch.', 0, '500', '375', '300', '200', 'Inquire for evaluation', 1, 0, '2018-10-05 06:38:29'),
(48, 1, 3, 'Iphone 4', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 3.50-inch touchscreen display with a resolution of 640 pixels by 960 pixels at a PPI of 326 pixels per inch.', 0, '', '4250', 'Inquire for evaluation', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-07-17 18:20:11'),
(49, 1, 3, 'Iphone 6 16gb', 1, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.70-inch touchscreen display with a resolution of 750 pixels by 1334 pixels at a PPI of 326 pixels per inch.', 0, '', '14450', '11900', '9350', 'Inquire for evaluation', 1, 0, '2018-07-17 18:20:17'),
(50, 1, 3, 'Iphone 6 32Gb', 0, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.70-inch touchscreen display with a resolution of 750 pixels by 1334 pixels at a PPI of 326 pixels per inch.', 0, '', '15300', '13600', '12750', 'Inquire for evaluation', 1, 0, '2018-06-24 03:03:30'),
(51, 1, 3, 'Iphone 6 64Gb', 1, 'samsung_s6_64gb.jpg', 'The phone comes with a 4.70-inch touchscreen display with a resolution of 750 pixels by 1334 pixels at a PPI of 326 pixels per inch.', 0, '', '18700', 'Inquire for evaluation', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:04:10'),
(52, 1, 3, 'Iphone 6s 16Gb', 0, 'samsung_s6_64gb.jpg', 'Available space is less and varies due to many factors. A standard configuration uses approximately 8GB to 11GB of space', 0, '', '18700', '15300', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:07:29'),
(53, 1, 3, 'Iphone 6s 32Gb', 0, 'samsung_s6_64gb.jpg', 'A good phone to be used.', 0, '', '18700', '15300', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:08:59'),
(54, 1, 3, 'Iphone 6s 64Gb', 0, 'samsung_s6_64gb.jpg', 'Available space is less and varies due to many factors.', 0, '', '21675', '18700', '16150', 'Inquire for evaluation', 1, 0, '2018-06-24 03:10:12'),
(55, 1, 3, 'Iphone 6s plus 16Gb', 1, 'samsung_s6_64gb.jpg', 'iphone 6s Plus and being one of the most iconic products of the company, it comes with many upgrades. With rounded edges.', 0, '', '20400', '17850', '15300', 'Inquire for evaluation', 1, 0, '2018-06-24 03:16:42'),
(56, 1, 3, 'Iphone 6s plus 64gb', 0, 'samsung_s6_64gb.jpg', 'iphone 6s Plus and being one of the most iconic products of the company, it comes with many upgrades. With rounded edges,', 0, '', '23800', '21250', '17850', 'Inquire for evaluation', 1, 0, '2018-06-24 03:17:49'),
(57, 1, 3, 'Iphone 7 128Gb', 1, 'samsung_s6_64gb.jpg', 'This is 7 Carrying some strikingly expressive & innovative enhancements to the whole Apple iPhone 7 experience', 0, '', '37400', '31450', '25500', 'Inquire for evaluation', 1, 0, '2018-06-24 03:20:38'),
(58, 1, 3, 'Iphone 7 256Gb', 1, 'samsung_s6_64gb.jpg', 'This is 7 Carrying some strikingly expressive & innovative enhancements to the whole Apple iPhone 7 experience', 0, '', '39100', '36550', '32300', 'Inquire for evaluation', 1, 0, '2018-06-24 03:21:37'),
(59, 1, 3, 'Iphone 7 plus 32gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 7 Plus features 12MP dual cameras with 4K video, optical image stabilization, and Portrait mode. A 5.5-inch Retina HD display with wide color gamut and 3D Touch.', 0, '', '40800', '38250', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:24:02'),
(60, 1, 3, 'Iphone 7 plus 128Gb', 0, 'samsung_s6_64gb.jpg', 'iPhone 7 Plus features 12MP dual cameras with 4K video, optical image stabilization, and Portrait mode. A 5.5-inch Retina HD display with wide color gamut and 3D Touch.', 0, '', '47600', '45050', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:24:55'),
(61, 1, 3, 'Iphone 7 plus 256Gb', 1, 'samsung_s6_64gb.jpg', 'iPhone 7 Plus features 12MP dual cameras with 4K video, optical image stabilization, and Portrait mode. A 5.5-inch Retina HD display with wide color gamut and 3D Touch.', 0, '', '49300', '45900', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-06-24 03:25:53'),
(62, 3, 12, 'PS1', 0, 'samsung_s6_64gb.jpg', 'The PlayStation[note 1] (officially abbreviated to PS, and commonly known as the PS1 or its codename, PSX) is a home video game console developed and marketed by Sony Computer Entertainment. The console was released on 3 December 1994 in Japan,[2] 9 September 1995 in North America, 29 September 1995 in Europe, and 15 November 1995 in Australia. The console was the first of the PlayStation lineup of home video game consoles. It primarily competed with the Nintendo 64 and the Sega Saturn as part of the fifth generation of video game consoles.', 0, '', 'Inquire for evaluation', 'Inquire for evaluation', 'Inquire for evaluation', 'Inquire for evaluation', 1, 0, '2018-09-18 06:56:12'),
(63, 1, 4, 'ssd', 0, 'samsung_s6_64gb.jpg', 'dfsd fsdfsd', 0, '12345', '9259', '7407', '4938', 'Inquire for evaluation', 1, 1, '2018-10-24 07:45:08'),
(66, 1, 8, 'test model', 0, 'samsung_s6_64gb.jpg', 'hello test product image', 0, '12345', '9259', '7407', '4938', 'Inquire for evaluation', 1, 0, '2018-10-24 07:48:12'),
(67, 1, 4, 'model', 1, 'nokia.jpg', 'detail', 0, '1000', '700', '500', '300', 'Inquire for evaluation', 1, 1, '2019-04-30 17:36:50'),
(68, 1, 3, 'model2', 1, 'blackberry.jpg', 'detail ere', 0, '2500', '1750', '1250', '750', 'Inquire for evaluation', 1, 0, '2019-04-30 17:42:21'),
(69, 1, 3, 'model 3', 1, 'mobiles.jpg', 'detail here 2', 0, '3000', '2100', '1500', '900', 'Inquire for evaluation', 1, 1, '2019-04-30 17:43:50'),
(70, 1, 4, 'model 4', 2, 'inifix.jpg', 'detail of mobile 4', 0, '35000', '24500', '17500', '10500', 'Inquire for evaluation', 1, 1, '2019-04-30 17:44:40'),
(71, 3, 12, 'model test', 2, 'lg.jpg', 'detail of brand product', 0, '15000', '10500', '7500', '4500', 'Inquire for evaluation', 1, 1, '2019-05-01 08:15:42'),
(72, 1, 3, 'model', 2, '1910496_719061444861986_1969492356670958531_n.jpg', 'detail', 5, '5000', '3500', '2500', '1500', 'Inquire for evaluation', 1, 0, '2019-05-01 17:58:18'),
(73, 1, 3, 'model test', 2, '1910496_719061444861986_1969492356670958531_n.jpg', 'detail of model test product', 2, '768888', '538222', '384444', '230667', 'Inquire for evaluation', 1, 0, '2019-05-01 18:06:49'),
(74, 1, 4, 'model test', 1, '1910496_719061444861986_1969492356670958531_n.jpg', 'zxd cdscv', 1, '12345', '8642', '6173', '3704', 'Inquire for evaluation', 1, 1, '2019-05-01 18:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `device_buy_requests`
--

CREATE TABLE `device_buy_requests` (
  `id` int(11) NOT NULL,
  `device_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `client_email` varchar(255) NOT NULL,
  `client_contact` varchar(100) NOT NULL,
  `device_condition` varchar(50) NOT NULL,
  `received_through` varchar(50) NOT NULL,
  `notified` tinyint(2) NOT NULL DEFAULT '0',
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `status_buy` tinyint(2) NOT NULL DEFAULT '0',
  `buying_comment` varchar(255) DEFAULT NULL,
  `buying_price` int(11) DEFAULT NULL,
  `bought_price` int(11) DEFAULT NULL,
  `readBy` varchar(255) NOT NULL DEFAULT '',
  `comment` varchar(255) NOT NULL DEFAULT '',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `reqTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_buy_requests`
--

INSERT INTO `device_buy_requests` (`id`, `device_id`, `client_name`, `client_email`, `client_contact`, `device_condition`, `received_through`, `notified`, `status`, `status_buy`, `buying_comment`, `buying_price`, `bought_price`, `readBy`, `comment`, `is_deleted`, `reqTime`) VALUES
(1, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '03081966778', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 0, '2019-03-24 17:34:05'),
(2, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', 'fkjewfwe', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, 'admin', '', 1, '2019-03-24 17:35:19'),
(3, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', 'fhwef', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 0, '2019-03-24 17:36:59'),
(4, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '03081966778', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 0, '2019-03-24 17:38:34'),
(5, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '03081966778', 'Like New', 'mobile', 0, 3, 0, NULL, NULL, NULL, '', '', 0, '2019-03-24 17:40:04'),
(6, 13, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '03081966778', 'Good', 'mobile', 1, 3, 3, '', 13000, NULL, '', '', 0, '2019-03-24 17:41:17'),
(7, 12, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', 'fhwef', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 0, '2019-03-27 19:15:03'),
(8, 12, 'efef', 'efef@ff.dwef', 'efefe', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 1, '2019-05-18 18:01:21'),
(9, 12, 'efef', 'efef@ff.dwef', 'efefe', 'Like New', 'mobile', 0, 0, 0, NULL, NULL, NULL, '', '', 1, '2019-05-18 18:02:16');

-- --------------------------------------------------------

--
-- Table structure for table `device_sell_requests`
--

CREATE TABLE `device_sell_requests` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `device_type` int(5) NOT NULL,
  `device_company` varchar(50) NOT NULL,
  `device_model` varchar(50) NOT NULL,
  `space` varchar(20) NOT NULL,
  `device_condition` varchar(100) NOT NULL,
  `available_time` varchar(255) NOT NULL,
  `selling_type` varchar(255) NOT NULL,
  `received_through` varchar(50) NOT NULL DEFAULT 'Website',
  `status` int(1) NOT NULL DEFAULT '0',
  `status_sale` tinyint(1) NOT NULL DEFAULT '0',
  `sale_price` int(11) DEFAULT '0',
  `evaluated_price` int(11) NOT NULL DEFAULT '0',
  `comment` text,
  `selling_comment` text,
  `readBy` varchar(255) DEFAULT NULL,
  `notified` int(1) DEFAULT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `reqTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `device_sell_requests`
--

INSERT INTO `device_sell_requests` (`id`, `first_name`, `email`, `contact`, `device_type`, `device_company`, `device_model`, `space`, `device_condition`, `available_time`, `selling_type`, `received_through`, `status`, `status_sale`, `sale_price`, `evaluated_price`, `comment`, `selling_comment`, `readBy`, `notified`, `is_deleted`, `reqTime`) VALUES
(18, 'Mikhal', 'mikhailalam@gmail.com', '03215222207', 1, 'Samsung', 'J330FN', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 0, 0, '2018-06-25 20:08:08'),
(19, 'Dr Hamza', 'hamzatauqeer123@gmail.com', '03004057079', 1, 'Acer', '380', '', 'Good', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 0, 0, '2018-06-25 20:32:32'),
(20, 'Dr Hamza', 'hamzatauqeer123@gmail.com', '03004057079', 1, 'Apple', 'A1332', '', 'Faulty', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 0, 0, '2018-06-25 20:35:42'),
(21, 'Muhammad', 'abdwebmail@gmail.com', '03335330948', 1, 'Samsung', 'J7', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 0, 0, '2018-06-27 22:23:28'),
(30, 'Talib', 'arslaanbhatti49@gmail.com', '03014051681', 1, 'Samsung', 'J7 core', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 18:46:36'),
(32, 'Muhammad Ijaz Malik', 'ijazmalik67@yahoo.com', '03051793613', 1, 'Samsung', 'J5 (2016)', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 21:09:02'),
(33, 'Adeel Ahmad', 'm.baadshah31@gmail.com', '03130311108', 1, 'Huawei', 'honor 7X', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 21:11:00'),
(34, 'M Umiar khalid', 'umair2456.uk@gmail.com', '03067544347', 1, 'Qmobile', '700i', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:02:24'),
(35, 'M Umiar khalid', 'umair2456.uk@gmail.com', '03067544347', 1, 'Qmobile', '700i', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:02:24'),
(36, 'Hamad', 'hmaad.ch@gmail.com', '03217800015', 1, 'Apple', 'iphone X', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:05:15'),
(37, 'M.mustafa', 'arslaanbhatti49@gmail.com', '03064490433', 1, 'Huawei', 'y52', '', 'Good', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:07:27'),
(38, 'Shahid', 'ms219221@gmail.com', '03161457981', 1, 'Samsung', 'S7', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:10:51'),
(39, 'Mubasahar', 'fatimajutt567@1gmail.com', '03044458270', 1, 'Samsung', 'J7 pro', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:22:58'),
(40, 'Sajid', 'sajed@gmail.com', '03044714204', 1, 'Oppo', 'A 71', '', 'Excelent', '', '1', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:35:17'),
(41, 'Rizwan', 'rizwanhaider143@gmail.com', '03078768767', 1, 'Huawei', 'Y560', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:37:22'),
(42, 'usman', 'm.usman54123@gmail.com', '03421846013', 1, 'Samsung', 'S7 edge', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:45:12'),
(43, 'M.Shoaib', 'anzeez@gmail.com', '03082388919', 1, 'Samsung', 'A 5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-04 22:56:54'),
(44, 'usman', 'u_janjua@hotmail.com', '03312021559', 1, 'ASUS', 'ASUS_T00P', '', 'Good', '', '', 'Website', 1, 0, 0, 1, '', NULL, 'Admin , Arslan Riaz', 1, 0, '2018-07-05 00:01:06'),
(45, 'Waqar Ahmad', 'awan11225@gmail.com', '03035186303', 1, 'Samsung', 'grand prime', '', 'Faulty', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 17:50:53'),
(46, 'Haider Sultan', 'haidersukhera7200@gmail.com', '03104214540', 1, 'Huawei', 'honor 7c', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:03:58'),
(47, 'Shahid ansar', 'shahidansarcareem@gamil.com', '03103319198', 1, 'Samsung', 'A6', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:06:28'),
(48, 'Ahmad Ali', 'ahmadali07691@gmail.com', '03104474603', 1, 'Huawei', 'honor 9 lite', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:08:56'),
(49, 'Muhammad Hussain', 'arslaanbhatti1122@gmail.com', '03034819803', 1, 'Samsung', 'Grand', '', 'Faulty', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:25:53'),
(50, 'Muhammad Rizwan', 'rizwanok@gmail.com', '03061161196', 1, 'Tecno', 'Spark', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:33:27'),
(51, 'Hassan iqbal', 'xassanxbal@gmail.com', '03014168701', 1, 'Samsung', 'Note 3', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:49:16'),
(52, 'Amir Ali', 'amirtabbasum786@gmail.com', '03070052635', 1, 'Huawei', 'mate 10 lite', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 18:55:20'),
(53, 'Salman Neol', 'FPL@aerlinx.net.pk', '03139478861', 1, 'G mobile', 'L8 i', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:13:11'),
(54, 'Ghulam Rasool', 'ghulamgh75@gmail.com', '03038686503', 1, 'Samsung', 'J5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:14:30'),
(55, 'Jackson Harry', 'jackson1pk@yahoo.com', '03224807508', 1, 'Samsung', 'Galaxy pro', '', 'Choose...', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:15:39'),
(56, 'Jackson Harry', 'jackson1pk@yahoo.com', '03224807508', 1, 'Apple', 'iphone 5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:16:34'),
(57, 'Qamar Abbas', 'mk4915155@gmail.com', '03051707291', 1, 'Vivo', 'Y 8', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:17:49'),
(58, 'Abdullah Bin Saeed', 'abdullahsaad1416792@gmail.com', '03201416792', 1, 'Qmobile', 'Infinite', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:19:01'),
(59, 'Atif Munir', 'arslaanbhatti1122@gmail.com', '03014508806', 1, 'Huawei', 'MYA-L22', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:20:09'),
(60, 'Muhammad Akmal', 'm.akmal5259@gmail.com', '03445542983', 1, 'Samsung', 'Dous prime', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:21:21'),
(61, 'Muhammad Asif', 'arslaanbhatti1122@gmail.com', '03088216371', 1, 'Samsung', 'J5 (2016)', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:22:20'),
(62, 'Allah Rakha', 'arslaanbhatti1122@gmail.com', '03014828047', 1, 'Qmobile', '700 duos 2', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:23:13'),
(63, 'Ahmad', 'arslaanbhatti1122@gmail.com', '03014102615', 1, 'Samsung', 'J 5 pro', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:24:12'),
(64, 'Muhammad Hussnain', 'arslaanbhatti1122@gmail.com', '03055593101', 1, 'Nokia', 'nokia 101', '', 'Good', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:25:54'),
(65, 'muhammad Usman', 'hajimobilink4114114@gmail.com', '03030443440', 1, 'Oppo', 'F3 +', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:28:15'),
(66, 'Farhan Abbas', 'fantalha@gmail.com', '03341166048', 1, 'Samsung', 'S7 edge', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 19:30:37'),
(67, 'Muhammad fayaz', 'arslaanbhatti1122@gmail.com', '03164637219', 1, 'Huawei', 'Y5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 20:24:34'),
(68, 'Tariq Ameen', 'tariqtum@gmail.com', '03150434370', 1, 'Qmobile', 'J7', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 20:46:31'),
(69, 'Ali raza', 'alifaizanmuhammad602@gmail.com', '03214075872', 1, 'Oppo', 'f3', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 20:51:15'),
(70, 'Adeel Ahmad', 'fnrw028a@gmail.com', '03218400654', 1, 'Samsung', 'S 5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 22:55:31'),
(71, 'ZohaibAhmad', 'zohaibrajpoot063@gmail.com', '03320453113', 1, 'Motorola', 'A4', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 22:58:50'),
(72, 'fahad latif', 'faadi3@gmail.com', '03164457766', 1, 'Samsung', 'J5', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 23:00:57'),
(73, 'Rao Shaan', 'raoshaan.tehseen01@gmail.com', '03347447047', 1, 'Nokia', 'Nokia 3', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 23:04:38'),
(74, 'Dilawar', 'chdilawar9999@gmail.com', '03227027280', 1, 'Samsung', 'note 3', '', 'Good', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 23:08:22'),
(75, 'Nadeem', 'maliknadeemafzaliahp@gmail.com', '03107017509', 1, 'Huawei', 'honor 8', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 23:19:20'),
(76, 'Danish Ali', 'arslaanbhatti49@gmail.com', '03000855739', 1, 'Huawei', 'y 7 prime', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-05 23:26:42'),
(77, 'Muhammad Moaz', 'arslaanbhatti1122@gmail.com', '03014714842', 1, 'Nokia', 'Nokia 1280', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-06 00:00:42'),
(78, 'Darab Khan', 'darab.kamran15@gmail.com', '03316980036', 1, 'HTC', 'M7', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-06 00:03:40'),
(79, 'Abdulwahab', 'awahabanees@gmail.com', '03244340649', 1, 'Huawei', 'Honor 8 lite', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-09 07:30:21'),
(80, 'Rashid', 'rashidshafiq2@gmail.com', '03337640871', 1, 'Apple', 'Iphone 6', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-09 19:50:04'),
(81, 'Aashir', 'aashirumair@gmail.com', '03348099056', 1, 'Mi', 'Redmi 5 plus', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-09 22:30:17'),
(82, 'Muhammad Hamza Amjad', 'hamzaamjad.126198@gmail.com', '03353206128', 1, 'Huawei p8 lite', 'p8 lite', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-09 23:34:57'),
(83, 'Asaal', 'asaal31@gmail.com', '03200438218', 1, 'Oneplus', 'Oneplus 5 8GB ram', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 01:22:48'),
(84, 'Usman Shabbir', 'meharusman374@gmail.com', '03331370012', 1, 'Huawei Mate 10 Lite', 'RNE-L21', '', 'Excelent', '', '', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 05:51:16'),
(87, 'Haris', 'harischaudhry63@gmail.com', '03440460185', 1, 'Huawei', 'Mate 10 lite', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 06:49:30'),
(88, 'M. Tayyab', 'tayyab29.12@gmail.com', '03161448909', 1, 'Amazon', 'Fire Phone', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 08:06:24'),
(89, 'Umer Manan', 'umer.parallel.lhr@gmail.com', '0333-4904831', 1, 'Haier', 'Esteem v 4', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 08:22:35'),
(90, 'rafey', 'abdulrafey38@gmail.com', '03354093240', 1, 'Huawei', 'honor 8 lite', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 08:25:10'),
(91, 'salman', 'sulmanakram90@gmail.com', '03034951205', 1, 'Samsung Grand prime', 'Grand prime SM-530H', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 08:51:59'),
(92, 'Husnain', 'husnain@yahoo.com', '03007953079', 1, 'LG', 'V20', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-10 09:17:05'),
(93, 'Husnain', 'husnain@yahoo.com', '03007953079', 1, 'Sony', 'Z1', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-10 09:17:27'),
(94, 'Haris', 'harisstubborn@gmail.com', '03007986425', 1, 'Samsung', 'SM-G930T', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-10 10:52:04'),
(97, 'Hamza', 'hamzarasool1025@gmail.com', '03334224987', 1, 'Infinix', 'Infinix_X521', '', 'Average', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-10 18:36:05'),
(98, 'Hamza', 'hamzarasool1025@gmail.com', '03334224987', 1, 'Infinix', 'Infinix_X521', '', 'Average', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin , Mikhail Alam', 1, 0, '2018-07-10 18:36:09'),
(121, 'Sarmad', 'sarmadashfaque123@gmail.com', '03363457943', 1, 'Huawei Honor 8 lite', 'PRA-LA1', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-10 22:13:35'),
(122, 'muhammad umer', 'umerch169@gmail.com', '03454753275', 1, 'vivo', 'v7plus', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-10 23:06:28'),
(124, 'Muhammad Rashid', 'piceskhan3@gmail.com', '0322-7202426', 1, 'SAMSUNG', 'SM-G532F', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-12 22:17:04'),
(125, 'Abdul Majeed', 'abdulmajeed12472@gmail.com', '03214290564', 1, 'Qmobile', 'Qmobile s1 pro', '', 'Faulty', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-12 22:36:27'),
(126, 'Hafiz Muhammad Awais Tahir', 'awaistahir136@gmail.com', '03214703687', 1, 'Samsung galaxy j3 pro', 'SM-J3 1110', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 00:07:23'),
(127, 'Ayaz Baig', 'ayaz.dexter@gmail.com', '03064761323', 1, 'Huawei', 'Y300-0100', '', 'Faulty', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 07:01:32'),
(128, 'Taimur', 'idreestaimur@hotmail.com', '03134706927', 1, 'Nokia', 'Nokia 3', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 12:08:26'),
(129, 'Adnan babar', 'adnanbabargill007@gmail.com', '03234911109', 1, 'LG', 'G3', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 17:05:52'),
(130, 'Talha', 'talha._khawar@yahoo.com', '03457266246', 1, 'Samsung', 'Note 1', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 19:07:06'),
(131, 'Abc', 'saminamughal51@yahoo.com', '03243978232', 1, 'Samsung', 'Grand prime', '', 'Average', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Admin', 1, 0, '2018-07-13 19:29:22'),
(132, 'baber sajjad', 'mianbaber83@gmail.com', '03244658359', 1, 'Samsung', 'note 3 (N900A)', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Mikhail Alam', 1, 0, '2018-07-13 21:52:48'),
(133, 'Muhammad Ali', 'ali.rana22@gmail.com', '03334318024', 1, 'Xiaomi MI', '4A', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-07-13 22:12:02'),
(134, 'Shah Latif', 'shahalam@gmail.com', '923335672819', 1, 'Huawei', 'P9 lite', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-07-13 22:12:18'),
(135, 'Kashif', 'inspirelove26@yahoo.com', '03014213252', 1, 'Apple', 'iPhone 5', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-14 01:09:33'),
(136, 'Kashif', 'kashif_shahnoor@yahoo.com', '03208462004', 1, 'Samsung Galaxy note 4', 'T mobile american', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-07-14 22:11:11'),
(137, 'Ahmed hashmi', 'ahmedhashmi108@gmail.com', '03018412584', 1, 'Iphone', '5s gold', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-14 23:26:43'),
(138, 'Ahmed hashmi', 'ahmedhashmi108@gmail.com', '03018412584', 1, 'Apple iphone', '5s gold', '', 'Good', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-14 23:28:12'),
(139, 'Afzal arshad', 'cha46881@gmail.com', '03034185743', 1, 'Samsung', 'J5 prime', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-15 02:30:26'),
(140, 'hamza mazhar', 'sonarajpoot776@gmail.com', '03023o85272', 1, 'lg', 'lg magna', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-15 04:03:03'),
(141, 'Vicky', 'vbillu3@gmail.com', '00923084543488', 1, 'Grand prime plus', '12', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-15 16:46:58'),
(145, 'Mishaal', 'pmeshall91@gmail.com', '03234285040', 1, 'Samsung', 'Galaxy A5 (2017)', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-15 18:06:19'),
(149, 'Muaaz', 'muaaz.zafar@yahoo.com', '03000211444', 1, 'Samsung galaxy', 'J1', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 02:45:51'),
(150, 'Muaaz', 'muaaz.zafar@yahoo.com', '03000211444', 1, 'Nokia', 'N72', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 02:47:24'),
(151, 'Mahmood', 'panchiiz@yahoo.com', '03454040141', 1, 'Samsung', 'Sumsung galaxy a3 2017', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 03:14:37'),
(152, 'Ahmad', 'Ahmadg78@outlook.com', '03056102898', 1, 'Iphone', 'iPhone 7 32 gb ya iPhone 7plus 32 gb', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 04:01:19'),
(153, 'Ahmad Ali', 'aadisheikh095@gmail.com', '03034853205', 1, 'Huawei', 'P9 lite', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 06:00:20'),
(154, 'Bilal', 'majorlazer143@gmail.com', '03364334384', 1, 'Huawei', 'Mate 10 lite  8 months warranty', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 10:32:41'),
(155, 'Hamza sajjad', 'hamzakhokhar5070@gmail.com', '03045588041', 1, 'Samsung', 'A8 2018 A530F single sim', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-16 13:18:20'),
(156, 'Saad Azhar', 'lah.vynz@gmail.com', '03236376004', 1, 'Samsung', 'Grand Prime Plus 2018', '', 'Like New', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz , Muhammad Musa Khan', 1, 0, '2018-07-16 20:55:55'),
(157, 'Aamir Saddiq', 'aamirmughal117@gmail.com', '03024449171', 1, 'Huawei', 'Mate10 Lite with 11month Warranty', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 06:00:47'),
(158, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 09:00:42'),
(159, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-17 09:00:44'),
(160, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-17 09:00:44'),
(161, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-17 09:00:44'),
(162, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq , Arslan Riaz', 1, 0, '2018-07-17 09:00:44'),
(163, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 09:00:44'),
(164, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 09:00:44'),
(165, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 09:00:44'),
(166, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 09:00:45'),
(167, 'Ali Rauf', 'alirauf17@gmail.com', '03030612314', 1, 'SAMSUNG', 'Galaxy Note 3', '', 'Average', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-17 09:00:45'),
(168, 'kashif', 'inspirelove26@yahoo.com', '03014213252', 1, 'Samsung', 'Galaxy j3 2017 black colour 16 gb', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-17 18:57:40'),
(169, 'Muhammad Musa', 'musarajpoot420@gmail.com', '03226660873', 1, 'huaweii', 'honor 4x', '', 'Average', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz , Abdullah Tariq', 1, 0, '2018-07-17 20:54:30'),
(170, 'Ayaz Baig', 'ayaz.dexter@gmail.com', '03064761323', 1, 'Huawei', 'Y300-0100', '', 'Faulty', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-18 06:22:13'),
(171, 'badar', 'badarfayyaz4@gmail.com', '03354351684', 1, 'Huawei', 'p8lite', '', 'Good', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz , Muhammad Musa Khan', 1, 0, '2018-07-18 17:18:06'),
(172, 'Hamza', 'hamzakhokhar5070@gmail.com', '03045588041', 1, 'Samsung', 'A8 2018 single sim', '', 'Like New', '', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-18 23:47:51'),
(173, 'Sohail', 'sardarsohail431@gmail.com', '03004626645', 1, 'samsung', 'J5 2015', '', 'Faulty', '', 'Later', 'Website', 3, 0, 2000, 3, '', NULL, 'Arslan Riaz , Muhammad Musa Khan', 1, 0, '2018-07-19 03:31:12'),
(175, 'Waseem Akram', 'waseemakram7654321@gmail.com', '03364314308', 1, 'Apple', 'Iphone 6plus', '', 'Average', '', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-19 03:35:52'),
(176, 'Mehboob Rafiq', 'mehboobrafiq450@gmail.com', '03015688165', 1, 'Lenovo', 'Vibe P1c58', '', 'Good', '', 'Immediately', 'Website', 3, 0, 2000, 3, '', NULL, 'Arslan Riaz , Muhammad Musa Khan', 1, 0, '2018-07-19 06:58:02'),
(181, 'Saifullah Khalid', 'saifullahkhalid008@gmail.com', '03498468534', 1, 'LG', 'LG Optimus Gpro F240S', '', 'Faulty', '21:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-20 03:44:13'),
(182, 'Zarnain Baig', 'zarnain_baig@hotmail.com', '03159944407', 1, 'Honor', '4C', '', 'Like New', '15:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-20 06:07:46'),
(185, 'Hamza Sajjad', 'hamzakhokhar5070@gamil.com', '03045588041', 1, 'Samsung', 'A8 2018', '', 'Like New', '22:10', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-21 00:27:44'),
(186, 'Irfan', 'mohammadhussain5598@gmail.com', '+103316097032', 1, 'Vivo', 'Vivo y 71', '', 'Like New', '13:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz', 1, 0, '2018-07-21 04:24:00'),
(187, 'Asif', 'mail2chasif@gmail.com', '03048440849', 1, 'Huawei', 'P9lite', '', 'Good', '17:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Arslan Riaz , Mikhail Alam , Abdullah Tariq', 1, 0, '2018-07-22 20:32:17'),
(188, 'Hassan', 'snopsweeet@gmail.com', '03039220933', 1, 'Samsung a510', 'A510', '', 'Good', '14:13', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Mikhail Alam , Arslan Riaz , Mikhail Alam , Mikhail Alam , Mikhail Alam , Muhammad Musa Khan , Abdullah Tariq', 1, 0, '2018-07-22 21:13:33'),
(189, 'Mohammed Imran Hussain', 'mimranhussain@hotmail.com', '03428444441', 1, 'Huawei', 'P8 lite', '', 'Good', '15:04', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq , Mikhail Alam', 1, 0, '2018-07-23 04:04:36'),
(190, 'Bilal butt', 'buttbilal921@gmail.com', '03164022175', 1, 'Iphone 6 plus', '128gb', '', 'Like New', '21:21', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-23 04:22:24'),
(191, 'Arslan Ahmad', 'arslanahmad3838@gmail.com', '03003392748', 1, 'Samsung', 'Galaxy s9', '', 'Like New', '17:01', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-23 04:53:31'),
(192, 'Shahid', 'shahidaslam666@gmail.com', '0301-3812372', 1, 'OPPO', 'F5', '', 'Like New', '05:10', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq , Muhammad Musa Khan', 1, 0, '2018-07-23 17:51:36'),
(193, 'Noman', 'nomitomi979@gmail.com', '0331-4282503', 1, 'Xiaomi', 'A1', '', 'Like New', '16:08', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-23 22:38:09'),
(194, 'Muhammad Irfan', 'mirfi26@gmail.com', '03086145501', 1, 'J7 pro', 'J730F', '', 'Like New', '13:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Abdullah Tariq', 1, 0, '2018-07-24 00:50:32'),
(195, 'Mrs. Jamal', 'arj_naveed@hotmail.com', '03354920529', 1, 'Samsung', 'Galaxy S3', '', 'Faulty', '11:30', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Mikhail Alam , Muhammad Ali , Muhammad Musa Khan', 1, 0, '2018-07-24 05:12:54'),
(196, 'M Usman', 'musmanshafi1986@gmail.com', '03224682681', 1, 'Huawei Honor', 'Honor 5X', '', 'Like New', '16:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 06:10:57'),
(197, 'Naeem', 'harisnaeem339@gmail.com', '+923334759499', 1, 'Huwaie', 'Y7 prime 2018', '', 'Like New', '13:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 17:54:00'),
(198, 'Umer', 'uqureshi88@gmail.com', '03212090120', 1, 'One plus', '3T', '', 'Like New', '12:01', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 19:02:38'),
(199, 'tallat mahmood', 'chtallatmahmood@gmail.com', '03158161486', 1, 'huawei', 'p8 lite', '', 'Good', '18:15', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 19:37:59'),
(200, 'imran', 'anbimran@gmail.com', '03008472867', 1, 'Huawei', 'P20 pro', '', 'Like New', '17:02', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 19:38:49'),
(201, 'Arslan', 'arslan.hafeez9660@gmail.com', '03107671256', 1, 'Samsung', 'S7 edge duos 128gb limited edition', '', 'Good', '12:42', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 19:42:23'),
(202, 'Shamoon', 'shamoonm2@gmail.com', '03074033332', 1, 'Oppo', 'A37', '', 'Average', '19:45', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 20:22:30'),
(203, 'Saad', 'saad_bhatti22@hotmail.com', '03228007196', 1, 'Huawei', 'P9 lite', '', 'Like New', '14:26', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 21:26:40'),
(204, 'Akram', 'akram22@gmail.com', '03111111111', 1, 'Samsung', 'Galaxy c5', '', 'Like New', '15:07', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 22:07:54'),
(205, 'Faran', 'faran93@hotmail.com', '03314529973', 1, 'Infinix', 'Zero 5', '', 'Like New', '16:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-24 22:33:43'),
(206, 'Muhammed ibrahim', 'muhd.ibo1801@gmail.com', '03351724053', 1, 'Qmobile', 'I6i', '', 'Average', '18:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-25 00:01:06'),
(207, 'Usama', 'musamamanzoor2000@gmail.com', '03404595079', 1, 'Honor', '7C', '', 'Like New', '17:25', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-25 00:16:09'),
(208, 'Jawwad Ahmad', 'jawwad343@hotmail.com', '03144304680', 1, 'Samsung', 'Galaxy J7 Max', '', 'Like New', '01:30', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-25 03:44:44'),
(209, 'Usama', 'usamabintahir6@gmail.com', '03078839316', 1, 'Huawei', 'Y7 prime 2018', '', 'Like New', '21:15', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-25 07:21:56'),
(210, 'Rana Zubair Iqbal', 'ranazubair619@gmail.com', '03064037112', 1, 'iPhone', '5', '', 'Good', '10:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-25 23:45:51'),
(211, 'jahanzaib', 'jtahir96@gmail.com', '03218528236', 1, 'samsung', 's7 edge', '', 'Good', '20:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-26 02:30:37'),
(212, 'Raja khurram', 'rajakhurram64@yahoo.com', '03213555519', 1, 'Sumsung', 'S7edge', '', 'Like New', '13:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-26 19:22:04'),
(213, 'Samroon', 'acc.cblahore@gmail.com', '03028400232', 1, 'Huwei', 'Mate 10 lite', '', 'Like New', '15:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-26 20:56:34'),
(214, 'Rana faisal', 'ranafaisal4000662@gmail.com', '03041020662', 1, 'Apple', 'iphone 6s 64 GB', '', 'Good', '14:48', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-26 21:48:23'),
(215, 'hassan sardar', 'hasanaftabahmad@gmail.com', '03009418774', 1, 'Qmobile', 'z3', '', 'Average', '21:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-07-31 21:34:45'),
(216, 'M. FAIQ EJAZ', 'usamaejaz33@gmail.com', '03244462229', 1, 'Samsung', 'J6', '', 'Like New', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-01 18:37:30'),
(217, 'Zain Aamir', 'Drzainaamir@gmail.com', '03214445010', 1, 'IPhone', '5 s', '', 'Like New', '15:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-01 21:12:50'),
(218, 'Yasir', 'yasir_myg@msn.com', '03009665856', 1, 'Samsung', 'J7 prime', '', 'Average', '15:03', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-01 22:04:10'),
(219, 'Hamza', 'ihamza112@gmail.com', '03451019901', 1, 'Samsung', 'S9 plus', '', 'Good', '17:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-01 22:35:33'),
(220, 'Aftab', 'chachasharif@gmail.com', '03207875656', 1, 'Htc', 'One M7', '', 'Good', '18:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Muhammad Musa Khan', 1, 0, '2018-08-02 00:58:28'),
(221, 'Mutahir', 'mutahir85@gmail.com', '03234300208', 1, 'Samsung', 'C5', '', 'Like New', '15:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 02:42:59'),
(222, 'kashif', 'kashi944@gmail.com', '+923216507376', 1, 'Honor', '7C', '', 'Like New', '10:52', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 03:07:01'),
(223, 'Farooq malik', 'malik_farooq36@Yahoo.com', '03454284959', 1, 'Huawei', 'P8 lite', '', 'Like New', '18:31', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 03:21:54'),
(224, 'Faisal', 'faisalraheem123456@gmail.com', '03234321891', 1, 'Huawei', 'P8', '', 'Average', '20:42', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 03:43:00'),
(225, 'Shameekh', 'shameekh2002@gmail.com', '03216267584', 1, 'Nokia', 'X', '', 'Faulty', '21:15', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 04:20:53'),
(226, 'Umair', 'umair333333@gmail.com', '03324538172', 1, 'Oppo', 'F5 6Gb 64gb', '', 'Like New', '00:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 07:16:51'),
(227, 'Waqas', 'waqas.197@gmail.com', '03004333197', 1, 'Moto trbo 2', 'Matrola', '', 'Average', '02:45', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam , Muhammad Ali , Muhammad Musa Khan', 1, 0, '2018-08-02 08:52:34'),
(228, 'Muhammad Ismail', 'ismailniazi@gmail.com', '03335726133', 1, 'Apple', 'IPhone 5S', '', 'Good', '17:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Muhammad Musa Khan', 1, 0, '2018-08-02 15:41:37'),
(229, 'Zubair', 'zubairnaeem0@gmail.com', '03052406290', 1, 'Telenor', 'Smart pro', '', 'Average', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 18:46:06'),
(230, 'Asif Ali', 'asif.hader@gmail.com', '+923244418667', 1, 'Samasung', 'Note 3 N-9005', '', 'Good', '20:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 19:07:01'),
(231, 'Akash', 'akashtaqvi@yahoo.com', '03127405573', 1, 'Huawei', 'Y9 2018', '', 'Like New', '14:10', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 21:10:26'),
(232, 'Zain', 'zainramzan34@gmail.com', '03244181871', 1, 'Samsung', 'Galaxy s4 gt i9500', '', 'Good', '15:20', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-02 22:20:25'),
(233, 'Adnan', 'adnanjavaid14@yahoo.com', '03244922729', 1, 'Huawei', 'P10 lite', '', 'Like New', '16:15', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-03 01:37:30'),
(234, 'Saad Mehboob', 'saad.mehboob60@gmail.com', '03030000484', 1, 'Samsung', 'Galaxy J5 (2016)', '', 'Faulty', '20:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-03 01:45:38'),
(235, 'Faisal', 'faisalmalik780@hotmail.com', '03007999752', 1, 'Huawei', 'Nexus 6P', '', 'Average', '13:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-03 04:09:42'),
(236, 'Hamid', 'hamidcheema@ymail.com', '03338110858', 1, 'OPPO', 'F1s', '', 'Like New', '02:12', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-03 08:13:10'),
(237, 'Kamran', 'friends4kami@gmail.com', '03004669987', 1, 'Iphone', '8 red product edition', '', 'Like New', '08:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-03 15:02:02'),
(238, 'Ahmed subhan', 'subhanarshad45@yahoo.com', '03117018678', 1, 'Samsung', 'S6 edge', '', 'Faulty', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-04 10:53:26'),
(239, 'Rameez Aftab', 'rameezaftab.riz@gmail.com', '03366163494', 1, 'Apple', 'iPhone 6s 64gb', '', 'Good', '23:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-04 21:35:27'),
(240, 'Amir Hussain', 'amirati786@gmail.com', '03014867179', 1, 'Samsung', 'S7 Edge G935FD', '', 'Average', '13:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-05 04:15:26'),
(241, 'Hassan Naseem', 'hassannaseem39@gmail.com', '03214801277', 1, 'Samsung', 'J500H', '', 'Good', '13:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-08-05 06:24:47'),
(242, 'Abdul khaliq', 'khaliq8897@gmail.com', '03044110486', 1, 'Samsung', 'Samsung Alpha', '', 'Good', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-05 06:49:25'),
(243, 'qais', 'roseqais@gmail.com', '03094773799', 1, 'Huawei', 'Huawei y9 warranty july 2019', '', 'Like New', '10:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-05 08:38:06'),
(244, 'Uzair', 'Iuakhawaja@gmail.com', '0344-4394448', 1, 'Asus', 'Zenfone 4 selfie', '', 'Like New', '16:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-05 11:45:02'),
(245, 'Taimur', 'Tami4all@outlook.com', '03004353103', 1, 'Huawei', 'Honor 8 Lite', '', 'Like New', '09:15', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-06 15:48:30'),
(246, 'Taimur', 'Tami4all@outlook.com', '03004353103', 1, 'Nokia', 'N3', '', 'Good', '09:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-08-06 15:49:20'),
(247, 'Taimur', 'Tami4all@outlook.com', '03004353103', 1, 'Huawei', 'Y511-U30', '', 'Average', '09:50', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-06 15:50:19'),
(248, 'Junaid', 'muhammadjunaidaslam42@gmail.com', '03034921125', 1, 'Sky Vega', 'sky vega 840', '', 'Faulty', '6pm', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-06 19:33:31'),
(249, 'Saifullah Khalid', 'Saifullahkhalid008@gmail.com', '03498468534', 1, 'Lg Optimus Gpro F240S', 'LG', '', 'Faulty', '23:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-07 08:26:35'),
(250, 'Saad mehboob', 'saad.mehboob60@gmail.com', '03030000484', 1, 'Haier', 'Esteem I40', '', 'Average', '15:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-08 05:51:31'),
(251, 'Rashid wahab', 'minhajpak95@gmail.com', '03027127208', 1, 'Accer', 'T6', '', 'Good', '18:12', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-08 23:13:08'),
(252, 'Mohammad', 'downtoearth500@gmail.com', '03134356695', 1, 'Samsung', 'J7', '', 'Average', '23:32', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-09 06:32:18'),
(253, 'Salman Ahmad', 'salman.malik3963@gmail.com', '03124773963', 1, 'HUAWEI', 'Mate 10 lite', '', 'Like New', '12:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-09 08:13:53'),
(254, 'Qasim raza', 'sqraza1927@gmail.com', '03214710877', 1, 'Huawei', 'Honor 5x', '', 'Average', '11:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-10 05:43:46'),
(255, 'usman', 'umajeed22@yahoo.com', '03401766011', 1, 'HUAWEI', 'y560', '', 'Average', '00:48', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-10 07:48:52'),
(256, 'husnain', 'husnainabbas01@gmail.com', '03344437552', 1, 'oppo', 'f5 youth', '', 'Good', '01:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-11 07:16:14'),
(257, 'Yousuf', 'www.yousufg772@gmail.com', '03156668772', 1, 'Q mobile', 'Dual one', '', 'Good', '08:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-11 15:30:50'),
(258, 'Shafieq bhatti', 'shafieq4764445@g.mail.com', '03154764445', 1, 'Samsung grand prime', 'Grand prime', '', 'Good', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-08-11 15:42:09'),
(259, 'Abdullah', 'mrabdullahsaigal@gmail.com', '03322228366', 1, 'Samsung', 'S8+', '', 'Like New', '18:22', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-12 01:22:39'),
(260, 'Asad ali', 'asadch3898@gmail.com', '03156011909', 1, 'Samsung', 'Samsung glaxy j7', '', 'Like New', '19:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-12 04:35:20'),
(261, 'Muhammad Mohsin Amir', 'm.mohsin567@gmail.com', '03234473664', 1, 'Sony', 'Sony Xperia Z2', '', 'Average', '15:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-12 08:08:44'),
(262, 'Ali', '03006108539', '03006108539', 1, 'Qmobile', 'Z9', '', 'Good', '15:19', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-12 22:19:26'),
(263, 'Muhammad Mustafa', 'ma2715668@gmail.com', '03410176884', 1, 'Samsung galaxy j1 ace', 'Samsung galaxy j1', '', 'Like New', '07:20', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-13 14:11:06'),
(264, 'Shakil', 'shakilghouri@yahoo.com', '03454415152', 1, 'Samsang', 'J5', '', 'Average', '11:49', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-13 19:50:05'),
(265, 'Sagheer bhatti', 'sagheerjbs@gmail.com', '03144018900', 1, 'Huawei Honor', 'Honor 7C Gold 3/32', '', 'Like New', '14:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-14 05:14:19'),
(266, 'Noman', 'nomanakram_85@hotmail.com', '03134566494', 1, 'HTC', 'M8', '', 'Good', '14:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-14 10:29:06'),
(267, 'Abbas Ali', 'abbasashraff12313@gmail.com', '03056104244', 1, 'Qmobile', 'S4', '', 'Good', '10:30', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-15 20:09:06'),
(268, 'Arbaaz', 'arbaazazam010@gmail.com', '03136670749', 1, 'Oppo', 'F5 4gb', '', 'Like New', '15:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-16 20:38:53'),
(269, 'Adnan', 'adnanjavaid14@yahoo.com', '03244922729', 1, 'Honor 8 lite', 'Huawei honor 8 lite', '', 'Good', '14:30', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-17 19:23:06'),
(270, 'sunny', 'joshwishi@gmail.com', '03244871847', 1, 'xiaomi', 'redmi 4a', '', 'Like New', '09:55', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-18 10:34:43'),
(271, 'Husnain Hamza', 'husnainhamza724@gmail.com', '03084685158', 1, 'Motorola', 'Moto e4', '', 'Good', '18:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-18 23:12:29'),
(272, 'Abid', 'abidt135@gmail.com', '03204418053', 1, 'Samsung', 'J7pro 32 gb', '', 'Good', '20:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-19 01:55:47'),
(273, 'Muhammad kashif', 'Muhammad.kashif582532@gmail.com', '03363910041', 1, 'Samsung', 'Core prime', '', 'Average', '13:28', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-19 03:29:08'),
(274, 'HUMAYOUN', 'humayounnaeem@gmail.com', '03121550381', 1, 'Samsung', 'Grand Prime', '', 'Good', '11:08', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-20 02:17:11'),
(275, 'Naeem baloch', 'naeemrashid339@gmail.com', '+923334759499', 1, 'Huwaie', 'Y7 prime 2018', '', 'Like New', '20:20', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-21 01:07:30'),
(276, 'Muhammad qayyum', 'qayyumanwar66577@gmail.com', '03044117296', 1, 'Huawei', 'Honor 10', '', 'Like New', '19:06', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-21 02:06:52'),
(277, 'shahwaiz', 'Shahwaiz881@gmail.com', '03145389100', 1, 'Q mobile', 'LT 550', '', 'Good', '19:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-26 20:19:47'),
(278, 'mahjabeen', 'mhjabeen8@gmail.com', '03152400597', 1, 'huwaie', 'g610', '', 'Good', '10:55', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-08-27 08:42:04'),
(279, 'Zain Rashid', 'zainrashid261@gmail.com', '03244500898', 1, 'Iphone', '6s', '', 'Good', '16:52', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-27 23:52:44'),
(280, 'Zain Rashid', 'zainrashid261@gmail.com', '03244500898', 1, 'Iphone', '6s', '', 'Good', '16:53', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-27 23:53:51'),
(281, 'Asim Adeel', 'adeelasim131@gmail.com', '03035720490', 1, 'Samsung', 'J5 2016', '', 'Good', '14:55', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-28 05:12:48'),
(282, 'Nauman', 'bluejeansfriend143@gmail.com', '03334288137', 1, 'Samsung', 'S8 64gb', '', 'Good', '17:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-29 19:20:20'),
(283, 'Muhammad Bilal', 'rana9197g143@gmail.com', '03007916950', 1, 'Samsung', 'Samsung j3 2017 Model', '', 'Like New', '12:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Muhammad Musa Khan', 1, 0, '2018-08-31 00:31:47'),
(284, 'Saad butt', 'saadiqbalbutt786@gmail.com', '0322 4245987', 1, 'Q mobile', 'I5. 5', '', 'Faulty', '10:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-31 01:56:56'),
(285, 'Khuram', 'khuramy36@yahoo.com', '03214911798', 1, 'Infinix', 'Hot 4', '', 'Good', '10:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-08-31 16:58:25'),
(286, 'Irfan', 'm.irfanhabeb@gmail.com', '03008999125', 1, 'Samsung j5 pro', 'J5 pro', '', 'Like New', '14:45', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-08-31 18:45:43'),
(287, 'Saqib', 'konvictsaqib@gmail.com', '03214162056', 1, 'Oppo', 'F1s', '', 'Average', '17:40', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-01 00:40:36'),
(288, 'israr bukhari', 'israrbukhari21@gmail.com', '03063840526', 1, 'galaxy s6 edge 32 gb', 'sm-g925f', '', 'Good', '11:22', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-01 18:23:41'),
(289, 'ahmad', 'ahmadp143@gmail.com', '03064648862', 1, 'appel', 'iphone 5s', '', 'Faulty', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-01 18:53:39'),
(290, 'tahir', 'tahirahmed605@gmail.com', '03334953526', 1, 'samsung', 'j5 pro 32gb', '', 'Good', '14:50', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-01 21:54:37'),
(291, 'Muhammad Ayyaz', 'ayaziqbal44@gmail.com', '03370410013', 1, 'Z10', 'Blackberry', '', 'Average', '10:25', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-02 05:26:30'),
(292, 'Khuram', 'khuramy36@yahoo.com', '03214911798', 1, 'Infinix', 'Hot 4', '', 'Faulty', '04:07', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-09-03 21:07:25'),
(293, 'usama', 'usamaashrafaviator@gmail.com', '03218898815', 1, 'apple', 'iphone 4s 16gb', '', 'Good', '17:05', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-04 00:06:10'),
(294, 'usama', 'usamaashrafaviator@gmail.com', '03218898815', 1, 'samsung', 's4 i9500', '', 'Average', '18:34', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam , Muhammad Ali', 1, 0, '2018-09-04 01:35:01'),
(295, 'Ali', 'ali.mbs1997@gmail.com', '03045925996', 1, 'Huawei', 'Y6 pro 3G', '', 'Good', '11:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam , Muhammad Ali', 1, 0, '2018-09-04 17:21:34'),
(296, 'Syed Zain', 'zainsyedshah59@gmail.com', '03354270272', 1, 'Samsung', 'Grand prime +', '', 'Good', '17:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-04 23:53:25'),
(297, 'Rehan', 'reHanlolx@gmail.com', '03214884848', 1, 'Apple', '6', '', 'Good', '22:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-05 07:24:33'),
(298, 'Wahab', 'ch213wahab@gmail.com', '03073984213', 1, 'OPPO', 'F3 Plus', '', 'Like New', '12:20', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-05 19:09:43'),
(299, 'Ch Adnan', 'www.chadnan4945@gmail.com', '03164942790', 1, 'Samsung galaxy j7 prime', 'SM-G610F', '', 'Good', '15:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-05 20:12:03'),
(300, 'Awais', 'awsyali143@gmail.com', '03428435524', 1, 'Q Mobile', 'E2 noir', '', 'Good', '22:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-06 15:12:36'),
(301, 'Umair', 'umair.shosib@hotmail.com', '03214200242', 1, 'Huawei', 'P20 Lite', '', 'Like New', '13:45', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-06 17:45:34'),
(302, 'Rashid', '4759468@gmail.com', '03329805654', 1, 'Huawei', 'Y7 prime 2018', '', 'Like New', '14:55', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-09-08 21:55:29'),
(303, 'Taimur', 'taimuridrees@yahoo.com', '03134706927', 1, 'Nokia', 'Nokia 3 (TA1032)', '', 'Good', '09:51', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-09-09 16:51:32'),
(304, 'Sheraz Mushtaq', 'sheraz619@gmail.com', '03004230058', 1, 'Xiaomi', 'Note 5 pro', '', 'Like New', '18:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-11 00:30:22'),
(305, 'Shayaan', 'umer-q@hotmail.com', '03084856290', 1, 'Samsung', 'Grand prime plus', '', 'Like New', '15:15', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-11 05:27:12'),
(306, 'Sufyaan Fareed', 'sufyaanfareed567@gmail.com', '03224638055', 1, 'Apple', 'Iphone 7 plus 128 matte black', '', 'Like New', '14:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-11 06:30:21'),
(307, 'Ukar khan', 'raheem.noor44@gmail.com', '03208045689', 1, 'Apple', 'Iphone 4', '', 'Good', '18:26', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-11 20:10:52'),
(308, 'Syed Hunain Ali', 'syedhunainalizaidi@gmail.com', '03069135672', 1, 'Samsung', 'Grand Prime Plus', '', 'Average', '21:00', 'Later', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-12 03:08:52'),
(309, 'Musa', 'mnsiddiqui96@gmail.com', '03314019063', 1, 'Huawei', 'Mate 10 lite', '', 'Like New', '13:00', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Ali', 1, 0, '2018-09-12 20:49:24'),
(310, 'Ali Akhtar', 'aliakhtarfoji610@gmail.com', '03006108539', 1, 'Huawei', 'Y7 prime', '', 'Like New', '15:20', 'Immediately', 'Website', 1, 0, 0, 0, 'selling comment on request id 310', 'selling comment on request id 310', 'Muhammad Ali , Mikhail Alam', 1, 0, '2018-09-13 13:21:01'),
(311, 'ewefwe', 'wefwe', 'ewfw', 1, 'wefwef', 'wefwef', '', 'Good', '01:01', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-09-27 12:48:58'),
(312, 'sdfsd', 'dfsdk', 'dfsdn', 1, 'sdvnsdj', 'qsdvnsdj', '', 'Like New', '12:59', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-09-27 13:11:25'),
(313, 'dvsdqs', 'dge', 'gsdgd', 1, 'sgsdg', 'gdgs', '', 'Good', '11:58', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-09-27 13:13:56'),
(314, 'sdsd', 'sddns', 'sdvnsdv', 1, 'sdvnds', 'sdkvnsd', '', 'Like New', '11:58', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 0, '2018-09-27 13:14:41'),
(315, 'Musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Like New', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:40:06'),
(316, 'musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Like New', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:48:06'),
(317, 'musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Faulty', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:48:29');
INSERT INTO `device_sell_requests` (`id`, `first_name`, `email`, `contact`, `device_type`, `device_company`, `device_model`, `space`, `device_condition`, `available_time`, `selling_type`, `received_through`, `status`, `status_sale`, `sale_price`, `evaluated_price`, `comment`, `selling_comment`, `readBy`, `notified`, `is_deleted`, `reqTime`) VALUES
(318, 'muhammad.mk5698@gmail.com', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Faulty', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:48:43'),
(319, 'musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Like New', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:50:12'),
(320, 'musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 7 256Gb', '', 'Good One', 'Not provided', 'Evaluation', 'Website', 1, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 08:50:26'),
(321, 'musa', 'muhammad@gmail.com', '0304', 1, 'Apple', 'Iphone 8 256Gb', '', 'Average', 'Not provided', 'Evaluation', 'Website', 2, 0, 1500, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-10-06 10:43:23'),
(322, 'musa', 'khan', 'musa', 1, 'musa', 'musa', '', 'Like New', '3:15 PM', 'Immediately', 'Website', 2, 0, 0, 0, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-11-16 07:09:05'),
(323, 'musa khan', 'musa', 'mus', 1, 'musa', 'musa', '64GB', 'Like New', '4:47 PM', 'Immediately', 'Website', 3, 0, 1500, 3, 'hello', NULL, 'Muhammad Musa Khan', 1, 1, '2018-11-16 08:47:49'),
(324, 'musa', 'musa@gmail.com', '0309', 1, 'lg', 'g3+', '16Gb', 'Like New', '4:14 PM', 'Immediately', 'Website', 4, 0, 0, 3, '', NULL, 'Muhammad Musa Khan', 1, 1, '2018-11-16 11:14:15'),
(325, 'mk', 'mk@gmail.com', '0200', 1, 'oppo', 'f7 youth', '4gb/64gb', 'Like New', '5:25 PM', 'Immediately', 'Website', 0, 0, 0, 0, '', NULL, 'No One', 1, 1, '2018-12-31 08:31:42'),
(326, 'mk', 'mk', 'mkkmkm', 1, 'mkmk', 'mkmk', 'mkmk,mkmk', 'Good', '6:30 PM', 'Immediately', 'Website', 1, 0, 0, 0, 'checking', NULL, 'Muhammad Musa Khan', 1, 1, '2019-01-12 08:29:56'),
(327, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '+923081966778', 1, '+923081966778', '+923081966778', '+923081966778', 'Like New', '1:16 PM', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, '', 0, 0, '0000-00-00 00:00:00'),
(328, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '+923081966778', 1, 'Oppo', 'F7 lite', '4GB,64GB', 'Like New', '10:54 PM', 'Immediately', 'Website', 1, 1, 0, 15000, 'hi there', NULL, '', 0, 1, '2019-04-19 18:06:19'),
(329, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '+923081966778', 1, '+923081966778', '+923081966778', '+923081966778', 'Like New', '12:15 PM', 'Immediately', 'Website', 1, 0, 0, 0, '', NULL, '', 0, 1, '2019-04-20 07:16:08'),
(330, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '+923081966778', 1, 'OPPO', 'F7 LITE', '4GB,64GB', 'Like New', '6:30 PM', 'Immediately', 'Website', 3, 3, 12000, 15000, 'hi Evaluated comment on request ID 330', 'hi selling comment on selling device request Id 330', '', NULL, 0, '2019-04-22 19:02:37'),
(331, 'Muhammad Musa Khan', 'muhammad.mk5698@gmail.com', '+923081966778', 1, 'oppo', 'f7 lite', '4GB,64GB', 'Like New', '11:11 PM', 'Immediately', 'Website', 0, 0, 0, 0, NULL, NULL, NULL, NULL, 0, '2019-05-21 18:11:56');

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `place_heading` varchar(50) NOT NULL,
  `place_detail` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `google_iframe` longtext NOT NULL,
  `contact` varchar(50) NOT NULL,
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`id`, `place_heading`, `place_detail`, `country`, `state`, `city`, `address`, `google_iframe`, `contact`, `is_deleted`, `created_on`, `updated_on`) VALUES
(2, 'Inside Careem Registration Center', 'Careem office, johar town', 'Pakistan', 'Punjab', 'Lahore', 'Careem Registration Center, 142 M Block, Next To Khokar Chowk Johar TownØŒ Block M Phase 2 Johar Town, Lahore, Punjab', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3402.9958263699136!2d74.27127171504382!3d31.469300981386617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919022679c33155%3A0xc2ff29e6889d3260!2sCareem+Registration+Center!5e0!3m2!1sen!2s!4v1535098610634\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '0308 0014624', 0, '2018-08-24 00:11:29', '2018-08-24 00:11:29'),
(1, 'Inside Careem Registration Center', 'Model Town', 'Pakistan', 'Punjab', 'Lahore', 'Careem Registration Center, Model Town Circular Road, Model Town, Lahore, Punjab', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3402.4954362722933!2d74.32895141504423!3d31.48306318138197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39190419dc41566d%3A0x36a93dbb20cc89a9!2sCareem+Registration+Center!5e0!3m2!1sen!2s!4v1535529404841\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>', '0308 0014624', 0, '2018-08-28 19:56:56', '2018-08-28 19:56:56'),
(4, 'place_heading', 'place_heading', 'country', 'state', 'city update', 'address update', '&lt;iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3402.9958263699136!2d74.27127171504382!3d31.469300981386617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3919022679c33155:0xc2ff29e6889d3260!2sCareem+Registration+Center!5e0!3m2!1sen!2s!4v1535098610634\" width=\"800\" height=\"600\" frameborder=\"0\" style=\"border:0\" allowfullscreen&gt;&lt;/iframe&gt;', 'contact update', 1, '2019-05-09 18:43:39', '0000-00-00 00:00:00'),
(5, 'google_iframe', 'google_iframe', 'google_iframe', 'google_iframe', 'google_iframe', 'google_iframe', 'google_iframe', 'google_iframe', 1, '2019-05-09 18:44:05', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `mobile_evaluation`
--

CREATE TABLE `mobile_evaluation` (
  `id` int(11) NOT NULL,
  `mobile_company` varchar(50) NOT NULL,
  `mobile_model` varchar(50) NOT NULL,
  `display` int(2) NOT NULL,
  `touch` int(2) NOT NULL,
  `screen_glass_broke` int(2) NOT NULL,
  `back_camera` int(2) NOT NULL,
  `front_camera` int(2) NOT NULL,
  `volume_button` int(2) NOT NULL,
  `wifi` int(2) NOT NULL,
  `GPS` int(2) NOT NULL,
  `speaker` int(2) NOT NULL,
  `power_button` int(2) NOT NULL,
  `charging` int(2) NOT NULL,
  `battery` int(2) NOT NULL,
  `charger_available` int(2) NOT NULL,
  `earphone_available` int(2) NOT NULL,
  `mobile_box` int(2) NOT NULL,
  `valid_bill` int(2) NOT NULL,
  `mobile_age` varchar(100) NOT NULL,
  `contact_num` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `evaluation_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobile_evaluation`
--

INSERT INTO `mobile_evaluation` (`id`, `mobile_company`, `mobile_model`, `display`, `touch`, `screen_glass_broke`, `back_camera`, `front_camera`, `volume_button`, `wifi`, `GPS`, `speaker`, `power_button`, `charging`, `battery`, `charger_available`, `earphone_available`, `mobile_box`, `valid_bill`, `mobile_age`, `contact_num`, `username`, `email`, `evaluation_time`) VALUES
(1, 'LG', 'G3', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'Not provided', 'Not provided', 'Not provided', 'Not provided', '2018-10-01 12:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_send_status`
--

CREATE TABLE `newsletter_send_status` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `newsletter_send_status`
--

INSERT INTO `newsletter_send_status` (`id`, `email`, `status`, `subject`, `message`, `status_time`, `created_on`) VALUES
(1, 'abdwebmail@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(2, 'muhammad.mk5698@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(3, 'muhammad.mk1995@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(4, 'mateensaleh@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(5, 'accibasha480@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(6, 'shahidaslam666@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(7, 'meharusman374@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(8, 'riaz.malik502@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(9, 'askari.1979@hotmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(10, 'ra1099841@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(11, 'naveedqureshi212@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(12, 'umajeed22@yahoo.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(13, 'ma2715668@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(14, 'husnainhamza724@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(15, 'saadiqbalbutt786@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59'),
(16, 'butt40301@gmail.com', 0, 'subject', '<p>hello group tesxt</p>\r\n', '2019-03-04 22:04:59', '2019-03-04 22:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `confirmation_code` varchar(100) NOT NULL,
  `confirmed` int(11) NOT NULL,
  `applyTime` datetime NOT NULL,
  `confirmTime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mails`
--

CREATE TABLE `tbl_mails` (
  `id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `selling_type` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `message` varchar(255) NOT NULL,
  `notified` tinyint(2) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0',
  `_read` tinyint(2) NOT NULL DEFAULT '0',
  `submission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mails`
--

INSERT INTO `tbl_mails` (`id`, `user_name`, `email`, `selling_type`, `contact`, `message`, `notified`, `is_deleted`, `_read`, `submission_date`, `read_time`) VALUES
(3, 'Abdullah', 'abdwebmail@gmail.com', '', '03335330948', 'demo text', 1, 0, 0, '2018-06-27 23:32:11', '0000-00-00 00:00:00'),
(1, 'Muhammad Musa', 'muhammad.mk5698@gmail.com', '', '03044785698', 'i am muhammad musa khan.', 1, 0, 0, '2018-06-10 08:11:29', '0000-00-00 00:00:00'),
(2, 'Muhammad Musa', 'muhammad.mk5698@gmail.com', '', '03044785698', 'Its impressive site.', 1, 0, 0, '2018-06-26 18:04:24', '0000-00-00 00:00:00'),
(4, 'Muhammad', 'muhammad.mk5698@gmail.com', '', '03044785698', 'messaged by musa for the purpose of testing notification. messaged by musa for the purpose of testing notification.messaged by musa for the purpose of testing notification.', 1, 0, 1, '2018-06-30 22:51:35', '2019-04-21 06:15:41'),
(5, 'Muhammad Haroon', 'muhammad.mk1995@gmail.com', '', '03314746639', 'messaged by musa for the purpose of testing notification.', 1, 0, 1, '2018-06-30 22:52:08', '0000-00-00 00:00:00'),
(6, 'Abdullah', 'abdwebmail@gmail.com', '', '03335330948', 'My message here', 1, 0, 1, '2018-07-04 01:10:57', '2019-04-15 17:33:35'),
(7, 'Mateen', 'mateensaleh@gmail.com', '', '03214496977', 'If i sell my Iphone 8 64GB (8/10 condition) to you and want to buy Iphone 8+ 64GB (8/10 condition)???? This would be an exchange.', 1, 0, 1, '2018-07-09 21:18:09', '2019-04-15 19:07:27'),
(8, 'Muhammad Musa', 'muhammad.mk5698@gmail.com', '', '03081966774', 'Contact us mail testing live', 1, 0, 1, '2018-07-20 21:08:59', '2019-04-19 17:08:39'),
(9, 'Muhammad', 'accibasha480@gmail.com', '', '030994808283', 'Hi sir kya is mobile me exchange offer be available hai huawei y5 prime 2018 k sath only 15 day used', 1, 0, 1, '2018-08-05 02:00:08', '2019-04-16 16:47:43'),
(10, 'Hazel', 'graduate.admissions@uvm.edu', '', '(47) 3496-4267', 'Hello\r\n\r\nShop Ray-Ban Sunglasses $19.95 only today @ https://isunglasswarehouse.online\r\n\r\nBest Wishes,\r\n\r\n\r\nPhone Bech Dou phonebechdou.com', 1, 0, 1, '2018-08-23 20:53:48', '2019-04-16 16:47:37'),
(11, 'mk', 'muhammad.mk5698@gmail.com', 'NoDevice', '03081966778', 'efcefefe', 1, 0, 1, '2019-02-25 15:24:43', '2019-04-16 16:28:11'),
(12, 'Muhammad Musa Khan', 'muhammad.mk1995@gmail.com', 'otherPurpose', '03081966778', 'Message Detail', 1, 0, 1, '2019-02-25 15:37:53', '0000-00-00 00:00:00'),
(13, 'user_name', 'email', 'selling_type', 'contact', 'message', 0, 0, 1, '2019-04-08 19:00:00', '2019-04-29 19:07:04'),
(14, 'musa khan', 'muhammad.mk5698@gmail.com', 'MoreDevices', '+923081966778', 'SDKCJK', 0, 0, 1, '2019-04-05 14:56:45', '2019-04-15 17:34:54'),
(15, 'musa khan', 'muhammad.mk5698@gmail.com', 'OneDevice', '+923081966778', 'messafe', 0, 0, 1, '2019-04-05 14:59:23', '2019-04-20 06:46:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mails_sent`
--

CREATE TABLE `tbl_mails_sent` (
  `id` int(11) NOT NULL,
  `email` longtext NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT '0',
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mails_sent`
--

INSERT INTO `tbl_mails_sent` (`id`, `email`, `subject`, `message`, `status`, `created_on`, `status_time`, `is_deleted`) VALUES
(1, 'muhammad.mk5698@gmail.com', 'subject titile', '<p>message detail. message detail. message detail. message detail. message detail. message detail. message detail. message detail. message detail. </p>\r\n', 0, '2019-04-18 17:52:27', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subscribers`
--

CREATE TABLE `tbl_subscribers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscribed_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subscribers`
--

INSERT INTO `tbl_subscribers` (`id`, `name`, `email`, `subscribed_on`) VALUES
(3, 'Abdullah', 'abdwebmail@gmail.com', '2018-07-04 01:07:59'),
(9, 'Shahid', 'shahidaslam666@gmail.com', '2018-07-23 17:50:09'),
(4, 'Usman Shabbir', 'meharusman374@gmail.com', '2018-07-10 05:52:07'),
(10, 'Riaz Ahmad', 'riaz.malik502@gmail.com', '2018-07-26 07:32:53'),
(11, 'Sajid', 'askari.1979@hotmail.com', '2018-08-02 00:46:09'),
(12, 'Rafiq gujjar', 'ra1099841@gmail.com', '2018-08-03 02:03:27'),
(13, 'Naveed', 'naveedqureshi212@gmail.com', '2018-08-03 18:13:37'),
(14, 'usman', 'umajeed22@yahoo.com', '2018-08-10 07:46:56'),
(15, 'Muhammad Mustafa', 'ma2715668@gmail.com', '2018-08-13 14:12:07'),
(16, 'Husnain Hamza', 'husnainhamza724@gmail.com', '2018-08-18 23:14:09'),
(17, 'Muhammad Mk', 'muhammad.mk5698@gmail.com', '2018-08-19 02:28:39'),
(18, 'Saad butt', 'saadiqbalbutt786@gmail.com', '2018-08-31 01:55:17'),
(19, 'M.Usman butt', 'butt40301@gmail.com', '2018-08-31 07:40:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_verified` tinyint(2) NOT NULL DEFAULT '0',
  `verification_code` varchar(255) NOT NULL,
  `country` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(2) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `is_verified`, `verification_code`, `country`, `city`, `address`, `contact`, `created_on`, `updated_on`, `is_active`, `is_deleted`) VALUES
(13, 'mikhail', 'alam', 'mikhailalam@gmail.com', 'ec26202651ed221cf8f993668c459d46', 0, '386080141', 'punjab', 'lahore', '157 a', '03215222207', '2018-06-02 04:15:21', NULL, 1, 0),
(14, 'Muhammad Bilal', 'Iqbal', 'popopkgo@gmail.com', '25f9e794323b453885f5181f1b624d0b', 1, '0', 'Pakistan', 'Lahore Punjab', 'H#64 Yousaf Ali block Khayaban-e-Quaid near mansurah Multan rd lahore', '03004100628', '2018-06-24 19:38:36', NULL, 1, 0),
(19, 'Abdullah', 'Tariq', 'abdwebmail@gmail.com', '47bce5c74f589f4867dbd57e9ca9f808', 1, '0', 'Pakistan', 'Lahore', 'Baghbaan Pura Lahore', '03335330948', '2018-06-25 20:28:59', NULL, 1, 0),
(20, 'Usman', 'Shabbir', 'meharusman374@gmail.com', '5e05bb4cc890d57dff46a99bed0479e8', 0, '140523494', 'Pakistan', 'Lahore', '', '03331370012', '2018-07-10 05:53:14', NULL, 1, 0),
(21, 'Ali', 'Shahid', 'izaj0303@gmail.com', '91fbaa324f0fabd5a397b079f8f4cee0', 1, '0', 'Pakistan', 'Lahore', 'niaz baig lhr', '03164765102', '2018-07-10 09:50:21', NULL, 1, 0),
(22, 'Muhammad', 'Nouman', 'Noumanmalik346@gmail.com', 'f68ca31a80622c59c623a7da7ebef042', 0, '1175057324', 'Pakistan', 'Lahore', 'Monnoo abad Gt Road Muridke Lahore pakistan', '03214499052', '2018-07-10 15:29:30', NULL, 1, 0),
(23, 'Ali', 'Sharoz', 'alisharoz6@gmail.com', '1cbdb7c5607d2bd3f3e6b671a1528002', 1, '0', 'Pakistan', 'Lahore', 'J2 Johar Town', '03034402297', '2018-07-11 01:04:15', NULL, 1, 0),
(24, 'Saleem', 'Abbas', 'saleemabbas261@gmail.com', 'b5b462763c451868bb3e20abf7215817', 0, '1555015389', 'Pakistan', 'Lahore', 'Gulbreg', '03214901058', '2018-07-12 17:45:14', NULL, 1, 0),
(25, 'Ahmad', 'Raza', 'Ahmadg78@outlook.com', '595d38afde93b144a2841fbb3e9c4e87', 0, '1176594209', 'Pakistan', 'Lahore', 'Thokar raiwind road lahore', '03056102898', '2018-07-16 04:07:59', NULL, 1, 0),
(26, 'Hamza', 'Sajjad', 'hamzakhokhar5070@gmail.com', 'ef64c2084f804932307bbf52a7e97733', 0, '8692451', 'Pakistan', 'Lahore', '378 b3 johar town lahore', '03045588041', '2018-07-16 13:02:44', NULL, 1, 0),
(34, 'ADILKHAN', 'ADIL', 'Adils7103@gmail.com', '69a01dab67b7c92fd618134c9ac7bd2c', 0, '1251782246', 'Pak', 'Bahwalpur', 'Sub tahsil uhsharif', '03002433514', '2018-07-18 07:05:38', NULL, 1, 0),
(35, 'Hammad', 'Qayyom', 'hafizhammad903@gmail.com', '49d123697e578df62de36067c39ccbef', 0, '2128272288', 'Pakistan', 'Lahore', 'Nawab Town Raiwind Road', '03484570125', '2018-08-02 08:11:35', NULL, 1, 0),
(36, 'Tahir Iqbal', 'Tahir', 'maliktahir14h@gmail.com', 'b7a2f954cda22fe5c9912573755f3ab2', 0, '756413973', 'Pakistan', 'City', 'Badshah Town shahpur Multan Road', '03318688045', '2018-08-11 19:57:31', NULL, 1, 0),
(37, 'Khuram', 'FarooQi', 'khuramy36@yahoo.com', 'ce671e02e50d5f4d6f9ebcc68909361d', 1, '0', 'Pakistan', 'Lahore', 'Ichra, Lahore', '03214911798', '2018-09-03 21:02:34', NULL, 1, 0),
(41, 'Muhammad', 'Khan', 'muhammad.mk5698@gmail.com', '2b0822ec01d63e1f82215c03a9676364', 0, 'WcVu7ajUlFh0o4aMPEHKuSabAI5zkMapYU0NMpil0LPoITwvKWhqGJ8Z7QJMO9LvYt3EhwfzXO0oEuKVdfshJ3Qngf0zjXHJZTaz', 'Pakistan', 'Lahore', 'Islampura', '+923081966778', '2019-03-22 16:45:38', NULL, 1, 0),
(42, 'first_name', 'last_name', 'email@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 0, '5fcHafZaMrC4ubd19wWZ9QyK0sFSjXu0f7khpzbeMbp3I5dRy12e9yQo7TLFnaV9hVSnWrfLDtpCh1JmP1hDuXXZyAF845jD4nlX', 'country', 'city', 'address address', 'contact', '2019-04-06 14:18:24', NULL, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `webcontents`
--

CREATE TABLE `webcontents` (
  `id` int(11) NOT NULL,
  `contact_num` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `office_time` varchar(255) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webcontents`
--

INSERT INTO `webcontents` (`id`, `contact_num`, `address`, `office_time`, `created_on`, `updated_on`) VALUES
(1, '0308 0014624', 'Model Town Circular Road, Lahore, Punjab - Pakistan', 'Mon to Fri, 9am to 6pm', '2018-06-30 19:00:00', '2019-05-12 21:41:26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices_brands`
--
ALTER TABLE `devices_brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices_category`
--
ALTER TABLE `devices_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `devices_products`
--
ALTER TABLE `devices_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `device_buy_requests`
--
ALTER TABLE `device_buy_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `device_id` (`device_id`);

--
-- Indexes for table `device_sell_requests`
--
ALTER TABLE `device_sell_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mobile_evaluation`
--
ALTER TABLE `mobile_evaluation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_send_status`
--
ALTER TABLE `newsletter_send_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mails`
--
ALTER TABLE `tbl_mails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_mails_sent`
--
ALTER TABLE `tbl_mails_sent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `webcontents`
--
ALTER TABLE `webcontents`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `devices_brands`
--
ALTER TABLE `devices_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `devices_category`
--
ALTER TABLE `devices_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `devices_products`
--
ALTER TABLE `devices_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `device_buy_requests`
--
ALTER TABLE `device_buy_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `device_sell_requests`
--
ALTER TABLE `device_sell_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=332;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mobile_evaluation`
--
ALTER TABLE `mobile_evaluation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletter_send_status`
--
ALTER TABLE `newsletter_send_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_mails`
--
ALTER TABLE `tbl_mails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tbl_mails_sent`
--
ALTER TABLE `tbl_mails_sent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_subscribers`
--
ALTER TABLE `tbl_subscribers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `webcontents`
--
ALTER TABLE `webcontents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
