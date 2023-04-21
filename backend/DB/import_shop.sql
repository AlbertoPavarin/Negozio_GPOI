USE shop_db;

INSERT INTO `role` (description)
VALUES ("amministratore"),
("utente");

INSERT INTO `user`(name, surname, username, email, `password`, birth_date, `role`)
VALUES ("Alberto", "Pavarin", "xAlbi", "albi@gmail.com", "cb3cf0d19825fc2a96c887890ed83000e7b76a31b8bdc7b0897b156eb9be553a", "2005-01-03", 1),
("Alessio", "Donini", "ErDono", "erdono@gmail.com", "cb3cf0d19825fc2a96c887890ed83000e7b76a31b8bdc7b0897b156eb9be553a", "2004-12-29", 1);

INSERT INTO product (description, quantity, price, nome)
VALUES ("sapone per mani dove", 10, 2.5, "Sapone Dove"),
("Sapone per piatti svelto", 10, 3, "Sapone Svelto");

INSERT INTO category (description, name)
VALUES ("sapone per piatti", "sapone piatti"),
("sapone per mani", "sapone mani");

INSERT INTO category_product (category, product)
VALUES (1, 1),
(2, 2);

INSERT INTO status (description)
VALUES ("ordinato");

INSERT INTO `order` (`user`, status)
VALUES (1, 1);

INSERT INTO product_order (product, `order`, quantity)
VALUES (1, 1, 2);