-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Час створення: Гру 25 2020 р., 18:40
-- Версія сервера: 10.3.13-MariaDB
-- Версія PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `підприємство`
--

-- --------------------------------------------------------

--
-- Структура таблиці `довідник продукції`
--

CREATE TABLE `довідник продукції` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `довідник продукції`
--

INSERT INTO `довідник продукції` (`ID`, `Назва`) VALUES
(1, 'Каблуки'),
(2, 'Підошва');

-- --------------------------------------------------------

--
-- Структура таблиці `довідник сировини`
--

CREATE TABLE `довідник сировини` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(10) NOT NULL,
  `Одиниці вимірювання` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `довідник сировини`
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
-- Структура таблиці `довідник фасону`
--

CREATE TABLE `довідник фасону` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Назва` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `довідник фасону`
--

INSERT INTO `довідник фасону` (`ID`, `Назва`) VALUES
(1, '4568-у9'),
(2, '6789-у5'),
(3, '8769-y3');

-- --------------------------------------------------------

--
-- Структура таблиці `звіт по використаним матеріалам за місяць`
--

CREATE TABLE `звіт по використаним матеріалам за місяць` (
  `ID плану` int(11) UNSIGNED NOT NULL,
  `ID сировини` int(11) UNSIGNED NOT NULL,
  `Кількість` float UNSIGNED NOT NULL,
  `Місяць` int(2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `нормативний список`
--

CREATE TABLE `нормативний список` (
  `ID фасону` int(10) UNSIGNED NOT NULL,
  `ID сировини` int(10) UNSIGNED NOT NULL,
  `Норма витрат` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп даних таблиці `нормативний список`
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

-- --------------------------------------------------------

--
-- Структура таблиці `облік використаних матеріалів`
--

CREATE TABLE `облік використаних матеріалів` (
  `ID плану` int(11) UNSIGNED NOT NULL,
  `Дата` date NOT NULL,
  `Кількість використаних за день` int(11) UNSIGNED NOT NULL,
  `ID cировини` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `план`
--

CREATE TABLE `план` (
  `ID` int(10) UNSIGNED NOT NULL,
  `Місяць` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `потреби`
--

CREATE TABLE `потреби` (
  `ID плану` int(10) UNSIGNED NOT NULL,
  `ID сировини` int(10) UNSIGNED NOT NULL,
  `Необхідний ліміт нам на місяць` float UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `продукція`
--

CREATE TABLE `продукція` (
  `ID плану` int(10) UNSIGNED NOT NULL,
  `ID продукції` int(10) UNSIGNED NOT NULL,
  `ID фасону` int(10) UNSIGNED NOT NULL,
  `Кількість` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблиці `проміжкова`
--

CREATE TABLE `проміжкова` (
  `ID плану` int(11) UNSIGNED NOT NULL,
  `ID продукції` int(11) UNSIGNED NOT NULL,
  `ID фасону` int(11) UNSIGNED NOT NULL,
  `ID сировини` int(11) UNSIGNED NOT NULL,
  `Витрати` float UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `довідник продукції`
--
ALTER TABLE `довідник продукції`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `довідник сировини`
--
ALTER TABLE `довідник сировини`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `довідник фасону`
--
ALTER TABLE `довідник фасону`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `звіт по використаним матеріалам за місяць`
--
ALTER TABLE `звіт по використаним матеріалам за місяць`
  ADD KEY `ID плану` (`ID плану`),
  ADD KEY `ID сировини` (`ID сировини`);

--
-- Індекси таблиці `нормативний список`
--
ALTER TABLE `нормативний список`
  ADD KEY `нормативний список_ibfk_1` (`ID сировини`),
  ADD KEY `нормативний список_ibfk_2` (`ID фасону`);

--
-- Індекси таблиці `облік використаних матеріалів`
--
ALTER TABLE `облік використаних матеріалів`
  ADD KEY `облік отриманих матеріалів_ibfk_1` (`ID плану`),
  ADD KEY `id cировини` (`ID cировини`),
  ADD KEY `ID плану` (`ID плану`);

--
-- Індекси таблиці `план`
--
ALTER TABLE `план`
  ADD PRIMARY KEY (`ID`);

--
-- Індекси таблиці `потреби`
--
ALTER TABLE `потреби`
  ADD KEY `потреби_ibfk_1` (`ID плану`),
  ADD KEY `потреби_ibfk_2` (`ID сировини`);

--
-- Індекси таблиці `продукція`
--
ALTER TABLE `продукція`
  ADD KEY `продукція_ibfk_1` (`ID продукції`),
  ADD KEY `продукція_ibfk_2` (`ID плану`),
  ADD KEY `продукція_ibfk_3` (`ID фасону`);

--
-- Індекси таблиці `проміжкова`
--
ALTER TABLE `проміжкова`
  ADD KEY `ID продукції` (`ID продукції`),
  ADD KEY `ID сировини` (`ID сировини`),
  ADD KEY `ID фасону` (`ID фасону`),
  ADD KEY `проміжкова_ibfk_1` (`ID плану`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `довідник продукції`
--
ALTER TABLE `довідник продукції`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `довідник сировини`
--
ALTER TABLE `довідник сировини`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `довідник фасону`
--
ALTER TABLE `довідник фасону`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `план`
--
ALTER TABLE `план`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Обмеження зовнішнього ключа збережених таблиць
--

--
-- Обмеження зовнішнього ключа таблиці `звіт по використаним матеріалам за місяць`
--
ALTER TABLE `звіт по використаним матеріалам за місяць`
  ADD CONSTRAINT `звіт по використаним матеріалам за місяць_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `звіт по використаним матеріалам за місяць_ibfk_2` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `нормативний список`
--
ALTER TABLE `нормативний список`
  ADD CONSTRAINT `нормативний список_ibfk_1` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `нормативний список_ibfk_2` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `облік використаних матеріалів`
--
ALTER TABLE `облік використаних матеріалів`
  ADD CONSTRAINT `облік використаних матеріалів_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `потреби`
--
ALTER TABLE `потреби`
  ADD CONSTRAINT `потреби_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `потреби_ibfk_2` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `продукція`
--
ALTER TABLE `продукція`
  ADD CONSTRAINT `продукція_ibfk_1` FOREIGN KEY (`ID продукції`) REFERENCES `довідник продукції` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `продукція_ibfk_2` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `продукція_ibfk_3` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Обмеження зовнішнього ключа таблиці `проміжкова`
--
ALTER TABLE `проміжкова`
  ADD CONSTRAINT `проміжкова_ibfk_1` FOREIGN KEY (`ID плану`) REFERENCES `план` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_2` FOREIGN KEY (`ID продукції`) REFERENCES `довідник продукції` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_3` FOREIGN KEY (`ID сировини`) REFERENCES `довідник сировини` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `проміжкова_ibfk_4` FOREIGN KEY (`ID фасону`) REFERENCES `довідник фасону` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
