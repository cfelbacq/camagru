<?php
	include ("database.php");
	$bdd = new PDO("$DB_DSN", $DB_USER, $DB_PASSWORD);

	$bdd->exec("CREATE DATABASE camagru;");
	$bdd->exec("CREATE TABLE `camagru`.`membres` ( `id` INT NOT NULL AUTO_INCREMENT , `email` VARCHAR(55) NOT NULL , `pseudo` VARCHAR(55) NOT NULL , `password` VARCHAR(255) NOT NULL , `cle` VARCHAR(32) NOT NULL , `actif` INT NOT NULL DEFAULT '0' , PRIMARY KEY (`id`)) ENGINE = InnoDB;");
?>