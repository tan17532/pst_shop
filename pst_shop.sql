-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2023 at 11:10 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

 
--
-- Database: `pst_shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart1` (
  `order_id` int(11) NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `menu_id` int(11) NOT NULL COMMENT 'รหัสสินค้า',
  `quantity` int(2) NOT NULL COMMENT 'จำนวน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart1` (`order_id`, `menu_id`, `quantity`) VALUES
(0, 1, 1),
(1, 3, 1),
(1, 6, 1),
(1, 7, 1),
(1, 8, 1),
(5, 3, 2),
(33, 1, 1),
(33, 2, 1),
(34, 2, 1),
(35, 2, 1),
(36, 1, 1),
(36, 2, 1),
(37, 3, 1),
(41, 1, 1),
(42, 1, 1),
(42, 2, 1),
(48, 2, 1),
(48, 3, 1),
(50, 1, 1),
(51, 2, 1),
(51, 3, 1),
(52, 1, 1),
(53, 2, 1),
(54, 13, 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu1` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `menu_eng` varchar(100) NOT NULL,
  `menu_price` varchar(5) NOT NULL,
  `menu_picture` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu1` (`menu_id`, `menu_name`, `menu_eng`, `menu_price`, `menu_picture`) VALUES
(5, 'ลำโพง Marshall', 'speaker Marshall', '2500', '1677224016.webp'),
(6, 'ลำโพง PJ', 'speaker PJ', '3000', '1677224095.webp'),
(7, 'ลำโพง Marshall mini', 'speaker Marshall mini', '1500', '1677224226.jpg'),
(8, 'ลำโพง JBL', 'speaker JBL', '1030', '1677224599.webp'),
(9, 'ลำโพงคอมตั้งเต๊ะ', 'desktop computer speakers', '6990', '1677224708.jpg'),
(10, 'ลำโพงTV', 'speaker TV', '10500', '1677224841.png'),
(11, 'ลำโพง', 'speaker', '990', '1677224902.jfif'),
(12, 'ลำโพงมีไมค์', 'speaker', '4290', '1677224941.jpg'),
(13, 'ลำโพงเครื่องเสียง', 'speaker sound system', '15600', '1677225016.jpg'),
(14, 'ลำโพง', 'speaker', '360', '1677225050.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order1` (
  `order_id` int(11) NOT NULL COMMENT 'เลขที่ใบสั่งซื้อ',
  `order_date` varchar(20) NOT NULL COMMENT 'วันที่',
  `order_time` varchar(10) NOT NULL COMMENT 'เวลา',
  `username` varchar(50) NOT NULL COMMENT 'ชื่อ',
  `total` varchar(4) NOT NULL COMMENT 'ยอดรวม',
  `status` varchar(1) NOT NULL COMMENT 'สถานะ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order1` (`order_id`, `order_date`, `order_time`, `username`, `total`, `status`) VALUES
(48, '15/02/2566', '15:05 pm', '2', '5034', '3'),
(50, '15/02/2566', '15:25 pm', 'test', '2500', '0'),
(51, '15/02/2566', '15:38 pm', 'vip', '5034', '3'),
(52, '15/02/2566', '17:34 pm', 'test', '2500', '2'),
(53, '', '', 'test', '', '1'),
(54, '', '', 'phet', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user1` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(32) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `access` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user1` (`user_id`, `username`, `password`, `tel`, `access`) VALUES
(1, 'vip', 'b4b147bc522828731f1a016bfa72c073', '0912455458', 'admin'),
(2, 'test', 'b4b147bc522828731f1a016bfa72c073', '0924554583', 'user'),
(4, 'phet', 'b4b147bc522828731f1a016bfa72c073', '0663368153', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart1`
  ADD PRIMARY KEY (`order_id`,`menu_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu1`
  ADD PRIMARY KEY (`menu_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order1`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu1`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order1`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'เลขที่ใบสั่งซื้อ', AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user1`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
