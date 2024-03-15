-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 06, 2018 at 02:57 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tudoctorv2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `created_date`) VALUES
(1, '1536060644v1.png', '2018-09-04 11:30:45'),
(2, '1536060650v2.png', '2018-09-04 11:30:50'),
(3, '1536060656v3.png', '2018-09-04 11:30:56'),
(4, '1536060661v4.png', '2018-09-04 11:31:01'),
(5, '1536060666v5.png', '2018-09-04 11:31:06'),
(6, '1536060671v6.png', '2018-09-04 11:31:11'),
(7, '1536060676v7.png', '2018-09-04 11:31:16');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_date`) VALUES
(2, 'test category name 1', 1, '2018-08-31 15:33:40'),
(3, 'test category name 2', 1, '2018-08-31 15:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `state_id` int(11) DEFAULT '4128'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`) VALUES
(1, 'New York', 4128),
(2, 'Los Angeles', 4128),
(3, 'Chicago', 4128),
(4, 'Houston', 4128),
(5, 'Phoenix', 4128),
(6, 'Philadelphia', 4128),
(7, 'San Antonio', 4128),
(8, 'San Diego', 4128);

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `name`, `status`, `created_date`) VALUES
(13, 'Australia', 1, '2018-05-03 15:09:11'),
(38, 'Canada', 1, '2018-05-03 16:10:30'),
(101, 'India', 1, '2018-05-03 16:17:56'),
(166, 'Pakistan', 1, '2018-05-03 14:50:08'),
(202, 'South Africa', 1, '2018-05-03 16:15:23'),
(231, 'United States', 1, '2018-05-03 15:16:37'),
(232, 'Qatar', 1, '2018-05-03 18:54:43'),
(233, 'Bahrain', 1, '2018-05-03 19:21:55'),
(234, 'Oman', 1, '2018-05-03 19:27:04'),
(235, 'Saudi Arabia', 1, '2018-05-03 19:35:23'),
(236, 'United Kingdom', 1, '2018-05-04 11:12:17'),
(237, 'UAE', 1, '2018-05-04 11:42:05'),
(238, 'Denmark', 1, '2018-05-04 11:50:18'),
(239, 'France', 1, '2018-05-04 11:56:30'),
(240, 'Germany', 1, '2018-05-04 12:10:59'),
(241, 'Norway', 1, '2018-05-04 12:15:21');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `display_name` varchar(50) NOT NULL,
  `zip_code` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `city` int(11) NOT NULL,
  `country` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `category` int(11) NOT NULL,
  `description` text NOT NULL,
  `aboutus` text NOT NULL,
  `education` text NOT NULL,
  `biography` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `start_time` varchar(10) NOT NULL,
  `end_time` varchar(10) NOT NULL,
  `weekend_open` tinyint(4) NOT NULL,
  `website` varchar(255) NOT NULL,
  `availability` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `terms_condition` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `password`, `first_name`, `last_name`, `display_name`, `zip_code`, `phone`, `city`, `country`, `address`, `category`, `description`, `aboutus`, `education`, `biography`, `image`, `start_time`, `end_time`, `weekend_open`, `website`, `availability`, `facebook`, `twitter`, `google_plus`, `terms_condition`, `status`, `created_date`) VALUES
(2, 'danish.khan@abaskatech.com', '5858ea228cc2edf88721699b2c8638e5', 'danish', 'khan', 'MDK', '12345', '23123132123', 6, 166, 'London', 2, 'description details', 'about us details', 'education details', 'biography details', '1535964597doc.png', '01:00', '03:00', 1, 'website address', '', 'facebook link', 'twitter link', 'google plus link', 1, 1, '2018-09-03 08:49:57'),
(3, 'danishkhan469@yahoo.com', '5858ea228cc2edf88721699b2c8638e5', 'danish', 'khan', 'MDKS', '12345', '29034782390147', 2, 13, 'sample adweeere', 3, '', '', '', '', '153640490615166813383_cc3058730d.jpg', '', '', 0, '', '', '', '', '', 1, 1, '2018-09-08 11:08:26'),
(4, 'haseeb123@gmail.com', '5858ea228cc2edf88721699b2c8638e5', 'haseeb', 'pasha', 'HSB', '12345', '0283490284', 1, 166, 'sample address', 2, 'desc', 'about', 'education', '', '153795197015166813383_cc3058730d.jpg', '01:00', '04:00', 0, 'website', '1,2,3,4', 'fb', 'tw', 'g+', 1, 1, '2018-09-26 08:52:51'),
(5, 'usman@gmail.com', '5858ea228cc2edf88721699b2c8638e5', 'usmanm', 'pasha', 'usman', '12344', '2390482039', 1, 13, 'sdklasd ', 3, 'asjkdsjka', 'kjsadjksan', 'ajkhdaks', '', '153795623015166813383_cc3058730d.jpg', '', '', 0, 'website', '', 'fb', 'tw', 'g+', 1, 1, '2018-09-26 10:03:50');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_ratings`
--

CREATE TABLE `doctor_ratings` (
  `id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating_value` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_ratings`
--

