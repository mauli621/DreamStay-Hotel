-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2025 at 05:52 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`) VALUES
(1, 'mauli', '12345'),
(2, 'khushali', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `dining_bookings`
--

CREATE TABLE `dining_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `guest_name` varchar(150) NOT NULL,
  `dining_date` date NOT NULL,
  `dining_time` time NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `dinning_area` enum('Indoor','Outdoor') NOT NULL,
  `special_instruction` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending Payment','Confirmed','Cancelled') DEFAULT 'Pending Payment',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `dining_bookings`
--

INSERT INTO `dining_bookings` (`id`, `user_id`, `service_id`, `guest_name`, `dining_date`, `dining_time`, `number_of_guests`, `dinning_area`, `special_instruction`, `total_amount`, `status`, `created_at`) VALUES
(1, 9, 8, 'tank khushali', '2025-09-10', '12:18:00', 12, 'Indoor', 'no', 6600.00, 'Pending Payment', '2025-09-09 06:04:21'),
(2, 9, 8, 'tank khushali', '2025-09-10', '12:37:00', 12, 'Indoor', 'no', 6600.00, 'Confirmed', '2025-09-09 06:07:47'),
(3, 9, 8, 'vaishnvi kapuriya', '2025-09-24', '12:52:00', 2, 'Indoor', 'noooooo', 1100.00, 'Confirmed', '2025-09-09 15:23:00'),
(4, 9, 8, 'Mauli bhanderi', '2025-09-12', '12:03:00', 10, 'Indoor', 'nothing', 5500.00, 'Pending Payment', '2025-09-09 15:33:38'),
(5, 9, 8, 'vaishnvi kapuriya', '2025-09-26', '00:08:00', 4, 'Indoor', 'nothinggg', 2200.00, 'Pending Payment', '2025-09-09 15:34:20'),
(6, 9, 8, 'vaishnvi kapuriya', '2025-09-06', '12:14:00', 7, 'Indoor', 'yesss', 3850.00, 'Pending Payment', '2025-09-09 15:41:03'),
(7, 9, 8, 'hinali dobariya', '2025-09-24', '21:28:00', 2, 'Indoor', 'nooo', 1100.00, 'Pending Payment', '2025-09-09 15:56:14'),
(8, 9, 9, 'vaishnvi kapuriya', '2025-09-25', '23:30:00', 8, 'Indoor', 'noooooo', 3600.00, 'Pending Payment', '2025-09-09 15:58:45'),
(9, 9, 9, 'dxg', '2025-09-19', '23:38:00', 1, 'Indoor', 'mauliiii', 450.00, 'Pending Payment', '2025-09-09 16:05:47'),
(10, 9, 9, 'hinali dobariya', '2025-09-11', '12:43:00', 2, 'Indoor', 'nooo', 900.00, 'Confirmed', '2025-09-09 16:13:26');

-- --------------------------------------------------------

--
-- Table structure for table `event_bookings`
--

CREATE TABLE `event_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `guest_name` varchar(100) NOT NULL,
  `event_date` date NOT NULL,
  `event_time` time NOT NULL,
  `number_of_guests` int(11) NOT NULL,
  `catering_option` enum('Yes','No') DEFAULT 'No',
  `instructions` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending Payment','Confirmed','Cancelled') DEFAULT 'Pending Payment',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_bookings`
--

