-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 10 2013 г., 23:01
-- Версия сервера: 5.5.29-log
-- Версия PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `greenice_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `gi_products`
--

CREATE TABLE IF NOT EXISTS `gi_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `owner_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Дамп данных таблицы `gi_products`
--

INSERT INTO `gi_products` (`id`, `name`, `price`, `quantity`, `created_at`, `owner_id`) VALUES
(1, 'ZTE V970', '$250', 15, '2013-02-10', 1),
(2, 'Samsung S7562 ', '$309', 7, '2013-02-09', 2),
(3, 'Samsung S6500 ', '$168', 4, '2013-02-10', 2),
(4, 'Nokia Lumia 820', '$515', 9, '2013-02-10', 2);

-- --------------------------------------------------------

--
-- Структура таблицы `gi_users`
--

CREATE TABLE IF NOT EXISTS `gi_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `gi_users`
--

INSERT INTO `gi_users` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'dancer12@qip.ru', 'e4a2979efe1fd2db0678e910a27751ec');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
