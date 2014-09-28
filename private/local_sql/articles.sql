CREATE TABLE `articles` (
  `id` int(10) NOT NULL auto_increment,
  `art_id` int(10) NOT NULL,
  `parent_id` int(10) NOT NULL,
  `title` varchar(128) NOT NULL,
  `author` varchar(32) NOT NULL,
  `date` timestamp NOT NULL,
  `content` text NOT NULL,
  `type` int(4) NOT NULL,
  `url` varchar(256) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;