INSERT INTO `event_bookings` (`id`, `user_id`, `event_id`, `guest_name`, `event_date`, `event_time`, `number_of_guests`, `catering_option`, `instructions`, `total_amount`, `status`, `created_at`) VALUES
(1, 9, 10, 'tank khushali', '2025-09-06', '20:03:00', 120, 'Yes', 'no', 2880000.00, 'Pending Payment', '2025-09-05 12:33:43'),
(2, 9, 10, 'tank khushali', '2025-09-06', '19:04:00', 120, 'Yes', 'no', 2880000.00, 'Pending Payment', '2025-09-05 12:35:02'),
(3, 9, 10, 'tank khushali', '2025-09-06', '19:21:00', 123, 'Yes', 'yes', 2952000.00, 'Pending Payment', '2025-09-05 12:51:33'),
(4, 9, 11, 'tank khushali', '2025-09-06', '18:28:00', 67, 'Yes', 'no', 335000.00, 'Pending Payment', '2025-09-05 12:56:16'),
(5, 9, 10, 'tank khushali', '2025-09-06', '20:27:00', 12, 'Yes', 'no', 288000.00, 'Pending Payment', '2025-09-05 12:57:36'),
(6, 9, 14, 'tank khushali', '2025-09-02', '12:30:00', 123, 'No', 'thank you', 688800.00, 'Pending Payment', '2025-09-08 05:00:27'),
(7, 9, 11, 'tank khushali', '2025-09-09', '11:39:00', 5, 'Yes', 'no', 25000.00, 'Pending Payment', '2025-09-08 05:10:06'),
(8, 9, 11, 'tank khushali', '2025-09-09', '12:53:00', 12, 'Yes', 'no', 60000.00, 'Confirmed', '2025-09-08 05:23:45'),
(9, 9, 14, 'vaishnvi kapuriya', '2025-09-20', '19:00:00', 8, 'Yes', 'nooo', 44800.00, 'Pending Payment', '2025-09-09 14:27:50'),
(10, 9, 10, 'Mauli bhanderi', '2025-09-20', '20:57:00', 70, 'Yes', 'nothing', 1680000.00, 'Confirmed', '2025-09-09 15:24:15'),
(11, 9, 11, 'Mauli bhanderi', '2025-09-26', '00:07:00', 23, 'No', 'nothingggg', 115000.00, 'Confirmed', '2025-09-09 15:34:58'),
(12, 9, 10, 'hinali dobariya', '2025-09-18', '01:15:00', 6, 'Yes', 'yessss', 144000.00, 'Confirmed', '2025-09-09 15:41:38'),
(13, 9, 14, 'hinali dobariya', '2025-09-12', '12:15:00', 1, 'Yes', 'no', 5600.00, 'Confirmed', '2025-09-09 15:42:55'),
(14, 9, 11, 'hinali dobariya', '2025-09-19', '13:36:00', 32, 'No', 'nmkol', 160000.00, 'Confirmed', '2025-09-09 16:06:20'),
(15, 9, 10, 'hinali dobariya', '2025-09-18', '20:28:00', 12, 'No', 'nothhinggg', 288000.00, 'Confirmed', '2025-09-10 11:55:39');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `subject` text DEFAULT NULL,
  `message` text DEFAULT NULL,
  `submitted_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `name`, `email`, `subject`, `message`, `submitted_at`) VALUES
(9, 'gautami Kakadiya', 'gatukakadiya890@gmail.com', 'Corporate Event Hall Availability', 'Hello DreamStay Team, we’re looking to host a corporate seminar for 50 guests on 25th November 2025. Kindly provide details on hall capacity, AV equipment, catering options, and pricing.', '2025-09-05 03:44:39'),
(10, 'Hinali Dobariya', 'hinu123@yahoo.com', 'Wedding Package Inquiry', 'Hi, I’m exploring venues for my wedding in January 2026. Could you send me details about your wedding packages, decoration themes, and guest accommodation options?', '2025-09-05 03:45:40'),
(11, 'Dhruvi K', 'dk789@gmail.com', 'Dining Reservation for Family Dinner', 'Good evening! I’d like to reserve a table for 8 people on 5th September 2025 for a family celebration. Do you offer any special menus or private dining arrangements?', '2025-09-05 03:46:42'),
(12, 'Mahek Thesiya', 'mahek@outllook.com', 'Spa and Wellness Booking', 'Hello, I’m interested in booking a spa session during my stay next weekend. Please share available treatments, timings, and pricing for couples.', '2025-09-05 03:47:40'),
(13, 'Bhumi Kothari', 'bhumi@gmail.com', 'Long-Term Stay Discounts', 'Hi there! I’m planning a 3-week business trip to your city and considering DreamStay for accommodation. Do you offer any long-stay discounts or corporate packages?', '2025-09-05 03:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `meeting_bookings`
--

CREATE TABLE `meeting_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `meeting_date` date NOT NULL,
  `meeting_time` time NOT NULL,
  `number_of_attendees` int(11) NOT NULL,
  `av_equipment` enum('Yes','No') NOT NULL,
  `special_instruction` text DEFAULT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `status` enum('Pending Payment','Confirmed','Cancelled') DEFAULT 'Pending Payment',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `meeting_bookings`
