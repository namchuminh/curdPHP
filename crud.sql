-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 03, 2022 lúc 01:06 PM
-- Phiên bản máy phục vụ: 10.4.22-MariaDB
-- Phiên bản PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `crud`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sinhvien`
--

CREATE TABLE `sinhvien` (
  `maSV` int(11) NOT NULL,
  `tenSinhVien` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `namSinh` date NOT NULL,
  `queQuan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `soDienThoai` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `maLop` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `taiKhoan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `matKhau` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phanQuyen` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'sinhvien'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sinhvien`
--

INSERT INTO `sinhvien` (`maSV`, `tenSinhVien`, `namSinh`, `queQuan`, `soDienThoai`, `maLop`, `taiKhoan`, `matKhau`, `phanQuyen`) VALUES
(4, 'Tran Ngoc Ha', '2002-11-14', 'Ba Vì', '0388315968', 'D15CNPM2', 'tranngocha', 'tranngocha', 'sinhvien'),
(5, 'Chu Minh Nam', '2002-02-07', 'Hà Nội ', '0379962045', 'D15CNPM2', 'chuminhnam', 'chuminhnam', 'admin'),
(6, 'Phùng Thái Sơn', '2002-06-23', 'Ba Vì', '0385647532', 'D15CNTT2', 'phungthaison', 'phungthaison', 'sinhvien'),
(7, 'Chu Thị Minh Anh', '2001-01-10', 'Hà Nội', '0358769532', 'D16CNPM2', 'chuthiminhanh', 'chuthiminhanh', 'sinhvien'),
(8, 'Nguyễn Văn A', '2007-06-05', 'Hải Phòng', '0988988988', 'D16CNPM3', 'nguyenvana', 'nguyenvana', 'sinhvien'),
(9, 'Nguyễn Văn B', '2003-02-01', 'Bắc Ninh', '0898666666', 'D16CNPM3', 'nguyenvanb', 'nguyenvanb', 'sinhvien'),
(10, 'Nguyễn Văn C', '2007-06-05', 'Hà Tây', '0379965823', 'D20CNPM3', 'nguyenvanc', 'nguyenvanc', 'sinhvien'),
(11, 'Nguyễn Văn D', '2001-01-05', 'Hà Nội', '0879465132', 'D16CNPM2', 'nguyenvand', 'nguyenvand', 'sinhvien');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  ADD PRIMARY KEY (`maSV`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sinhvien`
--
ALTER TABLE `sinhvien`
  MODIFY `maSV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
