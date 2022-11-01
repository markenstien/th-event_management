DROP TABLE IF EXISTS packages;
CREATE TABLE `packages` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `code` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) DEFAULT NULL,
  `price_custom` decimal(10,2) DEFAULT NULL,
  `discount` decimal(10,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `status` enum('available','unavailable') DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT 1,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `category_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;