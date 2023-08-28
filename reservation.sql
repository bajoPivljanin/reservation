-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2023 at 12:53 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `created_at`) VALUES
(1, 'BBQ', '2023-08-27 17:06:57'),
(2, 'juices', '2023-08-27 17:07:17'),
(3, 'salats', '2023-08-27 17:07:17'),
(4, 'deserts', '2023-08-27 17:07:25');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `product_description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `product_name`, `price`, `product_description`, `image`, `created_at`) VALUES
(2, 1, 'pljeskavica', '400', '200g mesa, lepinja, prilozi po izboru', 'burger.jpg', '2023-08-25 19:39:45'),
(3, 2, 'coca cola', '100', '0.33 i 0.5', 'zero.jpg', '2023-08-25 19:50:53'),
(4, 3, 'Cezar salata', '800', 'belo meso,salata,sos', 'burger.jpg', '2023-08-27 16:30:35'),
(5, 4, 'torta', '250', 'cokolada,orasi,maline', 'burger.jpg', '2023-08-27 16:32:06'),
(6, 2, 'Sprite', '100', '0.33 i 0.5', 'sprajt.jpg', '2023-08-27 16:35:55'),
(7, 2, 'Fanta', '100', '0.33 i 0.5', 'fantasok.webp', '2023-08-27 16:38:46'),
(11, 2, 'sok', '100', '0.33 i 0.5', 'spritesok.jpg', '2023-08-27 17:48:16');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservation_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_time` time NOT NULL,
  `persons` varchar(255) NOT NULL,
  `reservation_note` varchar(255) NOT NULL,
  `reservation_name` varchar(255) NOT NULL,
  `access_card_pdf_path` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `user_id`, `reservation_date`, `reservation_time`, `persons`, `reservation_note`, `reservation_name`, `access_card_pdf_path`, `created_at`) VALUES
(1, 1, '2023-08-20', '22:19:00', '5', 'no smoking', 'marko', 'access_cards/access_cards_marko.pdf', '2023-08-20 22:19:35'),
(2, 2, '2023-08-21', '21:21:50', '4', 'none', 'milos', 'access_cards/access_cards_milos.pdf', '2023-08-20 23:08:17'),
(4, 1, '2023-08-21', '00:40:00', '3', 'none', 'neko ime', 'access_cards/access_cards_neko ime.pdf', '2023-08-20 23:40:08'),
(5, 1, '2023-08-21', '00:40:00', '3', 'none', 'neko ime', '', '2023-08-20 23:41:46');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(11) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `first_name`, `last_name`, `username`, `phone_number`, `email`, `password`, `is_admin`, `created_at`) VALUES
(1, 'Marko', 'Bajagic', 'marko', '0616443350', 'marko@marko.com', '$2y$10$V6HBkVPYh0qCMczi/iNkOuN6XEwJpWsr9SltOOLO3iXEFxEnR1gbm', 0, '2023-08-20 21:40:25'),
(2, 'Milos', 'Antunovic', 'losmi', '6560656516', 'losmi@losmi.com', '', 0, '2023-08-20 23:07:38'),
(3, 'admin', 'admin', 'admin', '06544651', 'admin@admin.com', '$2y$10$dItekmw49MpWdvbFHeNx6ecI/TkN9SGosX7eLQ1/aMoudw3GC64FK', 1, '2023-08-21 12:06:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
