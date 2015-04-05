-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 11:41 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `dating`
--

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
`id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL COMMENT 'Пользователь',
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'Дата создания',
  `city_id` int(10) unsigned NOT NULL COMMENT 'Город',
  `category_id` int(10) unsigned NOT NULL COMMENT 'Категория',
  `target_id` int(10) unsigned NOT NULL COMMENT 'Цель',
  `header` varchar(80) COLLATE utf8_bin NOT NULL COMMENT 'Заголовок',
  `text` varchar(2000) COLLATE utf8_bin NOT NULL COMMENT 'ТЕкст',
  `active` tinyint(1) NOT NULL COMMENT 'Активно',
  `abused` tinyint(1) NOT NULL COMMENT 'Есть жалобы',
  `age` tinyint(3) unsigned NOT NULL COMMENT 'Возраст',
  `activationCode` varchar(18) COLLATE utf8_bin DEFAULT NULL COMMENT 'Activation Code'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `create_date`, `city_id`, `category_id`, `target_id`, `header`, `text`, `active`, `abused`, `age`, `activationCode`) VALUES
(1, 1, '2015-02-05 23:42:50', 1, 1, 1, 'dthdthrt', 'rthrthertherh', 0, 0, 35, NULL),
(4, 1, '2015-02-06 20:03:03', 1, 3, 4, 'цуаукп', 'купцкцуп', 1, 1, 22, NULL),
(5, 14, '2015-02-08 09:51:35', 1, 2, 5, 'цуацйуацй', 'цуайцуайцауйцуа', 0, 0, 33, NULL),
(6, 15, '2015-02-08 13:45:16', 2, 2, 3, 'ergewrgwerg', ' t reth reh erh yh rthy', 0, 0, 24, NULL),
(7, 17, '2015-02-08 18:06:48', 2, 2, 3, 'wefhwfiuherifhieurh', 'iurhviervoqihvo oh ohbrob ojb owjb pwj bp''wj bwj b''pwjb p''owjbpowjpboj wpbjwpojbwj bpowejbjbojweb pejwb pjb j bjb ', 0, 0, 23, NULL),
(8, 18, '2015-02-08 19:52:22', 1, 2, 4, '20trh rttyj ', ' trert hethytyh yn tntytyrnernerneryme  ynt enyeyn etyn eneyn t', 0, 0, 20, NULL),
(9, 23, '2015-02-09 13:12:08', 2, 3, 3, 'Мирра помечало ', 'Пнишршишмг г г н нмгишишишишиишингпши гшигиш г наш щипчики \r\n', 0, 0, 33, NULL),
(10, 24, '2015-02-10 17:57:50', 2, 2, 3, 'lkwnlerng', 'alernvlenr glwt rtlknerltnh;remh''rkt\\rtkh\\wrkt\\ wket ''wet;j w;rtjhwejhoejrohj wehwe'' kh\\qelrh\\qelrHker h\\ker''hkelbmgbm.fgnbx,n  gxkfnbfgnbfngsgn ;mn''a ''an''tn', 0, 0, 56, NULL),
(11, 25, '2015-02-10 18:19:12', 1, 2, 1, 'ergewrgweh', 'wrt jyetk rky y rtjejeketketketk ehwthrtr', 0, 0, 44, NULL),
(12, 26, '2015-02-10 18:19:46', 1, 2, 4, 'reg sthsr thrt dytj tj ', 'rt jetmy etmturmtru,,, riryu,t,et,yu,r  wrgj ergj bd.fjkbh dfjb sdfb.jadfb ;ae b''aeblakdnb.ldn bsdbnj jjfnlknb lkndblk skbslbsldnbk s blksnblksnb sdbndlskbn sldbn skdgb;', 0, 0, 55, NULL),
(13, 27, '2015-02-10 18:24:20', 2, 1, 1, 'qwfdwqefqwv', 'wveqrv kjgwrtlk wtrwrmnwrk mnlkwrn lwe;nwrt;nmw ''rtmn ''wrmn''wrmn wrm n''', 0, 0, 22, NULL),
(14, 28, '2015-02-10 18:24:44', 2, 2, 3, 'qrefqrg t gwtke''bkq en;ql tknlrgn lwng ', ' elkrbwelbn wrn ;wrnt;wmt''mew''mw;rm n;wrmn; wrm ;wr', 0, 0, 44, NULL),
(15, 28, '2015-02-10 18:37:39', 2, 2, 3, 'wfewqfewrfe', ' ergewrg wetb wrtw rn', 0, 0, 44, NULL),
(16, 29, '2015-02-10 18:46:34', 2, 2, 1, 'wrtlk jnrltjn wrjtn;w rnrw''yn wryjn', 'eiugr hogiwoeh ;owehwej wejt worjnwrkntp''wrkt nkwrtnp kwr''nk ''wrj n;wrjtn; wjrt', 0, 0, 17, NULL),
(17, 30, '2015-02-26 06:14:23', 2, 3, 5, 'Chukka chhb', 'Dffghfjhjbjj\r\n', 0, 0, 44, NULL),
(18, 33, '2015-04-04 08:42:41', 2, 2, 3, 'фф', 'ф', 0, 0, 255, NULL),
(19, 1, '2015-04-05 09:03:19', 1, 1, 3, 'уцвцйувйцув', 'цувйцувцйуйкморп рки цкери клцеридкер и', 0, 0, 33, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
 ADD PRIMARY KEY (`id`), ADD KEY `category_id` (`category_id`), ADD KEY `target_id` (`target_id`), ADD KEY `user_id` (`user_id`), ADD KEY `age` (`age`), ADD KEY `city_id` (`city_id`), ADD KEY `activationCode` (`activationCode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`target_id`) REFERENCES `target` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
