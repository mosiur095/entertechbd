-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2021 at 09:05 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `entertech`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `name`, `email`, `phone`, `password`, `location`, `role`) VALUES
(1, 'mosiur', 'mosiur@gmail.com', '01792788718', '$2y$10$lTTIweqRq5cJCCa7.cgWiePtI6YkLBUaI93GHzMmcVEXH73EF8TzO', 'Rangpur', 'customer'),
(2, 'test', 'test@gmail.com', '123456', '$2y$10$ESAIvn/7lcby.BXXRkxc0.Ahl6nFue3xuaIPd2DXyR69/pDTE8NLi', 'Chittagong', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `unite_price` varchar(255) NOT NULL,
  `disscount` varchar(255) NOT NULL,
  `total_price` int(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `order_by` varchar(255) NOT NULL,
  `cus_contact` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `product_id`, `unite_price`, `disscount`, `total_price`, `status`, `order_by`, `cus_contact`, `created_at`) VALUES
(1, '14', '350', '0', 350, 'delivered', 'mosiur@gmail.com', '01792788718', '2021-12-17 18:00:14'),
(4, '17', '450', '0', 450, 'transit', 'mosiur@gmail.com', '01792788718', '2021-12-17 17:35:15'),
(5, '17', '450', '113', 337, 'delivered', 'mosiur@gmail.com', '01792788718', '2021-12-17 18:00:17'),
(6, '14', '350', '0', 350, 'submitted', 'mosiur@gmail.com', '01792788718', '2021-12-17 19:27:17');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `product_img` varchar(255) NOT NULL,
  `unite_price` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `product_img`, `unite_price`, `location`, `created_at`) VALUES
(14, 'product 2', '1639743715.jpg', '350', 'Chittagong', '2021-12-17 17:57:17'),
(16, 'product 3', '1639756947.jpg', '400', 'Barisal', '2021-12-17 17:57:09'),
(17, 'product 4', '1639756968.jpg', '450', 'Rangpur', '2021-12-17 16:02:48'),
(18, 'product 5', '1639756993.jpg', '250', 'Dhaka', '2021-12-17 16:03:13'),
(19, 'product 6', '1639757057.jpg', '241', 'Dhaka', '2021-12-17 17:40:03'),
(20, 'product 7', '1639757080.jpg', '458', 'Rajshahi', '2021-12-17 17:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `role`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$09QdMT49.XsgSEkpMTGS/uHPXvtDDMmzun/tuBspBdM33Z3t3snp2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
