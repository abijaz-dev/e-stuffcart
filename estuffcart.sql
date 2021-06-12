-- phpMyAdmin SQL Dump 
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2021 at 12:46 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estuffcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) UNSIGNED NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer & Accessories ', '2021-05-31 13:19:38', '2021-05-31 13:19:38'),
(2, 'Home & appliances ', '2021-05-31 13:20:18', '2021-05-31 13:20:18'),
(3, 'Mobile Phones & Laptops ', '2021-05-31 13:20:37', '2021-05-31 13:20:37'),
(4, 'Cosmetic ', '2021-05-31 13:20:57', '2021-05-31 13:20:57'),
(5, 'Electronics ', '2021-05-31 13:21:03', '2021-05-31 13:21:03'),
(6, 'Clothes & Dressings ', '2021-05-31 13:23:45', '2021-05-31 13:23:45');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `quantity` tinyint(11) UNSIGNED NOT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `image_id` int(11) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `quantity`, `category_id`, `image_id`, `created_at`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '45.20', 0, 6, 1, '2021-05-31 13:25:26', '2021-05-31 13:25:26'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '80.20', 0, 5, 1, '2021-05-31 13:26:33', '2021-05-31 13:26:33'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '40.20', 0, 6, 1, '2021-05-31 13:26:54', '2021-05-31 13:26:54'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '45.20', 0, 4, 1, '2021-05-31 13:27:20', '2021-05-31 13:27:20'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '60.56', 0, 4, 1, '2021-05-31 13:27:36', '2021-05-31 13:27:36'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '30.20', 0, 6, 1, '2021-05-31 13:28:13', '2021-05-31 13:28:13'),
(8, '\r\nLorem ipsum dolor sit amet, consectetur adipisci', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor i', '32.20', 0, 2, 1, '2021-05-31 13:28:33', '2021-05-31 13:28:33'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '20.00', 0, 6, 1, '2021-06-07 12:32:50', '2021-06-07 12:32:50'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '60.56', 0, 6, 1, '2021-06-07 12:33:23', '2021-06-07 12:33:23'),
(11, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Et', '49.20', 0, 6, 1, '2021-06-07 12:33:47', '2021-06-07 12:33:47'),
(12, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Et', '30.20', 0, 6, 1, '2021-06-07 12:34:06', '2021-06-07 12:34:06'),
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '32.00', 0, 6, 1, '2021-06-07 12:34:34', '2021-06-07 12:34:34'),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '34.00', 0, 6, 1, '2021-06-07 12:34:48', '2021-06-07 12:34:48'),
(15, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '65.00', 0, 6, 1, '2021-06-07 12:35:00', '2021-06-07 12:35:00'),
(16, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '19.00', 0, 6, 1, '2021-06-07 12:35:21', '2021-06-07 12:35:21'),
(17, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '78.00', 0, 6, 1, '2021-06-07 12:35:34', '2021-06-07 12:35:34'),
(18, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '54.00', 0, 6, 1, '2021-06-07 12:35:47', '2021-06-07 12:35:47'),
(19, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '34.90', 0, 6, 1, '2021-06-07 12:37:29', '2021-06-07 12:37:29'),
(20, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '43.98', 0, 6, 1, '2021-06-07 12:37:53', '2021-06-07 12:37:53'),
(21, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '12.94', 0, 6, 1, '2021-06-07 12:38:07', '2021-06-07 12:38:07'),
(22, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '62.94', 0, 6, 1, '2021-06-07 12:38:45', '2021-06-07 12:38:45'),
(23, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '10.65', 0, 6, 1, '2021-06-07 12:38:59', '2021-06-07 12:38:59'),
(24, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '24.49', 0, 6, 1, '2021-06-07 12:39:14', '2021-06-07 12:39:14'),
(25, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '45.71', 0, 6, 1, '2021-06-07 12:40:57', '2021-06-07 12:40:57'),
(26, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '60.56', 0, 6, 1, '2021-06-07 12:41:07', '2021-06-07 12:41:07'),
(27, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '80.20', 0, 6, 1, '2021-06-07 12:41:23', '2021-06-07 12:41:23'),
(28, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '30.20', 0, 6, 1, '2021-06-07 12:41:42', '2021-06-07 12:41:42'),
(29, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '32.00', 0, 6, 1, '2021-06-07 12:41:55', '2021-06-07 12:41:55'),
(30, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '10.65', 0, 6, 1, '2021-06-07 12:42:10', '2021-06-07 12:42:10'),
(31, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '43.98', 0, 6, 1, '2021-06-07 12:42:33', '2021-06-07 12:42:33'),
(32, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '54.90', 0, 6, 1, '2021-06-07 12:42:50', '2021-06-07 12:42:50'),
(33, 'Lorem ipsum dolor sit amet, consectetur adipiscing', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer eget rutrum augue, nec ullamcorper libero. Sed consectetur orci eget laoreet laoreet. Curabitur tempor id massa hendrerit eleifend. Etiam pellentesque nibh sit amet augue ultricies gravida. ', '90.32', 0, 6, 1, '2021-06-07 12:43:12', '2021-06-07 12:43:12');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'product', '2021-05-31 13:25:05', '2021-05-31 13:25:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `image_id` (`image_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`image_id`) REFERENCES `product_images` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;