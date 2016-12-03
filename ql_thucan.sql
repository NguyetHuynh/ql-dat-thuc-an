-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2016 at 03:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nguyet-nhahang`
--

-- --------------------------------------------------------

--
-- Table structure for table `ban`
--

CREATE TABLE `ban` (
  `ID` int(11) NOT NULL,
  `TINHTRANG` varchar(10) COLLATE utf8_unicode_ci DEFAULT 'Tốt',
  `STATUS` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-trống, 1-có khách, 2- đặt bàn'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ban`
--

INSERT INTO `ban` (`ID`, `TINHTRANG`, `STATUS`) VALUES
(1, 'Tốt', 0),
(2, 'Tốt', 1),
(3, 'Tốt', 1),
(4, 'Tốt', 0),
(5, 'Tốt', 1),
(6, 'Tốt', 0),
(7, 'Tốt', 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitietdatban`
--

CREATE TABLE `chitietdatban` (
  `BANID` int(11) NOT NULL,
  `DATBANID` int(11) NOT NULL,
  `TINHTRANG` tinyint(4) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietdatban`
--

INSERT INTO `chitietdatban` (`BANID`, `DATBANID`, `TINHTRANG`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 8, 0),
(3, 4, 0),
(4, 2, 0),
(4, 5, 0),
(4, 6, 0),
(5, 7, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE `chitiethoadon` (
`ID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `TA_ID` int(11) NOT NULL,
  `HOADONID` int(11) NOT NULL,
  `SOLUONG` int(11) NOT NULL DEFAULT '1',
  `DONGIA` decimal(11,3) NOT NULL,
  `GIAMGIA` decimal(4,2) DEFAULT NULL,
  `TINHTRANG` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-chuẩn bi, 2-dang nau, 1- nấu xong 3-served'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitiethoadon`
--

INSERT INTO `chitiethoadon` (`TA_ID`, `HOADONID`, `SOLUONG`, `DONGIA`, `GIAMGIA`, `TINHTRANG`) VALUES
(1, 11, 1, '50000.000', NULL, 3),
(1, 12, 4, '50000.000', NULL, 3),
(1, 29, 1, '50000.000', NULL, 3),
(1, 45, 1, '50000.000', NULL, 3),
(1, 66, 1, '50000.000', NULL, 0),
(4, 4, 2, '50000.000', NULL, 3),
(4, 17, 2, '50000.000', NULL, 3),
(4, 46, 3, '50000.000', NULL, 0),
(4, 48, 1, '50000.000', NULL, 1),
(4, 51, 1, '50000.000', NULL, 3),
(5, 27, 1, '200000.000', NULL, 3),
(5, 29, 1, '200000.000', NULL, 3),
(5, 46, 1, '200000.000', NULL, 0),
(5, 48, 2, '200000.000', NULL, 0),
(5, 53, 1, '200000.000', NULL, 0),
(7, 13, 1, '30000.000', NULL, 1),
(7, 18, 2, '30000.000', NULL, 3),
(7, 53, 1, '30000.000', NULL, 1),
(8, 13, 1, '250000.000', NULL, 1),
(8, 27, 3, '250000.000', NULL, 3),
(8, 44, 1, '250000.000', NULL, 3),
(8, 45, 1, '250000.000', NULL, 3),
(8, 50, 1, '250000.000', NULL, 1),
(8, 51, 2, '250000.000', NULL, 3),
(8, 54, 1, '250000.000', NULL, 0),
(9, 12, 2, '50000.000', NULL, 3),
(9, 18, 1, '50000.000', NULL, 3),
(9, 49, 1, '50000.000', NULL, 3),
(9, 51, 1, '50000.000', NULL, 3),
(9, 52, 1, '50000.000', NULL, 0),
(10, 4, 1, '100000.000', NULL, 3),
(10, 17, 2, '100000.000', NULL, 3),
(10, 45, 1, '100000.000', NULL, 3),
(10, 52, 1, '100000.000', NULL, 0),
(10, 54, 1, '100000.000', NULL, 0),
(10, 62, 1, '100000.000', NULL, 0),
(11, 11, 1, '250000.000', NULL, 3),
(11, 12, 1, '250000.000', NULL, 3),
(11, 44, 1, '250000.000', NULL, 3),
(12, 1, 1, '39000.000', NULL, 3),
(12, 27, 1, '39000.000', NULL, 3),
(13, 18, 1, '47000.000', NULL, 3),
(13, 49, 1, '47000.000', NULL, 3),
(13, 55, 1, '47000.000', NULL, 0),
(14, 1, 1, '18000.000', NULL, 3),
(14, 51, 1, '18000.000', NULL, 3),
(14, 55, 1, '18000.000', NULL, 0),
(16, 45, 2, '50000.040', NULL, 3),
(16, 53, 1, '50000.040', NULL, 2),
(16, 66, 2, '50000.040', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `chucvu`
--

CREATE TABLE `chucvu` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chucvu`
--

INSERT INTO `chucvu` (`ID`, `TEN`) VALUES
(1, 'Quản Lý'),
(2, 'Bồi Bàn'),
(4, 'Tiếp Tân'),
(5, 'Đầu Bếp'),
(6, 'Kế Toán'),
(7, 'Giao Hàng');

-- --------------------------------------------------------

--
-- Table structure for table `donvitinh`
--

CREATE TABLE `donvitinh` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donvitinh`
--

INSERT INTO `donvitinh` (`ID`, `TEN`) VALUES
(1, 'Phần'),
(2, 'Chai'),
(3, 'Ly');

-- --------------------------------------------------------

--
-- Table structure for table `hinhthucpvu`
--

CREATE TABLE `hinhthucpvu` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PHIPV` decimal(8,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hinhthucpvu`
--

INSERT INTO `hinhthucpvu` (`ID`, `TEN`, `PHIPV`) VALUES
(1, 'Tại Bàn', '10000.000'),
(2, 'Giao Hàng', '15000.000');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `ID` int(11) NOT NULL,
  `BANID` int(11) DEFAULT NULL,
  `DATBANID` int(11) DEFAULT NULL,
  `HINHTHUCID` int(11) NOT NULL,
  `KHACHHANGID` int(11) DEFAULT NULL,
  `EMPID` int(11) DEFAULT NULL,
  `TINHTRANG` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-chuagiao, 1-nauxong, 2-giao, 3-thanhtoan',
  `NGAY` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`ID`, `BANID`, `DATBANID`, `HINHTHUCID`, `KHACHHANGID`, `EMPID`, `TINHTRANG`, `NGAY`) VALUES
(1, NULL, NULL, 2, 1, NULL, 3, '2016-10-18 00:56:50'),
(4, NULL, NULL, 2, 1, NULL, 3, '2016-10-18 15:36:13'),
(11, NULL, NULL, 2, 1, NULL, 3, '2016-10-18 16:06:16'),
(12, NULL, NULL, 2, 2, NULL, 2, '2016-10-19 12:45:29'),
(13, NULL, NULL, 2, 3, NULL, 1, '2016-10-20 06:34:16'),
(17, 1, NULL, 1, NULL, NULL, 3, '2016-10-25 17:11:42'),
(18, 2, NULL, 1, NULL, NULL, 3, '2016-10-25 17:17:33'),
(27, 4, NULL, 1, 2, NULL, 3, '2016-10-26 07:31:07'),
(29, 3, NULL, 1, NULL, NULL, 3, '2016-10-26 08:58:12'),
(44, 1, NULL, 1, NULL, NULL, 3, '2016-10-26 17:30:45'),
(45, 2, NULL, 1, NULL, NULL, 3, '2016-10-26 17:32:40'),
(46, NULL, NULL, 2, 4, NULL, 0, '2016-10-27 16:18:08'),
(48, NULL, NULL, 2, 4, NULL, 0, '2016-10-27 16:41:19'),
(49, 4, NULL, 1, NULL, NULL, 3, '2016-10-29 16:15:12'),
(50, NULL, NULL, 2, 5, NULL, 1, '2016-10-29 16:44:17'),
(51, 5, NULL, 1, NULL, NULL, 3, '2016-10-30 03:18:47'),
(52, NULL, NULL, 2, 2, NULL, 0, '2016-11-07 15:44:57'),
(53, NULL, NULL, 2, 6, NULL, 0, '2016-11-10 07:20:38'),
(54, 2, NULL, 1, NULL, NULL, 0, '2016-11-10 13:10:08'),
(55, 3, NULL, 1, NULL, NULL, 0, '2016-11-11 12:27:32'),
(61, 5, NULL, 1, NULL, NULL, 0, '2016-11-11 13:09:29'),
(62, 5, NULL, 1, NULL, NULL, 0, '2016-11-11 13:09:35'),
(66, 5, 7, 1, NULL, NULL, 0, '2016-11-11 13:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DIACHI` text COLLATE utf8_unicode_ci NOT NULL,
  `SODT` char(12) COLLATE utf8_unicode_ci NOT NULL,
  `NGAYTAO` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`ID`, `TEN`, `DIACHI`, `SODT`, `NGAYTAO`) VALUES
(0, 'noname', 'no address', '0000000000', '2016-11-09 05:54:50'),
(1, 'Huỳnh Nguyễn Minh Nguyệt', 'Ba Láng, Cái Răng, Tp Cần Thơ', '01274552108', '2016-10-09 00:17:56'),
(2, 'Tiến', '44 30/4 ninh kiều cần thơ', '0989123456', '2016-10-19 19:45:29'),
(3, 'Nguyễn Long', '55 30/4 ninh kiều cần thơ', '0989100299', '2016-10-20 13:34:16'),
(4, 'Trần Ngọc Bình', '235 30/4 ninh kiều cần thơ', '0991119997', '2016-10-27 23:18:08'),
(5, 'Hồ An Khang', '111 30/4 ninh kiều cần thơ', '0989100289', '2016-10-29 23:44:17'),
(6, 'Nguyễn Trọng Nghĩa', '22/8 đường 30/4 ninh kiều cần thơ', '0991119996', '2016-11-08 23:07:47'),
(7, 'Huỳnh Nguyễn Minh Nguyệt', 'Ba Láng, Cái Răng, Tp Cần Thơ', '0991119987', '2016-11-09 23:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `loaithucan`
--

CREATE TABLE `loaithucan` (
  `ID` int(11) NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `PARENT_ID` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `loaithucan`
--

INSERT INTO `loaithucan` (`ID`, `TEN`, `PARENT_ID`) VALUES
(1, 'Khai Vị', 0),
(2, 'Hải Sản', 15),
(3, 'Salad', 1),
(4, 'Soup', 1),
(5, 'Thịt bò', 15),
(6, 'Món Chay', 15),
(8, 'Tráng Miệng', 0),
(9, 'Bánh Ngọt', 8),
(11, 'Kem', 8),
(12, 'Nước Uống', 0),
(14, 'Thịt gà', 15),
(15, 'Món Chính', 0),
(16, 'Nước Trái Cây', 12),
(17, 'Nước Giải Khát', 12);

-- --------------------------------------------------------

--
-- Table structure for table `nhanvien`
--

CREATE TABLE `nhanvien` (
  `ID` int(11) NOT NULL,
  `HO` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `CHUCVUID` int(11) NOT NULL,
  `PASSWORD` char(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LUONG` decimal(11,3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `nhanvien`
--

INSERT INTO `nhanvien` (`ID`, `HO`, `TEN`, `CHUCVUID`, `PASSWORD`, `LUONG`) VALUES
(1, 'Huỳnh', 'Nguyệt', 1, '21232f297a57a5a743894a0e4a801fc3', '50000000.000'),
(2, 'Huỳnh', 'Ngọc Mai', 2, 'bae5e3208a3c700e3db642b6631e95b9', '3500000.000'),
(4, 'Nguyễn', 'Trinh', 4, 'b857eed5c9405c1f2b98048aae506792', '4000000.000'),
(5, 'Cao', 'Nhân', 5, 'f638f4354ff089323d1a5f78fd8f63ca', '10000000.000'),
(6, 'Lý', 'Ngân', 6, '7c497868c9e6d3e4cf2e87396372cd3b', '3500000.000'),
(7, 'Trịnh', 'Nguyễn', 2, '30e535568de1f9231e7d9df0f4a5a44d', '3000000.000'),
(8, 'Nguyễn', 'Minh Ngọc', 4, '8ddcff3a80f4189ca1c9d4d902c3c909', '4000000.000'),
(9, 'Lý', 'Trường Bình', 2, 'ef775988943825d2871e1cfa75473ec0', '3000000.000');

-- --------------------------------------------------------

--
-- Table structure for table `phieudatban`
--

CREATE TABLE `phieudatban` (
  `ID` int(11) NOT NULL,
  `KHACHHANGID` int(11) NOT NULL,
  `EMPID` int(11) DEFAULT NULL,
  `NGAYDAT` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `NGAYDUNG` date NOT NULL DEFAULT '0000-00-00',
  `GIO` time NOT NULL DEFAULT '00:00:00',
  `SOTHUCKHACH` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `phieudatban`
--

INSERT INTO `phieudatban` (`ID`, `KHACHHANGID`, `EMPID`, `NGAYDAT`, `NGAYDUNG`, `GIO`, `SOTHUCKHACH`) VALUES
(1, 1, NULL, '2016-11-07 16:50:42', '2016-11-08', '10:00:00', 4),
(2, 2, NULL, '2016-11-07 16:50:42', '2016-11-09', '19:00:00', 10),
(4, 6, NULL, '2016-11-07 22:39:43', '2016-11-08', '10:00:00', 6),
(5, 3, NULL, '2016-11-07 22:53:24', '2016-11-10', '10:00:00', 2),
(6, 7, NULL, '2016-11-09 16:35:09', '2016-11-11', '13:00:00', 6),
(7, 2, NULL, '2016-11-10 08:20:07', '2016-11-11', '22:00:00', 4),
(8, 5, NULL, '2016-11-11 12:17:11', '2016-11-12', '08:00:00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `thucan`
--

CREATE TABLE `thucan` (
  `ID` int(11) NOT NULL,
  `MADV` int(11) NOT NULL,
  `LOAITAID` int(11) NOT NULL,
  `TEN` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `DONGIA` decimal(15,3) NOT NULL,
  `GIAMGIA` decimal(4,2) DEFAULT '0.00' COMMENT '%',
  `MOTA` text COLLATE utf8_unicode_ci,
  `SOLUOTCHON` int(11) DEFAULT '0',
  `NGAYTAO` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `thucan`
--

INSERT INTO `thucan` (`ID`, `MADV`, `LOAITAID`, `TEN`, `DONGIA`, `GIAMGIA`, `MOTA`, `SOLUOTCHON`, `NGAYTAO`) VALUES
(1, 1, 3, 'Salad thịt xông khói', '50000.000', '0.00', '', 27, '2016-10-08 17:28:16'),
(4, 1, 4, 'Soup cua', '50000.000', '0.00', 'Cua, tôm, thịt gà', 4, '2016-10-10 12:11:25'),
(5, 1, 2, 'Lẩu hải sản', '200000.000', '5.00', 'Hỗn hợp các loại hải sản', 3, '2016-10-10 12:12:14'),
(7, 3, 16, 'Cam ép', '30000.000', '0.00', 'Cam tươi nguyên chất', 2, '2016-10-10 12:13:48'),
(8, 1, 2, 'Mực Ống Hấp', '250000.000', '0.00', 'Mực ống, thịt bằm', 3, '2016-10-19 07:26:07'),
(9, 1, 9, 'Bánh plan', '50000.000', '0.00', 'trứng, đường, caramen', 4, '2016-10-20 07:12:09'),
(10, 1, 5, 'Bò Lúc Lắc', '100000.000', '0.00', '', 4, '2016-10-20 07:13:42'),
(11, 1, 14, 'Gà Quay Giòn Rút Xương', '250000.000', '5.00', '', 2, '2016-10-20 07:15:52'),
(12, 1, 6, 'Bào Ngư Xào Xả Ớt', '39000.000', '0.00', '', 1, '2016-10-20 07:17:12'),
(13, 1, 6, 'Cung Bửu Hạt Điều', '47000.000', '0.00', '', 0, '2016-10-20 07:17:51'),
(14, 3, 16, 'Sinh Tố Bơ', '18000.000', '0.00', '', 1, '2016-10-20 07:19:23'),
(15, 2, 17, 'Nước Suối', '8000.000', '0.00', '', 0, '2016-10-20 07:20:10'),
(16, 3, 11, 'Kem Dưa Hoàng Yến', '50000.040', '0.00', '', 1, '2016-10-20 13:25:50'),
(17, 3, 17, 'Trà Xanh Nóng', '12000.000', '0.00', 'trà xanh nguyên chất', 0, '2016-10-30 05:12:53');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ban`
--
ALTER TABLE `ban`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chitietdatban`
--
ALTER TABLE `chitietdatban`
  ADD PRIMARY KEY (`BANID`,`DATBANID`);

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
  ADD PRIMARY KEY (`TA_ID`,`HOADONID`);

--
-- Indexes for table `chucvu`
--
ALTER TABLE `chucvu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `donvitinh`
--
ALTER TABLE `donvitinh`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hinhthucpvu`
--
ALTER TABLE `hinhthucpvu`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `DATBANID` (`DATBANID`),
  ADD KEY `HINHTHUCID` (`HINHTHUCID`),
  ADD KEY `KHACHHANGID` (`KHACHHANGID`),
  ADD KEY `EMPID` (`EMPID`),
  ADD KEY `FK_banid` (`BANID`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `loaithucan`
--
ALTER TABLE `loaithucan`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CHUCVUID` (`CHUCVUID`);

--
-- Indexes for table `phieudatban`
--
ALTER TABLE `phieudatban`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `KHACHHANGID` (`KHACHHANGID`),
  ADD KEY `EMPID` (`EMPID`);

--
-- Indexes for table `thucan`
--
ALTER TABLE `thucan`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `LOAITAID` (`LOAITAID`),
  ADD KEY `MADV` (`MADV`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ban`
--
ALTER TABLE `ban`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `chitietdatban`
--
ALTER TABLE `chitietdatban`
  MODIFY `BANID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `chucvu`
--
ALTER TABLE `chucvu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `donvitinh`
--
ALTER TABLE `donvitinh`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hinhthucpvu`
--
ALTER TABLE `hinhthucpvu`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `loaithucan`
--
ALTER TABLE `loaithucan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `nhanvien`
--
ALTER TABLE `nhanvien`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `phieudatban`
--
ALTER TABLE `phieudatban`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `thucan`
--
ALTER TABLE `thucan`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `FK_banid` FOREIGN KEY (`BANID`) REFERENCES `ban` (`id`),
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`DATBANID`) REFERENCES `phieudatban` (`ID`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`HINHTHUCID`) REFERENCES `hinhthucpvu` (`ID`),
  ADD CONSTRAINT `hoadon_ibfk_4` FOREIGN KEY (`EMPID`) REFERENCES `nhanvien` (`ID`);

--
-- Constraints for table `nhanvien`
--
ALTER TABLE `nhanvien`
  ADD CONSTRAINT `nhanvien_ibfk_1` FOREIGN KEY (`CHUCVUID`) REFERENCES `chucvu` (`id`);

--
-- Constraints for table `phieudatban`
--
ALTER TABLE `phieudatban`
  ADD CONSTRAINT `phieudatban_ibfk_1` FOREIGN KEY (`KHACHHANGID`) REFERENCES `khachhang` (`ID`),
  ADD CONSTRAINT `phieudatban_ibfk_2` FOREIGN KEY (`EMPID`) REFERENCES `nhanvien` (`ID`);

--
-- Constraints for table `thucan`
--
ALTER TABLE `thucan`
  ADD CONSTRAINT `thucan_ibfk_1` FOREIGN KEY (`LOAITAID`) REFERENCES `loaithucan` (`ID`),
  ADD CONSTRAINT `thucan_ibfk_2` FOREIGN KEY (`MADV`) REFERENCES `donvitinh` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
