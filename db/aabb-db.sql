-- SQL dump generated using DBML (dbml-lang.org)
-- Database: MySQL
-- Generated at: 2023-03-13T18:29:31.830Z

CREATE TABLE `article` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL COMMENT 'HTML formatted',
  `created_at` int DEFAULT (UNIX_TIMESTAMP()),
  `visible` boolean DEFAULT 1,
  `author_id` int,
  `category_id` int
);

CREATE TABLE `product` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(64),
  `brand` varchar(32),
  `description` varchar(255),
  `url` varchar(2048),
  `image` varchar(2048),
  `hot_deal` boolean DEFAULT 0,
  `article_id` int
);

CREATE TABLE `user` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `username` varchar(255) UNIQUE NOT NULL,
  `auth_key` varchar(32),
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) UNIQUE,
  `email` varchar(255) UNIQUE,
  `created_at` int DEFAULT (UNIX_TIMESTAMP()),
  `updated_at` int NOT NULL,
  `verification_token` varchar(255)
);

CREATE TABLE `category` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(255),
  `image` varchar(255),
  `source` varchar(2048),
  `image_color` varchar(16),
  `visible` boolean DEFAULT 1
);

CREATE TABLE `video` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `embed_url` varchar(2048) NOT NULL,
  `title` varchar(255),
  `author_name` varchar(255),
  `author_image` varchar(2048),
  `author_url` varchar(2048),
  `visible` boolean DEFAULT 1,
  `category_id` int
);

CREATE TABLE `tag` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `tag` varchar(32) NOT NULL
);

CREATE TABLE `article_tag` (
  `article_id` int,
  `tag_id` int NOT NULL
);

CREATE TABLE `video_tag` (
  `video_id` int,
  `tag_id` int NOT NULL
);

CREATE TABLE `banner` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `src` varchar(1024) NOT NULL COMMENT 'Source for iframe',
  `size_id` int COMMENT 'Null hides banner'
);

CREATE TABLE `size` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `width` int NOT NULL,
  `height` int NOT NULL
);

CREATE TABLE `website` (
  `id` char(1) PRIMARY KEY DEFAULT 1,
  `name` varchar(255) NOT NULL,
  `title` varchar(64) NOT NULL,
  `description` varchar(255),
  `image` varchar(255),
  `source` varchar(2048),
  `email` varchar(320) NOT NULL,
  `ref_tag` varchar(32),
  `ref_url` varchar(2048),
  `category` varchar(64),
  `created_at` int DEFAULT (UNIX_TIMESTAMP()),
  `accent_color` varchar(11) NOT NULL,
  `symbol` text COMMENT 'Symbol before your website name',
  `font_headline` varchar(2048),
  `font_body` varchar(2048)
);

CREATE TABLE `email_list` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `email` varchar(320) NOT NULL,
  `created_at` int DEFAULT (UNIX_TIMESTAMP()),
  `updated_at` int NOT NULL,
  `unsubscribe_token` varchar(255) NOT NULL,
  `active` boolean DEFAULT 1
);

CREATE INDEX `product_index_0` ON `product` (`hot_deal`);

CREATE UNIQUE INDEX `article_tag_index_1` ON `article_tag` (`article_id`, `tag_id`);

CREATE UNIQUE INDEX `video_tag_index_2` ON `video_tag` (`video_id`, `tag_id`);

CREATE INDEX `email_list_index_3` ON `email_list` (`email`);

ALTER TABLE `size` COMMENT = 'Look up table for ad banners';

ALTER TABLE `website` COMMENT = 'Some dynamic information about the website';

ALTER TABLE `article` ADD FOREIGN KEY (`author_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `article` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `video` ADD FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `article_tag` ADD FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `video_tag` ADD FOREIGN KEY (`video_id`) REFERENCES `video` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `product` ADD FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

ALTER TABLE `article_tag` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `video_tag` ADD FOREIGN KEY (`tag_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `banner` ADD FOREIGN KEY (`size_id`) REFERENCES `size` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