--

INSERT INTO `meeting_bookings` (`id`, `user_id`, `service_id`, `company_name`, `meeting_date`, `meeting_time`, `number_of_attendees`, `av_equipment`, `special_instruction`, `total_amount`, `status`, `created_at`) VALUES
(1, 9, 13, 'qtonz', '2025-09-03', '11:00:00', 12, 'No', 'no', 54000.00, 'Pending Payment', '2025-09-09 04:31:01'),
(2, 9, 12, 'qtonz', '2025-09-10', '11:14:00', 10, 'No', 'no', 35000.00, 'Confirmed', '2025-09-09 04:44:42'),
(3, 9, 13, 'DMV PERMIT TEST', '2025-09-10', '11:28:00', 10, 'Yes', 'no', 45000.00, 'Confirmed', '2025-09-09 04:58:24'),
(4, 9, 12, 'emipro', '2025-09-10', '12:31:00', 15, 'Yes', 'no', 52500.00, 'Confirmed', '2025-09-09 05:02:16'),
(5, 9, 13, 'emipro', '2025-09-10', '11:36:00', 5, 'Yes', 'no', 22500.00, 'Confirmed', '2025-09-09 05:06:18'),
(6, 9, 13, 'TechTrend', '2025-09-24', '19:56:00', 15, 'Yes', 'no', 67500.00, 'Confirmed', '2025-09-09 14:25:05'),
(7, 9, 13, 'Boat Gaming', '2025-09-19', '21:05:00', 10, 'Yes', 'nothinnngggggsss', 45000.00, 'Confirmed', '2025-09-09 15:35:46'),
(8, 9, 13, 'Boat Gaming', '2025-09-19', '12:16:00', 50, 'Yes', 'nothig', 225000.00, 'Confirmed', '2025-09-09 15:43:47'),
(9, 9, 13, 'TechTrend', '2025-09-06', '12:21:00', 89, 'No', 'kolpol', 400500.00, 'Confirmed', '2025-09-09 15:48:58'),
(10, 9, 13, 'TechTrend', '2025-09-24', '09:20:00', 2, 'No', 'nmmkkooo', 9000.00, 'Confirmed', '2025-09-09 15:50:22'),
(11, 9, 13, 'Team Panthar', '2025-09-25', '21:25:00', 8, 'Yes', 'nooooo', 36000.00, 'Confirmed', '2025-09-09 15:52:23'),
(12, 9, 12, 'TechTrend', '2025-09-11', '12:23:00', 11, 'Yes', 'noooo', 38500.00, 'Pending Payment', '2025-09-09 15:53:31'),
(13, 9, 13, 'TechTrend', '2025-09-19', '13:24:00', 9, 'Yes', 'kkkkk', 40500.00, 'Pending Payment', '2025-09-09 15:54:24'),
(14, 9, 12, 'TechTrend', '2025-09-25', '11:26:00', 8, 'Yes', 'nooo', 28000.00, 'Confirmed', '2025-09-09 15:55:12'),
(15, 9, 13, 'DreamStay', '2025-09-26', '12:39:00', 6, 'No', 'nothing', 27000.00, 'Confirmed', '2025-09-09 16:07:05');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `booking_id` int(11) NOT NULL,
  `booking_type` enum('room','event','meeting','dining') NOT NULL,
  `user_id` int(11) NOT NULL,
  `method` varchar(50) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Failed') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `booking_id`, `booking_type`, `user_id`, `method`, `amount`, `status`, `created_at`) VALUES
