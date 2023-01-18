-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 18 2023 г., 14:54
-- Версия сервера: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004
-- Версия PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `Vadim_VCIC_MC`
--

-- --------------------------------------------------------

--
-- Структура таблицы `merch`
--

CREATE TABLE `merch` (
  `name_merch` varchar(50) NOT NULL,
  `pic_merch` varchar(250) DEFAULT NULL,
  `price_merch` varchar(10) NOT NULL,
  `info_merch` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `merch`
--

INSERT INTO `merch` (`name_merch`, `pic_merch`, `price_merch`, `info_merch`, `id`) VALUES
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 7),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 8),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 9),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 10),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 11),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 12),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 13),
(' plush Rocket', 'photo.jpg', ' 12$', ' Plush version of Falcon 9.', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `merch_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `servise_id` int(11) DEFAULT NULL,
  `info_request` varchar(200) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id`, `user_id`, `servise_id`, `info_request`, `email`) VALUES
(19, 1, NULL, NULL, 'margos@gmail.com'),
(22, 1, NULL, NULL, 'margos@gmail.com'),
(23, 1, NULL, NULL, 'margos@gmail.com'),
(24, 1, NULL, NULL, 'margos@gmail.com'),
(27, 1, NULL, NULL, 'margos@gmail.com'),
(29, 1, NULL, NULL, 'margos@gmail.com'),
(30, 1, NULL, NULL, 'margos@gmail.com'),
(31, 1, NULL, NULL, 'margos@gmail.com'),
(34, 1, NULL, NULL, 'margos@gmail.com'),
(36, 1, NULL, NULL, 'margos@gmail.com'),
(37, 1, NULL, NULL, 'margos@gmail.com'),
(38, 1, NULL, NULL, 'margos@gmail.com'),
(41, 1, NULL, NULL, 'margos@gmail.com'),
(43, 1, NULL, NULL, 'margos@gmail.com'),
(44, 1, NULL, NULL, 'margos@gmail.com'),
(46, 1, NULL, NULL, 'margos@gmail.com'),
(47, 1, NULL, NULL, 'margos@gmail.com'),
(48, 1, NULL, NULL, 'margos@gmail.com'),
(49, 1, 2, NULL, 'margos@gmail.com'),
(50, 1, NULL, NULL, 'margos@gmail.com'),
(51, 1, NULL, NULL, 'margos@gmail.com'),
(52, 1, NULL, NULL, 'margos@gmail.com');

-- --------------------------------------------------------

--
-- Структура таблицы `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `name_service` varchar(30) NOT NULL,
  `pic_service` varchar(250) DEFAULT NULL,
  `price_service` varchar(10) NOT NULL,
  `info_service` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `service`
--

INSERT INTO `service` (`id`, `name_service`, `pic_service`, `price_service`, `info_service`) VALUES
(2, 'design your project', ' photo.jpg ', 'from 300$', 'ghfjgfdjhg '),
(4, 'design your project', ' photo.jpg ', 'from 300$', 'sdfdfdgf '),
(5, 'design your project', ' photo.jpg ', 'from 300$', 'sdfdfdgf ');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nickname` varchar(12) NOT NULL,
  `first_name` varchar(12) NOT NULL,
  `last_name` varchar(12) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `document_number` varchar(10) NOT NULL,
  `password` varchar(20) NOT NULL,
  `access_token` int(11) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `nickname`, `first_name`, `last_name`, `phone`, `document_number`, `password`, `access_token`, `is_admin`) VALUES
(1, 'admin', 'ad', 'min', '88005553535', '2345354', '435', 452, NULL),
(3, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(12, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(13, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(14, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(15, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(16, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL),
(17, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, 1),
(18, 'fdgfdg', 'dgsdfg', 'dsgfdg', '4575764567', '5dsfdfdf', '4363rfeyg54', NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `merch`
--
ALTER TABLE `merch`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_ibfk_1` (`user_id`),
  ADD KEY `orders_ibfk_3` (`merch_id`);

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id`),
  ADD KEY `request_ibfk_4` (`servise_id`),
  ADD KEY `request_ibfk_5` (`user_id`);

--
-- Индексы таблицы `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `merch`
--
ALTER TABLE `merch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT для таблицы `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`merch_id`) REFERENCES `merch` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_4` FOREIGN KEY (`servise_id`) REFERENCES `service` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `request_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
