-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 14 2021 г., 00:49
-- Версия сервера: 10.1.30-MariaDB
-- Версия PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_products`, `id_session`, `price`) VALUES
(17, 2, 'n955nf4tcuucc29j8oagfb18rbpatrgf', 8555),
(20, 6, '0jne3cka547vk4t6r4ua1eu7ggbafmkm', 122550),
(22, 3, 'ocniic6a6rb6ilu5tg9c7d7dgc1t04d0', 3330),
(23, 1, '3lt09udr58tt8g5d2ru55u76cvrf2ukf', 2200),
(26, 4, '3lt09udr58tt8g5d2ru55u76cvrf2ukf', 4004),
(27, 1, 'kbvt22jdkiad8a0bk7l2v4ff949eghtq', 2200),
(28, 2, 'kbvt22jdkiad8a0bk7l2v4ff949eghtq', 3000),
(31, 8, 'kbvt22jdkiad8a0bk7l2v4ff949eghtq', 1500),
(32, 1, 'n3r6kp0kcrhrhd8rqv7tvclugr0meq7v', 2200),
(33, 2, 'n3r6kp0kcrhrhd8rqv7tvclugr0meq7v', 3000),
(34, 3, 'n3r6kp0kcrhrhd8rqv7tvclugr0meq7v', 3330),
(35, 4, 'n3r6kp0kcrhrhd8rqv7tvclugr0meq7v', 4004);

-- --------------------------------------------------------

--
-- Структура таблицы `feedbacks`
--

CREATE TABLE `feedbacks` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `id_products`, `name`, `feedback`) VALUES
(2, 1, 'M', 'kbkbjkbb bjkb jb jk kjk'),
(9, 2, '555', '5555'),
(11, 2, 'M1', 'Нет фото'),
(12, 1, 'sdsdf', 'asdavsvxc v sdvsdvsd sdv v');

-- --------------------------------------------------------

--
-- Структура таблицы `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `size` int(11) NOT NULL,
  `countViews` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `size`, `countViews`) VALUES
(1, '6016d838e1797.jpg', 2230017, 16),
(2, '6016d88aab3b3.jpg', 4264559, 11),
(4, '6016d8a27cc81.jpg', 2096522, 0),
(5, '6016d8abb458f.jpg', 2467722, 0),
(6, '6016d8b6ec192.jpg', 1194168, 2),
(7, '6016d8c1c12ff.jpg', 3845060, 1),
(8, '6016d8d1f1634.jpg', 3449421, 1),
(9, '6016d8dd9a691.jpg', 2940851, 1),
(11, '60173bbc1215b.jpg', 1187692, 2),
(12, '6026604da1e7f.jpg', 173574, 0),
(14, '602670de5363f.jpg', 173579, 1),
(16, '602681c9efa8b.jpg', 96208, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `id_products` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pictures`
--

INSERT INTO `pictures` (`id`, `id_products`, `image`, `size`) VALUES
(1, 1, '601d68aa11bf4.jpg', 2230017),
(2, 1, '601d68ac8c97e.jpg', 4264559),
(3, 3, '601d68af06517.jpg', 1187692),
(4, 4, '601d6a67be1ae.jpg', 2940851),
(5, 6, '6021a8040f304.jpg', 4264559),
(6, 6, '6021a806382e0.jpg', 2467722),
(7, 7, '6021a807a84ae.jpg', 1194168),
(8, 8, '6021a808a938e.jpg', 2940851);

-- --------------------------------------------------------

--
-- Структура таблицы `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `more_description` text NOT NULL,
  `price` int(11) NOT NULL,
  `likes` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `more_description`, `price`, `likes`) VALUES
(1, 'Товар 1', 'Описание Товар 1', 'Полное описание Товар 1', 2200, 11),
(2, 'Товар 2', 'Описание Товар 2', 'Полное Описание Товар 22', 3000, 3),
(3, 'Товар 3', 'Описание Товар 3', 'Полное описание Товар 3', 3330, 0),
(4, 'Товар 4', 'Описание Товар 4', 'Полное описание Товар 4', 4004, 2),
(5, 'Товар 5', 'Описание Товар 5', 'Полное описание Товар 5', 5505, 1),
(6, 'Товар 6', 'Описание Товар 6', 'Полное описание Товар 6', 122550, 1),
(7, 'Чай', 'Описание Чай', 'Полное описание Товар Чай', 800, 0),
(8, 'Кофе', 'Описание Кофе', 'Полное описание товара Кофе', 1500, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subbuy`
--

CREATE TABLE `subbuy` (
  `id` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subbuy`
--

INSERT INTO `subbuy` (`id`, `id_session`, `name`, `phone`, `status`) VALUES
(6, 'n955nf4tcuucc29j8oagfb18rbpatrgf', 'admin', '89111111111', 2),
(7, '0jne3cka547vk4t6r4ua1eu7ggbafmkm', 'M1', '89222222222', 3),
(8, 'ocniic6a6rb6ilu5tg9c7d7dgc1t04d0', '333', '892223333', 4),
(9, '3lt09udr58tt8g5d2ru55u76cvrf2ukf', '111', '8922444444', 2),
(10, 'kbvt22jdkiad8a0bk7l2v4ff949eghtq', '55', '89222555555', 3),
(11, 'n3r6kp0kcrhrhd8rqv7tvclugr0meq7v', '111', '89222211741', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(3, 'admin', '$2y$10$PRcwSiqo4SRRIwFmbrSZ8uRxawcFA7pzkJwqTc5339wYbmyGeeMye', '$2y$10$S30WOqNiUtodsv/zjuH3duc4gviYM7joSXg4rHZDWPk3PvPzWtCL2'),
(4, 'User1', '$2y$10$eQ0JB7TiwY.2/6NfF04UZeDJsnhRXI0jzk0kYLV5.DsjDCbmcrGG6', ''),
(5, '111', '$2y$10$XUqW42WnfSQzPFbK5m1Tq.kB1Vl9tOdTC2937y2dSEH0S4c1tr5.a', '');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_session` (`id_session`);

--
-- Индексы таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `subbuy`
--
ALTER TABLE `subbuy`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `username_2` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `subbuy`
--
ALTER TABLE `subbuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