(1, 21, 'room', 9, 'upi', 2500.00, 'Completed', '2025-09-05 11:26:31'),
(2, 0, 'room', 9, 'upi', 0.00, 'Completed', '2025-09-05 12:51:47'),
(3, 8, 'event', 9, 'card', 60000.00, 'Completed', '2025-09-08 05:24:13'),
(13, 10, 'event', 9, 'bank', 1680000.00, 'Completed', '2025-09-09 15:32:16'),
(14, 11, 'event', 9, 'upi', 115000.00, 'Completed', '2025-09-09 15:35:08'),
(16, 12, 'event', 9, 'card', 144000.00, 'Completed', '2025-09-09 15:42:13'),
(17, 13, 'event', 9, 'bank', 5600.00, 'Completed', '2025-09-09 15:43:06'),
(23, 14, 'event', 9, 'upi', 160000.00, 'Completed', '2025-09-09 16:06:28'),
(24, 15, 'meeting', 9, 'upi', 27000.00, 'Completed', '2025-09-09 16:07:15'),
(25, 10, 'dining', 9, 'bank', 900.00, 'Completed', '2025-09-09 16:13:38'),
(26, 26, 'room', 9, 'bank', 5000.00, 'Completed', '2025-09-10 06:06:24'),
(27, 27, 'room', 9, 'upi', 8800.00, 'Completed', '2025-09-10 11:54:51'),
(28, 15, 'event', 9, 'card', 288000.00, 'Completed', '2025-09-10 11:56:00'),
(29, 28, 'room', 9, 'upi', 2500.00, 'Completed', '2025-09-15 11:57:04'),
(30, 29, 'room', 14, 'card', 3500.00, 'Completed', '2025-09-27 13:13:11'),
(31, 30, 'room', 14, 'upi', 27000.00, 'Completed', '2025-09-27 14:18:27');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `bed_type` varchar(100) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `members` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `photo`, `name`, `bed_type`, `price`, `rating`, `amenities`, `members`, `description`) VALUES
(13, '1-standard_queen_room.jpg', 'Standard Queen Room', 'Double Bed', 2500, 5, 'AC, Wi-Fi, Mini Fridge', 3, 'The suite offers a king-size bed, executive desk, Nespresso machine, and a marble bathroom with a soaking tub. Ideal for longer stays or special occasions.'),
(15, '10-family_room.jpg', 'Family Room', 'Tripple bed', 3000, 5, 'AC, Wi-fi, RO', 5, 'Spacious and welcoming, the Family Suite is perfect for groups or families. It features two bedrooms — one with a king-size bed and one with two singles — plus a shared living area and dining space.'),
(16, '4-delux_double_room.jpg', 'Deluxe King Room', 'King Bed', 2500, 4, 'TV, BalconyView, AC', 2, 'Unwind in our spacious Deluxe King Room featuring a plush king-size bed, modern décor, and a private balcony with city views'),
(17, '7-studio_room.jpeg', 'Studio Room', 'Double Bed', 3500, 4, 'AC, Wi-fi, RO', 3, 'Ideal for friends or colleagues traveling together, the room also includes a sleek bathroom and a quiet work corner.'),
(19, '6-economy_double_room.jpg', 'Executive Suite', 'queen bed', 3400, 5, 'AC, Wi-Fi, SwimmingPool', 4, 'The suite offers a king-size bed, executive desk, Nespresso machine, and a marble bathroom with a soaking tub. Ideal for longer stays or special occasions.'),
(20, '11_honeymoon_suite.jpg', 'HoneyMoon Suite', 'King Size bed', 4500, 5, 'AC, Wi-Fi, SwimmingPool', 2, 'Experience the perfect blend of romance and luxury in our Honeymoon Suite. Designed with newlyweds and couples in mind, this spacious suite offers an intimate and elegant ambiance featuring a plush king-sized bed, a private balcony with breathtaking views.');

-- --------------------------------------------------------

--
-- Table structure for table `room_bookings`
--

