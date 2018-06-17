-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2018 at 05:21 AM
-- Server version: 5.5.42
-- PHP Version: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `utm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_quality`
--

CREATE TABLE `tb_quality` (
  `quality_id` int(11) NOT NULL,
  `day_in` date NOT NULL,
  `title` varchar(250) NOT NULL,
  `detail` mediumtext NOT NULL,
  `count_view` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_quality`
--

INSERT INTO `tb_quality` (`quality_id`, `day_in`, `title`, `detail`, `count_view`) VALUES
(1, '2016-03-14', 'ช่วงนำเข้าข้อมูลระบบ', 'สำรวจและนำเข้าข้อมูลเกษตรกร พื้นที่เพาะปลูก และผลผลิตทุเรียน', 8),
(3, '2018-02-22', 'อัพเดทระบบสมาชิก', 'ระบบฐานข้อมูลได้อัพเดทระบบสมาชิก โดยสามารถเชื่อมโยงกับบัญชีเฟสบุ๊คได้ เพื่อความสะดวกในการเข้าใช้ระบบของสมาชิกรายบุคคล', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_quality_item`
--

CREATE TABLE `tb_quality_item` (
  `autoid` int(11) NOT NULL,
  `quality_id` int(11) NOT NULL,
  `file_name` varchar(250) NOT NULL,
  `file_value` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_quality_item`
--

INSERT INTO `tb_quality_item` (`autoid`, `quality_id`, `file_name`, `file_value`) VALUES
(1, 2, 'asd', 'quality_q684BJ77Rq.pdf');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_quality`
--
ALTER TABLE `tb_quality`
  MODIFY `quality_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_quality_item`
--
ALTER TABLE `tb_quality_item`
  MODIFY `autoid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
