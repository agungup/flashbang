-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 31, 2014 at 03:01 PM
-- Server version: 5.6.13
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `location`
--

-- --------------------------------------------------------

--
-- Table structure for table `GeoIPASNum`
--

CREATE TABLE IF NOT EXISTS `GeoIPASNum` (
  `startIp` bigint(20) NOT NULL,
  `endIp` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `GeoIPCountry`
--

CREATE TABLE IF NOT EXISTS `GeoIPCountry` (
  `start_ipv4` varchar(15) NOT NULL,
  `end_ipv4` varchar(15) NOT NULL,
  `start_ip` bigint(20) NOT NULL,
  `end_ip` bigint(20) NOT NULL,
  `country_code` varchar(2) NOT NULL,
  `country_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `GeoLiteCityBlocks`
--

CREATE TABLE IF NOT EXISTS `GeoLiteCityBlocks` (
  `startIpNum` bigint(20) NOT NULL,
  `endIpNum` bigint(20) NOT NULL,
  `locId` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `GeoLiteCityLocation`
--

CREATE TABLE IF NOT EXISTS `GeoLiteCityLocation` (
  `locId` int(11) NOT NULL,
  `country` varchar(2) NOT NULL,
  `region` varchar(2) NOT NULL,
  `city` varchar(255) NOT NULL,
  `postalCode` varchar(8) NOT NULL,
  `latitude` decimal(10,0) NOT NULL,
  `longitude` decimal(10,0) NOT NULL,
  `metroCode` varchar(3) DEFAULT NULL,
  `areaCode` varchar(3) DEFAULT NULL,
  UNIQUE KEY `locId` (`locId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `position`
--

CREATE TABLE IF NOT EXISTS `position` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `ip` varchar(15) NOT NULL,
  `locId` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
