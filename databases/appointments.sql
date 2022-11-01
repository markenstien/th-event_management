DROP TABLE IF EXISTS `appointments`;
CREATE TABLE `appointments` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `category_id` int,
  `reference` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `date` date ,
  `start_time` time DEFAULT NULL,
  `num_of_days` tinyint,
  `address` text,
  `num_of_attendees` tinyint,
  `type` enum('online','walk-in') DEFAULT 'online',
  `status` enum('pending','arrived','cancelled','scheduled') DEFAULT NULL,
  `user_id` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;