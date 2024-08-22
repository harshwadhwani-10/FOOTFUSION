-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2024 at 10:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecomm`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `cartID` int(3) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(6) NOT NULL,
  `p_quantity` int(2) NOT NULL,
  `p_color` varchar(8) NOT NULL,
  `p_size` int(2) NOT NULL,
  `p_discount` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`cartID`, `user_id`, `product_id`, `p_quantity`, `p_color`, `p_size`, `p_discount`) VALUES
(61, 39, 5687, 1, 'brown', 6, 0),
(66, 27, 5002, 1, 'blue', 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(2) NOT NULL,
  `Category_name` varchar(30) NOT NULL,
  `Category_desc` text NOT NULL,
  `cat_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `Category_name`, `Category_desc`, `cat_status`) VALUES
(1, 'shoes', 'it comprises of men, woman and kids shoes', 'Enabled'),
(2, 'sandal', 'it comprises of men, woman and kids sandals', 'Enabled'),
(3, 'sliders', 'it comprises of men, woman and kids sliders', 'Enabled'),
(4, 'slippers', 'it comprises of men, woman and kids slippers', 'Enabled'),
(5, 'crocs', 'it comprises of men, woman and kids crocs', 'Enabled'),
(6, 'Insoles', 'shoes Insoles', 'Enabled'),
(7, 'Socks', 'shoes socks', 'Enabled'),
(8, 'Polish', 'shoes polish', 'Enabled'),
(9, 'laces', 'shoes laces', 'Enabled'),
(10, 'sneakers', 'it comprises of men, woman and kids shoes', 'Enabled');

-- --------------------------------------------------------

--
-- Stand-in structure for view `category wise`
-- (See below for the actual view)
--
CREATE TABLE `category wise` (
`category_id` int(2)
,`Category_name` varchar(30)
,`Category_desc` text
,`product_name` varchar(30)
,`price` int(4)
);

-- --------------------------------------------------------

--
-- Table structure for table `color`
--

CREATE TABLE `color` (
  `cid` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `color` varchar(20) NOT NULL,
  `color_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `color`
--

INSERT INTO `color` (`cid`, `product_id`, `color`, `color_status`) VALUES
(1, 5687, 'brown', 'Enabled'),
(2, 5687, 'black', 'Enabled'),
(3, 8004, 'blue', 'Enabled'),
(4, 5109, 'black', 'Enabled'),
(5, 5109, 'green', 'Enabled'),
(6, 77075, 'maroon', 'Enabled'),
(7, 77075, 'pink', 'Enabled'),
(8, 5100, 'blue', 'Enabled'),
(10, 4866, 'cream brown', 'Enabled'),
(11, 5002, 'blue', 'Enabled'),
(12, 5002, 'brown', 'Enabled'),
(13, 1026, 'blue', 'Enabled'),
(14, 1026, 'white', 'Enabled'),
(15, 1025, 'blue', 'Enabled'),
(16, 1002, 'brown', 'Enabled'),
(17, 2659, 'black', 'Enabled'),
(18, 2, 'blue', 'Enabled'),
(19, 568, 'red', 'Enabled'),
(20, 897, 'white', 'Enabled'),
(21, 457, 'green', 'Enabled'),
(22, 258, 'maroon', 'Enabled'),
(23, 101, 'grey', 'Enabled'),
(24, 102, 'blueyellow', 'Enabled'),
(25, 103, 'grey', 'Enabled'),
(26, 104, 'red', 'Enabled'),
(27, 105, 'grey', 'Enabled'),
(28, 3365, 'pink', 'Enabled'),
(29, 3369, 'pink', 'Enabled'),
(30, 879, 'blue', 'Enabled'),
(31, 3342, 'white', 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(5) NOT NULL,
  `user_id` int(5) NOT NULL,
  `product_id` int(3) NOT NULL,
  `feedback_rating` int(1) NOT NULL,
  `feedback_desc` text NOT NULL,
  `feedback_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `user_id`, `product_id`, `feedback_rating`, `feedback_desc`, `feedback_date`) VALUES
