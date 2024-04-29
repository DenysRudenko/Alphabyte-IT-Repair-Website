-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Creation time: Apr 29, 2024, 03:20
-- Server version: 8.0.36
-- PHP version: 8.1.10


SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- "Database: php_project".
--

-- --------------------------------------------------------

--
--  "Structure of the admins table".
--

CREATE TABLE `admins` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(250) NOT NULL,
  `admin_email` varchar(250) NOT NULL,
  `admin_password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- "Data dump of the admins table".
--

INSERT INTO `admins` (`admin_id`, `admin_name`, `admin_email`, `admin_password`) VALUES
(1, 'admin', 'admin@test.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- "Structure of the orders table".
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `order_amount` decimal(10,2) NOT NULL,
  `order_status` varchar(100) NOT NULL DEFAULT 'on_hold',
  `user_id` int NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_city` varchar(255) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `order_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- "Data dump of the orders table".
--

INSERT INTO `orders` (`order_id`, `order_amount`, `order_status`, `user_id`, `user_phone`, `user_city`, `user_address`, `order_date`) VALUES
(1, 240.00, 'paid', 1, '0506385323', 'KYIV', 'Semirenko 31, 109', '2024-04-28 17:45:03'),
(2, 270.00, 'not paid', 1, '0873813060', 'Carrickmacross', 'Alderwood 14', '2024-04-28 18:12:10');

-- --------------------------------------------------------

--
-- "Structure of the order_items table".
--

CREATE TABLE `order_items` (
  `item_id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_quantity` int NOT NULL,
  `user_id` int NOT NULL,
  `order_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- "Data dump of the order_items table".
--

INSERT INTO `order_items` (`item_id`, `order_id`, `product_id`, `product_name`, `product_image`, `product_price`, `product_quantity`, `user_id`, `order_date`) VALUES
(1, 1, 3, 'MSI GeForce RTX 3060', 'MSI GeForce RTX 3060.jpg', 240.00, 1, 1, '2024-04-28 17:45:03'),
(2, 2, 2, 'Gigabyte GeForce RTX 3070', 'Gigabyte GeForce RTX 3070.jpg', 270.00, 1, 1, '2024-04-28 18:12:10');

-- --------------------------------------------------------

--
-- "Structure of the payments table".
--

