CREATE DATABASE shop_db;

USE shop_db;

CREATE TABLE `role` (
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(32) NOT NULL
);

CREATE TABLE `user`(
	id INT AUTO_INCREMENT PRIMARY KEY,
	name NVARCHAR(32) NOT NULL,
	surname NVARCHAR(32) NOT NULL,
	username NVARCHAR(16) NOT NULL,
	email NVARCHAR(64) NOT NULL,
	`password` NVARCHAR(255) NOT NULL,
	active BOOLEAN DEFAULT 1 NOT NULL,
	birth_date DATE NOT NULL,
	`role` INT NOT NULL -- fk
);

CREATE TABLE product(
	id INT AUTO_INCREMENT PRIMARY KEY,
	description nvarchar(64) not null,
	quantity INT NOT NULL,
	active BOOLEAN DEFAULT 1,
	price DECIMAL NOT NULL,
	nome NVARCHAR(16) NOT NULL
);

CREATE TABLE category(
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(64) NOT NULL,
	name NVARCHAR(16) NOT NULL
);

CREATE TABLE category_product(
	category INT NOT NULL, -- fk
	product INT NOT NULL -- fk
);

CREATE TABLE cart(
	`user` INT NOT NULL, -- fk
	product INT NOT NULL, -- fk
	quantity INT NOT NULL
);

CREATE TABLE `order`(
	id INT AUTO_INCREMENT PRIMARY KEY,
	date_order DATETIME DEFAULT NOW(),
	status INT NOT NULL -- fk
);

CREATE TABLE product_order (
	product INT NOT NULL, -- fk,
	`order` INT NOT NULL -- fk
);




