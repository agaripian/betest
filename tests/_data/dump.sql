CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `email`, `password`, `first_name`, `last_name`, `token`)
  VALUES
  (1, 'bob@bob.com', 'bob', 'bob', 'bob', '123'),
  (2, 'john@john.com', 'john', 'john', 'john', '123');

CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `userid` (`userid`),
  FOREIGN KEY (`userid`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `images` (`id`, `url`, `name`, `description`, `userid`)
VALUES
	(1,'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/a3a2cf47122431.587108a34d3f8.jpg','sun','Bright Sun',1),
	(2,'https://mir-s3-cdn-cf.behance.net/project_modules/1400/6f963e52031945.590201b690882.jpg','Phone','Phone Flame Burner',1),
	(3,'https://mir-s3-cdn-cf.behance.net/project_modules/max_1200/7c5eb551677069.58f6680f4fa9b.jpg','Boat','Wooden Boat',2);