CREATE TABLE `room_bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `room_id` int(11) DEFAULT NULL,
  `guest_name` varchar(255) DEFAULT NULL,
  `room_type` varchar(100) DEFAULT NULL,
  `arrival_date` date DEFAULT NULL,
  `departure_date` date DEFAULT NULL,
  `number_of_rooms` int(11) DEFAULT NULL,
  `number_of_guests` int(11) DEFAULT NULL,
  `contact_no` varchar(20) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('Pending Payment','Confirmed','Cancelled') DEFAULT 'Pending Payment',
  `total_amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_bookings`
--

INSERT INTO `room_bookings` (`id`, `user_id`, `room_id`, `guest_name`, `room_type`, `arrival_date`, `departure_date`, `number_of_rooms`, `number_of_guests`, `contact_no`, `comments`, `created_at`, `status`, `total_amount`) VALUES
(18, 10, 13, 'vaishnvi kapuriya', '', '2025-09-12', '2025-09-13', 1, 3, '6789067890', 'Is breakfast included in the room rate or charged separately?', '2025-09-05 03:53:06', 'Confirmed', 2500.00),
(19, 10, 15, 'hinali dobariya', '', '2025-09-11', '2025-09-13', 2, 5, '9906789067', 'Can I cancel or modify my booking later?', '2025-09-05 03:54:18', 'Confirmed', 12000.00),
(20, 10, 16, 'Dhruvi Kalsariya', '', '2025-09-19', '2025-09-20', 2, 3, '90890678987', 'Is parking available at the property, and is it free?', '2025-09-05 03:55:42', 'Confirmed', 4400.00),
(21, 9, 13, 'tank khushali', '', '2025-09-06', '2025-09-07', 1, 2, '1234567890', 'thank you', '2025-09-05 11:26:16', 'Confirmed', 2500.00),
(22, 9, 15, 'vaishnvi kapuriya', '', '2025-09-13', '2025-09-20', 2, 4, '778899999', 'nnnnnn', '2025-09-09 08:24:42', 'Confirmed', 42000.00),
(23, 9, 16, 'Mauli bhanderi', '', '2025-09-26', '2025-09-29', 1, 2, '9906789067', 'hjjuiiobb  njikio', '2025-09-09 08:29:08', 'Pending Payment', 6600.00),
(24, 9, 17, 'Mauli bhanderi', '', '2025-09-27', '2025-09-24', 2, 2, '1234567890', 'no', '2025-09-09 14:01:19', 'Pending Payment', 21000.00),
(25, 9, 17, 'Mauli bhanderi', '', '2025-09-27', '2025-09-24', 2, 2, '1234567890', 'no', '2025-09-09 14:02:14', 'Confirmed', 21000.00),
(26, 9, 13, 'mahek', '', '2025-09-17', '2025-09-19', 1, 1, '35778698990', 'no', '2025-09-10 06:05:40', 'Confirmed', 5000.00),
(27, 9, 16, 'Dhruvi Kalsariya', '', '2025-09-23', '2025-09-25', 2, 2, '35778698990', 'noooo', '2025-09-10 11:54:33', 'Confirmed', 8800.00),
(28, 9, 13, 'hinali dobariya', '', '2025-09-17', '2025-09-16', 1, 2, '9906789067', 'no', '2025-09-15 11:56:48', 'Confirmed', 2500.00),
(29, 14, 17, 'mauli', '', '2025-09-30', '2025-10-01', 1, 2, '9906789067', 'nothing', '2025-09-27 13:12:35', 'Confirmed', 3500.00),
(30, 14, 15, 'virat kohli', '', '2025-10-18', '2025-10-27', 1, 4, '9696969685', 'no', '2025-09-27 14:17:38', 'Confirmed', 27000.00);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `type` enum('meeting','dining','event') NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `rating` float DEFAULT 0,
  `location` varchar(255) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `amenities` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `type`, `title`, `description`, `rating`, `location`, `price`, `amenities`, `image`, `created_at`) VALUES
(8, 'dining', 'Causual-Dining', 'Step into a relaxed and cozy atmosphere where comfort meets flavor. Our Casual Dining space is perfect for families, friends, or business lunches, offering a wide range of cuisines prepared with fresh, locally sourced ingredients.', 4, 'Near The Benquet', '550', 'Comfortable family-friendly ambiance ,  High-speed Wi-Fi', '1756138328_casual-dinning.jpg', '2025-08-25 16:12:08'),
(9, 'dining', 'RoofTop Dining', 'Indulge in a feast of flavors with our grand Buffet Style Dining. From international cuisines to regional specialties, our buffet showcases live cooking counters, decadent desserts, and a rotating menu that caters to every taste.', 5, 'On The Terrace', '450', 'High-speed Wi-Fi, Table reservation facility', '1756138467_rooftop-dinning.jpg', '2025-08-25 16:14:27'),
(10, 'event', 'Grand Weddings', 'Celebrate your special day in grandeur with our exquisite wedding arrangements. From elegant décor to gourmet catering, we ensure every detail is crafted with perfection to create unforgettable memories.', 5, 'In Ground', '24000', 'Luxury bridal suite & guest rooms,  Live music & dance floor', '1756179728_marriage.jpg', '2025-08-26 03:42:08'),
(11, 'event', 'BirthDay Party', 'Make your birthday celebrations fun, vibrant, and memorable at our hotel. Whether it’s a kid’s birthday bash, a milestone birthday, or a surprise party, we bring your ideas to life with exciting themes, décor, and entertainment.', 4, 'In The Benquet', '5000', 'Themed décor & lighting,  Customized birthday cake & catering', '1756179813_birthday.jpg', '2025-08-26 03:43:33'),
(12, 'meeting', 'Board-Room Meeting', 'Designed for corporate discussions and executive meetings, our board room provides a professional and private environment. Equipped with modern technology and elegant interiors.', 5, 'In The Club House', '5000', 'High-speed Wi-Fi connectivity,  Projector/LED screen & presentation', '1756180092_board-room-style-meeting.jpg', '2025-08-26 03:48:12'),
(13, 'meeting', 'Theater-Style-Meeting', 'Ideal for conferences, and product launches, our theater meeting setup accommodates a larger audience. With tiered seating and professional AV equipment, it creates the perfect atmosphere for impactful sessions.', 5, 'In Benquet', '4500', 'Wireless microphones ,  Lighting & stage arrangements', '1756180274_theater-style-meeting.jpg', '2025-08-26 03:51:14'),
(14, 'event', 'Elegant Engagement ', 'Your Elegant Engagement with us and make your moment more special and elegent.', 5, 'Near The Benquet', '5600', 'Free Music/Band, Theme Decoration', '1756375550_engagement.jpg', '2025-08-28 10:05:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(15) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `mobile_number`, `password`, `created_at`) VALUES
(9, 'tank', 'khushali', 'khushali@gmail.com', '1234567890', '$2y$10$3piWQbVN2O.vBxA0.54ES.eykNhw5InYFGoKReYb9XHtZPF8Sf7yi', '2025-08-04 05:45:07'),
(12, 'dobariya', 'hinali', 'hinali@gmail.com', '1234567899', '$2y$10$7mc6j1VKMms.fD6u/SsWDep2CwPIELrXnzbJ3Fqs7cdsM5LN72aUC', '2025-09-01 02:17:31'),
(13, 'mauli', 'bhanderi', 'm@gmail.com', '7016448228', '$2y$10$6AMxXdPPWDFUUPFXEcp/Keio88cykTuF2GZeVbH/kydSoSDvtVPsu', '2025-09-04 15:27:48'),
(14, 'mauli', 'bhanderi', 'm07@gmail.com', '5678956789', '$2y$10$tAO.gqqYwuZHYd8VCVwKg.afvWgFEN3kL8uszq1NHvXR.z2MFRuMC', '2025-09-27 13:09:21');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `dining_bookings`
--
ALTER TABLE `dining_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `event_id` (`event_id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `service_id` (`service_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `room_bookings`
--
ALTER TABLE `room_bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `dining_bookings`
--
ALTER TABLE `dining_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `room_bookings`
--
ALTER TABLE `room_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dining_bookings`
--
ALTER TABLE `dining_bookings`
  ADD CONSTRAINT `dining_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dining_bookings_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD CONSTRAINT `event_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_bookings_ibfk_2` FOREIGN KEY (`event_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `meeting_bookings`
--
ALTER TABLE `meeting_bookings`
  ADD CONSTRAINT `meeting_bookings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `meeting_bookings_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
