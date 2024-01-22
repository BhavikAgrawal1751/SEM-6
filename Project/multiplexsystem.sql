-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 16, 2024 at 06:00 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `multiplexsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_address` varchar(60) NOT NULL,
  `admin_zip` int NOT NULL,
  `admin_email` varchar(25) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_profileimg` varchar(70) NOT NULL,
  `admin_mobile` varchar(20) NOT NULL,
  `admin_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `admin_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_address`, `admin_zip`, `admin_email`, `admin_password`, `admin_profileimg`, `admin_mobile`, `admin_status`, `admin_Dateregister`) VALUES
(1, 'ffzf', 'drrgggrg', 53535, 'yuyfty', 'ddrrdt`', 'dggfg', 'fgccgfg', 'Unblocked', '2024-01-04 06:27:14'),
(2, 'admin', 'surat', 394210, 'admin@gmail.com', '123', '1.jpg', '9874563210', 'Unblocked', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
CREATE TABLE IF NOT EXISTS `area` (
  `area_id` int NOT NULL AUTO_INCREMENT,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL,
  `area_name` varchar(80) NOT NULL,
  `area_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `area_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`area_id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `area`
--

INSERT INTO `area` (`area_id`, `city_id`, `state_id`, `area_name`, `area_status`, `area_Dateregister`) VALUES
(1, 1, 1, 'udhana', 'Unblocked', '2024-01-04 07:01:13');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

DROP TABLE IF EXISTS `city`;
CREATE TABLE IF NOT EXISTS `city` (
  `city_id` int NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `city_name` varchar(80) NOT NULL,
  `city_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `city_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`city_id`, `state_id`, `city_name`, `city_status`, `city_Dateregister`) VALUES
(1, 1, 'surat', 'Unblocked', '2024-01-04 07:00:44');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int NOT NULL AUTO_INCREMENT,
  `contact_name` varchar(40) NOT NULL,
  `contact_email` varchar(40) NOT NULL,
  `contact_subject` varchar(50) NOT NULL,
  `contact_messsage` varchar(200) NOT NULL,
  `contact_status` enum('Unblocked','Blocked') NOT NULL,
  `contact_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `contact_name`, `contact_email`, `contact_subject`, `contact_messsage`, `contact_status`, `contact_Dateregister`) VALUES
(1, 'fsdfsgs', 'ffgr', 'gfgfgf', 'fffgx', '', '2024-01-04 06:28:44');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `event_id` int NOT NULL AUTO_INCREMENT,
  `eventcategory_id` int NOT NULL,
  `eventspeaker_id` int NOT NULL,
  `event_title` varchar(50) NOT NULL,
  `event_trailer` varchar(150) NOT NULL,
  `event_price` varchar(50) NOT NULL,
  `event_images` varchar(100) NOT NULL,
  `event_description` varchar(200) NOT NULL,
  `event_type` varchar(60) NOT NULL,
  `event_address` varchar(90) NOT NULL,
  `event_date` varchar(40) NOT NULL,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `area_id` int NOT NULL,
  `event_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `event_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`event_id`),
  KEY `eventcategory_id` (`eventcategory_id`),
  KEY `eventspeaker_id` (`eventspeaker_id`),
  KEY `state_id` (`state_id`),
  KEY `city_id` (`city_id`),
  KEY `area_id` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `eventcategory_id`, `eventspeaker_id`, `event_title`, `event_trailer`, `event_price`, `event_images`, `event_description`, `event_type`, `event_address`, `event_date`, `state_id`, `city_id`, `area_id`, `event_status`, `event_Dateregister`) VALUES
