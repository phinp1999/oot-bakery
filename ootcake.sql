-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2020 at 07:12 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ootcake`
--

-- --------------------------------------------------------

--
-- Table structure for table `ctdonhang`
--

CREATE TABLE `ctdonhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `thanhTien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ctdonhang`
--

INSERT INTO `ctdonhang` (`donhang_id`, `sanpham_id`, `soLuong`, `thanhTien`) VALUES
(123, 87, 5, 200000),
(456, 67, 1, 50000),
(456, 82, 10, 290000),
(1536, 67, 5, 20000),
(1536, 87, 5, 20000),
(3578, 69, 5, 125000),
(3583, 78, 1, 29000),
(3584, 67, 1, 10000),
(3584, 68, 2, 2000055),
(3586, 67, 3, 30000),
(3586, 71, 2, 40000),
(3587, 67, 1, 10000),
(3588, 67, 1, 10000),
(3588, 82, 1, 29000);

--
-- Triggers `ctdonhang`
--
DELIMITER $$
CREATE TRIGGER `add_sl` AFTER INSERT ON `ctdonhang` FOR EACH ROW UPDATE sanpham
SET sanpham.soLuong=sanpham.soLuong+new.soLuong
WHERE sanpham.maSP=new.sanpham_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `maDanhMuc` int(11) NOT NULL,
  `tenDanhMuc` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `moTa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `hinhAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`maDanhMuc`, `tenDanhMuc`, `moTa`, `hinhAnh`) VALUES
(1, 'Bữa Sáng', 'Buổi sáng nên ăn gì để tốt cho sức khỏe, lành mạnh và đủ năng lượng cho ngày mới, bạn hãy áp dụng những gợi ý bữa sáng kể trên để cả ngày tràn đầy năng lượng và đảm bảo sức khỏe. ', 'sang.jpg'),
(2, 'Bữa Trưa', 'Vào giữa ngày, cơ thể bạn cần một nguồn năng lượng mới sau bữa ăn sáng đã cách đó vài giờ đồng hồ. Năng lượng và sự tập trung đã giảm đi đáng kể so với khi bạn vừa bắt đầu ngày mới. ', 'trua.jpg'),
(3, 'Bữa Chiều', 'Buổi sáng làm việc dài, bạn cần có bữa phụ giữa giờ. Nếu có ăn tối trễ nên ăn nhẹ vào buổi chiều.Bữa chiều sẻ cung cấp năng lượng cho bạn các hoạt động tốt hơn.', 'chieu.jpg'),
(4, 'Bữa Tối', 'Kết thúc một ngày vất vả thì bữa tối sẻ giúp bạn thư giản cở thể.Bạn có thể tham khảo các món ăn được gởi ý ở dưới.', 'toi.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `maDH` int(11) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `diaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngayDH` date NOT NULL,
  `trangThai` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`maDH`, `khachhang_id`, `diaChi`, `ngayDH`, `trangThai`) VALUES
