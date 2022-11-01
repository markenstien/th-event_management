DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  `cat_key` varchar(50) NOT NULL,
  `description` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;