(1, 30, 5109, 4, 'The footwear is stylish and comfortable, providing excellent support throughout the day. The quality of materials used is impressive, and the design reflects both durability and fashion. However, there is room for improvement in the sizing accuracy, as the fit was slightly different than expected. Overall, a great product with potential for even greater customer satisfaction with minor adjustments.', '2024-01-18'),
(2, 27, 8004, 5, 'This kids\' footwear product is fantastic! The vibrant colors and playful designs immediately caught my child\'s attention. The durability and quality of materials used are commendable, ensuring these shoes can withstand the active lifestyle of kids. The Velcro closures make it easy for little ones to put on and take off independently. My only suggestion would be to include additional arch support for enhanced comfort during extended wear. Overall, a delightful and well-crafted product that brings joy to both parents and kids alike', '2023-12-16'),
(3, 27, 1026, 5, 'loved the product . good build quality and style', '2024-04-04'),
(4, 36, 1026, 4, 'highly durable and efficient style', '2024-04-04'),
(5, 36, 5002, 5, 'good product and reasonable price', '2024-04-04'),
(6, 36, 1026, 5, 'price is good. styling is also great', '2024-04-04'),
(7, 39, 1026, 5, 'Great Product !', '2024-04-04'),
(8, 39, 1026, 4, 'good Product', '2024-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Image_ID` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `Image_path1` varchar(50) NOT NULL,
  `Image_path2` varchar(50) NOT NULL,
  `Image_path3` varchar(50) NOT NULL,
  `Image_path4` varchar(50) NOT NULL,
  `Image_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`Image_ID`, `cid`, `Image_path1`, `Image_path2`, `Image_path3`, `Image_path4`, `Image_desc`) VALUES
(1, 13, 'public/img/1026-1-blu.jpeg', 'public/img/1026-2-blu.jpeg', 'public/img/1026-3-blu.jpeg', 'public/img/1026-4-blu.jpeg', 'blue atletic shoes'),
(2, 14, 'public/img/1026-1-wh.jpeg', 'public/img/1026-2-wh.jpeg', 'public/img/1026-3-wh.jpeg', 'public/img/1026-4-wh.jpeg', 'blue atletic shoes'),
(3, 11, 'public/img/5002-1-bl.jpeg', 'public/img/5002-2-bl.jpeg', 'public/img/5002-3-bl.jpeg', 'public/img/5002-4-bl.jpeg', 'blue slipper'),
(4, 12, 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'public/img/5002-1-br.jpeg', 'brown slipper'),
(5, 6, 'public/img/77075-1-mar.jpeg', 'public/img/77075-2-mar.jpeg', 'public/img/77075-3-mar.jpeg', 'public/img/77075-4-mar.jpeg', 'maroon sandal'),
(6, 7, 'public/img/77075-1-pi.jpeg', 'public/img/77075-2-pi.jpeg', 'public/img/77075-3-pi.jpeg', 'public/img/77075-4-pi.jpeg', 'pink sandal'),
(7, 4, 'public/img/5109-1-bl.jpeg', 'public/img/5109-2-bl.jpeg', 'public/img/5109-3-bl.jpeg', 'public/img/5109-4-bl.jpeg', 'blue Sport Sandals'),
(8, 5, 'public/img/5109-1-gr.jpeg', 'public/img/5109-2-gr.jpeg', 'public/img/5109-3-gr.jpeg', 'public/img/5109-4-gr.jpeg', 'green Sport Sandals'),
(9, 1, 'public/img/5687-1-bro.jpeg', 'public/img/5687-2-bro.jpeg', 'public/img/5687-3-bro.jpeg', 'public/img/5687-4-bro.jpeg', 'brown slippers'),
(10, 2, 'public/img/5687-1-bla.jpeg', 'public/img/5687-2-bla.jpeg', 'public/img/5687-3-bla.jpeg', 'public/img/5687-4-bla.jpeg', 'black slippers'),
(11, 3, 'public/img/8004-1-blu.jpeg', 'public/img/8004-2-blu.jpeg', 'public/img/8004-3-blu.jpeg', 'public/img/8004-4-blu.jpeg', 'blue Clogs For Kids'),
(12, 8, 'public/img/5100-1-bl.jpeg', 'public/img/5100-2-bl.jpeg', 'public/img/5100-3-bl.jpeg', 'public/img/5100-4-bl.jpeg', ' blue Sport Sandals'),
(13, 10, 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', 'public/img/4866-1-crbr.jpeg', ' cream brown FLIP FLOP'),
(14, 15, 'public/img/1025-1-bl.jpeg', 'public/img/1025-2-bl.jpeg', 'public/img/1025-3-bl.jpeg', 'public/img/1025-4-bl.jpeg', 'blue slippers'),
(15, 16, 'public/img/1002-1-br.jpeg', 'public/img/1002-2-br.jpeg', 'public/img/1002-3-br.jpeg', 'public/img/1002-4-br.jpeg', 'brown slippers'),
(16, 17, 'public/img/2659-1-bla.jpeg', 'public/img/2659-2-bla.jpeg', 'public/img/2659-3-bla.jpeg', 'public/img/2659-4-bla.jpeg', 'black shoes'),
(17, 18, 'public/img/2C-1-bl.jpeg', 'public/img/2C-2-bl.jpeg', 'public/img/2C-3-bl.jpeg', 'public/img/2C-4-bl.jpeg', 'blue sandal'),
(18, 19, 'public/img/568-1-red.jpeg', 'public/img/568-2-red.jpeg', 'public/img/568-3-red.jpeg', 'public/img/568-4-red.jpeg', 'red slippers'),
(19, 20, 'public/img/897-1-wh.jpeg', 'public/img/897-2-wh.jpeg', 'public/img/897-3-wh.jpeg', 'public/img/897-4-wh.jpeg', 'white sneakers'),
(20, 21, 'public/img/7-1-gr.jpeg', 'public/img/7-2-gr.jpeg', 'public/img/7-3-gr.jpeg', 'public/img/7-4-gr.jpeg', 'green slippers'),
(21, 22, 'public/img/258-1-ma.jpeg', 'public/img/258-2-ma.jpeg', 'public/img/258-3-ma.jpeg', 'public/img/258-4-ma.jpeg', 'maroon slipper'),
(22, 25, 'public/img/103-1-gr.jpg', 'public/img/103-2-gr.jpg', 'public/img/103-3-gr.jpg', 'public/img/103-4-gr.jpg', 'grey insoles for men shoes'),
(23, 27, 'public/img/105-1-gr.jpg', 'public/img/105-2-gr.jpg', 'public/img/105-3-gr.jpg', 'public/img/105-4-gr.jpg', 'grey cushion insoles'),
(24, 23, 'public/img/101-1-gr.jpg', 'public/img/101-2-gr.jpg', 'public/img/101-3-gr.jpg', 'public/img/101-4-gr.jpg', 'grey cushion insoles'),
(25, 24, 'public/img/102-1-blye.jpg', 'public/img/102-2-blye.jpg', 'public/img/102-3-blye.jpg', 'public/img/102-4-blye.jpg', 'Insoles blue yellow for men'),
(26, 28, 'public/img/3365-1-pi.jpeg', 'public/img/3365-2-pi.jpeg', 'public/img/3365-3-pi.jpeg', 'public/img/3365-4-pi.jpeg', 'pink shoes'),
(27, 29, 'public/img/3369-1-pi.jpeg', 'public/img/3369-2-pi.jpeg', 'public/img/3369-3-pi.jpeg', 'public/img/3369-4-pi.jpeg', 'pink shoe'),
(28, 30, 'public/img/879-1-blu.jpeg', 'public/img/879-2-blu.jpeg', 'public/img/879-3-blu.jpeg', 'public/img/879-4-blu.jpeg', 'blue sports shoes'),
(29, 31, 'public/img/3342-1-wh.jpeg', 'public/img/3342-2-wh.jpeg', 'public/img/3342-3-wh.jpeg', 'public/img/3342-4-wh.jpeg', 'white shoes ');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `offer_id` int(2) NOT NULL,
  `offer_name` varchar(20) NOT NULL,
  `offer_details` text NOT NULL,
  `offer_status` varchar(20) NOT NULL DEFAULT 'Enabled',
  `offer_percent` int(3) NOT NULL,
  `offer_start_date` date NOT NULL,
  `offer_end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`offer_id`, `offer_name`, `offer_details`, `offer_status`, `offer_percent`, `offer_start_date`, `offer_end_date`) VALUES
(9, 'walkaro783', 'Get Upto 35% Offer on any purchase of your order.', 'Enabled', 12, '2024-01-17', '2024-04-24'),
(10, 'foot15', 'Get Flat 15% off on your first Order. Enjoy Free Shipping ', 'Disabled', 15, '2024-01-31', '2024-02-29'),
(11, 'welcome12', 'Apply offer 12% OFF', 'Enabled', 12, '2024-03-13', '2024-05-23');

-- --------------------------------------------------------

