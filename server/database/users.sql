
-- ************************************** `users`

CREATE TABLE `users`
(
 `id`              integer NOT NULL AUTO_INCREMENT ,
 `username`        varchar(45) NOT NULL ,
 `password`        varchar(105) NOT NULL ,
 `email`           varchar(45) NOT NULL ,
 `avatar`          varchar(45) NOT NULL ,
 `currency`        integer NOT NULL ,
 `lastReward`      integer NOT NULL ,
 `isAdmin`         integer NOT NULL ,
 `isAsset`         integer NOT NULL ,
 `pendingBG`       integer NOT NULL ,
 `backgroundImage` varchar(100) NOT NULL ,

PRIMARY KEY (`id`)
);

CREATE TABLE `forums`
(
    `id` integer NOT NULL AUTO_INCREMENT,
    `title` varchar(45) NOT NULL,
    `body` varchar(3000) NOT NULL,
    `OP` integer NOT NULL,
    `category` integer NOT NULL,
    `pinned` integer NOT NULL,
    `locked` integer NOT NULL 
    PRIMARY KEY (`id`)
);




CREATE TABLE `assets`
(
 `id`            integer NOT NULL AUTO_INCREMENT ,
 `name`          varchar(45) NOT NULL ,
 `description`   varchar(300) NOT NULL ,
 `price`         integer NOT NULL ,
 `isCollectible` integer NOT NULL ,
 `stock`         integer NOT NULL ,
 `isPending`     integer NOT NULL ,
 `image`         varchar(100) NOT NULL ,

PRIMARY KEY (`id`)
);





