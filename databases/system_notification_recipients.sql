DROP TABLE IF EXISTS `system_notification_recipients`;
CREATE TABLE `system_notification_recipients` (
  `id` int(10) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `notification_id` int(10) DEFAULT NULL,
  `recipient_id` int(10) DEFAULT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;