-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2024 at 06:03 AM
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
-- Database: `rare`
--

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `id` int(5) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `brand_image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`id`, `brand`, `brand_image`, `status`) VALUES
(5, 'Rare.Nomad', 'brand_a406b3b895324afb_1734089458.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(5) NOT NULL,
  `category` varchar(255) NOT NULL,
  `number` int(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`, `number`, `image`, `status`) VALUES
(6, 'Oversized T-shirts', 10, '../uploads/category_6766737701fc8_1734767479.jpeg', 1),
(7, 'Hoodies', 10, '../uploads/category_6766738cbe726_1734767500.jpeg', 1),
(8, 'T-shirts', 20, '../uploads/category_676673a585fa9_1734767525.jpeg', 1),
(9, 'women T-shirt', 50, '../uploads/category_676673c248938_1734767554.jpg', 1),
(11, 'Comfortable clothing', 20, '../uploads/carousel-3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gallery_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `gallery_name`, `image_path`, `created_at`) VALUES
(1, '2', '../uploads/car1.jpeg', '2024-11-23 09:46:17');

-- --------------------------------------------------------

--
-- Table structure for table `information`
--

CREATE TABLE `information` (
  `id` int(11) NOT NULL,
  `header_logo` varchar(255) DEFAULT NULL,
  `footer_logo` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL,
  `location` text DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `twitter_link` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `instagram_link` varchar(255) DEFAULT NULL,
  `linkedin_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `information`
--

INSERT INTO `information` (`id`, `header_logo`, `footer_logo`, `mobile_no`, `location`, `email`, `twitter_link`, `facebook_link`, `instagram_link`, `linkedin_link`, `created_at`, `updated_at`) VALUES
(3, 'Screenshot (1) - Copy - Copy - Copy.png', 'Screenshot (1) - Copy - Copy - Copy.png', '9327727605', 'FF/144, Broadway Signature, 30 MTR Sevasi Priya Talkies Canal Road, Sevasi, Vadodara, Gujarat - 391101', 'rarenomadfashion@gmail.com', '#', 'https://www.facebook.com/profile.php?id=61567376395726&mibextid=LQQJ4d', 'https://www.instagram.com/rare.nomad/profilecard/?igsh=MTc4d20xMGF2YTBtaA==', '##', '2024-11-19 05:06:00', '2024-12-02 23:20:08');

-- --------------------------------------------------------

--
-- Table structure for table `offer`
--

CREATE TABLE `offer` (
  `id` int(5) NOT NULL,
  `offer_price` varchar(255) NOT NULL,
  `image_paths` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offer`
--

INSERT INTO `offer` (`id`, `offer_price`, `image_paths`, `created_at`) VALUES
(11, '799', '../uploads/offer_676676c870f6a.jpg', '2024-12-21 08:05:28'),
(12, '800', '../uploads/offer_676676d14a25e.jpg', '2024-12-21 08:05:37'),
(13, '20', '../uploads/offer_676676deb6bb0.jpg', '2024-12-21 08:05:51');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `address1` varchar(255) NOT NULL,
  `address2` varchar(255) DEFAULT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `zip` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email`, `mobile`, `address1`, `address2`, `country`, `city`, `state`, `zip`, `payment_method`, `total`, `product_name`, `payment_status`, `payment_id`, `created_at`) VALUES
(43, 'Cairo', 'Kelly', 'zoqirav@mailinator.com', 'Ducimus non dolorum', '399 East First Boulevard', 'Sed enim quam irure ', 'India', 'Laborum laboriosam ', 'Exercitation exercit', '57276', 'cod', 54.00, '', 'completed', '', '2024-12-02 23:45:45'),
(44, '', '', '', '', '', '', 'Country', '', '', '', 'razorpay', 45.00, '', 'pending', '', '2024-12-03 19:25:30'),
(45, '', '', '', '', '', '', 'Country', '', '', '', 'razorpay', 45.00, '', 'pending', '', '2024-12-03 19:27:32'),
(46, 'Marah', 'Blackwell', 'jexikocybi@mailinator.com', 'Nesciunt asperiores', '414 First Street', 'Consectetur suscipi', 'Albania', 'Accusamus anim eum t', 'Autem quo esse dolo', '82838', 'razorpay', 6.00, '', 'pending', '', '2024-12-03 20:49:19');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `rating` decimal(3,1) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `sales` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `specification` text NOT NULL,
  `image_paths` varchar(255) NOT NULL,
  `image2_paths` varchar(255) NOT NULL,
  `shippingPrice` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `product_price`, `discount_price`, `rating`, `brand`, `color`, `size`, `category`, `gender`, `product_type`, `sales`, `description`, `specification`, `image_paths`, `image2_paths`, `shippingPrice`) VALUES
(170, 'Huddy', 599.00, 499.00, 5.0, '5', 'White', 'XL', '6', 'Male', '', '', '', '', '../uploads/1734767663_category_6766738cbe726_1734767500.jpeg', '', '100'),
(171, 'Oversized Tees', 599.00, 499.00, 5.0, '5', 'White', 'XXL', '6', 'Male', '', '', '', '', '../uploads/103.jpeg', '', '100'),
(172, 'Zahir Curry', 492.00, 931.00, 2.0, '5', 'Black', 'XL', '7', 'Unisex', '', '', '', '', '../uploads/IMG-20241221-WA0007.jpg', '', '291'),
(173, 'Huddy', 599.00, 499.00, 5.0, '5', 'White', 'XXL', '6', 'Male', '', '', '', '', '../uploads/IMG-20241221-WA0008.jpg', '', '100'),
(174, 'T-Shirt', 200.00, 150.00, 5.0, '5', 'red', 'XXL', '8', 'Male', '', '', '', '', '../uploads/IMG-20241221-WA0009.jpg', '', '52'),
(175, 'Huddy', 599.00, 499.00, 5.0, '5', 'red', 'XL', '7', 'Male', '', '', '', '', '../uploads/IMG-20241221-WA0010.jpg', '', '100');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `slider_name` varchar(255) NOT NULL,
  `video` varchar(255) DEFAULT NULL,
  `image_paths` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_name`, `video`, `image_paths`, `created_at`) VALUES
(21, 'Women Fashion', '../uploads/1734089754_Beige Minimalist Fashion Discount Instagram Post.mp4', '../uploads/1734768374_IMG-20241221-WA0013.jpg', '2024-11-19 11:41:15'),
(22, 'Men Fashion', NULL, '../uploads/carousel-1.jpg', '2024-11-19 11:41:38'),
(23, 'Kids Fashion', NULL, '../uploads/carousel-3.jpg', '2024-11-19 11:42:05');

-- --------------------------------------------------------

--
-- Table structure for table `user1`
--

CREATE TABLE `user1` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zipcode` varchar(20) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `address_line1` varchar(255) DEFAULT NULL,
  `address_line2` varchar(255) DEFAULT NULL,
  `mobile_no` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user1`
--

INSERT INTO `user1` (`id`, `email`, `password`, `first_name`, `last_name`, `state`, `zipcode`, `city`, `country`, `address_line1`, `address_line2`, `mobile_no`) VALUES
(1, 'admin@gmail.com', '$2y$10$vLLqFtKcVemp49gNdU33SO82T7.FBRgL6yUuevYafmhqbB/TZN066', 'vipin', 'tiwari', 'Uttar Pradesh', '274401', 'Kushinagar', 'India', 'Mahuawakata', 'Gorkhpur', '9648731132');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `otp` varchar(6) DEFAULT NULL,
  `otp_expiry` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `otp`, `otp_expiry`) VALUES
