CREATE TABLE
    `news`
(
    `id`   INT(11) NOT NULL AUTO_INCREMENT,
    `description` CHAR(128),
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE
    `products`
(
    `id`   INT(11) NOT NULL AUTO_INCREMENT,
    `name` CHAR(64),
    PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;

CREATE TABLE
    `news_products_link`
(
    `id`   INT(11) NOT NULL AUTO_INCREMENT,
    `news_id` INT(11),
    `product_id` INT(11),
    `count` INT(11) NOT NULL,
    PRIMARY KEY (`id`),
    CONSTRAINT news_table_key FOREIGN KEY (news_id) REFERENCES news (id),
    CONSTRAINT product_table_key FOREIGN KEY (product_id) REFERENCES products (id)
) DEFAULT CHARSET=utf8;

CREATE INDEX description ON news(description);

CREATE INDEX name ON products(name);

CREATE INDEX id ON products(id);

CREATE INDEX id ON news(id);

INSERT INTO
    `news` (`description`)
VALUES
('Бабушка купила авокадо и умерла'),
('Бабушка забрала у внуков шоколад'),
('Миша взял у Саши печенье'),
('Мужчина съел 2 авокадо и убил 2 человек');

INSERT INTO
    `products` (`name`)
VALUES
('авокадо'),
('шоколад'),
('печенье');

INSERT INTO
    `news_products_link` (`news_id`, `product_id`, `count`)
VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2);