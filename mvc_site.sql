-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июн 11 2019 г., 09:59
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
(4, 'Древнерусское искусство', 4, 1),
(5, 'Qewqe', 5, 1);

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
(1, 'Мона Лиза', 2, 'Леонардо да Винчи', '15033', '', '', 'выфвыфвфвыфвыф', 1, 1),
(2, 'вфывфывф', 1, 'ыыы', '111', '', '', '', 1, 2),
(3, 'ффффффф', 1, 'фффффф', '0', '', '', '', 1, 1),
(4, 'йййййййййй', 1, 'ййййййй', '0', '', '', '', 1, 3),
(5, 'ццццццццццц', 1, 'цццццц', '0', '', '', '', 1, 1),
(6, 'ууууууууу', 1, 'ууууууууууу', '0', '', '', '', 1, 1),
(7, 'ккккккккк', 1, 'кккккк', '0', '', '', '', 1, 2),
(8, 'ееееееееее', 1, 'еееееее', '0', '', '', '', 1, 2),
(9, 'ннннннннн', 1, 'ннннннн', '0', '', '', '', 1, 1),
(10, 'ггггггггг', 1, 'гггггггггг', '0', '', '', '', 1, 3),
(11, 'шшшшшшшшшш', 1, 'шшшшшшшшшшшшш', '0', '', '', '', 1, 1),
(12, 'щщщщщщщщщщщщщщщщщ', 1, 'щщщщщщщщщщщщщщщщ', '0', '', '', '', 1, 2),
(13, 'ззззззззззз', 1, 'зззззззззззз', '0', '', '', '', 1, 1),
(14, 'ыыыыыыыыыыы', 1, 'ыыыыыыыыыыыыыыы', '0', '', '', '', 1, 2),
(15, 'ввввввввввввввввв', 1, 'вввввввввввв', '0', '', '', '', 1, 1),
(16, 'ааааааааааааааа', 1, 'ааааааааааааа', '0', '', '', '', 1, 1),
(17, 'ппппппппппппппппп', 1, 'пппппппппппппппппппппп', '0', '', '', '', 1, 3),
(18, 'ррррррррррррррр', 1, 'рррррррррррррр', '0', '', '', '', 1, 3),
(19, 'ооооооооооооооо', 1, 'оооооооооооооооо', '0', '', '', '', 1, 2),
(20, 'лллллллллллллллллл', 1, 'лллллллллллллл', '0', '', '', '', 1, 1),
(21, 'dasd', 4, 'dasdsa', '132', '3123', '12х122', '', 1, 1),
(22, 'dasdsss', 3, 'dasdsa', '132', '', '', 'Lorem Ipsum - это текст-\"рыба\", часто используемый в печати и вэб-дизайне. Lorem Ipsum является стандартной \"рыбой\" для текстов на латинице с начала XVI века. В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов, используя Lorem Ipsum для распечатки образцов. Lorem Ipsum не только успешно пережил без заметных изменений пять веков, но и перешагнул в электронный дизайн. Его популяризации в новое время послужили публикация листов Letraset с образцами Lorem Ipsum в 60-х годах и, в более недавнее время, программы электронной вёрстки типа Aldus PageMaker, в шаблонах которых используется Lorem Ipsum.', 1, 3);

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
(1, 'Взрослый билет', 350, 'вфывфвф', 1, 123, 1),
(2, 'Детский билет', 150, 'вфывфвыф', 1, 444, 1),
(3, 'Билет для пенсионеров', 100, 'вавыавыавыавы', 1, 44324, 1),
(5, 'dasdsa', 344, 'dasdadsa', 1, 3232, 0),
(6, 'gfgfdgdfgfd', 32342300, 'dsfsdfs', 1, 42342, 1),
(7, 'Папрап', 2342340, 'йцуйцавыавыаыва', 1, 313, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `ticket_order`
--

CREATE TABLE `ticket_order` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_surname` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_comment` text NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tickets` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `ticket_order`
--

INSERT INTO `ticket_order` (`id`, `user_name`, `user_surname`, `user_phone`, `user_comment`, `user_id`, `date`, `tickets`, `status`) VALUES
(1, 'Ваываыв', 'авыавыаыв', '+8(999)955-65-66', 'аывавы', 0, '2019-05-29 20:43:53', '{\"2\":1,\"3\":2}', 4),
(2, 'Jess', '', '+8(999)955-65-43', 'gdfgdfgdfgfd', 1, '2019-05-29 20:45:45', '{\"3\":3,\"2\":2,\"1\":1}', 1),
(4, 'Блабла', 'Аывавыавы', '+8(999)955-65-43', 'аывавы', 5, '2019-05-30 20:55:26', '{\"3\":1,\"2\":1,\"1\":1}', 3),
(5, 'Блабла', 'Аывавыавы', '+8(999)955-65-66', 'gdfgdfgdfgfd', 5, '2019-05-30 21:11:53', '{\"3\":1}', 2),
(6, 'Jess', 'Аывавыавы', '+8(999)955-65-43', '', 1, '2019-06-03 20:59:39', '{\"3\":1,\"2\":1}', 1),
(7, 'Jess', 'Dsdsds', '+8(999)955-65-66', '', 1, '2019-06-04 17:42:13', '{\"3\":3}', 1),
(8, 'Jess', 'Jess', '+8(999)955-65-66', '', 1, '2019-06-06 20:23:01', '{\"3\":3}', 1),
(9, 'Ваываывq', 'Аывавыавыq', '+8(999)955-65-55', 'dasdasdassadqweq', 0, '2019-06-10 13:01:20', '{\"6\":1}', 2);

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
(3, 'Иван', 'Иванов', 'ivan@ivan.ru', '$2y$10$0gE4amGlz8jBPpBXIPvU2.XodjWVlWLSAEnOdZ0a0kipzSRPHA.DS', 'user', NULL, NULL, '2019-06-10 17:05:47');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `collection`
--
ALTER TABLE `collection`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `ticket_order`
--
ALTER TABLE `ticket_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
