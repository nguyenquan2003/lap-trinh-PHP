-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 26, 2024 at 12:36 PM
-- Server version: 8.0.31
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `baikiemtra2`
--

-- --------------------------------------------------------

--
-- Table structure for table `doanhnghiep`
--

DROP TABLE IF EXISTS `doanhnghiep`;
CREATE TABLE IF NOT EXISTS `doanhnghiep` (
  `madn` int NOT NULL AUTO_INCREMENT,
  `tendn` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `masothue` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `nguoidaidien` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'ten file hinh logo',
  `maquanhuyen` int DEFAULT NULL,
  PRIMARY KEY (`madn`),
  KEY `maquanhuyen` (`maquanhuyen`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doanhnghiep`
--

INSERT INTO `doanhnghiep` (`madn`, `tendn`, `masothue`, `nguoidaidien`, `logo`, `maquanhuyen`) VALUES
(1, 'CÔNG TY TNHH THƯƠNG MẠI DỊCH VỤ MỰC IN SÀI GÒN INK', '300968110', 'Trần Quốc Thịnh', '1.png', 1),
(2, 'CÔNG TY TNHH DỊCH VỤ THƯƠNG MẠI TRƯỜNG SƠN', '1404362281', 'Nguyễn Thị Hồng Nhung', '2.png', 1),
(3, 'CÔNG TY XUẤT NHẬP KHẨU ', '118907043', 'Tăng Nhơn', '3.png', 1),
(4, 'TRUNG TÂM TRỌNG TÀI THƯƠNG MẠI QUỐC TẾ APEC VN ', '381448329', 'Đỗ Văn', '4.png', 1),
(5, 'TRUNG TÂM TRỌNG TÀI THƯƠNG MẠI QUỐC TẾ Taan Son - ', '1550520481', 'Vo Ngan', '5.png', 2),
(6, 'CÔNG TY TNHH ĐẦU TƯ VÀ PHÁT TRIỂN KỸ THUẬT TÂM AN', '608257382', 'Nguyễn Thị Trọng', '6.png', 1),
(7, 'Cty  KỸ THUẬT TÂM AN - ', '389725429', ' Lưu Văn Sự', '7.png', 2),
(8, 'Cty Phú Nhuận', '123854960', ' Lưu Văn Sự', '8.png', 1),
(9, 'CÔNG TY TNHH ĐẦU TƯ ', '1450098475', 'Hong Nhung', '9.png', 6),
(10, 'CÔNG TY TNHH CỬA HÀNG THÔNG MINH', '878927459', 'Le Minh', '10.png', 2),
(11, 'Cong Ty Giao Duc ABC', '44341833', 'Vo Van Teo', '11.png', 8),
(12, 'Cong ty duoc Pham Mekong', '1584926748', 'Nguyễn Thị Hồng Nhung', '12.png', 3),
(13, 'Cong Ty thiet bi truyen thong LoaLoa', '1791608207', 'Nguyễn Thị Hồng Nhung', '13.png', 2),
(14, 'Cong ty Duoc Phuc Hung', '203260752', 'Nguyễn Thị Hồng Nhung', '14.png', 1),
(15, 'Cong Ty XNK Duoc Lieu', '1641479101', 'Nguyễn Thị Hồng Nhung', '15.png', 1),
(16, 'Cong Ty cay xanh', '1597613211', 'Nguyễn Thị Hồng Nhung', '16.png', 1),
(17, 'Cong ty Anh sang', '1063628718', 'Nguyễn Thị Hồng Nhung', '17.png', 1),
(18, 'Cong ty dich Vu XYZ', '525303916', 'Đỗ Văn', '18.png', 2),
(19, 'Xuat Nhap Khau Sai Gon', '1435633389', 'Đỗ Văn', '19.png', 3),
(20, 'Cong ty Tan Cang', '1602255160', 'Đỗ Văn', '20.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quanhuyen`
--

DROP TABLE IF EXISTS `quanhuyen`;
CREATE TABLE IF NOT EXISTS `quanhuyen` (
  `maquanhuyen` int NOT NULL AUTO_INCREMENT,
  `tenquanhuyen` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `matinh` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`maquanhuyen`),
  KEY `matinh` (`matinh`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quanhuyen`
--

INSERT INTO `quanhuyen` (`maquanhuyen`, `tenquanhuyen`, `matinh`) VALUES
(1, 'Quan 1', 'hcm'),
(2, 'Quan 2', 'hcm'),
(3, 'Quan 3', 'hcm'),
(4, 'Quan 4', 'hcm'),
(5, 'Quan 12', 'hcm'),
(6, 'Quan 5', 'hcm'),
(7, 'Quan 7', 'hcm'),
(8, 'Quan 8', 'hcm'),
(9, 'Quan 9', 'hcm'),
(10, 'Quan 10', 'hcm'),
(11, 'Quan 11', 'hcm'),
(12, 'Hoàn Kiếm', 'hn'),
(13, 'Đống Đa', 'hn'),
(14, 'Ba Đình', 'hn'),
(15, 'Hai Bà Trưng', 'hn'),
(16, 'Hoàng Mai', 'hn'),
(17, 'Thanh Xuân', 'hn'),
(18, 'Bến Cát', 'bd'),
(19, 'Dầu Tiếng', 'bd'),
(20, 'Dĩ An', 'bd');

-- --------------------------------------------------------

--
-- Table structure for table `tinh`
--

DROP TABLE IF EXISTS `tinh`;
CREATE TABLE IF NOT EXISTS `tinh` (
  `matinh` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `tentinh` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`matinh`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tinh`
--

INSERT INTO `tinh` (`matinh`, `tentinh`) VALUES
('bd', 'Binh Duong'),
('hcm', 'TP Ho Chi Minh'),
('hn', 'Ha Noi');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doanhnghiep`
--
ALTER TABLE `doanhnghiep`
  ADD CONSTRAINT `doanhnghiep_ibfk_1` FOREIGN KEY (`maquanhuyen`) REFERENCES `quanhuyen` (`maquanhuyen`) ON DELETE RESTRICT ON UPDATE CASCADE;

--
-- Constraints for table `quanhuyen`
--
ALTER TABLE `quanhuyen`
  ADD CONSTRAINT `quanhuyen_ibfk_1` FOREIGN KEY (`matinh`) REFERENCES `tinh` (`matinh`) ON DELETE RESTRICT ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
