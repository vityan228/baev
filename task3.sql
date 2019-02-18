-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 11 2019 г., 09:54
-- Версия сервера: 5.6.41
-- Версия PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `task3`
--

-- --------------------------------------------------------

--
-- Структура таблицы `request`
--

CREATE TABLE `request` (
  `id_request` int(3) NOT NULL,
  `city` varchar(100) NOT NULL,
  `birthday` date NOT NULL,
  `phone` varchar(30) NOT NULL,
  `text` text NOT NULL,
  `date` datetime NOT NULL,
  `ip_user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `request`
--

INSERT INTO `request` (`id_request`, `city`, `birthday`, `phone`, `text`, `date`, `ip_user`) VALUES
(80, 'Ростов', '2005-02-20', '+7 (232) 132-13-21', 'Площадь потолка: 23кв.м.<br>Светильников: 12шт.<br>Люстр: 324шт.<br>Труб: 435шт.<br>Углов: 12шт.<br>Фактура: 2<br>Итоговая цена :рублей', '2019-02-06 15:23:26', '127.0.0.1'),
(81, 'Краснодар', '0000-00-00', '+7 (234) 324-32-42', 'Площадь потолка: 234  кв.м.<br>Светильников: 234  шт.<br>Люстр: 234  шт.<br>Труб: 234  шт.<br>Углов: 234  шт.<br>Фактура: 2<br>Итоговая цена :2387736 рублей', '2019-02-06 17:05:25', '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id_settings` int(3) NOT NULL,
  `price_square_m` decimal(10,0) NOT NULL,
  `price_lamp` decimal(10,0) NOT NULL,
  `price_chandelier` decimal(10,0) NOT NULL,
  `price_tube` decimal(10,0) NOT NULL,
  `price_corner` decimal(10,0) NOT NULL,
  `price_glossy` decimal(10,0) NOT NULL,
  `price_matt` decimal(10,0) NOT NULL,
  `color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id_settings`, `price_square_m`, `price_lamp`, `price_chandelier`, `price_tube`, `price_corner`, `price_glossy`, `price_matt`, `color`) VALUES
(1, '100', '99', '100', '2', '3', '4', '100', '{\"3\":\"qwe\",\"4\":\"www\",\"5\":\"qqq\",\"6\":\"111\",\"7\":\"1112\"}');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login_user` varchar(200) NOT NULL,
  `password_user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_user`, `login_user`, `password_user`) VALUES
(9, '23l11319', '123123123'),
(12, '12', '12'),
(13, '2345', '234'),
(14, '123', '1111'),
(15, 'vitya', '1234'),
(17, '1234', '1'),
(18, '1122', '202cb962ac59075b964b07152d234b70'),
(19, '11223', 'ea3ed20b6b101a09085ef09c97da1597');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`id_request`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id_settings`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `request`
--
ALTER TABLE `request`
  MODIFY `id_request` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT для таблицы `settings`
--
ALTER TABLE `settings`
  MODIFY `id_settings` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
