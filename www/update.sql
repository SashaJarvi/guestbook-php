CREATE TABLE `comments` (
  `id` int(11) not null auto_increment,
  `author` varchar(100) not null,
  `comment` text not null,
  `created_at` timestamp default current_timestamp,
  primary key (`id`)
) engine=InnoDB default charset=utf8;