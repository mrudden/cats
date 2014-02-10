-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 09, 2014 at 11:14 PM
-- Server version: 5.5.35-cll
-- PHP Version: 5.3.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mrudnet_cats`
--

-- --------------------------------------------------------

--
-- Table structure for table `cats`
--

CREATE TABLE IF NOT EXISTS `cats` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(24) DEFAULT NULL,
  `ears` varchar(20) DEFAULT NULL,
  `earspattern` varchar(12) DEFAULT NULL,
  `face` varchar(20) DEFAULT NULL,
  `facepattern` varchar(12) DEFAULT NULL,
  `torso` varchar(20) DEFAULT NULL,
  `torsopattern` varchar(12) DEFAULT NULL,
  `frontpaws` varchar(20) DEFAULT NULL,
  `frontpawspattern` varchar(12) DEFAULT NULL,
  `backpaws` varchar(20) DEFAULT NULL,
  `backpawspattern` varchar(12) DEFAULT NULL,
  `tail` varchar(20) DEFAULT NULL,
  `tailpattern` varchar(12) DEFAULT NULL,
  `action` varchar(36) DEFAULT NULL,
  `musicalinstrument` varchar(36) DEFAULT NULL,
  `email` varchar(48) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `cats`
--

INSERT INTO `cats` (`id`, `name`, `ears`, `earspattern`, `face`, `facepattern`, `torso`, `torsopattern`, `frontpaws`, `frontpawspattern`, `backpaws`, `backpawspattern`, `tail`, `tailpattern`, `action`, `musicalinstrument`, `email`) VALUES
(1, 'Princess Zelda', 'black', 'solid', 'black, white', 'halfandhalf', 'black, white', 'tuxedo', 'white', 'solid', 'white', 'solid', 'black', 'solid', 'Sleeping on my mom''s head', NULL, 'michael.rudden1@marist.edu'),
(2, 'Coal', 'black', 'solid', 'black', 'solid', 'black', 'solid', 'black', 'solid', 'black', 'solid', 'black', 'solid', 'Clawing at my hands', NULL, 'michael.rudden1@marist.edu'),
(3, 'Angus', 'brown', 'solid', 'brown, white', 'halfandhalf', 'brown, white', 'spots', 'brown', 'solid', 'brown, white', 'spots', 'brown', 'solid', 'Playing fetch', '', 'michael.rudden1@marist.edu'),
(9, 'Master Chief', 'brown', 'solid', 'brown, white', 'spots', 'brown, white', 'spots', 'white', 'solid', 'brown', 'solid', 'brown', 'solid', 'Eating mints', '', 'michael.rudden1@marist.edu'),
(24, 'Snowball', 'Black', 'solid', 'Black and White', 'halfandhalf', 'White', 'solid', 'White', 'solid', 'White', 'solid', 'Black', 'solid', 'Hunting chipmunks', 'Clarinet', 'colinoftheturks@gmail.com'),
(32, 'Serious Cat', 'White', 'solid', 'White', 'solid', 'White', 'solid', 'White', 'solid', 'White', 'solid', 'white', 'solid', 'Serious', 'Serious cat is too serious for instr', 'y.so.srs.cat@gmail.com'),
(23, 'Meowth', 'Black', 'solid', 'off-white, beige', 'solid', 'off-white, beige', 'solid', 'off-white, beige', 'solid', 'off-white, beige', 'solid', 'brown', 'halfandhalf', 'FURRY SWIPEZ', 'vocals thatsssss right', 'plporsche@juno.com'),
(33, 'Zero', '', 'solid', '', 'solid', '', 'solid', '', 'solid', '', 'solid', '', 'solid', '', '', 'matthew.johnson1@marist.edu'),
(29, 'cat', 'brown', 'solid', 'black', 'solid', 'orange', 'solid', 'white', 'solid', 'white', 'solid', 'green', 'solid', '', '', 'ilikecats@aol.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `email` varchar(48) NOT NULL,
  `password` varchar(64) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`) VALUES


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
