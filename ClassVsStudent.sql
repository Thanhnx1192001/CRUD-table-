-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th2 20, 2023 lúc 06:53 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ClassVsStudent`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Class`
--

CREATE TABLE `Class` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Class`
--

INSERT INTO `Class` (`Id`, `FullName`, `Created_at`) VALUES
(1, 'A1', '2023-02-15 10:30:23'),
(2, 'A2', '2023-02-15 04:30:36'),
(3, 'A3', '2023-02-15 04:31:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `Students`
--

CREATE TABLE `Students` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(50) NOT NULL,
  `Orientation` varchar(11) NOT NULL,
  `Class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `Students`
--

INSERT INTO `Students` (`Id`, `FullName`, `Orientation`, `Class_id`) VALUES
(2, 'Nguyễn Duy Linh ', 'Văn', 3),
(29, 'Giang Văn Hưng ', 'Tin', 1),
(41, 'ewfrwe', 'Toán', 1),
(42, 'eqd', 'Tin', 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `Class`
--
ALTER TABLE `Class`
  ADD PRIMARY KEY (`Id`);

--
-- Chỉ mục cho bảng `Students`
--
ALTER TABLE `Students`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Class_id` (`Class_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `Class`
--
ALTER TABLE `Class`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `Students`
--
ALTER TABLE `Students`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `Students`
--
ALTER TABLE `Students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`Class_id`) REFERENCES `Class` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