INSERT INTO `doctor_ratings` (`id`, `doctor_id`, `user_id`, `rating_value`, `created_date`) VALUES
(1, 2, 1, 4, '2018-09-08 10:34:19'),
(2, 2, 2, 5, '2018-09-08 11:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `doc_appointments`
--

CREATE TABLE `doc_appointments` (
  `id` int(11) NOT NULL,
  `doctor_id` varchar(255) NOT NULL,
  `user_id` varchar(11) DEFAULT NULL,
  `user_name` varchar(100) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `allDay` int(2) NOT NULL DEFAULT '0',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `about_disease` text,
  `patient_email` varchar(255) DEFAULT NULL,
  `patient_phone` varchar(255) DEFAULT NULL,
  `patient_name` varchar(255) DEFAULT NULL,
  `office_visit_bit` tinyint(4) NOT NULL DEFAULT '0',
  `office_visit_detail` varchar(255) NOT NULL,
  `procedure_bit` tinyint(4) NOT NULL DEFAULT '0',
  `procedure_detail` varchar(255) NOT NULL,
  `labwork_bit` tinyint(4) NOT NULL DEFAULT '0',
  `labwork_detail` varchar(255) NOT NULL,
  `medicine_bit` tinyint(4) NOT NULL DEFAULT '0',
  `medicine_detail` varchar(255) NOT NULL,
  `immunization_bit` tinyint(4) NOT NULL DEFAULT '0',
  `immunization_detail` varchar(255) NOT NULL,
  `created_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doc_appointments`
--

INSERT INTO `doc_appointments` (`id`, `doctor_id`, `user_id`, `user_name`, `start_time`, `end_time`, `allDay`, `status`, `about_disease`, `patient_email`, `patient_phone`, `patient_name`, `office_visit_bit`, `office_visit_detail`, `procedure_bit`, `procedure_detail`, `labwork_bit`, `labwork_detail`, `medicine_bit`, `medicine_detail`, `immunization_bit`, `immunization_detail`, `created_date`) VALUES
(1, '2', '1', 'danish khan', '2018-09-06 02:15:00', '2018-09-06 02:30:00', 0, 0, 'disease details', 'danish.khan@abaskatech.com', '247827834', 'danish khan', 0, '', 0, '', 0, '', 0, '', 0, '', '2018-09-05 11:10:17'),
(2, '4', '1', 'danish khan', '2018-09-27 03:00:00', '2018-09-27 03:15:00', 0, 0, NULL, 'danish.khan@abaskatech.com', '1316546465', 'danish khan', 1, 'office detail', 0, '', 0, '', 0, '', 0, '', '2018-09-26 11:22:06');

-- --------------------------------------------------------

--
-- Table structure for table `frontend_users`
--

CREATE TABLE `frontend_users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(30) NOT NULL,
  `address` varchar(255) NOT NULL,
  `terms_condition` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `frontend_users`
--

INSERT INTO `frontend_users` (`id`, `email`, `password`, `name`, `address`, `terms_condition`, `status`, `created_date`) VALUES
(1, 'danish.khan@abaskatech.com', '5858ea228cc2edf88721699b2c8638e5', 'danish khan', 'sample address', 1, 1, '2018-09-03 09:39:14'),
(2, 'danishkhan469@yahoo.com', '5858ea228cc2edf88721699b2c8638e5', 'danish khan', 'sample address', 1, 1, '2018-09-08 11:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `title`, `image`, `description`, `created_date`) VALUES
(1, 'About Us', '1536135847images.jpg', '<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry&rsquo;s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.<br />\r\nWhy do we use it?</p>\r\n\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &lsquo;Content here, content here&rsquo;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &lsquo;lorem ipsum&rsquo; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n\r\n<p>Where does it come from?</p>\r\n\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &ldquo;de Finibus Bonorum et Malorum&rdquo; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &ldquo;Lorem ipsum dolor sit amet..&rdquo;, comes from a line in section 1.10.32.</p>\r\n\r\n<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from &ldquo;de Finibus Bonorum et Malorum&rdquo; by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.</p>\r\n', '2018-09-05 08:24:08');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `phone2` varchar(100) NOT NULL,
  `fax` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `availability` varchar(30) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `google_plus` varchar(255) NOT NULL,
  `youtube` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL,
  `skype` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `email`, `phone`, `phone2`, `fax`, `address`, `availability`, `facebook`, `twitter`, `google_plus`, `youtube`, `linkedin`, `skype`, `created_date`) VALUES
(1, 'danish.khan@abaskatech.com', '1 900 1234 456', '855-818-4848', '+1 206 592 2559', 'Class aptent taciti other sociosqu ad.', '24/7', '#', '#', '#', '#', '#', '#', '2018-09-05 10:06:01');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `commision` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `address`, `pass`, `role`, `city`, `commision`, `created_date`, `status`) VALUES
(2, 'admin', 'John@gmail.com', '12345678', 'sample address', '40be4e59b9a2a2b5dffb918c0e86b3d7', 'admin', 'New York', 'commision', '2018-08-06 12:14:49', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_ratings`
--
ALTER TABLE `doctor_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_appointments`
--
ALTER TABLE `doc_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frontend_users`
--
ALTER TABLE `frontend_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=242;
--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `doctor_ratings`
--
ALTER TABLE `doctor_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `doc_appointments`
--
ALTER TABLE `doc_appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `frontend_users`
--
ALTER TABLE `frontend_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
