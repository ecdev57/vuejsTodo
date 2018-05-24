/*cerat database todo*/
CREATE DATABASE todo;
/*creat tabe todoliste*/

CREATE TABLE `todo`.`todolist` ( `id` INT NULL AUTO_INCREMENT , `contenu` VARCHAR(255) NOT NULL , `date` DATETIME NOT NULL , `coche` BOOLEAN NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM CHARSET=utf8 COLLATE utf8_general_ci;