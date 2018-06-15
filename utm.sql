-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2018 at 10:31 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `utm`
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
(1, 'น้ำปาด', '', '', '', '', '', 1, NULL);

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
(33, '2018-06-12', 6),
(34, '2018-06-13', 1),
(35, '2018-06-14', 1),
(36, '2018-06-15', 5);

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
(1, 'ห้วยมุ่น', 'บ้านห้วยมุ่น', NULL, ''),
(2, 'น้ำไผ่', 'บ้านน้ำไผ่', NULL, ''),
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
(2, 'Admin', 'URU', 'phanuwat', '1534', 'pic_c0kXjs0RcT.jpg', '2014-12-17');

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
(5, 3, 'หมู่7', '', '', '', '', '1'),
(6, 3, 'หมู่4', '', '', '', '', '1'),
(7, 3, 'หมู่10', '', '', '', '', '1'),
(8, 2, 'หมู่1', '', '', '', '', '1'),
(9, 2, 'หมู่2', '', '', '', '', '1'),
(10, 2, 'หมู่3', '', '', '', '', '1'),
(11, 3, 'หมู่2', '', '', '', '', '1'),
(12, 3, 'หมู่6', '', '', '', '', '1'),
(22, 2, 'หมู่5', '', '', '', '', '1'),
(23, 2, 'หมู่6', '', '', '', '', '1'),
(24, 2, 'หมู่7', '', '', '', '', '1'),
(25, 2, 'หมู่8', '', '', '', '', '1');

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
(12, 6, 'อายุต้นทุเรียนหลงลับแล', '', '2018-02-28 05:16:52'),
(13, 6, 'รอบการออกดอกต่อปี', '', '2018-02-28 05:17:44'),
(14, 6, 'รอบการตัดขายต่อปี', '', '2018-02-28 05:17:44'),
(15, 6, 'ทุเรียนที่กำลังจะให้ผลผลิต', '', '2018-02-28 05:17:44'),
(16, 6, 'ช่องทางการจัดจำหน่าย', '', '2018-02-28 05:17:44');

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
(2, 1, 'ห้วยมุ่น', '', '', '', 1),
(3, 1, 'น้ำไผ่', '', '', '', 1);

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
(7, 'ปัตตาเวีย', 'ปัตตาเวีย', 'rf_7Q1og.JPG', NULL),
(8, 'ห้วยมุ่น', 'สินค้าสับปะรดห้วยมุ่นภายใต้โครงการสิ่งบ่งชี้ทางภูมิศาสตร์ (GI) ไทยเข้มแข็งสู่สากล\r\n“สับปะรดห้วยมุ่น” เป็นสับปะรดสับปะรดพันธุ์ปัตตาเวียที่ถูกนำเข้ามาปลูกมากกว่า ๕๐ ปีมาแล้ว ในพื้นที่ตำบลห้วยมุ่น อำเภอน้ำปาด จังหวัดอุตรดิตถ์ จนกลายเป็นพันธุ์ท้องถิ่น ด้วยสภาพภูมิประเทศเป็นหุบเขา อากาศที่หนาวเย็น ประกอบกับดินมีธาตุโพแทสเซียม และกำมะถันที่สับปะรดต้องการในระดับสูง ส่งผลให้สับปะรดมีลักษณะผิวบาง ตาตื้น เนื้อหนา สีเหมือนน้ำผึ้ง รสชาติหอมหวานแบบธรรมชาติ ฉ่ำน้ำ ไม่ระคายลิ้น และมีลักษณะรูปทรงกลม น้ำหนักผลระหว่าง ๑.๕-๓.๕ กิโลกรัม เปลือกผิวบาง ตาตื้น ผลดิบจะสีเขียวคล้ำ ผลแก่เต็มที่จะเปลี่ยนเป็นสีเหลืองอมส้ม', 'rf_wws8p.jpg', NULL);

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
(65, NULL, '1', NULL, 'ภานุวัฒน์', 'ขันจา', '27', NULL, NULL, NULL, NULL, '0862004911', NULL, NULL, 'mr.phanuwat@gmail.com', NULL, '8', '2', '1', '4', NULL, NULL, 'phai', '1534', NULL, NULL, '1', NULL),
(66, NULL, 'mr.', NULL, 'Phanuwat Khanja', '(FB)', '111', NULL, NULL, NULL, NULL, '-', NULL, NULL, 'mr.phanuwat@hotmail.com', NULL, '11', '3', '1', '4', '1684254494953700', '1', 'ff', 'ff', NULL, '2018-06-15 05:45:34', '3', NULL),
(67, NULL, '2', NULL, 'เลิด  ', 'อินดวง', '17/11 ม.2', NULL, NULL, NULL, NULL, '093-6946323', NULL, NULL, '', NULL, '9', '2', '1', '1', NULL, NULL, 'aa', 'aa', NULL, NULL, '3', NULL),
(68, NULL, '2', NULL, 'เกษมศรี', ' ฟองใหญ่', '61/4 ม.2', NULL, NULL, NULL, NULL, '061-2352258', NULL, NULL, '', NULL, '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL);

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
(5, '2560', NULL, '0'),
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

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
  MODIFY `idmoo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

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
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
