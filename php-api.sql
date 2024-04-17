-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 17, 2024 at 07:46 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php-api`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `created_at`) VALUES
(1, 'Reels', '2023-03-16 20:21:03'),
(2, 'Countdown ', '2023-03-20 20:21:03'),
(3, 'Cat2', '2023-03-27 20:22:26'),
(4, 'Cat4', '2023-03-07 20:22:45');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_body` text NOT NULL,
  `author` varchar(255) NOT NULL,
  `post_category` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_body`, `author`, `post_category`, `created_at`) VALUES
(1, 'Hello Update', 'simple body of api post from a request', 'mohamed haweil', 3, '2024-04-17 05:05:39'),
(3, 'Tony’s Chocolonely: Show people what’s happening', 'Tony Chocolonely is a Dutch company that sells chocolate. Their chocolate bars are quite popular and their mission is to make chocolate 100% slave-free. As they are opinionated, which fits their mission, they often get a lot of engagement on their social posts. A year ago they opened a Chocolate Bar in Amsterdam and announced this news on LinkedIn:', 'Aya', 3, '2024-04-01 06:22:23'),
(4, 'The Clay Creative Co: Increase followers with giveaways', 'Now, this is an online store you’ve probably not heard of, as it’s a small business from the UK that sells its earrings through Etsy. But this post on Instagram is a great example of how a small online business can grow its number of followers. By doing a simple giveaway! This online store (and Instagram account) is run by one person, who also makes these earrings herself. And to celebrate that her account now has 1000 followers she decided to do another giveaway. Mind you, this may be a smaller business, but her Instagram account is only four months old and she already had 500 followers after the first month.', 'Kamal', 4, '2024-04-01 06:22:31'),
(6, 'Social Work', 'Social Work is the premiere journal of the social work profession. Widely read by practitioners, faculty, and students, it is the official journal of NASW and is provided to all members as a membership benefit. Social Work is dedicated to improving practice and advancing knowledge in social work and social welfare.', 'Mohamed Haweil\r\n', 1, '2024-04-01 06:25:07'),
(8, 'Social Work Research', 'Social Work Research publishes exemplary research to advance the development of knowledge and inform social work practice. Widely regarded as the outstanding journal in the field, it includes analytic reviews of research, theoretical articles pertaining to social work research, evaluation studies, and diverse research studies that contribute to knowledge about social work issues and problems.', 'john marty', 2, '2024-04-01 06:22:01'),
(15, 'Hello Update', 'simple body of api post from a request', 'mohamed haweil', 4, '2024-04-17 05:26:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `Post_Cat_FK` (`post_category`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `Post_Cat_FK` FOREIGN KEY (`post_category`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
