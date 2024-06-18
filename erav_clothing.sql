-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2024 at 07:08 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erav_clothing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cloth`
--

CREATE TABLE `tbl_cloth` (
  `idtbl_cloth` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_cloth`
--

INSERT INTO `tbl_cloth` (`idtbl_cloth`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'shirt', 1, '2024-06-06 10:41:06', NULL, NULL, 1),
(2, 'T-shirt', 1, '2024-06-06 10:57:02', '2024-06-06 12:03:55', NULL, 1),
(3, 'Trouser', 3, '2024-06-06 10:58:09', '2024-06-06 11:12:00', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colour`
--

CREATE TABLE `tbl_colour` (
  `idtbl_colour` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_colour`
--

INSERT INTO `tbl_colour` (`idtbl_colour`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'Blue', 1, '2024-06-06 11:26:22', NULL, NULL, 1),
(2, 'Red', 3, '2024-06-06 11:27:50', '2024-06-06 12:05:57', NULL, 1),
(3, 'Red', 1, '2024-06-13 10:47:16', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `idtbl_customer` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact_1` varchar(15) NOT NULL,
  `contact_2` varchar(15) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`idtbl_customer`, `name`, `email`, `contact_1`, `contact_2`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'Thejan Rajapaksha', 'rajapakshalista41@gmail.com', '0768305353', '0768305353', 1, '2024-06-06 14:26:00', '2024-06-06 14:27:06', NULL, 1),
(2, 'Oshan Udara', 'oshanudara505@gmail.com', '0769454561', '0769454561', 3, '2024-06-06 14:27:30', '2024-06-06 14:27:35', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry`
--

CREATE TABLE `tbl_inquiry` (
  `idtbl_inquiry` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_customer_idtbl_customer` int(11) NOT NULL,
  `tbl_cloth_idtbl_cloth` int(11) NOT NULL,
  `tbl_material_idtbl_material` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_size_idtbl_size` int(11) NOT NULL,
  `tbl_colour_idtbl_colour` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_inquiry`
--

INSERT INTO `tbl_inquiry` (`idtbl_inquiry`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_customer_idtbl_customer`, `tbl_cloth_idtbl_cloth`, `tbl_material_idtbl_material`, `tbl_user_idtbl_user`, `tbl_size_idtbl_size`, `tbl_colour_idtbl_colour`) VALUES
(2, 1, '2024-06-10 11:50:22', NULL, NULL, 1, 2, 1, 1, 1, 1),
(3, 1, '2024-06-18 09:20:07', NULL, NULL, 1, 1, 1, 1, 1, 1),
(4, 1, '2024-06-13 10:48:14', NULL, NULL, 1, 1, 3, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inquiry_detail`
--

CREATE TABLE `tbl_inquiry_detail` (
  `quantity` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_inquiry_idtbl_inquiry` int(11) NOT NULL,
  `tbl_size_idtbl_size` int(11) NOT NULL,
  `tbl_colour_idtbl_colour` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `idtbl_material` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`idtbl_material`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'Linen', 1, '2024-06-06 12:11:37', NULL, NULL, 1),
(2, 'Cotton', 3, '2024-06-06 12:11:43', '2024-06-06 12:12:12', NULL, 1),
(3, 'poliyester', 1, '2024-06-13 10:47:29', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu_list`
--

CREATE TABLE `tbl_menu_list` (
  `idtbl_menu_list` int(11) NOT NULL,
  `menu` varchar(450) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu_list`
--

INSERT INTO `tbl_menu_list` (`idtbl_menu_list`, `menu`, `status`) VALUES
(1, 'User Account', 1),
(2, 'User Type', 1),
(3, 'User Privileges', 1),
(4, 'Customer', 1),
(5, 'Cloth', 1),
(6, 'Colour', 1),
(7, 'Material', 1),
(8, 'Size', 1),
(9, 'Inquiry', 1),
(10, 'Quotation', 1),
(11, 'Rejected Inquiry', 1),
(12, 'Reason', 1),
(13, 'Order', 1),
(14, 'Supplier', 1),
(15, 'Supplier Type', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `idtbl_order` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_inquiry_idtbl_inquiry` int(11) NOT NULL,
  `tbl_size_idtbl_size` int(11) NOT NULL,
  `tbl_colour_idtbl_colour` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_quotation_idtbl_quotation` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`idtbl_order`, `quantity`, `start_date`, `end_date`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_inquiry_idtbl_inquiry`, `tbl_size_idtbl_size`, `tbl_colour_idtbl_colour`, `tbl_user_idtbl_user`, `tbl_quotation_idtbl_quotation`) VALUES
(13, 100, '2024-06-12', '2024-06-27', 1, '2024-06-13 09:00:26', '2024-06-13 09:00:47', NULL, 2, 1, 1, 1, 1),
(14, 500, '2024-06-13', '0000-00-00', 1, '2024-06-18 08:55:51', NULL, NULL, 4, 3, 3, 1, 3),
(16, 1500, '2024-06-13', '0000-00-00', 1, '2024-06-18 09:06:22', '2024-06-18 09:10:59', NULL, 3, 1, 1, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation`
--

CREATE TABLE `tbl_quotation` (
  `idtbl_quotation` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `total` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_inquiry_idtbl_inquiry` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation`
--

INSERT INTO `tbl_quotation` (`idtbl_quotation`, `date`, `total`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_inquiry_idtbl_inquiry`, `tbl_user_idtbl_user`) VALUES
(1, '2024-06-10 00:00:00', 20000, 1, '2024-06-10 14:17:12', '2024-06-10 13:37:09', NULL, 2, 1),
(2, '2024-06-10 00:00:00', 16553, 1, '2024-06-10 14:09:46', '2024-06-10 14:09:50', NULL, 3, 1),
(3, '2024-06-13 00:00:00', 500, 1, '2024-06-13 10:48:50', NULL, NULL, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_quotation_reject`
--

CREATE TABLE `tbl_quotation_reject` (
  `idtbl_quotation_reject` int(11) NOT NULL,
  `remarks` varchar(150) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_reason_idtbl_reason` int(11) NOT NULL,
  `tbl_quotation_idtbl_quotation` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_quotation_reject`
--

INSERT INTO `tbl_quotation_reject` (`idtbl_quotation_reject`, `remarks`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_reason_idtbl_reason`, `tbl_quotation_idtbl_quotation`, `tbl_user_idtbl_user`) VALUES
(1, 'fsdv', 1, '2024-06-11 10:25:49', '2024-06-11 10:05:15', NULL, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reason`
--

CREATE TABLE `tbl_reason` (
  `idtbl_reason` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_reason`
--

INSERT INTO `tbl_reason` (`idtbl_reason`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'Price miss match', 1, '2024-06-06 12:29:57', NULL, NULL, 1),
(2, 'Material Problem', 3, '2024-06-06 12:30:16', '2024-06-06 12:30:40', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_size`
--

CREATE TABLE `tbl_size` (
  `idtbl_size` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_size`
--

INSERT INTO `tbl_size` (`idtbl_size`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'XS', 1, '2024-06-06 12:16:38', NULL, NULL, 1),
(2, 'S', 3, '2024-06-06 12:16:47', '2024-06-06 12:17:14', NULL, 1),
(3, 'L', 1, '2024-06-13 10:47:37', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `idtbl_supplier` int(11) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `contact_1` varchar(45) NOT NULL,
  `contact_2` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_vender_idtbl_vender` int(11) NOT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`idtbl_supplier`, `name`, `email`, `contact_1`, `contact_2`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_vender_idtbl_vender`, `tbl_user_idtbl_user`) VALUES
(2, 'Thejan', 'sample@gmail.com', '0768305353', '', 1, '2024-06-06 15:17:39', NULL, NULL, 1, 1),
(3, 'Saman', 'saman@gmail.com', '0761234567', '', 3, '2024-06-06 15:44:43', '2024-06-06 15:52:45', NULL, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `idtbl_user` int(11) NOT NULL,
  `name` varchar(450) NOT NULL,
  `nicno` varchar(12) NOT NULL,
  `username` varchar(450) NOT NULL,
  `password` mediumtext NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL,
  `tbl_user_type_idtbl_user_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`idtbl_user`, `name`, `nicno`, `username`, `password`, `status`, `updatedatetime`, `tbl_user_type_idtbl_user_type`) VALUES
(1, 'Super Administrator', '', 'admin', 'd821593fb69464313bee856b9174d815', 1, '2024-06-05 15:02:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_privilege`
--

CREATE TABLE `tbl_user_privilege` (
  `idtbl_user_privilege` int(11) NOT NULL,
  `add` int(11) NOT NULL,
  `edit` int(11) NOT NULL,
  `statuschange` int(11) NOT NULL,
  `remove` int(11) NOT NULL,
  `access_status` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL,
  `tbl_menu_list_idtbl_menu_list` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_privilege`
--

INSERT INTO `tbl_user_privilege` (`idtbl_user_privilege`, `add`, `edit`, `statuschange`, `remove`, `access_status`, `status`, `insertdatetime`, `updateuser`, `updatedatetime`, `tbl_user_idtbl_user`, `tbl_menu_list_idtbl_menu_list`) VALUES
(1, 1, 1, 1, 1, 1, 1, '2024-06-05 11:47:51', NULL, NULL, 1, 1),
(2, 1, 1, 1, 1, 1, 1, '2024-06-05 11:47:51', NULL, NULL, 1, 2),
(3, 1, 1, 1, 1, 1, 1, '2024-06-05 11:47:51', NULL, NULL, 1, 3),
(4, 1, 1, 1, 1, 1, 1, '2024-06-05 15:40:45', NULL, NULL, 1, 4),
(5, 1, 1, 1, 1, 1, 1, '2024-06-05 15:41:38', NULL, NULL, 1, 5),
(6, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 6),
(7, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 7),
(8, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 8),
(9, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 9),
(10, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 10),
(11, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 11),
(12, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 12),
(13, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 13),
(14, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 14),
(15, 1, 1, 1, 1, 1, 1, '2024-06-05 15:42:23', NULL, NULL, 1, 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_type`
--

CREATE TABLE `tbl_user_type` (
  `idtbl_user_type` int(11) NOT NULL,
  `usertype` varchar(450) NOT NULL,
  `status` int(11) NOT NULL,
  `updatedatetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_type`
--

INSERT INTO `tbl_user_type` (`idtbl_user_type`, `usertype`, `status`, `updatedatetime`) VALUES
(1, 'Super Administrator\r\n', 1, '2024-05-06 09:52:00'),
(2, 'Administrator\r\n', 1, '2024-05-06 09:52:00'),
(3, 'User', 1, '2024-05-06 09:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vender`
--

CREATE TABLE `tbl_vender` (
  `idtbl_vender` int(11) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `insertdatetime` datetime NOT NULL,
  `updatedatetime` datetime DEFAULT NULL,
  `updateuser` int(11) DEFAULT NULL,
  `tbl_user_idtbl_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vender`
--

INSERT INTO `tbl_vender` (`idtbl_vender`, `type`, `status`, `insertdatetime`, `updatedatetime`, `updateuser`, `tbl_user_idtbl_user`) VALUES
(1, 'Elastic', 1, '2024-06-06 12:34:49', NULL, NULL, 1),
(2, 'Thread', 3, '2024-06-06 12:36:06', '2024-06-06 12:36:33', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  ADD PRIMARY KEY (`idtbl_cloth`),
  ADD KEY `fk_tbl_cloth_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  ADD PRIMARY KEY (`idtbl_colour`),
  ADD KEY `fk_tbl_colour_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`idtbl_customer`),
  ADD KEY `fk_tbl_customer_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD PRIMARY KEY (`idtbl_inquiry`),
  ADD KEY `fk_tbl_inquiry_tbl_customer1_idx` (`tbl_customer_idtbl_customer`),
  ADD KEY `fk_tbl_inquiry_tbl_cloth1_idx` (`tbl_cloth_idtbl_cloth`),
  ADD KEY `fk_tbl_inquiry_tbl_material1_idx` (`tbl_material_idtbl_material`),
  ADD KEY `fk_tbl_inquiry_tbl_user2_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_inquiry_tbl_size1_idx` (`tbl_size_idtbl_size`),
  ADD KEY `fk_tbl_inquiry_tbl_colour1_idx` (`tbl_colour_idtbl_colour`);

--
-- Indexes for table `tbl_inquiry_detail`
--
ALTER TABLE `tbl_inquiry_detail`
  ADD KEY `fk_tbl_inquiry_detail_tbl_inquiry1_idx` (`tbl_inquiry_idtbl_inquiry`),
  ADD KEY `fk_tbl_inquiry_detail_tbl_size1_idx` (`tbl_size_idtbl_size`),
  ADD KEY `fk_tbl_inquiry_detail_tbl_colour1_idx` (`tbl_colour_idtbl_colour`),
  ADD KEY `fk_tbl_inquiry_detail_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`idtbl_material`),
  ADD KEY `fk_tbl_material_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  ADD PRIMARY KEY (`idtbl_menu_list`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`idtbl_order`),
  ADD KEY `fk_tbl_order_tbl_size1_idx` (`tbl_size_idtbl_size`),
  ADD KEY `fk_tbl_order_tbl_colour1_idx` (`tbl_colour_idtbl_colour`),
  ADD KEY `fk_tbl_order_tbl_user2_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_order_tbl_quotation1_idx` (`tbl_quotation_idtbl_quotation`),
  ADD KEY `fk_tbl_order_tbl_inquiry1_idx` (`tbl_inquiry_idtbl_inquiry`);

--
-- Indexes for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD PRIMARY KEY (`idtbl_quotation`),
  ADD KEY `fk_tbl_quatation_tbl_inquiry1_idx` (`tbl_inquiry_idtbl_inquiry`),
  ADD KEY `fk_tbl_quatation_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_quotation_reject`
--
ALTER TABLE `tbl_quotation_reject`
  ADD PRIMARY KEY (`idtbl_quotation_reject`),
  ADD KEY `fk_tbl_quatation_reject_tbl_reason1_idx` (`tbl_reason_idtbl_reason`),
  ADD KEY `fk_tbl_quatation_reject_tbl_quatation1_idx` (`tbl_quotation_idtbl_quotation`),
  ADD KEY `fk_tbl_quatation_reject_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_reason`
--
ALTER TABLE `tbl_reason`
  ADD PRIMARY KEY (`idtbl_reason`),
  ADD KEY `fk_tbl_reason_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD PRIMARY KEY (`idtbl_size`),
  ADD KEY `fk_tbl_size_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`idtbl_supplier`),
  ADD KEY `fk_tbl_supplier_tbl_vender1_idx` (`tbl_vender_idtbl_vender`),
  ADD KEY `fk_tbl_supplier_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`idtbl_user`),
  ADD KEY `fk_tbl_user_tbl_user_type2_idx` (`tbl_user_type_idtbl_user_type`);

--
-- Indexes for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  ADD PRIMARY KEY (`idtbl_user_privilege`),
  ADD KEY `fk_tbl_user_privilege_tbl_user2_idx` (`tbl_user_idtbl_user`),
  ADD KEY `fk_tbl_user_privilege_tbl_menu_list2_idx` (`tbl_menu_list_idtbl_menu_list`);

--
-- Indexes for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  ADD PRIMARY KEY (`idtbl_user_type`);

--
-- Indexes for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  ADD PRIMARY KEY (`idtbl_vender`),
  ADD KEY `fk_tbl_vender_tbl_user2_idx` (`tbl_user_idtbl_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  MODIFY `idtbl_cloth` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  MODIFY `idtbl_colour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `idtbl_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  MODIFY `idtbl_inquiry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `idtbl_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_menu_list`
--
ALTER TABLE `tbl_menu_list`
  MODIFY `idtbl_menu_list` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `idtbl_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  MODIFY `idtbl_quotation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_quotation_reject`
--
ALTER TABLE `tbl_quotation_reject`
  MODIFY `idtbl_quotation_reject` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_reason`
--
ALTER TABLE `tbl_reason`
  MODIFY `idtbl_reason` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_size`
--
ALTER TABLE `tbl_size`
  MODIFY `idtbl_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `idtbl_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `idtbl_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  MODIFY `idtbl_user_privilege` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tbl_user_type`
--
ALTER TABLE `tbl_user_type`
  MODIFY `idtbl_user_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  MODIFY `idtbl_vender` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cloth`
--
ALTER TABLE `tbl_cloth`
  ADD CONSTRAINT `fk_tbl_cloth_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_colour`
--
ALTER TABLE `tbl_colour`
  ADD CONSTRAINT `fk_tbl_colour_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD CONSTRAINT `fk_tbl_customer_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_inquiry`
--
ALTER TABLE `tbl_inquiry`
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_cloth1` FOREIGN KEY (`tbl_cloth_idtbl_cloth`) REFERENCES `tbl_cloth` (`idtbl_cloth`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_colour1` FOREIGN KEY (`tbl_colour_idtbl_colour`) REFERENCES `tbl_colour` (`idtbl_colour`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_customer1` FOREIGN KEY (`tbl_customer_idtbl_customer`) REFERENCES `tbl_customer` (`idtbl_customer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_material1` FOREIGN KEY (`tbl_material_idtbl_material`) REFERENCES `tbl_material` (`idtbl_material`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_size1` FOREIGN KEY (`tbl_size_idtbl_size`) REFERENCES `tbl_size` (`idtbl_size`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_inquiry_detail`
--
ALTER TABLE `tbl_inquiry_detail`
  ADD CONSTRAINT `fk_tbl_inquiry_detail_tbl_colour1` FOREIGN KEY (`tbl_colour_idtbl_colour`) REFERENCES `tbl_colour` (`idtbl_colour`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_detail_tbl_inquiry1` FOREIGN KEY (`tbl_inquiry_idtbl_inquiry`) REFERENCES `tbl_inquiry` (`idtbl_inquiry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_detail_tbl_size1` FOREIGN KEY (`tbl_size_idtbl_size`) REFERENCES `tbl_size` (`idtbl_size`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_inquiry_detail_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD CONSTRAINT `fk_tbl_material_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD CONSTRAINT `fk_tbl_order_tbl_colour1` FOREIGN KEY (`tbl_colour_idtbl_colour`) REFERENCES `tbl_colour` (`idtbl_colour`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_inquiry1` FOREIGN KEY (`tbl_inquiry_idtbl_inquiry`) REFERENCES `tbl_inquiry` (`idtbl_inquiry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_quotation1` FOREIGN KEY (`tbl_quotation_idtbl_quotation`) REFERENCES `tbl_quotation` (`idtbl_quotation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_size1` FOREIGN KEY (`tbl_size_idtbl_size`) REFERENCES `tbl_size` (`idtbl_size`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_order_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_quotation`
--
ALTER TABLE `tbl_quotation`
  ADD CONSTRAINT `fk_tbl_quatation_tbl_inquiry1` FOREIGN KEY (`tbl_inquiry_idtbl_inquiry`) REFERENCES `tbl_inquiry` (`idtbl_inquiry`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_quatation_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_quotation_reject`
--
ALTER TABLE `tbl_quotation_reject`
  ADD CONSTRAINT `fk_tbl_quatation_reject_tbl_quatation1` FOREIGN KEY (`tbl_quotation_idtbl_quotation`) REFERENCES `tbl_quotation` (`idtbl_quotation`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_quatation_reject_tbl_reason1` FOREIGN KEY (`tbl_reason_idtbl_reason`) REFERENCES `tbl_reason` (`idtbl_reason`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_quatation_reject_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_reason`
--
ALTER TABLE `tbl_reason`
  ADD CONSTRAINT `fk_tbl_reason_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_size`
--
ALTER TABLE `tbl_size`
  ADD CONSTRAINT `fk_tbl_size_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD CONSTRAINT `fk_tbl_supplier_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_supplier_tbl_vender1` FOREIGN KEY (`tbl_vender_idtbl_vender`) REFERENCES `tbl_vender` (`idtbl_vender`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD CONSTRAINT `fk_tbl_user_tbl_user_type2` FOREIGN KEY (`tbl_user_type_idtbl_user_type`) REFERENCES `tbl_user_type` (`idtbl_user_type`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_user_privilege`
--
ALTER TABLE `tbl_user_privilege`
  ADD CONSTRAINT `fk_tbl_user_privilege_tbl_menu_list2` FOREIGN KEY (`tbl_menu_list_idtbl_menu_list`) REFERENCES `tbl_menu_list` (`idtbl_menu_list`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tbl_user_privilege_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbl_vender`
--
ALTER TABLE `tbl_vender`
  ADD CONSTRAINT `fk_tbl_vender_tbl_user2` FOREIGN KEY (`tbl_user_idtbl_user`) REFERENCES `tbl_user` (`idtbl_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
