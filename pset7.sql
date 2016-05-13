--
-- Database: `pset7`
--

CREATE DATABASE IF NOT EXISTS `peach`;
USE `peach`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `consultants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `con_name` varchar(255) NOT NULL,
  `hash` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `con_name` (`con_name`)
) ENGINE=InnoDB;

--
-- Dumping data for table `users`
--

INSERT INTO `consultants` (con_name, email, hash) VALUES('consultant1', 'con1@gmail.com' '$2y$10$395b7wODm.o2N7W5UZSXXuXwrC0OtFB17w4VjPnCIn/nvv9e4XUQK');
