-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:42 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `storemanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(30) NOT NULL,
  `brand_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_status`) VALUES
(2, 'C&K', 1),
(3, 'Odel', 1),
(4, 'Kandy Mountain', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(30) NOT NULL,
  `cart_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `cart_status`) VALUES
(1, 'women wears', 1),
(2, 'Hand bag', 1),
(3, 'Row Clothes', 1),
(4, 'Bathik', 1),
(5, 'Shoes', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_fname` varchar(30) NOT NULL,
  `customer_lname` varchar(30) NOT NULL,
  `customer_cno1` varchar(102) NOT NULL,
  `customer_cno2` varchar(12) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_nic` varchar(12) NOT NULL,
  `customer_status` int(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_cno1`, `customer_cno2`, `customer_email`, `customer_nic`, `customer_status`, `date_created`) VALUES
(1, 'isuru', 'madushanka', '+94112245586', '+94764568680', 'imadu@gmail.com', '954571236V', 1, '2022-02-05 21:21:45'),
(2, 'Sasini', 'Himayangana', '+94112578614', '+94742578614', 'nsanduni456@gmail.com', '942510953V', 1, '2022-02-05 21:21:45'),
(3, 'Hiruni', 'Oshadhi', '+94112245589', '+94712245589', 'hoshadhi@gmail.com', '20072580756', 1, '2022-02-12 19:50:04'),
(4, 'Sithara', 'Perera', '+94112255586', '+94712255586', 'sithara1998@gmail.com', '982510853V', 1, '2022-03-28 01:11:30'),
(15, 'sdfsd', 'dsfdsf', '+94112245589', '+94712245589', 'piumiwathsala89@gmail.com', '942510953V', 1, '2022-03-28 01:32:21');

-- --------------------------------------------------------

--
-- Table structure for table `customer_address`
--

CREATE TABLE `customer_address` (
  `customer_id` int(11) NOT NULL,
  `door_number` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_address`
--

INSERT INTO `customer_address` (`customer_id`, `door_number`, `street`, `country`, `city`, `state`, `postalcode`) VALUES
(0, '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `event_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE `event_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `event_user`
--

CREATE TABLE `event_user` (
  `event_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `function`
--

CREATE TABLE `function` (
  `function_id` int(11) NOT NULL,
  `function_name` varchar(30) NOT NULL,
  `module_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `function`
--

INSERT INTO `function` (`function_id`, `function_name`, `module_id`) VALUES
(1, 'Add Product', 1),
(2, 'View Product', 1),
(3, 'Update Product', 1),
(4, 'Delete Prodyuct', 1),
(5, 'Add Brand', 1),
(6, 'Update Brand', 1),
(7, 'View Brand', 1),
(8, 'Remove Brand', 1),
(9, 'Add Category', 1),
(10, 'View Category', 1),
(11, 'Update Category', 1),
(12, 'Remove Category', 1),
(13, 'Add Supplier', 2),
(14, 'View Supplier', 2),
(15, 'Update Supplier', 2),
(16, 'Delete Supplier', 2),
(17, 'Assign Brand', 2),
(18, 'Manage Rating', 2),
(19, 'Notify Supplier', 2),
(20, 'Managing Requisition Notes', 3),
(21, 'Managing Purchase Orders', 3),
(22, 'Handling GRN', 3),
(23, 'Handling Supplier Invoices', 3),
(24, 'Adding Inventory', 4),
(25, 'Quality Inspection', 4),
(26, 'Supplier Returns and Discards', 4),
(27, 'Add Customer', 5),
(28, 'Update Customer', 5),
(29, 'View Customer', 5),
(30, 'Delete Customer', 5),
(31, 'Manage Reports', 5),
(32, 'Add New Orders', 6),
(33, 'Cancel Orders', 6),
(34, 'Update Orders', 6),
(35, 'Mark Status of Orders', 6),
(36, 'View Reports', 6),
(37, 'Handling Drivers', 7),
(38, 'Handling Vehicles', 7),
(39, 'Arranging Order Transport', 7),
(40, 'Tracking the Delivery Status', 7),
(41, 'Managing Backup', 8),
(42, 'Add User', 9),
(43, 'Update User', 9),
(44, 'Activate User', 9),
(45, 'Deactivate User', 9),
(46, 'View User', 9),
(47, 'Delete User', 9);

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `location_id` int(11) NOT NULL,
  `location_name` varchar(50) NOT NULL,
  `latitude` double NOT NULL,
  `longitude` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `location`
--

INSERT INTO `location` (`location_id`, `location_name`, `latitude`, `longitude`) VALUES
(1, 'angoda', 6.944421653879195, 79.91657638340257);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `login_username` varchar(100) NOT NULL,
  `login_password` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `login_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `login_username`, `login_password`, `user_id`, `login_status`) VALUES
(1, 'sehup98@gmail.com', '28d7fb905b7ecb6a7f14f194a95d27abc589ff35', 1, 0),
(6, 'mash@gmail.com', '8732fb5513a17ed63f2ec5b37b81ced01a19e222', 12, 0),
(7, 'saji@gmail.com', 'a5f1853529db9296d4570f378150fd35d2642fbd', 13, 0),
(8, 'pgjayasiri@gmail.com', '2e41882d27fb5726c75de6b92650534409cc2292', 14, 0),
(9, 'Hperera@gmail.com', 'df83eeb7e94ad4ce37a2d2ac2f55f5ba5268bba5', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `material_requisition_note`
--

CREATE TABLE `material_requisition_note` (
  `note_id` int(11) NOT NULL,
  `requistion_date` date NOT NULL,
  `is_approved` int(11) NOT NULL,
  `requested_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE `module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(30) NOT NULL,
  `module_image` text NOT NULL,
  `module_url` varchar(200) NOT NULL,
  `module_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`module_id`, `module_name`, `module_image`, `module_url`, `module_status`) VALUES
(1, 'Product Management', 'handbag.png', 'product.php', 1),
(2, 'Supplier Management', 'suplier.png', 'supplier.php', 1),
(3, 'Purchasing Management', 'purchasing.png', 'purchasing.php', 1),
(4, 'Store Management', 'inventory.png', 'store.php', 1),
(5, 'Customer Managment', 'customer.png', 'customer.php', 1),
(6, 'Order Management', 'order.png', 'order.php', 1),
(7, 'Delivery Management', 'vehicle.png', 'delivery.php', 1),
(8, 'Backup Management', 'settings.png', 'backup.php', 1),
(9, 'User Management', 'group.png', 'user.php', 1);

-- --------------------------------------------------------

--
-- Table structure for table `module_role`
--

CREATE TABLE `module_role` (
  `module_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_role`
--

INSERT INTO `module_role` (`module_id`, `role_id`) VALUES
(1, 1),
(1, 2),
(1, 4),
(2, 1),
(2, 2),
(2, 4),
(2, 6),
(3, 1),
(3, 4),
(4, 1),
(4, 2),
(4, 4),
(5, 1),
(5, 2),
(5, 3),
(5, 4),
(5, 5),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(7, 1),
(7, 2),
(7, 4),
(7, 6),
(8, 1),
(9, 1),
(9, 2);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(225) NOT NULL,
  `order_date` date NOT NULL,
  `required_date` date NOT NULL,
  `delivered_date` date NOT NULL,
  `order_details` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `order_product_id` int(11) NOT NULL,
  `order_quantity` int(255) NOT NULL,
  `order_price` int(255) NOT NULL,
  `order_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(60) NOT NULL,
  `product_description` varchar(225) NOT NULL,
  `unit_id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `barcode_number` varchar(100) NOT NULL,
  `product_image` text NOT NULL,
  `product_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `unit_id`, `cat_id`, `brand_id`, `product_price`, `barcode_number`, `product_image`, `product_status`) VALUES
(1, 'Frock', '', 1, 1, 2, '0.00', 'sdfsdf', '1631959080_Capture.JPG', 1),
(2, 'denim', '', 4, 1, 2, '2500.00', '123', '1633250798_', 1),
(3, 'T-shirt', '', 4, 5, 4, '2500.00', '1549', '1636216485_', 1),
(5, 'frock2', '', 4, 1, 2, '5500.00', '6516', '1643131470_', 1),
(6, 'frock3', '', 4, 2, 3, '6000.00', 'xcvc', '1643133938_', 1),
(8, 'frock4', '', 0, 0, 0, '0.00', '16546', '1644675305_', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL,
  `role_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`, `role_status`) VALUES
(1, 'Administrator', 1),
(2, 'Manager', 1),
(3, 'Cashier', 1),
(4, 'Data Entry Clerk', 1),
(5, 'Supervisor', 1),
(6, 'Purchasing Manager', 1);

-- --------------------------------------------------------

--
-- Table structure for table `size`
--

CREATE TABLE `size` (
  `size_id` int(11) NOT NULL,
  `size_name` varchar(20) NOT NULL,
  `size_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `size`
--

INSERT INTO `size` (`size_id`, `size_name`, `size_status`) VALUES
(1, 'XS', 1),
(2, 'S', 1),
(3, 'M', 1),
(4, 'L', 1),
(5, 'XL', 1),
(6, 'XXL', 1),
(7, 'XXXL', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `stock_id` int(11) NOT NULL,
  `stock_date` date NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `sock_status` int(11) NOT NULL DEFAULT 1,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stock`
--

INSERT INTO `stock` (`stock_id`, `stock_date`, `quantity`, `sock_status`, `product_id`) VALUES
(1, '2021-11-07', '0.00', 1, 3),
(2, '2021-11-07', '22.00', 1, 3),
(3, '2021-11-03', '11.00', 1, 1),
(4, '2022-01-04', '6000.00', 1, 1),
(5, '2022-01-25', '2000.00', 1, 2),
(6, '2022-01-23', '500.00', 1, 5),
(7, '2022-01-18', '1000.00', 1, 6),
(8, '2022-01-25', '500.00', 1, 2),
(9, '2022-02-02', '450.00', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_companyname` varchar(225) NOT NULL,
  `supplier_companyemail` varchar(501) NOT NULL,
  `supplier_industry` varchar(50) NOT NULL,
  `supplier_description` varchar(225) NOT NULL,
  `supplier_contactperson` text NOT NULL,
  `supplier_contactemail` varchar(150) NOT NULL,
  `supplier_companyposition` varchar(50) NOT NULL,
  `supplier_cpno` varchar(12) NOT NULL,
  `supplier_cno1` varchar(12) NOT NULL,
  `supplier_cno2` varchar(12) NOT NULL,
  `supplier_comment` text NOT NULL,
  `supplier_status` tinyint(11) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_companyname`, `supplier_companyemail`, `supplier_industry`, `supplier_description`, `supplier_contactperson`, `supplier_contactemail`, `supplier_companyposition`, `supplier_cpno`, `supplier_cno1`, `supplier_cno2`, `supplier_comment`, `supplier_status`, `date_created`) VALUES
(1, 'SBC', 'sbc@sbc.com', 'clothings', 'sarees', 'piumi', 'sbc@sbc.com', 'manager', '+94712245586', '+94112245586', '+94712245586', '1000 sarees', 1, '2022-03-28 02:04:59');

-- --------------------------------------------------------

--
-- Table structure for table `supplier_address`
--

CREATE TABLE `supplier_address` (
  `supplier_id` int(11) NOT NULL,
  `door_no` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalcode` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier_address`
--

INSERT INTO `supplier_address` (`supplier_id`, `door_no`, `street`, `country`, `state`, `city`, `postalcode`) VALUES
(1, '258', 'wallawatta rd', 'Sri Lanka', 'colombo', 'colombo', 10010);

-- --------------------------------------------------------

--
-- Table structure for table `tempory_note`
--

CREATE TABLE `tempory_note` (
  `note_id` int(11) NOT NULL,
  `requsition_date` date NOT NULL,
  `is_approved` int(11) NOT NULL,
  `requested _by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempory_note_item`
--

CREATE TABLE `tempory_note_item` (
  `note_item_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `note_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(20) NOT NULL,
  `unit_status` tinyint(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`unit_id`, `unit_name`, `unit_status`) VALUES
(1, 'kg', 1),
(2, 'g', 1),
(3, 'm', 1),
(4, 'units', 1),
(5, 'mg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_fname` varchar(30) NOT NULL,
  `user_lname` varchar(30) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_gender` tinyint(4) NOT NULL,
  `user_nic` varchar(12) NOT NULL,
  `user_cno1` varchar(12) NOT NULL,
  `user_cno2` varchar(12) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` int(11) NOT NULL,
  `user_status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_fname`, `user_lname`, `user_email`, `user_gender`, `user_nic`, `user_cno1`, `user_cno2`, `user_image`, `user_role`, `user_status`) VALUES
(1, 'Sehan', 'Upendra', 'sehup98@gmail.com', 0, '982510953V', '+94112245583', '+94713771650', '1632576701_6F2C0963.jpg', 1, 1),
(12, 'mash', 'rashanthi', 'mash@gmail.com', 1, '955210952V', '+94112244563', '+94765210986', '', 2, 1),
(13, 'saji', 'perera', 'saji@gmail.com', 1, '982510653V', '+94112245563', '+94712222222', '', 2, 1),
(14, 'PG', 'Jayasiri', 'pgjayasiri@gmail.com', 0, '722540983V', '+94112233445', '+94712233445', '', 3, 1),
(15, 'HIruni', 'Perera', 'Hperera@gmail.com', 0, '945217845V', '+94113789456', '+94763789456', '', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_function`
--

CREATE TABLE `user_function` (
  `user_id` int(11) NOT NULL,
  `function_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_function`
--

INSERT INTO `user_function` (`user_id`, `function_id`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(1, 17),
(1, 18),
(1, 19),
(1, 20),
(1, 21),
(1, 22),
(1, 23),
(1, 24),
(1, 25),
(1, 26),
(1, 27),
(1, 28),
(1, 29),
(1, 30),
(1, 31),
(1, 32),
(1, 33),
(1, 34),
(1, 35),
(1, 36),
(1, 37),
(1, 38),
(1, 39),
(1, 40),
(1, 41),
(1, 42),
(1, 43),
(1, 44),
(1, 45),
(1, 46),
(1, 47),
(6, 1),
(6, 2),
(6, 3),
(6, 4),
(6, 5),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 11),
(6, 12),
(6, 13),
(6, 14),
(6, 15),
(6, 16),
(6, 17),
(6, 18),
(6, 19),
(6, 20),
(6, 21),
(6, 22),
(6, 23),
(6, 24),
(6, 25),
(6, 26),
(6, 27),
(6, 28),
(6, 29),
(6, 30),
(6, 31),
(6, 32),
(6, 33),
(6, 34),
(6, 35),
(6, 36),
(6, 37),
(6, 38),
(6, 39),
(6, 40),
(6, 41),
(6, 42),
(6, 43),
(6, 44),
(6, 45),
(6, 46),
(6, 47),
(7, 27),
(7, 28),
(7, 29),
(7, 30),
(7, 31),
(7, 32),
(7, 33),
(7, 34),
(7, 35),
(7, 36),
(8, 1),
(8, 2),
(8, 3),
(8, 4),
(8, 5),
(8, 6),
(8, 7),
(8, 8),
(8, 9),
(8, 10),
(8, 11),
(8, 12),
(8, 13),
(8, 14),
(8, 15),
(8, 16),
(8, 17),
(8, 18),
(8, 19),
(8, 20),
(8, 21),
(8, 22),
(8, 23),
(8, 24),
(8, 25),
(8, 26),
(8, 27),
(8, 28),
(8, 29),
(8, 30),
(8, 31),
(8, 32),
(8, 33),
(8, 34),
(8, 35),
(8, 36),
(8, 37),
(8, 38),
(8, 39),
(8, 40),
(8, 41),
(8, 42),
(8, 43),
(8, 44),
(8, 45),
(8, 46),
(8, 47),
(9, 27),
(9, 28),
(9, 29),
(9, 30),
(9, 31),
(9, 32),
(9, 33),
(9, 34),
(9, 35),
(9, 36),
(10, 1),
(10, 2),
(10, 3),
(10, 4),
(10, 5),
(10, 6),
(10, 7),
(10, 8),
(10, 9),
(10, 10),
(10, 11),
(10, 12),
(10, 13),
(10, 14),
(10, 15),
(10, 16),
(10, 17),
(10, 18),
(10, 19),
(10, 20),
(10, 21),
(10, 22),
(10, 23),
(10, 24),
(10, 25),
(10, 26),
(10, 27),
(10, 28),
(10, 29),
(10, 30),
(10, 31),
(10, 32),
(10, 33),
(10, 34),
(10, 35),
(10, 36),
(10, 37),
(10, 38),
(10, 39),
(10, 40),
(10, 41),
(10, 42),
(10, 43),
(10, 44),
(10, 45),
(10, 46),
(10, 47),
(11, 1),
(11, 2),
(11, 6),
(11, 7),
(11, 10),
(11, 11),
(11, 12),
(11, 13),
(11, 14),
(11, 15),
(11, 16),
(11, 17),
(11, 18),
(11, 19),
(11, 24),
(11, 25),
(11, 26),
(11, 27),
(11, 28),
(11, 29),
(11, 30),
(11, 31),
(11, 32),
(11, 33),
(11, 34),
(11, 35),
(11, 36),
(11, 37),
(11, 38),
(11, 39),
(11, 40),
(12, 1),
(12, 2),
(12, 3),
(12, 4),
(12, 5),
(12, 6),
(12, 7),
(12, 8),
(12, 9),
(12, 10),
(12, 11),
(12, 12),
(12, 13),
(12, 14),
(12, 15),
(12, 16),
(12, 17),
(12, 18),
(12, 19),
(12, 24),
(12, 25),
(12, 26),
(12, 27),
(12, 28),
(12, 29),
(12, 30),
(12, 31),
(12, 32),
(12, 33),
(12, 34),
(12, 35),
(12, 36),
(12, 37),
(12, 38),
(12, 39),
(12, 40),
(12, 42),
(12, 43),
(12, 44),
(12, 45),
(12, 46),
(12, 47),
(13, 1),
(13, 2),
(13, 3),
(13, 4),
(13, 5),
(13, 6),
(13, 7),
(13, 8),
(13, 9),
(13, 10),
(13, 11),
(13, 12),
(13, 13),
(13, 14),
(13, 15),
(13, 16),
(13, 17),
(13, 18),
(13, 19),
(13, 24),
(13, 25),
(13, 26),
(13, 27),
(13, 28),
(13, 29),
(13, 30),
(13, 31),
(13, 32),
(13, 33),
(13, 34),
(13, 35),
(13, 36),
(13, 37),
(13, 38),
(13, 39),
(13, 40),
(13, 42),
(13, 43),
(13, 44),
(13, 45),
(13, 46),
(13, 47),
(14, 27),
(14, 28),
(14, 29),
(14, 30),
(14, 31),
(14, 32),
(14, 33),
(14, 34),
(14, 35),
(14, 36),
(15, 1),
(15, 2),
(15, 3),
(15, 4),
(15, 5),
(15, 6),
(15, 7),
(15, 8),
(15, 9),
(15, 10),
(15, 11),
(15, 12),
(15, 13),
(15, 14),
(15, 15),
(15, 16),
(15, 17),
(15, 18),
(15, 19),
(15, 20),
(15, 21),
(15, 22),
(15, 23),
(15, 24),
(15, 25),
(15, 26),
(15, 27),
(15, 28),
(15, 29),
(15, 30),
(15, 31),
(15, 32),
(15, 33),
(15, 34),
(15, 35),
(15, 36),
(15, 37),
(15, 38),
(15, 39),
(15, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_address`
--
ALTER TABLE `customer_address`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`type_id`);

--
-- Indexes for table `event_user`
--
ALTER TABLE `event_user`
  ADD PRIMARY KEY (`event_id`,`user_id`);

--
-- Indexes for table `function`
--
ALTER TABLE `function`
  ADD PRIMARY KEY (`function_id`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`location_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `material_requisition_note`
--
ALTER TABLE `material_requisition_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `module`
--
ALTER TABLE `module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `module_role`
--
ALTER TABLE `module_role`
  ADD PRIMARY KEY (`module_id`,`role_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`order_product_id`,`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`),
  ADD UNIQUE KEY `barcode_number` (`barcode_number`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`size_id`);

--
-- Indexes for table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `supplier_address`
--
ALTER TABLE `supplier_address`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tempory_note`
--
ALTER TABLE `tempory_note`
  ADD PRIMARY KEY (`note_id`);

--
-- Indexes for table `tempory_note_item`
--
ALTER TABLE `tempory_note_item`
  ADD PRIMARY KEY (`note_item_id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_function`
--
ALTER TABLE `user_function`
  ADD PRIMARY KEY (`user_id`,`function_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `function`
--
ALTER TABLE `function`
  MODIFY `function_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `location_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `material_requisition_note`
--
ALTER TABLE `material_requisition_note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module`
--
ALTER TABLE `module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `size`
--
ALTER TABLE `size`
  MODIFY `size_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `stock`
--
ALTER TABLE `stock`
  MODIFY `stock_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tempory_note`
--
ALTER TABLE `tempory_note`
  MODIFY `note_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tempory_note_item`
--
ALTER TABLE `tempory_note_item`
  MODIFY `note_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
