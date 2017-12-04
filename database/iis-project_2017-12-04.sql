# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.9-MariaDB)
# Database: iis-project
# Generation Time: 2017-12-04 21:13:34 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table iis_concert
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_concert`;

CREATE TABLE `iis_concert` (
  `iis_concertid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_eventid` int(10) unsigned NOT NULL,
  `capacity` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_concertid`),
  KEY `iis_concert_iis_eventid_foreign` (`iis_eventid`),
  KEY `iis_concert_index` (`iis_concertid`,`iis_eventid`),
  CONSTRAINT `iis_concert_iis_eventid_foreign` FOREIGN KEY (`iis_eventid`) REFERENCES `iis_event` (`iis_eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_concert` WRITE;
/*!40000 ALTER TABLE `iis_concert` DISABLE KEYS */;

INSERT INTO `iis_concert` (`iis_concertid`, `iis_eventid`, `capacity`, `date`, `created_at`, `updated_at`)
VALUES
	(1,1,22302,'1979-10-16 07:17:21','1976-09-17 11:55:07','1972-05-21 21:57:15'),
	(2,2,46151,'2003-03-16 17:20:44','1978-04-24 18:49:12','2005-08-14 01:06:12'),
	(3,3,38096,'1976-10-13 07:57:44','2017-01-01 10:38:38','2005-02-07 12:14:42');

/*!40000 ALTER TABLE `iis_concert` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_event
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_event`;

CREATE TABLE `iis_event` (
  `iis_eventid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_eventid`),
  KEY `iis_event_iis_eventid_index` (`iis_eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_event` WRITE;
/*!40000 ALTER TABLE `iis_event` DISABLE KEYS */;

INSERT INTO `iis_event` (`iis_eventid`, `name`, `location`, `image`, `description`, `created_at`, `updated_at`)
VALUES
	(1,'Maxime et neque culpa.','Et sint.','https://lorempixel.com/1280/720/?80455','Sed ut qui est illum consequatur et adipisci cupiditate quia et eaque iste fugit autem.','2010-03-22 20:38:17','2007-06-22 01:08:00'),
	(2,'Culpa tenetur aut.','Mollitia dicta rem.','https://lorempixel.com/1280/720/?29540','Vel sit culpa autem voluptas autem quo rerum laboriosam non corporis omnis voluptatum et ut occaecati odit.','2010-12-27 23:23:51','1997-04-03 20:08:11'),
	(3,'Placeat voluptatum amet dolore.','Harum esse quaerat.','https://lorempixel.com/1280/720/?27395','Omnis voluptas eligendi aspernatur saepe voluptatem expedita magni optio alias nobis et minima qui soluta quia.','2011-03-11 01:40:05','2006-11-02 07:53:37'),
	(4,'Est ad qui.','Molestiae odio facere.','https://lorempixel.com/1280/720/?89453','Qui at aut sed laborum eos dolorem consectetur ut quam quia vitae similique ab.','1976-02-27 16:48:22','1971-03-24 09:09:10'),
	(5,'Aliquam eum et.','Quos nihil laborum.','https://lorempixel.com/1280/720/?87873','Inventore corporis fugit commodi qui tenetur laudantium animi mollitia ipsa sequi reiciendis delectus quia accusamus perspiciatis quos illo maxime.','1994-11-13 16:48:53','1996-02-07 07:49:33');

/*!40000 ALTER TABLE `iis_event` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_festival
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_festival`;

CREATE TABLE `iis_festival` (
  `iis_festivalid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_eventid` int(10) unsigned NOT NULL,
  `interval` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_festivalid`),
  KEY `iis_festival_iis_eventid_foreign` (`iis_eventid`),
  KEY `iis_festival_index` (`iis_festivalid`,`iis_eventid`),
  CONSTRAINT `iis_festival_iis_eventid_foreign` FOREIGN KEY (`iis_eventid`) REFERENCES `iis_event` (`iis_eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_festival` WRITE;
/*!40000 ALTER TABLE `iis_festival` DISABLE KEYS */;

INSERT INTO `iis_festival` (`iis_festivalid`, `iis_eventid`, `interval`, `order`, `start_date`, `end_date`, `created_at`, `updated_at`)
VALUES
	(1,4,'accusantium',3,'2001-07-25 15:42:21','2016-11-08 00:45:27','1992-01-06 18:22:23','1999-07-29 09:58:05'),
	(2,5,'soluta',4,'2016-08-21 20:26:01','2017-08-22 17:15:10','1987-05-04 17:55:16','2004-08-13 05:17:16');

/*!40000 ALTER TABLE `iis_festival` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_interpret
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_interpret`;

CREATE TABLE `iis_interpret` (
  `iis_interpretid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `members` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publisher` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `formed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_interpretid`),
  KEY `iis_interpret_iis_interpretid_index` (`iis_interpretid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_interpret` WRITE;
/*!40000 ALTER TABLE `iis_interpret` DISABLE KEYS */;

INSERT INTO `iis_interpret` (`iis_interpretid`, `name`, `members`, `genre`, `publisher`, `image`, `description`, `formed_at`, `created_at`, `updated_at`)
VALUES
	(1,'Perferendis natus ratione.','Nihil ipsa qui esse.','rock','corporis','https://lorempixel.com/1280/720/?17499','Eos et beatae hic cupiditate. Eius est voluptas eveniet tenetur. Aspernatur et veniam voluptas quam ut.','1978-04-21 13:02:32','1976-07-08 19:23:07','1976-04-12 11:02:15'),
	(2,'Reprehenderit dolorem.','Aut voluptas voluptatibus incidunt.','rap','facilis','https://lorempixel.com/1280/720/?14148','Quia repellendus temporibus voluptate harum voluptas et minima. Dolorem aut earum et atque esse.','2003-03-26 02:22:51','1990-07-07 03:40:35','1995-04-15 02:05:43'),
	(3,'Molestias deleniti maiores.','Rerum facere hic.','punk','sit','https://lorempixel.com/1280/720/?12897','Tempora harum similique autem ab rerum in. Porro sit voluptatem voluptas impedit doloremque aut iure.','1978-08-13 04:25:45','1999-05-25 13:09:53','1973-03-03 00:42:20'),
	(4,'Nam quaerat quis alias.','Adipisci harum doloremque officiis.','pop','sed','https://lorempixel.com/1280/720/?73605','Quia quae laudantium odit illo qui sunt omnis. Consequatur autem atque est quae qui eos. Qui tenetur est est eveniet delectus perspiciatis nisi mollitia.','2005-05-23 17:39:01','1995-08-11 00:53:48','2015-08-31 23:03:25'),
	(5,'Voluptatibus vero est.','Ipsam enim eligendi illo.','rock','voluptatem','https://lorempixel.com/1280/720/?28419','Magnam reiciendis aut cumque iusto. Dolorem molestiae qui et et iste.','2007-04-08 01:26:28','1998-04-27 10:22:04','1987-05-09 14:10:23'),
	(6,'Ratione deserunt nihil iusto saepe.','Ut fuga velit.','rap','quos','https://lorempixel.com/1280/720/?72139','Voluptatem error rerum aut quibusdam. Eaque cum repellendus cumque minus.','2009-03-22 00:50:21','1999-03-02 13:24:17','1987-03-08 02:52:15'),
	(7,'Consequatur deserunt porro illum.','Qui enim ab aut qui.','punk','cumque','https://lorempixel.com/1280/720/?38087','Et velit quasi esse. Dolorem qui neque explicabo nihil. Excepturi dolores fugit vitae amet laudantium perspiciatis.','2002-06-28 21:44:01','1987-01-04 05:39:37','2011-11-21 02:03:58'),
	(8,'Quam nihil quia et.','Provident quo quod qui.','punk','dignissimos','https://lorempixel.com/1280/720/?34300','Nostrum qui consequuntur corporis quos. Mollitia qui amet quasi iure vel sunt velit.','1987-06-01 07:27:10','1971-11-28 18:18:08','1971-02-25 20:35:03'),
	(9,'Esse autem est.','Magnam voluptate molestiae.','rap','dolore','https://lorempixel.com/1280/720/?11362','Praesentium a neque repudiandae ipsum quidem sed nulla. Quis sunt rerum doloribus consectetur.','2006-10-21 10:36:18','1978-08-26 09:21:48','1977-09-30 05:20:34'),
	(10,'Eum aut iure nihil.','Soluta excepturi nemo sed.','rock','molestias','https://lorempixel.com/1280/720/?48637','Voluptatum aut qui velit sunt quasi perferendis. Sed enim repellat iure eos. Commodi earum quibusdam consequuntur nemo.','2004-08-14 06:19:34','2010-02-07 22:47:06','1991-10-14 17:34:10');

/*!40000 ALTER TABLE `iis_interpret` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_interpret_iis_concert
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_interpret_iis_concert`;

CREATE TABLE `iis_interpret_iis_concert` (
  `iis_interpret_iis_concertid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_interpretid` int(10) unsigned NOT NULL,
  `iis_concertid` int(10) unsigned NOT NULL,
  `order` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_interpret_iis_concertid`),
  KEY `iis_interpret_iis_concert_iis_interpretid_foreign` (`iis_interpretid`),
  KEY `iis_interpret_iis_concert_iis_concertid_foreign` (`iis_concertid`),
  KEY `iis_interpret_iis_concert_order_index` (`iis_interpret_iis_concertid`,`iis_interpretid`,`iis_concertid`),
  CONSTRAINT `iis_interpret_iis_concert_iis_concertid_foreign` FOREIGN KEY (`iis_concertid`) REFERENCES `iis_concert` (`iis_concertid`),
  CONSTRAINT `iis_interpret_iis_concert_iis_interpretid_foreign` FOREIGN KEY (`iis_interpretid`) REFERENCES `iis_interpret` (`iis_interpretid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_interpret_iis_concert` WRITE;
/*!40000 ALTER TABLE `iis_interpret_iis_concert` DISABLE KEYS */;

INSERT INTO `iis_interpret_iis_concert` (`iis_interpret_iis_concertid`, `iis_interpretid`, `iis_concertid`, `order`, `date`, `created_at`, `updated_at`)
VALUES
	(1,10,1,3,'2008-09-08 10:06:28','1974-10-01 19:45:52','1996-11-14 09:20:55'),
	(2,3,2,4,'2016-07-22 02:54:16','1989-02-07 20:00:22','2001-12-31 17:08:42'),
	(3,8,2,5,'1990-08-20 07:51:08','1983-11-25 15:38:08','2002-08-05 05:54:42'),
	(4,8,3,3,'1988-09-03 14:51:52','2006-04-20 01:00:09','2016-05-19 14:34:45'),
	(5,1,1,4,'2014-03-15 13:56:16','1970-01-14 16:33:52','1986-07-27 09:19:31'),
	(6,7,1,4,'1983-09-13 09:59:24','2016-01-30 17:41:33','2003-07-15 22:22:09'),
	(7,6,1,3,'1982-12-31 04:22:06','1996-09-03 19:16:11','2010-12-29 09:32:30'),
	(8,6,1,3,'1983-04-24 02:42:29','1989-01-04 10:43:50','2007-12-14 13:59:08'),
	(9,6,2,3,'2012-02-09 04:58:46','1990-05-30 20:36:25','1970-11-07 18:58:44'),
	(10,8,2,3,'1970-03-01 15:49:34','1975-02-23 07:34:27','2002-04-18 05:44:44');

/*!40000 ALTER TABLE `iis_interpret_iis_concert` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_stage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_stage`;

CREATE TABLE `iis_stage` (
  `iis_stageid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_festivalid` int(10) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_stageid`),
  KEY `iis_stage_iis_festivalid_foreign` (`iis_festivalid`),
  KEY `iis_stage_iis_stageid_index` (`iis_stageid`),
  CONSTRAINT `iis_stage_iis_festivalid_foreign` FOREIGN KEY (`iis_festivalid`) REFERENCES `iis_festival` (`iis_festivalid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_stage` WRITE;
/*!40000 ALTER TABLE `iis_stage` DISABLE KEYS */;

INSERT INTO `iis_stage` (`iis_stageid`, `iis_festivalid`, `name`, `created_at`, `updated_at`)
VALUES
	(1,2,'quasi','2009-04-21 23:45:30','1973-05-11 23:56:25'),
	(2,1,'saepe','1995-06-05 01:43:01','2005-10-29 04:00:56'),
	(3,1,'quam','2006-01-17 13:27:59','1992-11-15 17:38:14'),
	(4,2,'veritatis','1983-06-18 06:48:13','2011-09-22 21:07:21');

/*!40000 ALTER TABLE `iis_stage` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_stage_iis_interpret
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_stage_iis_interpret`;

CREATE TABLE `iis_stage_iis_interpret` (
  `iis_stage_iis_interpretid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_stageid` int(10) unsigned NOT NULL,
  `iis_interpretid` int(10) unsigned NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_stage_iis_interpretid`),
  KEY `iis_stage_iis_interpret_iis_stageid_foreign` (`iis_stageid`),
  KEY `iis_stage_iis_interpret_iis_interpretid_foreign` (`iis_interpretid`),
  KEY `iis_stage_iis_interpret_index` (`iis_stage_iis_interpretid`,`iis_stageid`,`iis_interpretid`),
  CONSTRAINT `iis_stage_iis_interpret_iis_interpretid_foreign` FOREIGN KEY (`iis_interpretid`) REFERENCES `iis_interpret` (`iis_interpretid`),
  CONSTRAINT `iis_stage_iis_interpret_iis_stageid_foreign` FOREIGN KEY (`iis_stageid`) REFERENCES `iis_stage` (`iis_stageid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_stage_iis_interpret` WRITE;
/*!40000 ALTER TABLE `iis_stage_iis_interpret` DISABLE KEYS */;

INSERT INTO `iis_stage_iis_interpret` (`iis_stage_iis_interpretid`, `iis_stageid`, `iis_interpretid`, `date`, `created_at`, `updated_at`)
VALUES
	(1,3,3,'2016-02-29 06:14:00','2009-08-25 18:21:39','2011-07-14 06:09:04'),
	(2,4,10,'1982-09-23 22:25:29','1984-07-06 05:40:28','1993-07-21 20:02:30'),
	(3,3,8,'2002-08-13 18:48:25','1988-02-15 22:25:29','1991-07-27 08:30:44'),
	(4,3,5,'2004-09-17 02:12:31','2001-12-01 08:27:58','1999-12-05 04:05:35'),
	(5,3,6,'1991-02-02 04:29:17','2002-04-03 23:44:53','1975-11-06 20:57:49'),
	(6,2,10,'2006-06-17 17:58:00','2008-11-16 01:31:57','2011-02-07 02:55:31'),
	(7,4,9,'2002-01-09 18:16:52','2006-10-20 11:51:36','1987-12-23 22:42:05'),
	(8,2,8,'2013-12-01 17:13:22','2009-04-25 00:50:10','2010-11-23 12:20:08'),
	(9,2,3,'2012-11-23 11:41:06','1978-11-28 18:31:44','2000-01-06 14:13:49'),
	(10,1,1,'1977-11-11 11:00:12','1970-04-15 13:17:35','2009-12-21 02:02:54');

/*!40000 ALTER TABLE `iis_stage_iis_interpret` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_ticket
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_ticket`;

CREATE TABLE `iis_ticket` (
  `iis_ticketid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_userid` int(10) unsigned NOT NULL,
  `iis_ticket_typeid` int(10) unsigned NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_ticketid`),
  KEY `iis_ticket_iis_userid_foreign` (`iis_userid`),
  KEY `iis_ticket_iis_ticket_typeid_foreign` (`iis_ticket_typeid`),
  KEY `iis_ticket_index` (`iis_ticketid`,`iis_userid`,`iis_ticket_typeid`),
  CONSTRAINT `iis_ticket_iis_ticket_typeid_foreign` FOREIGN KEY (`iis_ticket_typeid`) REFERENCES `iis_ticket_type` (`iis_ticket_typeid`),
  CONSTRAINT `iis_ticket_iis_userid_foreign` FOREIGN KEY (`iis_userid`) REFERENCES `iis_user` (`iis_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_ticket` WRITE;
/*!40000 ALTER TABLE `iis_ticket` DISABLE KEYS */;

INSERT INTO `iis_ticket` (`iis_ticketid`, `iis_userid`, `iis_ticket_typeid`, `code`, `created_at`, `updated_at`)
VALUES
	(1,3,9,'123895482LULNGGB04122017','1999-12-08 01:50:00','1999-12-24 09:05:38'),
	(2,4,2,'688542199RELMLPJ04122017','2001-06-30 22:24:23','2017-05-22 11:34:46'),
	(3,20,6,'833924471KHLWUSQ04122017','1985-06-20 05:26:32','1988-09-26 10:22:23'),
	(4,12,6,'246848137OIDEIPZ04122017','1975-05-06 06:11:52','2015-04-29 23:15:14'),
	(5,3,7,'676835688BXXOTPL04122017','2012-12-06 22:08:37','1975-10-27 17:56:55'),
	(6,14,9,'788762163TYZVWNN04122017','2004-06-14 19:34:04','1981-11-07 22:43:05'),
	(7,3,7,'499524197VWTDKEH04122017','2015-12-09 05:12:30','2016-02-03 01:20:42'),
	(8,14,3,'811667259YVSZRTA04122017','1974-07-20 03:33:36','2012-05-15 13:23:27'),
	(9,14,8,'617586353HTQXNST04122017','1975-01-13 17:26:38','1995-11-25 18:20:37'),
	(10,7,9,'558797748SWZMBAG04122017','1976-07-03 23:15:03','1972-05-27 17:33:02'),
	(11,15,3,'158738885QPOGVYX04122017','2004-12-21 20:30:43','2009-06-28 13:57:09'),
	(12,5,14,'519571328KXGCZLS04122017','2004-12-01 14:31:50','1994-10-25 04:23:06'),
	(13,14,12,'854199978YNFMZOP04122017','1978-01-21 06:50:56','2001-03-03 17:39:14'),
	(14,13,8,'642546429MTNTIZG04122017','1975-12-15 11:47:54','1979-12-08 05:38:53'),
	(15,3,5,'398859896AXIPSYG04122017','1985-04-14 15:22:32','2006-03-07 04:57:59'),
	(16,9,10,'828794114MHMFTQO04122017','1990-10-11 19:00:12','2014-09-10 06:30:08'),
	(17,16,4,'911874138NRMUKHO04122017','2006-03-03 08:40:56','1989-08-07 01:24:18'),
	(18,18,10,'761789574ZXTVNJQ04122017','1997-11-06 19:05:13','1982-12-30 08:58:21'),
	(19,20,7,'454135815IVLLKFF04122017','2014-03-14 15:36:19','1997-04-16 22:00:40'),
	(20,8,2,'216516593NSDQDGA04122017','1978-01-23 03:59:40','1991-04-25 17:42:31'),
	(21,12,15,'995861839VHADXKK04122017','1977-06-30 02:12:13','2012-07-21 17:50:22'),
	(22,9,1,'786232534FOEVZYD04122017','1999-06-25 21:52:27','2014-03-10 16:44:48'),
	(23,16,6,'115535276BDPQAZZ04122017','1984-02-26 09:04:12','1986-12-14 06:50:40'),
	(24,17,9,'735135511VDKCEMG04122017','2016-07-24 04:04:14','1982-02-02 09:52:57'),
	(25,11,1,'684663385PYQNXLM04122017','2012-11-13 08:14:05','1995-07-18 14:49:50'),
	(26,7,9,'447848391OOPFBMR04122017','1989-03-02 05:15:36','2004-01-06 18:18:30'),
	(27,14,8,'818482985DXWMRKE04122017','1970-10-12 19:09:20','1977-11-06 03:52:13'),
	(28,5,15,'445594969VTJTZYJ04122017','2006-01-31 12:54:19','1993-07-25 16:52:09'),
	(29,11,15,'287622415LYMWZIA04122017','1977-06-17 02:04:08','1987-08-18 12:41:46'),
	(30,1,13,'335415254FAGCRIN04122017','2001-06-04 04:51:03','1991-10-22 07:59:52'),
	(31,19,2,'443876426TOLGMSK04122017','1972-06-12 08:19:06','2010-10-04 15:55:11'),
	(32,6,1,'712731493ONYYPII04122017','1998-11-27 17:16:35','1972-10-07 18:59:32'),
	(33,7,6,'533166596ISLZNUS04122017','1982-08-26 09:54:07','1972-03-22 06:42:10'),
	(34,16,13,'122555743GCJOQNP04122017','1996-11-15 18:45:27','2002-03-06 01:22:02'),
	(35,2,1,'375855128MBMRGRE04122017','1990-05-03 18:57:42','2014-08-20 19:41:43'),
	(36,6,10,'167321526QHKCZRR04122017','1974-03-25 11:12:26','1985-10-11 17:17:05'),
	(37,1,9,'175787833CLYQJRB04122017','2002-03-06 02:32:58','2001-12-04 09:00:54'),
	(38,12,7,'416634128NWWMSBW04122017','1978-02-09 16:50:50','1980-05-03 00:32:22'),
	(39,17,9,'629435156EINWQKQ04122017','1972-01-02 10:14:57','1990-08-25 02:12:03'),
	(40,12,1,'198615284XKHLPDP04122017','2011-09-05 07:43:10','2014-04-24 06:00:15'),
	(41,17,6,'967297761PXXZUIN04122017','1990-08-30 07:15:03','1988-10-18 02:39:51'),
	(42,1,2,'262124966SSONEZU04122017','2017-05-16 04:38:15','1989-05-10 13:12:59'),
	(43,12,6,'561271932WBWASCF04122017','2006-08-21 17:38:32','2002-05-03 11:41:18'),
	(44,20,6,'559845665IYQZZOZ04122017','1983-10-19 12:05:45','1985-05-20 20:15:33'),
	(45,6,1,'341357559REKPGIL04122017','2010-09-12 08:14:35','1978-07-22 06:12:16'),
	(46,16,10,'855491517GWHGSFT04122017','1991-08-18 03:35:34','2011-08-08 21:23:29'),
	(47,9,11,'611766651OKCTQEE04122017','1999-06-24 08:10:02','1979-09-29 12:05:57'),
	(48,14,9,'216739864YFAYITY04122017','2004-06-12 02:24:56','2014-04-27 19:05:15'),
	(49,18,4,'519584934EJOSBNQ04122017','1996-07-04 19:27:05','1990-09-27 14:19:39'),
	(50,13,13,'175835811FFVCDGM04122017','2008-04-07 04:50:48','2015-04-25 18:35:02'),
	(51,7,3,'565586258ZAGSNXE04122017','2012-02-17 04:10:58','2015-12-16 00:11:05'),
	(52,21,11,'144595443SKVTMFA04122017','1974-12-30 15:42:51','1985-01-31 03:45:18'),
	(53,6,14,'836343726DACLCMH04122017','2000-08-28 06:45:25','1997-05-06 17:13:38'),
	(54,10,9,'317454912HJQZQPE04122017','1993-06-14 01:09:21','2012-11-24 12:55:18'),
	(55,13,10,'527432871EXZMNUB04122017','2000-12-20 23:58:52','1985-05-02 07:21:33'),
	(56,2,8,'324697231GZOWVAW04122017','1978-12-20 00:23:17','2002-10-15 22:52:00'),
	(57,8,1,'592223867DRZZROL04122017','2003-08-31 02:55:33','1988-05-13 22:45:41'),
	(58,1,1,'258411143BILDDLJ04122017','2002-07-05 22:30:51','2007-10-05 12:23:33'),
	(59,8,12,'229252612QMTOHUH04122017','1981-10-19 08:27:16','2012-09-08 15:23:21'),
	(60,17,10,'324463685SZOKTQF04122017','1984-02-02 14:28:07','1975-01-30 22:15:55'),
	(61,10,9,'862676416TKAWGET04122017','2013-07-02 03:24:22','1995-06-07 04:33:55'),
	(62,4,6,'421743667YJNXGHC04122017','2010-10-16 01:50:43','1986-11-14 14:24:59'),
	(63,3,9,'827959496VUOEJGG04122017','2000-10-01 22:09:28','1976-06-15 13:04:57'),
	(64,16,11,'654239397ZFIIORK04122017','1982-07-21 18:54:47','2005-11-23 05:13:56'),
	(65,13,9,'938679644VMPNBGU04122017','2011-05-13 17:28:03','1987-10-20 07:08:21'),
	(66,3,13,'819582387VHZNKLH04122017','2000-12-01 06:04:50','2007-03-23 21:58:35'),
	(67,3,10,'226782195RVHXCTC04122017','2003-09-16 22:04:20','1977-03-21 08:47:30'),
	(68,20,15,'134726674YGKCIWF04122017','2003-03-18 00:15:20','2017-03-29 02:41:42'),
	(69,12,10,'547928876QMGGNOT04122017','2013-01-22 16:48:56','1990-08-24 05:59:53'),
	(70,9,7,'195816485LJLSJZX04122017','2008-01-30 00:43:48','2014-10-25 08:50:48'),
	(71,21,5,'584197479FTYJAFF04122017','2008-01-24 21:57:50','1983-11-14 13:56:00'),
	(72,8,7,'937481172IXATJQV04122017','2016-06-02 12:29:59','1970-12-27 12:05:12'),
	(73,2,8,'868568948SCVGEOV04122017','2013-02-20 22:46:41','1988-01-08 23:16:51'),
	(74,2,7,'686145545RCKCMNY04122017','2004-09-09 09:59:06','1989-10-11 19:57:38'),
	(75,21,14,'272274813PRMVVIX04122017','2012-02-13 01:14:06','1985-07-06 22:40:24'),
	(76,10,4,'829195952MAHZJBT04122017','1995-06-29 19:20:44','1986-09-21 12:31:30'),
	(77,8,14,'756615228GOETCTW04122017','2012-07-20 18:51:30','1991-07-18 08:56:44'),
	(78,15,11,'763281497AZRDHNK04122017','2000-11-30 11:08:43','1994-01-18 15:10:58'),
	(79,17,4,'888169979VEGMQMN04122017','1976-03-08 13:18:37','1993-03-05 05:45:13'),
	(80,21,6,'565649391WVYSRQV04122017','1989-01-31 08:24:44','1992-09-10 02:07:59'),
	(81,1,5,'722588816XDDJUAA04122017','1975-08-27 00:41:19','1976-12-27 15:07:53'),
	(82,18,9,'856634431DHYQKWR04122017','2004-02-22 03:50:49','1994-03-01 02:43:36'),
	(83,10,13,'437374747BJUCZVZ04122017','1978-05-14 20:10:19','1997-03-11 07:24:11'),
	(84,12,3,'766748896ZAJQLQT04122017','2005-11-03 16:40:58','1994-12-01 21:45:45'),
	(85,7,5,'677353815IKSUWSS04122017','1998-09-04 17:52:31','2010-02-05 22:50:33'),
	(86,21,15,'358481228UAIKOYQ04122017','1985-01-11 10:26:04','1986-12-18 13:36:48'),
	(87,10,7,'582368932DNMDCOJ04122017','2012-05-13 01:06:02','2013-02-07 17:55:10'),
	(88,11,6,'711478294RPSFPYD04122017','2009-04-08 08:29:24','1970-08-19 08:49:09'),
	(89,14,14,'485829757FRZSCRW04122017','2006-04-22 10:53:14','2012-06-01 16:54:48'),
	(90,13,7,'778537753GBZOCNR04122017','1994-12-22 02:57:59','2007-12-02 16:14:27'),
	(91,14,13,'645826953YOQLHDI04122017','1993-11-23 13:36:59','2001-11-21 05:25:06'),
	(92,18,2,'763111583NJLSIVB04122017','2003-08-08 00:45:15','1994-09-27 19:11:25'),
	(93,16,9,'558235187YRWOKYP04122017','1990-03-18 09:41:56','2006-03-08 14:09:35'),
	(94,4,4,'863127618KLCLHQG04122017','2014-05-23 00:06:32','2007-10-11 19:04:31'),
	(95,12,3,'394671881NLOLJDD04122017','1975-06-03 13:48:52','1981-03-24 08:40:15'),
	(96,3,10,'949384117VNIXQKB04122017','1971-08-03 19:34:22','1987-03-06 01:07:42'),
	(97,5,11,'615381693TXYKZUS04122017','1976-11-04 06:41:30','1976-09-08 19:15:23'),
	(98,19,6,'363293559TIPZHHL04122017','1995-10-23 04:10:32','2017-06-13 14:30:18'),
	(99,3,10,'637631559EQGCHYV04122017','1975-11-13 09:34:47','1998-05-21 11:06:09'),
	(100,5,15,'959619248KFCPLUW04122017','1994-02-05 14:32:46','1995-07-22 21:07:31');

/*!40000 ALTER TABLE `iis_ticket` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_ticket_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_ticket_type`;

CREATE TABLE `iis_ticket_type` (
  `iis_ticket_typeid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_eventid` int(10) unsigned NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_ticket_typeid`),
  UNIQUE KEY `iis_ticket_type_unique` (`iis_eventid`,`type`),
  KEY `iis_ticket_type_index` (`iis_ticket_typeid`,`iis_eventid`),
  CONSTRAINT `iis_ticket_type_iis_eventid_foreign` FOREIGN KEY (`iis_eventid`) REFERENCES `iis_event` (`iis_eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_ticket_type` WRITE;
/*!40000 ALTER TABLE `iis_ticket_type` DISABLE KEYS */;

INSERT INTO `iis_ticket_type` (`iis_ticket_typeid`, `iis_eventid`, `type`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,'adult',829,'2006-12-08 15:31:45','1984-08-24 05:39:52'),
	(2,1,'student',682,'1983-02-27 01:07:54','2015-09-08 15:41:00'),
	(3,1,'child',723,'2014-06-05 12:37:10','2007-05-26 23:15:36'),
	(4,2,'adult',126,'1975-09-08 10:45:03','1982-10-13 13:30:26'),
	(5,2,'student',275,'1992-04-30 21:19:24','1971-03-04 08:24:28'),
	(6,2,'child',536,'1986-04-15 20:56:43','1980-04-12 18:47:01'),
	(7,3,'adult',189,'1984-01-25 02:03:10','2000-01-31 07:04:25'),
	(8,3,'student',493,'1986-02-10 06:51:02','1978-10-23 22:42:41'),
	(9,3,'child',667,'2001-07-15 05:18:06','1982-07-21 16:56:25'),
	(10,4,'adult',859,'2005-02-27 00:01:27','1985-03-05 20:59:26'),
	(11,4,'student',839,'1989-03-31 18:08:14','2009-07-22 18:34:14'),
	(12,4,'child',187,'2014-04-19 08:18:51','1996-08-25 05:45:14'),
	(13,5,'adult',252,'2004-08-31 06:45:16','1990-12-01 05:40:52'),
	(14,5,'student',346,'1977-07-31 12:47:23','1996-03-21 23:56:41'),
	(15,5,'child',366,'2012-12-16 15:53:41','2014-08-07 16:47:56');

/*!40000 ALTER TABLE `iis_ticket_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_user`;

CREATE TABLE `iis_user` (
  `iis_userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_userid`),
  UNIQUE KEY `iis_user_email_unique` (`email`),
  KEY `iis_user_iis_userid_index` (`iis_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_user` WRITE;
/*!40000 ALTER TABLE `iis_user` DISABLE KEYS */;

INSERT INTO `iis_user` (`iis_userid`, `name`, `email`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@admin.com','$2y$10$aUScC/NlKxcsY33UEirMnOggvG6eHECsHdkjPN6ipK0p0bdNCov0y',401382062,'admin',NULL,'2017-12-04 21:13:06','2017-12-04 21:13:06'),
	(2,'Organiser','organiser@organiser.com','$2y$10$Q9Fm1AcJTkuXzo6O7CaUDuAMwW78TuHUR7ZIF.JJFVhxIa41JIUWa',198620640,'organiser',NULL,'2017-12-04 21:13:06','2017-12-04 21:13:06'),
	(3,'User','user@user.com','$2y$10$tCt5aLU9IrPE2LmHUfhbNeSmez.t5VVUQIMBhrmC2qkl1IYfv0jSm',71844584,'user',NULL,'2017-12-04 21:13:06','2017-12-04 21:13:06'),
	(4,'Clementina West Jr.','werner.muller@labadie.biz','$2y$10$4C3jUm.PfWVMQqcajPxtoukGCUJVKicK.OjXAuFxkahuz5R.vCh3a',220410216,'user',NULL,'1981-06-18 16:45:19','1985-07-25 05:27:16'),
	(5,'Caesar Wintheiser','williamson.coty@hotmail.com','$2y$10$.WTc//fTCaJs/Hj7c2UGGuL89ktcH/6AV3o0Eb.LgceenT9vknqHy',672953163,'user',NULL,'2012-09-22 17:05:59','2014-09-05 21:32:55'),
	(6,'Julian Douglas','king.cole@tromp.org','$2y$10$QE9DpvvYCJDkM8ApzPtTiOVvqlCH.mepSvXrr3syEzB30InEHt4PS',451804028,'user',NULL,'1990-08-16 08:53:55','2017-07-01 17:19:05'),
	(7,'Leonard Johnston','dallin.rempel@yahoo.com','$2y$10$mGMgo1d0N6g0YEC8Vd8aOOpGRtalt6hXk9XlAP7fF/UGqbtiI5EOm',786848754,'user',NULL,'1971-11-13 21:59:36','2013-11-19 04:54:54'),
	(8,'Fidel Bernhard','libbie34@gmail.com','$2y$10$5QjonxHNpfKiC8y4LcJ6G.wxBaKeTnySf1ok3CplKr2OhNC6qAu56',257851447,'user',NULL,'2015-03-19 03:45:57','1975-02-18 11:11:30'),
	(9,'Erica Weber','dariana.gleason@hotmail.com','$2y$10$CiZo3yxCVDlSWSI6HUpr1eBkQhVQKXAPhZm.zmnw5Bh7tlK2wvyhq',856049233,'user',NULL,'2014-04-04 04:11:31','1993-09-07 00:28:08'),
	(10,'Lupe Morissette','dpredovic@yahoo.com','$2y$10$kgNJuoUVBW81XsigUH9G0u0jVVUX0xmiqTYcvATqnDAKDkkXA55lu',652671695,'user',NULL,'1990-02-02 23:37:42','2002-11-03 22:40:28'),
	(11,'Dr. Anya Franecki','ukemmer@erdman.biz','$2y$10$r4RGLn0cLb7camRwOiokhOKbUSfWrVnzx9SJ1YRVoLgsWLGqoR6Pi',874791570,'user',NULL,'1982-11-13 04:43:03','1975-06-30 03:58:34'),
	(12,'Mark Baumbach','rosie62@gmail.com','$2y$10$qAKjvJgW68W80xEYpGbAk.qMQHdS6sE8M8IRudQSSEJS8h69O1NTq',383728775,'user',NULL,'1979-02-23 10:26:07','1973-12-13 19:47:02'),
	(13,'Rodrick Kohler','ashlynn.bergnaum@hotmail.com','$2y$10$GSIN4fB2stvsaLglfmetcuLRjRSJBsWeO98rn.xHVV2fDQdtXqClO',357569152,'user',NULL,'1990-12-29 03:27:14','1989-06-15 01:12:18'),
	(14,'Talon Mraz','jayme.hills@erdman.com','$2y$10$ov.rVU5PpwgffhtEzUVc1uCAALqCsse.B8qCfTrQJ2HZDY.7DjEZa',102708620,'organiser',NULL,'1993-06-05 06:38:10','1983-12-03 04:05:44'),
	(15,'Zander Mosciski','verlie.kihn@yahoo.com','$2y$10$vBK33Fxif4kaqdug//BY8e97uGx2yYC.DtEPDsG7UYYtOrqIrEx3a',820715897,'organiser',NULL,'1975-04-07 15:53:00','2014-04-26 03:05:23'),
	(16,'Janie Wisoky','barrows.kurt@hessel.com','$2y$10$kXzxdyS60yfF/JDFlhX4aup.ebSQmv.adoxAkfprbaI/QMzv62yiu',780798651,'organiser',NULL,'1978-07-23 03:56:06','2002-07-07 05:36:23'),
	(17,'Ulises Harvey II','hegmann.earnestine@stehr.com','$2y$10$SP0MdtFmxjq5zeWFgOuNguxM9K6FgcycMjGXXFqBE05fIB/SEoMeW',705632666,'organiser',NULL,'2012-10-23 21:53:14','2000-01-08 08:20:54'),
	(18,'Henry Little','elmore13@jaskolski.com','$2y$10$0PpRClWudlmfReR6JXhNv./sKX5MTy3I5NLI.mk7dkWHzftAP/i.2',156893041,'organiser',NULL,'1975-05-18 19:55:41','1972-06-27 05:05:08'),
	(19,'Mr. Aron Hudson','aiyana29@jacobs.net','$2y$10$T2Fvy2HCjzSr.5UUIG4GM.fztTdpHm4ruxtRWPECLns.c5Js1Y0sG',496383863,'organiser',NULL,'2007-11-28 14:02:48','2013-06-27 17:22:27'),
	(20,'Miss Maye Rogahn MD','dawson.boyer@hotmail.com','$2y$10$jCtArcsITE0RKqi8INxNhuEPF5FfG1LqzDpsybmuoA7ojKT2FlmdK',218500590,'organiser',NULL,'1999-09-21 01:41:23','2016-08-09 18:15:45'),
	(21,'Ike Halvorson','camryn72@hotmail.com','$2y$10$dnO.0ZQGvYNpIIw/NRfvsOUL1RE7bKTsgQH3pjE3qNFUXPSqHx4YK',293622781,'organiser',NULL,'1975-05-01 04:48:36','1976-05-13 15:46:42'),
	(22,'Dr. Addison Monahan','blanche08@hotmail.com','$2y$10$Pr0Zlbt7pcvRwssH4x9Km.OlsJgNICnsWXiULkuHFJB6M9MFB9cr6',402812230,'organiser',NULL,'1973-06-06 14:31:56','1997-04-17 21:48:57'),
	(23,'Macy Parisian V','devan.graham@tillman.com','$2y$10$XQjk0iK.vRr7ydZ5A6aizO5UMkxj/jvqXddd/D1Zwb9DeV/GUBy6C',572038027,'organiser',NULL,'2006-01-02 14:46:23','2013-01-28 22:32:13');

/*!40000 ALTER TABLE `iis_user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_user_iis_interpret
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_user_iis_interpret`;

CREATE TABLE `iis_user_iis_interpret` (
  `iis_user_iis_interpretid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_userid` int(10) unsigned NOT NULL,
  `iis_interpretid` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_user_iis_interpretid`),
  KEY `iis_user_iis_interpret_iis_userid_foreign` (`iis_userid`),
  KEY `iis_user_iis_interpret_iis_interpretid_foreign` (`iis_interpretid`),
  KEY `iis_user_iis_interpret_index` (`iis_user_iis_interpretid`,`iis_interpretid`,`iis_userid`),
  CONSTRAINT `iis_user_iis_interpret_iis_interpretid_foreign` FOREIGN KEY (`iis_interpretid`) REFERENCES `iis_interpret` (`iis_interpretid`),
  CONSTRAINT `iis_user_iis_interpret_iis_userid_foreign` FOREIGN KEY (`iis_userid`) REFERENCES `iis_user` (`iis_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_user_iis_interpret` WRITE;
/*!40000 ALTER TABLE `iis_user_iis_interpret` DISABLE KEYS */;

INSERT INTO `iis_user_iis_interpret` (`iis_user_iis_interpretid`, `iis_userid`, `iis_interpretid`, `created_at`, `updated_at`)
VALUES
	(1,19,6,'2004-02-04 23:05:23','1977-09-29 17:47:57'),
	(2,2,4,'2000-04-27 07:07:21','2007-02-26 05:02:31'),
	(3,8,9,'1974-11-20 01:15:51','1973-07-07 22:11:16'),
	(4,6,7,'1986-03-11 09:47:12','1990-09-12 15:04:11'),
	(5,16,5,'1989-02-22 04:52:08','1981-02-05 20:29:30'),
	(6,21,6,'1983-03-19 11:33:24','1986-12-22 19:03:30'),
	(7,5,6,'2002-05-20 02:58:59','2000-01-22 20:39:59'),
	(8,17,6,'2016-11-17 17:50:10','1971-06-06 03:47:43'),
	(9,6,7,'2013-06-06 05:32:45','2013-03-27 00:09:31'),
	(10,20,8,'1988-11-16 20:11:37','1993-06-14 23:04:21'),
	(11,18,8,'1973-08-19 19:27:13','1982-05-12 00:24:18'),
	(12,7,3,'1979-12-26 06:17:47','2005-04-13 14:59:45'),
	(13,19,4,'2007-06-18 10:26:34','2010-04-26 23:49:45'),
	(14,10,6,'1970-07-05 19:57:45','2010-10-31 06:41:37'),
	(15,1,9,'2016-04-28 11:43:00','1993-07-18 05:47:10'),
	(16,21,9,'1975-11-21 19:11:59','1970-02-21 00:33:27'),
	(17,8,7,'1971-06-21 23:49:40','1974-12-24 07:03:18'),
	(18,17,2,'1990-12-31 02:41:07','1980-12-31 14:21:37'),
	(19,20,10,'1996-01-10 22:55:25','1996-03-15 17:28:33'),
	(20,20,2,'1985-04-04 03:25:03','1987-03-30 09:51:15'),
	(21,2,10,'1979-11-27 12:47:05','2010-05-22 08:12:25'),
	(22,7,7,'1985-03-07 14:02:21','1982-07-14 00:15:38'),
	(23,16,10,'1991-12-03 21:31:38','1973-03-13 17:11:54'),
	(24,12,2,'1982-08-26 20:55:28','2015-11-08 07:09:03'),
	(25,13,3,'2001-10-29 14:36:13','1986-01-09 10:29:26'),
	(26,12,1,'1972-12-20 02:52:51','2003-02-11 20:13:13'),
	(27,9,9,'1996-04-28 08:00:40','1979-05-24 07:26:24'),
	(28,2,2,'1990-04-28 23:38:29','1992-01-05 16:41:29'),
	(29,18,9,'1990-09-13 11:47:14','2000-06-25 02:25:54'),
	(30,9,9,'2016-08-08 01:59:03','2009-01-27 07:49:11'),
	(31,4,2,'1984-07-31 11:16:05','1983-11-25 00:21:48'),
	(32,5,2,'1971-11-11 01:41:05','2009-01-12 04:51:14'),
	(33,3,5,'2010-08-27 10:28:56','1980-02-08 18:31:24'),
	(34,12,1,'1992-05-06 12:45:36','2012-05-04 06:52:45'),
	(35,10,5,'1979-03-20 22:14:17','2013-11-27 15:37:04'),
	(36,6,10,'1994-07-06 11:10:36','2007-04-19 05:50:29'),
	(37,11,4,'1995-10-03 14:45:52','1994-09-25 16:25:15'),
	(38,21,1,'2013-05-17 00:59:21','1997-09-28 19:18:12'),
	(39,8,9,'2001-12-02 01:05:08','2007-08-28 19:38:31'),
	(40,5,8,'1994-03-03 13:56:05','2017-03-05 14:02:52'),
	(41,17,6,'2001-07-27 16:14:15','1988-05-02 05:03:56'),
	(42,20,5,'1987-01-31 02:08:46','1973-07-30 23:17:31'),
	(43,8,9,'2003-01-05 06:26:42','1982-08-21 11:12:20'),
	(44,11,8,'1985-11-25 17:05:08','1994-08-02 19:42:34'),
	(45,6,3,'2001-08-11 04:11:44','2010-02-19 01:48:05'),
	(46,18,9,'2011-07-07 17:23:17','2013-08-08 10:38:08'),
	(47,9,2,'1987-11-19 02:18:10','2002-10-27 08:41:08'),
	(48,9,10,'1989-08-01 19:01:14','1995-11-23 22:00:14'),
	(49,1,3,'1995-04-25 19:43:22','1988-12-15 06:25:43'),
	(50,11,4,'1994-05-11 07:31:46','1984-10-11 18:26:35'),
	(51,1,9,'1992-02-27 14:16:03','1974-02-14 04:35:07'),
	(52,21,5,'2011-04-01 21:50:47','1978-08-07 03:22:50'),
	(53,13,4,'1971-02-17 20:15:37','1971-11-14 10:12:45'),
	(54,15,3,'1972-03-03 00:14:37','1999-08-06 05:22:26'),
	(55,3,8,'2013-10-06 09:54:24','1978-05-08 11:55:14'),
	(56,6,2,'1988-03-08 00:58:14','1973-01-23 08:45:41'),
	(57,21,8,'1976-02-08 18:53:47','1988-02-27 14:19:59'),
	(58,6,2,'2012-10-18 03:05:37','1979-08-11 06:48:17'),
	(59,20,7,'1980-10-25 01:14:59','1999-12-06 19:30:08'),
	(60,18,3,'1987-02-01 16:56:27','1977-09-24 07:03:17');

/*!40000 ALTER TABLE `iis_user_iis_interpret` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES
	(73,'2014_10_12_100000_create_password_resets_table',1),
	(74,'2017_10_01_101301_create_iis_event_table',1),
	(75,'2017_10_02_101344_create_iis_festival_table',1),
	(76,'2017_10_03_1013135_create_iis_concert_table',1),
	(77,'2017_10_04_101505_create_iis_interpret_table',1),
	(78,'2017_10_05_101532_create_iis_stage_table',1),
	(79,'2017_10_06_101516_create_iis_stage_iis_interpret_table',1),
	(80,'2017_10_07_101617_create_iis_user_table',1),
	(81,'2017_10_08_102142_create_iis_interpret_iis_concert_table',1),
	(82,'2017_10_09_101611_create_iis_user_iis_interpret_table',1),
	(83,'2017_10_10_101600_create_iis_ticket_type_table',1),
	(84,'2017_10_11_101539_create_iis_ticket_table',1);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
