-- phpMyAdmin SQL Dump
-- version 5.2.1-1.el8
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 02 2024 г., 20:19
-- Версия сервера: 8.0.30-cll-lve
-- Версия PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `happyness`
--

-- --------------------------------------------------------

--
-- Структура таблицы `animals_table`
--

CREATE TABLE `animals_table` (
  `aid` int NOT NULL,
  `Type` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Animal_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Breed` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Gender` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Age` int NOT NULL,
  `Weight` int NOT NULL,
  `Color` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Entry_date` date NOT NULL,
  `Picture` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `animals_table`
--

INSERT INTO `animals_table` (`aid`, `Type`, `Animal_name`, `Breed`, `Gender`, `Age`, `Weight`, `Color`, `Entry_date`, `Picture`) VALUES
(1, 'Собака', 'Шарик', 'Немецкая овчарка', 'Мужской', 3, 40, 'Черный с коричневым', '2024-02-12', 'Image1.jpg'),
(2, 'Собака', 'Герда', 'Японский шпиц', 'Женский', 1, 20, 'Белый', '2024-04-06', 'Image2.jpg'),
(3, 'Кот', 'Мурка', 'Японский бобтейл', 'Женский', 1, 25, 'Белый с коричневым', '2024-03-12', 'Image3.jpg'),
(4, 'Собака', 'Бобик', 'Японский шпиц', 'Женский', 2, 34, 'Белый, черный и коричневый', '2024-04-12', 'Image4.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `answer_table`
--

CREATE TABLE `answer_table` (
  `aid` int NOT NULL,
  `Answer` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `qids` int NOT NULL,
  `Answerby` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `answer_table`
--

INSERT INTO `answer_table` (`aid`, `Answer`, `qids`, `Answerby`, `userid`) VALUES
(1, 'Служебные животные не обязаны носить какие-либо опознавательные знаки, например жилеты или бейджи, а также не обязаны предъявлять сертификат или доказательство того, что собака является служебным животным. . ', 1, 'Иван Владимиров', 3),
(2, 'праырврп', 1, 'Александр', 5);

-- --------------------------------------------------------

--
-- Структура таблицы `booking_table`
--

CREATE TABLE `booking_table` (
  `id` int NOT NULL,
  `animalid` int NOT NULL,
  `userid` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `booking_table`
--

INSERT INTO `booking_table` (`id`, `animalid`, `userid`) VALUES
(1, 1, 5);

-- --------------------------------------------------------

--
-- Структура таблицы `counter_table`
--

CREATE TABLE `counter_table` (
  `countid` int NOT NULL,
  `counter` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `counter_table`
--

INSERT INTO `counter_table` (`countid`, `counter`) VALUES
(1, 290);

-- --------------------------------------------------------

--
-- Структура таблицы `donation_table`
--

CREATE TABLE `donation_table` (
  `did` int NOT NULL,
  `Donar_name` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `donation_table`
--

INSERT INTO `donation_table` (`did`, `Donar_name`, `Email`, `Amount`) VALUES
(1, 'bindu Shrestha', 'Bindushre@gmail.com', 50000),
(2, 'Kanchan Aryal', 'kanchanaryal12@gmail.com', 10000),
(3, 'Samuel Lama', 'samuellama13@gmail.com', 5000),
(4, 'Saroj Rokka', 'rokkasaroj3@gmail.com', 15000),
(5, 'Saroj Rokka', 'rokkasaroj3@gmail.com', 500);

-- --------------------------------------------------------

--
-- Структура таблицы `question_table`
--

CREATE TABLE `question_table` (
  `qid` int NOT NULL,
  `Question` varchar(300) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Username` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `question_table`
--

INSERT INTO `question_table` (`qid`, `Question`, `Username`) VALUES
(1, 'Как определить, является ли собака служебным животным или просто домашним любимцем? ', 'Алексей Дмитриев'),
(2, 'gsgdfsg', 'Александр');

-- --------------------------------------------------------

--
-- Структура таблицы `user_table`
--

CREATE TABLE `user_table` (
  `id` int NOT NULL,
  `Name` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `DOB` date NOT NULL,
  `Gender` varchar(15) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Phone` varchar(30) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Postal_Code` int NOT NULL,
  `Account` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Password` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Type` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `Signup_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Дамп данных таблицы `user_table`
--

INSERT INTO `user_table` (`id`, `Name`, `Address`, `DOB`, `Gender`, `Phone`, `Email`, `Postal_Code`, `Account`, `Password`, `Type`, `Signup_date`) VALUES
(4, 'Ирина', 'Моховикова', '1995-10-13', 'Женский', '9841245562', 'kanchanaryal12@gmail.com', 21024, 'admin', 'admin', 'Admin', '2024-04-16'),
(5, 'Александр', 'Самойленко', '1993-02-12', 'Мужской', '9814213252', 'samuellama13@gmail.com', 123451, 'user', 'user', 'User', '2024-04-16'),
(11, 'Елизавета', 'невинномысск', '2000-10-10', 'Женский', '+7 (932) 440-56-61', 'elizavetaavdeenko08@gmail.com', 9658, 'eli', 'eli', 'User', '2024-04-19');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `animals_table`
--
ALTER TABLE `animals_table`
  ADD PRIMARY KEY (`aid`);

--
-- Индексы таблицы `answer_table`
--
ALTER TABLE `answer_table`
  ADD PRIMARY KEY (`aid`);

--
-- Индексы таблицы `booking_table`
--
ALTER TABLE `booking_table`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `counter_table`
--
ALTER TABLE `counter_table`
  ADD PRIMARY KEY (`countid`);

--
-- Индексы таблицы `donation_table`
--
ALTER TABLE `donation_table`
  ADD PRIMARY KEY (`did`);

--
-- Индексы таблицы `question_table`
--
ALTER TABLE `question_table`
  ADD PRIMARY KEY (`qid`);

--
-- Индексы таблицы `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `animals_table`
--
ALTER TABLE `animals_table`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `answer_table`
--
ALTER TABLE `answer_table`
  MODIFY `aid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `booking_table`
--
ALTER TABLE `booking_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `counter_table`
--
ALTER TABLE `counter_table`
  MODIFY `countid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `donation_table`
--
ALTER TABLE `donation_table`
  MODIFY `did` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `question_table`
--
ALTER TABLE `question_table`
  MODIFY `qid` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
