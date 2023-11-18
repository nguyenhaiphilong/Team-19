-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 18, 2023 lúc 04:14 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybds`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `fullcontract`
--

CREATE TABLE `fullcontract` (
  `ID` int(11) NOT NULL,
  `Full_Contract_Code` varchar(15) NOT NULL,
  `Customer_Name` varchar(50) NOT NULL,
  `Year_Of_Birth` int(11) NOT NULL,
  `SSN` varchar(13) NOT NULL,
  `Customer_Address` varchar(100) NOT NULL,
  `Mobile` varchar(12) NOT NULL,
  `Property_ID` varchar(15) NOT NULL,
  `Date_Of_Contract` date NOT NULL,
  `Price` bigint(11) NOT NULL,
  `Deposit` bigint(11) NOT NULL,
  `Remain` bigint(11) NOT NULL,
  `Status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `fullcontract`
--

INSERT INTO `fullcontract` (`ID`, `Full_Contract_Code`, `Customer_Name`, `Year_Of_Birth`, `SSN`, `Customer_Address`, `Mobile`, `Property_ID`, `Date_Of_Contract`, `Price`, `Deposit`, `Remain`, `Status`) VALUES
(4, 'HD23110001', 'Lý Thị Huyền Châu', 1990, '301198908', '45 Trần Hưng Đạo, Quận 5, Thành phố Hồ Chí Minh', '0919686576', 'BDS0001', '2023-11-15', 1000000000, 100000000, 900000000, 'Đã Thanh Toán	'),
(5, 'HD23110002', 'Trần Công Anh', 1989, '404948494', '36 Lê Văn Sỹ, Quận 3, TP.HCM', '0967686878', 'BDS0002', '2023-11-01', 2000000000, 200000000, 1800000000, 'Chưa Thanh Toán'),
(34, 'HD23110003', 'Nguyễn Hải Phi Long', 2003, '034203011450', 'Thành phố Thủ Đức, Thành phố Hồ Chí Minh', '0395279924', ' BDS0003', '2023-11-02', 2000000000, 200000000, 180000000, 'Đã Thanh Toán');

--
-- Bẫy `fullcontract`
--
DELIMITER $$
CREATE TRIGGER `TG_fullcontract_INSERT_AUTOCODE` BEFORE INSERT ON `fullcontract` FOR EACH ROW BEGIN
    DECLARE NAMHT_value VARCHAR(2);
    DECLARE THANGHT_value VARCHAR(2);
    DECLARE Full_Contract_Code_value VARCHAR(10);
    DECLARE MAX_value INT;

    SET NAMHT_value = RIGHT(YEAR(CURDATE()), 2);
    SET THANGHT_value = LPAD(MONTH(CURDATE()), 2, '0');

    IF NOT EXISTS (SELECT 1 FROM fullcontract) THEN
        SET MAX_value = 1;
    ELSE
        SELECT MAX(RIGHT(Full_Contract_Code, 4)) + 1 INTO MAX_value FROM fullcontract;
    END IF;

    SET Full_Contract_Code_value = CONCAT('HD', NAMHT_value, THANGHT_value, LPAD(MAX_value, 4, '0'));
    
    SET NEW.Full_Contract_Code = Full_Contract_Code_value;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `property`
--

CREATE TABLE `property` (
  `ID` int(5) NOT NULL,
  `Property_Code` varchar(11) NOT NULL,
  `Property_Name` varchar(50) NOT NULL,
  `Property_Type_ID` int(11) NOT NULL,
  `Description` mediumtext NOT NULL,
  `District_ID` int(11) NOT NULL,
  `Address` varchar(100) NOT NULL,
  `Area` int(11) NOT NULL,
  `Bed_Room` int(11) NOT NULL,
  `Bath_Room` int(11) NOT NULL,
  `Price` bigint(11) NOT NULL,
  `Installment_Rate` float NOT NULL,
  `Avatar` mediumtext NOT NULL,
  `Album` mediumtext NOT NULL,
  `Property_Status_ID` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `property`
--

INSERT INTO `property` (`ID`, `Property_Code`, `Property_Name`, `Property_Type_ID`, `Description`, `District_ID`, `Address`, `Area`, `Bed_Room`, `Bath_Room`, `Price`, `Installment_Rate`, `Avatar`, `Album`, `Property_Status_ID`) VALUES
(29, 'BDS0001', 'NHÀ PHỐ GARDEN KHANG ĐIỀN', 3, 'Nhà xây 1 trệt, 2 lầu, hoàn thiện bên ngoài kính cường lực, sơn nước chống rêu mốc chất lượng, có cửa kính cường lực, gara ô tô để xe thoải mái.', 1, 'Dự án Melosa Garden, Quận 9, Hồ Chí Minh', 80, 2, 2, 1000000000, 7.99, 'ppc0001.jpg', 'ppc0002.jpg;ppc0003.jpg;', 6),
(30, 'BDS0002', 'NHÀ 4 TẦNG 3 MẶT THOÁNG TRẦN HƯNG ĐẠO Q1', 3, 'Bán nhà trung tâm Quận 1 đoạn đẹp nhất đường Trần Hưng Đạo.', 1, 'Đường Trần Hưng Đạo, Quận 1, Hồ Chí Minh', 78, 2, 2, 2000000000, 7.99, 'ppc0004.jpg', 'ppc0005.jpg;ppc0006.jpg', 6),
(31, 'BDS0003', 'LAVITA CHARM', 2, 'Trong làn gió mát rượi, hương thơm cỏ cây tại Lavita Charm hòa theo từng bước chân sẽ đưa bạn trở về với không gian sống bình yên, tách biệt khỏi sự huyên náo của chốn phồn hoa. Lavita Charm như một nốt trầm yên ả của điệu nhạc du dương cho cảm xúc thăng hoa và nuôi dưỡng đam mê bất tận, đem đến nguồn vui, nguồn cảm hứng mới cho cuộc sống mỗi ngày.', 2, 'Dự án Lavita Charm, Đường 1, Phường Trường Thọ, Thủ Đức, Hồ Chí Minh', 120, 4, 4, 5000000000, 7.99, 'ppc0007.jpg', 'ppc0008.jpg;', 7),
(32, 'BDS0004', 'Văn Lang', 1, '', 1, 'https://www.facebook.com/lythi.huyenchau', 0, 0, 0, 0, 0, '91446ppc0006.jpg', '43227ppc0003.jpg', 1);

--
-- Bẫy `property`
--
DELIMITER $$
CREATE TRIGGER `TG_property_INSERT_AUTOCODE` BEFORE INSERT ON `property` FOR EACH ROW BEGIN
    DECLARE MAX_VAL INT;

    IF NOT EXISTS (SELECT 1 FROM property) THEN
        SET MAX_VAL = 1;
    ELSE
        SET MAX_VAL = (SELECT MAX(RIGHT(Property_Code, 4)) FROM property) + 1;
    END IF;

    SET NEW.Property_Code = CONCAT('BDS', LPAD(MAX_VAL, 4, '0'));
END
$$
DELIMITER ;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `fullcontract`
--
ALTER TABLE `fullcontract`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `fullcontract`
--
ALTER TABLE `fullcontract`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT cho bảng `property`
--
ALTER TABLE `property`
  MODIFY `ID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
