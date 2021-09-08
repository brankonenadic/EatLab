-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 11, 2021 at 06:56 PM
-- Server version: 10.2.39-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab05dev_eatlab_database`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`lab05dev`@`localhost` PROCEDURE `insert_dish` (IN `_business_id` INT(11), IN `_name` VARCHAR(50) CHARSET utf8, IN `_img_id` INT(11), IN `_discription` VARCHAR(100) CHARSET utf8, IN `_price` DECIMAL(4,2), IN `_type` SET('main_dish','side_dish','extras','salad','soup','hot_drink','no_alcoholic_drink','alcoholic_drink','dessert') CHARSET utf8, IN `_datetime` DATETIME, IN `_status` SET('0','1','2','3','4','5','6','7','8','9') CHARSET utf8)  NO SQL
INSERT INTO dish (business_id , name , img_id , discription , price , type , datetime , status) VALUES (_business_id, _name, _img_id, _discription, _price, _type, _datetime, _status)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `add_table`
--

CREATE TABLE `add_table` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `table_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `active` set('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `add_table`
--

INSERT INTO `add_table` (`id`, `business_id`, `table_name`, `active`, `datetime`, `status`) VALUES
(1, 133, 'table_1', 'inactive', '2021-05-06 22:41:19', '1'),
(2, 133, 'table_2', 'inactive', '2021-05-06 22:43:25', '1'),
(3, 133, 'table_3', 'inactive', '2021-05-06 22:44:23', '1'),
(4, 158, 'separe_1', 'inactive', '2021-05-13 15:45:33', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bill_content`
--

CREATE TABLE `bill_content` (
  `id` int(11) NOT NULL,
  `bill_number_id` int(11) NOT NULL,
  `order_no_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_content`
--

INSERT INTO `bill_content` (`id`, `bill_number_id`, `order_no_id`, `datetime`, `status`) VALUES
(1, 9, 15, '2021-07-11 15:00:11', '1'),
(2, 10, 16, '2021-07-11 15:17:54', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bill_number`
--

CREATE TABLE `bill_number` (
  `id` int(11) NOT NULL,
  `bill_no` bigint(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `weiter_id` int(11) DEFAULT NULL,
  `total_price` decimal(4,2) NOT NULL,
  `payment_method` set('cash','card') COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bill_number`
--

INSERT INTO `bill_number` (`id`, `bill_no`, `user_id`, `business_id`, `table_id`, `weiter_id`, `total_price`, `payment_method`, `datetime`, `status`) VALUES
(9, 202107111983, 157, 133, 1, 141, 12.00, 'card', '2021-07-11 15:00:11', '2'),
(10, 202107112692, 157, 133, 2, NULL, 36.50, 'cash', '2021-07-11 15:17:53', '1');

-- --------------------------------------------------------

--
-- Table structure for table `dish`
--

CREATE TABLE `dish` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `img_id` int(11) NOT NULL,
  `discription` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `type` set('main_dish','side_dish','extras','salad','soup','hot_drink','no_alcoholic_drink','alcoholic_drink','dessert') COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dish`
--

INSERT INTO `dish` (`id`, `business_id`, `name`, `img_id`, `discription`, `price`, `type`, `datetime`, `status`) VALUES
(98, 133, 'krofna', 96, 'krofna sa cokoladom', 3.00, 'dessert', '2021-01-31 15:22:10', '1'),
(99, 133, 'grcka salata', 97, 'mjesana salata', 7.00, 'salad', '2021-01-31 15:23:09', '1'),
(100, 133, 'vine', 98, 'bjelo vino', 25.00, 'alcoholic_drink', '2021-01-31 15:26:27', '1'),
(101, 133, 'vine', 99, 'crno vino', 30.00, 'alcoholic_drink', '2021-01-31 15:28:45', '1'),
(102, 133, 'hamburger', 100, 'burger sa salatom u integralnom pecivu', 5.00, 'main_dish', '2021-01-31 15:57:39', '1'),
(103, 133, 'kafa', 101, 'espresso', 2.00, 'hot_drink', '2021-01-31 17:02:19', '1'),
(104, 133, 'pecivo', 102, 'pecivo bez glutena', 0.50, 'extras', '2021-01-31 17:05:24', '1'),
(105, 133, 'cola', 103, 'coca cola', 4.00, 'no_alcoholic_drink', '2021-01-31 17:09:48', '1'),
(106, 133, 'teleca corba', 104, 'teleca corba', 3.00, 'soup', '2021-01-31 17:11:42', '1'),
(107, 133, 'riza', 105, 'kuhana riza', 1.00, 'side_dish', '2021-01-31 17:12:24', '1'),
(108, 133, 'torta', 106, 'cokoladna torta', 3.00, 'dessert', '2021-02-01 22:23:34', '1'),
(109, 133, 'fanta', 107, 'fanta', 3.00, 'no_alcoholic_drink', '2021-02-04 22:35:49', '1'),
(110, 133, 'cocacola zero', 108, 'cocacola zero', 3.00, 'no_alcoholic_drink', '2021-02-04 22:36:50', '1'),
(112, 133, 'hljeb', 109, 'razev hljeb', 1.00, 'extras', '2021-02-25 21:19:00', '1'),
(113, 133, 'pizza mozzarela', 110, 'paradaiz sos,mozzarela,bosiljak,origano,masline\r\n', 9.00, 'main_dish', '2021-03-04 20:58:12', '1'),
(114, 133, 'palacinke', 133, 'palacinke sa nutelom', 4.50, 'dessert', '2021-04-21 10:05:25', '1'),
(115, 133, 'cappuccino', 134, 'cappuccino', 2.50, 'hot_drink', '2021-04-21 15:59:35', '1'),
(116, 154, 'espresso', 135, 'espresso', 1.50, 'hot_drink', '2021-04-22 09:12:38', '1'),
(119, 158, 'čevapi', 145, 'čevapčići', 6.50, 'main_dish', '2021-05-13 13:44:05', '1');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `active` set('active','inactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'inactive',
  `contract_type` set('indefinite','limited') COLLATE utf8_unicode_ci DEFAULT NULL,
  `contract_start` date DEFAULT NULL,
  `contract_end` date DEFAULT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `business_id`, `user_id`, `active`, `contract_type`, `contract_start`, `contract_end`, `datetime`, `status`) VALUES
(1, 133, 141, 'active', 'limited', '2021-01-01', '2021-12-31', '2021-04-01 18:51:09', '1'),
(2, 133, 142, 'active', 'indefinite', '2021-03-01', NULL, '2021-04-02 13:33:40', '1'),
(3, 133, 143, 'active', 'limited', '2021-04-01', '2021-10-30', '2021-04-03 15:32:04', '1'),
(13, 133, 153, 'active', NULL, NULL, NULL, '2021-04-12 10:48:39', '1'),
(14, 154, 156, 'active', NULL, NULL, NULL, '2021-04-26 20:41:04', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `employees_info`
-- (See below for the actual view)
--
CREATE TABLE `employees_info` (
`business_id` int(11)
,`user_id` int(11)
,`fullname` varchar(50)
,`user_email` varchar(50)
,`phone` varchar(20)
,`address` varchar(50)
,`zip_code` int(10)
,`city` varchar(50)
,`country` varchar(50)
,`contract_type` set('indefinite','limited')
,`contract_start` date
,`contract_end` date
,`user_type` set('user','business','admin','super_admin','menager','chef','waiter')
,`active` set('active','inactive')
,`status` set('0','1','2','3','4','5','6','7','8','9')
);

-- --------------------------------------------------------

--
-- Table structure for table `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `img_url` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `img`
--

INSERT INTO `img` (`id`, `img_url`, `datetime`, `status`) VALUES
(1, '16209258321116079807.png', '1000-01-01 00:00:00', '1'),
(96, '1612102930752051208.png', '2021-01-31 15:22:10', '1'),
(97, '1612102989102866702.jpg', '2021-01-31 15:23:09', '1'),
(98, '16121031871342753415.png', '2021-01-31 15:26:27', '1'),
(99, '16121033251951040771.png', '2021-01-31 15:28:45', '1'),
(100, '1612105059673918411.png', '2021-01-31 15:57:39', '1'),
(101, '1612108939612873785.png', '2021-01-31 17:02:19', '1'),
(102, '1612109124837124783.png', '2021-01-31 17:05:24', '1'),
(103, '16121093881950195230.png', '2021-01-31 17:09:48', '1'),
(104, '16121095021929430526.png', '2021-01-31 17:11:42', '1'),
(105, '16121095441634582468.jpg', '2021-01-31 17:12:24', '1'),
(106, '1612214614423660539.jpg', '2021-02-01 22:23:34', '1'),
(107, '1612474549654833465.png', '2021-02-04 22:35:49', '1'),
(108, '16124746101391151472.png', '2021-02-04 22:36:50', '1'),
(109, '16142879402082966195.jpg', '2021-02-25 21:19:00', '1'),
(110, '16148914921619886652.png', '2021-03-04 20:58:12', '1'),
(120, '16170468632061119004.png', '2021-03-29 19:41:03', '1'),
(121, '161704725040534337.jpg', '2021-03-29 19:47:30', '1'),
(122, '1617049950506356643.png', '2021-03-29 20:32:30', '1'),
(123, '16170499771627492245.png', '2021-03-29 20:32:57', '1'),
(124, '16170511412139123573.png', '2021-03-29 20:52:21', '1'),
(125, '16173042381999104027.png', '2021-04-01 19:10:38', '1'),
(126, '16182477511464049793.png', '2021-04-12 17:15:51', '1'),
(127, '16182477521914587323.png', '2021-04-12 17:15:52', '1'),
(128, '16182515641473729426.png', '2021-04-12 18:19:24', '1'),
(129, '1618251744663277243.png', '2021-04-12 18:22:24', '1'),
(130, '16182518701972833652.png', '2021-04-12 18:24:30', '1'),
(131, '16182519242104632288.png', '2021-04-12 18:25:24', '1'),
(132, '16182519451052349965.png', '2021-04-12 18:25:45', '1'),
(133, '16189995251834813287.png', '2021-04-21 10:05:25', '1'),
(134, '16190207751767849656.png', '2021-04-21 15:59:35', '1'),
(135, '1619082758569118209.png', '2021-04-22 09:12:38', '1'),
(136, '162067417163900092.jpg', '2021-05-10 19:16:11', '1'),
(137, '16206743702047713353.jpg', '2021-05-10 19:19:30', '1'),
(138, '16209120781836497821.jpg', '2021-05-13 13:21:18', '1'),
(139, '16209121732101056783.png', '2021-05-13 13:22:53', '1'),
(140, '16209123301857871073.png', '2021-05-13 13:25:30', '1'),
(141, '16209126561039840810.png', '2021-05-13 13:30:56', '1'),
(142, '1620912898723640720.png', '2021-05-13 13:34:58', '1'),
(143, '16209129691456093790.png', '2021-05-13 13:36:09', '1'),
(144, '1620913115301812971.png', '2021-05-13 13:38:35', '1'),
(145, '16209134451451493009.png', '2021-05-13 13:44:05', '1'),
(146, '16209189621346934627.jpg', '2021-05-13 15:16:03', '1'),
(147, '16209258321116079807.png', '2021-05-13 17:10:32', '1'),
(148, '1623786770620294607.png', '2021-06-15 19:52:50', '1');

-- --------------------------------------------------------

--
-- Table structure for table `main_dish_side_dish`
--

CREATE TABLE `main_dish_side_dish` (
  `id` int(11) NOT NULL,
  `main_dish_id` int(11) NOT NULL,
  `side_dish_id` int(11) NOT NULL,
  `price` decimal(4,2) NOT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Stand-in structure for view `menu_view`
-- (See below for the actual view)
--
CREATE TABLE `menu_view` (
`id` int(11)
,`business_id` int(11)
,`name` varchar(50)
,`img_url` varchar(150)
,`discription` varchar(100)
,`price` decimal(4,2)
,`type` set('main_dish','side_dish','extras','salad','soup','hot_drink','no_alcoholic_drink','alcoholic_drink','dessert')
,`status` set('0','1','2','3','4','5','6','7','8','9')
);

-- --------------------------------------------------------

--
-- Table structure for table `order_dish`
--

CREATE TABLE `order_dish` (
  `id` int(11) NOT NULL,
  `order_no_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `dish_id` int(11) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp(),
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_dish`
--

INSERT INTO `order_dish` (`id`, `order_no_id`, `table_id`, `dish_id`, `quantity`, `datetime`, `status`) VALUES
(1, 15, 1, 103, 1, '2021-07-11 14:53:09', '1'),
(2, 15, 1, 115, 1, '2021-07-11 14:53:09', '1'),
(3, 15, 1, 110, 0, '2021-07-11 14:53:09', '1'),
(4, 15, 1, 114, 1, '2021-07-11 14:53:09', '1'),
(5, 15, 1, 108, 1, '2021-07-11 14:53:09', '1'),
(6, 16, 2, 101, 1, '2021-07-11 15:08:45', '1'),
(7, 16, 2, 106, 2, '2021-07-11 15:08:46', '1'),
(8, 16, 2, 104, 1, '2021-07-11 15:08:46', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_info`
-- (See below for the actual view)
--
CREATE TABLE `order_info` (
`order_no_id` int(11)
,`order_no` bigint(12)
,`user_id` int(11)
,`business_id` int(11)
,`table_id` int(11)
,`table_name` varchar(20)
,`chef_id` int(11)
,`weiter_id` int(11)
,`status` set('0','1','2','3','4','5','6','7','8','9')
,`dish_id` int(11)
,`name` varchar(50)
,`quantity` int(3)
,`price` decimal(4,2)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_number`
--

CREATE TABLE `order_number` (
  `id` int(11) NOT NULL,
  `order_no` bigint(12) NOT NULL,
  `user_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `table_id` int(11) NOT NULL,
  `chef_id` int(11) DEFAULT NULL,
  `weiter_id` int(11) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_number`
--

INSERT INTO `order_number` (`id`, `order_no`, `user_id`, `business_id`, `table_id`, `chef_id`, `weiter_id`, `datetime`, `status`) VALUES
(15, 202107113082, 157, 133, 1, 142, 141, '2021-07-11 14:53:09', '0'),
(16, 202107113677, 157, 133, 2, 142, 141, '2021-07-11 15:08:45', '5');

-- --------------------------------------------------------

--
-- Stand-in structure for view `order_view`
-- (See below for the actual view)
--
CREATE TABLE `order_view` (
`id` int(11)
,`order_no` bigint(12)
,`table_id` int(11)
,`table_name` varchar(20)
,`status` set('0','1','2','3','4','5','6','7','8','9')
,`user_id` int(11)
,`business_id` int(11)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `print_bill`
-- (See below for the actual view)
--
CREATE TABLE `print_bill` (
`bill_number_id` int(11)
,`bill_no` bigint(12)
,`total_price` decimal(4,2)
,`payment_method` set('cash','card')
,`status` set('0','1','2','3','4','5','6','7','8','9')
,`business_id` int(11)
,`user_id` int(11)
,`order_no_id` int(11)
,`order_no` bigint(12)
,`table_name` varchar(20)
,`name` varchar(50)
,`quantity` int(3)
,`price` decimal(4,2)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `profile_img`
-- (See below for the actual view)
--
CREATE TABLE `profile_img` (
`user_id` int(11)
,`img_url` varchar(150)
);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `user_type` set('user','business','admin','super_admin','menager','chef','waiter') COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `user_email`, `user_password`, `user_type`, `token`, `datetime`, `status`) VALUES
(25, 'Branko Nenadic', 'nenadicbranko@gmail.com', '$2y$10$qz7ir3KOBBhaPHonKDEs8uGiUVrdMJW5gM26pFb1S77daARHOpLIm', 'super_admin', '69698709460f19c38a2123e4a0878ae0', '2021-03-09 20:56:08', '1'),
(133, 'Jedite kod Joa', 'lanintata@gmail.com', '$2y$10$tH40yAi0ncejIa4LC.F4ZO/kxWxNYOCYPR792ODGM9.E9C8xWnrw6', 'business', 'ac3372537ba3ca3b81b11258655d58d8', '2021-03-29 09:51:41', '1'),
(134, 'Snezana Raonic', 'snezana.web@gmail.com', '$2y$10$5gLdJ84lKC//NGhthmi/D.TYPxSUVZCxv62Dyx3m0FCbv7KfwKlUm', 'user', '6a9113e291bda5b1b6231c0f2978f772', '2021-03-29 21:01:09', '1'),
(136, 'Profa King', 'profaking@outlook.com', '$2y$10$zmkC4rP91dNimsaOgxcwuuLUOZhqhqfamZsai/5YiQXuJnFNEA33e', 'user', '9d2c176bc2e41e0791375e18f3ccc478', '2021-03-29 20:45:03', '1'),
(139, 'Amar Beslija', 'web@amarbeslija.com', '$2y$10$L6jEXDxs.uJB4KnxImfwBOs038IlN0lDbRIEY9c7pTAqCbVDHLSIu', 'user', 'a544638be92d98779cad6ee958972297', '2021-03-30 18:15:31', '1'),
(141, 'Pero Brzina', 'nelle.78@hotmail.com', '$2y$10$GjGM5GjdF3Zw7s9YYbW8aOIuF9CCP7.5GdhxsM0HWMGYmCCN5yYIS', 'waiter', '3b6b730eb95b4b4c0542036afdde27d5', '2021-04-02 17:36:33', '1'),
(142, 'Stevo Karapandza', 'milesatara@email.com', '$2y$10$kmmtchrp9FkIXVRXCGJ/fOqbi31RZnxuG1Du4p74y0OGUEKEcHYzC', 'chef', 'dc6373d78ea05d163959668aa4ec5db7', '2021-04-02 13:33:40', '1'),
(143, 'Sef Sale', 'sefsale@email.com', '$2y$10$ErnZInF4AsHPt5nMbdPXT.GPSehRsuBqjT2VdpAF01UmVWaOjBcmm', 'menager', '9f063d0812fe2437afcef833c28ee433', '2021-04-03 15:32:04', '1'),
(153, 'Sejo Baksis', 'sejobaksis@email.com', '$2y$10$hXA6Z5g8kzYLlNXHPJbfAOw9.RNU46QAgbJDwdcl.g.8Sc3/SyHdy', 'waiter', 'caa97ff96f7aae76738bc5ff9f5e860b', '2021-04-12 10:48:39', '1'),
(154, 'My Burger', 'myburger@email.com', '$2y$10$Q26bDCIZlOQBJwkRbYoSN.oqMgEgi.RugwBd3uT5r.kE5N83WPukq', 'business', 'd0c042cd36646edbec3aefcf38005a49', '2021-04-22 09:10:59', '1'),
(155, 'Huso Boss', 'husoboss@email.com', '$2y$10$fBngz8Vy4uFSroYwtnH.Xuqa5etgHTBn8gpF0R3iJZ3kT/cIKfKh2', 'user', 'bf03ec95a6bbadfe06b27546e254f39b', '2021-04-26 20:34:00', '1'),
(156, 'Jasna Tacna', 'jasnatacna@email.com', '$2y$10$tlOmZBG0HeIIod1/4yWvuui0MHEXkBt23lLQOSi1XX/sweSuBse1e', 'waiter', '53697ef2232a0b91b3be36941554419c', '2021-04-26 20:41:04', '1'),
(157, 'Lanin Tata', 'lanintata.dev@gmail.com', '$2y$10$y9uq7HK5yp.J5FJ5zjkvz.acEmNxmbbGCBQ1o8EUhWZq68HOI8RuC', 'user', '3be5dc49a97be37f7873938a5fe6f0fb', '2021-05-10 19:12:06', '1'),
(158, 'Čevabdžinica Šošić', 'cevapsosic@email.com', '$2y$10$/Gev1tKhYFGO6NGr2AupT.1VX.8/Ywv.mSk0o6gS2jal0yqSS/rFq', 'business', '75d2c11ee5930f51c375ccaaa5105383', '2021-05-13 13:18:21', '1'),
(159, 'Nećko Šoškić', 'neckososkic@email.com', '$2y$10$MEWrPrNjxDojBSoSDkfey.3IgV0UlluAd/t7vIad06VgRlEhN3qgO', 'user', '26061e2da2da37f6cb005da0a7198451', '2021-05-13 17:23:20', '1');

-- --------------------------------------------------------

--
-- Stand-in structure for view `user_info`
-- (See below for the actual view)
--
CREATE TABLE `user_info` (
`user_id` int(11)
,`user_type` set('user','business','admin','super_admin','menager','chef','waiter')
,`id_number` bigint(13)
,`fullname` varchar(50)
,`user_email` varchar(50)
,`phone` varchar(20)
,`address` varchar(50)
,`city` varchar(50)
,`zip_code` int(10)
,`country` varchar(50)
,`img_url` varchar(150)
,`status` set('0','1','2','3','4','5','6','7','8','9')
);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `img_id` int(11) DEFAULT 1,
  `id_number` bigint(13) DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `zip_code` int(10) DEFAULT NULL,
  `country` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `datetime` datetime NOT NULL,
  `status` set('0','1','2','3','4','5','6','7','8','9') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `user_id`, `img_id`, `id_number`, `phone`, `address`, `city`, `zip_code`, `country`, `datetime`, `status`) VALUES
(22, 136, 147, NULL, '+387644317696', 'Brace Krso 3', 'Vogosca', 71320, 'Bosnia & Herzegovina', '2021-03-29 20:32:46', '1'),
(23, 134, 124, NULL, '066920100', 'Spasovdanska 35', 'Sarajevo', 71000, 'Bosnia & Herzegovina', '2021-03-29 20:47:34', '1'),
(25, 133, 132, 1000000000003, '+387644317696', 'Brace Krso 3', 'Vogosca', 71320, 'Bahamas', '2021-04-01 11:43:14', '1'),
(26, 141, 125, NULL, '+38762151144', 'Zrtava Kladionice 2a', 'Las Vegas', 71000, 'Peru', '2021-04-01 19:08:20', '1'),
(27, 142, 148, NULL, '+38762151144', 'Al Kaponea 12', 'Las Vegas', 71320, 'Bosnia & Herzegovina', '2021-04-02 13:40:32', '1'),
(28, 143, 131, NULL, '+38762151141', 'Zaima Sarca 123', 'Visoko', 71000, 'Aruba', '1000-01-01 00:00:00', '1'),
(30, 153, 130, NULL, NULL, NULL, 'Las Vegas', 71000, 'Bangladesh', '2021-04-12 10:48:39', '1'),
(32, 156, 136, NULL, NULL, NULL, NULL, NULL, NULL, '2021-04-26 20:41:04', '1'),
(34, 157, 137, NULL, '+387644317696', 'Brace Krso 3', 'Vogosca', 71320, 'Bosnia & Herzegovina', '2021-05-10 19:16:26', '1'),
(35, 158, 138, 1000000000230, '+387644317696', 'Azize Sacirbegovic 12, 19', 'Sarajevo', 71000, 'Bosnia & Herzegovina', '2021-05-13 13:20:08', '1'),
(44, 154, 146, 1000000000007, '+387644317696', 'Azize Sacirbegovic 12, 19', 'Sarajevo', 71000, 'Bolivia', '2021-05-13 15:12:45', '1'),
(47, 159, 1, NULL, '+387644317696', 'Azize Sacirbegovic 12, 19', 'Sarajevo', 71000, 'Bolivia', '2021-05-13 17:25:08', '1');

-- --------------------------------------------------------

--
-- Structure for view `employees_info`
--
DROP TABLE IF EXISTS `employees_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `employees_info`  AS SELECT `employees`.`business_id` AS `business_id`, `employees`.`user_id` AS `user_id`, `users`.`fullname` AS `fullname`, `users`.`user_email` AS `user_email`, `user_profile`.`phone` AS `phone`, `user_profile`.`address` AS `address`, `user_profile`.`zip_code` AS `zip_code`, `user_profile`.`city` AS `city`, `user_profile`.`country` AS `country`, `employees`.`contract_type` AS `contract_type`, `employees`.`contract_start` AS `contract_start`, `employees`.`contract_end` AS `contract_end`, `users`.`user_type` AS `user_type`, `employees`.`active` AS `active`, `users`.`status` AS `status` FROM ((`employees` join `users` on(`employees`.`user_id` = `users`.`id`)) join `user_profile` on(`employees`.`user_id` = `user_profile`.`user_id`)) WHERE `users`.`status` = '1' ;

-- --------------------------------------------------------

--
-- Structure for view `menu_view`
--
DROP TABLE IF EXISTS `menu_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `menu_view`  AS SELECT `dish`.`id` AS `id`, `dish`.`business_id` AS `business_id`, `dish`.`name` AS `name`, `img`.`img_url` AS `img_url`, `dish`.`discription` AS `discription`, `dish`.`price` AS `price`, `dish`.`type` AS `type`, `dish`.`status` AS `status` FROM (`dish` join `img` on(`dish`.`img_id` = `img`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order_info`
--
DROP TABLE IF EXISTS `order_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `order_info`  AS SELECT `order_dish`.`order_no_id` AS `order_no_id`, `order_number`.`order_no` AS `order_no`, `order_number`.`user_id` AS `user_id`, `order_number`.`business_id` AS `business_id`, `order_dish`.`table_id` AS `table_id`, `add_table`.`table_name` AS `table_name`, `order_number`.`chef_id` AS `chef_id`, `order_number`.`weiter_id` AS `weiter_id`, `order_number`.`status` AS `status`, `order_dish`.`dish_id` AS `dish_id`, `dish`.`name` AS `name`, `order_dish`.`quantity` AS `quantity`, `dish`.`price` AS `price` FROM (((`order_dish` join `dish` on(`order_dish`.`dish_id` = `dish`.`id`)) join `order_number` on(`order_dish`.`order_no_id` = `order_number`.`id`)) join `add_table` on(`order_dish`.`table_id` = `add_table`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order_view`
--
DROP TABLE IF EXISTS `order_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `order_view`  AS SELECT `order_number`.`id` AS `id`, `order_number`.`order_no` AS `order_no`, `order_number`.`table_id` AS `table_id`, `add_table`.`table_name` AS `table_name`, `order_number`.`status` AS `status`, `order_number`.`user_id` AS `user_id`, `order_number`.`business_id` AS `business_id` FROM (`order_number` join `add_table` on(`order_number`.`table_id` = `add_table`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `print_bill`
--
DROP TABLE IF EXISTS `print_bill`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `print_bill`  AS SELECT `bill_content`.`bill_number_id` AS `bill_number_id`, `bill_number`.`bill_no` AS `bill_no`, `bill_number`.`total_price` AS `total_price`, `bill_number`.`payment_method` AS `payment_method`, `bill_number`.`status` AS `status`, `bill_number`.`business_id` AS `business_id`, `bill_number`.`user_id` AS `user_id`, `order_info`.`order_no_id` AS `order_no_id`, `order_info`.`order_no` AS `order_no`, `order_info`.`table_name` AS `table_name`, `order_info`.`name` AS `name`, `order_info`.`quantity` AS `quantity`, `order_info`.`price` AS `price` FROM ((`bill_content` join `bill_number` on(`bill_content`.`bill_number_id` = `bill_number`.`id`)) join `order_info` on(`bill_content`.`order_no_id` = `order_info`.`order_no_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `profile_img`
--
DROP TABLE IF EXISTS `profile_img`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `profile_img`  AS SELECT `user_profile`.`user_id` AS `user_id`, `img`.`img_url` AS `img_url` FROM (`user_profile` join `img` on(`user_profile`.`img_id` = `img`.`id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `user_info`
--
DROP TABLE IF EXISTS `user_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`lab05dev`@`localhost` SQL SECURITY DEFINER VIEW `user_info`  AS SELECT `user_profile`.`user_id` AS `user_id`, `users`.`user_type` AS `user_type`, `user_profile`.`id_number` AS `id_number`, `users`.`fullname` AS `fullname`, `users`.`user_email` AS `user_email`, `user_profile`.`phone` AS `phone`, `user_profile`.`address` AS `address`, `user_profile`.`city` AS `city`, `user_profile`.`zip_code` AS `zip_code`, `user_profile`.`country` AS `country`, `img`.`img_url` AS `img_url`, `users`.`status` AS `status` FROM ((`user_profile` join `users` on(`user_profile`.`user_id` = `users`.`id`)) join `img` on(`user_profile`.`img_id` = `img`.`id`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_table`
--
ALTER TABLE `add_table`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `bill_content`
--
ALTER TABLE `bill_content`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_number_id` (`bill_number_id`),
  ADD KEY `order_no_id` (`order_no_id`);

--
-- Indexes for table `bill_number`
--
ALTER TABLE `bill_number`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dish`
--
ALTER TABLE `dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `img_url_id` (`img_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bisnis` (`business_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `main_dish_side_dish`
--
ALTER TABLE `main_dish_side_dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `main_dish_id` (`main_dish_id`),
  ADD KEY `side_dish_id` (`side_dish_id`);

--
-- Indexes for table `order_dish`
--
ALTER TABLE `order_dish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_no_id` (`order_no_id`);

--
-- Indexes for table `order_number`
--
ALTER TABLE `order_number`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_table`
--
ALTER TABLE `add_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `bill_content`
--
ALTER TABLE `bill_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bill_number`
--
ALTER TABLE `bill_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `dish`
--
ALTER TABLE `dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=149;

--
-- AUTO_INCREMENT for table `main_dish_side_dish`
--
ALTER TABLE `main_dish_side_dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_dish`
--
ALTER TABLE `order_dish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order_number`
--
ALTER TABLE `order_number`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `add_table`
--
ALTER TABLE `add_table`
  ADD CONSTRAINT `add_table_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `bill_content`
--
ALTER TABLE `bill_content`
  ADD CONSTRAINT `bill_content_ibfk_1` FOREIGN KEY (`bill_number_id`) REFERENCES `bill_number` (`id`),
  ADD CONSTRAINT `bill_content_ibfk_2` FOREIGN KEY (`order_no_id`) REFERENCES `order_number` (`id`);

--
-- Constraints for table `dish`
--
ALTER TABLE `dish`
  ADD CONSTRAINT `dish_ibfk_1` FOREIGN KEY (`img_id`) REFERENCES `img` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `main_dish_side_dish`
--
ALTER TABLE `main_dish_side_dish`
  ADD CONSTRAINT `main_dish_side_dish_ibfk_1` FOREIGN KEY (`main_dish_id`) REFERENCES `dish` (`id`),
  ADD CONSTRAINT `main_dish_side_dish_ibfk_2` FOREIGN KEY (`side_dish_id`) REFERENCES `dish` (`id`);

--
-- Constraints for table `order_dish`
--
ALTER TABLE `order_dish`
  ADD CONSTRAINT `order_dish_ibfk_2` FOREIGN KEY (`order_no_id`) REFERENCES `order_number` (`id`);

--
-- Constraints for table `order_number`
--
ALTER TABLE `order_number`
  ADD CONSTRAINT `order_number_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD CONSTRAINT `user_profile_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
