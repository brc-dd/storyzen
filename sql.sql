CREATE TABLE `stories` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `title`  TEXT NOT NULL,
  `url_title` VARCHAR(1000) NOT NULL UNIQUE,
  `content` TEXT NOT NULL,
  `date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hits` INT NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE = MyISAM;