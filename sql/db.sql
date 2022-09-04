-- --------------------------------------------------------
-- Хост:                         127.0.0.1
-- Версия сервера:               10.4.24-MariaDB - mariadb.org binary distribution
-- Операционная система:         Win64
-- HeidiSQL Версия:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Дамп структуры базы данных sok
CREATE DATABASE IF NOT EXISTS `sok` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `sok`;

-- Дамп структуры для таблица sok.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы sok.categories: ~24 rows (приблизительно)
INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`) VALUES
	(1, 0, 'Test 1', 'Test description 1'),
	(2, 0, 'Test 2', 'Test description 2'),
	(3, 0, 'Test 3', 'Test description 3'),
	(4, 1, 'Test 1.1', 'Test description 1.1'),
	(5, 1, 'Test 1.2', 'Test description 1.2'),
	(6, 4, 'Test 1.1.1', 'Test description 1.1.1'),
	(7, 2, 'Test 2.1', 'Test description 2.1'),
	(8, 2, 'Test 2.2', 'Test description 2.2'),
	(9, 3, 'Test 3.1', 'Test description 3.1'),
	(10, 0, 'Test 4', 'Test description 4'),
	(11, 0, 'Test 5', 'Test description 5'),
	(12, 0, 'Test 6', 'Test descriptoin 6'),
	(13, 10, 'Test 4.1', 'Test description 4.1'),
	(14, 13, 'Test 4.1.1', 'Test description 4.1.1'),
	(15, 14, 'Test 4.1.1.1', 'Test description 4.1.1.1'),
	(16, 15, 'Test 4.1.1.1.1', 'Test description 4.1.1.1.1'),
	(17, 16, 'Test 4.1.1.1.1.1', 'Test description 4.1.1.1.1.1'),
	(18, 17, 'Test 4.1.1.1.1.1.1', 'Test description 4.1.1.1.1.1.1'),
	(19, 17, 'Test 4.1.1.1.1.1.2', 'Test description 4.1.1.1.1.1.2'),
	(20, 16, 'Test 4.1.1.1.1.2', 'Test description 4.1.1.1.1.2'),
	(21, 15, 'Test 4.1.1.1.2', 'Test description 4.1.1.1.2'),
	(22, 14, 'Test 4.1.1.2', 'Test description 4.1.1.2'),
	(23, 13, 'Test 4.1.2', 'Test description 4.1.2'),
	(24, 10, 'Test 4.2', 'Test description 4.2');

-- Дамп структуры для таблица sok.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `password` (`password`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Дамп данных таблицы sok.users: ~0 rows (приблизительно)
INSERT INTO `users` (`id`, `username`, `password`) VALUES
	(1, 'sok', '$2y$10$abPollz7ULup2t2t.fNpjes0EXB1ZDxL7NORLcBaX6XFNvZehrAiS');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
