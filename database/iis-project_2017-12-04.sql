# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.5-10.2.9-MariaDB)
# Database: iis-project
# Generation Time: 2017-12-04 19:05:46 +0000
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
	(1,1,36448,'1990-08-09 14:26:27','2017-04-24 17:33:11','1975-07-30 04:20:22'),
	(2,2,34964,'1975-01-13 20:00:23','2011-12-26 01:31:27','2008-11-06 20:27:18'),
	(3,3,27013,'1991-05-16 15:32:03','2015-11-29 21:11:41','1987-03-19 09:18:06');

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
	(1,'KABÁT Turné 2017','Brno','https://lorempixel.com/1280/720/?76477','Kapela Kabát vyráží po čtyřech letech v průběhu měsíců říjen a listopad roku 2017 na halové Turné. Navštíví celkem neuvěřitelných devatenáct měst vč. dvou koncertů na Slovensku. Tam by konkrétně měla být show k vidění ve Steel Aréně v Košicích a pro Kabát','2004-10-10 21:02:29','1989-11-22 06:58:10'),
	(2,'Koncert Kali a Peter Pann','Brooklyn Music Club','https://lorempixel.com/1280/720/?83770','KALI & PETER PANN se vracejí do Brooklynu se svojí Dezert Tour!','1976-01-21 23:36:56','2014-01-29 22:05:24'),
	(3,'Není nám do pláče tour 2017','Praha O2 Aréna','https://lorempixel.com/1280/720/?67057','Jedna z nejúspěšnějších českých skupin Chinaski vydala 5. 5. 2017 desáté studiové album Není nám do pláče. Nahrávku, která vzniká v několika studiích na různých místech světa, předznamenal singl Není nám do pláče.','1990-05-21 11:50:12','1977-03-04 13:14:17'),
	(4,'Colours Of Ostrava','Dolní Vítkovice','https://lorempixel.com/1280/720/?39294','Colours of Ostrava je multižánrový hudební festival každoročně pořádaný od roku 2002 v Ostravě. První ročník festivalu v roce 2002 se konal v centru Ostravy v oblasti Stodolní ulice, na výstavišti Černá louka a v klubu Boomerang','2015-09-11 11:07:33','1987-06-29 21:16:12'),
	(5,'Tomorrowland','Boom, Belgie','https://lorempixel.com/1280/720/?46660','Tomorrowland je velký elektronický hudební festival v Belgii. Festival se koná ve městě Boom, 16 kilometrů jižně od Antverp a 32 kilometrů severně od Bruselu a je pořádán od roku 2005','1970-01-17 16:13:07','1971-10-18 05:34:38');

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
	(1,4,'roční',7,'2018-07-20 11:52:57','2018-07-30 16:50:22','1980-05-15 05:30:58','2016-01-02 22:17:50'),
	(2,5,'roční',9,'1996-04-22 09:55:17','1999-09-07 14:13:57','1970-08-15 15:15:59','2000-09-04 08:07:45');

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
	(1,'David Guetta','David Guetta','DJ','Virgin','https://lorempixel.com/1280/720/?35872','David Guetta (* 7. listopadu 1967, Paříž, Francie) je francouzský house DJ.Ve 13 letech začal mixovat své první vinyly. V 17 se stal rezidentním DJem pařížského klubu Broad, což odstartovalo jeho kariéru. Během let 1988–1990 mixoval housovou muziku na r','1984-03-31 11:11:00','1995-09-26 15:50:13','2017-12-04 18:43:47'),
	(2,'Kali','Kali, Peter Pann','Rap','Kali Records','https://lorempixel.com/1280/720/?32899','Koloman Magyary (* 29. december 1982), známy pod umeleckým menom Kali, je slovenský raper pochádzajúci z Petržalky, ktorý na hip-hopovej scéne pôsobí od roku 2008. Jeho debutový album, Pod maskou je pravda vydal v roku 2010. Ďalší album, Načo čakať, vyšie','2008-12-04 19:38:10','2004-05-23 17:05:54','1973-07-10 10:12:31'),
	(3,'Eminem','Eminem','Rap','Interscope, Aftermath, Shady','https://lorempixel.com/1280/720/?86460','Marshall Bruce Mathers III (* 17. říjen 1972, Saint Joseph, Missouri, Spojené státy americké), spíše známý jako Eminem, je americký rapper, hudební producent, herec a zakladatel nahrávací společnosti Shady Records. Také je členem detroitské skupiny D12. J','1992-12-04 19:38:53','2016-04-07 21:12:47','2014-09-20 14:16:15'),
	(4,'Kabát','Josef Vojtek, Tomáš Krulich, Ota Váńa, Milan Špalek, Radek Hurčík','Rock','Pink Panther Media','https://lorempixel.com/1280/720/?41728','Kabát je česká rocková skupina z Teplic existující od roku 1983 a na hudební scéně aktivně působící od roku 1989. Za svou více než 25letou kariéru skupina vydala 11 studiových alb, kterých se prodalo přes 1 000 000 kopií, reprezentovala Česko na soutěži E','2017-12-04 19:42:25','2000-10-04 13:54:14','1987-06-04 23:46:38'),
	(5,'Chinaski','Michal Malátný, František Táborský','Pop, Rock, Punk','KaB Music','https://lorempixel.com/1280/720/?54970','Chinaski je česká pop rocková skupina, která v letech 2005 a 2007 vyhrála cenu Anděl, udělovanou Akademií populární hudby','2017-12-04 19:53:59','1984-03-09 07:42:51','1998-04-11 23:40:41'),
	(6,'Animi dolor doloribus.','Quia eum aperiam delectus.','punk','porro','https://lorempixel.com/1280/720/?90204','Dolores quod perferendis officia sequi sit aut provident fugit. Dolorum voluptatibus voluptatem fugit labore non quae.','1989-01-03 06:51:24','2017-06-25 19:23:04','2000-08-04 12:45:50'),
	(7,'Vel alias tempore.','Aliquid placeat veniam.','rap','nobis','https://lorempixel.com/1280/720/?78184','Quas maxime eveniet delectus saepe aut. Velit eum quia voluptatem. Eveniet eius unde vero.','1996-03-20 21:51:31','1977-08-14 15:44:10','2017-11-10 05:13:40'),
	(8,'Sed ut.','Velit voluptatem.','rap','saepe','https://lorempixel.com/1280/720/?75529','In aut est et consequuntur rerum fuga labore. Rerum aut mollitia in aut aut adipisci. Quis beatae sed exercitationem tempora.','1983-08-06 09:10:56','1986-02-09 03:16:16','2008-09-08 21:10:04'),
	(9,'Et sed id voluptas.','Ut minima.','punk','doloremque','https://lorempixel.com/1280/720/?21680','Aut veritatis et consequatur deserunt hic nesciunt alias incidunt. Quia veniam accusamus eos accusantium. Autem consequatur quia dolores dolores.','1984-02-26 03:45:48','1976-11-14 04:35:35','1986-12-14 06:33:48'),
	(10,'Aut ipsa minus.','Quae facilis pariatur veritatis.','metal','voluptatem','https://lorempixel.com/1280/720/?17610','Exercitationem velit et eius voluptas quia facere perferendis. Vel incidunt quis qui ut et ipsum ipsa. Non ad aut dolor est.','1998-08-04 03:02:49','2005-08-29 18:10:22','1994-08-26 21:36:01');

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
	(1,2,2,5,'2017-12-04 20:01:02','2017-06-17 03:22:51','1991-10-03 09:49:06'),
	(2,4,1,2,'2017-12-04 20:01:35','2015-01-22 10:29:55','2005-04-25 22:35:55'),
	(3,5,3,4,'2017-12-04 20:01:39','2002-08-04 06:13:53','1993-02-06 05:36:34'),
	(4,2,2,3,'1973-01-02 12:29:15','1980-10-31 16:22:30','2008-12-22 08:31:11'),
	(5,3,1,2,'2017-12-04 20:03:12','2003-10-07 17:20:29','1981-05-19 00:07:38'),
	(6,2,2,2,'1990-07-11 03:57:35','1980-05-19 21:42:32','1974-05-19 06:09:26'),
	(7,2,3,4,'2016-12-27 11:54:26','2014-06-20 05:47:04','2015-03-27 16:45:25'),
	(8,5,3,1,'2010-07-28 04:38:25','2008-08-29 11:37:17','1974-06-07 12:43:27'),
	(9,7,2,2,'1992-10-30 20:23:40','1978-10-26 12:53:21','1989-01-14 14:50:03'),
	(10,3,3,5,'2000-12-11 05:31:10','2007-12-19 14:22:51','1992-04-16 06:21:30');

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
	(1,1,'consequatur','2005-12-09 21:42:10','1970-09-08 01:33:57'),
	(2,1,'iste','2006-04-27 11:36:34','1989-05-12 12:47:05'),
	(3,1,'vel','1971-03-17 01:45:06','1971-11-13 01:46:59'),
	(4,1,'ut','2007-12-29 16:18:53','1981-11-18 02:48:22');

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
	(1,2,1,'2017-12-04 20:03:36','2016-05-03 09:14:05','1971-04-26 15:17:55'),
	(2,2,2,'2017-12-04 20:03:37','2004-10-10 07:43:52','1979-05-08 16:24:06'),
	(3,2,3,'2017-12-04 20:03:37','2014-04-03 05:27:17','2016-04-25 15:58:42'),
	(4,2,4,'2017-12-04 20:03:38','1989-05-25 10:28:17','1985-08-26 10:35:36'),
	(5,2,5,'2017-12-04 20:03:39','2011-06-05 01:32:02','1996-07-03 16:48:34'),
	(6,3,6,'2017-12-04 20:03:40','1976-02-21 14:22:51','2002-06-25 18:35:17'),
	(7,2,6,'2011-09-12 01:15:56','1987-06-14 08:32:29','1993-07-02 11:01:05'),
	(8,1,4,'2008-03-06 13:30:44','1985-12-18 22:52:58','1996-04-02 21:00:19'),
	(9,4,5,'1972-10-20 06:14:32','1978-04-02 19:45:17','1979-08-15 14:08:10'),
	(10,2,9,'1984-06-26 10:57:53','2016-04-22 02:56:48','1994-08-17 23:28:32');

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
	(1,11,4,'738442764KOCASKR04122017','1976-02-21 15:09:40','2008-01-12 08:14:02'),
	(2,19,2,'682827611YJVVLAN04122017','1997-04-20 03:22:19','2004-03-24 21:04:12'),
	(3,16,12,'439383747PVGDVHO04122017','2017-07-11 01:10:32','1978-04-29 12:17:49'),
	(4,13,13,'899963796UGWCPJC04122017','2014-04-07 11:07:49','2007-02-21 06:03:02'),
	(5,17,14,'972339412TCPRPXK04122017','2006-11-01 20:30:05','2010-02-28 09:30:55'),
	(6,21,9,'272214242LEAGYYV04122017','2011-05-18 06:53:11','2008-04-11 19:26:53'),
	(7,2,9,'416285272IRBFRCS04122017','2002-06-15 21:35:27','1986-08-04 11:27:39'),
	(8,2,11,'452948172HLZIOGQ04122017','2013-06-18 23:36:35','1979-09-21 08:03:55'),
	(9,15,9,'123231451SVZAKPG04122017','1992-07-22 23:11:57','1976-12-04 14:54:26'),
	(10,16,9,'875125644AWBQFLJ04122017','1991-03-24 15:25:20','2015-10-01 05:39:16'),
	(11,14,9,'251396489MKSABQT04122017','2002-08-17 14:36:04','1981-09-11 11:04:14'),
	(12,12,2,'397518732SQPIIYZ04122017','1981-06-05 02:49:35','1986-01-30 22:55:45'),
	(13,4,2,'767855356DFBTLYK04122017','2014-10-26 00:49:41','1981-07-12 00:55:27'),
	(14,11,13,'829235354EUEPJFB04122017','1996-01-21 23:04:35','1972-06-28 01:22:25'),
	(15,13,13,'892822562ZEOHTNC04122017','2005-07-26 18:40:20','1989-10-05 02:26:22'),
	(16,12,4,'444521395LXNIDNO04122017','1970-05-20 20:42:17','2006-11-17 22:29:49'),
	(17,19,10,'739321333DAKHHYX04122017','2002-11-11 21:17:26','2007-09-19 13:30:26'),
	(18,2,10,'858247429RGWDGBW04122017','1979-12-13 22:59:38','2000-08-27 01:16:58'),
	(19,16,11,'576711162KMWOZKF04122017','1982-05-28 23:11:06','1973-08-07 11:43:26'),
	(20,6,12,'192664696VZLWCYG04122017','2011-11-01 20:43:09','1973-08-15 07:16:52'),
	(21,8,3,'638914827JLYLSKJ04122017','1998-10-17 19:09:26','2017-09-30 03:37:53'),
	(22,3,5,'669526287IUEZMKS04122017','1993-11-26 21:53:15','1992-04-28 19:19:31'),
	(23,2,8,'283392458QNGSWDO04122017','1974-08-04 16:58:13','2008-01-25 18:36:22'),
	(24,19,13,'817479371XQWDOBJ04122017','2013-05-07 02:11:22','1992-09-22 09:02:28'),
	(25,20,4,'762428479EANFLNC04122017','1988-05-30 01:40:46','1983-11-14 09:10:00'),
	(26,14,6,'187796136ZWKVMSB04122017','2012-09-16 04:09:50','1971-01-06 10:52:08'),
	(27,18,3,'372162819XRQFZFL04122017','1982-12-20 13:15:13','1987-03-04 02:06:52'),
	(28,2,8,'837813145ESNMGSH04122017','1973-09-12 12:39:09','1973-10-31 05:32:04'),
	(29,18,13,'882781551SJAQCNC04122017','1997-11-14 09:10:11','1979-06-04 05:43:45'),
	(30,11,3,'163681796EDXBVXB04122017','2006-01-21 14:20:27','2008-12-17 00:44:55'),
	(31,13,1,'986969759BKKWLOB04122017','1989-12-29 22:59:06','2001-10-24 12:14:56'),
	(32,1,3,'164543721HEGCHWB04122017','2013-11-11 01:20:43','2008-01-01 13:49:37'),
	(33,15,13,'766772131TFMKXYA04122017','1986-07-31 23:12:07','1998-04-13 11:22:35'),
	(34,18,5,'119798495RYZKJJJ04122017','1983-12-17 14:43:03','1994-04-16 07:49:14'),
	(35,9,13,'369366729HFRQXCW04122017','1970-05-14 07:01:19','1986-10-20 16:13:45'),
	(36,14,12,'982168645DIKQHNP04122017','2011-01-13 08:35:58','1990-04-11 09:59:53'),
	(37,3,10,'847858828GOLOCPA04122017','2011-07-27 14:08:44','1989-06-15 12:32:51'),
	(38,10,12,'757284221HZNETER04122017','1976-08-26 00:04:23','1988-06-22 08:06:41'),
	(39,7,13,'783782897GSYXQZA04122017','1980-03-31 03:45:11','2004-12-24 19:59:50'),
	(40,12,8,'651245839CTJFNEL04122017','1986-04-25 06:15:29','2005-01-23 13:36:38'),
	(41,7,14,'711585394CVEJTNA04122017','1978-06-07 06:29:52','1990-09-30 09:10:18'),
	(42,7,10,'615773942YPNIYWD04122017','2001-09-08 19:16:45','1972-06-24 09:05:43'),
	(43,9,2,'131896919PIPOUIY04122017','1986-04-22 21:21:41','1996-06-11 20:54:05'),
	(44,2,14,'492363421XIJGEPF04122017','1973-12-04 23:36:44','2012-04-16 04:55:42'),
	(45,18,11,'941311778QTXGBLZ04122017','1990-11-25 21:24:09','2017-09-27 18:05:19'),
	(46,14,15,'173275364LUBHUMT04122017','1988-07-30 19:12:51','1986-10-28 17:00:41'),
	(47,3,1,'855784929XAHQRPT04122017','1995-09-01 08:02:27','1986-10-25 10:00:28'),
	(48,6,10,'261355375TLXNTKD04122017','1973-10-08 18:12:00','2008-08-12 18:52:56'),
	(49,1,1,'453251477OQQSKVM04122017','1985-06-28 04:56:53','1998-11-10 17:59:33'),
	(50,15,3,'994478857IFICQOC04122017','1982-11-23 06:28:20','1990-09-12 11:40:49'),
	(51,7,6,'248264399MUPXNBE04122017','1987-05-02 20:51:09','1996-01-05 12:53:01'),
	(52,15,12,'727352677XXMRWEJ04122017','1970-10-29 22:04:54','2016-12-24 17:22:58'),
	(53,17,14,'624413741QUBTCSH04122017','2007-02-01 16:44:31','1988-12-08 10:53:24'),
	(54,4,7,'535249165VSWMEAX04122017','2009-06-14 13:43:37','1988-11-10 02:58:59'),
	(55,8,6,'585466182HMFLASK04122017','1990-07-04 03:44:55','2001-10-14 08:03:15'),
	(56,8,8,'349911341TWFSDAB04122017','1980-11-20 20:42:14','1992-10-26 16:47:42'),
	(57,21,7,'615767272BIGTHXW04122017','2009-02-20 07:37:38','1979-01-13 08:34:22'),
	(58,6,7,'287736262PUAJIVJ04122017','1971-11-01 00:04:49','1997-07-04 02:47:30'),
	(59,5,4,'871995885RBHVRKW04122017','1997-05-23 11:09:23','2013-04-09 13:22:36'),
	(60,17,13,'928189555UWQRDRM04122017','2005-08-11 08:04:49','1982-12-16 18:22:30'),
	(61,19,2,'373591364VOIARCN04122017','1988-03-04 09:00:32','2010-03-22 05:22:16'),
	(62,3,1,'879157256LWPSAIE04122017','2003-09-25 10:58:25','2013-08-07 19:59:28'),
	(63,19,13,'745237136YTAIKCJ04122017','1973-09-20 01:06:37','1983-10-04 14:51:12'),
	(64,20,11,'182528867RPQPYNU04122017','2001-09-10 01:27:27','2013-09-14 19:12:29'),
	(65,18,10,'984371386LZCFSFW04122017','2012-05-29 08:28:23','2013-04-27 12:43:46'),
	(66,19,2,'992665188VHXMIQC04122017','2003-03-27 12:01:25','1991-06-24 17:01:18'),
	(67,15,12,'892491552IYDRXPH04122017','1998-04-23 13:56:56','1989-02-19 13:26:36'),
	(68,19,14,'438236564OSCIWHL04122017','1972-09-27 07:07:04','1998-10-31 19:49:00'),
	(69,17,1,'682282347QROMPDA04122017','2012-09-24 02:26:52','1976-11-19 03:07:18'),
	(70,4,3,'846735864NWIOHQQ04122017','1988-09-08 15:19:33','1998-03-17 01:56:12'),
	(71,18,1,'919143865WWWLYYS04122017','1990-09-07 06:23:11','2004-05-05 17:04:25'),
	(72,21,8,'511869187NNYTWBP04122017','2013-08-09 23:23:32','1994-07-12 08:51:07'),
	(73,14,13,'221995577LFSYYIJ04122017','2006-12-12 07:06:33','1991-03-05 13:18:06'),
	(74,9,14,'953454358WKBCZTP04122017','2006-12-24 08:41:32','2009-12-25 00:46:48'),
	(75,2,1,'544194171KJMTEVO04122017','1986-11-26 13:11:17','1982-10-02 08:46:29'),
	(76,18,8,'988799789OGSRAZJ04122017','1999-04-14 20:33:41','1986-10-15 20:47:13'),
	(77,5,2,'346931376DOQFIUL04122017','2000-12-23 23:44:26','1971-11-08 19:11:22'),
	(78,5,2,'691555864ASGENCK04122017','1998-03-05 18:35:27','1999-05-27 09:19:02'),
	(79,10,4,'372379148YEVEWEW04122017','1980-07-06 11:04:48','1988-12-27 09:05:11'),
	(80,15,14,'117931534BZZSISQ04122017','2005-10-27 21:49:28','1993-03-07 08:52:42'),
	(81,21,2,'651221366JOPRSHI04122017','1993-05-25 12:26:19','1982-03-04 14:36:39'),
	(82,10,4,'752278396JTDJDUJ04122017','1979-05-15 11:31:35','2008-05-10 15:37:01'),
	(83,5,9,'219111894HUQFJNU04122017','1989-10-04 09:32:49','1995-07-07 19:35:24'),
	(84,20,6,'956312323BENREQB04122017','2002-03-05 02:29:42','2013-05-20 08:21:04'),
	(85,17,14,'449924232JQDZLMW04122017','1977-07-02 16:06:44','1987-07-15 09:38:39'),
	(86,10,4,'162672583JPBLUJZ04122017','1981-10-09 14:07:26','1972-07-12 00:57:22'),
	(87,10,6,'673967587LQLKQLP04122017','1980-03-11 23:32:22','2000-08-17 22:50:35'),
	(88,2,3,'629963855LKGNZGG04122017','1975-07-14 18:39:32','1978-05-11 09:31:01'),
	(89,20,11,'377483641TKLDBXX04122017','2017-02-27 07:23:21','1985-12-13 19:38:08'),
	(90,14,5,'899156442KUEGTZN04122017','1991-08-01 06:31:18','1973-02-26 17:25:39'),
	(91,1,11,'291952857WDEEPVX04122017','1973-10-26 21:10:56','1974-06-07 17:00:52'),
	(92,1,8,'243661318ZKFZLDF04122017','1982-01-10 03:09:29','1984-03-24 12:22:12'),
	(93,7,9,'662652556DVQXUNP04122017','1988-02-22 08:17:19','1992-10-08 19:44:14'),
	(94,6,12,'299418494DYKJKTH04122017','2005-10-08 06:00:06','1996-11-15 07:27:56'),
	(95,12,10,'689493659OLDNWXE04122017','1978-06-02 04:14:54','1973-12-07 11:36:35'),
	(96,9,3,'771546791IBGYMDD04122017','1997-10-06 07:08:02','1985-02-23 12:11:35'),
	(97,7,9,'856576417POQXLWP04122017','1984-02-04 12:10:27','1972-03-13 14:43:12'),
	(98,5,1,'346795644ZZHTEXY04122017','1996-10-29 11:04:47','2008-04-29 13:25:38'),
	(99,9,7,'998876829QKPJEBB04122017','1996-02-12 06:11:47','1989-08-19 10:51:11'),
	(100,8,10,'589675322CFOBFLD04122017','1998-07-20 12:31:09','1996-10-18 12:21:40');

