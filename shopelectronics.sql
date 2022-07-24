-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 09:36 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopelectronics`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `parent_category_id` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `parent_category_id`, `level`, `status`) VALUES
(1, 'electronics ', 0, 1, 1),
(3, 'TV/accessories ', 1, 2, 1),
(10, 'phone/accessories', 1, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `gender` varchar(20) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(255) NOT NULL,
  `user_roll` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `userName`, `password`, `email`, `phone`, `gender`, `dob`, `address`, `user_roll`, `create_at`, `status`) VALUES
(14, 'shiv sharma', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', 'admin@gmail.com', 9698587444, 'M', '2022-07-08', 'Kailash tower, Race coerce google', 'Admin', '2022-07-23 16:01:03', '1'),
(16, 'yogesh', 'mca123', 'e10adc3949ba59abbe56e057f20f883e', 'yoge@gmail.com', 6587458787, 'M', '2022-07-08', 'Kailash tower, Race coerce google', 'Manager', '2022-07-23 16:16:12', '1'),
(18, 'amit shah', 'amin12', 'e10adc3949ba59abbe56e057f20f883e', 'amit@gmail.com', 6985847858, 'M', '2022-07-14', 'Race coerce google de', 'Manager', '2022-07-24 06:08:31', '1'),
(19, 'karan dev', 'karan123', 'e10adc3949ba59abbe56e057f20f883e', 'karn@gmail.com', 9685985468, 'M', '2022-07-14', 'Race coerce google de', 'junior_employee', '2022-07-24 06:09:48', '1'),
(20, 'mukesh', 'mukesh', 'e10adc3949ba59abbe56e057f20f883e', 'mukesh@gmail.com', 9698587452, 'M', '2022-07-15', 'Kailash tower, Race coerce google', 'senior_employee', '2022-07-24 06:11:59', '1');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL,
  `description` longtext NOT NULL,
  `created_at` date NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `brand_id`, `category_id`, `image`, `description`, `created_at`, `updated_at`, `status`) VALUES
(1, 'mobile phone', '6000', 1, 10, '1.jpg', 'demo testing', '0000-00-00', '2022-07-24 04:58:43', 'yes'),
(2, 'mobile phone', '7000', 1, 10, '2.jpg', 'Google LLC is an American multinational technology company that focuses on artificial intelligence', '2022-07-24', '2022-07-24 07:28:58', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `products_assignment_category`
--

CREATE TABLE `products_assignment_category` (
  `category_assignment_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `status` enum('yes','yes') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_brand`
--

CREATE TABLE `tb_brand` (
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_name` varchar(100) NOT NULL,
  `status` enum('yes','no') NOT NULL DEFAULT 'yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_brand`
--

INSERT INTO `tb_brand` (`brand_id`, `category_id`, `brand_name`, `status`) VALUES
(1, 7, 'Samsung', 'yes'),
(2, 7, 'Apple', 'yes'),
(3, 7, 'LG', 'yes'),
(4, 7, 'MI', 'yes'),
(5, 15, 'Oppo', 'yes'),
(6, 15, 'Nokia', 'yes'),
(7, 15, 'L', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `status`) VALUES
(1, '', '', 'admin@gmail.com', '202cb962ac59075b964b07152d234b70', 1),
(2, 'vivek', 'goyal', 'gooyy@gail.com', '123456', 0),
(3, 'suman', 'shaarma', 'summ@gmail.com', '12456', 0),
(4, 'ajay', 'goyal', 'ajay@gail.com', '123456', 0),
(5, 'pankaj', 'shingh', 'pank@gmail.com', '12456', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `menu_id` int(11) NOT NULL,
  `menu_name` varchar(100) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`menu_id`, `menu_name`, `page_name`, `status`) VALUES
(1, 'Profile', 'profile.php', '1'),
(2, 'Employee List', 'employee-list.php', '1'),
(3, 'Master', '', '1'),
(4, 'Category', 'category-list.php', '1'),
(5, 'Product', 'product-list.php', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_roll`
--

CREATE TABLE `user_roll` (
  `roll_id` int(11) NOT NULL,
  `roll_name` varchar(50) NOT NULL,
  `create_at` date NOT NULL,
  `modify_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_roll`
--

INSERT INTO `user_roll` (`roll_id`, `roll_name`, `create_at`, `modify_at`) VALUES
(1, 'Admin', '2022-07-21', '2022-07-21 07:08:41'),
(2, 'Manager', '2022-07-21', '2022-07-21 07:08:41'),
(3, 'senior_employee', '2022-07-21', '2022-07-21 07:11:44'),
(4, 'junior_employee', '2022-07-21', '2022-07-21 07:11:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `products_assignment_category`
--
ALTER TABLE `products_assignment_category`
  ADD PRIMARY KEY (`category_assignment_id`);

--
-- Indexes for table `tb_brand`
--
ALTER TABLE `tb_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`menu_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products_assignment_category`
--
ALTER TABLE `products_assignment_category`
  MODIFY `category_assignment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_brand`
--
ALTER TABLE `tb_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
