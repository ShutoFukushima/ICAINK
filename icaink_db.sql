DROP TABLE IF EXISTS `tbl_users`;
CREATE TABLE `tbl_users` (
	`user_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_lastname` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`user_firstname` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`user_email` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`user_password` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`user_date_added` DATE NOT NULL,
	`user_time_added` TIME NOT NULL,
	`user_date_updated` DATE NOT NULL,
	`user_time_updated` TIME NOT NULL,
	`user_status` INT(1) NOT NULL DEFAULT '0',
	`user_token` VARCHAR(255) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`user_access` VARCHAR(255) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	PRIMARY KEY (`user_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=10000007;

INSERT INTO `tbl_users` (`user_id`, `user_lastname`, `user_firstname`, `user_email`, `user_password`, `user_date_added`, `user_time_added`, `user_date_updated`, `user_time_updated`, `user_status`, `user_token`, `user_access`) VALUES
	(10000001, 'Fukushima', 'Shuto', 'shutofukushima@email.com', 'x', '2023-02-15', '21:47:07', '2023-04-01', '00:15:40', 1, '', 'Manager'),
	(10000002, 'Libo-on', 'Jahziel Banne', 'jahziel@email.com', 'x', '2023-02-19', '20:51:44', '0000-00-00', '00:00:00', 1, '', 'Staff'),
	(10000003, 'Paredes', 'Lia', 'liaprds@gmail.com', 'x', '2023-02-19', '20:57:06', '0000-00-00', '00:00:00', 1, '', 'Staff'),
	(10000004, 'Uzumaki', 'Naruto', 'naruto@email.com', '123', '2023-02-19', '22:04:41', '0000-00-00', '00:00:00', 1, '', 'Staff');
---------------------------------------------------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
	`prod_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`prod_name` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`prod_description` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`prod_price` INT(180) NOT NULL DEFAULT '0',
	`prod_image` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`prod_date_added` DATE NOT NULL,
	`prod_time_added` TIME NOT NULL,
	`prod_date_updated` DATE NOT NULL,
	`prod_time_updated` TIME NOT NULL,
	`prod_status` INT(1) NOT NULL DEFAULT '0',
	`type_id` INT(3) NOT NULL DEFAULT '0',
	PRIMARY KEY (`prod_id`) USING BTREE,
	INDEX `type_id` (`type_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=1007;

INSERT INTO `tbl_product` (`prod_id`, `prod_name`, `prod_description`, `prod_price`, `prod_image`, `prod_date_added`, `prod_time_added`, `prod_date_updated`, `prod_time_updated`, `prod_status`, `type_id`) VALUES
	(1002, 'Tiger Skin', 'SIZE - INCHES | 8 1/4" X 3 11/16" ', 250, '1002_64270f35a41ef.jpg', '2023-03-29', '22:37:35', '2023-04-01', '01:52:19', 1, 310),
	(1003, 'USLS Computing Studies EXPO Banner', 'SIZE - FEET | 3 X 5', 1000, '1003_64271b000d7e1.jpg', '2023-03-31', '22:05:03', '2023-04-01', '01:52:23', 1, 311),
	(1004, 'Hello Kitty', 'SIZE - INCHES | 8 1/4" X 3 11/16" ', 250, '1004_64271b868494c.png\r\n', '2023-03-31', '23:39:32', '2023-04-01', '01:52:29', 1, 310),
	(1005, 'My Hero Academia - Deku', 'SIZE - INCHES | Circle: 6″ – 8″ Diameter', 200, '1005_64271d31e9914.png', '2023-04-01', '01:49:34', '2023-04-01', '01:52:42', 1, 315),
	(1006, 'Naruto', 'SIZE - INCHES | Circle: 5 X 5 ', 50, '1006_64271d463bd0a.png', '2023-04-01', '02:24:13', '0000-00-00', '00:00:00', 1, 318),
	(1007, 'YouTube Banner', 'SIZE - FEET | 10 X 10', 750, '1007_6427409b68bc8.png', '2023-04-01', '03:54:04', '2023-04-01', '04:28:29', 1, 311);
---------------------------------------------------------------------
DROP TABLE IF EXISTS `tbl_type`;
CREATE TABLE `tbl_type` (
	`type_id` INT(3) UNSIGNED NOT NULL AUTO_INCREMENT,
	`type_name` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`type_date_added` DATE NOT NULL,
	`type_time_added` TIME NOT NULL,
	`type_date_updated` DATE NOT NULL,
	`type_time_updated` TIME NOT NULL,
	`type_status` INT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`type_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=319;

INSERT INTO `tbl_type` (`type_id`, `type_name`, `type_date_added`, `type_time_added`, `type_date_updated`, `type_time_updated`, `type_status`) VALUES
	(310, 'Personalized Mug', '2023-03-29', '22:36:34', '0000-00-00', '00:00:00', 1),
	(311, 'Tarpaulin', '2023-03-29', '22:40:34', '0000-00-00', '00:00:00', 1),
	(312, 'Printing Banners/Signages', '2023-03-29', '22:40:40', '0000-00-00', '00:00:00', 1),
	(313, 'Pana Flex Signages Lighted', '2023-03-29', '22:40:51', '0000-00-00', '00:00:00', 1),
	(314, 'T-Shirts Printing', '2023-03-29', '22:41:04', '0000-00-00', '00:00:00', 1),
	(315, 'Decals', '2023-03-29', '22:41:09', '0000-00-00', '00:00:00', 1),
	(316, 'Acrylic', '2023-03-29', '22:41:13', '0000-00-00', '00:00:00', 1),
	(317, 'Sintra', '2023-03-29', '22:41:20', '0000-00-00', '00:00:00', 1),
	(318, 'Stickers', '2023-03-29', '22:41:25', '0000-00-00', '00:00:00', 1);
---------------------------------------------------------------------
DROP TABLE IF EXISTS `tbl_receive`;
CREATE TABLE `tbl_receive` (
	`rec_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`rec_supplier` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`rec_description` VARCHAR(180) NOT NULL DEFAULT '' COLLATE 'utf8mb4_general_ci',
	`rec_amount` VARCHAR(11) NOT NULL DEFAULT '0' COLLATE 'utf8mb4_general_ci',
	`rec_date_added` DATE NOT NULL,
	`rec_time_added` TIME NOT NULL,
	`rec_saved` INT(1) NOT NULL DEFAULT '0',
	`rec_status` INT(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (`rec_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=10000009;

INSERT INTO `tbl_receive` (`rec_id`, `rec_supplier`, `rec_description`, `rec_amount`, `rec_date_added`, `rec_time_added`, `rec_saved`, `rec_status`) VALUES
	(10000001, 'Shuto Fukushima', 'Blk. 46 Lot 4, DC 1, RPHS, Brgy. Alijis', '09123456789', '2023-03-31', '23:42:48', 1, 1),
	(10000002, 'Lia Paredes', 'Aquarius St., JR Torres Subdivision, Brgy. Airport', '09123456789', '2023-03-31', '23:51:09', 1, 1),
	(10000003, 'Bahziel Janne Bilo-on', 'Blk. 35 Lot 42,South Homes Subd.,Brgy. Sum-ag', '09123456789', '2023-03-31', '23:54:21', 0, 1),
	(10000004, 'Jericho Rosales', 'Blk. 46 Lot 5, DC 1, RPHS, Brgy. Alijis', '09123456789', '2023-03-31', '23:55:25', 0, 1),
	(10000005, 'Calvin Abueva', 'Blk 53 Lot 12, Manville Subd., Brgy. Pahanocoy', '09123456789', '2023-04-01', '02:28:58', 0, 1);
---------------------------------------------------------------------
DROP TABLE IF EXISTS `tbl_receive_items`;
CREATE TABLE `tbl_receive_items` (
	`rec_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
	`prod_id` INT(8) NOT NULL DEFAULT '0',
	`rec_qty` INT(8) NOT NULL DEFAULT '0',
	INDEX `rec_id` (`rec_id`) USING BTREE,
	INDEX `prod_id` (`prod_id`) USING BTREE
)
COLLATE='utf8mb4_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=10000009;

INSERT INTO `tbl_receive_items` (`rec_id`, `prod_id`, `rec_qty`) VALUES
	(10000001, 1003, 5),
	(10000002, 1004, 2),
	(10000003, 1006, 1),
	(10000004, 1005, 5),
	(10000005, 1006, 20),
	(10000003, 1002, 1),
	(10000004, 1007, 1);