/*!40000 ALTER TABLE `iis_ticket` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_ticket_type
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_ticket_type`;

CREATE TABLE `iis_ticket_type` (
  `iis_ticket_typeid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `iis_eventid` int(10) unsigned NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_ticket_typeid`),
  UNIQUE KEY `un1` (`iis_eventid`,`type`),
  KEY `iis_ticket_type_index` (`iis_ticket_typeid`,`iis_eventid`),
  CONSTRAINT `iis_ticket_type_iis_eventid_foreign` FOREIGN KEY (`iis_eventid`) REFERENCES `iis_event` (`iis_eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_ticket_type` WRITE;
/*!40000 ALTER TABLE `iis_ticket_type` DISABLE KEYS */;

INSERT INTO `iis_ticket_type` (`iis_ticket_typeid`, `iis_eventid`, `type`, `price`, `created_at`, `updated_at`)
VALUES
	(1,1,'adult',734,'1977-01-16 03:34:59','1998-05-12 07:15:58'),
	(2,1,'student',683,'1971-10-24 08:35:49','1973-04-15 03:32:58'),
	(3,1,'child',171,'2012-02-24 16:28:05','1988-03-17 16:40:31'),
	(4,2,'adult',977,'2010-04-26 08:16:03','1987-07-01 20:39:38'),
	(5,2,'student',299,'1982-01-05 08:28:24','2001-02-04 19:51:40'),
	(6,2,'child',303,'1975-01-04 18:39:24','1995-09-09 15:18:28'),
	(7,3,'adult',881,'1991-06-23 18:20:45','1976-08-18 16:43:13'),
	(8,3,'student',873,'1979-05-14 02:40:45','1988-03-21 21:52:31'),
	(9,3,'child',148,'1985-06-17 09:40:48','2003-09-19 18:12:35'),
	(10,4,'adult',634,'1977-04-20 06:39:48','1971-02-24 17:42:14'),
	(11,4,'student',548,'1992-09-09 23:44:34','1983-11-03 06:35:15'),
	(12,4,'child',332,'2007-07-09 02:53:34','2017-09-30 11:07:36'),
	(13,5,'adult',928,'1987-09-14 06:31:09','2011-05-01 14:16:35'),
	(14,5,'student',10,'1974-06-18 22:49:21','1996-06-09 13:26:32'),
	(15,5,'child',167,'1996-01-02 05:20:44','2015-09-01 02:12:59');

