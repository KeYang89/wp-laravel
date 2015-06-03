# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.43-0ubuntu0.14.04.1)
# Database: team
# Generation Time: 2015-06-03 13:36:13 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table contests
# ------------------------------------------------------------

DROP TABLE IF EXISTS `contests`;

CREATE TABLE `contests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `contest` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `contest_type` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `multi_entry` int(11) NOT NULL,
  `prize_guaranteed` int(11) NOT NULL,
  `entries` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `size` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `entry_fee` decimal(5,2) NOT NULL,
  `prize` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start_time` datetime NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `contests` WRITE;
/*!40000 ALTER TABLE `contests` DISABLE KEYS */;

INSERT INTO `contests` (`id`, `contest`, `area`, `contest_type`, `multi_entry`, `prize_guaranteed`, `entries`, `size`, `entry_fee`, `prize`, `start_time`, `created_at`, `updated_at`)
VALUES
	(1,'$250K  Tue NFL MEGA Layup','spain','1',0,1,'38565','57471',5.00,'$250000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'Fantasy Playoffs - Win Your Way to the MLB Finals!','cl','2',0,1,'10363','100000',0.00,'Trip for 2 to NYC & More','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'$150K Tue NBA Slam','italy','2',1,1,'4408','6896',25.00,'$150000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,'$10K Tue NHL Big Double Up ($10)','mls','3',1,1,'825','1136',10.00,'$10000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,'$10K Tue CBB Big Double Up ($25)','cl','4',1,1,'350','454',25.00,'$10000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,'$5K Tue CFB Big Double Up ($50)','germany','1',1,1,'92','112',50.00,'$5000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,'$20K Tue NFL Monster','spain','3',1,1,'90','110',200.00,'$20000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,'$30K Tue MLB Swat','mls','4',1,1,'100','34479',1.00,'$30000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'$40K Tue MLB Shot #2','germany','2',1,1,'18907','22988',2.00,'$40000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(10,'$7K Tue NHL Bing Quintuple Up - 5X ($2)','uk','3',1,1,'2882','3977',2.00,'$7000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,'$7K Tue NBA Big Double Up ($2)','italy','4',1,1,'2445','6777',2.00,'$7000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(12,'$6K Tue NHL Big Double Up ($5)','mls','1',1,1,'6935','6495',5.00,'$6000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(13,'$13K Tue CBB Reboud','uk','2',1,1,'803','1364',10.00,'$13000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(14,'$1K Tue CFB Mini Swat','germany','3',1,1,'811','1156',1.00,'$1000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(15,'$4K Tue NFL Big Quintuple Up - 5X ($5X)','spain','4',1,1,'727','909',5.00,'$4000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(16,'$3K Tue MLB Assist','italy','1',1,1,'555','689',5.00,'$3000','2015-06-01 19:00:00','0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `contests` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table migrations
# ------------------------------------------------------------

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;

INSERT INTO `migrations` (`migration`, `batch`)
VALUES
	('2014_10_12_000000_create_users_table',1),
	('2014_10_12_100000_create_password_resets_table',1),
	('2015_05_25_110819_create_players_table',2),
	('2015_05_25_125404_create_user_teams_table',3);

/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table password_resets
# ------------------------------------------------------------

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table players
# ------------------------------------------------------------

DROP TABLE IF EXISTS `players`;

CREATE TABLE `players` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `team_id` int(11) NOT NULL,
  `score` int(11) DEFAULT NULL,
  `goals` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `players` WRITE;
/*!40000 ALTER TABLE `players` DISABLE KEYS */;

INSERT INTO `players` (`id`, `first_name`, `last_name`, `team_id`, `score`, `goals`, `created_at`, `updated_at`)
VALUES
	(1,'Ben','Amos',1,991,25,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(2,'Tyler','Blackett',2,967,32,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(3,'Daley','Blind',3,944,34,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(4,'Michael','Carrick',4,932,20,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(5,'Tom','Cleverley',5,911,30,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(6,'Jonny','Evans',6,893,28,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(7,'Marouane','Fellaini',7,836,23,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(8,'Darren','Fletcher',8,825,43,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(9,'Javier','Hernandez',9,786,18,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(10,'Ander','Herrera',10,750,19,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(11,'Reece','James',11,729,22,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(12,'Saidy','Janko',12,710,31,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(13,'Adnan','Januzaj',13,567,25,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(14,'Sam','Johnstone',14,537,29,'0000-00-00 00:00:00','0000-00-00 00:00:00'),
	(15,'Phil','Jones',1,496,19,'0000-00-00 00:00:00','0000-00-00 00:00:00');

/*!40000 ALTER TABLE `players` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table teams
# ------------------------------------------------------------

DROP TABLE IF EXISTS `teams`;

CREATE TABLE `teams` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `teams` WRITE;
/*!40000 ALTER TABLE `teams` DISABLE KEYS */;

INSERT INTO `teams` (`id`, `name`)
VALUES
	(1,'Chelsea'),
	(2,'Man City'),
	(3,'Arsenal'),
	(4,'Spurs'),
	(5,'QPR'),
	(6,'Cardiff'),
	(7,'Aston Villa'),
	(8,'Swansea'),
	(9,'West Brom'),
	(10,'Sunderland'),
	(11,'Southampton'),
	(12,'Norwich'),
	(13,'Liverpool'),
	(14,'Newcastle'),
	(15,'Crystal Palace');

/*!40000 ALTER TABLE `teams` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_teams
# ------------------------------------------------------------

CREATE TABLE `user_teams` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `team_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `team_players` text COLLATE utf8_unicode_ci NOT NULL,
  `team_points` int(11) DEFAULT NULL,
  `team_rank` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
