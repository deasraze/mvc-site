-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 19 2019 г., 09:44
-- Версия сервера: 5.6.41
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `mvc_site`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sort_order` int(11) NOT NULL DEFAULT '0' COMMENT 'порядковый номер отображения',
  `status` int(11) NOT NULL DEFAULT '1' COMMENT 'отображать или нет'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `sort_order`, `status`) VALUES
(1, 'Живопись', 1, 1),
(2, 'Графика', 2, 1),
(3, 'Скульптура', 3, 1),
(4, 'Древнерусское искусство', 4, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `collection`
--

CREATE TABLE `collection` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `year` varchar(40) NOT NULL,
  `material` varchar(255) NOT NULL,
  `size` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `display_block` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `collection`
--

INSERT INTO `collection` (`id`, `name`, `category_id`, `author`, `year`, `material`, `size`, `description`, `status`, `display_block`) VALUES
(5, 'Барыня Морозова', 1, 'Василий Иванович Суриков', '1512', 'Холст,Масло', '4.5х8.8', 'Когда зрители проходят по основной анфиладе залов, они уже видят эту большую картину. И она уже втягивает их в это пространство своё, пространство красок, пространство величины этой картины, пространство образов. По морозной московской улице, заснеженной, запушенной снегом, снег голубоватый, едут сани, розвальни. ', 1, 1),
(8, 'Постоянство памяти', 1, 'Сальвадор Дали', '1931', 'Холст,Масло', '23х33', '«Постоянство памяти» — одна из самых известных картин художника Сальвадора Дали. Находится в Музее современного искусства в Нью-Йорке с 1934 года. Известна также как «Мягкие часы», «Твердость памяти» или «Стойкость памяти» или «Течение времени» или «Время».', 1, 1),
(9, 'Богатыри', 1, 'Виктор Михайлович Васнецов', '1881 ', 'Холст,масло', '74х92', '«Богатыри» — картина Виктора Васнецова. Васнецов работал над картиной около двадцати лет. 23 апреля 1898 года она была закончена и вскоре куплена П. М. Третьяковым для своей галереи. Инв. 1019.', 1, 1),
(10, 'Сотворение Адама', 1, 'Микеланджело', '1234', 'Холст,масло', '74х92', '«Сотворение Адама» — фреска Микеланджело, написанная около 1511 года', 1, 2),
(11, 'Звёздная ночь', 1, 'Винсент ван Гог', '1889', 'Холст,краски', '74х92', '«Звёздная ночь» — одна из наиболее известных картин нидерландского художника-постимпрессиониста Винсента Ван Гога. Представляет вид из восточного окна спальни Ван Гога в Сен-Реми-де-Прованс на предрассветное небо и вымышленную деревню.', 1, 2),
(12, 'Девятый вал', 1, ' Иван Константинович Айвазовский', '1850', 'Холст,масло', '4.5х8.8', '«Девятый вал» — одна из самых знаменитых картин русского художника-мариниста армянского происхождения Ивана Айвазовского, хранится в Русском музее. Живописец изображает море после очень сильного ночного шторма и людей, потерпевших кораблекрушение. Лучи солнца освещают громадные волны.', 1, 1),
(13, 'Рождение Венеры', 1, 'Сандро Боттичелли', '1485', 'Холст,краски', '4.5х8х8', '«Рождение Венеры» — картина итальянского художника тосканской школы Сандро Боттичелли. Представляет собой живопись темперой на холсте размером 172,5 × 278,5 см. В настоящее время хранится в галерее Уффици, Флоренция. ', 1, 1),
(14, 'Утро в сосновом лесу', 1, 'Иван Иванович Шишкин', '1889', 'Холст,масло', '4.5х8х8', '«Утро в сосновом лесу» — картина русских художников И. И. Шишкина и К. А. Савицкого. Савицкий написал медведей, но коллекционер П. М. Третьяков стёр его подпись, так что автором картины часто указывается один Шишкин. ', 1, 2),
(15, 'Тайная вечеря', 1, 'Леонардо да Винчи', '1495', 'Холст,Масло', '4.5х8х8', '«Та́йная ве́черя» — монументальная роспись работы Леонардо да Винчи, изображающая сцену последней трапезы Христа со своими учениками. Создана в 1495—1498 годы в доминиканском монастыре Санта-Мария-делле-Грацие в Милане.', 1, 1),
(18, 'Мона Лиза', 1, 'Леонардо Да Винчи', '1534', 'Холст,масло', '234х234', '«Мо́на Ли́за», или «Джоко́нда» — картина Леонардо да Винчи, одно из самых известных произведений живописи. Точная дата написания неизвестна. Ныне хранится в Лувре. Считается, что на картине изображена Лиза Герардини, супруга флорентийского торговца шёлком Франческо дель Джокондо.', 1, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `what_to_do` text NOT NULL,
  `requirements` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `name`, `what_to_do`, `requirements`, `status`) VALUES
(1, 'Экскурсовод', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 1),
(2, 'Консультант', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 1),
(3, 'Музейный смотритель', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 1),
(4, 'Методист', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 1),
(5, 'Слесарь-сантехник', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 'Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `short_content` text NOT NULL,
  `content` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `short_content`, `content`, `status`, `date`) VALUES
(1, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(4, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(5, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(6, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(7, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(8, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(9, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28'),
(10, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', '				Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque, ea distinctio unde, tenetur explicabo dolorem ab aut optio, amet nihil fugit praesentium. Quia, numquam ut deserunt nemo, quae dicta dolores!', 1, '2019-06-10 14:23:28');

-- --------------------------------------------------------

--
-- Структура таблицы `site_config`
--

CREATE TABLE `site_config` (
  `site_title` varchar(255) NOT NULL,
  `site_description` text NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `collection_count` int(11) NOT NULL DEFAULT '10',
  `news_count` int(11) NOT NULL DEFAULT '6',
  `tickets_count` int(11) NOT NULL DEFAULT '9'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `site_config`
--

INSERT INTO `site_config` (`site_title`, `site_description`, `admin_email`, `collection_count`, `news_count`, `tickets_count`) VALUES
('Музей искусств', 'С 2009 года входим в топ-10 лучших музеев мира. 12 экскурсий ежедневно, 94% положительных отзывов. Ждем вас в нашем музее!', 'admin@admin.ru', 10, 6, 9);

-- --------------------------------------------------------

--
-- Структура таблицы `tickets`
--

CREATE TABLE `tickets` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `code` int(11) NOT NULL,
  `availability` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tickets`
