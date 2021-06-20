-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 19 2021 г., 16:54
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `books_db`
--

DELIMITER $$
--
-- Процедуры
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `getAutorsList` ()  NO SQL
BEGIN
SET @id = 1;
WHILE @id <= (SELECT MAX(`author_id`) FROM `authors`) DO

SET @author = (SELECT `full_authors_name` FROM `authors` WHERE `author_id` = @id);

SELECT COUNT(*) FROM `collisions` WHERE `collisions`.`full_authors_name_collisions` = @author; 

SELECT @author;

SET @id = @id +1;
END WHILE;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `authors`
--

CREATE TABLE `authors` (
  `author_id` int(11) NOT NULL,
  `full_authors_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Структура таблицы `collisions`
--

CREATE TABLE `collisions` (
  `collision_id` int(11) NOT NULL,
  `full_authors_name_collisions` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `book_name_collisions` varchar(40) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`full_authors_name`),
  ADD UNIQUE KEY `author_id` (`author_id`);

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_name`),
  ADD UNIQUE KEY `book_id` (`book_id`);

--
-- Индексы таблицы `collisions`
--
ALTER TABLE `collisions`
  ADD PRIMARY KEY (`collision_id`),
  ADD KEY `R_5` (`full_authors_name_collisions`),
  ADD KEY `R_6` (`book_name_collisions`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `authors`
--
ALTER TABLE `authors`
  MODIFY `author_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `collisions`
--
ALTER TABLE `collisions`
  MODIFY `collision_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `collisions`
--
ALTER TABLE `collisions`
  ADD CONSTRAINT `R_5` FOREIGN KEY (`full_authors_name_collisions`) REFERENCES `authors` (`full_authors_name`),
  ADD CONSTRAINT `R_6` FOREIGN KEY (`book_name_collisions`) REFERENCES `books` (`book_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
