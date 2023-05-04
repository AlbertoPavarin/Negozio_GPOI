CREATE DATABASE shop_db;

USE shop_db;

CREATE TABLE product(
	id INT AUTO_INCREMENT PRIMARY KEY,
	description nvarchar(1024) not null,
	quantity INT NOT NULL,
	active BOOLEAN DEFAULT 1,
	price DECIMAL(4,2) NOT NULL,
	nome NVARCHAR(64) NOT NULL,
	img_name NVARCHAR(50) NOT NULL
);

CREATE TABLE category(
	id INT AUTO_INCREMENT PRIMARY KEY,
	description NVARCHAR(64) NOT NULL,
	name NVARCHAR(24) NOT NULL
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
	`user` INT NOT NULL,
	status INT NOT NULL, -- fk
	city NVARCHAR(32) NOT NULL,
	province NVARCHAR(32) NOT NULL,
	route NVARCHAR(64) NOT NULL,
	cap NVARCHAR(5) NOT NULL
);

CREATE TABLE product_order (
	product INT NOT NULL, -- fk,
	`order` INT NOT NULL, -- fk
	quantity INT NOT NULL
);

CREATE TABLE status(
	id INT AUTO_INCREMENT PRIMARY KEY,
	description nvarchar(16) NOT NULL
);



ALTER TABLE category_product
ADD CONSTRAINT fk_category_p FOREIGN KEY (category) REFERENCES category(id);

ALTER TABLE category_product
ADD CONSTRAINT fk_product_c FOREIGN KEY (product) REFERENCES product(id);

ALTER TABLE cart
ADD CONSTRAINT fk_cart_prod FOREIGN KEY (product) REFERENCES product(id);

ALTER TABLE `order`
ADD CONSTRAINT fk_order_s FOREIGN KEY (status) REFERENCES status(id);
 
ALTER TABLE product_order 
ADD CONSTRAINT fk_product_o FOREIGN KEY (product) REFERENCES product(id);
ALTER TABLE product_order 
ADD CONSTRAINT fk_order_p FOREIGN KEY (`order`) REFERENCES `order`(id);

ALTER TABLE product_order 
ADD CONSTRAINT pk_product_order PRIMARY KEY (product, `order`);

ALTER TABLE cart 
ADD CONSTRAINT pk_cart PRIMARY KEY (product, `user`);
