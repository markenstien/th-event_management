DROP TABLE IF EXISTS `attachments`;
CREATE TABLE `attachments` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `label` varchar(100) DEFAULT NULL,
  `filename` varchar(100) DEFAULT NULL,
  `file_type` varchar(100) DEFAULT NULL,
  `display_name` varchar(100) DEFAULT NULL,
  `search_key` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `global_key` varchar(100) DEFAULT NULL,
  `global_id` int(10) DEFAULT NULL,
  `path` text DEFAULT NULL,
  `url` text DEFAULT NULL,
  `full_path` text DEFAULT NULL,
  `full_url` text DEFAULT NULL,
  `is_visible` tinyint(1) DEFAULT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;