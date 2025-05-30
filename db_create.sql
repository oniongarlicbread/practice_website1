CREATE DATABASE `forumdb`
USE `forumdb`

CREATE TABLE `users` (
    `uuid` int(11) NOT NULL AUTO_INCREMENT,
    `realname` varchar(128) NOT NULL,
    `email` varchar(254) NOT NULL,
    `username` varchar(36) NOT NULL,
    `password` varchar(254) NOT NULL,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
)