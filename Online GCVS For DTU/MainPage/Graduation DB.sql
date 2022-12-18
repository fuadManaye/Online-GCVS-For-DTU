-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 04, 2022 at 02:31 PM
-- Server version: 5.7.36
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `graduation db`
--
CREATE DATABASE IF NOT EXISTS `graduation db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `graduation db`;

-- --------------------------------------------------------

--
-- Table structure for table `administrator_profile`
--

DROP TABLE IF EXISTS `administrator_profile`;
CREATE TABLE IF NOT EXISTS `administrator_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `image` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `administrator_profile`
--

INSERT INTO `administrator_profile` (`id`, `name`, `image`) VALUES
(1, 'Fuad Manaye', 'noprofile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `chemical`
--

DROP TABLE IF EXISTS `chemical`;
CREATE TABLE IF NOT EXISTS `chemical` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  `cour28` varchar(10) NOT NULL,
  `cour29` varchar(10) NOT NULL,
  `cour30` varchar(10) NOT NULL,
  `cour31` varchar(10) NOT NULL,
  `cour32` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

DROP TABLE IF EXISTS `company`;
CREATE TABLE IF NOT EXISTS `company` (
  `company_id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(60) NOT NULL,
  `company_phone` varchar(15) NOT NULL,
  `company_email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `company_region` varchar(60) NOT NULL,
  `company_city` varchar(60) NOT NULL,
  `reg_date` date NOT NULL,
  `reason_of_verification` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`company_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `company_message`
--

DROP TABLE IF EXISTS `company_message`;
CREATE TABLE IF NOT EXISTS `company_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(300) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
CREATE TABLE IF NOT EXISTS `company_profile` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `image` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_profile`
--

INSERT INTO `company_profile` (`id`, `image`) VALUES
(1, 'noprofile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `company_reply_message`
--

DROP TABLE IF EXISTS `company_reply_message`;
CREATE TABLE IF NOT EXISTS `company_reply_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_company` varchar(50) NOT NULL,
  `sender` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL,
  `message` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `computer_student_lists`
--

DROP TABLE IF EXISTS `computer_student_lists`;
CREATE TABLE IF NOT EXISTS `computer_student_lists` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `computer_student_lists`
--

-- --------------------------------------------------------

--
-- Table structure for table `electrical`
--

DROP TABLE IF EXISTS `electrical`;
CREATE TABLE IF NOT EXISTS `electrical` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  `cour28` varchar(10) NOT NULL,
  `cour29` varchar(10) NOT NULL,
  `cour30` varchar(10) NOT NULL,
  `cour31` varchar(10) NOT NULL,
  `cour32` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `it`
--

DROP TABLE IF EXISTS `it`;
CREATE TABLE IF NOT EXISTS `it` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `law`
--

DROP TABLE IF EXISTS `law`;
CREATE TABLE IF NOT EXISTS `law` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  `cour28` varchar(10) NOT NULL,
  `cour29` varchar(10) NOT NULL,
  `cour30` varchar(10) NOT NULL,
  `cour31` varchar(10) NOT NULL,
  `cour32` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `main_users`
--

DROP TABLE IF EXISTS `main_users`;
CREATE TABLE IF NOT EXISTS `main_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Role` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `main_users`
--

INSERT INTO `main_users` (`id`, `userName`, `Password`, `Role`, `status`) VALUES
(1, 'FuadManaye', '3f63e00b87c19683832d9d71b0a47c2f', 'Administrator', 1),
(2, 'DerejeGirma', '643a19480407546366fca8ea43ac74ad', 'Registral', 1);

-- --------------------------------------------------------

--
-- Table structure for table `managment`
--

DROP TABLE IF EXISTS `managment`;
CREATE TABLE IF NOT EXISTS `managment` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messaging`
--

DROP TABLE IF EXISTS `messaging`;
CREATE TABLE IF NOT EXISTS `messaging` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `studid` varchar(30) NOT NULL,
  `name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `nursing`
--

DROP TABLE IF EXISTS `nursing`;
CREATE TABLE IF NOT EXISTS `nursing` (
  `First_Name` varchar(100) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Last_Name` varchar(100) NOT NULL,
  `Graduate_ID` varchar(100) NOT NULL,
  `Gender` varchar(100) NOT NULL,
  `Faculty` varchar(100) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `cour1` varchar(10) NOT NULL,
  `cour2` varchar(10) NOT NULL,
  `cour3` varchar(10) NOT NULL,
  `cour4` varchar(10) NOT NULL,
  `cour5` varchar(10) NOT NULL,
  `cour6` varchar(10) NOT NULL,
  `cour7` varchar(10) NOT NULL,
  `cour8` varchar(10) NOT NULL,
  `cour9` varchar(10) NOT NULL,
  `cour10` varchar(10) NOT NULL,
  `cour11` varchar(10) NOT NULL,
  `cour12` varchar(10) NOT NULL,
  `cour13` varchar(10) NOT NULL,
  `cour14` varchar(10) NOT NULL,
  `cour15` varchar(10) NOT NULL,
  `cour16` varchar(10) NOT NULL,
  `cour17` varchar(10) NOT NULL,
  `cour18` varchar(10) NOT NULL,
  `cour19` varchar(10) NOT NULL,
  `cour20` varchar(10) NOT NULL,
  `cour21` varchar(10) NOT NULL,
  `cour22` varchar(10) NOT NULL,
  `cour23` varchar(10) NOT NULL,
  `cour24` varchar(10) NOT NULL,
  `cour25` varchar(10) NOT NULL,
  `cour26` varchar(10) NOT NULL,
  `cour27` varchar(10) NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registral_profile`
--

DROP TABLE IF EXISTS `registral_profile`;
CREATE TABLE IF NOT EXISTS `registral_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE latin1_general_cs NOT NULL,
  `image` varchar(50) COLLATE latin1_general_cs NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs;

--
-- Dumping data for table `registral_profile`
--

INSERT INTO `registral_profile` (`id`, `name`, `image`) VALUES
(1, 'Dereje Girma', 'noprofile.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `registral_reply_message`
--

DROP TABLE IF EXISTS `registral_reply_message`;
CREATE TABLE IF NOT EXISTS `registral_reply_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `to_student` varchar(100) NOT NULL,
  `sender` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
CREATE TABLE IF NOT EXISTS `student` (
  `Graduate_ID` varchar(30) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Middle_Name` varchar(30) NOT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Certificate_code` varchar(100) NOT NULL,
  `Year_of_Graduation` varchar(12) NOT NULL,
  `Cumulative_Gpa` double NOT NULL,
  `Qualification` varchar(30) NOT NULL,
  `Department` varchar(100) NOT NULL,
  `Photo` longblob NOT NULL,
  PRIMARY KEY (`Graduate_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

DROP TABLE IF EXISTS `student_login`;
CREATE TABLE IF NOT EXISTS `student_login` (
  `id` varchar(30) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_login`
--
COMMIT;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `message` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
