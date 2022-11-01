DROP TABLE IF EXISTS package_items;
CREATE TABLE `package_items` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `item_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `created_by` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;