-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Сен 14 2018 г., 23:39
-- Версия сервера: 5.6.38
-- Версия PHP: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `brand`
--
CREATE DATABASE IF NOT EXISTS `brand` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `brand`;

-- --------------------------------------------------------

--
-- Структура таблицы `brand`
--

CREATE TABLE `brand` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `brand`
--

INSERT INTO `brand` (`id`, `name`) VALUES
(1, ' Marc O\'Polo'),
(2, 'ARMANI EXCHANGE'),
(3, 'Guess');

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `color` varchar(32) NOT NULL,
  `size` varchar(3) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `score` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `name`, `color`, `size`, `quantity`, `price`, `score`) VALUES
(1, 'egk3ulccumlqhb4ctkb7ma64ckm905i0', 'Льняная рубашка на пуговицах', '', 'xss', 1, '8890', '8890');

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `alias_name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `alias_name`) VALUES
(1, 'Женская одежда', ''),
(2, 'Мужская одежда', '');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_type_id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `foto` text NOT NULL,
  `description` varchar(2048) NOT NULL,
  `material` varchar(128) NOT NULL,
  `produced_by` varchar(128) NOT NULL,
  `view` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `price` decimal(10,0) NOT NULL,
  `ID_UUID` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`id`, `brand_id`, `category_id`, `product_type_id`, `name`, `foto`, `description`, `material`, `produced_by`, `view`, `date`, `price`, `ID_UUID`) VALUES
(1, 1, 2, 4, 'Льняная рубашка на пуговицах', 'img/products/MARC O’POLO/man/shirt/shirt.jpg', 'Рубашка Marc O’Polo<br>\r\n- происхождение бренда: Швеция<br>\r\n\r\nособенности модели: shaped fit, приталенный крой, рубашка застегивается на пуговицы<br>\r\n- цвет: хаки<br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°', '100% лен', 'Индия', 58, '2018-05-28 13:20:00', '8890', '06130687-67f6-11e8-852c-00055d6c06bd'),
(2, 1, 2, 4, 'Льняная рубашка на пуговицах', 'img/products/MARC O’POLO/man/shirt/shirt2.jpg', 'Рубашка Marc O’Polo\r\n- происхождение бренда: Швеция <br>\r\n\r\nособенности модели: shaped fit, приталенный крой, рубашка застегивается на пуговицы<br>\r\n- цвет: синий <br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°', '100% лен', 'Индия', 10, '2018-05-28 13:21:00', '8890', '757fb8aa-67f6-11e8-852c-00055d6c06bd'),
(3, 1, 2, 4, 'Рубашка в клетку с короткими рукавами', 'img/products/MARC O’POLO/man/shirt/shirt3.jpg', 'Рубашка Marc O’Polo\r\n- происхождение бренда: Швеция <br>\r\n\r\nособенности модели: regular fit, приталенный крой, карман, рубашка застегивается на пуговицы <br>\r\n- цвет: фуксия/синий <br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°, допускается машинная сушка при низкой температуре', '100% хлопок', 'Индия', 7, '2018-05-28 13:22:00', '5790', '75800cd6-67f6-11e8-852c-00055d6c06bd'),
(4, 1, 1, 2, 'Короткое трикотажное платье с капюшоном', 'img/products/MARC O’POLO/wamen/dresses/dresses.jpg', 'Платье Marc O’Polo\r\n- происхождение бренда: Швеция <br>\r\n- особенности модели: капюшон, длина по переду для размера XS (42) - 89 см, по спинке - 91,5 см, длина разрезов - 3 см <br>\r\n- декоративная отделка: принт <br>\r\n- цвет: серый/молочный/белый <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 150°', '100% хлопок', 'Китай', 13, '2018-05-28 13:23:00', '13980', '75803c2b-67f6-11e8-852c-00055d6c06bd'),
(5, 1, 1, 2, 'Короткое трикотажное платье с капюшоном', 'img/products/MARC O’POLO/wamen/dresses/dresses2.jpg', 'Платье Marc O’Polo\r\n- происхождение бренда: Швеция <br>\r\n- особенности модели: капюшон, длина по переду для размера XS (42) - 86 см, по спинке - 90 см, длина разрезов - 2,5 см <br>\r\n- цвет: коралловый <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 150°', '100% хлопок', 'Китай', 26, '2018-05-28 13:24:00', '13980', '758069b4-67f6-11e8-852c-00055d6c06bd'),
(6, 1, 1, 2, 'Короткое трикотажное платье с капюшоном', 'img/products/MARC O’POLO/wamen/dresses/dresses3.jpg', 'Платье Marc O’Polo\r\n- происхождение бренда: Швеция <br>\r\n- особенности модели: капюшон, длина по переду для размера XS (42) - 89 см, по спинке - 91,5 см, длина разрезов - 3 см <br>\r\n- декоративная отделка: принт <br>\r\n- цвет: красный/белый <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 150°', '100% хлопок', 'Китай', 3, '2018-05-28 13:25:00', '13980', '758093be-67f6-11e8-852c-00055d6c06bd'),
(7, 1, 1, 1, 'Фиолетовый шарф с цветочным принтом', 'img/products/MARC O’POLO/wamen/scarf/scarf.jpg', 'Шарф Marc O’Polo <br>\r\n- происхождение бренда: Швеция <br>\r\n- размер: 182 х 70 см <br>\r\n- цвет: синий/белый/фиолетовый <br>\r\n- рекомендации по уходу: стирать вручную, гладить при температуре до 110°', '57% модал, 43% купро', 'Индия', 104, '2018-05-28 13:26:00', '850', '7580bc25-67f6-11e8-852c-00055d6c06bd'),
(8, 1, 1, 1, 'Палантин из хлопка в полоску', 'img/products/MARC O’POLO/wamen/scarf/scarf2.jpg', 'Шарф Marc O’Polo <br>\r\n- происхождение бренда: Швеция <br>\r\n- размер: 182 х 69 см <br>\r\n- цвет: синий/белый <br>\r\n- рекомендации по уходу: стирать вручную, гладить при температуре до 110°', '57% модал, 43% купро', 'Индия', 12, '2018-05-28 13:27:00', '750', '7580e48f-67f6-11e8-852c-00055d6c06bd'),
(9, 1, 1, 1, 'Фиолетовый шарф с цветочным принтом', 'img/products/MARC O’POLO/wamen/scarf/scarf3.jpg', 'Шарф Marc O’Polo <br>\r\n- происхождение бренда: Швеция <br>\r\n- размер: 182 х 69 см <br>\r\n- цвет: синий/белый <br>\r\n- рекомендации по уходу: стирать вручную, гладить при температуре до 110°', '57% модал, 43% купро', 'Индия', 51, '2018-05-28 13:28:00', '1500', '75811bae-67f6-11e8-852c-00055d6c06bd'),
(10, 2, 2, 3, 'Черная футболка с треугольным вырезом', 'img/products/ARMANI EXCHANGE/man/t-shirt/t-shirt.jpg', 'Футболка ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- декоративная отделка: принт <br>\r\n- цвет: черный/белый <br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°', '100% хлопок', 'Камбоджа', 183, '2018-05-28 13:29:00', '3290', '75814888-67f6-11e8-852c-00055d6c06bd'),
(11, 2, 2, 3, 'Хлопковая футболка белого цвета', 'img/products/ARMANI EXCHANGE/man/t-shirt/t-shirt2.jpg', 'Футболка ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- декоративная отделка: принт <br>\r\n- цвет: белый <br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°', '100% хлопок ', 'Камбоджа', 37, '2018-05-28 13:30:00', '3290', '758170f9-67f6-11e8-852c-00055d6c06bd'),
(12, 2, 2, 3, 'Серая футболка из хлопка', 'img/products/ARMANI EXCHANGE/man/t-shirt/t-shirt3.jpg', 'Футболка ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- декоративная отделка: принт <br>\r\n- цвет: серый/синий <br>\r\n- рекомендации по уходу: стирать при температуре до 30°, гладить при температуре до 110°', '100% хлопок', 'Камбоджа', 0, '2018-05-28 13:31:00', '3290', '758198f5-67f6-11e8-852c-00055d6c06bd'),
(13, 2, 1, 2, 'Платье с цветочным принтом', 'img/products/ARMANI EXCHANGE/woman/dresses/dresses.jpg', 'Платье ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- особенности модели: платье застегивается сзади на молнию, длина по переду для размера 2 (42) - 88 см <br>\r\n- цвет: черный/мультиколор <br>\r\n- рекомендации по уходу: стирать вручную, гладить при температуре до 110°', '00% полиэстер, подкладка - 100% полиэстер', 'Китай', 0, '2018-05-28 13:32:00', '10490', '7581c122-67f6-11e8-852c-00055d6c06bd'),
(14, 2, 1, 2, 'Черное платье с вырезом на спине', 'img\\products\\ARMANI EXCHANGE\\woman\\dresses\\dresses2.jpg', 'Платье ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- особенности модели: платье застегивается сбоку на молнию, длина по переду для размера XS (40-42) - 86 см <br>\r\n- цвет: черный/белый <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 110°', '46% вискоза, 43% полиамид, 6% эластан, 5% полиэстер, вставки - искусственная кожа (100% полиэстер с полиуретановым покрытием)', 'Китай', 218, '2018-05-28 13:33:00', '8490', '7581e977-67f6-11e8-852c-00055d6c06bd'),
(15, 2, 1, 2, 'Синее платье с расклешенной юбкой', 'img/products/ARMANI EXCHANGE/woman/dresses/dresses3.jpg', 'Платье ARMANI EXCHANGE <br>\r\n- происхождение бренда: Италия <br>\r\n- особенности модели: платье застегивается сзади на молнию, длина по переду для размера XS (40-42) - 90 см <br>\r\n- цвет: синий <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 110°', '- материал: 97% полиэстер, 3% эластан, подкладка - 95% полиамид, 5% эластан', 'Китай', 20, '2018-05-28 13:34:00', '8450', '7582119a-67f6-11e8-852c-00055d6c06bd'),
(16, 3, 2, 4, 'Хлопковая рубашка с карманом', 'img/products/GUESS/man/shirt/shirt.jpg', 'Рубашка Guess <br>\r\n- происхождение бренда: США <br>\r\n- особенности модели: slim fit, приталенный крой, карман, рубашка застегивается на пуговицы <br>\r\n- декоративная отделка: вышивка <br>\r\n- цвет: синий/белый <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 110°, отбеливать без применения хлора, допускается машинная сушка при низкой температуре', '100% хлопок', 'Индия', 132, '2018-05-28 13:35:00', '6348', '758239bc-67f6-11e8-852c-00055d6c06bd'),
(17, 3, 2, 4, 'Хлопковая рубашка с карманом', 'img/products/GUESS/man/shirt/shirt2.jpg', 'Рубашка Guess <br>\r\n- происхождение бренда: США <br>\r\n- особенности модели: slim fit, приталенный крой, карман, рубашка застегивается на пуговицы <br>\r\n- декоративная отделка: вышивка <br>\r\n- цвет: синиц/белый  <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 110°, сушить в подвешенном состоянии', '94% хлопок, 5% нейлон, 1% эластан', 'Китай', 0, '2018-05-28 13:36:00', '4700', '75826322-67f6-11e8-852c-00055d6c06bd'),
(18, 3, 2, 4, 'Хлопковая рубашка с карманом', 'img/products/GUESS/man/shirt/shirt3.jpg', '', '94% хлопок, 5% нейлон, 1% эластан', 'Китай', 7, '2018-05-28 13:37:00', '4500', '91bee0db-67f6-11e8-852c-00055d6c06bd'),
(19, 3, 1, 2, 'Короткое платье с пайетками', 'img/products/GUESS/women/dresses/dresses.jpg', 'Платье Guess <br>\r\n- происхождение бренда: США <br>\r\n- особенности модели: длина по переду для размера ХS (42) - 88 см <br>\r\n- декоративная отделка: пайетки <br>\r\n- цвет: зеленый (хамелеон)/черный <br>\r\n- рекомендации по уходу: стирать вручную, не гладить, сушить на горизонтальной поверхности, допускается щадящая химическая чистка', '100% полиэстер, подкладка - 100% полиэстер', 'Китай', 8, '2018-05-28 13:38:00', '11000', '91bf1530-67f6-11e8-852c-00055d6c06bd'),
(20, 3, 1, 2, 'Длинное платье с расклешенной юбкой и открытыми плечами', 'img/products/GUESS/women/dresses/dresses2.jpg', 'Платье Guess <br>\r\n- происхождение бренда: США <br>\r\n- особенности модели: платье сверху и на талии фиксируется резинками, длина по переду для размера XS (42) - 128 см <br>\r\n- цвет: коралловый/мультиколор <br>\r\n- рекомендации по уходу: стирать вручную, гладить при температуре до 110°, сушить в подвешенном состоянии', '100% полиэстер, подкладка - 100% полиэстер', 'Китай', 12, '2018-05-28 13:39:00', '9540', '91bf41af-67f6-11e8-852c-00055d6c06bd'),
(21, 3, 1, 2, 'Короткое джинсовое платье с расклешенной юбкой', 'img/products/GUESS/women/dresses/dresses3.jpg', 'Платье Guess <br>\r\n- происхождение бренда: США <br>\r\n- особенности модели: бретели с регулировкой длины, длина по переду для размера XS (42) - 88 см <br>\r\n- цвет: синий <br>\r\n- рекомендации по уходу: бережная стирка при температуре до 30°, гладить при температуре до 110°, сушить в подвешенном состоянии', '100% лиоцелл', 'Индия', 41, '2018-07-28 13:40:00', '2590', '91bf9249-67f6-11e8-852c-00055d6c06bd'),
(92, 1, 1, 1, 'testName', 'testFot', 'testDes', 'testMaterial', 'testBy', 0, '2018-09-14 21:59:50', '478', '1'),
(93, 1, 1, 1, 'testName', 'testFoto', 'testDes', 'testMaterial', 'testBy', 0, '2018-09-14 23:16:08', '478', '1'),
(94, 2, 2, 2, 'update', 'updateFoto', 'updateDes', 'uo', 'Russia', 3, '2018-09-14 23:32:39', '300000', '7');

-- --------------------------------------------------------

--
-- Структура таблицы `product_type`
--

CREATE TABLE `product_type` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `product_type`
--

INSERT INTO `product_type` (`id`, `name`) VALUES
(1, 'Шарф'),
(2, 'Платье'),
(3, 'Футболка'),
(4, 'Рубашка');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `password`) VALUES
(1, 'user', 'user'),
(2, 'admin', 'admin'),
(63, 'user1', '123'),
(64, 'user', '123'),
(65, 'test', 'test'),
(70, 'tttt', 'ttt'),
(71, 'Ura', '123'),
(72, 'Ura', '123');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Индексы таблицы `product_type`
--
ALTER TABLE `product_type`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT для таблицы `product_type`
--
ALTER TABLE `product_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
