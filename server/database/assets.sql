
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





