-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 19 2018 г., 22:00
-- Версия сервера: 5.5.53
-- Версия PHP: 7.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `dfaktor`
--
CREATE DATABASE IF NOT EXISTS `dfaktor` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `dfaktor`;

-- --------------------------------------------------------

--
-- Структура таблицы `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `ean` varchar(13) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `description` text,
  `netto` int(11) DEFAULT NULL,
  `brutto` int(11) DEFAULT NULL,
  `language` int(11) DEFAULT NULL,
  `series` int(11) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `books`
--

INSERT INTO `books` (`id`, `isbn`, `ean`, `name`, `description`, `netto`, `brutto`, `language`, `series`, `code`) VALUES
(1, '978-5-98986-206-1', '9785989862061', 'Поэты пушкинской поры.', 'В сборник включены лирические стихотворения тридцати авторов \"золотого века\" русской поэзии. Наряду с крупнейшими поэтами (В.А. Жуковский, К.Н. Батюшков, П.А. Вяземский, Е.А, Баратынский, Н.М. Языков и др.) в книге представлены малоизвестные авторы. Таким образом, дана достаточно полная и детализированная картина лирики пушкинской поры. Издание снабжено комментариями и рассчитано на широкие круги читателей.', 231, 254, 4, 2, '4658'),
(4, '978-5-389-07123-0', '9785389071230', 'Война и мир.Компл.в 4-х тт', 'ВОЙНА И МИР Л.Н.Толстого — книга на все времена. Кажется, что она существовала всегда, настолько знакомым кажется текст, едва мы открываем первые страницы романа, настолько памятны многие его эпизоды: охота и святки, первый бал Наташи Ростовой, лунная ночь в Отрадном, князь Андрей в сражении при Аустерлице... Сцены \"мирной\", семейной жизни сменяются картинами, имеющими значение для хода всей мировой истории, но для Толстого они равноценны, связаны в едином потоке времени. Каждый эпизод важен не только для развития сюжета, но и как одно из бесчисленных проявлений жизни, которая насыщена в каждом своем моменте и которую учит любить Толстой.', 754, 829, 4, 1, '2356'),
(6, '978-5-87107241-7', '9785871072417', 'Шекспир.Сонеты.', 'Английская литература славится многими именами. Но есть одно, ставшее ее символом. Это Уильям Шекспир. Загадочный поэт и драматург, о котором споры не утихают и поныне, обладал невероятным даром проникать в самую суть человеческих страстей. Он находил...', 420, 462, 2, 5, '7456');

-- --------------------------------------------------------

--
-- Структура таблицы `language`
--

CREATE TABLE `language` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `language`
--

INSERT INTO `language` (`id`, `name`) VALUES
(1, 'Русский'),
(2, 'Английский'),
(4, 'Французский');

-- --------------------------------------------------------

--
-- Структура таблицы `series`
--

CREATE TABLE `series` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `series`
--

INSERT INTO `series` (`id`, `name`) VALUES
(1, 'Русская классика'),
(2, 'Библиотека поэта'),
(5, 'Золотой фонд мировой классики');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `series`
--
ALTER TABLE `series`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `language`
--
ALTER TABLE `language`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT для таблицы `series`
--
ALTER TABLE `series`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
