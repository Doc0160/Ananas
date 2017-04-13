
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

DROP DATABASE IF EXISTS ananas;
CREATE DATABASE IF NOT EXISTS ananas;
USE ananas;


/* user related tables */

CREATE TABLE `groupe` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL UNIQUE,
`permissions` int(11) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `groupe` (`name`, `permissions`)
VALUES ('BDE', '9999999999'),
('CESI', '999999999'),
('Member', '0');

CREATE TABLE `user` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`username` varchar(255) NOT NULL UNIQUE,
`name` varchar(255) NOT NULL,
`pass` varchar(255) NOT NULL,
`email` varchar(255) NOT NULL UNIQUE,
`avatar` varchar(255),
`inscription_date` timestamp DEFAULT CURRENT_TIMESTAMP,
`id_groupe` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT`u_ibfk_1` FOREIGN KEY (`id_groupe`) REFERENCES groupe(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`username`, `name`, `pass`, `email`, `id_groupe`)
VALUES ('JPBDE', 'Jean-Paul BDE', '?', 'a@b.c1', 1),
('JPCESI', 'Jack-Pierre CESI', '?', 'a@b.c2', 2),
('Peni', 'penisland', '?', 'a@b.c3', 3);


/* activity related tables */

CREATE TABLE `activity` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`date` timestamp,
`regular` int(11),
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `activity_inscription` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_activity` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `a_i_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES activity(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `a_i_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `activity_suggestion` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(255) DEFAULT NULL,
`description` varchar(2048) NOT NULL,
PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `activity_vote` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_activity` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `a_v_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES activity(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* goodies related tables */

CREATE TABLE `goodies` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`price` float NOT NULL,
`name` varchar(255) NOT NULL,
`picture` varchar(255),
`description` varchar(2048) NOT NULL,
PRIMARY KEY (`id`),
CHECK (`price` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `goodies_reservation` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_goodies` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `g_r_ibfk_1` FOREIGN KEY (`id_goodies`) REFERENCES goodies(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `g_r_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* photo related tables */

CREATE TABLE `photo` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_activity` int(11) UNSIGNED NOT NULL,
`picture` varchar(255) NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `p_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES activity(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photo_comment` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_photo` int(11) UNSIGNED NOT NULL,
`comment` varchar(1024) NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `p_c_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES photo(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photo_like` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_photo` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `p_l_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES photo(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*
CREATE TABLE `permission` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(255) NOT NULL UNIQUE,
`value` int(11) NOT NULL UNIQUE,

PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `permission` (`name`, `value`) VALUES ('suggest an activity', '1');
INSERT INTO `permission` (`name`, `value`) VALUES ('modify activity', '2');
INSERT INTO `permission` (`name`, `value`) VALUES ('modify group', '4');
*/
/* ... maybe not in sql ? / hardcoded in php ... */


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
