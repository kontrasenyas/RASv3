-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 20, 2016 at 01:52 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rentaservice`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `ContactName` varchar(255) NOT NULL,
  `ContactNo` varchar(255) NOT NULL,
  `isReadOwner` tinyint(1) NOT NULL DEFAULT '0',
  `ProductID` int(11) NOT NULL,
  `DateCreated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `Code`, `ContactName`, `ContactNo`, `isReadOwner`, `ProductID`, `DateCreated`) VALUES
(1, 'Dddd111_57b844513cd58', 'aSDASDdad', 'Dddd111', 0, 2, '2016-08-20 11:51:45');

-- --------------------------------------------------------

--
-- Table structure for table `booking_notifications`
--

CREATE TABLE `booking_notifications` (
  `id` int(11) NOT NULL,
  `Code` varchar(255) NOT NULL,
  `isReadClient` tinyint(1) NOT NULL DEFAULT '0',
  `isReadClientDate` datetime NOT NULL,
  `isReadOwner` tinyint(1) NOT NULL DEFAULT '0',
  `isOwnerDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking_notifications`
--

INSERT INTO `booking_notifications` (`id`, `Code`, `isReadClient`, `isReadClientDate`, `isReadOwner`, `isOwnerDate`) VALUES
(1, 'Dddd111_57b844513cd58', 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `car_types`
--

CREATE TABLE `car_types` (
  `id` int(11) NOT NULL,
  `CarType` varchar(255) NOT NULL,
  `Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `car_types`
--

INSERT INTO `car_types` (`id`, `CarType`, `Count`) VALUES
(1, 'SUV', 0),
(2, 'VAN', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@johirent.com', '6da587cd696cc1c4f36f4e0d800920f6a0a2773026d510d8293efe566c537973', '2016-07-27 03:53:49');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `Title` varchar(255) NOT NULL,
  `Capacity` int(11) NOT NULL,
  `Price` varchar(255) NOT NULL,
  `Brand` varchar(255) NOT NULL,
  `EmailAddress` varchar(255) NOT NULL,
  `Province` varchar(255) NOT NULL,
  `Details` varchar(255) NOT NULL,
  `DateCreated` datetime NOT NULL,
  `ProductType` varchar(255) NOT NULL,
  `Photo1` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `Title`, `Capacity`, `Price`, `Brand`, `EmailAddress`, `Province`, `Details`, `DateCreated`, `ProductType`, `Photo1`) VALUES
(2, 'asdasdsa', 12, '12', 'adsdas', 'admin@johirent.com', 'dasd', 'adsdas', '2016-07-31 06:02:54', 'SUV', '1469944974.png'),
(4, 'asdsadasdas', 12, '12', 'sadasdasd', 'admin@johirent.com', 'dasd', 'sadasdasd', '2016-07-31 06:04:36', 'SUV', '1469945076.png'),
(5, 'asdddd', 1, '', 'dasdsa', 'admin@johirent.com', 'dasd', 'dasdsadsa', '2016-07-31 12:31:05', 'SUV', '1469968265.png');

-- --------------------------------------------------------

--
-- Table structure for table `provinces`
--

CREATE TABLE `provinces` (
  `id` int(11) NOT NULL,
  `ProvinceName` varchar(255) NOT NULL,
  `Count` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `provinces`
--

INSERT INTO `provinces` (`id`, `ProvinceName`, `Count`) VALUES
(1, 'CAVITE', 0),
(2, 'TARLAC', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `MobileNo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Photo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Municipality` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `StreetNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `Province` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `MobileNo`, `Photo`, `Municipality`, `StreetNo`, `Province`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@johirent.com', '$2y$10$X5zQykc40GrKHlgHCU59bOku9mFaKH9A7sO/UcVmWo6.5KeP2MOpi', '', '1469964749.png', 'das', 'asd', 'dasd', 'wRUgpr6neRap0soG3PPfSoeT4CVI2xhyKoJYbNXSztSFRqzhPZPno6cMzZyd', '2016-07-26 22:07:54', '2016-07-31 03:32:29'),
(2, 'test', 'test@johirent.com.ph', '$2y$10$ldNoeAsq32W79YDOdUcUFu8KkSe6.uWsPotn2gvTRuHlc4lqjkPjO', '09055290793', '', '', '', '', 'XLkGRdGLewACBPd0vfpKteM8wGn14nQ9tgefrzEHlTiDCHXegJsSx9Tw42Ly', '2016-07-26 22:30:04', '2016-07-26 22:36:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_notifications`
--
ALTER TABLE `booking_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `provinces`
--
ALTER TABLE `provinces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `booking_notifications`
--
ALTER TABLE `booking_notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `provinces`
--
ALTER TABLE `provinces`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
