-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 22 2021 г., 06:52
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
-- База данных: `mastersoft`
--

-- --------------------------------------------------------

--
-- Структура таблицы `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `login` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` enum('admin','moderator') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `accounts`
--

INSERT INTO `accounts` (`id`, `login`, `password`, `type`) VALUES
(1, 'admin', '$2y$10$P.4lhaojNfUddwTRWoOiX.RbKnVEJoEsevT8cZh4CxB8olNr3pl9.', 'admin');

-- --------------------------------------------------------

--
-- Структура таблицы `account_sessions`
--

CREATE TABLE `account_sessions` (
  `id` int(11) NOT NULL,
  `sessionkey` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aid` int(11) NOT NULL,
  `ip` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `account_sessions`
--

INSERT INTO `account_sessions` (`id`, `sessionkey`, `aid`, `ip`) VALUES
(1, 'd5a2598f8387a02cc17504a78d0d556e2f985f09778c3e4c1c855f47dacbe51f', 1, '127.0.0.1'),
(2, '425dba60aa12d3597a99449f896dea532d191e5c99b8f6751a975d010a64dece', 1, '127.0.0.1'),
(3, 'baeba2d41834bc25cb22a39bd38a07ef92d5971ff6a10cfdeb34a0960a61417b', 1, '127.0.0.1'),
(4, '48e8f1004b7cef073886ebbe29745ca8a1880ecb1163a684bea7c978058b771b', 1, '127.0.0.1'),
(5, '4eb8b36a5b56f9ea70c1a3f687114ec988e33af73819de09f06a3867cf55c9af', 1, '127.0.0.1'),
(6, '508b39129b13f6874011fa9c0c6bf363d5e8a9a753c8a09039c5df8b28ec5016', 1, '127.0.0.1'),
(7, 'd81adf6aa876747ffaf253c69ed8bbfb2fe753c3ef3970884c855a00319709cf', 1, '127.0.0.1'),
(8, 'fd97215bcc7ff9cc503127d3a6cbea5e5add21d13db00b2008f4e9366915914f', 1, '127.0.0.1'),
(9, 'dbe4f26402fadacd079a40453722b0bb4dc4269bd0241538bf5d7e110ce1437c', 1, '127.0.0.1'),
(10, '6094e80e2ec24841e14a080c73578f7940d24f971f10145e1e289064ab92a11c', 1, '127.0.0.1');

-- --------------------------------------------------------

--
-- Структура таблицы `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `answers`
--

INSERT INTO `answers` (`id`, `service_id`, `name`, `tel`, `text`) VALUES
(1, 1, 'Фывфыв', 'фывфыв', 'фывфыв');

-- --------------------------------------------------------

--
-- Структура таблицы `calls`
--

CREATE TABLE `calls` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tel` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `calls`
--

INSERT INTO `calls` (`id`, `name`, `tel`, `text`) VALUES
(1, 'asdasd', 'asdasd', 'asdasd'),
(2, 'Валерия', '898988989', 'Напиши, малыш! ');

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `display_name` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `display_name`, `code_name`, `icon`, `text`) VALUES
(1, '1C', '1c', '1C', 'Наша компания официальный партнёр 1C. Мы предлагаем Вам весь перечень услуг по автоматизации бухгалтерского и управленческого учёта предприятий на базе программ 1C.'),
(2, 'Программное обеспечение', 'po', '<i class=\"fas fa-cog\"></i>', 'Кроме того, наша компания является издателем многих популярных отечественных программ. Мы готовы помочь Вам приобрести официальные лицензии программных продуктов.');

-- --------------------------------------------------------

--
-- Структура таблицы `product_services`
--

CREATE TABLE `product_services` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `product_services`
--

INSERT INTO `product_services` (`id`, `product_id`, `name`, `image`) VALUES
(1, 1, '1С:Бухгалтерия', '/view/res/img/1с_p1.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` varchar(600) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `showing` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `text`, `date`, `showing`) VALUES
(6, 'Никита', '[object HTMLTextAreaElement]', '2021-04-22 08:47:37', 1),
(7, 'Валерия', 'щпзахлщзхпокцзопзщцрпц4ушщцрущпрйпщрйзцщпзйцурпщйцхщпо', '2021-04-22 08:48:57', 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `account_sessions`
--
ALTER TABLE `account_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `calls`
--
ALTER TABLE `calls`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product_services`
--
ALTER TABLE `product_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `account_sessions`
--
ALTER TABLE `account_sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `calls`
--
ALTER TABLE `calls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product_services`
--
ALTER TABLE `product_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
