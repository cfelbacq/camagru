<?php
	include ("database.php");
	$bdd = new PDO("$DB_DSN", $DB_USER, $DB_PASSWORD);

	$bdd->exec("CREATE DATABASE camagru;");
	$bdd->exec("CREATE TABLE `camagru`.`membres` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(55) NOT NULL , `pseudo` VARCHAR(55) NOT NULL , `password` VARCHAR(255) NOT NULL , `cle` VARCHAR(32) NOT NULL , `actif` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
	$bdd->exec("CREATE TABLE `camagru`.`image` ( `int` INT NOT NULL AUTO_INCREMENT , `id_auteur` INT NOT NULL , `image` VARCHAR(255) NOT NULL , `image_type` VARCHAR(20) NOT NULL , `width` INT NOT NULL , `height` INT NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`int`)) ENGINE = InnoDB;");
	$bdd->exec("CREATE TABLE `camagru`.`comment` ( `id` INT NOT NULL AUTO_INCREMENT , `id_auteur` INT NOT NULL , `id_image` INT NOT NULL ,`comment` TEXT NOT NULL , `date` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
?>