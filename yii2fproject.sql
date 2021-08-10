-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 10 2021 г., 00:07
-- Версия сервера: 5.7.29-log
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `yii2fproject`
--

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `fam` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `otch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `authors`
--

INSERT INTO `authors` (`id`, `fam`, `name`, `otch`) VALUES
(1, 'Усачев', 'Андрей', 'Алексеевич'),
(2, 'Кружков', 'Георгий', 'Михайлович'),
(3, 'Яснов', 'Михаил', 'Давидович'),
(4, 'Алексеева', 'Анна', 'Юрьевна'),
(5, 'Благинина', 'Елена', 'Александровна'),
(6, 'Маршак', 'Самуил', 'Яковлевич'),
(7, 'Барто ', 'Агния ', 'Львовна'),
(8, 'Дрожжин', 'Сергей', 'Николаевич');

-- --------------------------------------------------------

--
-- Структура таблицы `bookauthor`
--

CREATE TABLE `bookauthor` (
  `id` int(11) NOT NULL,
  `id_book` int(11) NOT NULL,
  `id_author` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `bookauthor`
--

INSERT INTO `bookauthor` (`id`, `id_book`, `id_author`) VALUES
(16, 24, 6),
(17, 24, 7),
(18, 24, 8),
(19, 27, 6),
(20, 28, 5),
(21, 29, 1),
(22, 29, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `page` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `title`, `page`) VALUES
(24, 'Новый Год. Стихи-закладки', 10),
(27, 'Стихи и сказки для самых маленьких', 176),
(28, 'Стихи для детей', 64),
(29, 'Рукавички', 16);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `bookauthor`
--
ALTER TABLE `bookauthor`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `bookauthor`
--
ALTER TABLE `bookauthor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