CREATE TABLE `payments` (
  `payment_id` int NOT NULL,
  `order_id` int NOT NULL,
  `user_id` int NOT NULL,
  `transaction_id` varchar(250) NOT NULL,
  `payment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump of the payments table".
--

INSERT INTO `payments` (`payment_id`, `order_id`, `user_id`, `transaction_id`, `payment_date`) VALUES
(1, 1, 1, '1VW399316F200863G', '2024-04-28 18:03:54');

-- --------------------------------------------------------

--
-- Structure of the payments `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_category` varchar(108) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_image2` varchar(255) DEFAULT NULL,
  `product_image3` varchar(255) DEFAULT NULL,
  `product_image4` varchar(255) DEFAULT NULL,
  `product_price` decimal(6,2) NOT NULL,
  `product_special_offer` int DEFAULT NULL,
  `product_color` varchar(108) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Data dump of the products table".
--

INSERT INTO `products` (`product_id`, `product_name`, `product_category`, `product_description`, `product_image`, `product_image2`, `product_image3`, `product_image4`, `product_price`, `product_special_offer`, `product_color`) VALUES
(1, 'Gigabyte GeForce RTX 4070', 'gpus', 'Gigabyte GeForce RTX 4070 WINDFORCE OC 12GB Graphics Card - 12GB DDRX6 21Gbps, PCI-E 4.0, DisplayPort 1.4, HDMI 2.1a, NVIDIA DLSS 3, Ada Lovelace Arch, GV-N4070WF3OC-12GD', '4070_1.png', '4070_2.png', '4070_3.png', '4070_4.png', 300.00, 0, 'black'),
(2, 'Gigabyte GeForce RTX 3070', 'gpus', 'Gigabyte GeForce RTX 3070 GAMING OC 8GB V2 LHR Graphics Card\r\nGraphics co-processor Graphics RAM size	8 GB\r\nGPU clock speed	1815 MHz', '3070_1.png', '3070_2.png', '3070_3.png', '3070_4.png', 270.00, 20, 'black'),
(3, 'MSI GeForce RTX 3060', 'gpus', 'MSI GeForce RTX 3060 VENTUS 2X 12G OC Gaming Graphics Card - 12GB GDDR6, 1807 MHz, PCI Express Gen 4, 192-bit, 3x DP (v1.4), HDMI 2.1 (Supports 4K)', '3060_1.png', '3060_2.png', '3060_3.png', '3060_4.png', 240.00, 10, 'black'),
(4, 'MSI NVIDIA GeForce GTX 1070', 'gpus', 'MSI NVIDIA GeForce GTX 1070 Ti GAMING 8G 8 GB GDDR5 PCI Express Graphics Card - Black Graphics co-processor	Nvidia Brand MSI Graphics, RAM size	8 MB, GPU clock speed 1607 MHz', '1070_1.png', '1070_2.png', '1070_3.png', '1070_4.png', 220.00, 30, 'red'),
(5, 'AMD Ryzen 5 4600G', 'cpus', 'AMD Ryzen 5 4600G CPU, AM4, 3.7GHz (4.2 Turbo), 6-Core, 65W, 11MB Cache, 7nm, 4th Gen, Radeon Graphics, PCI-E 4.0, DisplayPort 1.4, HDMI 2.1a, NVIDIA DLSS 3, Ada Lovelace Arch, GV-N4070WF3OC-12GD', '4600_1.png', '4600_2.png', '4600_3.png', '4600_4.png', 200.00, 0, 'black'),
(6, 'AMD Ryzen 7 7800X3D', 'cpus', 'AMD Ryzen 7 7800X3D Desk-top Processor (8-core/16-thread, 104MB cache, up to 5.0 GHz max boost)', '7800_1.png', '7800_2.png', '7800_3.png', '7800_4.png', 400.00, 0, 'black'),
(7, 'AMD Ryzen 7 8700G', 'cpus', 'AMD Ryzen 7 8700G Retail Wraith Stealth - (AM5/8 Core/4.20GHz/24MB/65W/Radeon 780M)', '8700_1.png', '8700_2.png', '8700_3.png', '8700_4.png', 350.00, 0, 'black'),
(8, 'Intel Core  i7-12700KF', 'cpus', 'Intel® Core™ i7-12700KF Desktop Processor 12 (8P+4E) Cores up to 5.0 GHz Unlocked LGA1700 600 Series Chipset 125W', '12700_1.png', '12700_2.png', '12700_3.png', '12700_4.png', 250.00, 0, 'black'),
(9, 'ASUS ROG Strix B650-A', 'motherboards', 'ASUS ROG Strix B650-A Gaming WiFi AMD Ryzen AM5 ATX motherboard, 12 + 2 power stages, DDR5, three M.2 slots, PCIe 4.0, 2.5G LAN, WiFi 6E, USB 3.2 Gen 2x2 Type-C port, and Aura Sync RGB', 'b650_1 (1).png', 'b650_2 (1).png', 'b650_3 (2).png', 'b650_4 (1).png', 450.00, 0, 'white'),
(10, 'ASUS TUF Gaming B550-PLUS', 'motherboards', 'ASUS TUF Gaming B550-PLUS (WI-FI II), AMD B550 (Ryzen AM4) ATX motherboard (PCIe 4.0, dual M.2, 10 DrMOS, DDR4 4400, Intel® WiFi 6, 2.5 Gb Ethernet, HDMI, DisplayPort, USB 3.2 Gen 2 Type-A and Type-C)', 'b550_1.png', 'b550_2.png', 'b505_3.png', 'b550_4.png', 350.00, 10, 'black'),
(11, 'Gigabyte B650', 'motherboards', 'Gigabyte B650 GAMING X AX V2 Motherboard - Supports AMD Ryzen 8000 CPUs, 8+2+2 Phases Digital VRM, up to 8000MHz DDR5 (OC), 1xPCIe 5.0 + 2xPCIe 4.0 M.2, Wi-Fi 6E 802.11ax, 2.5GbE LAN, USB 3.2 Gen 2', 'b650_1.png', 'b650_2.png', 'b650_3.png', 'b650_4.png', 350.00, 0, 'black'),
(12, 'Gigabyte Z790', 'motherboards', 'Gigabyte Z790 AORUS ELITE AX Motherboard - Supports Intel Core 14th CPUs, Phases Digital VRM, up to 7600MHz DDR5 (OC), 4xPCIe 4.0 M.2, Wi-Fi 6E, 2.5GbE LAN, USB 3.2 Gen 2x2', '790_1.png', '790_1.png', '790_2.png', '790_3.png', 300.00, 0, 'black');

-- --------------------------------------------------------

--
-- Structure of the payments `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(108) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- "Data dump of the users table".
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_password`) VALUES
(1, 'denys', 'denys@test.com', 'e10adc3949ba59abbe56e057f20f883e');

--
-- "Indexes of saved tables".
--

--
-- "Indexes of the admins table".
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- "Indexes of the orders table".
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes of the orders `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`item_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes of the orders `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes of the orders `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes of the orders `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `UX_Constraint` (`user_email`);

--
-- AUTO_INCREMENT
--

--
-- AUTO_INCREMENT `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT  `order_items`
--
ALTER TABLE `order_items`
  MODIFY `item_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT  `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- "Foreign key constraints of saved tables".
--

--
-- "Foreign key constraints of the orders table".
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- "Foreign key constraints of the order_items table".
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- "Foreign key constraints of the payments table".
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
