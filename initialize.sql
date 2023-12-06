--@block
CREATE DATABASE v_parrot;

USE v_parrot;

CREATE TABLE articles (
    id INT NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    year INT,
    km INT,
    price INT NOT NULL,
);

CREATE TABLE 