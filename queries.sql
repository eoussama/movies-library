CREATE DATABASE `db_movies`;
USE `db_movies`;

-- Tables
CREATE TABLE `movies`(
	`movieId` INT(11) NOT NULL AUTO_INCREMENT,
	`title` VARCHAR(50) NOT NULL,
	`description` TEXT NOT NULL,
	`length` SMALLINT(5) NOT NULL,
	`categories` VARCHAR(50) NOT NULL,
	`score` FLOAT NOT NULL,
	`releaseDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	
	CONSTRAINT pk_movieId PRIMARY KEY(`movieId`)
);

CREATE TABLE `users`(
	`userId` INT(11) NOT NULL AUTO_INCREMENT,
	`username` VARCHAR(20) NOT NULL,
	`password` VARCHAR(15) NOT NULL,
	`joinDate` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
	`moderator` TINYINT(1) NOT NULL DEFAULT 0,
	
	CONSTRAINT pk_userId PRIMARY KEY(`userId`)
);

CREATE TABLE `libraries`(
	`userId` INT(11) NOT NULL AUTO_INCREMENT,
	`movieId` VARCHAR(20) NOT NULL,
	
	CONSTRAINT pk_libId PRIMARY KEY(`userId`, `movieId`),
	CONSTRAINT fk_userId FOREIGN KEY(`userId`) REFERENCES `users`(`userId`),
	CONSTRAINT fk_movieId FOREIGN KEY(`userId`) REFERENCES `movies`(`movieId`)
);