/*!40000 ALTER TABLE `iis_ticket_type` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table iis_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `iis_user`;

CREATE TABLE `iis_user` (
  `iis_userid` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`iis_userid`),
  UNIQUE (`email`),
  KEY `iis_user_iis_userid_index` (`iis_userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `iis_user` WRITE;
/*!40000 ALTER TABLE `iis_user` DISABLE KEYS */;

INSERT INTO `iis_user` (`iis_userid`, `name`, `email`, `password`, `phone`, `role`, `remember_token`, `created_at`, `updated_at`)
VALUES
	(1,'Admin','admin@admin.com','$2y$10$6WGSXAZnzcEvauC8wgcs1e5Z48tKJGfP/FmktJRU3ioJG2zCVT/Ye',869250132,'admin',NULL,'2017-12-04 18:24:12','2017-12-04 18:24:12'),
	(2,'Marcos Rohan','eichmann.wilford@hotmail.com','$2y$10$8gQGVvffidhqtvkToOg53um9sL9kb63/k4aJS0.b1LJF/8Jl5u.8a',879538125,'user',NULL,'1999-06-19 14:53:53','1989-06-03 12:01:59'),
	(3,'Liza West','bmertz@gmail.com','$2y$10$NyokX5xGH7GU7ESs3oIbYundilGqDfa3WGPeyCmUkDzptoKRaE90a',536866622,'user',NULL,'2001-08-29 02:23:15','2009-06-16 20:40:37'),
	(4,'Jorge Schmitt','henry26@jakubowski.com','$2y$10$TkjP0jHnijtZHThF6nCkxO7V3mI59bDzAanWUFSsP46cAh4O908xa',276928907,'user',NULL,'2007-08-18 23:48:56','1989-05-22 11:16:04'),
	(5,'Prof. Rosendo DuBuque','rice.hailey@yahoo.com','$2y$10$e1ejEHO3/FlPsn0NoZmDxeUoaNxB17SwznTQM/dDj/Cr8BheTBVPq',104115034,'user',NULL,'1976-05-08 01:08:39','2015-08-19 01:25:46'),
	(6,'Dr. Jacinto Hyatt','lonnie82@hammes.com','$2y$10$36G0kbgLTB3QR/PwU7omP.8/dKupAiVgO5M8b2wOPgcr3v4jTPeD2',871766960,'user',NULL,'2004-02-15 07:40:37','1978-08-06 05:08:24'),
	(7,'Mr. Freddy Ritchie','labadie.liliane@kuhn.com','$2y$10$ltXWEVG5LoSxBjR2iQGNnORq5OrMl4g5YYkXV0lo55ddeFCXqspNu',892335576,'user',NULL,'1995-03-05 12:10:15','1995-07-29 03:45:12'),
	(8,'Prof. Lonny Altenwerth','quitzon.nora@gmail.com','$2y$10$usj4kOxt68xcGV3fn9gw6.YeIy7YSx3auK39BjDH7QUHVqaNx9XeG',766832924,'user',NULL,'1987-11-07 17:28:31','1986-10-19 21:15:00'),
	(9,'Chauncey Wyman','isaac32@hotmail.com','$2y$10$KLd1gEo/WRDfcCgmUJQvseKU3F6LHq/XWUPBY8W5JS7aO3YM1NZ62',251435085,'user',NULL,'1993-07-11 03:10:56','1984-01-21 05:36:34'),
	(10,'Marcos Adams','skye48@yahoo.com','$2y$10$I1oGoJ2HPhReMGi.WA59.eIkvMzn97Jz5iA5G7WdOWALyQVoyxJtu',275107736,'user',NULL,'1975-07-03 19:11:13','1975-12-08 00:31:56'),
	(11,'Dr. Saige Stokes','dvonrueden@buckridge.net','$2y$10$i7x2Vl2sxaNSybkh3H2IkeNSAZp0Gq1wF26hr3XG7a7TS9Axd7Zoa',567910700,'user',NULL,'2014-10-21 16:45:18','1989-02-14 07:56:25'),
	(12,'Prof. Annetta Tillman','schmidt.glenda@yahoo.com','$2y$10$Kr3UhSj/KsyZwtWv3JXvX.8JPUiE/X6rdQcKlPwxkUatg94I0aKMO',868763959,'organiser',NULL,'1980-01-04 04:32:11','2011-09-17 09:29:31'),
	(13,'Mr. Torey Cremin II','earnestine71@gulgowski.net','$2y$10$HdWTlMS/jR6U9OlkT44ZMOPsPqwCWeKr8FHK/r/fiFplmohH04b/q',618462195,'organiser',NULL,'2002-02-28 09:56:58','2011-09-28 04:15:46'),
	(14,'Prof. Jerry Mayert','emmerich.titus@lakin.net','$2y$10$7IWhjYLQRHq3zAucxloVe.QG.esX2NdhCTxNfBsODP9IxPXMuBr3i',235633938,'organiser',NULL,'1997-07-28 19:37:42','1994-10-20 07:12:17'),
	(15,'Miss Marisol Cormier I','hhoeger@yahoo.com','$2y$10$1us32RtAkqBcPYgRzgp1meWbu2TROH7GrvnXQ0VsIKZTbkkm3ReTS',341354855,'organiser',NULL,'1997-08-09 18:33:47','1975-06-05 15:00:28'),
	(16,'Alfreda Murphy','johnson45@towne.com','$2y$10$qhPPfCMZvqoo/cXIbRDN4enwdorQ39XzsZSGgu5HUyxOyDo6tpa9W',525271391,'organiser',NULL,'1991-05-26 08:44:26','1979-10-13 14:10:28'),
	(17,'Mrs. Pink Schultz','margie27@hotmail.com','$2y$10$cFbYV3w9ktGC2MfM5QNKReRDXhzZCmPjXl.6Ji9WC5d8hbOjSXE2a',689116109,'organiser',NULL,'1996-08-29 16:07:02','1981-08-12 11:27:56'),
	(18,'Ona Erdman','sbatz@rath.com','$2y$10$P/0DZGbk4BfGf9NVPTPRdeP2JjT6r7w64G9luxx9nNwFAjtXT3kP.',181525156,'organiser',NULL,'1974-11-15 08:22:36','1998-12-24 00:12:39'),
	(19,'Prof. Elisabeth Gulgowski','jacobs.madeline@gmail.com','$2y$10$rpZWb7Kd3PIO1/UajLfEzeOOrSMQrlf2.rfgHhDT/NEAzXH9nVBw.',270543171,'organiser',NULL,'1984-07-26 05:58:03','1982-06-23 05:42:43'),
	(20,'Walton Turcotte','agerlach@feil.com','$2y$10$wkWIWXbHL5aCvKQSJ9h8euR0YIdZMII4spxWEclnZbJrqH4HZY3.i',883508735,'organiser',NULL,'1988-02-25 05:40:55','1989-04-05 12:58:08'),
	(21,'Aryanna Rau','koss.stephen@kozey.biz','$2y$10$a9QLyFYEpTMahqP5BEgHRuJz0QQfLjvreLBiC9Z5dTR06qPTBOeSO',852324492,'organiser',NULL,'1985-04-09 21:53:28','1987-11-13 09:57:12');

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
	(1,5,6,'1991-07-20 07:08:31','1984-04-14 09:20:58'),
	(2,9,4,'1983-10-06 12:24:51','1985-11-28 22:21:43'),
	(3,5,9,'2013-09-06 07:00:21','2011-04-18 08:54:14'),
	(4,18,2,'1984-08-11 00:58:55','1975-03-16 23:47:11'),
	(5,2,8,'1986-12-28 00:41:41','1977-12-14 04:04:56'),
	(6,10,10,'1977-08-06 14:35:59','2014-10-29 19:38:50'),
	(7,19,4,'1982-08-14 00:03:17','2006-06-08 03:41:49'),
	(8,8,6,'1984-08-10 10:46:33','1978-10-21 04:18:50'),
	(9,13,4,'1995-08-14 01:32:14','1982-09-27 17:51:44'),
	(10,7,4,'1988-05-09 16:43:19','1970-10-27 00:53:59'),
	(11,18,10,'1978-09-01 02:06:56','1979-08-16 17:11:27'),
	(12,14,9,'2001-07-19 09:17:04','2008-05-25 01:16:16'),
	(13,14,5,'2004-05-17 12:09:05','2013-08-25 14:42:52'),
	(14,11,3,'1975-05-30 04:06:39','2014-05-08 03:46:41'),
	(15,21,1,'1977-04-30 00:53:18','1997-01-03 13:15:48'),
	(16,18,3,'1992-03-16 17:47:14','1972-11-05 01:16:00'),
	(17,6,9,'2004-04-07 21:03:41','1977-10-08 14:34:14'),
	(18,16,6,'1994-10-10 17:47:16','2014-12-29 06:38:59'),
	(19,13,9,'2004-05-14 09:52:36','1983-09-21 21:53:48'),
	(20,5,9,'2003-10-11 19:48:13','2002-04-18 12:21:22'),
	(21,7,2,'1995-03-10 02:52:20','1988-03-19 04:55:21'),
	(22,15,7,'1975-05-25 16:00:00','2015-09-21 08:27:22'),
	(23,5,9,'1998-11-10 12:17:52','2010-05-09 22:32:07'),
	(24,8,10,'1997-03-17 14:40:17','2011-02-15 15:14:57'),
	(25,14,3,'2013-03-08 20:25:16','1984-10-05 11:58:51'),
	(26,17,1,'2005-04-28 05:59:29','1986-07-20 08:24:28'),
	(27,21,7,'1977-04-09 22:13:51','2015-12-04 06:46:55'),
	(28,15,7,'1983-04-25 05:20:43','1973-11-14 10:54:27'),
	(29,3,2,'1997-02-11 10:34:28','1978-03-09 13:24:07'),
	(30,7,10,'1983-10-30 12:39:32','2006-05-18 12:11:38'),
	(31,5,6,'1996-12-01 11:13:02','2007-07-09 13:28:05'),
	(32,15,5,'1977-01-27 20:39:24','2015-04-07 19:56:16'),
	(33,6,9,'2012-08-13 11:35:45','1998-06-22 19:38:33'),
	(34,3,10,'1982-01-09 07:25:12','1988-12-06 06:52:45'),
	(35,9,5,'1998-09-09 09:35:38','1991-10-19 17:09:53'),
	(36,2,3,'2008-04-29 00:09:13','2012-03-21 06:44:02'),
	(37,13,1,'1982-10-03 21:32:11','2000-05-20 06:02:37'),
	(38,19,6,'2013-10-20 08:34:55','2005-12-18 00:24:15'),
	(39,14,9,'1973-02-19 01:59:28','1993-10-12 18:04:46'),
	(40,5,9,'1999-09-22 20:56:23','1999-06-09 06:15:52'),
	(41,12,4,'2010-07-03 06:50:29','1995-12-04 13:51:04'),
	(42,20,8,'2001-12-10 22:30:46','2010-11-20 17:05:00'),
	(43,6,6,'2016-11-13 02:01:18','2003-10-08 16:17:42'),
	(44,10,2,'2001-02-24 16:25:18','1992-10-20 06:26:59'),
	(45,9,5,'2011-11-12 23:56:07','1984-08-08 19:23:05'),
	(46,10,5,'1977-08-17 07:27:34','1991-12-20 15:37:19'),
	(47,4,4,'1984-11-19 03:14:37','2002-06-07 03:29:57'),
	(48,18,10,'1980-06-07 11:36:47','2006-09-22 04:23:39'),
	(49,1,2,'1976-08-07 21:06:47','1981-05-18 10:17:02'),
	(50,6,7,'1977-10-27 23:09:16','2011-03-09 03:34:03'),
	(51,2,2,'1974-06-23 11:02:18','1995-09-05 15:08:26'),
	(52,5,3,'2005-09-06 19:36:26','1996-06-28 21:22:34'),
	(53,2,9,'1990-02-03 13:33:57','2001-12-13 20:03:27'),
	(54,7,10,'2014-05-30 08:04:16','2005-11-15 02:14:58'),
	(55,8,7,'1971-06-24 17:21:48','1994-06-17 00:26:31'),
	(56,18,3,'1989-08-22 13:52:03','2014-03-19 00:10:11'),
	(57,6,9,'2015-03-09 10:29:53','2009-10-20 04:21:42'),
	(58,14,2,'1973-05-28 07:14:28','1993-02-27 08:03:04'),
	(59,15,7,'2014-04-10 16:30:42','1985-09-15 12:29:19'),
	(60,20,4,'1992-07-27 11:48:53','2015-11-24 02:44:19');

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
	(61,'2014_10_12_100000_create_password_resets_table',1),
	(62,'2017_10_01_101301_create_iis_event_table',1),
	(63,'2017_10_02_101344_create_iis_festival_table',1),
	(64,'2017_10_03_1013135_create_iis_concert_table',1),
	(65,'2017_10_04_101505_create_iis_interpret_table',1),
	(66,'2017_10_05_101532_create_iis_stage_table',1),
	(67,'2017_10_06_101516_create_iis_stage_iis_interpret_table',1),
	(68,'2017_10_07_101617_create_iis_user_table',1),
	(69,'2017_10_08_102142_create_iis_interpret_iis_concert_table',1),
	(70,'2017_10_09_101611_create_iis_user_iis_interpret_table',1),
	(71,'2017_10_10_101600_create_iis_ticket_type_table',1),
	(72,'2017_10_11_101539_create_iis_ticket_table',1);

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