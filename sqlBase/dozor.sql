-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Мар 22 2016 г., 07:02
-- Версия сервера: 5.5.39
-- Версия PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `dozor`
--
CREATE DATABASE IF NOT EXISTS `dozor` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `dozor`;

-- --------------------------------------------------------

--
-- Структура таблицы `games`
--

DROP TABLE IF EXISTS `games`;
CREATE TABLE IF NOT EXISTS `games` (
`id` int(11) NOT NULL,
  `caption` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `taskslist` int(11) NOT NULL,
  `teamslist` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `games`
--

INSERT INTO `games` (`id`, `caption`, `taskslist`, `teamslist`, `start`, `end`) VALUES
(1, 'Первая игра', 1, 1, '2016-02-21 20:31:00', '2017-02-21 21:00:00'),
(2, 'Вторая игра', 1, 1, '2016-03-21 20:31:00', '2017-02-21 21:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `tasklists`
--

DROP TABLE IF EXISTS `tasklists`;
CREATE TABLE IF NOT EXISTS `tasklists` (
`id` int(11) NOT NULL,
  `tasklist` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `tasklists`
--

INSERT INTO `tasklists` (`id`, `tasklist`) VALUES
(1, '1,2,3');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

DROP TABLE IF EXISTS `tasks`;
CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `opts` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `title`, `details`, `opts`, `secret`) VALUES
(1, 'Третье задание', '', '', 'patron'),
(2, 'Второе задание', '', '', 'patron'),
(3, 'Первое задание', '', '', 'patron');

-- --------------------------------------------------------

--
-- Структура таблицы `teamlists`
--

DROP TABLE IF EXISTS `teamlists`;
CREATE TABLE IF NOT EXISTS `teamlists` (
`id` int(11) NOT NULL,
  `teamlist` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='teams_json содержит id команд' AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `teamlists`
--

INSERT INTO `teamlists` (`id`, `teamlist`) VALUES
(1, '1,2,3');

-- --------------------------------------------------------

--
-- Структура таблицы `teams`
--

DROP TABLE IF EXISTS `teams`;
CREATE TABLE IF NOT EXISTS `teams` (
`id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `teams`
--

INSERT INTO `teams` (`id`, `name`, `pass`, `email`) VALUES
(1, 'CommandA', '1a1dc91c907325c69271ddf0c944bc72', NULL),
(2, 'CommandB', '1a1dc91c907325c69271ddf0c944bc72', NULL),
(3, 'Команда C', '', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `tmpgamedata`
--

DROP TABLE IF EXISTS `tmpgamedata`;
CREATE TABLE IF NOT EXISTS `tmpgamedata` (
`id` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `timescore` int(11) NOT NULL,
  `taskserials` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'последовательность заданий через запятую',
  `checkpoint` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Дамп данных таблицы `tmpgamedata`
--

INSERT INTO `tmpgamedata` (`id`, `gameid`, `teamid`, `timescore`, `taskserials`, `checkpoint`) VALUES
(1, 1, 1, 1271812, '', '2016-03-12 16:37:52'),
(2, 1, 2, 1492, '', '2016-03-12 20:40:54'),
(3, 1, 3, 3230, '', '2016-02-26 23:37:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `games`
--
ALTER TABLE `games`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasklists`
--
ALTER TABLE `tasklists`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teamlists`
--
ALTER TABLE `teamlists`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tmpgamedata`
--
ALTER TABLE `tmpgamedata`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tasklists`
--
ALTER TABLE `tasklists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teamlists`
--
ALTER TABLE `teamlists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tmpgamedata`
--
ALTER TABLE `tmpgamedata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
