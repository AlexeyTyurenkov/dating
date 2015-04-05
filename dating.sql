-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2015 at 06:05 AM
-- Server version: 5.5.41
-- PHP Version: 5.4.4-14+deb7u5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Для серьезных отношений'),
(2, 'Для легких отношений\n'),
(3, 'Для материальной поддержки');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=4 ;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`id`, `name`) VALUES
(1, 'Вінниця'),
(2, 'Київ');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  KEY `target_id` (`target_id`),
  KEY `user_id` (`user_id`),
  KEY `age` (`age`),
  KEY `city_id` (`city_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=19 ;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `user_id`, `create_date`, `city_id`, `category_id`, `target_id`, `header`, `text`, `active`, `abused`, `age`) VALUES
(1, 1, '2015-02-05 23:42:50', 1, 1, 1, 'dthdthrt', 'rthrthertherh', 0, 0, 35),
(4, 1, '2015-02-06 20:03:03', 1, 3, 4, 'цуаукп', 'купцкцуп', 1, 1, 22),
(5, 14, '2015-02-08 09:51:35', 1, 2, 5, 'цуацйуацй', 'цуайцуайцауйцуа', 0, 0, 33),
(6, 15, '2015-02-08 13:45:16', 2, 2, 3, 'ergewrgwerg', ' t reth reh erh yh rthy', 0, 0, 24),
(7, 17, '2015-02-08 18:06:48', 2, 2, 3, 'wefhwfiuherifhieurh', 'iurhviervoqihvo oh ohbrob ojb owjb pwj bp''wj bwj b''pwjb p''owjbpowjpboj wpbjwpojbwj bpowejbjbojweb pejwb pjb j bjb ', 0, 0, 23),
(8, 18, '2015-02-08 19:52:22', 1, 2, 4, '20trh rttyj ', ' trert hethytyh yn tntytyrnernerneryme  ynt enyeyn etyn eneyn t', 0, 0, 20),
(9, 23, '2015-02-09 13:12:08', 2, 3, 3, 'Мирра помечало ', 'Пнишршишмг г г н нмгишишишишиишингпши гшигиш г наш щипчики \r\n', 0, 0, 33),
(10, 24, '2015-02-10 17:57:50', 2, 2, 3, 'lkwnlerng', 'alernvlenr glwt rtlknerltnh;remh''rkt\\rtkh\\wrkt\\ wket ''wet;j w;rtjhwejhoejrohj wehwe'' kh\\qelrh\\qelrHker h\\ker''hkelbmgbm.fgnbx,n  gxkfnbfgnbfngsgn ;mn''a ''an''tn', 0, 0, 56),
(11, 25, '2015-02-10 18:19:12', 1, 2, 1, 'ergewrgweh', 'wrt jyetk rky y rtjejeketketketk ehwthrtr', 0, 0, 44),
(12, 26, '2015-02-10 18:19:46', 1, 2, 4, 'reg sthsr thrt dytj tj ', 'rt jetmy etmturmtru,,, riryu,t,et,yu,r  wrgj ergj bd.fjkbh dfjb sdfb.jadfb ;ae b''aeblakdnb.ldn bsdbnj jjfnlknb lkndblk skbslbsldnbk s blksnblksnb sdbndlskbn sldbn skdgb;', 0, 0, 55),
(13, 27, '2015-02-10 18:24:20', 2, 1, 1, 'qwfdwqefqwv', 'wveqrv kjgwrtlk wtrwrmnwrk mnlkwrn lwe;nwrt;nmw ''rtmn ''wrmn''wrmn wrm n''', 0, 0, 22),
(14, 28, '2015-02-10 18:24:44', 2, 2, 3, 'qrefqrg t gwtke''bkq en;ql tknlrgn lwng ', ' elkrbwelbn wrn ;wrnt;wmt''mew''mw;rm n;wrmn; wrm ;wr', 0, 0, 44),
(15, 28, '2015-02-10 18:37:39', 2, 2, 3, 'wfewqfewrfe', ' ergewrg wetb wrtw rn', 0, 0, 44),
(16, 29, '2015-02-10 18:46:34', 2, 2, 1, 'wrtlk jnrltjn wrjtn;w rnrw''yn wryjn', 'eiugr hogiwoeh ;owehwej wejt worjnwrkntp''wrkt nkwrtnp kwr''nk ''wrj n;wrjtn; wjrt', 0, 0, 17),
(17, 30, '2015-02-26 06:14:23', 2, 3, 5, 'Chukka chhb', 'Dffghfjhjbjj\r\n', 0, 0, 44),
(18, 33, '2015-04-04 08:42:41', 2, 2, 3, 'фф', 'ф', 0, 0, 255);

-- --------------------------------------------------------

--
-- Table structure for table `target`
--

CREATE TABLE IF NOT EXISTS `target` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=6 ;

--
-- Dumping data for table `target`
--

INSERT INTO `target` (`id`, `name`) VALUES
(1, 'мужчина ищет женщину'),
(3, 'женщина ищет мужчину'),
(4, 'женщина ищет женщину'),
(5, 'мужчина ищет мужчину');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(513) COLLATE utf8_bin NOT NULL,
  `date_create` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `password` varchar(513) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`),
  KEY `email` (`email`(255))
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `date_create`, `password`) VALUES
(1, 'aaaaaa', '2015-02-05 23:42:24', 'ssdfsdf'),
(2, 'dgserg', '2015-02-07 23:09:43', 'Iq6#Xoc9P8G&^Od4S='),
(3, 'greg', '2015-02-07 23:25:19', 'WQRxJr@25E#)PbliDa'),
(4, 'wefwef', '2015-02-07 23:25:58', 'ltbFS7;NgTYVOdmj81'),
(5, 'steisy112', '2015-02-08 08:10:07', 'qHAFhBv)7%:2KXtfsR'),
(6, 'пкуп', '2015-02-08 09:31:42', 'tbRw6*nI;1ehj,$rVG'),
(7, 'пуп', '2015-02-08 09:35:10', 'KDfZy&^*nCmN!ztFhR'),
(8, 'ref', '2015-02-08 09:36:54', 'ZE&gm3*Ul=jCpt6sOA'),
(9, 'erfe§', '2015-02-08 09:37:44', 'D*$FwL._dnEj1fgr@8'),
(10, 'fref', '2015-02-08 09:38:56', 'AxiF+.4?2#vMrUXbk,'),
(11, 'referf', '2015-02-08 09:41:38', 'Wf&%VkmIYP=A1pxHu-'),
(12, 'erfwe', '2015-02-08 09:45:22', 'FVd0=J$.rxHgjwR@qE'),
(13, 'rtgerg', '2015-02-08 09:46:34', '@Pdz^pRM+s;-=UB5v3'),
(14, 'уца', '2015-02-08 09:51:21', 'NkPd;TS:Zf-.ou4i&B'),
(15, 'sdvfv', '2015-02-08 13:44:59', 'KQZ$NOv,Ib1Ju9Eq*g'),
(16, 'vgfriuehfowe#kgeriugh', '2015-02-08 13:47:46', 'FRh_dju:2K4a7yt0bT'),
(17, 'kfbsdf', '2015-02-08 18:06:18', 'vcIzo,EW(MZb3RQtd-'),
(18, 'dtrbrtb', '2015-02-08 19:51:44', '35UbBKRIxXaN4!L+8^'),
(19, 'wssswwwwwwwwqwdwefqergwegwrtgrtgrgwrgwgwrgw', '2015-02-08 21:54:43', '^z.:T&+iLM6o0(q-,A'),
(20, 'Xazffg@))?$!', '2015-02-09 13:09:49', 'P.7Yvo26cxuVR=)_;@'),
(21, 'Ваероо@;6))8)&', '2015-02-09 13:10:58', '9Z0L3Rdy5x:%oe_Y&f'),
(22, 'Sdfgh', '2015-02-09 13:11:18', 'KRN5u0ipTMx,8$B2v?'),
(23, 'Ugh', '2015-02-09 13:12:04', 'k+!lC4W81sRcA03PXI'),
(24, 'jjbkbkb', '2015-02-10 17:57:27', 'xLK;w^-VQkq60ubBf='),
(25, 'hrthwrt', '2015-02-10 18:18:56', '6T+f;HCqP^dn#N=I(z'),
(26, 'eagrer', '2015-02-10 18:19:18', 'Cj$1^zZ0.Ud?aXn5Kb'),
(27, 'AASD', '2015-02-10 18:24:02', 'gdk6DKfOcyLS+Xm$CW'),
(28, 'asdf', '2015-02-10 18:24:25', 'W(!q.Y=ShP:5d)1#K^'),
(29, 'rrrr', '2015-02-10 18:46:20', '7+%#a8GWC5,wUAPDJn'),
(30, 'Fghjk high', '2015-02-26 06:13:51', 'nUfF*I;&mtqwo^AhWj'),
(31, 'мипаапапт', '2015-04-04 08:13:57', '?k!c6;5e-DUaHhgE43'),
(32, 'natasha-badora', '2015-04-04 08:23:27', '1fBROw%dk;@pDKr43s'),
(33, 'фф', '2015-04-04 08:42:21', 'Wzvf=_OGrmtjh6B(Z1');

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
