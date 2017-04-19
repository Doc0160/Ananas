
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
VALUES ('BDE', 9999999999),
('CESI', 99999999999),
('Member', 558641);

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
VALUES ('JPBDE', 'Jean-Paul BDE', '8420c85c2aadaebac268ffa047b24ba8d4e3d7d64c7e8d97d79fe93bfada1981', 'bde@b.c', 1),
('JPCESI', 'Jack-Pierre CESI', '8420c85c2aadaebac268ffa047b24ba8d4e3d7d64c7e8d97d79fe93bfada1981', 'cesi@b.c', 2),
('Peni', 'penisland', '8420c85c2aadaebac268ffa047b24ba8d4e3d7d64c7e8d97d79fe93bfada1981', 'member@b.c', 3);


/* activity related tables */

CREATE TABLE `activity` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`visible` bool DEFAULT 1,
`date` timestamp,
`date_end` timestamp,
`regular` int(11) UNSIGNED,
`prix` float,
`name` varchar(255),
`description` varchar(2048) NOT NULL,
`picture` varchar(255),
PRIMARY KEY (`id`),
CHECK (`price` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `activity` (`date`, `regular`, `prix`, `name`, `description`)
VALUES (FROM_UNIXTIME(1494112249), NULL, 10.1, 'LAN', 'LALAN'),
(NULL, NULL, 10.1, 'PENISLAND', 'Many companies specialize in custom pens in bulk orders of hundreds or thousands of units, but where do you go if you want just one or two customized pens for that special gift? You come to Pen Island, where we are passionate about creating the exact pen you want, a pen that is as unique as you are. You do not need to be an design expert to own a one-of-a-kind pen, our team will work with you to find a design uniquely yours. For those do not have the time to design their own pens we offer our pre-designed line of pens, some of which can be additionally customized. Whether you are looking for a thin white EZ-Grip pen, a petite yellowheart wood pen, or a thick dark mahogany pen we have just the one for you. Our pens are available in several custom sizes. Once we built a pen so large that we had difficulty finding a box it would fit in. We Specialize In Wood We have been hand-crafting wooden pens for nearly three decades and our designs have won multiple awards. From single pens to bulk orders, virgin timber or reclaimed barn wood. Visit our wood page for further information.');

CREATE TABLE `activity_inscription` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_activity` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `a_i_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES activity(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `a_i_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `a_i_ibfk_3` UNIQUE (`id_activity`, `id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `activity_suggestion` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`name` varchar(255) DEFAULT NULL,
`description` varchar(2048) NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `a_s_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `activity_vote` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_activity` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `a_v_ibfk_1` FOREIGN KEY (`id_activity`) REFERENCES activity(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `a_v_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `a_v_ibfk_3` UNIQUE (`id_activity`, `id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/* goodies related tables */

CREATE TABLE `goodies` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`price` float NOT NULL,
`name` varchar(255),
`picture` varchar(255),
`description` varchar(2048) NOT NULL,
PRIMARY KEY (`id`),
CHECK (`price` > 0)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `goodies` (`price`, `name`, `description`, `picture`)
VALUES (500.4, 'TRUC', 'JE DECRIS UN TRUC', NULL),
(500.4, 'Bucal', 'mumumu', NULL),
(10, 'Casquette EXIA', 'ceci est un article de qualité', 'casquette.jpg'),
(100, 'Gourde EXIA', 'ceci est un article de qualité', 'gourde.jpg'),
(1000, 'Pull EXIA', 'ceci est un article de qualité', 'pull.jpg'),
(10, 'Sac EXIA', 'ceci est un article de qualité', 'sac.jpg'),
(5, 'Kebab EXIA', 'ceci est un article de qualité', 'kebab.jpg'),
(1, 'T-shirt siphano', 'ceci est un article de qualité', 'siphano.jpg'),
(55000, 'Ton Année à l\'Exia', 'ceci est un article de qualité', 'exia.jpg'),
(25, 'Trophée Exia', 'Dimensions: 10cm x 5.5cm', 'deco.jpg'),
(NULL, 'Stage en entreprise', 'ceci est un article de qualité', 'stage.jpg');

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

INSERT INTO `photo` (`picture`, `id_activity`)
VALUES ('photo1.jpg',1),
('photo2.jpg',1),
('gundam-exia.jpg',1),
('babe_1.jpg',1),
('babe_2.jpg',1);

CREATE TABLE `photo_comment` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_photo` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
`comment` varchar(1024) NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `p_c_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES photo(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `p_c_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `photo_comment` (`id_photo`, `id_user`, `comment`)
VALUES (2, 2, 'SUCK MA DICK'),
(2, 3, 'SUCK MA DICK TOO');

CREATE TABLE `photo_like` (
`id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
`id_photo` int(11) UNSIGNED NOT NULL,
`id_user` int(11) UNSIGNED NOT NULL,
PRIMARY KEY (`id`),
CONSTRAINT `p_l_ibfk_1` FOREIGN KEY (`id_photo`) REFERENCES photo(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `p_l_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES user(`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
CONSTRAINT `p_l_ibfk_3` UNIQUE (`id_photo`, `id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
