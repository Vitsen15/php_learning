-- phpMyAdmin SQL Dump
-- version 4.4.15.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 16 2017 г., 11:50
-- Версия сервера: 5.7.11
-- Версия PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `game`
--

-- --------------------------------------------------------

--
-- Структура таблицы `abilities`
--

CREATE TABLE IF NOT EXISTS `abilities` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `abilities`
--

INSERT INTO `abilities` (`id`, `name`) VALUES
(1, 'Magic Missle'),
(2, 'Global Silence'),
(3, 'Hand of God'),
(4, 'Drunk'),
(5, 'BLACK HOLE');

-- --------------------------------------------------------

--
-- Структура таблицы `abilities_effects`
--

CREATE TABLE IF NOT EXISTS `abilities_effects` (
  `id` int(11) NOT NULL,
  `id_ability` int(11) NOT NULL,
  `id_effect` int(11) NOT NULL,
  `effect_value` float NOT NULL,
  `dyrability` float NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `abilities_effects`
--

INSERT INTO `abilities_effects` (`id`, `id_ability`, `id_effect`, `effect_value`, `dyrability`) VALUES
(1, 1, 1, 325, 0),
(2, 1, 3, 0, 2.25),
(3, 2, 4, 0, 5),
(4, 3, 2, 250, 0),
(5, 4, 5, 25, 7),
(6, 4, 1, 150, 0),
(7, 5, 1, 70, 5),
(8, 5, 3, 0, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `name`) VALUES
(1, 'warrior'),
(2, 'mage'),
(3, 'archer'),
(4, 'clerck'),
(5, 'rogue');

-- --------------------------------------------------------

--
-- Структура таблицы `classes_abilities`
--

CREATE TABLE IF NOT EXISTS `classes_abilities` (
  `id` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `id_ability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes_abilities`
--

INSERT INTO `classes_abilities` (`id`, `id_class`, `id_ability`) VALUES
(1, 1, 1),
(2, 1, 4),
(3, 2, 1),
(4, 2, 2),
(5, 3, 2),
(6, 3, 4),
(7, 4, 3),
(8, 4, 5),
(9, 5, 1),
(10, 5, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `effects`
--

CREATE TABLE IF NOT EXISTS `effects` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `effects`
--

INSERT INTO `effects` (`id`, `name`) VALUES
(1, 'damage'),
(2, 'heal'),
(3, 'stun'),
(4, 'silence'),
(5, 'missing');

-- --------------------------------------------------------

--
-- Структура таблицы `personages`
--

CREATE TABLE IF NOT EXISTS `personages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `experience` int(11) NOT NULL,
  `id_player` int(11) NOT NULL,
  `id_class` int(11) NOT NULL,
  `banned` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `personages`
--

INSERT INTO `personages` (`id`, `name`, `level`, `experience`, `id_player`, `id_class`, `banned`) VALUES
(1, 'Vengense Spirit', 11, 3500, 1, 3, 0),
(2, 'Axe', 15, 4500, 2, 1, 0),
(3, 'Sven', 99, 9999, 2, 1, 1),
(4, 'Enigma', 16, 5500, 2, 4, 0),
(5, 'Chiken', 8, 2500, 3, 2, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE IF NOT EXISTS `players` (
  `id` int(11) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password_hash` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `personal_description` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id`, `login`, `password_hash`, `name`, `personal_description`) VALUES
(1, 'admin', '1', 'Admin', 'I''am admin!'),
(2, 'dendi', 'dendi123', 'Miracle', 'Who am i?'),
(3, 'mylogin', 'pass', 'WhoIsYourDaddy', 'Rly?');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `abilities`
--
ALTER TABLE `abilities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `abilities_effects`
--
ALTER TABLE `abilities_effects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `classes_abilities`
--
ALTER TABLE `classes_abilities`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `effects`
--
ALTER TABLE `effects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `personages`
--
ALTER TABLE `personages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `abilities`
--
ALTER TABLE `abilities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `abilities_effects`
--
ALTER TABLE `abilities_effects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `effects`
--
ALTER TABLE `effects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `personages`
--
ALTER TABLE `personages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
