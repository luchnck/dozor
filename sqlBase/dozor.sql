DROP DATABASE `dozor`;
CREATE DATABASE `dozor`;
USE `dozor`;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

CREATE TABLE IF NOT EXISTS `games` (
`id` int(11) NOT NULL,
  `caption` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `taskslist` int(11) NOT NULL,
  `teamslist` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `games` (`id`, `caption`, `taskslist`, `teamslist`, `start`, `end`) VALUES
(1, 'Прошла', 1, 1, '2016-02-21 20:31:00', '2016-02-21 21:00:00'),
(2, 'Идет', 2, 1, '2016-03-21 20:31:00', '2017-02-21 21:00:00'),
(3, 'Будет', 3, 1, '2017-04-05 18:00:50', '2017-04-06 18:01:00');

CREATE TABLE IF NOT EXISTS `tasklists` (
`id` int(11) NOT NULL,
  `tasklist` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

INSERT INTO `tasklists` (`id`, `tasklist`) VALUES
(1, '1,2,3'),
(2, '4,5,6'),
(3, '1,5,3');


CREATE TABLE IF NOT EXISTS `tasks` (
`id` int(11) NOT NULL,
  `title` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `opts` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `secret` varchar(256) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=11 ;


INSERT INTO `tasks` (`id`, `title`, `details`, `opts`, `secret`) VALUES
(8, 'Четвертое задание', 'Задание 4 просто задание для выполнения и блаблаблабла', 'такое слово когда вроде нельзя никому говорить', 'секретно!'),
(1, 'Третье задание', 'Задание 3 просто задание для выполнения и блаблаблабла', '', 'patron'),
(2, 'Второе задание', 'Задание 2 просто задание для выполнения и блаблаблабла блаблабалаблабалабла\nблабалаблаба блабалабла блабалбала блаблабалаб лабл абл блабалаблабалбалаб!!', '', 'patron'),
(3, 'Первое задание', 'Задание 1 просто задание для выполнения и блаблаблабла блабалабла балабла бал балаблабла блаабалбалаблаб бал абл аблаабла', '', 'patron'),
(9, 'пятое задание', 'Тупо пятое задание сделай и ИДИ ДАЛЬШЕ, ответ содержится в заданиии', 'ИДИ ДАЛЬШЕ', 'ИДИ ДАЛЬШЕ'),
(10, 'Шестое заключительное', 'Скоро конец! Кто закончил молодец!', 'добрый молодец', 'молодец');


CREATE TABLE IF NOT EXISTS `teamlists` (
`id` int(11) NOT NULL,
  `teamlist` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='teams_json содержит id команд' AUTO_INCREMENT=3 ;


INSERT INTO `teamlists` (`id`, `teamlist`) VALUES
(1, '1,2,3');


CREATE TABLE IF NOT EXISTS `teams` (
`id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `email` char(128) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

INSERT INTO `teams` (`id`, `name`, `pass`, `email`) VALUES
(1, 'CommandA', '1a1dc91c907325c69271ddf0c944bc72', NULL),
(2, 'CommandB', '1a1dc91c907325c69271ddf0c944bc72', NULL),
(3, 'CommandC', '1a1dc91c907325c69271ddf0c944bc72', NULL);


CREATE TABLE IF NOT EXISTS `tmpgamedata` (
`id` int(11) NOT NULL,
  `gameid` int(11) NOT NULL,
  `teamid` int(11) NOT NULL,
  `timescore` int(11) NOT NULL,
  `taskserials` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT 'последовательность заданий через запятую',
  `checkpoint` datetime NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

INSERT INTO `tmpgamedata` (`id`, `gameid`, `teamid`, `timescore`, `taskserials`, `checkpoint`) VALUES
(1, 2, 1, 0, '1,2,3', '2016-04-08 23:04:47'),
(2, 2, 2, 0, '2,3,1', '2016-04-08 22:54:56'),
(3, 2, 3, 0, '3,1,2', '2016-04-08 22:54:56');


ALTER TABLE `games`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tasklists`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `teamlists`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `teams`
 ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `tmpgamedata`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `games`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `tasklists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

ALTER TABLE `tasks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;

ALTER TABLE `teamlists`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;

ALTER TABLE `teams`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;

ALTER TABLE `tmpgamedata`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
