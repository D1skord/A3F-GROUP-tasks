CREATE TABLE `contact` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`name` varchar(80),
	UNIQUE KEY  (`id`),
	PRIMARY KEY (`id`)
);

CREATE TABLE `contact_friend` (
	`id` int(11) NOT NULL AUTO_INCREMENT,
	`contact_id` int(11) NOT NULL,
	`friend_id` int(11) NOT NULL,
	UNIQUE KEY (`id`),
	PRIMARY KEY (`contact_id`,`friend_id`),
	FOREIGN KEY (contact_id) REFERENCES contact(id),
	FOREIGN KEY (friend_id) REFERENCES contact(id)
);


INSERT INTO `contact` (`id`, `name`) VALUES
(1, 'Ivan'),
(2, 'Sergey'),
(3, 'Anton'),
(4, 'Aleksandr'),
(5, 'Anna'),
(6, 'Elena'),
(7, 'Alena'),
(8, 'Andrey'),
(9, 'Stanislav');

INSERT INTO `contact_friend` (`id`, `contact_id`, `friend_id`) VALUES
(1, 1, 2),
(2, 1, 4),
(4, 1, 7),
(5, 1, 3),
(6, 1, 5),
(11, 1, 6),
(12, 6, 4),
(13, 6, 7),
(14, 6, 8),
(15, 6, 2),
(16, 6, 1),
(17, 6, 3),
(18, 5, 4),
(19, 5, 7);