(123, 6, 'day la dia chi', '2020-06-03', '1'),
(456, 6, 'day la dia chi', '2020-06-03', '1'),
(1536, 2, 'null', '2020-06-11', '0'),
(3576, 10, 'null', '2020-06-04', '0'),
(3577, 6, 'null', '2020-06-05', '0'),
(3578, 11, 'nghia', '2020-06-07', '1'),
(3583, 11, 'd', '2020-06-07', '1'),
(3584, 11, 'k', '2020-06-07', '1'),
(3586, 12, '5', '2020-06-07', '1'),
(3587, 12, 'h', '2020-06-07', '1'),
(3588, 12, 'k', '2020-06-07', '1'),
(3589, 12, 'null', '2020-06-07', '0'),
(3590, 11, 'null', '2020-06-07', '0');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `taiKhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoTen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `dienThoai` varchar(13) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `taiKhoan`, `matKhau`, `hoTen`, `dienThoai`, `email`) VALUES
(1, 'phidz', 'admin', 'phi', '01646251700', 'phidz@gmail.com'),
(2, 'nghia', 'admin', 'truong duc nghia', '0346251700', 'truongnghiahtn@gmail.com'),
(3, 'phong', 'admin', 'tran thanh phong', '0365336987', 'phongtran@gmail.com'),
(4, 'duc', 'admin', 'nguyen cong duc', '0326985', 'congduc@gmail.com'),
(5, 'minh', 'admin', 'nguyen van minh', '0369215713', 'minhnguyen@gmail.com'),
(6, 'anhkinkan', 'ef5eac6cb2abaa4ef4330f1a498e50bc:19051453335ed9976b37392', 'truong duc nghia ', '0346251700112', 'truongnghiahtn@gmail.com'),
(10, 'anhkinkan1', '3f1ca05e445055e404fb89fc96c687b8:12833676635ed90b116a96e', 'admin', '44545', 'admin@gmail.com'),
(11, 'TruongNghia', '725b503d90c96384b43c06b58f188abd:12930546955eddc5c2509d3', 'truong nghia 123', '03462517005', 'truongnghiahtn@gmail.com'),
(12, 'ducnghia', '59df459812e1cc7db28fc6892395c40b:6020665885edcfd0a5db21', 'duc nghia', '0346251700', 'truongnghiahtn@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `moTa` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `danhmuc_id` int(11) NOT NULL,
  `hinhAnh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `giaSP` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `soLuong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `moTa`, `danhmuc_id`, `hinhAnh`, `giaSP`, `soLuong`) VALUES
(67, 'BÁNH MỲ BAGUETTE', 'Thành phần: Bột mỳ, men, muối, nước.', 1, 'sang_1.jpg', '10000', 11),
(68, 'Bánh tươi xúc xích', 'Thành phần: Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước), xúc xích (thịt gà & thịt lợn), phomai, hành lá', 1, 'sang_2.jpg', '20000', 3),
(69, 'Bánh tươi xúc xích phomai', ' Thành phần: Bột bánh burger (bột mỳ, men, đường, muối, trứng, bơ, nước),  xúc xích (thịt gà & thịt lợn),pho mai, sốt bơ tỏi, sốt Mayonnaise, bột bánh gối', 1, 'sang_3.jpg', '25000', 2),
(70, 'Bánh gối trắng ', 'Thành phần: Bột mỳ, men, muối, bơ, đường, sữa bột, trứng gà, nước\r\n\r\n', 1, 'sang_4.jpg', '29000', 0),
(71, 'Bánh tươi xúc xích ngô', 'Thành phần: Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước) phomai, xúc xích, ngô hạt, sốt Mayonnaise', 1, 'sang_5.jpg', '20000', 1),
(77, 'BÁNH MỲ KẸP NƯỚNG', 'Thành Phần:Bột burger (bột mỳ, men, đường, muối, bơ, trứng, nước), giăm bông, rau xà lách, dưa chuột, cà chua, hành tây, sốt Mayonnaise', 2, 'trua_1.jpg', '25000', 3),
(78, 'SANDWICH GIĂM BÔNG PHOMAI', 'Thành phần: Bột bánh mỳ gối (bột mỳ, men, muối, bơ, đường, trứng gà, nước), giăm bông, phomai, sốt Mayonnaise, trứng gà', 2, 'trua_2.jpg', '29000', 1),
(79, 'SANDWICH GIĂM BÔNG', 'Thành phần: Bột bánh mỳ gối (bột mỳ, men, muối, bơ, đường,  trứng gà, nước), giăm bông, rau xà lách, cà chua, sốt Mayonnaise', 2, 'trua_3.jpg', '25000', 0),
(80, 'Bánh Burger bò', 'Thành phần: Bột burger (bột mỳ, men, đường, muối, bơ, trứng, nước), thịt bò, phomai lát, cà chua, rau xà lách.', 2, 'trua_4.jpg', '30000', 0),
(81, 'PIZZA GIĂM BÔNG NẤM\r\n', 'Thành phần: Bột pizza (bột mỳ, muối, men, nước, đường, dầu), giăm bông, nấm, phomai, rau hỗn hợp, sốt cà chua', 2, 'trua_5.jpg', '29000', 0),
(82, 'MOUSSE CHANH LEO', 'Thành phần: Cốt bánh vani, lớp mouse mát lạnh vị chanh leo', 3, 'chieu_1.jpg', '29000', 8),
(83, 'PANNA COTTA', 'Thành phần: Panna Cotta  là món tráng miệng hấp dẫn với hương vị chua ngọt, thích hợp là món tráng miệng cho ngày cuối tuần', 3, 'chieu_2.jpg', '30000', 0),
(84, 'TIRAMISU', 'Thành phần: Chiffon vani, phomai kem, kem sữa (Whipping cream), kem tươi, đường, gelatine, bột cacao, lòng đỏ trứng gà', 3, 'chieu_3.jpg', '29000', 0),
(85, 'SỮA CHUA', 'Thành phần: Sữa chua không đường, sữa tươi, đường, sữa đặc, kem sữa (whipping cream)', 3, 'chieu_4.jpg', '20000', 0),
(86, 'BÁNH TƯƠI PHO MAI RUỐC GÀ CAY', 'Thành phần: Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước), phomai, sốt bơ tỏi .', 4, 'toi_1.jpg', '20000', 1),
(87, 'BÁNH BURGER BÒ', 'Thành phần: Bột burger (bột mỳ, men, đường, muối, bơ, trứng, nước), thịt bò, phomai lát, cà chua, rau xà lách.', 4, 'toi_2.jpg', '30000', 10),
(88, 'BÁNH TƯƠI NHÂN PHOMAI', 'Thành phần: Bột bánh mỳ tươi (bột mỳ, đường, men, sữa bột, trứng gà, muối, bơ, nước), phomai bột Nhân phomai (đường, phomai kem, sữa tươi, trứng, phomai)', 4, 'toi_3.jpg', '15000', 0),
(89, 'BÁNH MỲ KẸP NƯỚNG', 'Thành phần: Bột burger (bột mỳ, men, đường, muối, bơ, trứng, nước), giăm bông, rau xà lách, dưa chuột, cà chua, hành tây, sốt Mayonnaise', 4, 'toi_4.jpg', '25000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD PRIMARY KEY (`donhang_id`,`sanpham_id`),
  ADD KEY `sanpham_id` (`sanpham_id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`maDanhMuc`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`maDH`,`khachhang_id`),
  ADD KEY `khachhang_id` (`khachhang_id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`),
  ADD UNIQUE KEY `taiKhoan` (`taiKhoan`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `danhmuc_id` (`danhmuc_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `maDanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `maDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3591;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ctdonhang`
--
ALTER TABLE `ctdonhang`
  ADD CONSTRAINT `ctdonhang_ibfk_1` FOREIGN KEY (`sanpham_id`) REFERENCES `sanpham` (`maSP`),
  ADD CONSTRAINT `ctdonhang_ibfk_2` FOREIGN KEY (`donhang_id`) REFERENCES `donhang` (`maDH`);

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `donhang_ibfk_1` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`maKH`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`danhmuc_id`) REFERENCES `danhmuc` (`maDanhMuc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