--

INSERT INTO `tickets` (`id`, `name`, `price`, `description`, `status`, `code`, `availability`) VALUES
(1, 'Взрослый билет', 350, 'Билет на одного взрослого человека (от 18 лет)', 1, 123, 1),
(2, 'Детский билет', 150, 'Билет на одного ребенка (до 14 лет)', 1, 444, 1),
(3, 'Билет для пенсионеров', 100, 'Билет на одного человека при предъявлении пенсионного удостоверения', 1, 44324, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_order`
--

CREATE TABLE `ticket_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_patronymic` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tickets` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `total_price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket_order`
--

INSERT INTO `ticket_order` (`id`, `user_name`, `user_surname`, `user_patronymic`, `user_phone`, `user_comment`, `user_id`, `date`, `tickets`, `status`, `total_price`) VALUES
(1, 'Иван', 'Иванов', 'Иванович', '+8(999)955-65-66', '', 0, '2019-05-29 20:43:53', '{\"2\":1,\"3\":2}', 4, 350),
(2, 'Jess', 'Jess', 'Jess', '+8(999)955-65-43', '', 1, '2019-05-29 20:45:45', '{\"3\":3,\"2\":2,\"1\":1}', 1, 950),
(4, 'Андрей', 'Иванов', 'Андреевич', '+8(999)955-65-43', '', 5, '2019-05-30 20:55:26', '{\"3\":1,\"2\":1,\"1\":1}', 3, 600),
(5, 'Никита', 'Сидоров', 'Сидорович', '+8(999)955-65-66', '', 5, '2019-05-30 21:11:53', '{\"3\":1}', 2, 100),
(6, 'Jess', 'Jess', 'Jess', '+8(999)955-65-43', '', 1, '2019-06-03 20:59:39', '{\"3\":1,\"2\":1}', 1, 250),
(7, 'Jess', 'Dsdsds', 'Jess', '+8(999)955-65-66', '', 1, '2019-06-04 17:42:13', '{\"3\":3}', 1, 300),
(8, 'Jess', 'Jess', 'Jess', '+8(999)955-65-66', '', 1, '2019-06-06 20:23:01', '{\"3\":3}', 1, 300),
(12, 'Jesss', 'Jesss', 'Jess', '+8(965)581-29-75', 'fdsfds', 1, '2019-06-11 20:33:42', '{\"2\":2}', 1, 300),
(13, 'Jesss', 'Jesss', 'Jess', '+8(999)955-65-66', '', 1, '2019-06-12 20:43:55', '{\"3\":1,\"1\":1}', 1, 450),
(14, 'Chopper', 'Chopper', 'Chopper', '+1(111)111-11-11', 'Why not ?', 2, '2019-06-15 19:54:27', '{\"3\":1,\"2\":1}', 1, 250),
(15, 'Chopper', 'Chopper', 'Chopper', '+1(111)111-11-11', 'He said that he can\'t help her ', 2, '2019-06-15 20:00:04', '{\"3\":1,\"2\":1,\"1\":1}', 1, 600),
(16, 'Jess', 'Jess', 'Йцйцйцй', '+8(999)955-65-66', 'qqqq', 1, '2019-06-18 19:27:33', '{\"3\":1,\"2\":1,\"1\":1}', 2, 600),
(17, 'Jess', 'Jess', 'Eqeqweq', '+4(874)894-45-61', 'qq', 1, '2019-06-18 20:22:31', '{\"2\":1,\"1\":1}', 1, 500);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  `admin_login` varchar(255) DEFAULT NULL,
  `admin_password` varchar(255) DEFAULT NULL,
  `reg_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `email`, `password`, `role`, `admin_login`, `admin_password`, `reg_date`) VALUES
(1, 'Jess', 'Jess', 'condecrom@gmail.com', '$2y$10$0kfF9hdPRy8BsJ5uPYLYi.9YALKi3xZwS1GtjbBzEogS8GZt7rmie', 'admin', 'gSjJDGvSu', '$2y$10$eJzqw7SLIDPjtnLdeS3hn.D9.LIKRLDwIoTOst9ohL2xffsMYKCwu', '2019-05-22 14:11:58'),
(2, 'Chopper', 'Chopper', 'chopper@gmail.com', '$2y$10$nkfcANaZZyW3lsEU8UvPoez1Y2Q8FP4jEs2arR1.icpAdjXCXTBNa', 'admin', 'JFUckYHxq', '$2y$10$JG2wgdvFHMxBTbPaLq/HuOPp6Ypwim4DUw7UQ2Qj2CWtO.lA7YL1W', '2019-06-07 21:41:24'),
(3, 'Иван', 'Иванов', 'ivan@gmail.com', '$2y$10$v3cUC3NhXaqqFk63rxgkke6ffvn00qXvT4PCPc02JNTMlfja3Pmgy', 'editor', 'zNQZFoEXa', '$2y$10$0sJWIx9ZCfA7ylLiEhtjGuGwJchlCDfQJorAOes8z7EqsoJScIBfq', '2019-06-16 13:55:22'),
(4, 'Иванв', 'Иванов', 'cchopper@gmail.com', '$2y$10$lnm8z7Xqyzll4wsY/EjIc.ok/qtXuCCxtmwWuAGVis46pJNyEfKQa', 'user', NULL, NULL, '2019-06-16 17:06:34'),
(5, 'Иванв', 'Иванов', 'ccdsahopper@gmail.com', '$2y$10$PpYHkPlqn7WSy4xel41wm.njKwOfRb0OFb4TNTB8AXnBwuCo5inJu', 'user', NULL, NULL, '2019-06-16 17:09:21'),
(6, 'Илья', 'Ильич', 'cxczxczxchopper@gmail.com', '$2y$10$fvDjUzOGzm4bkJUmEl7a/ORPwaDX7tXVwRR62g93KGz5jPT6vVxMG', 'user', NULL, NULL, '2019-06-16 19:15:06');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `collection`
--
ALTER TABLE `collection`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ticket_order`
--
ALTER TABLE `ticket_order`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
