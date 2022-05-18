-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 24 2020 г., 16:51
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
-- База данных: `підприємство`
--

-- --------------------------------------------------------

--
-- Структура таблицы `довідник продукції`
--

CREATE TABLE `довідник продукції` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `довідник продукції`
--

INSERT INTO `довідник продукції` (`ID`, `Назва`) VALUES
(1, 'Каблуки'),
(2, 'Підошва');

-- --------------------------------------------------------

--
-- Структура таблицы `довідник сировини`
--

CREATE TABLE `довідник сировини` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(10) NOT NULL,
  `Одиниці вимірювання` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `довідник сировини`
--

INSERT INTO `довідник сировини` (`ID`, `Назва`, `Одиниці вимірювання`) VALUES
(1, 'ПВХ', 'кг/од'),
(2, 'цвяхи', 'шт'),
(3, 'капрон', 'кг/од'),
(4, 'набойки', 'пар'),
(5, 'клей', 'кг'),
(6, 'тара', 'шт');

-- --------------------------------------------------------

--
-- Структура таблицы `довідник фасону`
--

CREATE TABLE `довідник фасону` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `довідник фасону`
--

INSERT INTO `довідник фасону` (`ID`, `Назва`) VALUES
(1, '4568-у9'),
(2, '6789-у5'),
(3, '8769-y3');

-- --------------------------------------------------------

--
-- Структура таблицы `план`
--

CREATE TABLE `план` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Місяць` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `план`
--

INSERT INTO `план` (`ID`, `Місяць`) VALUES
(1, '2020-12-01');

-- --------------------------------------------------------

--
-- Структура таблицы `потреби`
--

CREATE TABLE `потреби` (
  `ID плану` int(10) UNSIGNED NOT NULL,
  `ID сировини` int(10) UNSIGNED NOT NULL,
  `Необхідний ліміт нам на місяць` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `потреби`
--

INSERT INTO `потреби` (`ID плану`, `ID сировини`, `Необхідний ліміт нам на місяць`) VALUES
(1, 1, 0.65),
(1, 2, 78),
(1, 3, 0.91),
(1, 4, 26),
(1, 5, 0.65),
(1, 6, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `проміжкова`
--

CREATE TABLE `проміжкова` (
  `ID плану` int(11) UNSIGNED NOT NULL,
  `ID продукції` int(11) UNSIGNED NOT NULL,
  `ID фасону` int(11) UNSIGNED NOT NULL,
  `ID сировини` int(11) UNSIGNED NOT NULL,
  `Витрати` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `проміжкова`
--

INSERT INTO `проміжкова` (`ID плану`, `ID продукції`, `ID фасону`, `ID сировини`, `Витрати`) VALUES
(1, 1, 1, 1, 0.65),
(1, 1, 1, 2, 78),
(1, 1, 1, 3, 0.91),
(1, 1, 1, 4, 26),
(1, 1, 1, 5, 0.65),
(1, 1, 1, 6, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `продукція`
--

CREATE TABLE `продукція` (
  `ID плану` int(10) UNSIGNED NOT NULL,
  `ID продукції` int(10) UNSIGNED NOT NULL,
  `ID фасону` int(10) UNSIGNED NOT NULL,
  `Кількість` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `продукція`
--

INSERT INTO `продукція` (`ID плану`, `ID продукції`, `ID фасону`, `Кількість`) VALUES
(1, 1, 1, 13);

-- --------------------------------------------------------

--
-- Структура таблицы `облік використаних матеріалів`
--

CREATE TABLE `облік використаних матеріалів` (
  `ID плану` int(10) UNSIGNED NOT NULL,
  `Дата` date NOT NULL,
  `Кількість використаних за день` int(11) UNSIGNED NOT NULL,
  `id cировини` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `нормативний список`
--

CREATE TABLE `нормативний список` (
  `ID фасону` int(10) UNSIGNED NOT NULL,
  `ID сировини` int(10) UNSIGNED NOT NULL,
  `Норма витрат` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `нормативний список`
--

INSERT INTO `нормативний список` (`ID фасону`, `ID сировини`, `Норма витрат`) VALUES
(1, 1, 0.05),
(1, 2, 6),
(1, 3, 0.07),
(1, 4, 2),
(1, 5, 0.05),
(1, 6, 1),
(2, 1, 0.06),
(2, 2, 8),
(2, 3, 0.08),
(2, 4, 2),
(2, 5, 0.06),
(2, 6, 1),
(3, 1, 0.25),
(3, 2, 10),
(3, 3, 0.1),
(3, 4, 2),
(3, 5, 0.1),
(3, 6, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `довідник продукції`
--
ALTER TABLE `довідник продукції`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `довідник сировини`
--
ALTER TABLE `довідник сировини`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `довідник фасону`
--
ALTER TABLE `довідник фасону`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `план`
--
ALTER TABLE `план`
  ADD PRIMARY KEY (`ID`);

--
-- Индексы таблицы `потреби`
--
ALTER TABLE `потреби`
  ADD KEY `потреби_ibfk_1` (`ID плану`),
  ADD KEY `потреби_ibfk_2` (`ID сировини`);

--
-- Индексы таблицы `проміжкова`
--
ALTER TABLE `проміжкова`
  ADD KEY `проміжкова_ibfk_1` (`ID плану`),
  ADD KEY `ID продукції` (`ID продукції`),
  ADD KEY `ID сировини` (`ID сировини`),
  ADD KEY `ID фасону` (`ID фасону`);

--
-- Индексы таблицы `продукція`
--
ALTER TABLE `продукція`
  ADD KEY `продукція_ibfk_1` (`ID продукції`),
  ADD KEY `продукція_ibfk_2` (`ID плану`),
  ADD KEY `продукція_ibfk_3` (`ID фасону`);

--
-- Индексы таблицы `облік використаних матеріалів`
--
ALTER TABLE `облік використаних матеріалів`
  ADD KEY `облік отриманих матеріалів_ibfk_1` (`ID плану`),
  ADD KEY `id cировини` (`id cировини`);

--
-- Индексы таблицы `нормативний список`
--
ALTER TABLE `нормативний список`
  ADD KEY `нормативний список_ibfk_1` (`ID сировини`),
  ADD KEY `нормативний список_ibfk_2` (`ID фасону`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `довідник продукції`
--
ALTER TABLE `довідник продукції`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `довідник сировини`
--
ALTER TABLE `довідник сировини`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `довідник фасону`
--
ALTER TABLE `довідник фасону`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `план`
--
ALTER TABLE `план`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `потреби`
--
ALTER TABLE `потреби`
  ADD CONSTRAINT `потреби_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `потреби_ibfk_2` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `проміжкова`
--
ALTER TABLE `проміжкова`
  ADD CONSTRAINT `проміжкова_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_2` FOREIGN KEY (`ID продукції`) REFERENCES `довідник продукції` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_3` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_4` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `продукція`
--
ALTER TABLE `продукція`
  ADD CONSTRAINT `продукція_ibfk_1` FOREIGN KEY (`ID продукції`) REFERENCES `довідник продукції` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `продукція_ibfk_2` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `продукція_ibfk_3` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `нормативний список`
--
ALTER TABLE `нормативний список`
  ADD CONSTRAINT `нормативний список_ibfk_1` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `нормативний список_ibfk_2` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
