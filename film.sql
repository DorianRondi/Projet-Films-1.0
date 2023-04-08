DROP DATABASE film;
CREATE DATABASE IF NOT EXISTS film;
USE film;
CREATE TABLE IF NOT EXISTS `film` (
    `id` INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    `titre_film` VARCHAR(50) NOT NULL,
    `date_sortis` DATE,
    `genre` VARCHAR(50),
    `duree` TIME,
    `affiche` VARCHAR(100)
);
INSERT INTO `film`
    (`id`,`titre_film`,`date_sortis`,`genre`,`duree`,`affiche`)
VALUES
    (1,'Terminator','1984-10-26','Science-fiction','1:17:00','./img/affiches/Terminator.jpg'),
    (2,'Le Créateur','1999-06-16','Humoir noir','1:32:00','./img/affiches/Le Créateur.jpg'),
    (3,'MAD MAX Fury Road','2015-05-15','Science-fiction','2:00:00','./img/affiches/MAD MAX Fury Road.jpg');
SHOW DATABASES;
SHOW TABLES;
DESCRIBE `film`;
SELECT * FROM `film`;