-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 09 2021 г., 18:28
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
  `id_session` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `id_products`, `id_session`) VALUES
(6, 1, 'q8vjluecmscg0tm3uhv7csom310fbtuf'),
(7, 2, 'q8vjluecmscg0tm3uhv7csom310fbtuf'),
(9, 1, 'lo2lt987tof8a62m65p0fbspftr4v9at'),
(10, 4, 'lo2lt987tof8a62m65p0fbspftr4v9at'),
(11, 5, 'lo2lt987tof8a62m65p0fbspftr4v9at'),
(13, 1, '0ts87aq7dh5mfngbfno58rk12accbag8'),
(15, 2, '0ts87aq7dh5mfngbfno58rk12accbag8'),
(16, 1, 'n955nf4tcuucc29j8oagfb18rbpatrgf'),
(17, 2, 'n955nf4tcuucc29j8oagfb18rbpatrgf');

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
(3, 1, '3', 'jhghgj khjjk jkhjk hk kjh khkj'),
(5, 2, 'M1', 'hbk gj gjujhjkhkjhhkjhkj jhjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj jjjjjjjjjjjjjjjjjjjjjjjjjjjjj jiutfdddddddddddddddddd'),
(9, 2, '555', '5555');

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
(1, '6016d838e1797.jpg', 2230017, 14),
(2, '6016d88aab3b3.jpg', 4264559, 9),
(4, '6016d8a27cc81.jpg', 2096522, 0),
(5, '6016d8abb458f.jpg', 2467722, 0),
(6, '6016d8b6ec192.jpg', 1194168, 0),
(7, '6016d8c1c12ff.jpg', 3845060, 1),
(8, '6016d8d1f1634.jpg', 3449421, 1),
(9, '6016d8dd9a691.jpg', 2940851, 1),
(11, '60173bbc1215b.jpg', 1187692, 2);

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
(7, 6, '6021a807a84ae.jpg', 1194168),
(8, 6, '6021a808a938e.jpg', 2940851);

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
  `sreated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `more_description`, `price`, `sreated_at`) VALUES
(1, 'Товар 1', 'Описание Товар 1', 'Полное описание Товар 1', 2200, '2021-02-05'),
(2, 'Товар 2', 'Описание Товар 2', 'Полное Описание Товар 22', 3000, '2021-02-05'),
(3, 'Товар 3', 'Описание Товар 3', 'Полное описание Товар 3', 3330, '2021-02-06'),
(4, 'Товар 4', 'Описание Товар 4', 'Полное описание Товар 4', 4004, '2021-02-09'),
(5, 'Товар 5', 'Описание Товар 5', 'Полное описание Товар 5', 5505, '2021-02-09'),
(6, 'Товар 6', 'Описание Товар 6', 'Полное описание Товар 6', 122550, '2021-02-09');

-- --------------------------------------------------------

--
-- Структура таблицы `subbuy`
--

CREATE TABLE `subbuy` (
  `id` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `phone` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `subbuy`
--

INSERT INTO `subbuy` (`id`, `id_session`, `phone`) VALUES
(6, 'n955nf4tcuucc29j8oagfb18rbpatrgf', '89111111111');

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
(3, 'admin', '$2y$10$PRcwSiqo4SRRIwFmbrSZ8uRxawcFA7pzkJwqTc5339wYbmyGeeMye', '$2y$10$iWMMERE6Oi8CDRQTw9vJY.lO68RQM/q3fTOWit3bF17utKTivUff2');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблицы `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `subbuy`
--
ALTER TABLE `subbuy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
