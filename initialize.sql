--@block
CREATE DATABASE v_parrot;

USE v_parrot;

--@block
CREATE TABLE articles (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(255) NOT NULL,
    year INT,
    km INT,
    price INT NOT NULL,
    description VARCHAR(4096)
);
INSERT INTO articles (title, year, km, price, description)
VALUES ("Dummy Car", 2016, 200000, 10000, "A nice dummy car. Very nice dummy car");

--@block
CREATE TABLE moderators (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL UNIQUE,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(255)
);
INSERT INTO moderators (email, first_name, last_name, password, role)
VALUES ("Admin@test.com","Admin", "Admin", "1234", "admin");

--@block
CREATE TABLE forms (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone INT NOT NULL,
    text_field VARCHAR(4096) NOT NULL
);
INSERT INTO forms (email, first_name, last_name, phone, text_field)
VALUES ("user@test.com", "John", "Smith", "0611223344", "Bonjour, je vous contacte concernant cette certaine voiture.");

--@block
CREATE TABLE comments (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) NOT NULL,
    first_name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    phone INT,
    text_field VARCHAR(2048)  NOT NULL
);
INSERT INTO comments (email, first_name, last_name, phone, text_field)
VALUES ("user@test.com", "John", "Smith", "", "Bon site avec de bonnes voitures! A visiter encore!");
