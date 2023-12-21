-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Хост: localhost:3306
-- Время создания: Янв 02 2017 г., 13:20
-- Версия сервера: 5.5.42
-- Версия PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_ecommerce`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(64) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `description` text NOT NULL,
  `creating_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `title`, `slug`, `description`, `creating_date`) VALUES
(2, 'Apple', 'apple', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut sed lacus fermentum, pulvinar ligula in, tincidunt mi. Donec ultrices sagittis nisl, a tempor augue pellentesque ac. Vestibulum efficitur ac velit at rhoncus. Fusce interdum elit at commodo fermentum. Nullam non semper ipsum. Vivamus urna mi, venenatis vitae fermentum ac, euismod at ligula.', '2016-12-30 08:41:53'),
(3, 'Dell', 'dell', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut sed lacus fermentum, pulvinar ligula in, tincidunt mi. Donec ultrices sagittis nisl, a tempor augue pellentesque ac. Vestibulum efficitur ac velit at rhoncus. Fusce interdum elit at commodo fermentum. Nullam non semper ipsum. Vivamus urna mi, venenatis vitae fermentum ac, euismod at ligula.', '2016-12-30 08:42:15'),
(4, 'MSI', 'msi', 'Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut sed lacus fermentum, pulvinar ligula in, tincidunt mi. Donec ultrices sagittis nisl, a tempor augue pellentesque ac. Vestibulum efficitur ac velit at rhoncus. Fusce interdum elit at commodo fermentum. Nullam non semper ipsum. Vivamus urna mi, venenatis vitae fermentum ac, euismod at ligula.', '2016-12-30 08:43:02'),
(12, 'Toshiba', 'toshiba', 'Interdum et malesuada fames ac ante ipsum', '2016-12-30 21:23:20'),
(14, 'Acer', 'acer', 'Lorem ipsum', '2017-01-02 01:16:18'),
(15, 'Lenovo', 'lenovo', 'test descr', '2017-01-02 01:29:46');

-- --------------------------------------------------------

--
-- Структура таблицы `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT '0',
  `data` blob NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

--
-- Дамп данных таблицы `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('76a42461f641cf53a2649426e2017db5cc19af01', '::1', 1483358709, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335383530373b757365725f69647c733a313a2231223b),
('5ae6a6d6eb8cd149315994283983f630329bb218', '::1', 1483356926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335363635303b757365725f69647c733a313a2231223b),
('9bc806f0819192f8e347f73879aa8ff8df251d0f', '::1', 1483356640, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335363334343b757365725f69647c733a313a2231223b),
('6241c2a20444e120972828addb349d598f5d1279', '::1', 1483359560, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335393236363b757365725f69647c733a313a2231223b),
('6da9f0fd2b6c60c5dce5a5dc54b3f2d797b778ab', '::1', 1483359046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335383831303b757365725f69647c733a313a2231223b),
('ca41393e1d5511d2731492937beb7e068ce2267d', '::1', 1483354046, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335333734363b757365725f69647c733a313a2231223b),
('667b0f18027711ef1c65bc1e5d07663101fcf699', '::1', 1483354392, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335343130303b757365725f69647c733a313a2231223b),
('6b66f30af97f702832d898f1d35b8c3e657fd2ee', '::1', 1483354707, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335343430393b757365725f69647c733a313a2231223b),
('3e331dca391a3fdf18f461a8b507e1c09063a7b3', '::1', 1483355011, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335343731343b757365725f69647c733a313a2231223b),
('9d4f0c1c847a0fed8b760337ea76e64b7082a870', '::1', 1483355171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335353035373b757365725f69647c733a313a2231223b),
('8f16aa042112caa06595dc7f7c0f8637b6210e8b', '::1', 1483356018, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335353732323b757365725f69647c733a313a2231223b),
('d2844635c50377855faf1d88f0f7533113b2a49e', '::1', 1483356332, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335363033323b757365725f69647c733a313a2231223b),
('cac378d338e1415d6de09f13c55ea7226f827409', '::1', 1483353706, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335333431313b757365725f69647c733a313a2231223b),
('5632396c5a20261be2590d1f2cad2edfee24f6e3', '::1', 1483352744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335323434343b),
('836dc65bc762066327a9ab9b2542de0351279bbb', '::1', 1483353056, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335323735373b),
('344d14042472a68a6e6eac04ba378a710730ff30', '::1', 1483353358, 0x5f5f63695f6c6173745f726567656e65726174657c693a313438333335333037383b757365725f69647c733a313a2231223b);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `slug` varchar(32) NOT NULL,
  `description` tinytext NOT NULL,
  `category` int(11) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(64) NOT NULL,
  `views` int(10) NOT NULL,
  `creating_date` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `title`, `slug`, `description`, `category`, `price`, `image`, `views`, `creating_date`) VALUES
(2, 'Acer Aspire ES1-731-P84R', 'acer-aspire-es1-731-p84r', 'Привлекательный черный дизайн корпуса, текстурированная верхняя крышка, приятная на ощупь, делают этот ноутбук не похожим на другие и прид', 14, 8499, 'd883c47aa46b0e4619208d10391f0a72.jpg', 0, '2017-01-02 01:15:44'),
(3, 'Acer Aspire S5-371-50DM', 'Acer-Aspire-S5-371-50DM', 'Экран 13.3" IPS (1920x1080) Full HD, матовый / Intel Core i5-7200U (2.5 - 3.1 ГГц) / RAM 8 ГБ / SSD 256 ГБ / Intel HD Graphics / без ОД / Wi-Fi / Bluetooth / веб-камера / Linux / 1.3 кг / черный', 14, 21999, '0e46c63ef325bd17efd0245ac4c223b2.jpg', 0, '2017-01-02 01:19:51'),
(4, 'Apple MacBook 12" Space Gray', 'Apple-MacBook-12-Space-Gray', 'Экран 12" Retina IPS (2304x1440) LED, глянцевый / Intel Core M5 (1.2 - 2.7 ГГц) / RAM 8 ГБ / SSD 512 ГБ / Intel HD Graphics 515 / без ОД / Wi-Fi 802.11ac / Bluetooth 4.0 / веб-камера / OS X El Capitan / 0.92 кг / се', 2, 55799, 'e8f71e4ca5fb94123d3cd7f025b7165d.jpg', 27, '2017-01-02 01:22:17'),
(5, 'Apple MacBook Air 13', 'Apple-MacBook-Air-13', 'Экран 13.3" (1440x900) WXGA+ LED, глянцевый / Intel Core i5 (1.6 - 2.7 ГГц) / RAM 8 ГБ / SSD 256 ГБ / Intel HD Graphics 6000 / без ОД / Wi-Fi / Bluetooth / веб-камера / OS X Yosemite / 1.35 кг\r\nПодробнее: http', 2, 41799, '262269108190ff2f7cab8d0ccacf2b9b.jpg', 4, '2017-01-02 01:23:47'),
(6, 'Lenovo IdeaPad 110-14IBR', 'Lenovo-IdeaPad-110-14IBR', 'Экран 14" (1366x768) HD, глянцевый / Intel Celeron N3060 (1.6 - 2.48 ГГц) / RAM 2 ГБ / HDD 500 ГБ / Intel HD Graphics 400 / без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2 кг / черный\r\nПодробнее:', 15, 4999, '133a78c92255bdf848357a36a1ae3790.jpg', 13, '2017-01-02 01:31:07'),
(7, 'Lenovo Yoga 710-15IKB', 'Lenovo-Yoga-710-15IKB ', 'Экран 15.6" IPS (1920x1080) Full HD, Multi-touch, глянцевый с антибликовым покрытием / Intel Core i7-7500U (2.7 - 3.5 ГГц) / RAM 8 ГБ / SSD 512 ГБ / nVidia GeForce 940MX, 2 ГБ / без ОД / Wi-Fi / Bluetooth ', 15, 37777, '2b26b0db5e6c0afc0a20db0eadee6e33.jpg', 7, '2017-01-02 01:33:46'),
(8, 'Lenovo ThinkPad E460', 'Lenovo-ThinkPad-E460', 'Производительный и надежный ноутбук ThinkPad E450 — это сочетание безопасности, стильного профессионального дизайна и широких мультимедийных ', 15, 21005, '0686013171f4d2c9923b811e4b7d59d1.jpg', 5, '2017-01-02 01:43:56'),
(9, 'Lenovo G70-80', 'Lenovo-G70-80', 'Экран 17.3" TN (1600x900) HD+, глянцевый / Intel Core i3-5005U (2.0 ГГц) / RAM 4 ГБ / HDD 1 ТБ / Intel HD Graphics / DVD Super Multi / LAN / Wi-Fi / Bluetooth / веб-камера / DOS / 2.85 кг / черный', 15, 12325, 'b999584f64f386905373f93e43e65978.jpg', 0, '2017-01-02 01:45:28'),
(10, 'MSI GT72VR-6RE Dominator Pro Tob', 'MSI-GT72VR-6RE-Dominato', 'Графические карты GeForce GTX являются наиболее высокотехнологичными из когда-либо созданных. Приобретите беспрецедентную производительност', 4, 74490, 'c98a3040e328046bfdc8bf9fd4364fbc.jpg', 12, '2017-01-02 01:49:58'),
(11, 'MSI GT80 2QD Titan SLI', 'MSI-GT80-2QD-Titan-SLI', 'MSI GT80 Titan SLI — словно боевая единица из научно-фантастических фильмов, он всем своим видом говорит о серьёзности намерений — мощнейшее воор', 4, 59900, 'd0156d2a0168fa2070af204a8e3a90fa.jpg', 0, '2017-01-02 02:00:54'),
(12, 'MSI GE62VR 6RF Apache Pro', 'MSI-GE62VR-6RF-Apache-Pro', 'Графические карты GeForce GTX являются наиболее высокотехнологичными из когда-либо созданных. Приобретите беспрецедентную производительност', 4, 44330, 'df232d64e4f442aac0f663265c96ddb5.jpg', 0, '2017-01-02 02:03:01'),
(13, 'Dell Vostro 5459', 'Dell-Vostro-5459', 'Этот cверхмобильный ноутбук из алюминия Jingle Gold с углом обзора 170° и 14-дюймовым HD дисплеем, возвращает стиль в зал заседаний и делает совмест', 3, 23451, 'de9de691e5c75e81c22a297b6e38c757.jpg', 0, '2017-01-02 02:07:17'),
(14, 'Dell XPS 13 9350', 'Dell-XPS-13-9350', 'Дисплей больше, вес меньше. Практически безрамочный дисплей InfinityEdge максимально увеличивает пространство экрана за счет установки дисплея', 3, 32733, '9ef442571d9bb8c71a0e06070b386086.jpg', 0, '2017-01-02 02:09:32'),
(15, 'Acer Aspire R7-372T-52BA', 'Acer-Aspire-R7-372T-52BA', 'Запатентованный механизм Acer Ezel Aero Hinge — это инновационное решение, обеспечивающее удобный переход в любой из шести режимов. Поворотный мех', 14, 25999, '2dd6c44697c1265e40a9d3e1da3cc8b8.jpg', 1, '2017-01-02 02:11:08'),
(16, 'Dell Inspiron 5559', 'Dell-Inspiron-5559', 'Этот тонкий, легкий и недорогой ноутбук Inspiron 15 серии 5000, отличающийся ярким экраном и оснащенный функциями для поддержки широчайшего спект', 3, 18950, '93c7f5d763e34c4e13a87fb3a3b69bfc.jpg', 0, '2017-01-02 02:12:45'),
(17, 'Dell Alienware 13 R2', 'Dell-Alienware-13-R2', 'Экран 13.3" IPS (1920x1080) Full HD, матовый / Intel Core i7-6500U (2.5 - 3.1 ГГц) / RAM 8 ГБ / SSD 256 ГБ / nVidia GeForce GTX 960M, 4 ГБ / Без ОД / LAN / Wi-Fi / Bluetooth / веб-камера / Windows 10 Home / 2.058 кг', 3, 47525, '5d37637b5769512b6c1bc6125b4438c2.jpg', 0, '2017-01-02 02:14:04'),
(18, 'sdfgdfg', 'sdfgdfg', 'sdfgdfg', 2, 2345, '0', 0, '2017-01-02 11:32:43'),
(19, 'wqerqwr', 'wqerqwr', 'wqerqwr', 2, 23435, '0', 0, '2017-01-02 11:32:54'),
(20, 'cvxbcvb', 'cvxbcvb', 'cvxbcvb', 2, 23546, '0', 0, '2017-01-02 11:33:02'),
(21, 'cvxbxcvb', 'cvxbxcvb', 'cvxbxcvb', 2, 1654, '0', 0, '2017-01-02 11:33:14'),
(22, 'gghfjhgj', 'gghfjhgj', 'gghfjhgj', 2, 7688, '0', 0, '2017-01-02 11:33:23'),
(23, 'ljlkjkkjk', 'ljlkjkkjk', 'ljlkjkkjk', 2, 3425, '0', 0, '2017-01-02 11:33:42'),
(24, 'vcbnvbncvb', 'vcbnvbncvb', 'vcbnvbncvb', 2, 5467, '0', 0, '2017-01-02 11:33:50'),
(25, 'cvbnvbnvb', 'cvbnvbnvb', 'cvbnvbnvb', 2, 57465, '0', 0, '2017-01-02 11:34:02'),
(26, 'dflsjhgs', 'dflsjhgs', 'dflsjhgs', 2, 2975, '0', 0, '2017-01-02 11:34:13'),
(27, 'oiweu', 'oiweu', 'oiweu', 2, 345, '0', 0, '2017-01-02 11:34:21'),
(28, 'cvuxybt', 'cvuxybt', 'cvuxybt', 2, 3246, '0', 0, '2017-01-02 11:34:30'),
(29, 'yxcxdv', 'yxcxdv', 'yxcxdv', 2, 457, '0', 0, '2017-01-02 11:34:48'),
(30, 'vjkchgb', 'vjkchgb', 'vjkchgb', 2, 32764, '0', 0, '2017-01-02 11:34:57');

-- --------------------------------------------------------

--
-- Структура таблицы `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `properties`
--

INSERT INTO `properties` (`id`, `title`) VALUES
(1, 'CPU'),
(2, 'Display'),
(3, 'RAM'),
(4, 'OS'),
(5, 'HDD');

-- --------------------------------------------------------

--
-- Структура таблицы `properties_relationship`
--

CREATE TABLE `properties_relationship` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `property_id` int(11) NOT NULL,
  `value` varchar(64) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `properties_relationship`
--

INSERT INTO `properties_relationship` (`id`, `product_id`, `property_id`, `value`) VALUES
(17, 2, 1, 'Intel Pentium N3710'),
(18, 2, 2, '17.3'),
(19, 2, 3, '4 Gb'),
(20, 2, 4, 'Linux'),
(21, 2, 5, '500 Gb'),
(27, 3, 1, 'Intel Core i5-7200U'),
(28, 3, 2, '13.3'),
(29, 3, 3, '8 Gb'),
(30, 3, 4, 'Linux'),
(31, 3, 5, '256 Gb SSD'),
(32, 4, 1, 'Intel Core M5'),
(33, 4, 2, '12"'),
(34, 4, 3, '8 Gb'),
(35, 4, 4, 'Mac OS X El Capitan'),
(36, 4, 5, '512 Gb SSD'),
(37, 5, 1, 'Intel Core i5'),
(38, 5, 2, '13.3"'),
(39, 5, 3, '8 Gb'),
(40, 5, 4, 'Mac OS X Yosemite'),
(41, 5, 5, '256 Gb SSD'),
(47, 6, 1, 'Intel Celeron N3060'),
(48, 6, 2, '14'),
(49, 6, 3, '2 Gb'),
(50, 6, 4, 'Dos'),
(51, 6, 5, '500 Gb'),
(52, 7, 1, 'Intel Core i7-7500U'),
(53, 7, 2, '15.6"'),
(54, 7, 3, '8 Gb'),
(55, 7, 4, 'Windows 10 Home'),
(56, 7, 5, '512 Gb SSD'),
(57, 8, 1, 'Intel Core i7-6500U'),
(58, 8, 2, '14"'),
(59, 8, 3, '8 Gb'),
(60, 8, 4, 'Dos'),
(61, 8, 5, '1 Tb'),
(62, 9, 1, 'Intel Core i3-5005U'),
(63, 9, 2, '17.3"'),
(64, 9, 3, '4 Gb'),
(65, 9, 4, 'Dos'),
(66, 9, 5, '1 Tb'),
(73, 11, 1, 'Intel Core i7-4720HQ'),
(74, 11, 2, '18.4"'),
(75, 11, 3, '16 Gb'),
(76, 11, 4, 'Windows 8.1'),
(77, 11, 5, '1 ТБ + SSD 256 ГБ'),
(78, 12, 1, 'Intel Core i7-6700HQ'),
(79, 12, 2, '15.6"'),
(80, 12, 3, '8 Gb'),
(81, 12, 4, 'Dos'),
(82, 12, 5, '1 ТБ + SSD 256 ГБ'),
(83, 13, 1, 'Intel Core i7-6500U'),
(84, 13, 2, '14"'),
(85, 13, 3, '4 Gb'),
(86, 13, 4, 'Linux'),
(87, 13, 5, '256 Gb SSD'),
(88, 14, 1, 'Intel Core i7-6200U'),
(89, 14, 2, '13.3"'),
(90, 14, 3, '4 Gb'),
(91, 14, 4, 'Windows 10 Home'),
(92, 14, 5, '128 Gb SSD'),
(93, 15, 1, 'Intel Core i5-6200U'),
(94, 15, 2, '13.3"'),
(95, 15, 3, '8 Gb'),
(96, 15, 4, 'Windows 10 Home'),
(97, 15, 5, '256 Gb SSD'),
(98, 16, 1, 'Intel Core i7-6500U'),
(99, 16, 2, '15.6"'),
(100, 16, 3, '8 Gb'),
(101, 16, 4, 'Linux'),
(102, 16, 5, '1 Tb'),
(103, 17, 1, 'Intel Core i7-6500U'),
(104, 17, 2, '13.3"'),
(105, 17, 3, '8 Gb'),
(106, 17, 4, 'Windows 10 Home'),
(107, 17, 5, '256 Gb SSD'),
(108, 10, 1, 'Intel Core i7-6700HQ'),
(109, 10, 2, '17.3'),
(110, 10, 3, '32 Gb'),
(111, 10, 4, 'Windows 10 Home'),
(112, 10, 5, '1 ТБ + SSD 256 ГБ');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `role`) VALUES
(1, 'drfreud', '81dc9bdb52d04dc20036dbd8313ed055', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `properties_relationship`
--
ALTER TABLE `properties_relationship`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT для таблицы `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `properties_relationship`
--
ALTER TABLE `properties_relationship`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=113;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