(1, 'codekey919@gmail.com', '$2y$10$HmxLZ4Bl4JwbNt2adKyNJ.KAJPAJojOCyNUFZNHtt8Fql3pulOn3W', NULL, NULL),
(2, 'admin@gmail.com', '$2y$10$v9OVnjgfVYoFTV4lL0./ieBNEj1VCp2xuo3gXzp5rhJpTp1ONnTgy', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `varriant`
--

CREATE TABLE `varriant` (
  `id` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `varriant`
--

INSERT INTO `varriant` (`id`, `name`, `color`, `size`, `status`) VALUES
(8, 'Oversized T-shirt', 'Red, Green, White, Black, Lavender', 'S,M,XL,XXL', 1),
(9, 'Classic T-shirt', 'Red, Green, White, Black, Lavender', 'S,M,XL,XXL', 1),
(10, 'Hoodies', 'Red, Green, White, Black, Lavender', 'S,M,XL,XXL', 1),
(11, 'Sweatshirts', 'Red, Green, White, Black, Lavender', 'S,M,XL,XXL', 1),
(12, 'Polo T-shirts', 'Red, Green, White, Black, Lavender', 'S,M,XL,XXL', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `information`
--
ALTER TABLE `information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offer`
--
ALTER TABLE `offer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user1`
--
ALTER TABLE `user1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `varriant`
--
ALTER TABLE `varriant`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `information`
--
ALTER TABLE `information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `offer`
--
ALTER TABLE `offer`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=177;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user1`
--
ALTER TABLE `user1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `varriant`
--
ALTER TABLE `varriant`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
