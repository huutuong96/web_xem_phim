-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 22, 2023 lúc 11:00 AM
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
-- Cơ sở dữ liệu: `web_xem_phim`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `advertisement`
--

CREATE TABLE `advertisement` (
  `id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id_banner` int(5) NOT NULL,
  `image` varchar(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `content` varchar(250) NOT NULL,
  `other_information` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id_banner`, `image`, `title`, `content`, `other_information`) VALUES
(1, 'banner_1.jpg', 'tiêu đề nội dung 1', '', ''),
(2, 'banner_2.jpg', 'tiêu đề nội dung 2', 'After 30 days of travel across the world...', ''),
(3, 'banner_3.jpg', 'tiêu đề nội dung 3', 'After 30 days of travel across the world...', ''),
(4, 'banner_4.jpg', 'tiêu đề nội dung 4', 'After 30 days of travel across the world...', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `title` int(11) NOT NULL,
  `content` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `txt` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categori`
--

CREATE TABLE `categori` (
  `id_categori` int(5) NOT NULL,
  `name_categori` varchar(50) NOT NULL,
  `status` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categori`
--

INSERT INTO `categori` (`id_categori`, `name_categori`, `status`) VALUES
(1, 'action film.', b'1'),
(2, 'Comedy movie', b'1'),
(3, 'Romantic movie', b'1'),
(4, 'Horror movie', b'1'),
(5, 'Animated movie', b'1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `film`
--

CREATE TABLE `film` (
  `id_film` int(5) NOT NULL,
  `film_name` varchar(50) NOT NULL,
  `film_image` varchar(50) NOT NULL,
  `film_desc` varchar(250) NOT NULL,
  `link` varchar(250) NOT NULL,
  `film_genre` varchar(250) NOT NULL,
  `epsode` text DEFAULT NULL,
  `view` int(10) NOT NULL,
  `star` int(1) NOT NULL,
  `id_categori` int(5) NOT NULL,
  `author` varchar(50) NOT NULL,
  `other_information` text DEFAULT NULL,
  `type` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `film`
--

INSERT INTO `film` (`id_film`, `film_name`, `film_image`, `film_desc`, `link`, `film_genre`, `epsode`, `view`, `star`, `id_categori`, `author`, `other_information`, `type`) VALUES
(0, 'Fate Stay Night: Unlimited Blade', '5.jpg', 'Every human inhabiting the world of Alcia is branded by a “Count” or a number written on their body. For Hina’s mother, her total drops to 0 and she’s pulled into the Abyss, never to be seen again. But her mother’s last words send Hina on a quest to ', 'https://www.youtube.com/embed/zxG4OjYunJo?si=QAo-pFpOUqsa8i5Y', 'Action, Adventure, Fantasy, Magic', '', 9141, 5, 2, 'フェイト／ステイナイト, Feito／sutei naito', NULL, b'0'),
(1, 'gia_tri_name_film', '1.jpg', 'film_1.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(2, 'gia_tri_name_film', '2.jpg', 'film_2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0'),
(3, 'gia_tri_name_film', '3.jpg', 'film_3.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(4, 'gia_tri_name_film', '4.jpg', 'film_4.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(5, 'gia_tri_name_film', '5.jpg', 'film_5.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(6, 'gia_tri_name_film', '6.jpg', 'film_6.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(7, 'gia_tri_name_film', '7.jpg', 'film_7.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(8, 'gia_tri_name_film', '8.jpg', 'film_8.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(9, 'gia_tri_name_film', '9.jpg', 'film_9.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(10, 'gia_tri_name_film', '10.jpg', 'film_10.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(11, 'gia_tri_name_film', '11.jpg', 'film_11.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(12, 'gia_tri_name_film', '12.jpg', 'film_8.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 1, '', NULL, b'0'),
(13, 'gia_tri_name_film', '13.jpg', 'film_1.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(14, 'gia_tri_name_film', '14.jpg', 'film_2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0'),
(15, 'gia_tri_name_film', '15.jpg', 'film_3.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(16, 'gia_tri_name_film', '16.jpg', 'film_4.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(17, 'gia_tri_name_film', '17.jpg', 'film_5.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(18, 'gia_tri_name_film', '18.jpg', 'film_2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0'),
(19, 'gia_tri_name_film', '19.jpg', 'film_1.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(20, 'gia_tri_name_film', '20.jpg', 'film_2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0'),
(21, 'gia_tri_name_film', '21.jpg', 'film_3.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 3, '', NULL, b'0'),
(23, 'gia_tri_name_film', '4.jpg', '4.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(24, 'gia_tri_name_film', '5.jpg', '5.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 2, '', NULL, b'0'),
(25, 'gia_tri_name_film', '2.jpg', '2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0'),
(26, 'gia_tri_name_film', '2.jpg', 'film_2.mp4', 'gia_tri_film_trailer', 'gia_tri_film_genre', 'gia_tri_video', 0, 0, 4, '', NULL, b'0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `messenger`
--

CREATE TABLE `messenger` (
  `id_msg` int(5) NOT NULL,
  `content` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_user` int(5) NOT NULL,
  `id_film` int(5) NOT NULL,
  `id_blog` int(5) NOT NULL,
  `role` int(5) NOT NULL,
  `reply_for_id_msg` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `email` varchar(250) NOT NULL,
  `role` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id_banner`);

--
-- Chỉ mục cho bảng `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Chỉ mục cho bảng `categori`
--
ALTER TABLE `categori`
  ADD PRIMARY KEY (`id_categori`);

--
-- Chỉ mục cho bảng `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`id_film`),
  ADD KEY `fim-categori` (`id_categori`);

--
-- Chỉ mục cho bảng `messenger`
--
ALTER TABLE `messenger`
  ADD PRIMARY KEY (`id_msg`),
  ADD KEY `msg-user` (`id_user`),
  ADD KEY `msg-blog` (`id_blog`),
  ADD KEY `msg-film` (`id_film`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `advertisement`
--
ALTER TABLE `advertisement`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id_banner` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categori`
--
ALTER TABLE `categori`
  MODIFY `id_categori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `film`
--
ALTER TABLE `film`
  MODIFY `id_film` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `messenger`
--
ALTER TABLE `messenger`
  MODIFY `id_msg` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `fim-categori` FOREIGN KEY (`id_categori`) REFERENCES `categori` (`id_categori`);

--
-- Các ràng buộc cho bảng `messenger`
--
ALTER TABLE `messenger`
  ADD CONSTRAINT `msg-blog` FOREIGN KEY (`id_blog`) REFERENCES `blog` (`id_blog`),
  ADD CONSTRAINT `msg-film` FOREIGN KEY (`id_film`) REFERENCES `film` (`id_film`),
  ADD CONSTRAINT `msg-user` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