(1, 1, 1, 'dgggfhf', 'drrssr', 'fgfgddgfg', 'fggfgxg', 'dfssfdfdgg`', 'sfssfgdggd', 'ffdfdfg', 'sfsfgdt', 1, 1, 1, 'Unblocked', '2024-01-04 07:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `eventcategory`
--

DROP TABLE IF EXISTS `eventcategory`;
CREATE TABLE IF NOT EXISTS `eventcategory` (
  `eventcategory_id` int NOT NULL AUTO_INCREMENT,
  `eventcategory_title` varchar(50) NOT NULL,
  `eventcategory_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `eventcategory_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`eventcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventcategory`
--

INSERT INTO `eventcategory` (`eventcategory_id`, `eventcategory_title`, `eventcategory_status`, `eventcategory_Dateregister`) VALUES
(1, 'vff', 'Unblocked', '2024-01-04 06:29:56');

-- --------------------------------------------------------

--
-- Table structure for table `eventspeaker`
--

DROP TABLE IF EXISTS `eventspeaker`;
CREATE TABLE IF NOT EXISTS `eventspeaker` (
  `eventspeaker_id` int NOT NULL AUTO_INCREMENT,
  `eventcategory_id` int NOT NULL,
  `eventspeaker_name` varchar(60) NOT NULL,
  `eventspeaker_profession` varchar(50) NOT NULL,
  `eventspeaker_profileimg` varchar(60) NOT NULL,
  `eventspeaker_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `eventspeaker_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`eventspeaker_id`),
  KEY `eventcategory_id` (`eventcategory_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventspeaker`
--

INSERT INTO `eventspeaker` (`eventspeaker_id`, `eventcategory_id`, `eventspeaker_name`, `eventspeaker_profession`, `eventspeaker_profileimg`, `eventspeaker_status`, `eventspeaker_Dateregister`) VALUES
(1, 1, 'sgdgfggg', 'ffgfgfgrr', 'ggfgdss', 'Unblocked', '2024-01-04 06:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `eventticket`
--

DROP TABLE IF EXISTS `eventticket`;
CREATE TABLE IF NOT EXISTS `eventticket` (
  `eventticket_id` int NOT NULL AUTO_INCREMENT,
  `eventspeaker_id` int NOT NULL,
  `eventcategory_id` int NOT NULL,
  `event_id` int NOT NULL,
  `eventticket_type` varchar(60) NOT NULL,
  `totalamount` varchar(50) NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `customer_email` varchar(60) NOT NULL,
  `customer_mob` varchar(60) NOT NULL,
  `eventticket_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `eventticket_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`eventticket_id`),
  KEY `eventspeaker_id` (`eventspeaker_id`),
  KEY `eventcategory_id` (`eventcategory_id`),
  KEY `event_id` (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `eventticket`
--

INSERT INTO `eventticket` (`eventticket_id`, `eventspeaker_id`, `eventcategory_id`, `event_id`, `eventticket_type`, `totalamount`, `customer_name`, `customer_email`, `customer_mob`, `eventticket_status`, `eventticket_Dateregister`) VALUES
(1, 1, 1, 1, 'fgfgfgfgf', 'fdd', 'gfgfdgdfgf', 'fdffgddg', 'sfdd', 'Unblocked', '2024-01-04 07:18:42');

-- --------------------------------------------------------

--
-- Table structure for table `fbaddtocart`
--

DROP TABLE IF EXISTS `fbaddtocart`;
CREATE TABLE IF NOT EXISTS `fbaddtocart` (
  `atc_id` int NOT NULL AUTO_INCREMENT,
  `foodbeverage_id` int NOT NULL,
  `ticketbooking_number` varchar(50) NOT NULL,
  `quantity` varchar(60) NOT NULL,
  `totalamount` varchar(50) NOT NULL,
  `atc_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `atc_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`atc_id`),
  KEY `foodbeverage_id` (`foodbeverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fbaddtocart`
--

INSERT INTO `fbaddtocart` (`atc_id`, `foodbeverage_id`, `ticketbooking_number`, `quantity`, `totalamount`, `atc_status`, `atc_Dateregister`) VALUES
(1, 1, 'dffxgfg', 'fdfr', 'wewed', 'Blocked', '2024-01-04 07:22:44');

-- --------------------------------------------------------

--
-- Table structure for table `fbbookingchkout`
--

DROP TABLE IF EXISTS `fbbookingchkout`;
CREATE TABLE IF NOT EXISTS `fbbookingchkout` (
  `fbcheckout_id` int NOT NULL AUTO_INCREMENT,
  `foodbeverage_id` int NOT NULL,
  `user_id` int NOT NULL,
  `atc_id` int NOT NULL,
  `ticketbooking_number` varchar(50) NOT NULL,
  `fbcheckout_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `fbcheckout_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`fbcheckout_id`),
  KEY `foodbeverage_id` (`foodbeverage_id`),
  KEY `user_id` (`user_id`),
  KEY `atc_id` (`atc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `fbbookingchkout`
--

INSERT INTO `fbbookingchkout` (`fbcheckout_id`, `foodbeverage_id`, `user_id`, `atc_id`, `ticketbooking_number`, `fbcheckout_status`, `fbcheckout_Dateregister`) VALUES
(1, 1, 1, 1, 'ffdfssg', 'Unblocked', '2024-01-04 07:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `foodbeveragebooking`
--

DROP TABLE IF EXISTS `foodbeveragebooking`;
CREATE TABLE IF NOT EXISTS `foodbeveragebooking` (
  `foodbeverage_id` int NOT NULL AUTO_INCREMENT,
  `foodbeverage_name` varchar(80) NOT NULL,
  `foodbeverage_price` varchar(80) NOT NULL,
  `foodbeverage_image` varchar(100) NOT NULL,
  `foodbeverage_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `foodbeverage_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`foodbeverage_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `foodbeveragebooking`
--

INSERT INTO `foodbeveragebooking` (`foodbeverage_id`, `foodbeverage_name`, `foodbeverage_price`, `foodbeverage_image`, `foodbeverage_status`, `foodbeverage_Dateregister`) VALUES
(1, 'dfdfd', 'fxxfgfx', 'dfdsff', 'Unblocked', '2024-01-04 07:22:14');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

DROP TABLE IF EXISTS `movie`;
CREATE TABLE IF NOT EXISTS `movie` (
  `movie_id` int NOT NULL AUTO_INCREMENT,
  `industry_id` int NOT NULL,
  `category_id` int NOT NULL,
  `multiplex_id` int NOT NULL,
  `movie_name` varchar(80) NOT NULL,
  `movie_cast` varchar(250) NOT NULL,
  `movie_price` varchar(12) NOT NULL,
  `movie_rating` varchar(30) NOT NULL,
  `movie_experience` varchar(40) NOT NULL,
  `status` varchar(50) NOT NULL,
  `movie_description` mediumtext NOT NULL,
  `movie_poster` varchar(100) NOT NULL,
  `movie_images` varchar(200) NOT NULL,
  `movie_review` varchar(200) NOT NULL,
  `movie_trailer` varchar(200) NOT NULL,
  `movie_language` varchar(60) NOT NULL,
  `screen` int NOT NULL,
  `movie_duration` varchar(70) NOT NULL,
  `movie_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `movie_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`movie_id`),
  KEY `industry_id` (`industry_id`),
  KEY `category_id` (`category_id`),
  KEY `multiplex_id` (`multiplex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`movie_id`, `industry_id`, `category_id`, `multiplex_id`, `movie_name`, `movie_cast`, `movie_price`, `movie_rating`, `movie_experience`, `status`, `movie_description`, `movie_poster`, `movie_images`, `movie_review`, `movie_trailer`, `movie_language`, `screen`, `movie_duration`, `movie_status`, `movie_Dateregister`) VALUES
(1, 1, 1, 1, 'fdsdfxx', 'fddxfgf', 'gxgxgf', 'sgfggg', 'gfggf', 'gxgg', 'dgfgf', 'sfd', 'sfggfg', 'dvxvv', 'zzff', 'fdfd', 14, 'fff', 'Blocked', '2024-01-04 07:27:49');

-- --------------------------------------------------------

--
-- Table structure for table `moviecast`
--

DROP TABLE IF EXISTS `moviecast`;
CREATE TABLE IF NOT EXISTS `moviecast` (
  `cast_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `cast_name` varchar(50) NOT NULL,
  `cast_img` varchar(50) NOT NULL,
  `cast_position` varchar(50) NOT NULL,
  `cast_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `cast_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`cast_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moviecast`
--

INSERT INTO `moviecast` (`cast_id`, `movie_id`, `cast_name`, `cast_img`, `cast_position`, `cast_status`, `cast_Dateregister`) VALUES
(1, 1, 'fsvvfsstt', 'afdfgf', 'dddfdfgf', 'Unblocked', '2024-01-04 07:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `moviecategory`
--

DROP TABLE IF EXISTS `moviecategory`;
CREATE TABLE IF NOT EXISTS `moviecategory` (
  `category_id` int NOT NULL AUTO_INCREMENT,
  `industry_id` int NOT NULL,
  `category_name` varchar(80) NOT NULL,
  `category_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `category_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`category_id`),
  KEY `industry_id` (`industry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moviecategory`
--

INSERT INTO `moviecategory` (`category_id`, `industry_id`, `category_name`, `category_status`, `category_Dateregister`) VALUES
(1, 1, 'fddd', 'Unblocked', '2024-01-04 06:58:21'),
(2, 1, 'fdfd', 'Unblocked', '2024-01-04 07:28:45');

-- --------------------------------------------------------

--
-- Table structure for table `movieimg`
--

DROP TABLE IF EXISTS `movieimg`;
CREATE TABLE IF NOT EXISTS `movieimg` (
  `movieimg_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `movieimg` text NOT NULL,
  PRIMARY KEY (`movieimg_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieimg`
--

INSERT INTO `movieimg` (`movieimg_id`, `movie_id`, `movieimg`) VALUES
(1, 1, 'dfdfdf');

-- --------------------------------------------------------

--
-- Table structure for table `movieindustry`
--

DROP TABLE IF EXISTS `movieindustry`;
CREATE TABLE IF NOT EXISTS `movieindustry` (
  `industry_id` int NOT NULL AUTO_INCREMENT,
  `industry_name` varchar(30) NOT NULL,
  `industry_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `industry_Dateregister` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`industry_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieindustry`
--

INSERT INTO `movieindustry` (`industry_id`, `industry_name`, `industry_status`, `industry_Dateregister`) VALUES
(1, 'sdsrd', 'Unblocked', '2024-01-04 06:54:08');

-- --------------------------------------------------------

--
-- Table structure for table `moviereview`
--

DROP TABLE IF EXISTS `moviereview`;
CREATE TABLE IF NOT EXISTS `moviereview` (
  `review_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `review_detail` mediumtext NOT NULL,
  PRIMARY KEY (`review_id`),
  KEY `user_id` (`user_id`),
  KEY `movie_id` (`movie_id`),
  KEY `movie_id_2` (`movie_id`),
  KEY `user_id_2` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `moviereview`
--

INSERT INTO `moviereview` (`review_id`, `user_id`, `movie_id`, `review_detail`) VALUES
(1, 1, 1, 'dcczdzfd');

-- --------------------------------------------------------

--
-- Table structure for table `movieseatplan`
--

DROP TABLE IF EXISTS `movieseatplan`;
CREATE TABLE IF NOT EXISTS `movieseatplan` (
  `seatplan_id` int NOT NULL AUTO_INCREMENT,
  `movieticket_id` int NOT NULL,
  `movie_id` int NOT NULL,
  `seat_name` varchar(70) NOT NULL,
  `seatplan_price` varchar(50) NOT NULL,
  `seatplan_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `seatplan_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`seatplan_id`),
  KEY `movieticket_id` (`movieticket_id`),
  KEY `movie_id` (`movie_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieseatplan`
--

INSERT INTO `movieseatplan` (`seatplan_id`, `movieticket_id`, `movie_id`, `seat_name`, `seatplan_price`, `seatplan_status`, `seatplan_Dateregister`) VALUES
(1, 1, 1, 'dfdfgggdfgf', 'dfxx', 'Unblocked', '2024-01-04 07:31:34');

-- --------------------------------------------------------

--
-- Table structure for table `movieticketbooking`
--

DROP TABLE IF EXISTS `movieticketbooking`;
CREATE TABLE IF NOT EXISTS `movieticketbooking` (
  `ticketbooking_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `multiplex_id` int NOT NULL,
  `movieticket_id` int NOT NULL,
  `seatplan_id` int NOT NULL,
  `ticketbooking_number` varchar(80) NOT NULL,
  `no_of_seats` int NOT NULL,
  `totalamount` varchar(50) NOT NULL,
  `customername` varchar(50) NOT NULL,
  `customeremail` varchar(60) NOT NULL,
  `customermobile` varchar(20) NOT NULL,
  `paymentgateway` varchar(80) NOT NULL,
  `ticketbooking_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `ticketbooking_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`ticketbooking_id`),
  KEY `movie_id` (`movie_id`),
  KEY `multiplex_id` (`multiplex_id`),
  KEY `movieticket_id` (`movieticket_id`),
  KEY `seatplan_id` (`seatplan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieticketbooking`
--

INSERT INTO `movieticketbooking` (`ticketbooking_id`, `movie_id`, `multiplex_id`, `movieticket_id`, `seatplan_id`, `ticketbooking_number`, `no_of_seats`, `totalamount`, `customername`, `customeremail`, `customermobile`, `paymentgateway`, `ticketbooking_status`, `ticketbooking_Dateregister`) VALUES
(1, 1, 1, 1, 1, 'dzfdf', 45, 'fzdc', 'dfgg', 'ggxfg`', 'fdfg', 'dfdf', 'Unblocked', '2024-01-04 07:33:50');

-- --------------------------------------------------------

--
-- Table structure for table `movieticketplan`
--

DROP TABLE IF EXISTS `movieticketplan`;
CREATE TABLE IF NOT EXISTS `movieticketplan` (
  `movieticket_id` int NOT NULL AUTO_INCREMENT,
  `movie_id` int NOT NULL,
  `multiplex_id` int NOT NULL,
  `movieticket_time` varchar(50) NOT NULL,
  `movieticket_date` varchar(50) NOT NULL,
  `movieticket_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `movieticket_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`movieticket_id`),
  KEY `movie_id` (`movie_id`),
  KEY `multiplex_id` (`multiplex_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `movieticketplan`
--

INSERT INTO `movieticketplan` (`movieticket_id`, `movie_id`, `multiplex_id`, `movieticket_time`, `movieticket_date`, `movieticket_status`, `movieticket_Dateregister`) VALUES
(1, 1, 1, 'gfgfdg', 'gfgfgg', 'Unblocked', '2024-01-04 07:30:58');

-- --------------------------------------------------------

--
-- Table structure for table `multiplex`
--

DROP TABLE IF EXISTS `multiplex`;
CREATE TABLE IF NOT EXISTS `multiplex` (
  `multiplex_id` int NOT NULL AUTO_INCREMENT,
  `area_id` int NOT NULL,
  `city_id` int NOT NULL,
  `state_id` int NOT NULL,
  `multiplex_name` varchar(80) NOT NULL,
  `no_of_screen` varchar(20) NOT NULL,
  `multiplex_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `multiplex_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`multiplex_id`),
  KEY `area_id` (`area_id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `multiplex`
--

INSERT INTO `multiplex` (`multiplex_id`, `area_id`, `city_id`, `state_id`, `multiplex_name`, `no_of_screen`, `multiplex_status`, `multiplex_Dateregister`) VALUES
(1, 1, 1, 1, 'fdfggg', 'gxfgf', 'Unblocked', '2024-01-04 07:02:41');

-- --------------------------------------------------------

--
-- Table structure for table `sports`
--

DROP TABLE IF EXISTS `sports`;
CREATE TABLE IF NOT EXISTS `sports` (
  `sports_id` int NOT NULL AUTO_INCREMENT,
  `state_id` int NOT NULL,
  `city_id` int NOT NULL,
  `area_id` int NOT NULL,
  `sports_title` varchar(70) NOT NULL,
  `sports_address` varchar(150) NOT NULL,
  `sports_trailer` varchar(150) NOT NULL,
  `sports_category` varchar(60) NOT NULL,
  `sports_details` varchar(200) NOT NULL,
  `sportsticket_price` varchar(50) NOT NULL,
  `sports_images` varchar(100) NOT NULL,
  `sports_date` varchar(50) NOT NULL,
  `sports_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `sports_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`sports_id`),
  KEY `sports_ibfk_1` (`state_id`),
  KEY `sports_ibfk_2` (`city_id`),
  KEY `sports_ibfk_3` (`area_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sports`
--

INSERT INTO `sports` (`sports_id`, `state_id`, `city_id`, `area_id`, `sports_title`, `sports_address`, `sports_trailer`, `sports_category`, `sports_details`, `sportsticket_price`, `sports_images`, `sports_date`, `sports_status`, `sports_Dateregister`) VALUES
(1, 1, 1, 1, 'dsfdfd', 'vxvvvd', 'ffxf', 'dfdfdf', 'dsdfdfdf', 'dfdczddf', 'fdfdfg', 'cvvbbv v', 'Unblocked', '2024-01-04 07:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `sportsbooking`
--

DROP TABLE IF EXISTS `sportsbooking`;
CREATE TABLE IF NOT EXISTS `sportsbooking` (
  `sportsbooking_id` int NOT NULL AUTO_INCREMENT,
  `sports_id` int NOT NULL,
  `customer_name` varchar(60) NOT NULL,
  `customer_email` varchar(60) NOT NULL,
  `customer_mobile` varchar(20) NOT NULL,
  `ticket_type` varchar(50) NOT NULL,
  `ticket_quantity` varchar(30) NOT NULL,
  `totalamount` varchar(40) NOT NULL,
  `sportsbooking_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `sportsbooking_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`sportsbooking_id`),
  KEY `sportsbooking_ibfk_1` (`sports_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sportsbooking`
--

INSERT INTO `sportsbooking` (`sportsbooking_id`, `sports_id`, `customer_name`, `customer_email`, `customer_mobile`, `ticket_type`, `ticket_quantity`, `totalamount`, `sportsbooking_status`, `sportsbooking_Dateregister`) VALUES
(1, 1, 'zzdfd', 'fzdzv', 'sffgf', 'assfb', 'sddf', 'ssgg', 'Unblocked', '2024-01-04 07:36:05');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `state_id` int NOT NULL AUTO_INCREMENT,
  `state_name` varchar(80) NOT NULL,
  `state_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `state_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`state_id`, `state_name`, `state_status`, `state_Dateregister`) VALUES
(1, 'gujarat', 'Unblocked', '2024-01-04 06:47:51');

-- --------------------------------------------------------

--
-- Table structure for table `userregisteration`
--

DROP TABLE IF EXISTS `userregisteration`;
CREATE TABLE IF NOT EXISTS `userregisteration` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(60) NOT NULL,
  `user_email` varchar(60) NOT NULL,
  `user_moblie` varchar(20) NOT NULL,
  `user_password` varchar(30) NOT NULL,
  `user_status` enum('Unblocked','Blocked') NOT NULL DEFAULT 'Unblocked',
  `user_Dateregister` timestamp NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `userregisteration`
--

INSERT INTO `userregisteration` (`user_id`, `user_name`, `user_email`, `user_moblie`, `user_password`, `user_status`, `user_Dateregister`) VALUES
(1, 'gfgfg', 'gfgdrrdr', 'gfgdgg', 'dfdfddf', 'Unblocked', '2024-01-04 06:47:29');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `area`
--
ALTER TABLE `area`
  ADD CONSTRAINT `area_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `area_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_4` FOREIGN KEY (`eventcategory_id`) REFERENCES `moviecategory` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_5` FOREIGN KEY (`eventspeaker_id`) REFERENCES `eventspeaker` (`eventspeaker_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventspeaker`
--
ALTER TABLE `eventspeaker`
  ADD CONSTRAINT `eventspeaker_ibfk_1` FOREIGN KEY (`eventcategory_id`) REFERENCES `eventcategory` (`eventcategory_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `eventticket`
--
ALTER TABLE `eventticket`
  ADD CONSTRAINT `eventticket_ibfk_1` FOREIGN KEY (`eventcategory_id`) REFERENCES `moviecategory` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventticket_ibfk_2` FOREIGN KEY (`eventspeaker_id`) REFERENCES `eventspeaker` (`eventspeaker_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `eventticket_ibfk_3` FOREIGN KEY (`event_id`) REFERENCES `event` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fbaddtocart`
--
ALTER TABLE `fbaddtocart`
  ADD CONSTRAINT `fbaddtocart_ibfk_1` FOREIGN KEY (`foodbeverage_id`) REFERENCES `foodbeveragebooking` (`foodbeverage_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fbbookingchkout`
--
ALTER TABLE `fbbookingchkout`
  ADD CONSTRAINT `fbbookingchkout_ibfk_1` FOREIGN KEY (`foodbeverage_id`) REFERENCES `foodbeveragebooking` (`foodbeverage_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fbbookingchkout_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `userregisteration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fbbookingchkout_ibfk_3` FOREIGN KEY (`atc_id`) REFERENCES `fbaddtocart` (`atc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `movie`
--
ALTER TABLE `movie`
  ADD CONSTRAINT `movie_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `movieindustry` (`industry_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `moviecategory` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movie_ibfk_3` FOREIGN KEY (`multiplex_id`) REFERENCES `multiplex` (`multiplex_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moviecast`
--
ALTER TABLE `moviecast`
  ADD CONSTRAINT `moviecast_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moviecategory`
--
ALTER TABLE `moviecategory`
  ADD CONSTRAINT `moviecategory_ibfk_1` FOREIGN KEY (`industry_id`) REFERENCES `movieindustry` (`industry_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movieimg`
--
ALTER TABLE `movieimg`
  ADD CONSTRAINT `movieimg_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `moviereview`
--
ALTER TABLE `moviereview`
  ADD CONSTRAINT `moviereview_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `userregisteration` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `moviereview_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movieseatplan`
--
ALTER TABLE `movieseatplan`
  ADD CONSTRAINT `movieseatplan_ibfk_1` FOREIGN KEY (`movieticket_id`) REFERENCES `movieticketplan` (`movieticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieseatplan_ibfk_2` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movieticketbooking`
--
ALTER TABLE `movieticketbooking`
  ADD CONSTRAINT `movieticketbooking_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieticketbooking_ibfk_2` FOREIGN KEY (`multiplex_id`) REFERENCES `multiplex` (`multiplex_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieticketbooking_ibfk_3` FOREIGN KEY (`movieticket_id`) REFERENCES `movieticketplan` (`movieticket_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieticketbooking_ibfk_4` FOREIGN KEY (`seatplan_id`) REFERENCES `movieseatplan` (`seatplan_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `movieticketplan`
--
ALTER TABLE `movieticketplan`
  ADD CONSTRAINT `movieticketplan_ibfk_1` FOREIGN KEY (`movie_id`) REFERENCES `movie` (`movie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `movieticketplan_ibfk_2` FOREIGN KEY (`multiplex_id`) REFERENCES `multiplex` (`multiplex_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `multiplex`
--
ALTER TABLE `multiplex`
  ADD CONSTRAINT `multiplex_ibfk_1` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `multiplex_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `multiplex_ibfk_3` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sports`
--
ALTER TABLE `sports`
  ADD CONSTRAINT `sports_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `state` (`state_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sports_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `city` (`city_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sports_ibfk_3` FOREIGN KEY (`area_id`) REFERENCES `area` (`area_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sportsbooking`
--
ALTER TABLE `sportsbooking`
  ADD CONSTRAINT `sportsbooking_ibfk_1` FOREIGN KEY (`sports_id`) REFERENCES `sports` (`sports_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
