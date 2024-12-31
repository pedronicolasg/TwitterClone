CREATE TABLE `users` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`date` TIMESTAMP,
	`username` VARCHAR(255),
	`email` VARCHAR(255),
	`password` VARCHAR(255),
	`theme` ENUM('light', 'dark'),
	PRIMARY KEY(`id`)
);


CREATE TABLE `tweets` (
	`id` INTEGER NOT NULL AUTO_INCREMENT UNIQUE,
	`date` TIMESTAMP,
	`username` VARCHAR(255),
	`gravatar` VARCHAR(255),
	`content` VARCHAR(255),
	PRIMARY KEY(`id`)
);
