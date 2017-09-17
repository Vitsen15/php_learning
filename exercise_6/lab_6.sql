-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 17 2017 г., 12:58
-- Версия сервера: 5.6.37
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
-- База данных: `lab_6`
--

-- --------------------------------------------------------

--
-- Структура таблицы `classes`
--

CREATE TABLE `classes` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(12) NOT NULL,
  `abilities` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `classes`
--

INSERT INTO `classes` (`id`, `name`, `abilities`) VALUES
(1, 'Paladin', 'l,dsjf;lkdfk'),
(2, 'Wizard', 'dsfsdfdsfsdfs'),
(3, 'Knight', 'sdfsdfsdf'),
(4, 'Fag', 'sdfsdfsdf');

-- --------------------------------------------------------

--
-- Структура таблицы `players`
--

CREATE TABLE `players` (
  `id` int(6) UNSIGNED NOT NULL,
  `nickname` varchar(10) NOT NULL,
  `lvl` int(2) NOT NULL,
  `id_class` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `players`
--

INSERT INTO `players` (`id`, `nickname`, `lvl`, `id_class`) VALUES
(0, 'George', 1, 4),
(1, 'Falos', 85, 3),
(2, 'vitsen', 85, 2),
(3, 'Pizdabol', 1, 4),
(4, 'skankhunt', 80, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(4) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `age` int(2) NOT NULL,
  `login` varchar(12) NOT NULL,
  `pass_hash` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `age`, `login`, `pass_hash`) VALUES
(1, 'Andrey', 'Vitsentovich', 22, 'vitsen', 'lolololo'),
(2, 'Vitaliy', 'Strelchenko', 22, 'strela228', 'llvhgn'),
(3, 'George', 'Pizdabol', 15, 'ya_pizdabol', 'lolklfo'),
(4, 'Denya', 'Dombovsky', 23, 'php_guru', 'lalalalala');

-- --------------------------------------------------------

--
-- Структура таблицы `users_players`
--

CREATE TABLE `users_players` (
  `id` int(6) UNSIGNED NOT NULL,
  `id_user` int(6) UNSIGNED NOT NULL,
  `id_player` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users_players`
--

INSERT INTO `users_players` (`id`, `id_user`, `id_player`) VALUES
(1, 1, 2),
(2, 2, 1),
(3, 3, 3),
(4, 4, 4),
(5, 3, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users_players`
--
ALTER TABLE `users_players`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
