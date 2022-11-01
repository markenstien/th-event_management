DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) NOT NULL primary key AUTO_INCREMENT,
  `user_code` varchar(25) NOT NULL,
  `user_type` enum('admin','customer','staff') DEFAULT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `address` text DEFAULT NULL,
  `phone_number` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(150) NOT NULL,
  `profile` text DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_verified` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
