-- phpMyAdmin SQL Dump
-- version 3.5.8.2
-- http://www.phpmyadmin.net
--
-- Host: sql101.byethost7.com
-- Generation Time: Oct 20, 2013 at 01:51 AM
-- Server version: 5.6.13-56
-- PHP Version: 5.3.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `b7_13475641_test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `issue`
--

CREATE TABLE IF NOT EXISTS `issue` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `name` varchar(80) NOT NULL,
  `link` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COMMENT='議題表' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `issue`
--

INSERT INTO `issue` (`id`, `name`, `link`) VALUES
(1, '多元成家方案', ''),
(2, '水土保持修正條例', ''),
(3, '軍審法修正案', NULL),
(4, '服貿條例逐條審查', NULL),
(5, '核四續建', NULL),
(6, '拆除美麗灣', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ivsm`
--

CREATE TABLE IF NOT EXISTS `ivsm` (
  `mid` int(10) NOT NULL,
  `isid` int(10) NOT NULL,
  `vote` int(1) NOT NULL,
  `scale` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ivsm`
--

INSERT INTO `ivsm` (`mid`, `isid`, `vote`, `scale`) VALUES
(3, 1, 1, 10),
(3, 4, -1, 60),
(3, 2, 1, 1),
(3, 3, -1, 50),
(3, 5, -1, 99),
(1, 1, 1, 123),
(1, 2, 1, 10),
(1, 3, -1, 99),
(1, 5, -1, 999),
(9, 1, -1, 1),
(9, 0, 0, 0),
(11, 1, 1, 100),
(12, 4, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ivsp`
--

CREATE TABLE IF NOT EXISTS `ivsp` (
  `pid` int(10) NOT NULL,
  `isid` int(10) NOT NULL,
  `vote` int(1) NOT NULL,
  `scale` int(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ivsp`
--

INSERT INTO `ivsp` (`pid`, `isid`, `vote`, `scale`) VALUES
(1, 1, 1, 90),
(2, 1, -1, 10),
(1, 2, 1, 10),
(1, 3, -1, 50),
(2, 2, 1, 50),
(2, 3, 1, 1),
(3, 2, 1, 10),
(3, 3, -1, 90);

-- --------------------------------------------------------

--
-- Table structure for table `member_table`
--

CREATE TABLE IF NOT EXISTS `member_table` (
  `NO` int(6) NOT NULL AUTO_INCREMENT COMMENT '序號',
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `telephone` varchar(12) DEFAULT NULL,
  `address` varchar(30) DEFAULT NULL,
  `other` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`NO`),
  UNIQUE KEY `NO` (`NO`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `member_table`
--

INSERT INTO `member_table` (`NO`, `username`, `password`, `telephone`, `address`, `other`, `email`) VALUES
(1, 'bater', '1234', '0987654321', '??XXXXX', '', 'XXX@XXX.CCC'),
(3, 'aaa', '123', '123', '', '1234中文測試', ''),
(5, '12345', '12345', '', '', '', '12345@'),
(6, 'aa', 'aa', 'aa', 'aa', 'aa', 'aa'),
(7, 'Lynch', '123456', '0939755165', '新北市蘆洲區民權路5號4樓', '', 'as085777@gmail.com'),
(8, 'fred', 'fred', '', '', '', 'fred40104@yahoo.com.tw'),
(9, 'alicewei', 'alicewei', '', '', 'XDDD', 'alicewei1003@gmail.com'),
(10, 'qqq', 'qqq', '2939222929', 'esmk', '', 'qqq@w.w.w'),
(11, 'fntsrtest', 'fntsrtest', '0912345678', 'fntsrtest', 'fntsrtest', 'fntsrtest@gmail.com'),
(12, 'goodjack', 'jack', '', '', '', ''),
(13, 'lyenliang', 'qwe', '', '', '', 'i745m@hotmail.com'),
(14, 'lyenliang', '123456', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `memo`
--

CREATE TABLE IF NOT EXISTS `memo` (
  `id` int(6) NOT NULL AUTO_INCREMENT,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int(6) NOT NULL,
  `memo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `memo`
--

INSERT INTO `memo` (`id`, `time`, `userid`, `memo`) VALUES
(1, '2013-07-14 13:57:59', 1, '123'),
(2, '2013-07-14 14:10:23', 3, '1234'),
(3, '2013-07-14 14:23:26', 3, '留言'),
(4, '2013-07-14 14:23:43', 3, '樓上是笨蛋'),
(5, '2013-07-14 14:24:22', 3, '打我呀ㄎㄎ'),
(6, '2013-07-14 14:36:10', 1, '留言板好像好了'),
(7, '2013-07-14 14:36:42', 1, '但是post方法似乎不太好'),
(8, '2013-07-14 14:37:42', 1, '嘿嘿嘿'),
(9, '2013-07-14 14:15:40', 6, '123'),
(10, '2013-07-15 02:47:28', 7, '嘿~我的個資全曝光了，這是正常的嗎?'),
(11, '2013-10-13 21:36:30', 8, 'f '),
(12, '2013-10-13 21:36:38', 8, 'fffff'),
(13, '2013-10-13 21:41:01', 8, 'freferferferfev'),
(14, '2013-10-13 21:41:20', 8, 'wefwefwefwefwe'),
(15, '2013-10-19 20:11:58', 3, 'To Lynch\r\n改好囉，現在只能看到自己的，不過請不要打上真實個資啦\r\n我現在只是玩玩測試'),
(16, '2013-10-19 20:54:20', 3, '123'),
(17, '2013-10-20 11:20:34', 11, 'kerker');

-- --------------------------------------------------------

--
-- Table structure for table `politician`
--

CREATE TABLE IF NOT EXISTS `politician` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `party` int(3) NOT NULL,
  `locat` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `politician`
--

INSERT INTO `politician` (`id`, `name`, `party`, `locat`) VALUES
(1, '吳育昇', 100, 100),
(2, '高金素梅', 2, 3),
(3, '王金平', 1, 1),
(4, '顏清標', 0, 0),
(5, '段宜康', 0, 0),
(6, '顏清標', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