--
-- Stand-in structure for view `offer expiration wise`
-- (See below for the actual view)
--
CREATE TABLE `offer expiration wise` (
`offer_id` int(2)
,`offer_name` varchar(20)
,`offer_details` text
,`offer_percent` int(3)
,`offer_start_date` date
,`offer_end_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `offer status wise`
-- (See below for the actual view)
--
CREATE TABLE `offer status wise` (
`offer_id` int(2)
,`offer_name` varchar(20)
,`offer_details` text
,`offer_status` varchar(20)
,`offer_percent` int(3)
,`offer_start_date` date
,`offer_end_date` date
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order date wise`
-- (See below for the actual view)
--
CREATE TABLE `order date wise` (
`order_id` int(3)
,`user_id` int(5)
,`order_date` date
,`order_status` varchar(15)
,`order_amount` int(6)
,`quantity` int(3)
,`rate` int(5)
,`size` int(3)
,`color` varchar(8)
,`discount` int(2)
,`amount` int(5)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `order sales`
-- (See below for the actual view)
--
CREATE TABLE `order sales` (
`Year` int(4)
,`Month` int(2)
,`Total Sales` decimal(32,0)
);

-- --------------------------------------------------------

--
-- Table structure for table `order_detail`
--

CREATE TABLE `order_detail` (
  `orderdetail_id` int(5) NOT NULL,
  `order_id` int(3) NOT NULL,
  `product_id` int(3) NOT NULL,
  `quantity` int(3) NOT NULL,
  `rate` int(5) NOT NULL,
  `size` int(3) NOT NULL,
  `color` varchar(8) NOT NULL,
  `discount` int(2) NOT NULL,
  `amount` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_detail`
--

INSERT INTO `order_detail` (`orderdetail_id`, `order_id`, `product_id`, `quantity`, `rate`, `size`, `color`, `discount`, `amount`) VALUES
(39, 76, 1026, 6, 999, 8, 'blue', 1199, 4795),
(40, 77, 1026, 1, 999, 7, 'blue', 0, 999),
(41, 77, 5002, 1, 227, 7, 'blue', 0, 227),
(42, 78, 1026, 20, 999, 6, 'blue', 3996, 15984),
(43, 79, 5002, 1, 227, 8, 'blue', 0, 227),
(44, 80, 1026, 1, 999, 8, 'blue', 0, 999),
(45, 81, 1026, 1, 999, 9, 'blue', 0, 999),
(46, 81, 5002, 1, 227, 9, 'blue', 0, 227),
(47, 82, 5002, 21, 227, 9, 'blue', 953, 3814),
(48, 82, 1026, 20, 999, 9, 'blue', 3996, 15984),
(49, 83, 5002, 1, 227, 6, 'blue', 0, 227),
(50, 84, 1026, 1, 999, 10, 'blue', 0, 999),
(51, 85, 1026, 1, 999, 9, 'blue', 0, 999),
(52, 85, 5002, 1, 227, 9, 'blue', 0, 227),
(53, 86, 1026, 1, 999, 6, 'blue', 0, 999),
(54, 87, 5687, 1, 227, 8, 'brown', 0, 227),
(55, 87, 1026, 1, 999, 8, 'blue', 0, 999),
(56, 88, 1026, 20, 999, 6, 'blue', 3996, 15984),
(57, 88, 5002, 1, 227, 6, 'blue', 0, 227),
(58, 89, 1026, 1, 999, 6, 'blue', 0, 999),
(59, 89, 5002, 1, 227, 6, 'blue', 0, 227);

-- --------------------------------------------------------

--
-- Table structure for table `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(3) NOT NULL,
  `user_id` int(5) NOT NULL,
  `order_date` date NOT NULL DEFAULT current_timestamp(),
  `order_status` varchar(15) NOT NULL,
  `order_amount` int(6) NOT NULL,
  `discount` int(4) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `mobile` bigint(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `shipping_address` text NOT NULL,
  `shipping_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_tbl`
--

INSERT INTO `order_tbl` (`order_id`, `user_id`, `order_date`, `order_status`, `order_amount`, `discount`, `fname`, `lname`, `mobile`, `email`, `shipping_address`, `shipping_status`) VALUES
(76, 27, '2024-04-02', 'complete', 4846, 1198, 'harsh', 'wadhwani', 8799553324, 'harshwadhwani268@gmail.com', '2,shilpa society, india colony, ahmedabad', 'shipped'),
(77, 27, '2024-04-04', 'packed', 1123, 153, 'Harsh', 'Wadhwani', 8401409849, 'harshwadhwani268@gmail.com', '18 parth society bapunagar', 'processing'),
(78, 32, '2024-04-04', 'packed', 13631, 6399, 'om', 'kumar', 9693808798, 'omk738774@gmail.com', 'b11 sharad apartment', 'processing'),
(79, 34, '2024-04-04', 'complete', 244, 33, 'jatin', 'kanzariya', 8525652312, 'jatink123@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 ', 'shipped'),
(80, 33, '2024-04-04', 'cancel', 1049, 0, 'kruparth', 'kanzariya', 7874773789, 'kruparth1610@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 ', 'shipped'),
(81, 38, '2024-04-04', 'packed', 1123, 153, 'rocky', 'bhai', 8580250157, 'rocky12@gmail.com', 'green pg navrangpura', 'processing'),
(82, 33, '2024-04-04', 'complete', 16873, 7924, 'kruparth', 'kanzariya', 8580250157, 'kruparth1610@gmail.com', 'samras boys hostel', 'shipped'),
(83, 32, '2024-04-04', 'placed', 244, 33, 'om', 'kumar', 9693808798, 'omk738774@gmail.com', 'hn 49 shivpuri colony', 'processing'),
(84, 35, '2024-04-04', 'placed', 924, 125, 'rohan', 'rathod', 9944663322, 'rohanrathod@gmail.com', 'sharad apartment navranpura', 'processing'),
(85, 36, '2024-04-04', 'complete', 1276, 0, 'Saurabh', 'garg', 8585220013, 'saurabh@gmail.com', 'b11 pratistha 20 ', 'shipped'),
(86, 39, '2024-04-04', 'cancel', 924, 125, 'kashyap', 'kanzariya', 9546541254, 'kruparth2000@gmail.com', 'nava Amrapar Halvad', 'shipped'),
(87, 39, '2024-04-04', 'placed', 277, 0, 'kashyap', 'kannzariya', 9546541254, 'kruparth2000@gmail.com', 'Isanpur, halvad', 'processing'),
(88, 33, '2024-04-04', 'placed', 13831, 6426, 'Kruparth', 'Kanzariya', 7874773789, 'kruparth1610@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing'),
(89, 27, '2024-04-06', 'placed', 1123, 153, 'Om', 'Kumar', 9693808798, 'omkumar1870@gmail.com', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 'processing');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transaction_id` bigint(25) NOT NULL,
  `order_id` int(3) NOT NULL,
  `payment_mode` varchar(7) NOT NULL,
  `payment_date` date NOT NULL DEFAULT current_timestamp(),
  `payment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`transaction_id`, `order_id`, `payment_mode`, `payment_date`, `payment_status`) VALUES
(1712075335585563845, 76, 'online', '2024-04-02', 'paid'),
(1712175732584617718, 77, 'online', '2024-04-04', 'paid'),
(1712176273531346560, 78, 'COD', '2024-04-04', 'pending'),
(1712176499370572019, 79, 'COD', '2024-04-04', 'paid'),
(1712176683680713465, 80, 'online', '2024-04-04', 'paid'),
(1712176881285650990, 81, 'COD', '2024-04-04', 'pending'),
(1712177158761875198, 82, 'COD', '2024-04-04', 'paid'),
(1712177427689482992, 83, 'online', '2024-04-04', 'paid'),
(1712177543746614541, 84, 'online', '2024-04-04', 'paid'),
(1712177659503712739, 85, 'COD', '2024-04-04', 'paid'),
(1712202169158318824, 86, 'COD', '2024-04-04', 'paid'),
(1712204939863586094, 87, 'COD', '2024-04-04', 'pending'),
(1712237976761126362, 88, 'online', '2024-04-04', 'paid'),
(1712342378316141978, 89, 'COD', '2024-04-06', 'pending');

-- --------------------------------------------------------

--
-- Stand-in structure for view `payment datewise`
-- (See below for the actual view)
--
CREATE TABLE `payment datewise` (
`transaction_id` bigint(25)
,`order_id` int(3)
,`payment_mode` varchar(7)
,`payment_date` date
,`payment_status` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `payment mode wise`
-- (See below for the actual view)
--
CREATE TABLE `payment mode wise` (
`transaction_id` bigint(25)
,`fname` varchar(10)
,`lname` varchar(20)
,`order_date` date
,`order_amount` int(6)
,`payment_mode` varchar(7)
,`payment_date` date
,`payment_status` varchar(10)
);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_id` int(6) NOT NULL,
  `Category_ID` int(2) NOT NULL,
  `offer_id` int(2) DEFAULT -1,
  `grp` varchar(20) NOT NULL,
  `product_name` varchar(30) NOT NULL,
  `product_details` text NOT NULL,
  `price` int(4) NOT NULL,
  `actual_price` int(4) NOT NULL,
  `pro_status` varchar(10) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_id`, `Category_ID`, `offer_id`, `grp`, `product_name`, `product_details`, `price`, `actual_price`, `pro_status`) VALUES
(2, 2, NULL, 'Kids', 'campus', 'XPERIA-2C Navy Kids Sandals', 429, 550, 'Enabled'),
(101, 6, NULL, 'Accessories', 'footvital', 'Footvital Memory Foam Shoe Insoles Comfortable Insoles Supports Heel & Arch Absorbs Foot Sweat & Moisture Ultra Soft Cushioned Lightweight Durable Washable Pads for Men & Women Blue ', 299, 599, 'Enabled'),
(102, 6, NULL, 'Accessories', 'boldfit', 'Boldfit Insole For Shoes Men Shoe Insoles For Men Sole For Shoe Shoe Sole For Men Insoles For Women Flat Foot Insoles For Men Shoes Sole For Men Gel Insoles For Men And Women Trim To Fit  ', 749, 999, 'Enabled'),
(103, 6, NULL, 'Accessories', 'fovera', 'FOVERA Gel Insoles Pair for Walking, Running, Sports, Formal & Safety Shoes-All Day Comfort Shoe Inserts with Dual Gel Technology-Made In India -Full Sole for Every Shoe ', 360, 459, 'Enabled'),
(104, 6, NULL, 'Accessories', 'boldfit', 'Boldfit Insole For Shoes Men Shoe Insoles For Men Sole For Shoe Shoe Sole For Men Insoles For Women Flat Foot Insoles For Men Shoes Sole For Men Gel Insoles For Men And Women Trim To Fit ', 749, 1299, 'Enabled'),
(105, 6, NULL, 'Accessories', 'frido', 'Frido Dual Gel Heavy Duty Trimmable Insoles, For Loose Shoes or Replacing Existing Insoles, Thick Shoe Inserts, Extra Comfort and Support, Proudly Made in India  ', 769, 999, 'Enabled'),
(258, 4, NULL, 'Womans', 'lehar', 'Women Maroon Wedges Sandal', 499, 699, 'Disabled'),
(457, 4, NULL, 'Womans', 'lehar', 'Women Flip Flops', 499, 899, 'Enabled'),
(568, 4, NULL, 'Kids', 'venus', 'Men Flip Flops', 199, 499, 'Enabled'),
(879, 1, NULL, 'Womans', 'campus', 'JESSICA Blue Women Running Shoes', 789, 1299, 'Enabled'),
(897, 1, NULL, 'Kids', 'venus', 'Sneakers For Women', 349, 599, 'Enabled'),
(1002, 4, NULL, 'Mens', 'campus', 'GC-1002C Brown Mens slippers', 351, 499, 'Enabled'),
(1025, 4, NULL, 'Mens', 'campus', 'GC-1025A Blue Mens Slippers', 499, 599, 'Enabled'),
(1026, 1, NULL, 'Mens', 'paragon', 'Paragon K1026G Men Walking Shoes | Athletic Shoes with Comfortable Cushioned Sole for Daily Outdoor Use', 999, 1599, 'Enabled'),
(2659, 1, NULL, 'Womans', 'campus', 'CRISTY Black Womens Running Shoes', 689, 899, 'Enabled'),
(3342, 1, NULL, 'Womans', 'walkaro', 'WALKAROO BOYS CASUAL SHOES - WY3342', 584, 899, 'Enabled'),
(3365, 1, NULL, 'Womans', 'walkaro', 'WALKAROO WOMEN CASUAL SHOES - WY3365', 519, 799, 'Enabled'),
(3369, 1, NULL, 'Womans', 'walkaro', 'WALKAROO WOMEN CASUAL SHOE - WY3369', 649, 999, 'Enabled'),
(4866, 4, NULL, 'Womans', 'Walkaro', 'WALKAROO WOMEN FLIP FLOP WC4866', 194, 299, 'Enabled'),
(5002, 4, NULL, 'Mens', 'Walkaro', 'WALKAROO MEN SOLID THONG SANDALS ART WG5002', 227, 349, 'Disabled'),
(5100, 2, NULL, 'Mens', 'Lee cooper', 'Polyurethane Slipon Men\'s Sport Sandals', 1499, 1999, 'Enabled'),
(5109, 2, NULL, 'Mens', 'Lee cooper', 'Polyurethane Slipon Men\'s Sport Sandals', 1699, 2199, 'Enabled'),
(5687, 4, NULL, 'Mens', 'Walkaro', 'Walkaroo Men Cross strap Slide Sandals - W5687', 227, 349, 'Enabled'),
(8004, 5, NULL, 'Kids', 'paragon', 'Paragon EVK8004C Unisex Clogs For Kids | Outdoor and Indoor Casual, Durable Clogs', 749, 999, 'Enabled'),
(77075, 2, NULL, 'Womans', 'paragon', 'Women\'s Solea Maroon Sandal', 349, 499, 'Enabled');

-- --------------------------------------------------------

--
-- Stand-in structure for view `product group wise`
-- (See below for the actual view)
--
CREATE TABLE `product group wise` (
`Product_id` int(6)
,`grp` varchar(20)
,`product_name` varchar(30)
,`product_details` text
,`price` int(4)
,`actual_price` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product namewise report`
-- (See below for the actual view)
--
CREATE TABLE `product namewise report` (
`Product_id` int(6)
,`grp` varchar(20)
,`product_name` varchar(30)
,`product_details` text
,`price` int(4)
,`actual_price` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product order wise`
-- (See below for the actual view)
--
CREATE TABLE `product order wise` (
`product_id` int(3)
,`product_name` varchar(30)
,`price` int(4)
,`count` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product price wise`
-- (See below for the actual view)
--
CREATE TABLE `product price wise` (
`Product_id` int(6)
,`grp` varchar(20)
,`product_name` varchar(30)
,`product_details` text
,`product_type` varchar(20)
,`size` int(2)
,`quantity` int(3)
,`price` int(4)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product status wise`
-- (See below for the actual view)
--
CREATE TABLE `product status wise` (
`Product_id` int(6)
,`grp` varchar(20)
,`product_name` varchar(30)
,`price` int(4)
,`product_type` varchar(20)
,`size` int(2)
,`quantity` int(3)
,`color` varchar(20)
,`Image_path1` varchar(50)
,`Image_path2` varchar(50)
,`Image_path3` varchar(50)
,`Image_path4` varchar(50)
,`pro_status` varchar(10)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `product wise`
-- (See below for the actual view)
--
CREATE TABLE `product wise` (
`Product_id` int(6)
,`grp` varchar(20)
,`product_name` varchar(30)
,`product_details` text
,`price` int(4)
,`actual_price` int(4)
,`product_type` varchar(20)
,`size` int(2)
,`quantity` int(3)
,`color` varchar(20)
,`Image_path1` varchar(50)
,`Image_path2` varchar(50)
,`Image_path3` varchar(50)
,`Image_path4` varchar(50)
);

-- --------------------------------------------------------

--
-- Table structure for table `product_desc`
--

CREATE TABLE `product_desc` (
  `prodesc_ID` int(3) NOT NULL,
  `cid` int(3) NOT NULL,
  `product_type` varchar(20) NOT NULL,
  `size` int(2) NOT NULL,
  `quantity` int(3) NOT NULL,
  `prodesc_status` varchar(20) NOT NULL DEFAULT 'Enabled'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_desc`
--

INSERT INTO `product_desc` (`prodesc_ID`, `cid`, `product_type`, `size`, `quantity`, `prodesc_status`) VALUES
(1, 1, 'Daily casual', 6, 100, 'Enabled'),
(2, 1, 'Daily casual', 7, 100, 'Enabled'),
(3, 1, 'Daily casual', 8, 99, 'Enabled'),
(4, 1, 'Daily casual', 9, 100, 'Enabled'),
(5, 1, 'Daily casual', 10, 100, 'Enabled'),
(6, 2, 'Daily casual', 6, 100, 'Enabled'),
(7, 2, 'Daily casual', 7, 100, 'Enabled'),
(8, 2, 'Daily casual', 8, 100, 'Enabled'),
(9, 2, 'Daily casual', 9, 100, 'Enabled'),
(10, 2, 'Daily casual', 10, 100, 'Enabled'),
(11, 3, 'Clogs', 6, 100, 'Enabled'),
(12, 3, 'Clogs', 7, 100, 'Enabled'),
(13, 3, 'Clogs', 8, 100, 'Enabled'),
(14, 4, 'Sports Sandals', 40, 100, 'Enabled'),
(15, 4, 'Sports Sandals', 41, 100, 'Enabled'),
(16, 4, 'Sports Sandals', 42, 100, 'Enabled'),
(17, 4, 'Sports Sandals', 43, 100, 'Enabled'),
(18, 4, 'Sports Sandals', 44, 100, 'Enabled'),
(19, 4, 'Sports Sandals', 45, 100, 'Enabled'),
(20, 5, 'Sports Sandals', 40, 100, 'Enabled'),
(21, 5, 'Sports Sandals', 41, 100, 'Enabled'),
(22, 5, 'Sports Sandals', 42, 100, 'Enabled'),
(23, 5, 'Sports Sandals', 43, 100, 'Enabled'),
(24, 5, 'Sports Sandals', 44, 100, 'Enabled'),
(25, 6, 'PU Sandals', 4, 100, 'Enabled'),
(26, 6, 'PU Sandals', 5, 100, 'Enabled'),
(27, 6, 'PU Sandals', 6, 100, 'Enabled'),
(28, 6, 'PU Sandals', 7, 100, 'Enabled'),
(29, 6, 'PU Sandals', 8, 100, 'Enabled'),
(30, 7, 'PU Sandals', 4, 100, 'Enabled'),
(31, 7, 'PU Sandals', 5, 100, 'Enabled'),
(32, 7, 'PU Sandals', 6, 100, 'Enabled'),
(33, 7, 'PU Sandals', 7, 100, 'Enabled'),
(34, 7, 'PU Sandals', 8, 100, 'Enabled'),
(35, 8, 'Sports Sandals', 40, 100, 'Enabled'),
(36, 8, 'Sports Sandals', 41, 100, 'Enabled'),
(37, 8, 'Sports Sandals', 42, 100, 'Enabled'),
(38, 8, 'Sports Sandals', 43, 100, 'Enabled'),
(39, 8, 'Sports Sandals', 44, 100, 'Enabled'),
(40, 8, 'Sports Sandals', 45, 100, 'Enabled'),
(41, 10, 'rubber slipper', 5, 100, 'Enabled'),
(42, 10, 'rubber slipper', 6, 100, 'Enabled'),
(43, 10, 'rubber slipper', 7, 100, 'Enabled'),
(44, 10, 'rubber slipper', 8, 100, 'Enabled'),
(45, 11, 'solid slipper', 6, 97, 'Enabled'),
(46, 11, 'solid slipper', 7, 99, 'Enabled'),
(47, 11, 'solid slipper', 8, 99, 'Enabled'),
(48, 11, 'solid slipper', 9, 77, 'Enabled'),
(49, 11, 'solid slipper', 10, 100, 'Enabled'),
(50, 11, 'solid slipper', 11, 100, 'Enabled'),
(51, 11, 'solid slipper', 12, 100, 'Enabled'),
(52, 12, 'solid slipper', 6, 100, 'Enabled'),
(53, 12, 'solid slipper', 7, 100, 'Enabled'),
(54, 12, 'solid slipper', 8, 100, 'Enabled'),
(55, 12, 'solid slipper', 9, 100, 'Enabled'),
(56, 12, 'solid slipper', 10, 100, 'Enabled'),
(57, 12, 'solid slipper', 11, 100, 'Enabled'),
(58, 12, 'solid slipper', 12, 100, 'Enabled'),
(59, 13, 'sneakers', 6, 58, 'Enabled'),
(60, 13, 'sneakers', 7, 99, 'Enabled'),
(61, 13, 'sneakers', 8, 98, 'Enabled'),
(62, 13, 'sneakers', 9, 78, 'Enabled'),
(63, 13, 'sneakers', 10, 99, 'Enabled'),
(64, 14, 'sneakers', 6, 100, 'Enabled'),
(65, 14, 'sneakers', 7, 100, 'Enabled'),
(66, 14, 'sneakers', 8, 100, 'Enabled'),
(67, 14, 'sneakers', 9, 100, 'Enabled'),
(68, 14, 'sneakers', 10, 100, 'Enabled'),
(69, 15, 'Fancy slipper', 6, 100, 'Enabled'),
(70, 15, 'Fancy slipper', 7, 100, 'Enabled'),
(71, 15, 'Fancy slipper', 8, 100, 'Enabled'),
(72, 15, 'Fancy slipper', 9, 100, 'Enabled'),
(73, 15, 'Fancy slipper', 10, 100, 'Enabled'),
(74, 16, 'Normal slipper', 6, 100, 'Enabled'),
(75, 16, 'Normal slipper', 7, 100, 'Enabled'),
(76, 16, 'Normal slipper', 8, 100, 'Enabled'),
(77, 16, 'Normal slipper', 9, 100, 'Enabled'),
(78, 16, 'Normal slipper', 10, 100, 'Enabled'),
(79, 17, 'Running Shoes', 6, 100, 'Enabled'),
(80, 17, 'Running Shoes', 7, 100, 'Enabled'),
(81, 17, 'Running Shoes', 8, 100, 'Enabled'),
(82, 17, 'Running Shoes', 9, 100, 'Enabled'),
(83, 17, 'Running Shoes', 10, 100, 'Enabled'),
(84, 18, 'Sports sandals', 2, 100, 'Enabled'),
(85, 18, 'Sports sandals', 3, 100, 'Enabled'),
(86, 18, 'Sports sandals', 4, 100, 'Enabled'),
(87, 18, 'Sports sandals', 5, 100, 'Enabled'),
(88, 19, 'Running Slipper', 2, 100, 'Enabled'),
(89, 19, 'Running Slipper', 3, 100, 'Enabled'),
(90, 19, 'Running Slipper', 4, 100, 'Enabled'),
(91, 19, 'Running Slipper', 5, 100, 'Enabled'),
(92, 20, 'sneakers', 3, 100, 'Enabled'),
(93, 20, 'sneakers', 4, 100, 'Enabled'),
(94, 20, 'sneakers', 5, 100, 'Enabled'),
(95, 20, 'sneakers', 6, 100, 'Enabled'),
(96, 21, 'slipper', 5, 100, 'Enabled'),
(97, 21, 'slipper', 6, 100, 'Enabled'),
(98, 21, 'slipper', 7, 100, 'Enabled'),
(99, 21, 'slipper', 8, 100, 'Enabled'),
(100, 22, 'casual Slipper', 5, 100, 'Enabled'),
(101, 22, 'casual Slipper', 6, 100, 'Enabled'),
(102, 22, 'casual Slipper', 7, 100, 'Enabled'),
(103, 22, 'casual Slipper', 8, 100, 'Enabled'),
(104, 25, 'Insoles', 6, 100, 'Enabled'),
(105, 25, 'Insoles', 7, 100, 'Enabled'),
(106, 25, 'Insoles', 8, 100, 'Enabled'),
(107, 25, 'Insoles', 9, 100, 'Enabled'),
(108, 27, 'cushion', 6, 100, 'Enabled'),
(109, 27, 'cushion', 7, 100, 'Enabled'),
(110, 27, 'cushion', 8, 100, 'Enabled'),
(111, 27, 'cushion', 9, 100, 'Enabled'),
(112, 23, 'cushion', 6, 100, 'Enabled'),
(113, 23, 'cushion', 7, 100, 'Enabled'),
(114, 23, 'cushion', 8, 100, 'Enabled'),
(115, 23, 'cushion', 9, 100, 'Enabled'),
(116, 24, 'Insoles', 6, 100, 'Enabled'),
(117, 24, 'Insoles', 7, 100, 'Enabled'),
(118, 24, 'Insoles', 8, 100, 'Enabled'),
(119, 24, 'Insoles', 9, 100, 'Enabled'),
(120, 28, 'casual', 6, 100, 'Enabled'),
(121, 28, 'casual', 7, 100, 'Enabled'),
(122, 28, 'casual', 8, 100, 'Enabled'),
(123, 28, 'casual', 9, 100, 'Enabled'),
(124, 29, 'casual', 6, 100, 'Enabled'),
(125, 29, 'casual', 7, 100, 'Enabled'),
(126, 29, 'casual', 8, 100, 'Enabled'),
(127, 29, 'casual', 9, 100, 'Enabled'),
(128, 30, 'Sports Shoes', 6, 100, 'Enabled'),
(129, 30, 'Sports Shoes', 7, 100, 'Enabled'),
(130, 30, 'Sports Shoes', 8, 100, 'Enabled'),
(131, 30, 'Sports Shoes', 9, 100, 'Enabled'),
(132, 31, 'sneakers', 6, 100, 'Enabled'),
(133, 31, 'sneakers', 7, 100, 'Enabled'),
(134, 31, 'sneakers', 8, 100, 'Enabled'),
(135, 31, 'sneakers', 9, 100, 'Enabled');

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `refund_id` int(5) NOT NULL,
  `order_id` int(3) NOT NULL,
  `request_date` date NOT NULL DEFAULT current_timestamp(),
  `refund_date` date DEFAULT NULL,
  `refund_reason` text NOT NULL,
  `refund_amt` int(5) NOT NULL,
  `refund_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `refund`
--

INSERT INTO `refund` (`refund_id`, `order_id`, `request_date`, `refund_date`, `refund_reason`, `refund_amt`, `refund_status`) VALUES
(2, 76, '2024-04-01', '0000-00-00', 'wrong color', 520, 'pending'),
(3, 79, '2024-03-29', '2024-04-05', 'Wrong product', 369, 'done'),
(4, 82, '2024-04-02', '0000-00-00', 'defected product', 620, 'pending'),
(5, 85, '2024-04-03', '2024-04-05', 'Wrong size', 580, 'done'),
(12, 86, '2024-04-04', '2024-04-05', 'Wrong product', 924, 'done'),
(13, 80, '2024-04-04', '2024-04-05', 'Wrong product', 1049, 'done');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(5) NOT NULL,
  `fname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `PAN` varchar(10) DEFAULT NULL,
  `gender` varchar(6) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `pin` int(7) NOT NULL,
  `city` varchar(20) NOT NULL,
  `registration_date` date NOT NULL DEFAULT current_timestamp(),
  `usr_status` varchar(8) NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `fname`, `lname`, `email`, `phone`, `PAN`, `gender`, `pass`, `address`, `pin`, `city`, `registration_date`, `usr_status`) VALUES
(1, 'Admin', 'admin', 'admin890@gmail.com', 8799553322, NULL, 'male', '$2y$10$yzXoNvFu8nO6Rac7EotuUebOpSAFyQ2aouH3ejGPy7Y5q6A4H7.Iy', '18,Parth Society,Bapunagar,Baroda', 385960, 'Ahmedabad', '2024-01-26', 'Active'),
(27, 'Harsh', 'wadhwani', 'harshwadhwani268@gmail.com', 8799553324, '', 'male', '$2y$10$P1Mw2q5LkisxRtGrDf/OA.YxeJrbWgOc13aw5E3gIPd1suiObyAOC', '18,Parth Society,Bapunagar,Baroda', 382350, 'Ahmedabad', '2024-01-26', 'Active'),
(30, 'bhavesh', 'parwani', 'bhaveshparwani1373@gmail.com', 7405567768, NULL, 'male', '$2y$10$LOEr6WmNfWG/Te1l3sB4TeteDpKd6a4E.FEekq//egDatO2Gl1khS', '18,Parth Society,Bapunagar,Baroda', 382350, 'Ahmedabad', '2024-01-26', 'Active'),
(32, 'Om', 'Kumar', 'omk738774@gmail.com', 9693808798, NULL, 'male', '$2y$10$1NwvbzoGId6g46wH6tcyiepkmfKCLlPDP8aGv8M.2PjlXTuDWDcPu', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 380009, 'ahmedabad', '2024-04-03', 'Active'),
(33, 'Kruparth', 'Kanzariya', 'kruparth1610@gmail.com', 7874773789, NULL, 'male', '$2y$10$Qm7yo6a4zX8yBOLQ2.ClCe2Icmf.0HU1vaLsVwddxj0TvZRKdufsm', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 380009, 'ahmedabad', '2024-04-03', 'Active'),
(34, 'Jatin', 'Kanzariya', 'jatink123@gmail.com', 8525652312, NULL, 'male', '$2y$10$50wEMuKk5IWWJtC2SVAGV.e7ylQx7z.Kd97ksdxXWl5pEcVcLMyuC', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 380009, 'ahmedabad', '2024-04-03', 'Active'),
(35, 'Rohan', 'Rathod', 'rohanrathod@gmail.com', 8465993321, NULL, 'male', '$2y$10$zgaAos.mGvn3dfOuZfCkBuUWF2o0dUs6B.S7ciYNzlttH8Xnysb/m', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 380009, 'ahmedabad', '2024-04-03', 'Active'),
(36, 'Saurabh', 'Garg', 'saurabh@gmail.com', 9098653311, NULL, 'male', '$2y$10$j1SUWfY8ZHd7syqMDsaILenDLxlCUR8tQout3smpvtIyTQq/6Z39e', '2nd floor, sharad apartment, behind pratistha 20 near mocha cafe c.a. circle , navrangpura, ahmedabad', 380009, 'ahmedabad', '2024-04-03', 'Active'),
(37, 'Rashmika', 'Mandana', 'rashmi.m@gmail.com', 8092792055, NULL, 'female', '$2y$10$2z1F2Ic4wcFCi89xywMwxukEKJPeIxTidirWIvQbqA0FnC8y/c/cm', 'HN-49, Shivpuri colony, Bistupur', 831001, 'Jamshedpur', '2024-04-03', 'Active'),
(38, 'Rocky', 'Bhai', 'rocky12@gmail.com', 7788994455, NULL, 'male', '$2y$10$UZJ5CtWPLRNl8IRNWlGvHel1ISxjMPZ45Q9llKho0SIp8uLFrprg6', 'Kolar Gold Field', 542210, 'rejiansi', '2024-04-03', 'Active'),
(39, 'Kashyap', 'kanzariya', 'kruparth2000@gmail.com', 9546541254, NULL, 'male', '$2y$10$8v4Co7b0x04oyL/9UBFWUuX/F4Qadgbn.NIOxjVvK2Y5lSrRt9qcK', 'nava amrapar Halvad', 380009, 'Ahmedabad', '2024-04-04', 'Active');

-- --------------------------------------------------------

--
-- Structure for view `category wise`
--
DROP TABLE IF EXISTS `category wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `category wise`  AS SELECT `category`.`category_id` AS `category_id`, `category`.`Category_name` AS `Category_name`, `category`.`Category_desc` AS `Category_desc`, `product`.`product_name` AS `product_name`, `product`.`price` AS `price` FROM (`product` join `category` on(`category`.`category_id` = `product`.`Category_ID`)) ;

-- --------------------------------------------------------

--
-- Structure for view `offer expiration wise`
--
DROP TABLE IF EXISTS `offer expiration wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `offer expiration wise`  AS SELECT `offer`.`offer_id` AS `offer_id`, `offer`.`offer_name` AS `offer_name`, `offer`.`offer_details` AS `offer_details`, `offer`.`offer_percent` AS `offer_percent`, `offer`.`offer_start_date` AS `offer_start_date`, `offer`.`offer_end_date` AS `offer_end_date` FROM `offer` WHERE `offer`.`offer_end_date` < curdate() ;

-- --------------------------------------------------------

--
-- Structure for view `offer status wise`
--
DROP TABLE IF EXISTS `offer status wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `offer status wise`  AS SELECT `offer`.`offer_id` AS `offer_id`, `offer`.`offer_name` AS `offer_name`, `offer`.`offer_details` AS `offer_details`, `offer`.`offer_status` AS `offer_status`, `offer`.`offer_percent` AS `offer_percent`, `offer`.`offer_start_date` AS `offer_start_date`, `offer`.`offer_end_date` AS `offer_end_date` FROM `offer` ;

-- --------------------------------------------------------

--
-- Structure for view `order date wise`
--
DROP TABLE IF EXISTS `order date wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order date wise`  AS SELECT `order_tbl`.`order_id` AS `order_id`, `order_tbl`.`user_id` AS `user_id`, `order_tbl`.`order_date` AS `order_date`, `order_tbl`.`order_status` AS `order_status`, `order_tbl`.`order_amount` AS `order_amount`, `order_detail`.`quantity` AS `quantity`, `order_detail`.`rate` AS `rate`, `order_detail`.`size` AS `size`, `order_detail`.`color` AS `color`, `order_detail`.`discount` AS `discount`, `order_detail`.`amount` AS `amount` FROM (`order_tbl` join `order_detail` on(`order_tbl`.`order_id` = `order_detail`.`order_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `order sales`
--
DROP TABLE IF EXISTS `order sales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `order sales`  AS SELECT year(`order_tbl`.`order_date`) AS `Year`, month(`order_tbl`.`order_date`) AS `Month`, sum(`order_tbl`.`order_amount`) AS `Total Sales` FROM `order_tbl` GROUP BY month(`order_tbl`.`order_date`) ;

-- --------------------------------------------------------

--
-- Structure for view `payment datewise`
--
DROP TABLE IF EXISTS `payment datewise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment datewise`  AS SELECT `payment`.`transaction_id` AS `transaction_id`, `payment`.`order_id` AS `order_id`, `payment`.`payment_mode` AS `payment_mode`, `payment`.`payment_date` AS `payment_date`, `payment`.`payment_status` AS `payment_status` FROM `payment` ;

-- --------------------------------------------------------

--
-- Structure for view `payment mode wise`
--
DROP TABLE IF EXISTS `payment mode wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `payment mode wise`  AS SELECT `payment`.`transaction_id` AS `transaction_id`, `order_tbl`.`fname` AS `fname`, `order_tbl`.`lname` AS `lname`, `order_tbl`.`order_date` AS `order_date`, `order_tbl`.`order_amount` AS `order_amount`, `payment`.`payment_mode` AS `payment_mode`, `payment`.`payment_date` AS `payment_date`, `payment`.`payment_status` AS `payment_status` FROM (`payment` join `order_tbl` on(`order_tbl`.`order_id` = `payment`.`order_id`)) ;

-- --------------------------------------------------------

--
-- Structure for view `product group wise`
--
DROP TABLE IF EXISTS `product group wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product group wise`  AS SELECT `product`.`Product_id` AS `Product_id`, `product`.`grp` AS `grp`, `product`.`product_name` AS `product_name`, `product`.`product_details` AS `product_details`, `product`.`price` AS `price`, `product`.`actual_price` AS `actual_price` FROM `product` ;

-- --------------------------------------------------------

--
-- Structure for view `product namewise report`
--
DROP TABLE IF EXISTS `product namewise report`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product namewise report`  AS SELECT `product`.`Product_id` AS `Product_id`, `product`.`grp` AS `grp`, `product`.`product_name` AS `product_name`, `product`.`product_details` AS `product_details`, `product`.`price` AS `price`, `product`.`actual_price` AS `actual_price` FROM (`product` join `product_desc`) ;

-- --------------------------------------------------------

--
-- Structure for view `product order wise`
--
DROP TABLE IF EXISTS `product order wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product order wise`  AS SELECT `order_detail`.`product_id` AS `product_id`, `product`.`product_name` AS `product_name`, `product`.`price` AS `price`, count(`order_detail`.`product_id`) AS `count` FROM ((`order_detail` join `order_tbl` on(`order_tbl`.`order_id` = `order_detail`.`order_id`)) join `product` on(`product`.`Product_id` = `order_detail`.`product_id`)) GROUP BY `order_detail`.`product_id` ORDER BY count(`order_detail`.`product_id`) DESC ;

-- --------------------------------------------------------

--
-- Structure for view `product price wise`
--
DROP TABLE IF EXISTS `product price wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product price wise`  AS SELECT `product`.`Product_id` AS `Product_id`, `product`.`grp` AS `grp`, `product`.`product_name` AS `product_name`, `product`.`product_details` AS `product_details`, `product_desc`.`product_type` AS `product_type`, `product_desc`.`size` AS `size`, `product_desc`.`quantity` AS `quantity`, `product`.`price` AS `price` FROM ((`product` join `color` on(`product`.`Product_id` = `color`.`product_id`)) join `product_desc` on(`color`.`cid` = `product_desc`.`cid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `product status wise`
--
DROP TABLE IF EXISTS `product status wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product status wise`  AS SELECT `product`.`Product_id` AS `Product_id`, `product`.`grp` AS `grp`, `product`.`product_name` AS `product_name`, `product`.`price` AS `price`, `product_desc`.`product_type` AS `product_type`, `product_desc`.`size` AS `size`, `product_desc`.`quantity` AS `quantity`, `color`.`color` AS `color`, `image`.`Image_path1` AS `Image_path1`, `image`.`Image_path2` AS `Image_path2`, `image`.`Image_path3` AS `Image_path3`, `image`.`Image_path4` AS `Image_path4`, `product`.`pro_status` AS `pro_status` FROM (((`product` join `color` on(`product`.`Product_id` = `color`.`product_id`)) join `product_desc` on(`color`.`cid` = `product_desc`.`cid`)) join `image` on(`color`.`cid` = `image`.`cid`)) ;

-- --------------------------------------------------------

--
-- Structure for view `product wise`
--
DROP TABLE IF EXISTS `product wise`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `product wise`  AS SELECT `product`.`Product_id` AS `Product_id`, `product`.`grp` AS `grp`, `product`.`product_name` AS `product_name`, `product`.`product_details` AS `product_details`, `product`.`price` AS `price`, `product`.`actual_price` AS `actual_price`, `product_desc`.`product_type` AS `product_type`, `product_desc`.`size` AS `size`, `product_desc`.`quantity` AS `quantity`, `color`.`color` AS `color`, `image`.`Image_path1` AS `Image_path1`, `image`.`Image_path2` AS `Image_path2`, `image`.`Image_path3` AS `Image_path3`, `image`.`Image_path4` AS `Image_path4` FROM (((`product` join `color` on(`product`.`Product_id` = `color`.`product_id`)) join `product_desc` on(`color`.`cid` = `product_desc`.`cid`)) join `image` on(`color`.`cid` = `image`.`cid`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`cartID`),
  ADD KEY `cart_forei` (`user_id`),
  ADD KEY `pro_forei` (`product_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`cid`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `prod_for` (`product_id`),
  ADD KEY `forei_user` (`user_id`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Image_ID`),
  ADD KEY `img_forei` (`cid`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`offer_id`);

--
-- Indexes for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`orderdetail_id`),
  ADD KEY `prodID_for` (`product_id`),
  ADD KEY `orderid_forei` (`order_id`);

--
-- Indexes for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_fore` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transaction_id`),
  ADD KEY `pay_fore` (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_id`),
  ADD KEY `fore_category` (`Category_ID`),
  ADD KEY `offf_forei` (`offer_id`);

--
-- Indexes for table `product_desc`
--
ALTER TABLE `product_desc`
  ADD PRIMARY KEY (`prodesc_ID`),
  ADD KEY `prodesc_fore` (`cid`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`refund_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `cartID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `color`
--
ALTER TABLE `color`
  MODIFY `cid` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Image_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `offer_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `orderdetail_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `product_desc`
--
ALTER TABLE `product_desc`
  MODIFY `prodesc_ID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `refund_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD CONSTRAINT `cart_forei` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `pro_forei` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `forei_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`),
  ADD CONSTRAINT `prod_for` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `image`
--
ALTER TABLE `image`
  ADD CONSTRAINT `img_forei` FOREIGN KEY (`cid`) REFERENCES `color` (`cid`);

--
-- Constraints for table `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `orderid_forei` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `prodID_for` FOREIGN KEY (`product_id`) REFERENCES `product` (`Product_id`);

--
-- Constraints for table `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `user_fore` FOREIGN KEY (`user_id`) REFERENCES `user` (`userID`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `pay_fore` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fore_category` FOREIGN KEY (`Category_ID`) REFERENCES `category` (`category_id`),
  ADD CONSTRAINT `offf_forei` FOREIGN KEY (`offer_id`) REFERENCES `offer` (`offer_id`);

--
-- Constraints for table `product_desc`
--
ALTER TABLE `product_desc`
  ADD CONSTRAINT `prodesc_fore` FOREIGN KEY (`cid`) REFERENCES `color` (`cid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
