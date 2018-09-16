-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2018 at 06:02 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbdurian`
--

-- --------------------------------------------------------

--
-- Table structure for table `cf_log`
--

CREATE TABLE `cf_log` (
  `id` bigint(20) NOT NULL,
  `logstr` text,
  `id_user` int(11) DEFAULT NULL,
  `logdatetime` datetime DEFAULT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `cf_log_userlogin`
--

CREATE TABLE `cf_log_userlogin` (
  `autoid` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `logdatetime` datetime NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_event`
--

CREATE TABLE `tbl_event` (
  `event_id` int(11) NOT NULL,
  `event_title` varchar(255) NOT NULL,
  `event_start` datetime NOT NULL,
  `event_end` datetime NOT NULL,
  `event_url` varchar(255) NOT NULL,
  `event_allDay` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_amphur`
--

CREATE TABLE `tb_amphur` (
  `idamphur` int(11) NOT NULL,
  `amphur` varchar(100) NOT NULL,
  `amp_keyman` varchar(500) DEFAULT NULL,
  `amp_tel` varchar(10) DEFAULT NULL,
  `amp_fax` varchar(9) DEFAULT NULL,
  `amp_website` varchar(50) DEFAULT NULL,
  `amp_facebook` varchar(45) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `amphur_shrt` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_amphur`
--

INSERT INTO `tb_amphur` (`idamphur`, `amphur`, `amp_keyman`, `amp_tel`, `amp_fax`, `amp_website`, `amp_facebook`, `status`, `amphur_shrt`) VALUES
(1, 'ลับแล', '', '', '', '', '', 1, NULL),
(2, 'เมือง', '', '', '', '', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_counter`
--

CREATE TABLE `tb_counter` (
  `id` int(11) NOT NULL,
  `day` date NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_counter`
--

INSERT INTO `tb_counter` (`id`, `day`, `total`) VALUES
(1, '2018-02-25', 4),
(2, '2018-02-26', 2),
(3, '2018-02-28', 6),
(4, '2018-03-05', 10),
(5, '2018-03-06', 2),
(6, '2018-03-07', 2),
(7, '2018-03-10', 1),
(8, '2018-03-11', 5),
(9, '2018-03-12', 2),
(10, '2018-03-15', 13),
(11, '2018-03-16', 2),
(12, '2018-03-17', 2),
(13, '2018-03-18', 1),
(14, '2018-03-19', 8),
(15, '2018-03-20', 17),
(16, '2018-03-21', 6),
(17, '2018-03-22', 2),
(18, '2018-03-26', 2),
(19, '2018-04-04', 2),
(20, '2018-04-12', 1),
(21, '2018-04-15', 2),
(22, '2018-04-23', 1),
(23, '2018-05-02', 1),
(24, '2018-05-08', 3),
(25, '2018-05-13', 2),
(26, '2018-05-18', 6),
(27, '2018-05-27', 1),
(28, '2018-06-03', 3),
(29, '2018-06-05', 2),
(30, '2018-06-06', 1),
(31, '2018-06-07', 1),
(32, '2018-06-11', 6),
(33, '2018-06-12', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_durian`
--

CREATE TABLE `tb_durian` (
  `iddurian` int(11) NOT NULL,
  `idyear` int(11) NOT NULL,
  `idtype` int(11) NOT NULL,
  `idplot` int(11) NOT NULL,
  `b_trunk` varchar(11) DEFAULT NULL,
  `e_trunk` varchar(11) DEFAULT NULL,
  `product_durian` varchar(11) DEFAULT NULL,
  `sale_durian` varchar(11) DEFAULT NULL,
  `etc` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_durian`
--

INSERT INTO `tb_durian` (`iddurian`, `idyear`, `idtype`, `idplot`, `b_trunk`, `e_trunk`, `product_durian`, `sale_durian`, `etc`) VALUES
(1, 3, 1, 3, '3', '2', '100', '300', NULL),
(2, 3, 1, 1, '30', '20', '80', '300', NULL),
(6, 3, 1, 16, '30', '', '', '', NULL),
(7, 3, 1, 23, '3', '', '', '', NULL),
(8, 3, 1, 32, '9', '9', '30', '250', NULL),
(9, 3, 1, 33, '2', '', '', '', NULL),
(10, 3, 1, 34, '2', '2', '40', '200', NULL),
(11, 3, 1, 26, '30', '', '', '', NULL),
(13, 3, 3, 0, '400', '', '', '', NULL),
(16, 3, 1, 2, '20', '50', '50', '300', NULL),
(17, 3, 1, 11, '', '', '', '', NULL),
(18, 3, 1, 10, '', '', '', '', NULL),
(19, 3, 1, 14, '4', '3', '40', '150', NULL),
(20, 3, 1, 6, '20', '', '', '', NULL),
(21, 3, 1, 29, '4', '1', '40', '150', NULL),
(22, 3, 1, 31, '20', '4', '50', '150', NULL),
(23, 3, 1, 20, '200', '150', '60', '300', NULL),
(24, 3, 1, 28, '13', '13', '30', '250', NULL),
(25, 3, 1, 19, '40', '10', '50', '150', NULL),
(26, 3, 1, 30, '33', '33', '50', '350', NULL),
(27, 3, 1, 12, '22', '20', '60', '350', NULL),
(28, 3, 1, 9, '14', '14', '25', '200', NULL),
(29, 3, 1, 8, '5', '1', '15', '250', NULL),
(30, 3, 1, 15, '18', '18', '60', '300', NULL),
(31, 3, 1, 17, '9', '9', '300', '300', NULL),
(32, 3, 1, 25, '20', '8', '40', '250', NULL),
(33, 3, 1, 21, '20', '10', '100', '280', NULL),
(34, 3, 1, 18, '20', '14', '100', '300', NULL),
(35, 3, 1, 7, '25', '10', '80', '300', NULL),
(36, 3, 1, 27, '40', '30', '50', '300', NULL),
(37, 3, 1, 22, '15', '10', '40', '300', NULL),
(38, 3, 1, 13, '50', '20', '70', '300', NULL),
(39, 3, 1, 44, '2', '2', '8', '250', NULL),
(40, 3, 1, 43, '75', '60', '10', '250', NULL),
(41, 3, 1, 42, '50', '45', '10', '250', NULL),
(42, 3, 1, 41, '65', '30', '12', '250', NULL),
(43, 3, 1, 40, '9', '9', '10', '250', NULL),
(44, 3, 1, 39, '10', '10', '10', '250', NULL),
(45, 3, 1, 38, '10', '10', '10', '250', NULL),
(46, 3, 1, 37, '25', '25', '10', '250', NULL),
(47, 3, 1, 36, '2', '2', '8', '250', NULL),
(48, 3, 1, 47, '20', '15', '30', '400', NULL),
(49, 3, 1, 49, '50', '30', '10', '400', NULL),
(50, 3, 1, 58, '35', '20', '10', '300', NULL),
(51, 3, 1, 50, '55', '45', '20', '300', NULL),
(52, 3, 1, 56, '12', '10', '30', '300', NULL),
(53, 3, 1, 60, '25', '20', '30', '300', NULL),
(54, 3, 1, 46, '5', '3', '30', '250', NULL),
(55, 3, 1, 48, '60', '14', '35', '300', NULL),
(56, 3, 1, 57, '14', '14', '10', '250', NULL),
(57, 3, 1, 52, '12', '12', '10', '250', NULL),
(58, 3, 1, 51, '13', '3', '40', '200', NULL),
(59, 3, 1, 59, '30', '10', '10', '250', NULL),
(60, 3, 1, 53, '10', '5', '30', '250', NULL),
(61, 3, 1, 55, '20', '15', '30', '300', NULL),
(62, 3, 1, 45, '30', '15', '30', '250', NULL),
(63, 3, 1, 54, '20', '10', '30', '250', NULL),
(64, 3, 1, 61, '30', '10', '30', '200', NULL),
(65, 5, 2, 63, '22', '22', '22', '22', NULL),
(66, 5, 1, 64, '50', '40', '20', '250', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_group`
--

CREATE TABLE `tb_group` (
  `idgroup` int(11) NOT NULL,
  `groupname` varchar(50) DEFAULT NULL,
  `detail` varchar(50) DEFAULT NULL,
  `address` int(1) DEFAULT NULL,
  `keyman` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_group`
--

INSERT INTO `tb_group` (`idgroup`, `groupname`, `detail`, `address`, `keyman`) VALUES
(1, 'บ้านด่านนาขาม', 'บ้านด่านนาขาม', NULL, ''),
(2, 'กลุ่มนานกกก', '', NULL, ''),
(3, 'แม่พูล', '', NULL, ''),
(4, 'กลุ่มอื่นๆ', 'ยังไม่ได้ระบุกลุ่ม หรือจัดตั้งกลุ่ม', NULL, '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_information`
--

CREATE TABLE `tb_information` (
  `autoid` int(11) NOT NULL,
  `day_in` date NOT NULL,
  `versions` varchar(25) NOT NULL,
  `detail` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tb_managers_user`
--

CREATE TABLE `tb_managers_user` (
  `id_user` int(11) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `profile_pic` varchar(20) NOT NULL,
  `reg_day` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_managers_user`
--

INSERT INTO `tb_managers_user` (`id_user`, `firstname`, `lastname`, `username`, `password`, `profile_pic`, `reg_day`) VALUES
(1, 'admin', 'administrator', 'admin', 'admin', 'pic_tQvWx71WPr.png', '2014-12-17'),
(2, 'Admin', 'URU', 'phai', '1534', 'pic_c0kXjs0RcT.jpg', '2014-12-17');

-- --------------------------------------------------------

--
-- Table structure for table `tb_moo`
--

CREATE TABLE `tb_moo` (
  `idmoo` int(11) NOT NULL,
  `idtambon` int(11) DEFAULT NULL,
  `moo` varchar(50) DEFAULT NULL,
  `moo_eng` varchar(50) DEFAULT NULL,
  `m_address` varchar(100) DEFAULT NULL,
  `m_tel` varchar(10) DEFAULT NULL,
  `m_website` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_moo`
--

INSERT INTO `tb_moo` (`idmoo`, `idtambon`, `moo`, `moo_eng`, `m_address`, `m_tel`, `m_website`, `status`) VALUES
(1, 1, 'บ้านไฮฮ้า หมู่ 7', '', '', '', '', '1'),
(2, 1, 'บ้านปางต้นผึ้ง หมู่ 8', '', '', '', '', '1'),
(3, 1, 'บ้านน้ำไคร้ หมู่ 9', '', '', '', '', '1'),
(4, 1, 'บ้านห้วยเกียงพา หมู่ 10', '', '', '', '', '1'),
(5, 3, 'หมู่7', '', '', '', '', '1'),
(6, 3, 'หมู่4', '', '', '', '', '1'),
(7, 3, 'หมู่10', '', '', '', '', '1'),
(8, 2, 'หมู่1', '', '', '', '', '1'),
(9, 2, 'หมู่3', '', '', '', '', '1'),
(10, 2, 'หมู่4', '', '', '', '', '1'),
(11, 3, 'หมู่2', '', '', '', '', '1'),
(12, 3, 'หมู่6', '', '', '', '', '1'),
(13, 1, 'บ้านด่าน หมู่ 1', '', '', '', '', '1'),
(14, 1, 'บ้านด่าน หมู่ 2', '', '', '', '', '1'),
(15, 1, 'บ้านปากเฉย หมู่ 3', '', '', '', '', '1'),
(16, 1, 'บ้านหน้าฝาย หมู่ 4', '', '', '', '', '1'),
(17, 1, 'บ้านแม่เฉย หมู่ 5', '', '', '', '', '1'),
(18, 1, 'บ้านห้วยกั้ง หมู่ 6', '', '', '', '', '1'),
(19, 1, 'บ้านม่อนหัวฝาย หมู่ 11', '', '', '', '', '1'),
(20, 1, 'บ้านหนองน้ำเขียว หมู่ 12', '', '', '', '', '1'),
(21, 1, 'บ้านป่าหว่าน หมู่ 13', '', '', '', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_news`
--

CREATE TABLE `tb_news` (
  `news_id` int(11) NOT NULL,
  `day_in` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `detail` mediumtext NOT NULL,
  `count_view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`news_id`, `day_in`, `title`, `detail`, `count_view`) VALUES
(1, '2016-03-14', 'ช่วงนำเข้าข้อมูลระบบ', 'สำรวจและนำเข้าข้อมูลเกษตรกร พื้นที่เพาะปลูก และผลผลิตทุเรียน', 8),
(3, '2018-02-22', 'อัพเดทระบบสมาชิก', 'ระบบฐานข้อมูลได้อัพเดทระบบสมาชิก โดยสามารถเชื่อมโยงกับบัญชีเฟสบุ๊คได้ เพื่อความสะดวกในการเข้าใช้ระบบของสมาชิกรายบุคคล', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_item`
--

CREATE TABLE `tb_news_item` (
  `autoid` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_value` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_news_item`
--

INSERT INTO `tb_news_item` (`autoid`, `news_id`, `file_name`, `file_value`) VALUES
(1, 2, 'asd', 'news_q684BJ77Rq.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plot`
--

CREATE TABLE `tb_plot` (
  `idplot` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `codeplot` varchar(10) DEFAULT NULL,
  `arear` varchar(200) DEFAULT NULL,
  `water` varchar(100) DEFAULT NULL,
  `temp` varchar(20) DEFAULT NULL,
  `damp` varchar(20) DEFAULT NULL,
  `soil` varchar(100) DEFAULT NULL,
  `picture` varchar(20) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plot`
--

INSERT INTO `tb_plot` (`idplot`, `iduser`, `codeplot`, `arear`, `water`, `temp`, `damp`, `soil`, `picture`, `comment`) VALUES
(1, 1, 'PN1-1', '', '', '', '', '', NULL, ''),
(2, 2, 'PN2-1', '', '', '', '', '', NULL, ''),
(3, 11, 'PN11-1', '', '', '', '', '', NULL, ''),
(6, 9, 'PN9-1', '', '', '', '', '', NULL, ''),
(7, 26, 'PN26-1', '', '', '', '', '', NULL, ''),
(8, 20, 'PN20-1', '', '', '', '', '', NULL, ''),
(9, 19, 'PN19-1', '', '', '', '', '', NULL, ''),
(10, 3, 'PN3-1', '', '', '', '', '', NULL, ''),
(11, 6, 'PN6-1', '', '', '', '', '', NULL, ''),
(12, 18, 'PN18-1', '', '', '', '', '', NULL, ''),
(13, 29, 'PN29-1', '', '', '', '', '', NULL, ''),
(14, 8, 'PN8-1', '', '', '', '', '', NULL, ''),
(15, 21, 'PN21-1', '', '', '', '', '', NULL, ''),
(16, 4, 'PN4-1', '', '', '', '', '', NULL, ''),
(17, 22, 'PN22-1', '', '', '', '', '', NULL, ''),
(18, 25, 'PN25-1', '', '', '', '', '', NULL, ''),
(19, 16, 'PN16-1', '', '', '', '', '', NULL, ''),
(20, 14, 'PN14-1', '', '', '', '', '', NULL, ''),
(21, 24, 'PN24-1', '', '', '', '', '', NULL, ''),
(22, 28, 'PN28-1', '', '', '', '', '', NULL, ''),
(23, 7, 'PN7-1', '', '', '', '', '', NULL, ''),
(24, 10, 'PN10-1', '', '', '', '', '', NULL, ''),
(25, 23, 'PN23-1', '', '', '', '', '', NULL, ''),
(26, 5, 'PN5-1', '', '', '', '', '', NULL, ''),
(27, 27, 'PN27-1', '', '', '', '', '', NULL, ''),
(28, 15, 'PN15-1', '', '', '', '', '', NULL, ''),
(29, 12, 'PN12-1', '', '', '', '', '', NULL, ''),
(30, 17, 'PN17-1', '', '', '', '', '', NULL, ''),
(31, 13, 'PN13-1', '', '', '', '', '', NULL, ''),
(32, 7, 'PN7-2', '', '', '', '', '', NULL, ''),
(33, 7, 'PN7-3', '', '', '', '', '', NULL, ''),
(34, 7, 'PN7-4', '', '', '', '', '', NULL, ''),
(36, 38, 'PN38-1', '', '', '', '', '', NULL, ''),
(37, 37, 'PN37-1', '', '', '', '', '', NULL, ''),
(38, 36, 'PN36-1', '', '', '', '', '', NULL, ''),
(39, 35, 'PN35-1', '', '', '', '', '', NULL, ''),
(40, 34, 'PN34-1', '', '', '', '', '', NULL, ''),
(41, 33, 'PN33-1', '', '', '', '', '', NULL, ''),
(42, 32, 'PN32-1', '', '', '', '', '', NULL, ''),
(43, 31, 'PN31-1', '', '', '', '', '', NULL, ''),
(44, 30, 'PN30-1', '', '', '', '', '', NULL, ''),
(45, 46, 'PN46-1', '', '', '', '', '', NULL, ''),
(46, 48, 'PN48-1', '', '', '', '', '', NULL, ''),
(47, 49, 'PN49-1', '', '', '', '', '', NULL, ''),
(48, 39, 'PN39-1', '', '', '', '', '', NULL, ''),
(49, 53, 'PN53-1', '', '', '', '', '', NULL, ''),
(50, 51, 'PN51-1', '', '', '', '', '', NULL, ''),
(51, 42, 'PN42-1', '', '', '', '', '', NULL, ''),
(52, 41, 'PN41-1', '', '', '', '', '', NULL, ''),
(53, 44, 'PN44-1', '', '', '', '', '', NULL, ''),
(54, 47, 'PN47-1', '', '', '', '', '', NULL, ''),
(55, 45, 'PN45-1', '', '', '', '', '', NULL, ''),
(56, 50, 'PN50-1', '', '', '', '', '', NULL, ''),
(57, 40, 'PN40-1', '', '', '', '', '', NULL, ''),
(58, 52, 'PN52-1', '', '', '', '', '', NULL, ''),
(59, 43, 'PN43-1', '', '', '', '', '', NULL, ''),
(60, 50, 'PN50-2', '', '', '', '', '', NULL, ''),
(61, 23, 'PN23-2', '', '', '', '', '', NULL, ''),
(62, 55, 'PN55-1', 'ดฟหกด', 'ฟดฟห', 'ฟหดฟห', 'ฟหด', 'ฟหกด', NULL, 'หกฟด'),
(63, 56, 'PN56-1', 'gg', 'gg', '33', '33', 'dd', NULL, 'ee'),
(64, 57, 'PN57-1', 'พื้นที่ภูเขา', '', '', '', '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_poll`
--

CREATE TABLE `tb_poll` (
  `idpoll` int(11) NOT NULL,
  `idyear` int(11) NOT NULL,
  `pollname` varchar(200) NOT NULL,
  `detail` text,
  `up_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_poll`
--

INSERT INTO `tb_poll` (`idpoll`, `idyear`, `pollname`, `detail`, `up_date`) VALUES
(3, 3, 'อายุต้นทุเรียนหลงลับแล', 'การเตรียมพื้นที่เพาะปลูกการเตรียมพื้นที่เพาะปลูกการเตรียมพื้นที่เพาะปลูกการเตรียมพื้นที่เพาะปลูกการเตรียมพื้นที่เพาะปลูกการเตรียมพื้นที่เพาะปลูก', '2017-11-26 10:47:36'),
(4, 2, 'การเก็บเกี่ยว', 'การเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยวการเก็บเกี่ยว', NULL),
(5, 3, 'รอบการออกดอกต่อปี', 'asfasfdas', '2017-11-26 10:47:36'),
(6, 3, 'รอบการตัดขายต่อปี', '2222222', '2017-11-26 10:47:36'),
(7, 3, 'ทุเรียนที่กำลังจะให้ผลผลิต', 'fsadfasdf', '2017-11-26 10:47:36'),
(9, 3, 'ช่องทางการจัดจำหน่าย', 'sdfasdfasdf', '2017-11-26 10:47:36'),
(10, 1, 'แบบสอบถามที่สอง', 'asdfasdf', '2017-11-26 10:51:22'),
(11, 1, 'ทดสอบเพิ่มแบบสอบถาม', 'fasdfasdf', '2017-11-26 10:51:22'),
(12, 5, 'อายุต้นทุเรียนหลงลับแล', '', '2018-02-28 05:16:52'),
(13, 5, 'รอบการออกดอกต่อปี', '', '2018-02-28 05:17:44'),
(14, 5, 'รอบการตัดขายต่อปี', '', '2018-02-28 05:17:44'),
(15, 5, 'ทุเรียนที่กำลังจะให้ผลผลิต', '', '2018-02-28 05:17:44'),
(16, 5, 'ช่องทางการจัดจำหน่าย', '', '2018-02-28 05:17:44');

-- --------------------------------------------------------

--
-- Table structure for table `tb_polluser`
--

CREATE TABLE `tb_polluser` (
  `idpolluser` int(11) NOT NULL,
  `idpoll` int(11) NOT NULL,
  `idtopic` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idyear` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_polluser`
--

INSERT INTO `tb_polluser` (`idpolluser`, `idpoll`, `idtopic`, `iduser`, `idyear`) VALUES
(38, 3, 5, 11, 3),
(39, 6, 11, 11, 3),
(40, 5, 13, 11, 3),
(41, 7, 20, 11, 3),
(42, 9, 22, 11, 3),
(43, 5, 14, 46, 3),
(44, 6, 12, 46, 3),
(45, 7, 20, 46, 3),
(46, 9, 21, 46, 3),
(47, 3, 5, 34, 3),
(48, 5, 13, 34, 3),
(49, 6, 11, 34, 3),
(50, 7, 17, 34, 3),
(51, 9, 21, 34, 3),
(52, 3, 3, 48, 3),
(53, 5, 13, 48, 3),
(54, 6, 12, 48, 3),
(55, 9, 23, 48, 3),
(56, 3, 5, 38, 3),
(57, 5, 13, 38, 3),
(58, 6, 11, 38, 3),
(59, 9, 21, 38, 3),
(60, 3, 4, 31, 3),
(61, 6, 11, 31, 3),
(62, 5, 13, 31, 3),
(63, 7, 18, 31, 3),
(64, 9, 21, 31, 3),
(65, 3, 3, 9, 3),
(66, 3, 4, 26, 3),
(67, 6, 12, 26, 3),
(68, 5, 14, 26, 3),
(69, 7, 20, 26, 3),
(70, 9, 22, 26, 3),
(71, 3, 5, 49, 3),
(72, 5, 14, 49, 3),
(73, 6, 16, 49, 3),
(74, 9, 21, 49, 3),
(75, 3, 4, 39, 3),
(76, 7, 19, 39, 3),
(77, 9, 22, 39, 3),
(78, 3, 4, 20, 3),
(79, 7, 20, 20, 3),
(80, 9, 22, 20, 3),
(81, 3, 5, 19, 3),
(82, 5, 13, 19, 3),
(83, 6, 11, 19, 3),
(84, 7, 20, 19, 3),
(85, 9, 22, 19, 3),
(86, 3, 5, 32, 3),
(87, 5, 13, 32, 3),
(88, 6, 11, 32, 3),
(89, 7, 17, 32, 3),
(90, 9, 21, 32, 3),
(91, 3, 5, 36, 3),
(92, 5, 13, 36, 3),
(93, 7, 17, 36, 3),
(94, 6, 11, 36, 3),
(95, 9, 21, 36, 3),
(96, 3, 5, 1, 3),
(97, 5, 14, 1, 3),
(98, 6, 12, 1, 3),
(99, 9, 22, 1, 3),
(100, 7, 18, 1, 3),
(101, 3, 5, 33, 3),
(102, 5, 13, 33, 3),
(103, 6, 11, 33, 3),
(104, 7, 18, 33, 3),
(105, 9, 21, 33, 3),
(106, 3, 4, 53, 3),
(107, 5, 14, 53, 3),
(108, 6, 12, 53, 3),
(109, 7, 17, 53, 3),
(110, 9, 21, 53, 3),
(111, 3, 5, 18, 3),
(112, 5, 14, 18, 3),
(113, 6, 12, 18, 3),
(114, 7, 20, 18, 3),
(115, 9, 22, 18, 3),
(116, 3, 5, 35, 3),
(117, 5, 13, 35, 3),
(118, 9, 21, 35, 3),
(119, 3, 5, 29, 3),
(120, 5, 14, 29, 3),
(121, 6, 16, 29, 3),
(122, 7, 20, 29, 3),
(123, 9, 22, 29, 3),
(124, 3, 5, 51, 3),
(125, 5, 14, 51, 3),
(126, 6, 12, 51, 3),
(127, 7, 18, 51, 3),
(128, 9, 21, 51, 3),
(129, 3, 5, 8, 3),
(130, 5, 14, 8, 3),
(131, 6, 12, 8, 3),
(132, 7, 19, 8, 3),
(133, 9, 22, 8, 3),
(134, 3, 5, 21, 3),
(135, 5, 14, 21, 3),
(136, 6, 12, 21, 3),
(137, 9, 21, 21, 3),
(138, 3, 5, 43, 3),
(139, 6, 12, 43, 3),
(140, 7, 17, 43, 3),
(141, 9, 21, 43, 3),
(142, 3, 5, 2, 3),
(143, 5, 14, 2, 3),
(144, 6, 12, 2, 3),
(145, 7, 19, 2, 3),
(146, 9, 22, 2, 3),
(147, 3, 4, 4, 3),
(148, 5, 14, 45, 3),
(149, 6, 12, 45, 3),
(150, 9, 21, 45, 3),
(151, 3, 5, 22, 3),
(152, 5, 14, 22, 3),
(153, 6, 12, 22, 3),
(154, 7, 20, 22, 3),
(155, 9, 22, 22, 3),
(156, 3, 4, 25, 3),
(157, 5, 14, 25, 3),
(158, 6, 12, 25, 3),
(159, 7, 20, 25, 3),
(160, 9, 22, 25, 3),
(161, 3, 5, 16, 3),
(162, 5, 14, 16, 3),
(163, 6, 12, 16, 3),
(164, 7, 20, 16, 3),
(165, 9, 22, 16, 3),
(166, 3, 5, 52, 3),
(167, 5, 14, 52, 3),
(168, 6, 12, 52, 3),
(169, 9, 21, 52, 3),
(170, 3, 5, 14, 3),
(171, 5, 14, 14, 3),
(172, 6, 12, 14, 3),
(173, 7, 20, 14, 3),
(174, 9, 22, 14, 3),
(175, 3, 3, 40, 3),
(176, 3, 5, 24, 3),
(177, 6, 12, 24, 3),
(178, 7, 19, 24, 3),
(179, 9, 22, 24, 3),
(180, 5, 14, 24, 3),
(181, 3, 5, 28, 3),
(182, 5, 13, 28, 3),
(183, 6, 16, 28, 3),
(184, 7, 20, 28, 3),
(185, 9, 22, 28, 3),
(186, 3, 4, 7, 3),
(187, 5, 14, 7, 3),
(188, 7, 20, 7, 3),
(189, 9, 21, 7, 3),
(190, 3, 5, 50, 3),
(191, 5, 14, 50, 3),
(192, 6, 12, 50, 3),
(193, 7, 20, 50, 3),
(194, 9, 22, 50, 3),
(195, 5, 14, 23, 3),
(196, 6, 12, 23, 3),
(197, 3, 4, 23, 3),
(198, 7, 20, 23, 3),
(199, 9, 21, 23, 3),
(200, 3, 3, 5, 3),
(201, 3, 5, 27, 3),
(202, 5, 14, 27, 3),
(203, 7, 20, 27, 3),
(204, 9, 21, 27, 3),
(205, 3, 5, 37, 3),
(206, 5, 13, 37, 3),
(207, 6, 11, 37, 3),
(208, 9, 21, 37, 3),
(209, 3, 5, 15, 3),
(210, 5, 13, 15, 3),
(211, 6, 11, 15, 3),
(212, 9, 22, 15, 3),
(213, 3, 4, 42, 3),
(214, 5, 14, 42, 3),
(215, 6, 12, 42, 3),
(216, 7, 19, 42, 3),
(217, 9, 22, 42, 3),
(218, 3, 4, 12, 3),
(219, 6, 11, 12, 3),
(220, 5, 13, 12, 3),
(221, 7, 20, 12, 3),
(222, 9, 22, 12, 3),
(223, 3, 4, 47, 3),
(224, 6, 12, 47, 3),
(225, 7, 20, 47, 3),
(226, 9, 22, 47, 3),
(227, 3, 5, 17, 3),
(228, 5, 14, 17, 3),
(229, 6, 12, 17, 3),
(230, 9, 23, 17, 3),
(231, 3, 5, 30, 3),
(232, 5, 13, 30, 3),
(233, 6, 11, 30, 3),
(234, 7, 17, 30, 3),
(235, 9, 21, 30, 3),
(236, 3, 5, 13, 3),
(237, 6, 11, 13, 3),
(238, 7, 17, 13, 3),
(239, 9, 22, 13, 3),
(240, 5, 14, 44, 3),
(241, 6, 12, 44, 3),
(242, 9, 21, 44, 3),
(243, 3, 3, 41, 3),
(245, 14, 31, 55, 5),
(246, 12, 24, 56, 5),
(247, 14, 30, 56, 5),
(248, 13, 28, 56, 5),
(249, 15, 35, 56, 5),
(250, 16, 38, 56, 5),
(251, 12, 25, 57, 5),
(252, 14, 31, 57, 5),
(253, 16, 38, 57, 5),
(254, 13, 28, 57, 5),
(255, 15, 34, 57, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_problem`
--

CREATE TABLE `tb_problem` (
  `idproblem` int(11) NOT NULL,
  `idyear` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_problem`
--

INSERT INTO `tb_problem` (`idproblem`, `idyear`, `iduser`, `problem`) VALUES
(2, 5, 55, 'test'),
(3, 5, 56, 'pppp');

-- --------------------------------------------------------

--
-- Table structure for table `tb_search`
--

CREATE TABLE `tb_search` (
  `idsearch` int(11) NOT NULL,
  `keyword` varchar(200) CHARACTER SET utf8 NOT NULL,
  `sdate` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `etc` varchar(100) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_search`
--

INSERT INTO `tb_search` (`idsearch`, `keyword`, `sdate`, `etc`) VALUES
(1, 'อรุณ', '2016-03-11', NULL),
(2, 'อรุณ', '2016-03-11', NULL),
(3, 'อรุณ', '2016-03-11', NULL),
(4, 'เม', '2016-03-12', NULL),
(5, 'เม', '2016-03-12', NULL),
(6, 'ถนอม', '2016-09-09', NULL),
(7, 'ถนอม', '2016-09-09', NULL),
(8, 'ถนอม', '2016-09-09', NULL),
(9, 'ถนอม', '2016-09-09', NULL),
(10, 'ถนอม', '2016-09-09', NULL),
(11, '123', '2017-03-09', NULL),
(12, '123', '2017-03-09', NULL),
(13, '123', '2017-03-09', NULL),
(14, '123', '2017-03-09', NULL),
(15, '123', '2017-03-09', NULL),
(16, '123', '2017-03-09', NULL),
(17, '123', '2017-03-09', NULL),
(18, '123', '2017-03-09', NULL),
(19, '123', '2017-03-09', NULL),
(20, '123', '2017-03-09', NULL),
(21, '123', '2017-03-09', NULL),
(22, '123', '2017-03-09', NULL),
(23, '123', '2017-03-09', NULL),
(24, '123', '2017-03-09', NULL),
(25, '123', '2017-03-09', NULL),
(26, '123', '2017-03-09', NULL),
(27, '123', '2017-03-09', NULL),
(28, '123', '2017-03-09', NULL),
(29, '123', '2017-03-09', NULL),
(30, '123', '2017-03-09', NULL),
(31, '123', '2017-03-09', NULL),
(32, '123', '2017-03-09', NULL),
(33, '123', '2017-03-09', NULL),
(34, '123', '2017-03-09', NULL),
(35, '123', '2017-03-09', NULL),
(36, '123', '2017-03-09', NULL),
(37, '123', '2017-03-09', NULL),
(38, '123', '2017-03-09', NULL),
(39, '123', '2017-03-09', NULL),
(40, '123', '2017-03-09', NULL),
(41, '123', '2017-03-09', NULL),
(42, '123', '2017-03-09', NULL),
(43, '123', '2017-03-09', NULL),
(44, '123', '2017-03-09', NULL),
(45, '123', '2017-03-09', NULL),
(46, '123', '2017-03-09', NULL),
(47, '123', '2017-03-09', NULL),
(48, '123', '2017-03-09', NULL),
(49, '123 order by 9--', '2017-03-09', NULL),
(50, '123 order by 10--', '2017-03-09', NULL),
(51, '123 order by 100--', '2017-03-09', NULL),
(52, '123', '2017-03-09', NULL),
(53, '123 orde rby 100000--', '2017-03-09', NULL),
(54, '123 order by 100000--', '2017-03-09', NULL),
(55, '123', '2017-03-09', NULL),
(56, '123', '2017-03-09', NULL),
(57, '123', '2017-03-09', NULL),
(58, '123', '2017-03-09', NULL),
(59, '123', '2017-03-09', NULL),
(60, '123', '2017-03-09', NULL),
(61, '123', '2017-03-09', NULL),
(62, '123', '2017-03-09', NULL),
(63, '123', '2017-03-09', NULL),
(64, '123', '2017-03-09', NULL),
(65, '123', '2017-03-09', NULL),
(66, '123', '2017-03-09', NULL),
(67, '123', '2017-03-09', NULL),
(68, '123', '2017-03-09', NULL),
(69, '123', '2017-03-09', NULL),
(70, '123', '2017-03-09', NULL),
(71, '123', '2017-03-09', NULL),
(72, '123', '2017-03-09', NULL),
(73, '123', '2017-03-09', NULL),
(74, '123', '2017-03-09', NULL),
(75, '123', '2017-03-09', NULL),
(76, '123', '2017-03-09', NULL),
(77, '123', '2017-03-09', NULL),
(78, '123', '2017-03-09', NULL),
(79, '123', '2017-03-09', NULL),
(80, '123', '2017-03-09', NULL),
(81, '123', '2017-03-09', NULL),
(82, '123', '2017-03-09', NULL),
(83, '123', '2017-03-09', NULL),
(84, 'root', '2017-03-09', NULL),
(85, 'root', '2017-03-09', NULL),
(86, '123', '2017-03-09', NULL),
(87, '123', '2017-03-09', NULL),
(88, '123', '2017-03-09', NULL),
(89, '123', '2017-03-09', NULL),
(90, '123', '2017-03-09', NULL),
(91, '123', '2017-03-09', NULL),
(92, '123', '2017-03-09', NULL),
(93, '123', '2017-03-09', NULL),
(94, '123', '2017-03-09', NULL),
(95, '123', '2017-03-09', NULL),
(96, 'พนัส', '2017-03-15', NULL),
(97, 'undefined', '2017-11-26', NULL),
(98, 'undefined', '2017-11-26', NULL),
(99, 'ภา', '2018-02-22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tambon`
--

CREATE TABLE `tb_tambon` (
  `idtambon` int(11) NOT NULL,
  `idamphur` int(11) NOT NULL,
  `tambon` varchar(50) NOT NULL,
  `tam_keyman` varchar(100) DEFAULT NULL,
  `tam_tel` varchar(10) DEFAULT NULL,
  `tam_website` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_tambon`
--

INSERT INTO `tb_tambon` (`idtambon`, `idamphur`, `tambon`, `tam_keyman`, `tam_tel`, `tam_website`, `status`) VALUES
(1, 2, 'บ้านด่านนาขาม', '', '', '', 1),
(2, 1, 'นานกกก', '', '', '', 1),
(3, 1, 'แม่พูล', '', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_topic`
--

CREATE TABLE `tb_topic` (
  `idtopic` int(11) NOT NULL,
  `idpoll` int(11) NOT NULL,
  `topicname` varchar(150) NOT NULL,
  `detail` text,
  `score` int(11) NOT NULL DEFAULT '0',
  `up_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_topic`
--

INSERT INTO `tb_topic` (`idtopic`, `idpoll`, `topicname`, `detail`, `score`, `up_date`) VALUES
(2, 4, 'จ้างคนในพื้นที่', 'จ้างคนในพื้นที่จ้างคนในพื้นที่จ้างคนในพื้นที่จ้างคนในพื้นที่จ้างคนในพื้นที่จ้างคนในพื้นที่', 0, NULL),
(3, 3, 'ต่ำกว่า 3 ปี', 'ตามธรรมชาติตามธรรมชาติตามธรรมชาติตามธรรมชาติตามธรรมชาติตามธรรมชาติ', 0, '2017-11-26'),
(4, 3, '	3-5 ปี', 'sdfasdfasd', 0, '2017-11-26'),
(5, 3, 'มากกว่า 5 ปี', 'asdfsadf', 0, '2017-11-26'),
(11, 6, '	1 ครั้งต่อปี', 'fasdf', 0, '2017-11-26'),
(12, 6, '2 ครั้งต่อปี', 'asdfasdf', 0, '2017-11-26'),
(13, 5, '1 ครั้งต่อปี', '', 0, '2017-11-26'),
(14, 5, '2 ครั้งต่อปี', '', 0, '2017-11-26'),
(15, 5, '3 ครั้งต่อปี', '', 0, '2017-11-26'),
(16, 6, '	3 ครั้งต่อปี', '', 0, '2017-11-26'),
(17, 7, '	ภายใน 1 ปี', '', 0, '2017-11-26'),
(18, 7, 'ภายใน 2 ปี', '', 0, '2017-11-26'),
(19, 7, 'ภายใน 3 ปี', '', 0, '2017-11-26'),
(20, 7, 'มากกว่า 3 ปี', '', 0, '2017-11-26'),
(21, 9, 'ขายหน้าสวน', '', 0, '2017-11-26'),
(22, 9, 'ตลาดภายในจังหวัด', '', 0, '2017-11-26'),
(23, 9, 'ตลาดภายนอกจังหวัด', '', 0, '2017-11-26'),
(24, 12, 'ต่ำกว่า 3 ปี', '', 0, '2018-02-28'),
(25, 12, '3-5 ปี', '', 0, '2018-02-28'),
(26, 12, 'มากกว่า 5 ปี', '', 0, '2018-02-28'),
(27, 13, '1 ครั้งต่อปี', '', 0, '2018-02-28'),
(28, 13, '2 ครั้งต่อปี', '', 0, '2018-02-28'),
(29, 13, '3 ครั้งต่อปี', '', 0, '2018-02-28'),
(30, 14, '1 ครั้งต่อปี', '', 0, '2018-02-28'),
(31, 14, '2 ครั้งต่อปี', '', 0, '2018-02-28'),
(32, 14, '3 ครั้งต่อปี', '', 0, '2018-02-28'),
(33, 15, 'ภายใน 1 ปี', '', 0, '2018-02-28'),
(34, 15, 'ภายใน 2 ปี', '', 0, '2018-02-28'),
(35, 15, 'ภายใน 3 ปี', '', 0, '2018-02-28'),
(36, 15, 'มากกว่า 3 ปี', '', 0, '2018-02-28'),
(37, 16, 'ขายหน้าสวน', '', 0, '2018-02-28'),
(38, 16, 'ตลาดภายในจังหวัด', '', 0, '2018-02-28'),
(39, 16, 'ตลาดภายนอกจังหวัด', '', 0, '2018-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `tb_type`
--

CREATE TABLE `tb_type` (
  `idtype` int(11) NOT NULL,
  `nametype` varchar(100) NOT NULL,
  `detail` text,
  `picture` varchar(20) DEFAULT NULL,
  `comment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_type`
--

INSERT INTO `tb_type` (`idtype`, `nametype`, `detail`, `picture`, `comment`) VALUES
(5, 'หลงลับแล', 'หลงลับแล', 'rf_GxEdk.jpg', NULL),
(6, 'หลินลับแล', 'หลินลับแล', NULL, NULL),
(7, 'พื้นเมือง', 'พื้นเมือง', NULL, NULL),
(8, 'หมอนทอง', 'หมอนทอง', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `code` varchar(45) DEFAULT NULL,
  `prefix` varchar(45) DEFAULT NULL,
  `cf_aca_position` varchar(45) DEFAULT NULL,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `hnumber` varchar(45) DEFAULT NULL,
  `cardnumber` varchar(45) DEFAULT NULL,
  `birtdate` varchar(45) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `postcode` varchar(45) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `mobile` varchar(45) DEFAULT NULL,
  `fax` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `picture` varchar(45) DEFAULT NULL,
  `idmoo` varchar(45) DEFAULT NULL,
  `idtambon` varchar(45) DEFAULT NULL,
  `idamphur` varchar(45) DEFAULT NULL,
  `idgroup` varchar(45) DEFAULT NULL,
  `facebook` varchar(50) DEFAULT NULL,
  `permit` varchar(1) DEFAULT NULL,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  `cf_userlevel` varchar(1) DEFAULT NULL,
  `cf_slevel` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `code`, `prefix`, `cf_aca_position`, `firstname`, `lastname`, `hnumber`, `cardnumber`, `birtdate`, `address`, `postcode`, `tel`, `mobile`, `fax`, `email`, `picture`, `idmoo`, `idtambon`, `idamphur`, `idgroup`, `facebook`, `permit`, `username`, `password`, `status`, `update_time`, `cf_userlevel`, `cf_slevel`) VALUES
(1, NULL, '1', NULL, 'ป่วน', 'บางแช่ม', '86/2', NULL, NULL, NULL, NULL, '0910256916', NULL, NULL, '', NULL, '4', '1', '2', '1', NULL, '1', 'aa', 'aa', '1', NULL, '1', NULL),
(2, NULL, '1', NULL, 'สมบูรณ์', 'ดอกไม้', '90/1', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '4', '1', '2', '1', NULL, '1', 'bb', 'bb', '1', NULL, '2', NULL),
(3, NULL, '1', NULL, 'ประดิษฐ์', 'คลองสุข', '88', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, '1', 'cc', 'cc', '1', NULL, '3', NULL),
(4, NULL, '1', NULL, 'สมบูรณ์', 'ก้อนจินดา', '78', NULL, NULL, NULL, NULL, '0861992521', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(5, NULL, '1', NULL, 'อุดร', 'มะโนรส', '86', NULL, NULL, NULL, NULL, '0810435239', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(6, NULL, '1', NULL, 'พนัส', 'เยาวรัตน์', '101', NULL, NULL, NULL, NULL, '0613739202', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(7, NULL, '1', NULL, 'อรุณ', 'คำแดง', '106', NULL, NULL, NULL, NULL, '0895682516', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(8, NULL, '1', NULL, 'วุฒิชัย', 'คงยืน', '18', NULL, NULL, NULL, NULL, '0808437097', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(9, NULL, '1', NULL, 'ธีระ', 'สุทธิเจริญ', '96', NULL, NULL, NULL, NULL, '0619945639', NULL, NULL, '', NULL, '4', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(11, NULL, '1', NULL, 'คำมูล', 'บางจู', '83', NULL, NULL, NULL, NULL, '0806893470', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(12, NULL, '1', NULL, 'เมธี', 'พันสา', '121', NULL, NULL, NULL, NULL, '082253927', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(13, NULL, '1', NULL, 'โท่น', 'ดีมี', '101/2', NULL, NULL, NULL, NULL, '0848197980', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(14, NULL, '2', NULL, 'สุวิชา', 'วงษ์ญาติ', '100', NULL, NULL, NULL, NULL, '0878420242', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(15, NULL, '1', NULL, 'เฉลิมวุฒิ', 'ยาอยู่สุข', '134', NULL, NULL, NULL, NULL, '0986757219', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(16, NULL, '2', NULL, 'สุภาภรณ์', 'อินทร์หม่อม', '237', NULL, NULL, NULL, NULL, '08620999', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(17, NULL, '1', NULL, 'แปลก', 'พิมพ์ภา', '191', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(18, NULL, '1', NULL, 'มนัด', 'กระดิ่ง', '71', NULL, NULL, NULL, NULL, '0828812314', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(19, NULL, '2', NULL, 'ปนิภาดา', 'วารี', '29', NULL, NULL, NULL, NULL, '0968032952', NULL, NULL, '', NULL, '1', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(20, NULL, '1', NULL, 'บุญธรรม', 'อินสองใจ', '63/2', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '2', '1', '2', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(21, NULL, '1', NULL, 'สมคิด', 'เชียงพันธ์', '117', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, 'ff', 'ff', NULL, NULL, '2', NULL),
(22, NULL, '1', NULL, 'สวิง', 'เชียงพันธ์', '117', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(23, NULL, '1', NULL, 'อำพล', 'วิริยา', '226', NULL, NULL, NULL, NULL, '0857265530', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(24, NULL, '1', NULL, 'อดุลย์', 'ศรีสืบวงษ์', '241/1', NULL, NULL, NULL, NULL, '0985659699', NULL, NULL, '', NULL, '6', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(25, NULL, '1', NULL, 'สุทด', 'มะลิคำ', '58', NULL, NULL, NULL, NULL, '0857285598', NULL, NULL, '', NULL, '7', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(26, NULL, '1', NULL, 'บรรจง', 'คุ้มสุวรรณ์', '103/1', NULL, NULL, NULL, NULL, '0821969298', NULL, NULL, '', NULL, '6', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(27, NULL, '1', NULL, 'เกน', 'จอนลังกา', '5', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '7', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(28, NULL, '1', NULL, 'อนันต์', 'คำเงิน', '16', NULL, NULL, NULL, NULL, '0825110041', NULL, NULL, '', NULL, '7', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(29, NULL, '1', NULL, 'ลิ', 'ทีกว้าง', '59', NULL, NULL, NULL, NULL, '0819734866', NULL, NULL, '', NULL, '7', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(30, NULL, '1', NULL, 'แสงอ่อน', 'ทองแท้', '8/1', NULL, NULL, NULL, NULL, '0987302437', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, 'sang', 'sang', NULL, NULL, '2', NULL),
(31, NULL, '1', NULL, 'ถวิล', 'ปินปา', '15/1', NULL, NULL, NULL, NULL, '0987921922', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(32, NULL, '1', NULL, 'ประสิทธิ์', 'ศรีปทุม', '1/4', NULL, NULL, NULL, NULL, '0800271647', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(33, NULL, '2', NULL, 'พลอย', 'แสนอะทะ', '14/3', NULL, NULL, NULL, NULL, '0862116713', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(34, NULL, '2', NULL, 'จินดา', 'ทาวิเศษ', '10/3', NULL, NULL, NULL, NULL, '0879087607', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(35, NULL, '1', NULL, 'มอย', 'เงินหล้า', '5/8', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(36, NULL, '1', NULL, 'ปิง', 'ท้านองการ', '5/7', NULL, NULL, NULL, NULL, '0810372487', NULL, NULL, '', NULL, '8', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(37, NULL, '1', NULL, 'เจริญ', 'เพ็งดา', '29', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '9', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(38, NULL, '1', NULL, 'ถนอม', 'อินน้อม', '68/1', NULL, NULL, NULL, NULL, '0810863490', NULL, NULL, '', NULL, '10', '2', '1', '2', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(39, NULL, '1', NULL, 'บุญชู', 'เชียงส่ง', '20', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '11', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(40, NULL, '1', NULL, 'หลง', 'ต๊ะสุก', '-', NULL, NULL, NULL, NULL, '0631236912', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(41, NULL, '1', NULL, 'ไพทูรย์', 'แหยมอินดี', '253', NULL, NULL, NULL, NULL, '055457452', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(42, NULL, '1', NULL, 'เนียล', 'เชียงพันธ์', '181/1', NULL, NULL, NULL, NULL, '0862039739', NULL, NULL, '', NULL, '11', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(43, NULL, '1', NULL, 'สมชัย', 'พวงกว้าง', '120', NULL, NULL, NULL, NULL, '0862150413', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(44, NULL, '2', NULL, 'โสภา', 'เชียงพันธ์', '135', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(45, NULL, '1', NULL, 'สมหวัง', 'จรรังกา', '202', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(46, NULL, '1', NULL, 'จรัญ', 'เชียงพันธ์', '111', NULL, NULL, NULL, NULL, '0821606025', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(47, NULL, '2', NULL, 'เม้ย', 'เครือฟั้น', '218/1', NULL, NULL, NULL, NULL, '0879216860', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(48, NULL, '1', NULL, 'ดำเนิน', 'เชียงพันธ์', '117/1', NULL, NULL, NULL, NULL, '', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '2', NULL),
(49, NULL, '1', NULL, 'บัวล่อง', 'ทิพย์พรหม', '146/1', NULL, NULL, NULL, NULL, '0979280151', NULL, NULL, '', NULL, '5', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(50, NULL, '1', NULL, 'อัศวชัย', 'สังข์มูล', '9', NULL, NULL, NULL, NULL, '0848177462', NULL, NULL, '', NULL, '12', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(51, NULL, '1', NULL, 'วิรัตน์', 'สังข์มูล', '63', NULL, NULL, NULL, NULL, '0884178154', NULL, NULL, '', NULL, '12', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(52, NULL, '1', NULL, 'สุรินทร์', 'สังข์มูล', '63', NULL, NULL, NULL, NULL, '0821678506', NULL, NULL, '', NULL, '12', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(53, NULL, '1', NULL, 'พูนเล็ก', 'สังข์มูล', '63/1', NULL, NULL, NULL, NULL, '0861858925', NULL, NULL, '', NULL, '12', '3', '1', '3', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(55, NULL, '1', NULL, 'ภานุวัฒน์', 'ขันจา', '27', NULL, NULL, NULL, NULL, '-', NULL, NULL, 'mr.phanuwat@hotmail.com', NULL, '8', '2', '1', '4', '1691725884206561', '1', 'phai', '1534', NULL, '2017-09-27 05:27:40', '2', NULL),
(56, NULL, '1', NULL, 'ทดสอบ', 'ผ่านเฟส', '123', NULL, NULL, NULL, NULL, '-', NULL, NULL, 'mr.phai@hotmail.com', NULL, '1', '1', '2', '4', '798378213682207', '1', 'test', 'test', NULL, '2018-03-05 05:06:54', '3', NULL),
(57, NULL, '3', NULL, 'ปัทมพร', 'โพนปลัด', '179', NULL, NULL, NULL, NULL, '0821717543', NULL, NULL, 'pad0555019@gmail.com', NULL, '3', '1', '2', '4', NULL, NULL, 'pattamaporn', '5019', NULL, NULL, '3', NULL),
(58, NULL, NULL, NULL, 'นวพร ขันจา', '(FB)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'phanuwat@msn.com', NULL, NULL, NULL, NULL, NULL, '2363307140362149', '1', NULL, NULL, NULL, '2018-03-15 09:08:02', '3', NULL),
(59, NULL, '1', NULL, 'Phanuwatkh Khanja', '(FB)', '1', NULL, NULL, NULL, NULL, '1', NULL, NULL, 'mr.phanuwat@gmail.com', NULL, '1', '1', '2', '4', '349538455539553', '1', 'fb', 'fb', NULL, '2018-03-20 05:18:01', '3', NULL),
(62, NULL, '3', NULL, 'asdf', 'asfas', '213', NULL, NULL, NULL, NULL, '213123', NULL, NULL, '12213', NULL, '9', '2', '1', '2', NULL, NULL, '213123', '123123123', NULL, NULL, '3', NULL),
(63, NULL, '2', NULL, 'จันทร์แรม', 'โพนปลัด', '178', NULL, NULL, NULL, NULL, '08288324677', NULL, NULL, '', NULL, '6', '3', '1', '3', NULL, NULL, 'จันทร์แรม', '1111', NULL, NULL, '3', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tb_userwork`
--

CREATE TABLE `tb_userwork` (
  `iduserwork` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `idyear` int(5) NOT NULL,
  `work1` varchar(20) DEFAULT NULL,
  `work2` varchar(20) DEFAULT NULL,
  `work3` varchar(20) DEFAULT NULL,
  `work4` varchar(20) DEFAULT NULL,
  `work5` varchar(20) DEFAULT NULL,
  `work6` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_userwork`
--

INSERT INTO `tb_userwork` (`iduserwork`, `iduser`, `idyear`, `work1`, `work2`, `work3`, `work4`, `work5`, `work6`) VALUES
(1, 11, 3, '1||3', '1', '1||', '|||4', '|2|', ''),
(2, 1, 3, '||3', '2', '|2|', '|2||', '|2|', ''),
(4, 4, 3, '|2|', '', '||', '|||', '||', ''),
(5, 7, 3, '1|2|', '2', '||', '||3|4', '1|2|', ''),
(6, 5, 3, '1||', '', '||', '|||', '||', ''),
(7, 2, 3, '||3', '2', '|2|', '||3|', '|2|', ''),
(8, 8, 3, '||3', '2', '|2|', '||3|', '|2|', ''),
(9, 9, 3, '1||', '', '||', '|||', '||', ''),
(10, 12, 3, '|2|', '1', '1||', '|||4', '|2|', ''),
(11, 13, 3, '|2|3', '', '1||', '1|||', '|2|', ''),
(12, 14, 3, '||3', '2', '|2|', '|||4', '|2|', ''),
(13, 15, 3, '||3', '1', '1||', '|||', '|2|', ''),
(14, 16, 3, '||3', '2', '|2|', '|||4', '|2|', ''),
(15, 17, 3, '||3', '2', '|2|', '|||4', '|2|3', ''),
(16, 18, 3, '||3', '2', '|2|', '|||4', '|2|', ''),
(17, 19, 3, '||3', '1', '1||', '|||4', '|2|', ''),
(18, 20, 3, '|2|', '1', '1||', '1|||', '|2|', ''),
(19, 21, 3, '||3', '2', '|2|', '|||', '1||', ''),
(20, 22, 3, '||3', '2', '|2|', '1|2|3|4', '1|2|', ''),
(21, 23, 3, '|2|3', '2', '|2|', '|||4', '1||', ''),
(22, 24, 3, '|2|3', '2', '|2|', '1|2|3|', '|2|', ''),
(23, 25, 3, '|2|3', '2', '|2|', '|||4', '|2|', ''),
(24, 26, 3, '|2|3', '2', '|2|', '|||4', '|2|', ''),
(25, 27, 3, '||3', '2', '||', '|||4', '1|2|3', ''),
(26, 28, 3, '||3', '1', '||3', '|||4', '|2|', ''),
(27, 29, 3, '||3', '2', '||3', '|||4', '1|2|', ''),
(28, 30, 3, '||3', '1', '1||', '1|||', '1||', ''),
(29, 31, 3, '|2|3', '1', '1||', '|2||', '1||', ''),
(30, 32, 3, '|2|3', '1', '1||', '1|||', '1||', ''),
(31, 33, 3, '1||3', '1', '1||', '|2||', '1||', ''),
(32, 34, 3, '||3', '1', '1||', '1|||', '1||', ''),
(33, 35, 3, '||3', '1', '1||', '|||', '1||', ''),
(34, 36, 3, '||3', '1', '1||', '1|||', '1||', ''),
(35, 37, 3, '||3', '1', '1||', '|||', '1||', ''),
(36, 38, 3, '||3', '1', '1||', '|||', '1||', ''),
(37, 49, 3, '1||3', '2', '||3', '|||', '1|2|', ''),
(38, 53, 3, '|2|', '2', '|2|', '1|2||', '1||', ''),
(39, 52, 3, '||3', '2', '|2|', '|||', '1||', ''),
(40, 51, 3, '||3', '2', '|2|', '|||', '1||', ''),
(41, 50, 3, '||3', '2', '|2|', '|||4', '|2|', ''),
(42, 48, 3, '1||', '1', '|2|', '|||', '||3', ''),
(43, 39, 3, '|2|', '', '||', '||3|4', '|2|', ''),
(44, 40, 3, '1||', '', '||', '|||', '||', ''),
(45, 41, 3, '1||', '', '||', '|||', '||', ''),
(46, 42, 3, '|2|', '2', '|2|', '||3|', '1|2|', ''),
(47, 43, 3, '||3', '', '|2|', '1|||', '1|2|', ''),
(48, 44, 3, '||', '2', '|2|', '|||', '1||', ''),
(49, 45, 3, '||', '2', '|2|', '|||', '1||', ''),
(50, 46, 3, '||', '2', '|2|', '|||4', '1|2|', ''),
(51, 47, 3, '|2|', '1', '|2|', '|||4', '1|2|', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_year`
--

CREATE TABLE `tb_year` (
  `idyear` int(11) NOT NULL,
  `nameyear` varchar(4) NOT NULL,
  `document` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_year`
--

INSERT INTO `tb_year` (`idyear`, `nameyear`, `document`, `status`) VALUES
(1, '2556', NULL, '0'),
(2, '2557', NULL, '0'),
(3, '2558', NULL, '0'),
(4, '2559', NULL, '0'),
(5, '2560', NULL, '1'),
(6, '2561', NULL, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cf_log`
--
ALTER TABLE `cf_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cf_log_userlogin`
--
ALTER TABLE `cf_log_userlogin`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tbl_event`
--
ALTER TABLE `tbl_event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `tb_amphur`
--
ALTER TABLE `tb_amphur`
  ADD PRIMARY KEY (`idamphur`);

--
-- Indexes for table `tb_counter`
--
ALTER TABLE `tb_counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_durian`
--
ALTER TABLE `tb_durian`
  ADD PRIMARY KEY (`iddurian`);

--
-- Indexes for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `tb_information`
--
ALTER TABLE `tb_information`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tb_managers_user`
--
ALTER TABLE `tb_managers_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_moo`
--
ALTER TABLE `tb_moo`
  ADD PRIMARY KEY (`idmoo`);

--
-- Indexes for table `tb_news`
--
ALTER TABLE `tb_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tb_news_item`
--
ALTER TABLE `tb_news_item`
  ADD PRIMARY KEY (`autoid`);

--
-- Indexes for table `tb_plot`
--
ALTER TABLE `tb_plot`
  ADD PRIMARY KEY (`idplot`);

--
-- Indexes for table `tb_poll`
--
ALTER TABLE `tb_poll`
  ADD PRIMARY KEY (`idpoll`);

--
-- Indexes for table `tb_polluser`
--
ALTER TABLE `tb_polluser`
  ADD PRIMARY KEY (`idpolluser`);

--
-- Indexes for table `tb_problem`
--
ALTER TABLE `tb_problem`
  ADD PRIMARY KEY (`idproblem`);

--
-- Indexes for table `tb_search`
--
ALTER TABLE `tb_search`
  ADD PRIMARY KEY (`idsearch`);

--
-- Indexes for table `tb_tambon`
--
ALTER TABLE `tb_tambon`
  ADD PRIMARY KEY (`idtambon`);

--
-- Indexes for table `tb_topic`
--
ALTER TABLE `tb_topic`
  ADD PRIMARY KEY (`idtopic`),
  ADD KEY `fk_topic_poll` (`idpoll`);

--
-- Indexes for table `tb_type`
--
ALTER TABLE `tb_type`
  ADD PRIMARY KEY (`idtype`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`);

--
-- Indexes for table `tb_userwork`
--
ALTER TABLE `tb_userwork`
  ADD PRIMARY KEY (`iduserwork`);

--
-- Indexes for table `tb_year`
--
ALTER TABLE `tb_year`
  ADD PRIMARY KEY (`idyear`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cf_log`
--
ALTER TABLE `cf_log`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `cf_log_userlogin`
--
ALTER TABLE `cf_log_userlogin`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_event`
--
ALTER TABLE `tbl_event`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_amphur`
--
ALTER TABLE `tb_amphur`
  MODIFY `idamphur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_counter`
--
ALTER TABLE `tb_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `tb_durian`
--
ALTER TABLE `tb_durian`
  MODIFY `iddurian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_information`
--
ALTER TABLE `tb_information`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_managers_user`
--
ALTER TABLE `tb_managers_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_moo`
--
ALTER TABLE `tb_moo`
  MODIFY `idmoo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_news_item`
--
ALTER TABLE `tb_news_item`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_plot`
--
ALTER TABLE `tb_plot`
  MODIFY `idplot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tb_poll`
--
ALTER TABLE `tb_poll`
  MODIFY `idpoll` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_polluser`
--
ALTER TABLE `tb_polluser`
  MODIFY `idpolluser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=256;
--
-- AUTO_INCREMENT for table `tb_problem`
--
ALTER TABLE `tb_problem`
  MODIFY `idproblem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_search`
--
ALTER TABLE `tb_search`
  MODIFY `idsearch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;
--
-- AUTO_INCREMENT for table `tb_tambon`
--
ALTER TABLE `tb_tambon`
  MODIFY `idtambon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_topic`
--
ALTER TABLE `tb_topic`
  MODIFY `idtopic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tb_userwork`
--
ALTER TABLE `tb_userwork`
  MODIFY `iduserwork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT for table `tb_year`
--
ALTER TABLE `tb_year`
  MODIFY `idyear` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_topic`
--
ALTER TABLE `tb_topic`
  ADD CONSTRAINT `fk_topic_poll` FOREIGN KEY (`idpoll`) REFERENCES `tb_poll` (`idpoll`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
