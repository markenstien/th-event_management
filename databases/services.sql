DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `service` varchar(50) DEFAULT NULL,
  `code` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `status` enum('available','not-available') DEFAULT NULL,
  `description` text DEFAULT NULL,
  `category_id` int(10) DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;