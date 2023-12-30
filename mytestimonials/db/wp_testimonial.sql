-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2023 at 01:40 PM
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
-- Database: `wtnwordpress`
--

-- --------------------------------------------------------

--
-- Table structure for table `wp_testimonial`
--

CREATE TABLE `wp_testimonial` (
  `ID` int(9) NOT NULL,
  `username` varchar(50) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `review` text NOT NULL,
  `profile_photo` varchar(255) NOT NULL,
  `facebook_link` varchar(255) NOT NULL,
  `linkedin_link` varchar(255) NOT NULL,
  `instagram_link` varchar(255) NOT NULL,
  `rating` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wp_testimonial`
--

INSERT INTO `wp_testimonial` (`ID`, `username`, `designation`, `review`, `profile_photo`, `facebook_link`, `linkedin_link`, `instagram_link`, `rating`) VALUES
(1, 'John A', 'CEO, Xyz Pvt. Ltd', 'Great', 'http://localhost/wtnwordpress/wp-content/uploads/2023/09/profile2.jpeg', '', 'https://www.linkedin.com/in/nikita-sambari-625394187/', '', 5),
(2, 'Nikita', 'Web Developer, Xyz company', 'I\'ve been a customer of this company for years, and their service has consistently exceeded my expectations. They truly value their customers and always go the extra mile', 'http://localhost/wtnwordpress/wp-content/uploads/2023/09/profile1.jpeg', 'https://www.facebook.com/nikita.sambari', 'https://www.linkedin.com/in/nikita-sambari-625394187/', '', 4),
(3, 'Robert F', 'Designer', 'I can\'t imagine my life without this product. It has become an essential part of my daily routine, and its quality and durability have impressed me time and time again.', 'http://localhost/wtnwordpress/wp-content/uploads/2023/09/profile3.jpeg', 'https://www.facebook.com/nikita.sambari', '', '', 5),
(4, 'David D', 'Account Manager, XYZ Company', 'I had the most incredible experience with this company. From start to finish, everything was flawless. It\\\'s rare to encounter such professionalism and attention to detail.', 'http://localhost/wtnwordpress/wp-content/uploads/2023/09/profile5.jpeg', '', 'https://www.linkedin.com/in/nikita-sambari-625394187/', '', 4.5),
(5, 'Lisa K', 'Graphic Designer', 'Using this online service has simplified my life. It\\\'s user-friendly, reliable, and the customer support is excellent. I highly recommend it to anyone looking for convenience.', 'http://localhost/wtnwordpress/wp-content/uploads/2023/09/004.webp', 'https://www.facebook.com/nikita.sambari', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wp_testimonial`
--
ALTER TABLE `wp_testimonial`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wp_testimonial`
--
ALTER TABLE `wp_testimonial`
  MODIFY `ID` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
