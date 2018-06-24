-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 24, 2018 at 05:54 PM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

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
(36, '2018-06-15', 5),
(37, '2018-06-17', 5),
(38, '2018-06-19', 2),
(39, '2018-06-20', 13),
(40, '2018-06-23', 15),
(41, '2018-06-24', 18);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_durian`
--

INSERT INTO `tb_durian` (`iddurian`, `idyear`, `idtype`, `idplot`, `b_trunk`, `e_trunk`, `product_durian`, `sale_durian`, `etc`) VALUES
(1, 6, 1, 73, '70', '50', '5', '10', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_news`
--

INSERT INTO `tb_news` (`news_id`, `day_in`, `title`, `detail`, `count_view`) VALUES
(2, '2016-03-14', 'ช่วงนำเข้าข้อมูลระบบ', 'สำรวจและนำเข้าข้อมูลเกษตรกร พื้นที่เพาะปลูก และผลผลิตทุเรียน', 8),
(3, '2018-02-22', 'อัพเดทระบบสมาชิก', 'ระบบฐานข้อมูลได้อัพเดทระบบสมาชิก โดยสามารถเชื่อมโยงกับบัญชีเฟสบุ๊คได้ เพื่อความสะดวกในการเข้าใช้ระบบของสมาชิกรายบุคคล', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_news_item`
--

CREATE TABLE `tb_news_item` (
  `autoid` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_value` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_news_item`
--

INSERT INTO `tb_news_item` (`autoid`, `news_id`, `file_name`, `file_value`) VALUES
(1, 2, 'asd', 'news_q684BJ77Rq.pdf'),
(2, 3, 'dfasfas', 'news_g5n9pEefC8.pdf'),
(3, 4, 'fffff', 'news_W5gacsA4Z3.pdf'),
(4, 4, 'fffff', 'news_AHrFsFkj7z.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_plot`
--

CREATE TABLE `tb_plot` (
  `idplot` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `codeplot` varchar(10) DEFAULT NULL,
  `area` varchar(200) DEFAULT NULL,
  `water` varchar(100) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `zm` int(11) DEFAULT NULL,
  `icon` varchar(20) DEFAULT NULL,
  `comment` varchar(200) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_plot`
--

INSERT INTO `tb_plot` (`idplot`, `iduser`, `codeplot`, `area`, `water`, `lat`, `lng`, `zm`, `icon`, `comment`) VALUES
(66, 67, 'PN67-1', '45', 'บาดาล', 17.78054302, 100.9241, 14, 'chart1.png', ''),
(72, 68, 'PN68-1', '', NULL, 17.464905, 100.560263, 14, 'chart1.png', ''),
(73, 70, 'PN70-1', '', NULL, 17.809984, 100.947158, 14, 'chart1.png', ''),
(74, 71, 'PN71-1', '', NULL, 17.495135, 100.554417, 14, 'chart1.png', ''),
(75, 83, 'PN83-1', '10', NULL, 17.79759902, 100.954045, 14, 'chart1.png', ''),
(76, 84, 'PN84-1', '5', NULL, 17.74964296, 100.939685, 0, 'chart1.png', ''),
(77, 85, 'PN85-1', '40', NULL, 17.494179, 100.580331, 14, 'chart1.png', ''),
(78, 86, 'PN86-1', '', NULL, 17.490098, 100.563966, 0, 'chart1.png', ''),
(79, 87, 'PN87-1', '20', NULL, 17.752494, 100.940523, 14, 'chart1.png', ''),
(80, 88, 'PN88-1', '15', NULL, 17.77399499, 100.919824, 14, 'chart1.png', ''),
(81, 89, 'PN89-1', '', NULL, 17.49358, 100.553048, 14, 'chart1.png', ''),
(82, 90, 'PN90-1', '17', NULL, 17.7575154, 100.9494331, 14, 'chart1.png', ''),
(83, 91, 'PN91-1', '', NULL, 17.485643, 100.561283, 14, 'chart1.png', ''),
(84, 92, 'PN92-1', '', NULL, 17.794105, 100.928547, 0, 'chart1.png', ''),
(85, 65, 'PN65-1', '', NULL, 17.6282663, 100.03452600000003, 14, 'chart1.png', ''),
(86, 97, 'PN97-1', '', NULL, 17.67167667446595, 100.30888368037108, 8, 'chart1.png', '');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_poll`
--

INSERT INTO `tb_poll` (`idpoll`, `idyear`, `pollname`, `detail`, `up_date`) VALUES
(12, 6, 'อายุต้นสับปะรด', '', '2018-06-23 16:18:20'),
(13, 6, 'รอบการออกดอกต่อปี', '', '2018-02-28 05:17:44'),
(14, 6, 'รอบการตัดขายต่อปี', '', '2018-02-28 05:17:44'),
(15, 6, 'สับปะรดที่กำลังจะให้ผลผลิต', '', '2018-06-23 16:18:20'),
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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_polluser`
--

INSERT INTO `tb_polluser` (`idpolluser`, `idpoll`, `idtopic`, `iduser`, `idyear`) VALUES
(1, 12, 24, 70, 6),
(2, 14, 31, 70, 6),
(3, 16, 38, 70, 6),
(4, 13, 28, 70, 6),
(5, 15, 34, 70, 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_problem`
--

CREATE TABLE `tb_problem` (
  `idproblem` int(11) NOT NULL,
  `idyear` int(11) NOT NULL,
  `iduser` int(11) NOT NULL,
  `problem` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_problem`
--

INSERT INTO `tb_problem` (`idproblem`, `idyear`, `iduser`, `problem`) VALUES
(1, 6, 70, 'ไม่มี');

-- --------------------------------------------------------

--
-- Table structure for table `tb_quality`
--

CREATE TABLE `tb_quality` (
  `quality_id` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `day_in` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `detail` mediumtext NOT NULL,
  `count_view` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_quality`
--

INSERT INTO `tb_quality` (`quality_id`, `userid`, `day_in`, `title`, `detail`, `count_view`) VALUES
(1, 65, '2016-03-14', 'คุณภาพสับปะรด', 'ตรวจคุณภาพสับปะรด', 8),
(3, 65, '2018-02-22', 'สิ่งบ่งชี้ทางภูมิศาสตร์ (GI) ', '<span><div><a target="_blank" rel="nofollow" href="https://1.bp.blogspot.com/-nvt0dcnFcwc/WaD9OICq4eI/AAAAAAAAAMg/iyRImcpy8s41E_FCUCsV0JLNUVi19cJzQCLcBGAs/s1600/S__4170692_resize.jpg"><img alt="" src="https://1.bp.blogspot.com/-nvt0dcnFcwc/WaD9OICq4eI/AAAAAAAAAMg/iyRImcpy8s41E_FCUCsV0JLNUVi19cJzQCLcBGAs/s1600/S__4170692_resize.jpg"></a></div><div></div></span><br><p>สินค้าสับปะรดห้วยมุ่นภายใต้โครงการสิ่งบ่งชี้ทางภูมิศาสตร์ (GI) ไทยเข้มแข็งสู่สากล</p>\r\n<p><b>“</b><b>สับปะรดห้วยมุ่น</b><b>” </b><b>เป็นสับปะรดสับปะรดพันธุ์ปัตตาเวียที่ถูกนำเข้ามาปลูกมากกว่า</b><b> </b><b>๕๐</b><b> </b><b>ปีมาแล้ว</b><b> </b><b>ในพื้นที่ตำบลห้วยมุ่น</b><b> </b><b>อำเภอน้ำปาด</b><b> </b><b>จังหวัดอุตรดิตถ์</b><b> </b><b>จนกลายเป็นพันธุ์ท้องถิ่น</b><b> </b><b>ด้วยสภาพภูมิประเทศเป็นหุบเขา</b><b> </b><b>อากาศที่หนาวเย็น</b><b> </b><b>ประกอบกับดินมีธาตุโพแทสเซียม</b><b> </b><b>และกำมะถันที่สับปะรดต้องการในระดับสูง</b><b> </b><b>ส่งผลให้สับปะรดมีลักษณะผิวบาง</b><b> </b><b>ตาตื้น</b><b> </b><b>เนื้อหนา</b><b> </b><b>สีเหมือนน้ำผึ้ง</b><b> </b><b>รสชาติหอมหวานแบบธรรมชาติ</b><b> </b><b>ฉ่ำน้ำ</b><b> </b><b>ไม่ระคายลิ้น</b><b> </b><b>และมีลักษณะรูปทรงกลม</b><b> </b><b>น้ำหนักผลระหว่าง</b><b> </b><b>๑</b><b>.</b><b>๕</b><b>-</b><b>๓</b><b>.</b><b>๕</b><b> </b><b>กิโลกรัม</b><b> </b><b>เปลือกผิวบาง</b><b> </b><b>ตาตื้น</b><b> </b><b>ผลดิบจะสีเขียวคล้ำ</b><b> </b><b>ผลแก่เต็มที่จะเปลี่ยนเป็นสีเหลืองอมส้ม</b></p><span><br><span><div></div><div></div><div><a target="_blank" rel="nofollow" href="https://4.bp.blogspot.com/-pk0wCcBgvkI/WL_APoRQUyI/AAAAAAAAAN4/glD1t0ghyzMG-TU88jbnY-FQxeCHbfiNACLcB/s1600/S__4063365.jpg"><img width="95" alt="" src="https://4.bp.blogspot.com/-pk0wCcBgvkI/WL_APoRQUyI/AAAAAAAAAN4/glD1t0ghyzMG-TU88jbnY-FQxeCHbfiNACLcB/s200/S__4063365.jpg"></a><img alt="" src="http://chart.apis.google.com/chart?chs=100x100&cht=qr&chld=L|0&chl=http%3A%2F%2Fhuaymun.blogspot.com%2Fp%2Fbualoi.html"></div></span></span>', 6),
(4, 67, '2018-06-24', 'sfddsfsad', 'fsadfasdfsadf', 0),
(5, 68, '2018-06-24', 'sdafsadfsda', 'fsadfsadfsdaf', 0),
(6, 68, '2018-06-24', 'fsdafsdafsda', 'fsdafsadfdsaf', 0),
(7, 70, '2018-06-24', 'fasf', 'sadfasdf', 0),
(8, 70, '2018-06-24', 'dsafds', 'dsafasdf', 0),
(9, 71, '2018-06-24', 'fasdf', 'asdfasdfasdf', 0),
(10, 83, '2018-06-24', 'sadfasdf', 'dsafasdfads', 0),
(11, 84, '2018-06-24', 'fasdfas', 'sadfasdfsadf', 0),
(12, 84, '2018-06-24', 'safsadfdsa', 'fasdfsadfasdf', 0),
(16, 65, '2018-06-24', 'asfasdf', 'sfasdfasfsadfsdf', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quality_item`
--

CREATE TABLE `tb_quality_item` (
  `autoid` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_value` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_quality_item`
--

INSERT INTO `tb_quality_item` (`autoid`, `quality_id`, `file_name`, `file_value`) VALUES
(1, 5, 'cdfsf', 'quality_6V1YnN52SV.pdf'),
(2, 12, 'sdfsdf', 'quality_5bridvSyz0.pdf'),
(3, 12, 'dsfsadf', 'quality_7Da7HvzMer.pdf'),
(4, 11, 'ssss', 'quality_NZXfhq8rie.pdf'),
(5, 1, 'กดหฟกด', 'quality_waiib8G3nF.pdf'),
(6, 3, 'fadsfadsf', 'quality_8JD1NVDRdn.pdf'),
(7, 3, 'gggg', 'quality_WiyH6omsqS.pdf'),
(8, 3, 'ssdfsadf', 'quality_AEG5EgZPr8.pdf'),
(9, 3, 'dddd', 'quality_uTqcjuF3AJ.pdf'),
(10, 14, 'sdfsadf', 'quality_ijfTLGqe7x.pdf');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `code`, `prefix`, `cf_aca_position`, `firstname`, `lastname`, `hnumber`, `cardnumber`, `birtdate`, `address`, `postcode`, `tel`, `mobile`, `fax`, `email`, `picture`, `idmoo`, `idtambon`, `idamphur`, `idgroup`, `facebook`, `permit`, `username`, `password`, `status`, `update_time`, `cf_userlevel`, `cf_slevel`) VALUES
(65, NULL, '1', NULL, 'ภานุวัฒน์', 'ขันจา', '27', NULL, NULL, NULL, NULL, '0862004911', NULL, NULL, 'mr.phanuwat@gmail.com', 'pic_Z9XLtEbC9D.png', '8', '2', '1', '4', NULL, NULL, 'phai', '1534', NULL, NULL, '1', NULL),
(67, NULL, '2', NULL, 'เลิด  ', 'อินดวง', '17/11 ม.2', NULL, NULL, NULL, NULL, '093-6946323', NULL, NULL, '', 'pic_A1Lnjjmv0G.JPG', '9', '2', '1', '1', NULL, NULL, 'u67', 'p68', NULL, NULL, '3', NULL),
(68, NULL, '2', NULL, 'เกษมศรี', ' ฟองใหญ่', '61/4 ม.2', NULL, NULL, NULL, NULL, '061-2352258', NULL, NULL, '', 'pic_ikB4LPUTqi.JPG', '9', '2', '1', '1', NULL, NULL, 'u68', 'p68', NULL, NULL, '3', NULL),
(70, NULL, '2', NULL, 'ฑัณฑิกา', 'บุญมี', '12/1', NULL, NULL, NULL, NULL, '087-8119304', NULL, NULL, '-', 'pic_ZBa64s0gqV.JPG', '9', '2', '1', '1', NULL, NULL, 'u70', 'p70', NULL, NULL, '3', NULL),
(71, NULL, '2', NULL, 'ลัดดา', 'ปันบุ่ง', '50/4', NULL, NULL, NULL, NULL, '081-0392781', NULL, NULL, '', 'pic_HYYAVjulW7.jpg', '9', '2', '1', '1', NULL, NULL, 'u70', 'p70', NULL, NULL, '3', NULL),
(83, NULL, '2', NULL, 'ละออง', 'สุวรรณขัน', '34/1', NULL, NULL, NULL, NULL, '086-0958106', NULL, NULL, '', 'pic_2JSC7RC3a1.png', '9', '2', '1', '1', NULL, NULL, 'u83', 'p83', NULL, NULL, '3', NULL),
(84, NULL, '2', NULL, 'ชญานิศ', 'หลานคำ', '10/16', NULL, NULL, NULL, NULL, '063-7490442', NULL, NULL, '', 'pic_i3LWmDbbAx.jpg', '23', '2', '1', '1', NULL, NULL, 'u84', 'p84', NULL, NULL, '3', NULL),
(85, NULL, '3', NULL, 'เขมิกา', 'พิบูลย์สวัสดิ์', '1/8', NULL, NULL, NULL, NULL, '087-0553481', NULL, NULL, '', 'pic_Xaymm1CRmd.png', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(86, NULL, '3', NULL, 'นันทิตา', 'พิมพ์อุป', '11/1', NULL, NULL, NULL, NULL, '098-7800483', NULL, NULL, '', 'pic_gvLmYJYkVF.JPG', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(87, NULL, '2', NULL, 'ประจบ', 'นิดแสวง', '110/15', NULL, NULL, NULL, NULL, '082-2025284', NULL, NULL, '', 'pic_F4dzDEJ18i.JPG', '23', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(88, NULL, '3', NULL, 'เอราวัณ', 'มูลสิงห์', '26/6', NULL, NULL, NULL, NULL, '093-1411536', NULL, NULL, '', 'pic_5Ts0ddepcE.JPG', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(89, NULL, '2', NULL, 'หยาดฟ้า', 'พามา', '20/11', NULL, NULL, NULL, NULL, '', NULL, NULL, '', 'pic_zYJw9olM49.jpg', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(90, NULL, '2', NULL, 'ชบา', 'แจ่มใน', '51/4', NULL, NULL, NULL, NULL, '084-4919001', NULL, NULL, '', 'pic_oEgqorKEk2.JPG', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(91, NULL, '3', NULL, 'ปาริชาต', 'พุฒแพง', '10/3', NULL, NULL, NULL, NULL, '089-9597904', NULL, NULL, '', 'pic_ambWCWTGpb.JPG', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(92, NULL, '2', NULL, 'บัวลอย', 'จูมจันทร์', '45/5', NULL, NULL, NULL, NULL, '089-0439802', NULL, NULL, '', 'pic_RC7KnDNR1a.JPG', '9', '2', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(97, NULL, NULL, NULL, 'Phanuwat Khanja', '(FB)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'mr.phanuwat@hotmail.com', 'pic_SrP0Mp6u7r.JPG', NULL, NULL, NULL, NULL, '1684254494953700', '1', NULL, NULL, NULL, '2018-06-24 12:44:17', '3', NULL),
(98, NULL, '1', NULL, 'asdfasf', 'sadfasdf', '21313', NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '11', '3', '1', '2', NULL, NULL, 'rerer', 'rerer', NULL, NULL, '3', NULL),
(99, NULL, '1', NULL, 'asdfasf', 'sadfasdf', '21313', NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '11', '3', '1', '2', NULL, NULL, 'rerer', 'rerer', NULL, NULL, '3', NULL),
(100, NULL, '1', NULL, 'asdfasf', 'sadfasdf', '21313', NULL, NULL, NULL, NULL, '', NULL, NULL, '', '', '11', '3', '1', '2', NULL, NULL, 'rerer', 'rerer', NULL, NULL, '3', NULL),
(101, NULL, '2', NULL, 'ฟหกดฟห', 'ฟหกดฟหกด', '321321', NULL, NULL, NULL, NULL, 'sadsdf', NULL, NULL, '', '', '7', '3', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL),
(102, NULL, '2', NULL, 'asdf', 'asdfaf', '123', NULL, NULL, NULL, NULL, 'safasf', NULL, NULL, '', 'pic_WZ1RFl4u1V.JPG', '11', '3', '1', '1', NULL, NULL, '', '', NULL, NULL, '3', NULL);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

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
-- Indexes for table `tb_quality`
--
ALTER TABLE `tb_quality`
  ADD PRIMARY KEY (`quality_id`);

--
-- Indexes for table `tb_quality_item`
--
ALTER TABLE `tb_quality_item`
  ADD PRIMARY KEY (`autoid`);

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
  MODIFY `idamphur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_counter`
--
ALTER TABLE `tb_counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `tb_durian`
--
ALTER TABLE `tb_durian`
  MODIFY `iddurian` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_information`
--
ALTER TABLE `tb_information`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_managers_user`
--
ALTER TABLE `tb_managers_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tb_moo`
--
ALTER TABLE `tb_moo`
  MODIFY `idmoo` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `tb_news`
--
ALTER TABLE `tb_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_news_item`
--
ALTER TABLE `tb_news_item`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tb_plot`
--
ALTER TABLE `tb_plot`
  MODIFY `idplot` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=87;
--
-- AUTO_INCREMENT for table `tb_poll`
--
ALTER TABLE `tb_poll`
  MODIFY `idpoll` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_polluser`
--
ALTER TABLE `tb_polluser`
  MODIFY `idpolluser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tb_problem`
--
ALTER TABLE `tb_problem`
  MODIFY `idproblem` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tb_quality`
--
ALTER TABLE `tb_quality`
  MODIFY `quality_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tb_quality_item`
--
ALTER TABLE `tb_quality_item`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tb_search`
--
ALTER TABLE `tb_search`
  MODIFY `idsearch` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_tambon`
--
ALTER TABLE `tb_tambon`
  MODIFY `idtambon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_topic`
--
ALTER TABLE `tb_topic`
  MODIFY `idtopic` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tb_type`
--
ALTER TABLE `tb_type`
  MODIFY `idtype` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=103;
--
-- AUTO_INCREMENT for table `tb_userwork`
--
ALTER TABLE `tb_userwork`
  MODIFY `iduserwork` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_year`
--
ALTER TABLE `tb_year`
  MODIFY `idyear` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
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
